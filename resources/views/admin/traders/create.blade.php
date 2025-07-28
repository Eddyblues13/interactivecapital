@include('admin.header')

<div class="main-panel">
    <div class="content bg-dark">
        <div class="page-inner">
            @if(session('message'))
            <div class="alert alert-success mb-2">{{ session('message') }}</div>
            @endif

            <div class="mt-2 mb-4">
                <h1 class="title1 text-light">Add Trader</h1>
            </div>

            <div class="mb-5 row">
                <div class="col-lg-12">
                    <div class="p-3 card bg-dark">
                        @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form id="addTraderForm" method="POST" action="{{ route('traders.store') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <h5 class="text-light">Trader Name</h5>
                                    <input class="form-control text-light bg-dark" placeholder="Enter trader name"
                                        type="text" name="trader_name" value="{{ old('trader_name') }}" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <h5 class="text-light">Followers</h5>
                                    <input class="form-control text-light bg-dark"
                                        placeholder="Enter number of followers" type="number" name="followers"
                                        value="{{ old('followers') }}" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <h5 class="text-light">Return Rate (Copier ROI)</h5>
                                    <input class="form-control text-light bg-dark" placeholder="Enter return rate"
                                        type="number" step="0.01" name="copier_roi" value="{{ old('copier_roi') }}"
                                        required>
                                </div>

                                <div class="form-group col-md-6">
                                    <h5 class="text-light">Risk Index (0-100)</h5>
                                    <input class="form-control text-light bg-dark" placeholder="Enter risk index"
                                        type="number" step="0.01" min="0" max="100" name="risk_index"
                                        value="{{ old('risk_index') }}" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <h5 class="text-light">Total Copied Trade</h5>
                                    <input class="form-control text-light bg-dark"
                                        placeholder="Enter total copied trade" type="number" name="total_copied_trade"
                                        value="{{ old('total_copied_trade') }}" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <h5 class="text-light">Verified Status</h5>
                                    <select class="form-control text-light bg-dark" name="verified_status" required>
                                        <option value="1" {{ old('verified_status')=='1' ? 'selected' : '' }}>Verified
                                        </option>
                                        <option value="0" {{ old('verified_status')=='0' ? 'selected' : '' }}>Not
                                            Verified</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <h5 class="text-light">Picture</h5>
                                    <input class="form-control text-light bg-dark" type="file" name="picture"
                                        accept="image/*">
                                </div>

                                <div class="form-group col-md-12">
                                    <input type="submit" id="submitBtn" class="btn btn-primary" value="Add Trader">
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.footer')

    <script>
        const form = document.getElementById('addTraderForm');
        const submitBtn = document.getElementById('submitBtn');

        form.addEventListener('submit', async function(event) {
            event.preventDefault();

            // Disable submit button and change text
            submitBtn.disabled = true;
            const originalText = submitBtn.value;
            submitBtn.value = 'Loading...';

            const formData = new FormData(this);

            try {
                const response = await fetch("{{ route('traders.store') }}", {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    }
                });

                const contentType = response.headers.get('content-type') || '';

                if (!response.ok) {
                    if (contentType.includes('application/json')) {
                        const errorData = await response.json();
                        throw errorData;
                    } else {
                        const errorText = await response.text();
                        throw new Error('Server error: ' + errorText);
                    }
                }

                const data = await response.json();

                if (data.success) {
                    toastr.success(data.message || 'Trader added successfully!');
                    setTimeout(() => window.location.href = data.redirect_url || window.location.reload(), 1500);
                } else {
                    toastr.error(data.message || 'Something went wrong.');
                }
            } catch (error) {
                console.error('Error:', error);

                if (error.errors) {
                    Object.values(error.errors).forEach(errArr => {
                        errArr.forEach(msg => toastr.error(msg));
                    });
                } else if (error.message) {
                    toastr.error(error.message);
                } else {
                    toastr.error('An unexpected error occurred. Please check your form fields.');
                }
            } finally {
                // Re-enable submit button and reset text
                submitBtn.disabled = false;
                submitBtn.value = originalText;
            }
        });
    </script>