<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>el capita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Slab:wght@100..900&family=Sahitya:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

</head>

<body>
    <!-- Top Navigation -->
    <div class="top-nav">
        <div class="d-flex">
            <button class="btn mobile-menu text-white" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#sidebar" aria-controls="sidebarMenu">
                <i class="bi bi-list"></i>
            </button>
            <div class="mt-1"><a href="#" class="text-decoration-none text-white">el Capita</a></div>
        </div>

        <div>$0.00 Eweh</div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="sidebar" data-bs-scroll="true"
        data-bs-backdrop="false">
        <div class="profile-section mb-0 d-flex">
            <div class="d-block align-items-center text-center gap-3">
                <div class="profile-image py-4"><img src="assets/img/human.png" alt=""></div>
                <div>
                    <div class="fw-bold text-white">Eweh Ewa</div>
                </div>
            </div>

            <button type="button" class="btn-close mt-4 ms-4" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <!-- Theme Section -->
        <div class="nav-section mt-0">
            <div class="nav-section-title">
                <svg xmlns="http://www.w3.org/2000/svg" height="23px" viewBox="0 -960 960 960" width="23px" fill="#fff">
                    <path
                        d="M480-360q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm-.23 72Q400-288 344-344.23q-56-56.22-56-136Q288-560 344.23-616q56.22-56 136-56Q560-672 616-615.77q56 56.22 56 136Q672-400 615.77-344q-56.22 56-136 56ZM216-444H48v-72h168v72Zm696 0H744v-72h168v72ZM444-744v-168h72v168h-72Zm0 696v-168h72v168h-72ZM269-642 166-742l51-55 102 104-50 51Zm474 475L642-268l49-51 103 101-51 51ZM640-691l102-101 51 49-100 103-53-51ZM163-217l105-99 49 47-98 104-56-52Zm317-263Z" />
                </svg>
                <span class="px-2">Light</span>
            </div>
        </div>

        <div class="nav-section mt-0">
            <div class="nav-section-title">
                <svg xmlns="http://www.w3.org/2000/svg" height="23px" viewBox="0 -960 960 960" width="23px" fill="#fff">
                    <path
                        d="M264-216h96v-240h240v240h96v-348L480-726 264-564v348Zm-72 72v-456l288-216 288 216v456H528v-240h-96v240H192Zm288-327Z" />
                </svg>
                <span class="px-2"><a href="{{route('home')}}">Home</a></span>
            </div>
        </div>

        <div class="nav-section mt-0">
            <div class="nav-section-title">
                <svg xmlns="http://www.w3.org/2000/svg" height="23px" viewBox="0 -960 960 960" width="23px" fill="#fff">
                    <path
                        d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93ZM320-320v-123l221-220q9-9 20-13t22-4q12 0 23 4.5t20 13.5l37 37q8 9 12.5 20t4.5 22q0 11-4 22.5T663-540L443-320H320Zm300-263-37-37 37 37ZM380-380h38l121-122-18-19-19-18-122 121v38Zm141-141-19-18 37 37-18-19Z" />
                </svg>
                <span class="px-2"><a href="{{route('plans')}}">Plans</a></span>
            </div>
        </div>

        <div class="nav-section mt-0">
            <div class="nav-section-title">
                <svg xmlns="http://www.w3.org/2000/svg" height="23px" viewBox="0 -960 960 960" width="23px" fill="#fff">
                    <path d="M624-192v-288h144v288H624Zm-216 0v-576h144v576H408Zm-216 0v-384h144v384H192Z" />
                </svg>
                <span class="px-2"><a href="trading.html">Trading</a></span>
            </div>
        </div>
        <div class="nav-section mt-0">
            <div class="nav-section-title">
                <svg xmlns="http://www.w3.org/2000/svg" height="23px" viewBox="0 -960 960 960" width="23px" fill="#fff">
                    <path
                        d="M120-48q-29.7 0-50.85-21.15Q48-90.3 48-120v-456h72v456h648v72H120Zm144-144q-29.7 0-50.85-21.15Q192-234.3 192-264v-456h192v-72q0-29.7 21.15-50.85Q426.3-864 456-864h192q29.7 0 50.85 21.15Q720-821.7 720-792v72h192v456q0 29.7-21.15 50.85Q869.7-192 840-192H264Zm0-72h576v-384H264v384Zm192-456h192v-72H456v72ZM264-264v-384 384Z" />
                </svg>
                <span class="px-2"><a href="#">Holding</a></span>
            </div>
        </div>
        <div class="nav-section mt-0">
            <div class="nav-section-title">
                <svg xmlns="http://www.w3.org/2000/svg" height="23px" viewBox="0 -960 960 960" width="23px" fill="#fff">
                    <path
                        d="M336-312h288q10.2 0 17.1-6.9 6.9-6.9 6.9-17.1v-204q0-10.2-6.9-17.1-6.9-6.9-17.1-6.9h-60v-60q0-10.2-6.9-17.1-6.9-6.9-17.1-6.9H420q-10.2 0-17.1 6.9-6.9 6.9-6.9 17.1v60h-60q-10.2 0-17.1 6.9-6.9 6.9-6.9 17.1v204q0 10.2 6.9 17.1 6.9 6.9 17.1 6.9Zm96-252v-42h96v42h-96Zm-96 372q-120.34 0-204.17-83.76Q48-359.52 48-479.76T131.83-684q83.83-84 204.17-84h288q120.34 0 204.17 83.76 83.83 83.76 83.83 204T828.17-276Q744.34-192 624-192H336Zm0-72h288q89.64 0 152.82-63.18Q840-390.36 840-480q0-89.64-63.18-152.82Q713.64-696 624-696H336q-89.64 0-152.82 63.18Q120-569.64 120-480q0 89.64 63.18 152.82Q246.36-264 336-264Zm144-216Z" />
                </svg>
                <span class="px-2"><a href="#">Staking</a></span>
            </div>
        </div>
        <div class="nav-section mt-0">
            <div class="nav-section-title">
                <svg xmlns="http://www.w3.org/2000/svg" height="23px" viewBox="0 -960 960 960" width="23px" fill="#fff">
                    <path
                        d="M237-285q54-38 115.5-56.5T480-360q66 0 127.5 18.5T723-285q35-41 52-91t17-104q0-129.67-91.23-220.84-91.23-91.16-221-91.16Q350-792 259-700.84 168-609.67 168-480q0 54 17 104t52 91Zm243-123q-60 0-102-42t-42-102q0-60 42-102t102-42q60 0 102 42t42 102q0 60-42 102t-102 42Zm.28 312Q401-96 331-126t-122.5-82.5Q156-261 126-330.96t-30-149.5Q96-560 126-629.5q30-69.5 82.5-122T330.96-834q69.96-30 149.5-30t149.04 30q69.5 30 122 82.5T834-629.28q30 69.73 30 149Q864-401 834-331t-82.5 122.5Q699-156 629.28-126q-69.73 30-149 30Zm-.28-72q52 0 100-16.5t90-48.5q-43-27-91-41t-99-14q-51 0-99.5 13.5T290-233q42 32 90 48.5T480-168Zm0-312q30 0 51-21t21-51q0-30-21-51t-51-21q-30 0-51 21t-21 51q0 30 21 51t51 21Zm0-72Zm0 319Z" />
                </svg>
                <span class="px-2"><a href="#">Account</a></span>
            </div>
        </div>
        <div class="nav-section mt-0">
            <div class="nav-section-title">
                <svg xmlns="http://www.w3.org/2000/svg" height="23px" viewBox="0 -960 960 960" width="23px" fill="#fff">
                    <path
                        d="M168-192q-29.7 0-50.85-21.15Q96-234.3 96-264v-120h72v120h624v-432H168v120H96v-120q0-30 21.15-51T168-768h624q29.7 0 50.85 21.16Q864-725.68 864-695.96v432.24Q864-234 842.85-213T792-192H168Zm240-120-51-51 81-81H96v-72h342l-81-81 51-51 168 168-168 168Z" />
                </svg>
                <span class="px-2"><a href="{{route('deposit.page')}}">Deposits</a></span>
            </div>
        </div>
        <div class="nav-section mt-0">
            <div class="nav-section-title">
                <svg xmlns="http://www.w3.org/2000/svg" height="23px" viewBox="0 -960 960 960" width="23px" fill="#fff">
                    <path
                        d="M312-240q-29.7 0-50.85-21.15Q240-282.3 240-312v-96h72v96h480v-408H312v96h-72v-168q0-29.7 21.15-50.85Q282.3-864 312-864h480q29.7 0 50.85 21.15Q864-821.7 864-792v480q0 29.7-21.15 50.85Q821.7-240 792-240H312ZM168-96q-29.7 0-50.85-21.15Q96-138.3 96-168v-552h72v552h552v72H168Zm348-264-51-51 69-69H240v-72h294l-69-69 51-51 156 156-156 156Z" />
                </svg>
                <span class="px-2"><a href="#">Withdrawals</a></span>
            </div>
        </div>
        <div class="nav-section mt-0">
            <div class="nav-section-title">
                <svg xmlns="http://www.w3.org/2000/svg" height="23px" viewBox="0 -960 960 960" width="23px" fill="#fff">
                    <path
                        d="M40-160v-112q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v112H40Zm720 0v-120q0-44-24.5-84.5T666-434q51 6 96 20.5t84 35.5q36 20 55 44.5t19 53.5v120H760ZM360-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm400-160q0 66-47 113t-113 47q-11 0-28-2.5t-28-5.5q27-32 41.5-71t14.5-81q0-42-14.5-81T544-792q14-5 28-6.5t28-1.5q66 0 113 47t47 113ZM120-240h480v-32q0-11-5.5-20T580-306q-54-27-109-40.5T360-360q-56 0-111 13.5T140-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T440-640q0-33-23.5-56.5T360-720q-33 0-56.5 23.5T280-640q0 33 23.5 56.5T360-560Zm0 320Zm0-400Z" />
                </svg>
                <span class="px-2"><a href="#">Copy Trading</a></span>
            </div>
        </div>
    </div>