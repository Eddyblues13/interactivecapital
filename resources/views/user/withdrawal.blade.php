@include('user.layouts.header')

<!-- Main Content -->
<div class="mx-3 my-4">
    <div class="notification">
        <div class="notification-text">
            Withdrawal will be pending until there are sufficient confirmations on the blockchain.
        </div>
        <button class="close-button">&times;</button>
    </div>
    <div class="d-flex justify-content-center mb-3">
        <a href="{{ route('crypto.withdrawal') }}" class="withdrawal-btn-up">NEW WITHDRAWAL</a>
    </div>


    @if($withdrawals->isEmpty())
    <div class="deposit-card text-white text-center py-5">
        NO WITHDRAWAL YET
    </div>
    @else
    @foreach($withdrawals as $withdrawal)
    <div class="transaction-card">
        <div class="date-section">
            <div class="month fs-6 fw-bold">{{ $withdrawal->created_at->format('M') }}</div>
            <div class="day fs-2">{{ $withdrawal->created_at->format('d') }}</div>
        </div>
        <div class="transaction-details">
            <div class="amount text-silverish">FUND {{ config('currencies.' . Auth::user()->currency, '$') }}{{
                $withdrawal->amount }}</div>

            <div class="deposit-description">{{ strtoupper($withdrawal->account_type) }} BALANCE TOTAL</div>


        </div>
        <div class="deposit-status">{{ ucfirst($withdrawal->status) }}</div>
    </div>
    @endforeach
    @endif


</div>

@include('user.layouts.footer')