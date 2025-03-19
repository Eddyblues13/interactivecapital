@include('user.layouts.header')
<!-- Main Content -->
<div class="container-fluid content-area py-1">
    <div class="row">
        <div class="col-lg-4 col-md-12 col-sm-4">
            <div class="d-flex gap-2">
                <select class="form-select" style="max-width: 140px;">
                    <option>CRYPTO</option>
                    <option>STOCKS</option>
                    <option>FOREX</option>
                </select>
                <select class="form-select" style="max-width: 140px;">
                    <option>ZRXUSD</option>
                    <option>BTCUSD</option>
                    <option>ETHUSD</option>
                </select>
                <select class="form-select" style="max-width: 140px;">
                    <option>LIVE</option>
                    <option>DEMO</option>
                </select>
            </div>
            <div
                class="ct-trades-card mt-4 h-25 d-flex justify-content-center align-items-center text-header desktop-only">
                <div>NO OPEN TRADES</div>
            </div>

        </div>
        <div class="col-lg-6 col-md-12 col-sm-12">
            <h1 class="asset-title text-header">ZRXUSD</h1>
            <div class="chart-container">
                <div class="chart-area">
                    <div class="chart-highlight"></div>
                    <div class="chart-line"></div>
                </div>
                <div class="price-levels">
                    <div>0.2526000</div>
                    <div>0.2525000</div>
                    <div>0.2524000</div>
                    <div>0.2523000</div>
                    <div>0.2522000</div>
                    <div>0.2521000</div>
                    <div>0.2520000</div>
                    <div>0.2519000</div>
                    <div>0.2518000</div>
                    <div>0.2517000</div>
                    <div>0.2516000</div>
                    <div>0.2515000</div>
                    <div>0.2514000</div>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="desktop-only">
                <!-- Amount USD -->
                <div class="mb-3">
                    <div class="ct-input-label">
                        <span>Amount (USD)</span>
                    </div>
                    <input type="text" class="form-control text-header" value="0">
                </div>

                <!-- Amount ZRX -->
                <div class="mb-3">
                    <div class="ct-input-label">
                        <span>Amount (ZRX)</span>
                        <span>(0.31054 USD)</span>
                    </div>
                    <input type="text" class="form-control" value="0">
                </div>

                <!-- Leverage -->
                <div class="mb-3">
                    <div class="ct-input-label">
                        <span>Leverage</span>
                        <span>(250 MAX)</span>
                    </div>
                    <input type="text" class="form-control" value="100">
                </div>

                <!-- Time -->
                <div class="mb-4">
                    <div class="ct-input-label">
                        <span>Time (Minutes)</span>
                    </div>
                    <input type="text" class="form-control" value="5">
                </div>

                <!-- Trading Buttons -->
                <button class="btn btn-up w-100">UP</button>
                <button class="btn btn-down w-100 mb">DOWN</button>
            </div>
        </div>
    </div>
    <!-- Mobile Trading Buttons -->
    <div class="mobile-trading-buttons d-md-none">
        <button class="btn btn-up">UP</button>
        <button class="btn btn-down">DOWN</button>
    </div>
</div>

<!-- Bottom Navigation -->
<div class="bottom-nav">
    <a href="{{route('home')}}" class="nav-item active">
        <svg class="nav-icon" viewBox="0 0 24 24">
            <path
                d="M3 13h1v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7h1a1 1 0 0 0 .707-1.707l-9-9a.999.999 0 0 0-1.414 0l-9 9A1 1 0 0 0 3 13zm9-8.586 6 6V20H6v-9.586l6-6z" />
        </svg>
        <span>Home</span>
    </a>
    <a href="{{route('current.trade')}}" class="nav-item">
        <svg class="nav-icon" viewBox="0 0 24 24">
            <path
                d="M3 3v17a1 1 0 0 0 1 1h17v-2H5V3H3z M15.293 14.707a1 1 0 0 0 1.414 0l5-5-1.414-1.414L16 12.586l-2.293-2.293a1 1 0 0 0-1.414 0l-5 5 1.414 1.414L13 12.414l2.293 2.293z" />
        </svg>
        <span>Assets</span>
    </a>
    <a href="{{route('trading')}}" class="nav-item">
        <svg class="nav-icon" viewBox="0 0 24 24">
            <path
                d="M19 3H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM5 19V5h14l.002 14H5z" />
            <path d="m11 7-4 4h3v4h2v-4h3z" />
        </svg>
        <span>Trade</span>
    </a>
    <a href="#" class="nav-item">
        <svg class="nav-icon" viewBox="0 0 24 24">
            <path
                d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z" />
            <path d="M9.999 13.587 7.7 11.292l-1.412 1.416 3.713 3.705 6.706-6.706-1.414-1.414z" />
        </svg>
        <span>Closed Trades</span>
    </a>
    <a href="#" class="nav-item">
        <svg class="nav-icon" viewBox="0 0 24 24">
            <path
                d="M12 2l2.582 6.953L22 9.257l-5.822 4.602L18.18 21 12 16.89 5.82 21l2.002-7.141L2 9.257l7.418-.304z" />
        </svg>
        <span>Star</span>
    </a>
</div>

@include('user.layouts.footer')