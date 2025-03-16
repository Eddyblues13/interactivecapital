<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\User\HoldingBalance;
use App\Models\User\StakingBalance;
use App\Models\User\TradingBalance;
use App\Http\Controllers\Controller;
use App\Models\Trader;
use Illuminate\Support\Facades\Auth;

class CopyTradeController extends Controller
{
    public function index()
    {
        $trader = Trader::all();
        $user = Auth::user();

        $holdingBalance = HoldingBalance::where('user_id', $user->id)->sum('amount') ?? 0;
        $stakingBalance = StakingBalance::where('user_id', $user->id)->sum('amount') ?? 0;
        $tradingBalance = TradingBalance::where('user_id', $user->id)->sum('amount') ?? 0;

        $totalBalance = $holdingBalance + $stakingBalance + $tradingBalance;

        return view('user.copy_trade', compact('trader', 'totalBalance'));
    }
}
