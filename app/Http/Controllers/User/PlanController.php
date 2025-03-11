<?php

namespace App\Http\Controllers\User;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Models\User\PlanHistory;
use App\Models\User\HoldingBalance;
use App\Models\User\StakingBalance;
use App\Models\User\TradingBalance;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        $user = Auth::user();

        $holdingBalance = HoldingBalance::where('user_id', $user->id)->sum('amount') ?? 0;
        $stakingBalance = StakingBalance::where('user_id', $user->id)->sum('amount') ?? 0;
        $tradingBalance = TradingBalance::where('user_id', $user->id)->sum('amount') ?? 0;

        $totalBalance = $holdingBalance + $stakingBalance + $tradingBalance;

        return view('user.plans', compact('plans', 'totalBalance'));
    }




    public function fundTrading(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|exists:plans,id',
            'amount' => 'required|numeric|min:0.01',
            'account' => 'required|in:holding,staking,trading',
        ]);

        $user = Auth::user();
        $plan = Plan::findOrFail($request->plan_id);

        if ($request->account == 'holding' && $user->holdingBalance->amount < $request->amount) {
            return response()->json(['success' => false, 'message' => 'Insufficient funds in holding account.']);
        }

        if ($request->account == 'staking' && $user->stakingBalance->amount < $request->amount) {
            return response()->json(['success' => false, 'message' => 'Insufficient funds in staking account.']);
        }

        if ($request->account == 'trading' && $user->tradingBalance->amount < $request->amount) {
            return response()->json(['success' => false, 'message' => 'Insufficient funds in trading account.']);
        }

        // Deduct from selected account
        if ($request->account == 'holding') {
            $user->holdingBalance->amount -= $request->amount;
            $user->holdingBalance->save();
        } elseif ($request->account == 'staking') {
            $user->stakingBalance->amount -= $request->amount;
            $user->stakingBalance->save();
        } elseif ($request->account == 'trading') {
            $user->tradingBalance->amount -= $request->amount;
            $user->tradingBalance->save();
        }

        // Add to trading balance
        $user->tradingBalance->amount += $request->amount;
        $user->tradingBalance->save();

        // Store plan history
        PlanHistory::create([
            'user_id' => $user->id,
            'plan_id' => $plan->id,
            'amount' => $request->amount,
            'account_type' => $request->account,
        ]);

        return response()->json(['success' => true, 'message' => 'Funds transferred successfully!']);
    }
}
