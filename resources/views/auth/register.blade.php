<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Capita - Learn to Invest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Slab:wght@100..900&family=Sahitya:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="assets/css/styles2.css">
    <script src="{{asset('assets/js/countries.js')}}"></script>
    <script language="javascript">
        populateCountries("country", "state");
        populateCountries("country2");
        populateCountries("country2");
    </script>
</head>

<body class="bg-black">
    <nav class="navbar navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <div class="brand-icon"><img src="assets/img/android-chrome-36x36.png" alt=""></div>
                el capita
            </a>
            <button class="btn mobile-menu menu-icon text-white me-3" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#sidebar" aria-controls="sidebarMenu">
                <i class="bi bi-list"></i>
            </button>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="sidebar" data-bs-scroll="true"
        data-bs-backdrop="false">
        <!-- Sidebar content here -->
    </div>

    <div class="signup-container">
        <h1 class="signup-title">Create An Account</h1>
        <form id="registerForm" class="signup-form">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-input" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-input" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-input" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-input" value="{{ old('first_name') }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-input" value="{{ old('last_name') }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Phone Number</label>
                    <input type="tel" name="phone_number" class="form-input" value="{{ old('phone') }}" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Currency</label>
                    <select name="currency" class="form-select" required>
                        <option value="USD" {{ old('currency')=='USD' ? 'selected' : '' }}>USD</option>
                        <option value="EUR" {{ old('currency')=='EUR' ? 'selected' : '' }}>EUR</option>
                        <option value="GBP" {{ old('currency')=='GBP' ? 'selected' : '' }}>GBP</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Country</label>
                    <select name="country" class="form-select" id="country" required>
                        <option value="AF" {{ old('country')=='AF' ? 'selected' : '' }}>Select</option>
                        <!-- Add more countries -->
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">City</label>
                    <input type="text" name="city" id="state" class="form-input" value="{{ old('city') }}" required>
                </div>
            </div>

            <div class="terms-checkbox d-flex justify-content-center">
                <input type="checkbox" name="terms" class="checkbox-input" {{ old('terms') ? 'checked' : '' }} required>
                <span class="text-primary" style="font-size: 13px;">I Declare That The Information Provided Is Correct
                    And Accept All <a href="#" class="terms-link">Terms Of Service</a></span>
            </div>

            <button type="submit" id="submitButton" class="submit-button">
                <span id="buttonText">CREATE MY ACCOUNT</span>
                <span id="loadingSpinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"
                    style="display: none;"></span>
            </button>
        </form>
    </div>
    <div class="text-center mb-5">
        Already have an account? <a href="{{route('login')}}">Login</a>
    </div>

    <footer class="footer">
        <div class="footer-content">
            <div class="brand">El Capita</div>
            <h2 class="heading">
                Build your wealth with<br>
                <span class="gradient-crypto">cryptocurrencies</span>
                <span class="gradient-step">step by step.</span>
            </h2>
            <div class="footer-bottom">
                <div class="copyright">Copyright © 2024 by El Capita</div>
                <a href="#" class="terms">Terms and Conditions</a>
            </div>
        </div>
        <div class="glow-arc"></div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#registerForm').on('submit', function (e) {
                e.preventDefault();

                // Show loading spinner and disable button
                $('#buttonText').hide();
                $('#loadingSpinner').show();
                $('#submitButton').prop('disabled', true);

                // Send AJAX request
                $.ajax({
                    url: '{{ route("register") }}', // Replace with your Laravel route
                    method: 'POST',
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
                    },
                    success: function (response) {
                        // Hide loading spinner and enable button
                        $('#buttonText').show();
                        $('#loadingSpinner').hide();
                        $('#submitButton').prop('disabled', false);

                        if (response.success) {
                            // Show success message
                            toastr.success(response.message);

                            // Redirect to the specified URL
                            window.location.href = response.redirect;
                        } else {
                            // Show error message
                            toastr.error(response.message);
                        }
                    },
                    error: function (xhr) {
                        // Hide loading spinner and enable button
                        $('#buttonText').show();
                        $('#loadingSpinner').hide();
                        $('#submitButton').prop('disabled', false);

                        // Show error message
                        toastr.error(xhr.responseJSON.message || 'An error occurred. Please try again.');
                    }
                });
            });
        });
    </script>
</body>

</html>