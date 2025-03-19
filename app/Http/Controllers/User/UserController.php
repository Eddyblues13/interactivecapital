<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\User\MiningBalance;
use App\Models\User\HoldingBalance;
use App\Models\User\StakingBalance;
use App\Models\User\TradingBalance;
use App\Http\Controllers\Controller;
use App\Models\User\ReferralBalance;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();


        $data['user'] = Auth::user();

        $data['holdingBalance'] = HoldingBalance::where('user_id', $user->id)->sum('amount') ?? 0;
        $data['stakingBalance'] = StakingBalance::where('user_id', $user->id)->sum('amount') ?? 0;
        $data['tradingBalance'] = TradingBalance::where('user_id', $user->id)->sum('amount') ?? 0;
        $data['referralBalance'] = ReferralBalance::where('user_id', $user->id)->sum('amount') ?? 0;





        return view('user.home', $data);
    }


    public function holding()
    {

        $user = Auth::user();

        $holdingBalance = HoldingBalance::where('user_id', $user->id)->sum('amount') ?? 0;
        $stakingBalance = StakingBalance::where('user_id', $user->id)->sum('amount') ?? 0;
        $tradingBalance = TradingBalance::where('user_id', $user->id)->sum('amount') ?? 0;

        $totalBalance = $holdingBalance + $stakingBalance + $tradingBalance;

        return view('user.holding', compact('holdingBalance'));
    }

    public function trading()
    {

        $user = Auth::user();


        $tradingBalance = TradingBalance::where('user_id', $user->id)->sum('amount') ?? 0;



        return view('user.trading', compact('tradingBalance'));
    }
    public function staking()
    {

        $user = Auth::user();

        $holdingBalance = HoldingBalance::where('user_id', $user->id)->sum('amount') ?? 0;
        $stakingBalance = StakingBalance::where('user_id', $user->id)->sum('amount') ?? 0;
        $tradingBalance = TradingBalance::where('user_id', $user->id)->sum('amount') ?? 0;

        $totalBalance = $holdingBalance + $stakingBalance + $tradingBalance;

        return view('user.staking', compact('stakingBalance'));
    }

    public function currentTrade()
    {

        $user = Auth::user();


        $tradingBalance = TradingBalance::where('user_id', $user->id)->sum('amount') ?? 0;



        return view('user.current_trade', compact('tradingBalance'));
    }

    public function mining()
    {

        $user = Auth::user();


        $tradingBalance = MiningBalance::where('user_id', $user->id)->sum('amount') ?? 0;



        return view('user.mining', compact('miningBalance'));
    }
}
