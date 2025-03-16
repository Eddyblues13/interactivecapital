@include('user.layouts.header')

<!-- Main Content -->
<div class="mx-3 my-4">
    <div class="deposit-card text-white text-center py-5">
        No Deposits yet
    </div>
</div>
<div class="notification">
    <div class="notification-text">
        Deposits will be pending until there are sufficient confirmations on the blockchain.
    </div>
    <button class="close-button">&times;</button>
</div>

<div class="transaction-card">
    <div class="date-section">
        <div class="month fs-6 fw-bold">MAR</div>
        <div class="day fs-2">05</div>
    </div>
    <div class="transaction-details">
        <div class="amount text-silverish">FUND $870.00</div>
        <div class="deposit-description">TRADING BALANCE TOTAL</div>
    </div>
    <div class="deposit-status">Pending</div>
</div>

<!-- Fixed Action Button -->
<button type="button" class="fixed-action-btn" aria-label="Add new item">
    <a href="{{route('deposit.one')}}">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
        </svg>
    </a>
</button>


<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const closedTab = document.getElementById('closed-tab');
        const activeTab = document.getElementById('active-tab');
        const statusMessage = document.getElementById('status-message');

        closedTab.addEventListener('click', function() {
            closedTab.classList.add('active');
            activeTab.classList.remove('active');
            statusMessage.textContent = 'NO CLOSED TRADES';
        });

        activeTab.addEventListener('click', function() {
            activeTab.classList.add('active');
            closedTab.classList.remove('active');
            statusMessage.textContent = 'NO OPEN TRADES';
        });

            // Handle sidebar visibility and dropdowns
    document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.getElementById('sidebar');

    // Open all dropdowns when the sidebar is shown
    sidebar.addEventListener('shown.bs.offcanvas', () => {
        document.querySelectorAll('.dropdown-content').forEach(content => {
            content.classList.add('active');
            const arrow = content.previousElementSibling.querySelector('.arrow');
            if (arrow) {
                arrow.classList.add('up');
            }
        });
    });

    // Optional: Close all dropdowns when the sidebar is hidden
    sidebar.addEventListener('hidden.bs.offcanvas', () => {
        document.querySelectorAll('.dropdown-content').forEach(content => {
            content.classList.remove('active');
            const arrow = content.previousElementSibling.querySelector('.arrow');
            if (arrow) {
                arrow.classList.remove('up');
            }
        });
    });

    // Dropdown button functionality
    document.querySelectorAll('.dropdown-btn').forEach(button => {
        button.addEventListener('click', () => {
            const dropdown = button.nextElementSibling;
            const arrow = button.querySelector('.arrow');
            
            // Close all other dropdowns
            document.querySelectorAll('.dropdown-content').forEach(content => {
                if (content !== dropdown && content.classList.contains('active')) {
                    content.classList.remove('active');
                    content.previousElementSibling.querySelector('.arrow').classList.remove('up');
                }
            });

            // Toggle current dropdown
            dropdown.classList.toggle('active');
            arrow.classList.toggle('up');
        });
    });
});

        
</script>
</body>

</html>