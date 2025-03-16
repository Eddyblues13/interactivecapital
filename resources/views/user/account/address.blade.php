@include('user.layouts.header')

<!-- Main Content -->
<div class="depost-form-main w-100">
    <h2 class="heading text-white fs-4 py-3">Update Contact Info</h2>
    <div class="fund-same-card">
        <form>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group">
                        <div class="input-label">Mobile Number</div>
                        <input type="text" class="amount-input text-header" value="1234555">
                    </div>
                    <div class="input-group">
                        <div class="input-label">Zip Code</div>
                        <input type="text" class="amount-input text-header">
                    </div>
                    <div class="input-group">
                        <div class="input-label">State</div>
                        <input type="text" class="amount-input text-header">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <div class="input-label">Street Address</div>
                        <input type="text" class="amount-input text-header">
                    </div>
                    <div class="input-group">
                        <div class="input-label">City</div>
                        <input type="text" class="amount-input text-header" value="Abj">
                    </div>
                    <div class="input-group">
                        <div class="input-label">Country</div>
                        <select class="select-account text-header">
                            <option>Naija</option>
                            <option>Ghana</option>
                            <option>Cameroon</option>
                        </select>
                    </div>
                </div>

            </div>

            <button class="withdrawal-btn">Update</button>

        </form>

    </div>
</div>
@include('user.layouts.footer')