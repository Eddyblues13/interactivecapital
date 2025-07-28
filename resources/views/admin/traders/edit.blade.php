@include('admin.header')

<div class="main-panel">
    <div class="content bg-dark">
        <div class="page-inner">
            @if(session('message'))
            <div class="alert alert-success mb-2">{{ session('message') }}</div>
            @endif
            <div class="mt-2 mb-4">
                <h1 class="title1 text-light">Edit Trader</h1>
            </div>
            <div class="mb-5 row">
                <div class="col-lg-12">
                    <div class="p-3 card bg-dark">
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
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

                        <form id="editTraderForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <h5 class="text-light">Trader Name</h5>
                                    <input class="form-control text-light bg-dark" placeholder="Enter trader name"
                                        type="text" name="trader_name" value="{{ old('trader_name', $trader->name) }}"
                                        required>
                                </div>

                                <div class="form-group col-md-6">
                                    <h5 class="text-light">Followers</h5>
                                    <input class="form-control text-light bg-dark"
                                        placeholder="Enter number of followers" type="number" name="followers"
                                        value="{{ old('followers', $trader->followers) }}" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <h5 class="text-light">Return Rate (Copier ROI)</h5>
                                    <input class="form-control text-light bg-dark" placeholder="Enter return rate"
                                        type="number" step="0.01" name="copier_roi"
                                        value="{{ old('copier_roi', $trader->return_rate) }}" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <h5 class="text-light">Risk Index (0-100)</h5>
                                    <input class="form-control text-light bg-dark" placeholder="Enter risk index"
                                        type="number" step="0.01" min="0" max="100" name="risk_index"
                                        value="{{ old('risk_index', $trader->risk_index) }}" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <h5 class="text-light">Total Copied Trade</h5>
                                    <input class="form-control text-light bg-dark"
                                        placeholder="Enter total copied trade" type="number" name="total_copied_trade"
                                        value="{{ old('total_copied_trade', $trader->total_copied_trade) }}" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <h5 class="text-light">Profit Share</h5>
                                    <input class="form-control text-light bg-dark" placeholder="Enter profit share"
                                        type="number" step="0.01" name="profit_share"
                                        value="{{ old('profit_share', $trader->profit_share) }}" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <h5 class="text-light">Verified Status</h5>
                                    <select class="form-control text-light bg-dark" name="verified_status" required>
                                        <option value="1" {{ old('verified_status', $trader->is_verified) == 1 ?
                                            'selected' : '' }}>Verified</option>
                                        <option value="0" {{ old('verified_status', $trader->is_verified) == 0 ?
                                            'selected' : '' }}>Not Verified</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <h5 class="text-light">Picture</h5>
                                    <input class="form-control text-light bg-dark" type="file" name="picture">
                                    @if($trader->picture_url)
                                    <img src="{{ asset($trader->picture_url) }}" alt="Trader Picture"
                                        class="img-thumbnail mt-2" width="100">
                                    @endif
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" name="remove_picture"
                                            id="remove_picture" value="1">
                                        <label class="form-check-label text-light" for="remove_picture">Remove existing
                                            picture</label>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <input type="submit" id="submitBtn" class="btn btn-primary" value="Update Trader">
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
        const form = document.getElementById('editTraderForm');
        const submitBtn = document.getElementById('submitBtn');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            submitBtn.disabled = true;
            const originalText = submitBtn.value;
            submitBtn.value = 'Updating...';

            const formData = new FormData(this);

            fetch("{{ route('traders.update', $trader->id) }}", {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'X-HTTP-Method-Override': 'PUT' // Spoof PUT method for Laravel
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    toastr.success(data.message || 'Trader updated successfully!');
                    setTimeout(() => window.location.href = data.redirect_url || window.location.reload(), 1500);
                } else {
                    toastr.error(data.message || 'An error occurred.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                toastr.error('An unexpected error occurred.');
            })
            .finally(() => {
                submitBtn.disabled = false;
                submitBtn.value = originalText;
            });
        });
    </script>