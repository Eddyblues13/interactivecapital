@include('user.layouts.header')

<!-- Main Content -->
<div class="depost-form-main w-100">
    <h1 class="heading text-white text-uppercase">Update Email</h1>
    <span class="view-pricing text-header">{{Auth::user()->email}}</span>

    <div class="fund-same-card">
        <div class="input-group">
            <div class="input-label">YOUR NEW EMAIL</div>
            <input type="text" class="amount-input">
        </div>

        <button class="withdrawal-btn">Update</button>
    </div>
</div>

@include('user.layouts.footer')