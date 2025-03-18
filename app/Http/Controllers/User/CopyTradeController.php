<?php

namespace App\Http\Controllers\User;

use App\Models\Trader;
use Illuminate\Http\Request;
use App\Models\TradingHistory;
use App\Models\User\HoldingBalance;
use App\Models\User\StakingBalance;
use App\Models\User\TradingBalance;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CopyTradeController extends Controller
{
    public function index()
    {
        $traders = Trader::all();
        $tradingHistories = TradingHistory::where('user_id', Auth::id())->with('trader')->get();
        $user = Auth::user();

        $holdingBalance = HoldingBalance::where('user_id', $user->id)->sum('amount') ?? 0;
        $stakingBalance = StakingBalance::where('user_id', $user->id)->sum('amount') ?? 0;
        $tradingBalance = TradingBalance::where('user_id', $user->id)->sum('amount') ?? 0;

        $totalBalance = $holdingBalance + $stakingBalance + $tradingBalance;

        return view('user.copy_trade', compact('traders', 'totalBalance'));
    }

    public function copyTrader(Request $request)
    {
        $user = Auth::user();
        $traderId = $request->input('trader_id');
        $minAmount = $request->input('min_amount');

        // Check if user is authenticated
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not authenticated.']);
        }

        // Check user balance
        if ($user->balance < $minAmount) {
            return response()->json(['success' => false, 'message' => 'Insufficient balance.']);
        }

        // Deduct the amount from user balance
        $user->balance -= $minAmount;
        $user->save();


        // Save trading history
        TradingHistory::create([
            'user_id' => $user->id,
            'trader_id' => $traderId,
            'amount' => $minAmount,
            'status' => 'success', // Assuming the trade is successful
        ]);


        // Perform the copy trade logic here (e.g., link user to trader)
        // Example: $user->traders()->attach($traderId);

        return response()->json(['success' => true]);
    }
}
