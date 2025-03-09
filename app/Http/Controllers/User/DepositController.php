<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function index()
    {
        return view('user.deposit.home');
    }

    public function stepOne()
    {
        return view('user.deposit.fund_one');
    }

    public function stepOneSubmit(Request $request)
    {
        // Validate input
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'account' => 'required|in:trading,holding,staking',
        ]);

        // Process the data (e.g., save to database)
        $amount = $request->input('amount');
        $account = $request->input('account');

        // Return JSON response
        return response()->json([
            'success' => true,
            'message' => 'Form submitted successfully!',
            'amount' => $amount,
            'account' => $account,
        ]);
    }
    public function stepTwo(Request $request)
    {
        // Retrieve data from query parameters
        $amount = $request->query('amount');
        $account = $request->query('account');

        // Pass data to the view
        return view('user.deposit.fund_two', [
            'amount' => $amount,
            'account' => $account,
        ]);
    }

    public function stepTwoSubmit(Request $request)
    {
        // Validate input
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'account' => 'required|in:trading,holding,staking',
        ]);

        // Process the data (e.g., save to database)
        $amount = $request->input('amount');
        $account = $request->input('account');

        // Return JSON response
        return response()->json([
            'success' => true,
            'message' => 'Form submitted successfully!',
            'amount' => $amount,
            'account' => $account,
        ]);
    }


    public function stepThree(Request $request)
    {
        // Retrieve data from query parameters
        $amount = $request->query('amount');
        $account = $request->query('account');

        // Pass data to the view
        return view('user.deposit.fund_three', [
            'amount' => $amount,
            'account' => $account,
        ]);
    }

    public function stepThreeSubmit(Request $request)
    {
        // Validate input
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'account' => 'required|in:trading,holding,staking',
        ]);

        // Process the data (e.g., save to database)
        $amount = $request->input('amount');
        $account = $request->input('account');

        // Return JSON response
        return response()->json([
            'success' => true,
            'message' => 'Form submitted successfully!',
            'amount' => $amount,
            'account' => $account,
        ]);
    }

    public function payCrypto(Request $request)
    {
        // Retrieve data from query parameters
        $amount = $request->query('amount');
        $account = $request->query('account');

        // Pass data to the view
        return view('user.deposit.pay_crypto', [
            'amount' => $amount,
            'account' => $account,
        ]);
    }
}
