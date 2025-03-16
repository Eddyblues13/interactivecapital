@include('user.layouts.header')
<style>
    .main-content {
        display: flex;
        padding: 20px;
        gap: 20px;
    }

    .balance-card {
        background-color: #1e1a4d;
        border-radius: 10px;
        padding: 20px;
        width: 45%;
    }

    .chart-area {
        height: 150px;
        background: url('https://hebbkx1anhila5yf.public.blob.vercel-storage.com/Screenshot%20%28153%29-7INbk4WbQBmgNDkkxB1VmghP2g1GhL.png') no-repeat;
        background-size: cover;
        margin-bottom: 20px;
    }

    .balance-info {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .balance-amount {
        font-size: 24px;
        margin-bottom: 5px;
    }

    .balance-label {
        color: #6c757d;
        font-size: 12px;
    }

    .deposit-button {
        background: transparent;
        border: 1px solid #0d6efd;
        color: #0d6efd;
        padding: 10px;
        width: 100%;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
    }

    .assets-list {
        width: 55%;
    }

    .asset-card {
        background-color: #1a1f2b;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .asset-info {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .asset-icon {
        width: 40px;
        height: 40px;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }

    .asset-details {
        font-size: 14px;
    }

    .asset-balance {
        margin-bottom: 3px;
    }

    .asset-value {
        color: #6c757d;
    }

    .asset-type {
        text-align: right;
        font-size: 14px;
    }

    .asset-name {
        margin-bottom: 3px;
    }

    .asset-category {
        color: #6c757d;
    }
</style>




<div class="main-content">
    <div class="balance-card">
        <div class="chart-area"></div>
        <div class="balance-info">
            <div>
                <div class="balance-amount">$0.00</div>
                <div class="balance-label">HOLDING BALANCE</div>
            </div>
            <div>
                <div class="balance-amount">$0.00</div>
                <div class="balance-label">VALUE OF HOLDINGS</div>
            </div>
        </div>
        <button class="deposit-button">DEPOSIT</button>
    </div>

    <div class="assets-list">
        <div class="asset-card">
            <div class="asset-info">
                <div class="asset-icon" style="background-color: #F7931A;">₿</div>
                <div class="asset-details">
                    <div class="asset-balance">0.00 BTC</div>
                    <div class="asset-value">$0.00</div>
                </div>
            </div>
            <div class="asset-type">
                <div class="asset-name">Bitcoin</div>
                <div class="asset-category">crypto</div>
            </div>
        </div>

        <div class="asset-card">
            <div class="asset-info">
                <div class="asset-icon" style="background-color: #627EEA;">Ξ</div>
                <div class="asset-details">
                    <div class="asset-balance">0.00 ETH</div>
                    <div class="asset-value">$0.00</div>
                </div>
            </div>
            <div class="asset-type">
                <div class="asset-name">Ethereum</div>
                <div class="asset-category">crypto</div>
            </div>
        </div>

        <div class="asset-card">
            <div class="asset-info">
                <div class="asset-icon" style="background-color: white; color: black;">
                    <svg viewBox="0 0 24 24" width="24" height="24">
                        <path fill="currentColor"
                            d="M18.71 19.5C17.88 20.74 17 21.95 15.66 21.97C14.32 22 13.89 21.18 12.37 21.18C10.84 21.18 10.37 21.95 9.09997 22C7.78997 22.05 6.79997 20.68 5.95997 19.47C4.24997 17 2.93997 12.45 4.69997 9.39C5.56997 7.87 7.12997 6.91 8.81997 6.88C10.1 6.86 11.32 7.75 12.11 7.75C12.89 7.75 14.37 6.68 15.92 6.84C16.57 6.87 18.39 7.1 19.56 8.82C19.47 8.88 17.39 10.1 17.41 12.63C17.44 15.65 20.06 16.66 20.09 16.67C20.06 16.74 19.67 18.11 18.71 19.5ZM13 3.5C13.73 2.67 14.94 2.04 15.94 2C16.07 3.17 15.6 4.35 14.9 5.19C14.21 6.04 13.07 6.7 11.95 6.61C11.8 5.46 12.36 4.26 13 3.5Z" />
                    </svg>
                </div>
                <div class="asset-details">
                    <div class="asset-balance">0.00 AAPL</div>
                    <div class="asset-value">$0.00</div>
                </div>
            </div>
            <div class="asset-type">
                <div class="asset-name">Apple</div>
                <div class="asset-category">stock</div>
            </div>
        </div>

        <div class="asset-card">
            <div class="asset-info">
                <div class="asset-icon" style="background-color: white;">
                    <svg viewBox="0 0 24 24" width="24" height="24">
                        <path fill="#00A4EF" d="M2 3H22V21H2V3M20 5H4V19H20V5M9 8H11V16H9V8M13 8H15V16H13V8Z" />
                    </svg>
                </div>
                <div class="asset-details">
                    <div class="asset-balance">0.00 MSFT</div>
                    <div class="asset-value">$0.00</div>
                </div>
            </div>
            <div class="asset-type">
                <div class="asset-name">Microsoft</div>
                <div class="asset-category">stock</div>
            </div>
        </div>
    </div>
</div>

@include('user.layouts.footer')