<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Trade;
use App\Models\Trader;
use Illuminate\Http\Request;
use App\Models\TradingHistory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserTradingHistoryController extends Controller
{
    public function index($userId)
    {
        // Get list of available traders (you might have a Trader model)
        $traders = Trader::get();

        // List of common trading symbols
        $symbols = [
            'BTCUSD',
            'ETHUSD',
            'XRPUSD',
            'SOLUSD',
            'ADAUSD',
            'DOTUSD',
            'DOGEUSD',
            'AVAXUSD',
            'MATICUSD',
            'LTCUSD',
            'ATOMUSD',
            'XLMUSD',
            'EURUSD',
            'GBPUSD',
            'USDJPY',
            'AUDUSD',
            'USDCAD',
            'USDCHF',
            'GOLD',
            'SILVER',
            'OIL',
            'SPX500',
            'NAS100',
            'DJ30'
        ];

        $trades = Trade::with('user')
            ->orderBy('entry_date', 'desc')
            ->paginate(20);


        $user = User::findOrFail($userId);
        $histories = TradingHistory::with(['user', 'trader'])
            ->where('user_id', $userId)
            ->latest()
            ->get();

        return view('admin.user.trading.index', compact('histories', 'user', 'traders', 'trades', 'symbols'));
    }

    public function create($userId)
    {
        $user = User::findOrFail($userId);
        $traders = Trader::all();
        return view('admin.user.trading.create', compact('user', 'traders'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'symbol' => 'nullable|string|max:10',
            'trader_name' => 'nullable|string|max:100',
            'type' => 'nullable|in:spot,futures,margin',
            'direction' => 'nullable|in:up,down',
            'entry_price' => 'nullable|numeric|min:0',
            'exit_price' => 'nullable|numeric|min:0',
            'amount' => 'required|numeric|min:0',
            'profit' => 'nullable|numeric',
            'status' => 'nullable|in:active,closed',
            'entry_date' => 'nullable|date',
            'exit_date' => 'nullable|date|after_or_equal:entry_date',
            'notes' => 'nullable|string|max:500',
        ]);

        // Calculate profit if not provided
        if (!isset($validated['profit'])) {
            if ($validated['status'] === 'closed' && isset($validated['exit_price'])) {
                $priceDiff = $validated['direction'] === 'up'
                    ? ($validated['exit_price'] - $validated['entry_price'])
                    : ($validated['entry_price'] - $validated['exit_price']);
                $validated['profit'] = $priceDiff * $validated['amount'];
            } else {
                $validated['profit'] = 0;
            }
        }

        Trade::create($validated);

        return redirect()->back()->with('message', 'Trade created successfully!');
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
