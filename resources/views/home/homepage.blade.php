@include('home.header')

<div class="container text-center py-5">
    <div class="category-label">
        TRAINING & COMMUNITY
    </div>

    <h1 class="hero-heading">
        Learn how to <span class="gradient-invest">invest</span><br>
        <span class="gradient-successfully">successfully</span>
        <span class="gradient-and">&</span>
        <span class="gradient-safely">safely</span>
    </h1>

    <p class="hero-subtitle">
        Absolute top experts show you how to invest strategically to make your
        money work for you sustainably.
    </p>

    <div class="buttons mb-5 d-flex justify-content-center">
        <a href="{{route('login')}}" class="btn btn-login">Login my account</a>
        <a href="{{route('register')}}" class="btn btn-create">Create account</a>
    </div>
    <div class="participants-section">
        <div class="avatar-group">
            <img src="assets/img/CRYParticipants.webp" width="250" alt="">
        </div>
        <div class="participants-text">1M+ succesful participants</div>
    </div>

    <!-- Copy Top Investors Section -->
    <div class="row align-items-center my-5 py-5">
        <div class="col-md-6 position-relative">
            <div class="video-card">
                <video autoplay muted loop>
                    <source src="assets/videos/Toro-Investors.mp4" type="video/mp4">
                </video>
            </div>
        </div>
        <div class="col-md-6">
            <h2 class="section-heading mb-4">Copy top investors</h2>
            <p class="section-text">
                With Interactive Capital Pro innovative CopyTrader™, you can automatically copy the moves of other
                investors. Find
                investors you believe in and replicate their actions in real time.
            </p>
        </div>
    </div>

    <!-- Trading Options Section -->
    <div class="text-center my-5 py-5">
        <h2 class="section-heading mb-5">
            What can you <span class="gradient-trade">Trade</span> with
            <span class="gradient-brand">Interactive Capital Pro</span>?
        </h2>

        <div class=" d-flex justify-content-center">
            <div class="row g-4 mx-1">
                <div class="col-lg-4">
                    <div class="trading-option">
                        <div class="trading-icon">
                            <svg viewBox="0 0 24 24" class="icon" fill="none" stroke="currentColor" stroke-width="2">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z" />
                                <path d="M15 9l-3 3-3-3" />
                            </svg>
                        </div>
                        <div class="trading-label">Forex</div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trading-option">
                        <div class="trading-icon">
                            <svg viewBox="0 0 24 24" class="icon" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M3 3v18h18" />
                                <path d="M19 9l-5 5-4-4-3 3" />
                            </svg>
                        </div>
                        <div class="trading-label">Stocks</div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trading-option">
                        <div class="trading-icon">
                            <svg viewBox="0 0 24 24" class="icon" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M2 17h2v5h16V17h2M4 17l8-15 8 15" />
                            </svg>
                        </div>
                        <div class="trading-label">Commodities</div>
                    </div>
                </div>
            </div>
            <div class="row g-4 mx-1">
                <div class="col-lg-4">
                    <div class="trading-option">
                        <div class="trading-icon">
                            <svg viewBox="0 0 24 24" class="icon" fill="none" stroke="currentColor" stroke-width="2">
                                <rect x="3" y="3" width="18" height="18" rx="2" />
                                <path d="M7 7h10M7 12h10M7 17h10" />
                            </svg>
                        </div>
                        <div class="trading-label">ETFs</div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trading-option">
                        <div class="trading-icon">
                            <svg viewBox="0 0 24 24" class="icon" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                            </svg>
                        </div>
                        <div class="trading-label">Crypto</div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="trading-option">
                        <div class="trading-icon">
                            <svg viewBox="0 0 24 24" class="icon" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M3 3v18h18" />
                                <path d="M3 12h18M3 6h18M3 18h18" />
                            </svg>
                        </div>
                        <div class="trading-label">Indices</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<section class="bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 video-card">
                <video autoplay muted loop>
                    <source src="assets/videos/Toro-Portfolios.mp4" type="video/mp4">
                </video>
            </div>

            <div class="col-lg-6 d-flex justify-content-center align-items-center px-4">
                <p class="text-dark fs-5 white-text">Interactive Capital Pro Stock trading offers an exciting
                    opportunity to grow
                    your wealth by investing in companies you believe in. It’s all about buying shares in businesses
                    and benefiting as they grow and succeed.</p>
            </div>
        </div>
    </div>

</section>
<section class="reasons-container py-4">
    <h2 class="section-heading text-center">
        <span class="gradient-text">3 Reasons</span> To Choose Us
    </h2>

    <div class="reasons-grid container">
        <!-- Secured Card -->
        <div class="reason-card px-4">
            <div class="reason-label">REASON 1</div>
            <div class="text-end">
                <img src="assets/img/CryReason2.avif" alt="Security Lock" class="reason-icon">
            </div>
            <h3 class="reason-title">Secured</h3>
            <p class="reason-description">
                We prioritize your data's safety with advanced encryption, regular audits, and robust firewalls.
                Trust us to provide a secure environment, ensuring your sensitive information stays confidential and
                protected. Your safety is our priority, giving you peace of mind every step.
            </p>
        </div>

        <!-- Leverage Card -->
        <div class="reason-card px-4">
            <div class="reason-label">REASON 2</div>
            <div class="text-end">
                <img src="assets/img/CryReason3.avif" alt="Security Lock" class="reason-icon">
            </div>
            <h3 class="reason-title">Leverage</h3>
            <p class="reason-description">
                Maximize your potential by amplifying your positions. Our platform ensures seamless leverage
                management, empowering you to achieve greater profits. Take advantage of this feature responsibly
                and unlock greater opportunities.
            </p>
        </div>

        <!-- Crypto Payments Card -->
        <div class="reason-card px-4">
            <div class="reason-label">REASON 3</div>
            <div class="text-end">
                <img src="assets/img/CryReason1.avif" alt="Security Lock" class="reason-icon">
            </div>
            <h3 class="reason-title">Crypto Payments</h3>
            <p class="reason-description">
                Enjoy the flexibility of using your favorite cryptocurrencies for seamless, secure transactions. Our
                platform embraces innovation, offering fast processing and enhanced privacy. Join us to experience a
                modern payment solution that meets your needs.
            </p>
        </div>
    </div>
</section>

<!-- <section class="py-5">
    <div class="container">
        <h3 class="section-heading text-center">
            The best time to invest was 2009.
             <span class="gradient-text">The second best time is now.</span>
        </h3>
        <div class="d-flex justify-content-center px-5">
            <div class="crypto-chart">
                <img src="assets/img/crypChart.png" alt="img">
            </div>
        </div>  
    </div>
</section> -->
<div class="container home-faq">
    <h2 class="section-heading text-center py-4">
        <span class="gradient-text">Frequently Asked</span> Questions
    </h2>
    <div class="row d-flex justify-content-center">
        <!-- Left Column -->
        <div class="col-md-8 mb-4">
            <div class="accordion" id="faqAccordion1">
                <!-- FAQ Item 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            How to start trading with Interactive Capital Pro?

                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#faqAccordion1">
                        <div class="accordion-body">
                            Create An Account.
                            Confirm your identity and eligibility for a financial account (KYC).
                            Fund your Interactive Capital Pro Trading account by connecting your digital wallet.
                            Login and start trading.

                        </div>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            How to create an account and confirm your email address?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#faqAccordion1">
                        <div class="accordion-body">
                            Click the Sign-Up Button to sign up for an account with Interactive Capital Pro.
                            Please complete the form, read the terms and conditions, and click the Sign-Up button.
                            You’ll receive an email with a unique verification link.
                            Verify by clicking or copying/pasting the link to your browser URL. (If you can’t find
                            the email, look in your junk mail, spam, and any other folders your inbox may have. If,
                            for some reason, you still don’t receive the email and would like to resend, visit the
                            login page and click on Resend verification email. Enter your email and click ‘Send
                            Confirmation Email’). Once verified, you can log in to yourInteractive Capital Pro account
                            and
                            verify your identity.

                        </div>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Confirm your identification and eligibility for trading?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#faqAccordion1">
                        <div class="accordion-body">
                            You must upload some documents, such as your passport, driver’s license, and proof of
                            address (a complete list is available when you start).
                            Please double-check that your documents are still valid (Document invalidation takes
                            place five days before the system expires).
                            After you’ve uploaded your pictures, you can move forward by clicking Confirm and
                            Proceed.
                            Next, update your personal profile, which is general Information.

                        </div>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            How do I deposit money and fund my account with Interactive Capital Pro?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                        data-bs-parent="#faqAccordion1">
                        <div class="accordion-body">
                            You are given a personal dashboard when you create your Interactive Capital ProAccount.
                            Follow your
                            account’s on-screen instructions, depending on the payment method chosen (Bitcoin or
                            USDT). The options available to you will be shown. Select “Deposit” in the left hand
                            menu.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            Is Interactive Capital Pro a regulated broker?
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                        data-bs-parent="#faqAccordion1">
                        <div class="accordion-body">
                            We suggest to have around $3000-$5000 in your account in BTC value due to exchanges
                            minimum order requirements and so that you can at least cover the subscription cost
                            every month.
                        </div>
                    </div>
                </div>

                <!-- FAQ Item 6 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingSix">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            How to withdraw money from Interactive Capital Pro?
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                        data-bs-parent="#faqAccordion2">
                        <div class="accordion-body">
                            In your personal dashboard, Navigate to the withdraw section, select your payment method
                            and click confirm. Then follow the instructions within your account, depending on the
                            chosen payment method.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@include('home.footer')