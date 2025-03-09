@include('user.layouts.header')

<!-- Main Content -->
<div class="main-content">
    <!-- Trading Card -->
    <div class="trading-card">
        <div class="chart-area">
            <div class="balance">$0.00</div>
        </div>
        <div class="text-center">TRADING BALANCE</div>
        <div class="progress-bar-custom"></div>
        <div class="text-center">SIGNAL STRENGTH (%)</div>
    </div>


    <!-- Status Card -->
    <div class="status-card">
        <div class="status-header">
            <div class="status-item active" id="closed-tab">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                    fill="#0d6efd">
                    <path
                        d="M320-160h320v-120q0-66-47-113t-113-47q-66 0-113 47t-47 113v120Zm160-360q66 0 113-47t47-113v-120H320v120q0 66 47 113t113 47ZM160-80v-80h80v-120q0-61 28.5-114.5T348-480q-51-32-79.5-85.5T240-680v-120h-80v-80h640v80h-80v120q0 61-28.5 114.5T612-480q51 32 79.5 85.5T720-280v120h80v80H160Zm320-80Zm0-640Z" />
                </svg>
                <span>Closed</span>
            </div>
            <div class="status-item" id="active-tab">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                    fill="#898181">
                    <path
                        d="M320-160h320v-120q0-66-47-113t-113-47q-66 0-113 47t-47 113v120ZM160-80v-80h80v-120q0-61 28.5-114.5T348-480q-51-32-79.5-85.5T240-680v-120h-80v-80h640v80h-80v120q0 61-28.5 114.5T612-480q51 32 79.5 85.5T720-280v120h80v80H160Z" />
                </svg>
                <span>Active</span>
            </div>
        </div>
        <div class="status-message" id="status-message">NO CLOSED TRADES</div>
    </div>
</div>

<!-- Bottom Navigation -->
<div class="bottom-nav">
    <a href="#" class="nav-item active">
        <svg class="nav-icon" viewBox="0 0 24 24">
            <path
                d="M3 13h1v7c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-7h1a1 1 0 0 0 .707-1.707l-9-9a.999.999 0 0 0-1.414 0l-9 9A1 1 0 0 0 3 13zm9-8.586 6 6V20H6v-9.586l6-6z" />
        </svg>
        <span>Home</span>
    </a>
    <a href="#" class="nav-item">
        <svg class="nav-icon" viewBox="0 0 24 24">
            <path
                d="M3 3v17a1 1 0 0 0 1 1h17v-2H5V3H3z M15.293 14.707a1 1 0 0 0 1.414 0l5-5-1.414-1.414L16 12.586l-2.293-2.293a1 1 0 0 0-1.414 0l-5 5 1.414 1.414L13 12.414l2.293 2.293z" />
        </svg>
        <span>Assets</span>
    </a>
    <a href="#" class="nav-item">
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