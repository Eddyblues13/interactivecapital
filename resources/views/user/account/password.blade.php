@include('user.layouts.header')

<!-- Main Content -->
<div class="depost-form-main w-100">
    <div class="fund-same-card">
        <div class="input-group">
            <div class="input-label">Password</div>
            <input type="text" class="amount-input">
        </div>

        <div class="input-group">
            <div class="input-label">New Password</div>
            <input type="text" class="amount-input">
        </div>

        <div class="input-group">
            <div class="input-label">Confirm Password</div>
            <input type="text" class="amount-input">
        </div>

        <button class="withdrawal-btn">Update</button>
    </div>
</div>

@include('user.layouts.footer')