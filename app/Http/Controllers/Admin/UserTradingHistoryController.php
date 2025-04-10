<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Trader;
use Illuminate\Http\Request;
use App\Models\TradingHistory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserTradingHistoryController extends Controller
{
    public function index($userId)
    {
        $user = User::findOrFail($userId);
        $histories = TradingHistory::with(['user', 'trader'])
            ->where('user_id', $userId)
            ->latest()
            ->get();

        return view('admin.user.trading.index', compact('histories', 'user'));
    }

    public function create($userId)
    {
        $user = User::findOrFail($userId);
        $traders = Trader::all();
        return view('admin.user.trading.create', compact('user', 'traders'));
    }

    public function store(Request $request, $userId)
    {
        $validator = Validator::make($request->all(), [
            'trader_id' => 'required|exists:traders,id',
            'amount' => 'required|numeric|min:0.01',
            'status' => 'required|in:pending,completed,failed'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            TradingHistory::create([
                'user_id' => $userId,
                'trader_id' => $request->trader_id,
                'amount' => $request->amount,
                'status' => $request->status
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Trading history created successfully!',
                'redirect' => route('admin.users.trading-histories.index', $userId)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error creating trading history: ' . $e->getMessage()
            ], 500);
        }
    }

    public function edit($userId, $id)
    {
        $user = User::findOrFail($userId);
        $history = TradingHistory::where('user_id', $userId)->findOrFail($id);
        $traders = Trader::all();

        return view('admin.user.trading.edit', compact('user', 'history', 'traders'));
    }

    public function update(Request $request, $userId, $id)
    {
        $validator = Validator::make($request->all(), [
            'trader_id' => 'required|exists:traders,id',
            'amount' => 'required|numeric|min:0.01',
            'status' => 'required|in:pending,completed,failed'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $history = TradingHistory::where('user_id', $userId)->findOrFail($id);
            $history->update([
                'trader_id' => $request->trader_id,
                'amount' => $request->amount,
                'status' => $request->status
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Trading history updated successfully!',
                'redirect' => route('admin.users.trading-histories.index', $userId)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error updating trading history: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($userId, $id)
    {
        try {
            $history = TradingHistory::where('user_id', $userId)->findOrFail($id);
            $history->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Trading history deleted successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error deleting trading history: ' . $e->getMessage()
            ], 500);
        }
    }
}
