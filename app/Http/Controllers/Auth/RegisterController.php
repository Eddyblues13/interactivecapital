<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register'); // Ensure this matches your Blade file location
    }

    /**
     * Handle the registration form submission.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */



    public function register(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'required|string|max:20',
            'currency' => 'required|string|max:10',
            'country' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'password' => 'required|string|min:4|confirmed',
        ]);

        // If validation fails, return error response
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first(),
            ], 422);
        }

        // Create the user
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'currency' => $request->currency,
            'country' => $request->country,
            'city' => $request->city,
            'plain' => encrypt($request->password), // Encrypt the plain password
            'user_status' => 1, // Assuming 1 means active
            'verification_code' => rand(1000, 9999), // Generate a random verification code
            'verification_expiry' => now()->addMinutes(10), // Set expiry time for verification code
            'password' => Hash::make($request->password), // Hash the password
        ]);

        // Create related balances for the user
        $user->holdingBalance()->create([
            'user_id' => $user->id,
            'amount' => 0,
        ]);

        $user->stakingBalance()->create([
            'user_id' => $user->id,
            'amount' => 0,
        ]);

        $user->tradingBalance()->create([
            'user_id' => $user->id,
            'amount' => 0,
        ]);

        // Return success response
        return response()->json([
            'success' => true,
            'message' => 'Registration successful!',
            'redirect' => route('home'), // Redirect to home page after registration
        ]);
    }
}
