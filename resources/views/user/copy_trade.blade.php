@include('user.layouts.header')

<!-- Main Content -->
<div class="trading-main-content mx-4 my-4">
    <!-- Search -->
    <div class="search-container">
        <input type="text" id="searchInput" class="search-bar" placeholder="Search by name...">
    </div>

    <!-- Trader Cards Container -->
    <div id="tradersContainer">
        @foreach($traders as $trader)
        <div class="row mb-3 trader-card-wrapper">
            <div class="col-12">
                <div class="trader-card p-4">
                    <div class="row">
                        <!-- Left Column with Image and Button -->
                        <div class="col-auto d-flex flex-column align-items-center">
                            <!-- Display the trader's picture dynamically -->
                            <img src="{{ asset($trader->picture) }}" alt="{{ $trader->name }}"
                                class="profile-image mb-3">
                            <button class="copy-button px-5 rounded" data-trader-id="{{ $trader->id }}"
                                data-min-amount="{{ $trader->min_amount }}">COPY</button>
                        </div>

                        <!-- Right Column with Info and Stats -->
                        <div class="col">
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-1">
                                    <!-- Display the trader's name dynamically -->
                                    <span class="fs-4 me-2 text-white">{{ $trader->name }}</span>
                                    <span class="trophy fs-5">🏆</span>
                                    <!-- Display verified badge if the trader is verified -->
                                    @if($trader->is_verified)
                                    <span class="verified-badge fs-5 me-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960"
                                            width="24px" fill="#0d6efd">
                                            <path
                                                d="m344-60-76-128-144-32 14-148-98-112 98-112-14-148 144-32 76-128 136 58 136-58 76 128 144 32-14 148 98 112-98 112 14 148-144 32-76 128-136-58-136 58Zm34-102 102-44 104 44 56-96 110-26-10-112 74-84-74-86 10-112-110-24-58-96-102 44-104-44-56 96-110 24 10 112-74 86 74 84-10 114 110 24 58 96Zm102-318Zm-42 142 226-226-56-58-170 170-86-84-56 56 142 142Z" />
                                        </svg>
                                    </span>
                                    @endif
                                </div>
                                <div class="trader-label">Trader</div>
                            </div>

                            <div class="row">
                                <div class="col-4 text-center">
                                    <!-- Display the trader's return rate dynamically -->
                                    <div class="stat-value text-white">{{ $trader->return_rate }}%</div>
                                    <div class="stat-label">Return Rate</div>
                                </div>
                                <div class="col-4 text-center">
                                    <!-- Display the trader's followers dynamically -->
                                    <div class="stat-value text-white">{{ $trader->followers }}</div>
                                    <div class="stat-label">Followers</div>
                                </div>
                                <div class="col-4 text-center">
                                    <!-- Display the trader's profit share dynamically -->
                                    <div class="stat-value text-white">{{ $trader->profit_share }}%</div>
                                    <div class="stat-label">Profit Share</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Toastr -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- JavaScript for Search Functionality and Copy Trade -->
<script>
    $(document).ready(function() {
        // Search functionality
        $('#searchInput').on('input', function() {
            const searchQuery = this.value.toLowerCase();
            $('.trader-card-wrapper').each(function() {
                const traderName = $(this).find('.fs-4').text().toLowerCase();
                if (traderName.includes(searchQuery)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });

        // Copy trade functionality
        $('.copy-button').on('click', function() {
            const traderId = $(this).data('trader-id');
            const minAmount = $(this).data('min-amount');
            const button = $(this);

            // Show confirmation dialog
            if (confirm("By copying this Trader you agree to the general copy trading agreement, you can find a link to the agreement below.")) {
                // Disable the button and change text
                button.prop('disabled', true).text('Copying...');

                // AJAX request
                $.ajax({
                    url: '{{route('copy.trader')}}',
                    type: 'POST',
                    data: {
                        trader_id: traderId,
                        min_amount: minAmount,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            // Change button text and color
                            button.removeClass('copy-button').addClass('copied-button').text('Copied');
                            toastr.success('Copy trade successful!');
                        } else {
                            toastr.error(response.message);
                            button.prop('disabled', false).text('COPY');
                        }
                    },
                    error: function(xhr) {
                        toastr.error('An error occurred. Please try again.');
                        button.prop('disabled', false).text('COPY');
                    }
                });
            }
        });
    });
</script>

<style>
    .copied-button {
        background-color: green;
        color: white;
        border: none;
    }
</style>

@include('user.layouts.footer')