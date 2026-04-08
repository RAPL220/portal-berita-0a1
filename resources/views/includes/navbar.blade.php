<!-- Navigation Bar -->
<nav class="navbar sticky top-0 z-50 bg-dark shadow-sm" id="navbar">
    <div class="nav-container">
        <!-- Top Row -->
        <div class="nav-top flex justify-between items-center py-3 px-4 lg:py-5 lg:px-14">
            <div class="flex gap-10 w-full items-center">
                <!-- Logo -->
                <a href="{{ route('landing') }}" class="flex items-center gap-2">
                    <div class="logo-section">
                        <div class="logo-wrapper">
                            <img id="logo_navbar" src="{{ asset('/asset/img/logo_fokuskito.png') }}" alt="Logo">
                        </div>
                    </div>
                </a>

                <!-- Desktop Navigation Menu -->
                <div class="hidden lg:flex flex-row items-center gap-10 w-full">
                    <ul class="nav-menu flex flex-row items-center gap-4 font-medium text-base w-full">
                        <li>
                            <a href="{{ route('landing') }}"
                                class="nav-link {{ request()->is('/') ? 'active' : '' }}">Beranda</a>
                        </li>

                        <!-- Dropdown: Kategori -->
                        <li class="nav-dropdown-item">
                            <button class="nav-link nav-dropdown-trigger flex items-center gap-1">
                                Kategori
                                <svg class="dropdown-chevron w-4 h-4 transition-transform duration-300" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div class="nav-dropdown-menu">
                                <div class="nav-dropdown-inner">
                                    @foreach (\App\Models\Categories::all() as $category)
                                        <a href="{{ route('news.category', $category->slug) }}"
                                            class="nav-dropdown-link {{ request()->is($category->slug) ? 'active' : '' }}">
                                            <span class="dropdown-dot"></span>
                                            {{ $category->title }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Desktop: Date, Search, Login -->
            <div class="nav-actions hidden lg:flex items-center gap-4 w-full lg:w-auto">
                <div class="date-display text-white font-semibold text-sm whitespace-nowrap">
                    <span id="currentDate"></span>
                </div>

                <div class="search-box relative w-full lg:w-auto">
                    <form action="{{ route('news.index') }}" method="GET">
                        <input name="search" type="text" placeholder="Cari berita..." class="search-input"
                            id="searchInput" />
                    </form>
                    <span class="search-icon">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>
                </div>

                <a href="/admin" class="btn-login">Masuk</a>
            </div>

            <!-- Mobile: Date + Hamburger -->
            <div class="date-display-mobile text-white font-semibold text-xs flex-shrink-0 lg:hidden">
                <span id="currentDateMobile" style="white-space: nowrap;"></span>
            </div>
            <button class="menu-toggle lg:hidden text-white focus:outline-none ml-3" id="menu-toggle">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" id="hamburger-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" id="close-icon">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Mobile: Scrollable Categories -->
        <div class="mobile-categories lg:hidden pb-3 relative">
            <div class="categories-scroll-container overflow-x-auto px-4" id="categoriesContainer">
                <ul class="categories-scroll flex gap-4 whitespace-nowrap">
                    <li>
                        <a href="{{ route('landing') }}"
                            class="category-link {{ request()->is('/') ? 'active' : '' }}">BERANDA</a>
                    </li>
                    @foreach (\App\Models\Categories::all() as $category)
                        <li>
                            <a href="{{ route('news.category', $category->slug) }}"
                                class="category-link {{ request()->is($category->slug) ? 'active' : '' }}">{{ strtoupper($category->title) }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="scroll-indicator left-indicator" id="leftIndicator"></div>
            <div class="scroll-indicator right-indicator" id="rightIndicator"></div>
        </div>
    </div>

    <!-- Mobile Dropdown Menu -->
    <div id="mobile-menu" class="mobile-dropdown hidden lg:hidden">
        <div class="mobile-menu-content p-4">
            <div class="search-box-mobile relative mb-3">
                <form action="{{ route('news.index') }}" method="GET">
                    <input name="search" type="text" placeholder="Cari berita..." class="search-input-mobile" />
                </form>
            </div>
            <div class="flex items-center justify-end gap-3">
                <a href="/admin" class="btn-login-mobile">Masuk</a>
            </div>
        </div>
    </div>
</nav>

<style>
    :root {
        --primary: #FF6B35;
        --primary-dark: #E85A2A;
        --bg-dark: #1A1A1A;
        --bg-dark-secondary: #2D2D2D;
        --text-dark: #1A1A1A;
        --text-gray: #64748B;
        --border-light: #E2E8F0;
    }

    .logo-wrapper {
        background: white;
        padding: 0px 30px !important;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    #logo_navbar {
        max-height: 55px;
        width: auto;
        transform: scale(1.8);
        transform-origin: center;
        display: block;
    }

    .navbar {
        background: linear-gradient(135deg, var(--bg-dark) 0%, var(--bg-dark-secondary) 100%);
        backdrop-filter: blur(10px);
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.3);
        transition: all 0.3s ease;
    }

    .navbar.scrolled {
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.4);
    }

    .logo-section {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .nav-menu {
        display: flex;
        list-style: none;
        gap: 2.5rem;
    }

    /* Nav Links */
    .nav-link {
        text-decoration: none;
        color: white;
        font-weight: 700;
        font-size: 0.95rem;
        transition: color 0.3s ease;
        position: relative;
        padding: 0.5rem 0;
        background: none;
        border: none;
        cursor: pointer;
    }

    .nav-link:hover,
    .nav-link.active {
        color: var(--primary);
    }

    .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: var(--primary);
        border-radius: 2px;
    }

    /* ==================== DROPDOWN ==================== */
    .nav-dropdown-item {
        position: relative;
        list-style: none;
    }

    .nav-dropdown-trigger {
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .nav-dropdown-trigger.open {
        color: var(--primary);
    }

    .nav-dropdown-trigger.open .dropdown-chevron {
        transform: rotate(180deg);
        color: var(--primary);
    }

    .nav-dropdown-menu {
        position: absolute;
        top: calc(100% + 16px);
        left: 50%;
        transform: translateX(-50%) translateY(-8px);
        min-width: 220px;
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
        transition: opacity 0.25s ease, transform 0.25s ease, visibility 0.25s;
        z-index: 1000;
    }

    .nav-dropdown-menu.open {
        opacity: 1;
        visibility: visible;
        pointer-events: all;
        transform: translateX(-50%) translateY(0);
    }

    .nav-dropdown-menu::before {
        content: '';
        position: absolute;
        top: -7px;
        left: 50%;
        transform: translateX(-50%);
        border-left: 8px solid transparent;
        border-right: 8px solid transparent;
        border-bottom: 8px solid #2D2D2D;
    }

    .nav-dropdown-inner {
        background: linear-gradient(135deg, #1A1A1A 0%, #2D2D2D 100%);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 12px;
        padding: 0.5rem;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5), 0 0 0 1px rgba(255, 107, 53, 0.1);
        overflow: hidden;
    }

    .nav-dropdown-link {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 0.65rem 1rem;
        color: rgba(255, 255, 255, 0.75);
        font-size: 0.9rem;
        font-weight: 600;
        text-decoration: none;
        border-radius: 8px;
        transition: all 0.2s ease;
    }

    .nav-dropdown-link:hover,
    .nav-dropdown-link.active {
        background: rgba(255, 107, 53, 0.15);
        color: var(--primary);
        padding-left: 1.25rem;
    }

    .dropdown-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        flex-shrink: 0;
        transition: background 0.2s ease;
    }

    .nav-dropdown-link:hover .dropdown-dot,
    .nav-dropdown-link.active .dropdown-dot {
        background: var(--primary);
    }

    .nav-dropdown-link+.nav-dropdown-link {
        border-top: 1px solid rgba(255, 255, 255, 0.06);
    }

    /* ==================== DATE ==================== */
    .date-display {
        padding: 0.65rem 1rem;
        font-size: 12px;
        white-space: nowrap;
        border-radius: 50px;
    }

    .date-display-mobile {
        padding: 0.5rem 0.75rem;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        font-size: 11px;
        margin-right: 10px;
    }

    /* ==================== SEARCH ==================== */
    .search-box {
        position: relative;
    }

    .search-input {
        padding: 0.65rem 1rem 0.65rem 2.5rem;
        border: 2px solid rgba(255, 255, 255, 0.2);
        border-radius: 50px;
        font-size: 0.9rem;
        width: 240px;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.1);
        color: white;
    }

    .search-input::placeholder {
        color: rgba(255, 255, 255, 0.6);
    }

    .search-input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(255, 107, 53, 0.2);
        width: 280px;
        background: rgba(255, 255, 255, 0.15);
    }

    .search-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: rgba(255, 255, 255, 0.6);
    }

    .search-box-mobile {
        position: relative;
    }

    .search-input-mobile {
        border: 2px solid rgba(255, 255, 255, 0.2);
        border-radius: 50px;
        padding: 0.65rem 1rem;
        width: 100%;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.1);
        color: white;
    }

    .search-input-mobile::placeholder {
        color: rgba(255, 255, 255, 0.6);
    }

    .search-input-mobile:focus {
        outline: none;
        border-color: var(--primary);
        background: rgba(255, 255, 255, 0.15);
    }

    /* ==================== MOBILE CATEGORIES ==================== */
    .mobile-categories {
        position: relative;
    }

    .categories-scroll-container {
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
        -ms-overflow-style: none;
        scroll-behavior: smooth;
        overflow-x: auto;
        overflow-y: hidden;
    }

    .categories-scroll-container::-webkit-scrollbar {
        display: none;
    }

    .categories-scroll {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        gap: 1rem;
    }

    .category-link {
        display: inline-block;
        padding: 0.5rem 1rem;
        color: rgba(255, 255, 255, 0.7);
        font-weight: 600;
        font-size: 0.75rem;
        letter-spacing: 0.5px;
        text-decoration: none;
        transition: all 0.3s ease;
        border-bottom: 2px solid transparent;
        white-space: nowrap;
    }

    .category-link:hover,
    .category-link.active {
        color: var(--primary);
        border-bottom-color: var(--primary);
    }

    .scroll-indicator {
        position: absolute;
        top: 0;
        bottom: 0;
        width: 30px;
        pointer-events: none;
        z-index: 10;
        transition: opacity 0.3s ease;
    }

    .left-indicator {
        left: 0;
        background: linear-gradient(to right, var(--bg-dark-secondary) 0%, rgba(45, 45, 45, 0.8) 50%, transparent 100%);
        opacity: 0;
    }

    .right-indicator {
        right: 0;
        background: linear-gradient(to left, var(--bg-dark-secondary) 0%, rgba(45, 45, 45, 0.8) 50%, transparent 100%);
        opacity: 1;
    }

    .left-indicator.show {
        opacity: 1;
    }

    .right-indicator.hide {
        opacity: 0;
    }

    /* ==================== BUTTONS ==================== */
    .btn-login {
        padding: 0.65rem 2rem;
        background: var(--primary);
        color: white;
        border: none;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
        white-space: nowrap;
    }

    .btn-login:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(255, 107, 53, 0.3);
    }

    .btn-login-mobile {
        padding: 0.65rem 2rem;
        background: var(--primary);
        color: white;
        border: none;
        border-radius: 50px;
        font-weight: 600;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-block;
    }

    .btn-login-mobile:hover {
        background: var(--primary-dark);
    }

    /* ==================== HAMBURGER ==================== */
    .menu-toggle {
        background: none;
        border: none;
        cursor: pointer;
        color: white;
    }

    /* ==================== MOBILE DROPDOWN MENU ==================== */
    .mobile-dropdown {
        background: linear-gradient(135deg, var(--bg-dark) 0%, var(--bg-dark-secondary) 100%);
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
    }

    .mobile-dropdown.active {
        display: block !important;
    }

    .mobile-menu-content {
        animation: slideDown 0.3s ease-out;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* ==================== RESPONSIVE ==================== */
    @media (max-width: 1024px) {
        #logo_navbar {
            max-height: 45px;
            transform: scale(2.2);
        }

        .logo-wrapper {
            padding: 5px 35px !important;
        }

        .nav-top {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 0.75rem 1rem;
        }

        .nav-container {
            padding: 0;
        }
    }

    @media (min-width: 1025px) {

        .mobile-categories,
        .mobile-dropdown {
            display: none !important;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        // ==================== MOBILE MENU TOGGLE ====================
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const hamburgerIcon = document.getElementById('hamburger-icon');
        const closeIcon = document.getElementById('close-icon');

        if (menuToggle && mobileMenu) {
            menuToggle.addEventListener('click', function() {
                const isOpen = mobileMenu.classList.toggle('active');
                hamburgerIcon.classList.toggle('hidden', isOpen);
                closeIcon.classList.toggle('hidden', !isOpen);
            });
        }

        // ==================== DROPDOWN KATEGORI ====================
        const trigger = document.querySelector('.nav-dropdown-trigger');
        const dropdownMenu = document.querySelector('.nav-dropdown-menu');

        if (trigger && dropdownMenu) {
            trigger.addEventListener('click', function(e) {
                e.stopPropagation();
                const isOpen = dropdownMenu.classList.toggle('open');
                trigger.classList.toggle('open', isOpen);
            });

            // Tutup jika klik di luar
            document.addEventListener('click', function(e) {
                if (!trigger.contains(e.target) && !dropdownMenu.contains(e.target)) {
                    dropdownMenu.classList.remove('open');
                    trigger.classList.remove('open');
                }
            });

            // Tutup jika tekan Escape
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    dropdownMenu.classList.remove('open');
                    trigger.classList.remove('open');
                }
            });
        }

        // ==================== NAVBAR SCROLL ====================
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', function() {
            navbar.classList.toggle('scrolled', window.scrollY > 50);
        });

        // ==================== CATEGORIES SCROLL INDICATORS ====================
        const categoriesContainer = document.getElementById('categoriesContainer');
        const leftIndicator = document.getElementById('leftIndicator');
        const rightIndicator = document.getElementById('rightIndicator');

        function updateScrollIndicators() {
            if (!categoriesContainer) return;
            const {
                scrollLeft,
                scrollWidth,
                clientWidth
            } = categoriesContainer;
            const maxScroll = scrollWidth - clientWidth;
            leftIndicator.classList.toggle('show', scrollLeft > 10);
            rightIndicator.classList.toggle('hide', scrollLeft >= maxScroll - 10);
        }

        if (categoriesContainer) {
            categoriesContainer.addEventListener('scroll', updateScrollIndicators);
            updateScrollIndicators();
            window.addEventListener('resize', updateScrollIndicators);
        }

        // ==================== DATE ====================
        function updateDate() {
            const dateElement = document.getElementById('currentDate');
            const dateElementMobile = document.getElementById('currentDateMobile');
            const now = new Date();
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
            ];
            const dateText = `${days[now.getDay()]}, ${now.getDate()} ${months[now.getMonth()]}`;
            if (dateElement) dateElement.textContent = dateText;
            if (dateElementMobile) dateElementMobile.textContent = dateText;
        }

        updateDate();
        setInterval(updateDate, 60000);
    });
</script>
