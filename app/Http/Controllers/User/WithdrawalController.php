<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Models\User\Withdrawal;
use Illuminate\Support\Facades\DB;
use App\Models\User\HoldingBalance;
use App\Models\User\StakingBalance;
use App\Models\User\TradingBalance;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WithdrawalController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        // Fetch withdrawals for the authenticated user
        $withdrawals = Withdrawal::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        $holdingBalance = HoldingBalance::where('user_id', $user->id)->sum('amount') ?? 0;
        $stakingBalance = StakingBalance::where('user_id', $user->id)->sum('amount') ?? 0;
        $tradingBalance = TradingBalance::where('user_id', $user->id)->sum('amount') ?? 0;

        $totalBalance = $holdingBalance + $stakingBalance + $tradingBalance;

        return view('user.withdrawal', compact('totalBalance', 'withdrawals'));
    }

    public function cryptoWithdrawal()
    {

        $user = Auth::user();

        $holdingBalance = HoldingBalance::where('user_id', $user->id)->sum('amount') ?? 0;
        $stakingBalance = StakingBalance::where('user_id', $user->id)->sum('amount') ?? 0;
        $tradingBalance = TradingBalance::where('user_id', $user->id)->sum('amount') ?? 0;

        $totalBalance = $holdingBalance + $stakingBalance + $tradingBalance;

        return view('user.crypto_withdrawal', compact('totalBalance', 'holdingBalance', 'stakingBalance', 'tradingBalance'));
    }

    public function submit(Request $request)
    {
        // Validate the request
        $request->validate([
            'account' => 'required|string|in:trading,holding,staking',
            'crypto_currency' => 'required|string|in:btc,usdt,eth',
            'amount' => 'required|numeric|min:0.01',
            'wallet_address' => 'required|string',
        ]);

        $user = Auth::user();
        $amount = $request->input('amount');
        $accountType = $request->input('account');
        $cryptoCurrency = $request->input('crypto_currency');
        $walletAddress = $request->input('wallet_address');

        // Fetch user balances
        $holdingBalance = HoldingBalance::where('user_id', $user->id)->sum('amount') ?? 0;
        $stakingBalance = StakingBalance::where('user_id', $user->id)->sum('amount') ?? 0;
        $tradingBalance = TradingBalance::where('user_id', $user->id)->sum('amount') ?? 0;

        // Validate the withdrawal amount
        switch ($accountType) {
            case 'holding':
                if ($amount > $holdingBalance) {
                    return response()->json(['message' => 'Insufficient balance in Holding Account.'], 400);
                }
                break;
            case 'staking':
                if ($amount > $stakingBalance) {
                    return response()->json(['message' => 'Insufficient balance in Staking Account.'], 400);
                }
                break;
            case 'trading':
                if ($amount > $tradingBalance) {
                    return response()->json(['message' => 'Insufficient balance in Trading Account.'], 400);
                }
                break;
            default:
                return response()->json(['message' => 'Invalid account selected.'], 400);
        }

        // Start a database transaction
        DB::beginTransaction();

        try {
            // Deduct the amount from the selected account
            switch ($accountType) {
                case 'holding':
                    HoldingBalance::where('user_id', $user->id)->decrement('amount', $amount);
                    break;
                case 'staking':
                    StakingBalance::where('user_id', $user->id)->decrement('amount', $amount);
                    break;
                case 'trading':
                    TradingBalance::where('user_id', $user->id)->decrement('amount', $amount);
                    break;
            }

            // Create a new withdrawal record
            Withdrawal::create([
                'user_id' => $user->id,
                'account_type' => $accountType,
                'crypto_currency' => $cryptoCurrency,
                'amount' => $amount,
                'wallet_address' => $walletAddress,
                'status' => 'pending', // Default status
            ]);

            // Commit the transaction
            DB::commit();

            return response()->json(['message' => 'Withdrawal request submitted successfully!']);
        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();
            return response()->json(['message' => 'An error occurred. Please try again.'], 500);
        }
    }
}
