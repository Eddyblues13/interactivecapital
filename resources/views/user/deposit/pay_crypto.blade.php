@include('user.layouts.header')
<!-- Main Content -->
<div class="pay-crypto-main-content">
    <div class="pay-crypto-payment-card">
        <div class="send-amount text-secondary">SEND 0.00978809 BTC</div>
        <div class="instruction">TO THE WALLET ADDRESS BELOW OR SCAN THE QR CODE WITH YOUR WALLET APP</div>
        <div class="wallet-address">bckpza7n7y0j27sz08ypk55x98uaqyvp4gpg9408mu</div>

        <div class="qr-code">
            <img src="assets/img/qrcode.png" alt="QR Code" style="width: 100%; height: 100%;">
        </div>

        <div class="timer text-secondary">58:51</div>
        <div class="status">Awaiting Payment</div>

        <button class="button px-4" onclick="copyToClipboard()">CLICK TO COPY WALLET ADDRESS</button>
        <button class="button px-4">I HAVE MADE THE PAYMENT</button>
        <button class="diff-button px-4">WAIT FOR CONFIRMATION</button>
    </div>
</div>

<script>
    function copyToClipboard() {
        const walletAddress = document.querySelector('.wallet-address').innerText;
        navigator.clipboard.writeText(walletAddress).then(() => {
            alert('Wallet address copied to clipboard!');
        });
    }
</script>

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