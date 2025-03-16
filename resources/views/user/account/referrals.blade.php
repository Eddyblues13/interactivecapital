@include('user.layouts.header')

<!-- Main Content -->
<div class="container py-5">
    <div class="row g-4 ref-area">
        <!-- Left Column - Balance Card -->
        <div class="col-md-4">
            <div class="card bg-card-grey p-4 text-center">
                <h6 class="text-white mb-2 fs-5">CA$0.00</h6>
                <p class="text-secondary mb-4">Referral Balance</p>
                <div class="flex justify-content-center">
                    <button class="btn btn-login text-uppercase fs-6 w-50 py-2">Withdraw</button>
                </div>
            </div>
        </div>

        <!-- Right Column - Referral Info -->
        <div class="col-md-8">
            <!-- Referral Link Card -->
            <div class="card bg-card-grey p-4 mb-4">
                <div class="form-group">
                    <input type="text" class="form-control mb-2" value="https://capitalfidel.com/signup?user_id=127"
                        readonly>
                    <div class="text-center">
                        <label class="text-secondary text-center">Referral Link</label>
                    </div>
                </div>
            </div>

            <!-- No Referrals Card -->
            <div class="card bg-card-grey p-4">
                <p class="text-secondary text-center mb-0">No Referrals Yet</p>
            </div>
        </div>
    </div>
</div>


@include('user.layouts.footer')