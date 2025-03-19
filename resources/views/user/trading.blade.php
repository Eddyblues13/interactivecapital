@include('user.layouts.header')


<!-- Main Content -->
<div class="container content-area">
    <!-- Filters -->
    <div class="row g-2 mt-3">
        <div class="col-6">
            <select class="form-select">
                <option>ALL</option>
                <option>ETF</option>
                <option>STOCK</option>
                <option>INDEX</option>
                <option>FOREX</option>
                <option>CRYPTO</option>
            </select>
        </div>
        <div class="col-6">
            <select class="form-select">
                <option>DEFAULT</option>
                <option>NAME ASC</option>
                <option>NAME DESC</option>
                <option>SYMBOL ASC</option>
                <option>SYMBOL DESC</option>
                <option>GAINERS 1D</option>
                <option>GAINERS 7D</option>
                <option>GAINERS 30D</option>
                <option>LOSERS 1D</option>
                <option>LOSERS 7D</option>
                <option>LOSERS 30D</option>
            </select>
        </div>
    </div>

    <!-- Search -->
    <div class="row mt-3">
        <div class="col-12">
            <input type="text" class="form-control" placeholder="Search">
        </div>
    </div>

    <!-- Time Tabs - Mobile Only -->
    <div class="time-tabs d-md-none">
        <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
                <a class="nav-link active" href="#">1D</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">7D</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">30D</a>
            </li>
        </ul>
    </div>

    <!-- Desktop Time Labels - Desktop Only -->
    <div class="d-none d-md-flex justify-content-end mt-3 mb-2 pe-5">
        <div style="width: 100px; text-align: center; margin: 0 15px;">
            <span class="time-label">1D</span>
        </div>
        <div style="width: 100px; text-align: center; margin: 0 15px;">
            <span class="time-label">7D</span>
        </div>
        <div style="width: 100px; text-align: center; margin: 0 15px;">
            <span class="time-label">30D</span>
        </div>
        <div style="width: 40px;"></div>
    </div>

    <!-- Assets List -->
    <div class="t-assets-list">
        <!-- 1inch -->
        <div class="t-asset-card">
            <div class="d-flex align-items-center">
                <div class="t-asset-icon me-3">
                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzMiAzMiI+PHBhdGggZmlsbD0iIzFCMzE0RiIgZD0iTTE2IDMyQzcuMTYzIDMyIDAgMjQuODM3IDAgMTZTNy4xNjMgMCAxNiAwczE2IDcuMTYzIDE2IDE2LTcuMTYzIDE2LTE2IDE2eiIvPjxwYXRoIGZpbGw9IiNmZmYiIGQ9Ik0xOC41ODggMTcuNDQ3YTUuNDIgNS40MiAwIDAxLTEuMDEzLS4wOTZjLS4zNjMtLjA3LS43MTUtLjE2OC0xLjA1My0uMjkzYTUuNTQyIDUuNTQyIDAgMDEtLjk2NS0uNDU0IDUuNTYgNS41NiAwIDAxLS44NS0uNTg4IDUuNTQyIDUuNTQyIDAgMDEtLjcwNy0uNjk3IDUuNTQyIDUuNTQyIDAgMDEtLjU0LS43NzUgNS41NDIgNS41NDIgMCAwMS0uMzQ2LS44MjQgNS41NDIgNS41NDIgMCAwMS0uMTI3LS44NDUgNS41NDIgNS41NDIgMCAwMS4xMjctLjg0NSA1LjU0MiA1LjU0MiAwIDAxLjM0Ni0uODI0IDUuNTQyIDUuNTQyIDAgMDEuNTQtLjc3NSA1LjU0MiA1LjU0MiAwIDAxLjcwNy0uNjk3IDUuNTYgNS41NiAwIDAxLjg1LS41ODggNS41NDIgNS41NDIgMCAwMS45NjUtLjQ1NCA1LjU0MiA1LjU0MiAwIDAxMS4wNTMtLjI5MyA1LjQyIDUuNDIgMCAwMTEuMDEzLS4wOTZjLjM0NyAwIC42ODcuMDMyIDEuMDEzLjA5Ni4zNjMuMDcuNzE1LjE2OCAxLjA1My4yOTNhNS41NDIgNS41NDIgMCAwMS45NjUuNDU0IDUuNTYgNS41NiAwIDAxLjg1LjU4OCA1LjU0MiA1LjU0MiAwIDAxLjcwNy42OTcgNS41NDIgNS41NDIgMCAwMS41NC43NzUgNS41NDIgNS41NDIgMCAwMS4zNDYuODI0IDUuNTQyIDUuNTQyIDAgMDEuMTI3Ljg0NSA1LjU0MiA1LjU0MiAwIDAxLS4xMjcuODQ1IDUuNTQyIDUuNTQyIDAgMDEtLjM0Ni44MjQgNS41NDIgNS41NDIgMCAwMS0uNTQuNzc1IDUuNTQyIDUuNTQyIDAgMDEtLjcwNy42OTcgNS41NiA1LjU2IDAgMDEtLjg1LjU4OCA1LjU0MiA1LjU0MiAwIDAxLS45NjUuNDU0IDUuNTQyIDUuNTQyIDAgMDEtMS4wNTMuMjkzIDUuNDIgNS40MiAwIDAxLTEuMDEzLjA5NnptLTYuNTg4LTUuNDJhMy45NTMgMy45NTMgMCAwMC0uMDkuODQ1YzAgLjI5LjAzLjU3NS4wOS44NDVhMy45NTMgMy45NTMgMCAwMC4yNDYuODI0Yy4xMTQuMjcuMjYuNTMuNDM4Ljc3NWEzLjk1MyAzLjk1MyAwIDAwLjYwNS42OTcgMy45NTMgMy45NTMgMCAwMC43NDQuNTg4Yy4yODIuMTguNTg4LjMzLjkxMi40NTRhMy45NTMgMy45NTMgMCAwMDEuMDUzLjI5M2MuMzYzLjA2NC43MzQuMDk2IDEuMTAzLjA5Ni4zNyAwIC43NC0uMDMyIDEuMTAzLS4wOTZhMy45NTMgMy45NTMgMCAwMDEuMDUzLS4yOTNjLjMyNC0uMTI0LjYzLS4yNzQuOTEyLS40NTRhMy45NTMgMy45NTMgMCAwMC43NDQtLjU4OCAzLjk1MyAzLjk1MyAwIDAwLjYwNS0uNjk3Yy4xNzgtLjI0NS4zMjQtLjUwNS40MzgtLjc3NWEzLjk1MyAzLjk1MyAwIDAwLjI0Ni0uODI0Yy4wNi0uMjcuMDktLjU1NS4wOS0uODQ1YTMuOTUzIDMuOTUzIDAgMDAtLjA5LS44NDUgMy45NTMgMy45NTMgMCAwMC0uMjQ2LS44MjQgMy45NTMgMy45NTMgMCAwMC0uNDM4LS43NzUgMy45NTMgMy45NTMgMCAwMC0uNjA1LS42OTcgMy45NTMgMy45NTMgMCAwMC0uNzQ0LS41ODggMy45NTMgMy45NTMgMCAwMC0uOTEyLS40NTQgMy45NTMgMy45NTMgMCAwMC0xLjA1My0uMjkzYy0uMzYzLS4wNjQtLjczNC0uMDk2LTEuMTAzLS4wOTYtLjM3IDAtLjc0LjAzMi0xLjEwMy4wOTZhMy45NTMgMy45NTMgMCAwMC0xLjA1My4yOTNjLS4zMjQuMTI0LS42My4yNzQtLjkxMi40NTRhMy45NTMgMy45NTMgMCAwMC0uNzQ0LjU4OCAzLjk1MyAzLjk1MyAwIDAwLS42MDUuNjk3Yy0uMTc4LjI0NS0uMzI0LjUwNS0uNDM4Ljc3NWEzLjk1MyAzLjk1MyAwIDAwLS4yNDYuODI0eiIvPjwvc3ZnPg=="
                        alt="1inch">
                </div>
                <div class="t-t-asset-info">
                    <div class="t-asset-name text-white">1inch</div>
                    <div class="t-asset-symbol text-header">1INCHUSD | Crypto</div>
                    <div class="t-asset-price text-white">0.262</div>
                </div>

                <!-- Desktop Performance -->
                <div class="desktop-performance d-none d-md-flex">
                    <div class="desktop-performance-cell">
                        <div class="positive">+0.77%</div>
                    </div>
                    <div class="desktop-performance-cell">
                        <div class="negative">-2.6%</div>
                    </div>
                    <div class="desktop-performance-cell">
                        <div class="negative">-17.87%</div>
                    </div>
                </div>

                <div class="star-container">
                    <i class="bi bi-star star-icon-empty"></i>
                </div>
            </div>

            <!-- Mobile Performance Row -->
            <div class="performance-row d-md-none">
                <div class="performance-cell positive">+0.77%</div>
                <div class="performance-cell negative">-2.6%</div>
                <div class="performance-cell negative">-17.87%</div>
            </div>
        </div>

        <!-- Apple -->
        <div class="t-asset-card">
            <div class="d-flex align-items-center">
                <div class="t-asset-icon me-3">
                    <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAzMCAzMCI+PHBhdGggZmlsbD0iI2ZmZmZmZiIgZD0iTTI0LjczIDI2YTExLjI2IDExLjI2IDAgMDEtMS4wOS0yLjU2IDkuNjUgOS42NSAwIDAxLS42My0zLjQ0IDcuMjUgNy4yNSAwIDAxMS4zMS00LjEzIDguMzUgOC4zNSAwIDAxMy42OC0yLjg4IDcuMzQgNy4zNCAwIDAwLTEuMTktMS4xNSA4LjEgOC4xIDAgMDAtNC4yNS0xLjgyIDExLjEzIDExLjEzIDAgMDAtMi4yMy4xOSA2LjIzIDYuMjMgMCAwMS0xLjk1LS4xMSA4LjQzIDguNDMgMCAwMC0yLjE1LS4xOSA4LjQ5IDguNDkgMCAwMC0zLjMzLjkzQTcuMzIgNy4zMiAwIDAwOS44IDEzLjRhOS4zOCA5LjM4IDAgMDAtMS4yNSA0Ljg1IDEwLjY2IDEwLjY2IDAgMDAuODcgNC4yMSA5LjQ0IDkuNDQgMCAwMDEuNjcgMi43NyA2LjY5IDYuNjkgMCAwMDEuODMgMS41MyA0LjQ5IDQuNDkgMCAwMDIuMTMuNTQgNS41OSA1LjU5IDAgMDAyLS4zNyA3LjQgNy40IDAgMDExLjk1LS4zOCA3LjI3IDcuMjcgMCAwMTEuOTUuMzggNS43NiA1Ljc2IDAgMDAxLjk1LjM3IDQuNDkgNC40OSAwIDAwMi4xMy0uNTQgNi42OSA2LjY5IDAgMDAxLjgzLTEuNTNBNS4zOSA1LjM5IDAgMDAyOCAyNGgtLjA5YTUuMzUgNS4zNSAwIDAxLTMuMTggMnptLTMuNDMtMTQuNzVhNy4yNSA3LjI1IDAgMDExLjY5LTEuNTMgNi4wNSA2LjA1IDAgMDExLjk1LS44NyA0LjI0IDQuMjQgMCAwMC0uODctMS4zMSA2LjUxIDYuNTEgMCAwMC00LjU3LTEuOTUgNi43NiA2Ljc2IDAgMDAtLjg3IDMuNjggNi4yIDYuMiAwIDAwMi42NyAxLjk4eiIvPjwvc3ZnPg=="
                        alt="Apple">
                </div>
                <div class="t-asset-info">
                    <div class="t-asset-name text-white">Apple Inc.</div>
                    <div class="t-asset-symbol text-header">AAPL | Stock</div>
                    <div class="t-asset-price text-white">245.27</div>
                </div>

                <!-- Desktop Performance -->
                <div class="desktop-performance d-none d-md-flex">
                    <div class="desktop-performance-cell">
                        <div class="positive">+0.11%</div>
                    </div>
                    <div class="desktop-performance-cell">
                        <div class="positive">+0.25%</div>
                    </div>
                    <div class="desktop-performance-cell">
                        <div class="positive">+10.35%</div>
                    </div>
                </div>

                <div class="star-container">
                    <i class="bi bi-star star-icon"></i>
                </div>
            </div>

            <!-- Mobile Performance Row -->
            <div class="performance-row d-md-none">
                <div class="performance-cell positive">+0.11%</div>
                <div class="performance-cell positive">+0.25%</div>
                <div class="performance-cell positive">+10.35%</div>
            </div>
        </div>
    </div>
</div>

@include('user.layouts.footer')