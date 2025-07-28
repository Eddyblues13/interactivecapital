<?php

namespace App\Http\Controllers\Admin;

use App\Models\Trader;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cloudinary\Cloudinary;
use Cloudinary\Api\Upload\UploadApi;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class TraderController extends Controller
{
    protected $cloudinary;
    protected $uploadApi;

    public function __construct()
    {
        $this->cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key' => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ]
        ]);
        $this->uploadApi = new UploadApi();
    }

    /**
     * Display a listing of the resource with pagination
     */
    public function index()
    {
        $traders = Trader::latest()->paginate(10);
        return view('admin.traders.index', compact('traders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.traders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'trader_name' => 'required|string|max:255',
            'followers' => 'required|numeric|min:0',
            'copier_roi' => 'required|numeric|min:0',
            'risk_index' => 'required|numeric|min:0|max:100',
            'total_copied_trade' => 'required|numeric|min:0',
            'verified_status' => 'required',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $validated = $validator->validated();
            $uploadResult = null;

            if ($request->hasFile('picture')) {
                $uploadResult = $this->uploadApi->upload(
                    $request->file('picture')->getRealPath(),
                    [
                        'folder' => 'traders/profiles',
                        'transformation' => [
                            'width' => 400,
                            'height' => 400,
                            'crop' => 'fill',
                            'gravity' => 'face',
                            'quality' => 'auto'
                        ]
                    ]
                );
            }

            $trader = Trader::create([
                'name' => $validated['trader_name'],
                'followers' => $validated['followers'],
                'return_rate' => $validated['copier_roi'],
                'risk_index' => $validated['risk_index'],
                'total_copied_trade' => $validated['total_copied_trade'],
                'is_verified' => $validated['verified_status'],
                'picture_url' => $uploadResult['secure_url'] ?? null,
                'picture_public_id' => $uploadResult['public_id'] ?? null,
                'min_amount' => 0,
                'max_amount' => 100000000,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Trader created successfully!',
                'redirect_url' => route('traders.index')
            ]);
        } catch (\Exception $e) {
            Log::error('Trader creation failed: ' . $e->getMessage());

            if ($request->expectsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Trader creation failed. Please try again.'
                ], 500);
            }

            return back()->withInput()
                ->with('error', 'Trader creation failed. Please try again.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Trader $trader)
    {
        return view('admin.traders.show', compact('trader'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trader $trader)
    {
        return view('admin.traders.edit', compact('trader'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trader $trader)
    {
        $validator = Validator::make($request->all(), [
            'trader_name' => 'required|string|max:255',
            'followers' => 'required|numeric|min:0',
            'copier_roi' => 'required|numeric|min:0',
            'risk_index' => 'required|numeric|min:0|max:100',
            'total_copied_trade' => 'required|numeric|min:0',
            'verified_status' => 'required',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'remove_picture' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $validated = $validator->validated();
            $updateData = [
                'name' => $validated['trader_name'],
                'followers' => $validated['followers'],
                'return_rate' => $validated['copier_roi'],
                'risk_index' => $validated['risk_index'],
                'total_copied_trade' => $validated['total_copied_trade'],
                'is_verified' => $validated['verified_status'],
            ];

            // Handle picture removal or update
            if ($request->has('remove_picture') && $request->remove_picture) {
                $this->deleteCloudinaryImage($trader->picture_public_id);
                $updateData['picture_url'] = null;
                $updateData['picture_public_id'] = null;
            } elseif ($request->hasFile('picture')) {
                $this->deleteCloudinaryImage($trader->picture_public_id);

                $uploadResult = $this->uploadApi->upload(
                    $request->file('picture')->getRealPath(),
                    [
                        'folder' => 'traders/profiles',
                        'transformation' => [
                            'width' => 400,
                            'height' => 400,
                            'crop' => 'fill',
                            'gravity' => 'face',
                            'quality' => 'auto'
                        ]
                    ]
                );

                $updateData['picture_url'] = $uploadResult['secure_url'];
                $updateData['picture_public_id'] = $uploadResult['public_id'];
            }

            $trader->update($updateData);

            return response()->json([
                'success' => true,
                'message' => 'Trader updated successfully!',
                'redirect_url' => route('traders.index')
            ]);
        } catch (\Exception $e) {
            Log::error('Trader update failed: ' . $e->getMessage());
            return back()->withInput()
                ->with('error', 'Trader update failed. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trader $trader)
    {
        try {
            // Delete picture from Cloudinary if exists
            $this->deleteCloudinaryImage($trader->picture_public_id);

            $trader->delete();

            return redirect()->route('admin.traders.index')
                ->with('success', 'Trader deleted successfully!');
        } catch (\Exception $e) {
            Log::error('Trader deletion failed: ' . $e->getMessage());
            return back()->with('error', 'Failed to delete trader. Please try again.');
        }
    }

    /**
     * Helper method to delete image from Cloudinary
     */
    protected function deleteCloudinaryImage($publicId)
    {
        if ($publicId) {
            try {
                $this->uploadApi->destroy($publicId);
            } catch (\Exception $e) {
                Log::error("Failed to delete Cloudinary image: " . $e->getMessage());
                throw $e;
            }
        }
    }
}
