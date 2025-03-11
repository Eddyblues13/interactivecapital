@include('user.layouts.header')
<!-- Main Content -->
<div class="depost-form-main px-2">
    <h1 class="heading text-white fs-1">PAY ${{ request('amount') }}</h1>
    <a href="#" class="view-pricing text-secondary">Send Crypto</a>

    <div class="fund-card">
        <div class="text-center mb-5 text-secondary">0.00978809 BTC</div>
        <div class="input-group">
            <div class="input-label">Select Payment Method</div>
            <select class="select-account" id="paymentMethod">
                <option>BITCOIN (BTC)</option>
                <option>XRP (XRP)</option>
                <option>SOLANA</option>
                <option>Ethereum (ETH)</option>
                <option>TRON (U20SDTTRC)</option>
                <option>SOL (TRUMP)</option>
            </select>
        </div>

        <button class="withdrawal-btn" id="proceedButton">
            <span id="buttonText">Proceed</span>
            <span id="loadingSpinner" style="display: none;">
                <div class="loading-spinner"></div>
            </span>
        </button>
    </div>
</div>


<!-- Include jQuery and Toastr -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Loading Spinner CSS -->
<style>
    .loading-spinner {
        display: inline-block;
        width: 20px;
        height: 20px;
        border: 3px solid rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        border-top-color: #fff;
        animation: spin 1s ease-in-out infinite;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }
</style>

<script>
    $(document).ready(function () {
        $('#proceedButton').on('click', function (e) {
            e.preventDefault();

            // Show loading spinner and disable button
            $('#buttonText').hide();
            $('#loadingSpinner').show();
            $('#proceedButton').prop('disabled', true);

            // Get form data
            const amount = "{{ request('amount') }}";
            const account = "{{ request('account') }}";
            const paymentMethod = $('#paymentMethod').val();

            // Send AJAX request
            $.ajax({
                url: '{{ route("deposit.three.submit") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    amount: amount,
                    account: account,
                    payment_method: paymentMethod
                },
                success: function (response) {
                    // Hide loading spinner and enable button
                    $('#buttonText').show();
                    $('#loadingSpinner').hide();
                    $('#proceedButton').prop('disabled', false);

                    if (response.success) {
                        // Redirect to the new page
                        window.location.href = '{{ route("pay.crypto") }}?amount=' + response.amount + '&account=' + response.account + '&payment_method=' + response.payment_method;
                    } else {
                        // Show error message
                        alert(response.message);
                    }
                },
                error: function (xhr) {
                    // Hide loading spinner and enable button
                    $('#buttonText').show();
                    $('#loadingSpinner').hide();
                    $('#proceedButton').prop('disabled', false);

                    // Show error message
                    alert(xhr.responseJSON.message || 'An error occurred. Please try again.');
                }
            });
        });
    });
</script>
@include('user.layouts.footer')