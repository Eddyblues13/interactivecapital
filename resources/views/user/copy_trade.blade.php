@include('user.layouts.header')

<!-- Main Content -->
<div class="trading-main-content mx-4 my-4">
    <!-- Search -->
    <div class="search-container">
        <input type="text" class="search-bar" placeholder="Search">
    </div>

    <!-- Trader Cards -->
    <div class="row mb-3">
        <div class="col-12">
            <div class="trader-card p-4">
                <div class="row">
                    <!-- Left Column with Image and Button -->
                    <div class="col-auto d-flex flex-column align-items-center">
                        <img src="assets/img/trader.png" alt="Vultures trades" class="profile-image mb-3">
                        <button class="copy-button px-5 rounded">COPY</button>
                    </div>

                    <!-- Right Column with Info and Stats -->
                    <div class="col">
                        <div class="mb-3">
                            <div class="d-flex align-items-center mb-1">
                                <span class="fs-4 me-2 text-white">Vultures trades</span>
                                <span class="trophy fs-5">🏆</span>
                                <span class="verified-badge fs-5 me-1"><svg xmlns="http://www.w3.org/2000/svg"
                                        height="24px" viewBox="0 -960 960 960" width="24px" fill="#0d6efd">
                                        <path
                                            d="m344-60-76-128-144-32 14-148-98-112 98-112-14-148 144-32 76-128 136 58 136-58 76 128 144 32-14 148 98 112-98 112 14 148-144 32-76 128-136-58-136 58Zm34-102 102-44 104 44 56-96 110-26-10-112 74-84-74-86 10-112-110-24-58-96-102 44-104-44-56 96-110 24 10 112-74 86 74 84-10 114 110 24 58 96Zm102-318Zm-42 142 226-226-56-58-170 170-86-84-56 56 142 142Z" />
                                    </svg></span>
                            </div>
                            <div class="trader-label">Trader</div>
                        </div>

                        <div class="row">
                            <div class="col-4 text-center">
                                <div class="stat-value text-white">97.84</div>
                                <div class="stat-label">Return Rate</div>
                            </div>
                            <div class="col-4 text-center">
                                <div class="stat-value text-white">3571</div>
                                <div class="stat-label">Followers</div>
                            </div>
                            <div class="col-4 text-center">
                                <div class="stat-value text-white">20%</div>
                                <div class="stat-label">Profit Share</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('user.layouts.footer')