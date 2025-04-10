<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\User\Deposit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepositController extends Controller
{
    public function index()
    {
        $deposits = Deposit::with('user')->latest()->get();
        return view('admin.deposits.index', compact('deposits'));
    }

    public function approve($id)
    {
        try {
            $deposit = Deposit::findOrFail($id);

            if ($deposit->status != 'pending') {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Deposit has already been processed'
                ], 400);
            }

            $deposit->update(['status' => 'approved']);

            // Credit user's account
            $user = User::find($deposit->user_id);
            if ($deposit->account_type == 'main') {
                $user->balance += $deposit->amount;
            } else {
                $user->investment_balance += $deposit->amount;
            }
            $user->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Deposit approved successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error approving deposit: ' . $e->getMessage()
            ], 500);
        }
    }

    public function reject($id)
    {
        try {
            $deposit = Deposit::findOrFail($id);

            if ($deposit->status != 'pending') {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Deposit has already been processed'
                ], 400);
            }

            $deposit->update(['status' => 'rejected']);

            return response()->json([
                'status' => 'success',
                'message' => 'Deposit rejected successfully!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error rejecting deposit: ' . $e->getMessage()
            ], 500);
        }
    }
}
