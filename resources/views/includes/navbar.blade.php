<!-- Navigation Bar -->
<nav class="navbar sticky top-0 z-50 bg-dark shadow-sm" id="navbar">
    <div class="nav-container">
        <!-- Top Row: Logo & Hamburger (Mobile) / Full Nav (Desktop) -->
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
                        @foreach (\App\Models\Categories::all() as $category)
                            <li>
                                <a href="{{ route('news.category', $category->slug) }}"
                                    class="nav-link {{ request()->is($category->slug) ? 'active' : '' }}">{{ $category->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Desktop: Date, Search and Login -->
            <div class="nav-actions hidden lg:flex items-center gap-4 w-full lg:w-auto">
                <!-- Date Display -->
                <div class="date-display  text-white font-semibold text-sm whitespace-nowrap">
                    <span id="currentDate"></span>
                </div>

                <div class="search-box relative w-full lg:w-auto">
                    <form action="{{ route('news.index') }}" method="GET">
                        <input name="search" type="text" placeholder="Cari berita..."
                            class="search-input border border-slate-600 rounded-full px-4 py-2 pl-10 w-full text-sm font-normal lg:w-auto focus:outline-none focus:ring-primary focus:border-primary"
                            id="searchInput" />
                    </form>
                    <!-- Search Icon -->
                    <span class="search-icon absolute inset-y-0 left-3 flex items-center text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </span>
                </div>
                <a href="/admin"
                    class="btn-login bg-primary px-8 py-2 rounded-full text-white font-semibold h-fit text-sm lg:text-base">
                    Masuk
                </a>
            </div>

            <div class="date-display-mobile text-white font-semibold text-xs flex-shrink-0  lg:hidden ">
                <span id="currentDateMobile" style="white-space: nowrap;"></span>
            </div>
            <!-- Mobile: Hamburger Menu Button -->
            <button class="menu-toggle lg:hidden text-white text-2xl focus:outline-none ml-auto" id="menu-toggle">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
        </div>

        <!-- Mobile Row 2: Scrollable Categories -->
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
            <!-- Scroll Indicators (Gradients) -->
            <div class="scroll-indicator left-indicator" id="leftIndicator"></div>
            <div class="scroll-indicator right-indicator" id="rightIndicator"></div>
        </div>
    </div>

    <!-- Mobile Dropdown Menu (when hamburger clicked) -->
    <div id="mobile-menu" class="mobile-dropdown hidden lg:hidden">
        <div class="mobile-menu-content p-4">
            <!-- Row 1: Search Box -->
            <div class="search-box-mobile relative mb-3">
                <form action="{{ route('news.index') }}" method="GET">
                    <input name="search" type="text" placeholder="Cari berita..."
                        class="search-input-mobile border border-slate-600 rounded-full px-3 py-2.5 pl-10 w-full text-sm font-normal focus:outline-none focus:ring-primary focus:border-primary" />
                </form>
                <!-- Search Icon -->

            </div>

            <!-- Row 2: Login Button -->
            <div class="flex items-center justify-between gap-3" style="justify-content: end">
                <!-- Login Button -->
                <a href="/admin"
                    class="btn-login-mobile bg-primary px-6 py-2.5 rounded-full text-white font-semibold text-sm text-center whitespace-nowrap">
                    Masuk
                </a>
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

    /* Logo Wrapper */
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

    /* Navbar Styles */
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

    /* Nav Links - Desktop */
    .nav-link {
        text-decoration: none;
        color: white;
        font-weight: 700;
        font-size: 0.95rem;
        transition: color 0.3s ease;
        position: relative;
        padding: 0.5rem 0;
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

    /* Date Display - Desktop */
    .date-display {
        padding: 0.65rem 1rem;
        font-size: 12px;
        white-space: nowrap;
        border-radius: 50px;
    }

    /* Date Display - Mobile */
    .date-display-mobile {
        padding: 0.5rem 0.75rem;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        font-size: 11px;
        margin-right: 10px
    }

    /* Search Box - Desktop */
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

    /* Search Box - Mobile */
    .search-box-mobile {
        position: relative;
    }

    .search-input-mobile {
        border: 2px solid rgba(255, 255, 255, 0.2);
        border-radius: 50px;
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

    .search-icon-mobile {
        position: absolute;
        left: 0.75rem;
        top: 50%;
        transform: translateY(-50%);
        color: rgba(255, 255, 255, 0.6);
    }

    /* Mobile Categories Scrollable */
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

    /* Scroll Indicators (Gradient overlays) */
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
        background: linear-gradient(to right,
                var(--bg-dark-secondary) 0%,
                rgba(45, 45, 45, 0.8) 50%,
                transparent 100%);
        opacity: 0;
    }

    .right-indicator {
        right: 0;
        background: linear-gradient(to left,
                var(--bg-dark-secondary) 0%,
                rgba(45, 45, 45, 0.8) 50%,
                transparent 100%);
        opacity: 1;
    }

    .left-indicator.show {
        opacity: 1;
    }

    .right-indicator.hide {
        opacity: 0;
    }

    /* Login Button */
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

    /* Hamburger Menu */
    .menu-toggle {
        background: none;
        border: none;
        cursor: pointer;
        color: white;
        font-size: 24px;
    }

    /* Mobile Dropdown Menu */
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

    /* Mobile Specific Styles - LOGO LEBIH BESAR */
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
        }

        .nav-container {
            padding: 0;
        }

        .nav-top {
            padding: 0.75rem 1rem;
        }
    }

    /* Hide mobile elements on desktop */
    @media (min-width: 1025px) {

        .mobile-categories,
        .mobile-dropdown {
            display: none !important;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile Menu Toggle
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        if (menuToggle && mobileMenu) {
            menuToggle.addEventListener('click', function() {
                mobileMenu.classList.toggle('active');
            });
        }

        // Navbar Scroll Effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Categories Horizontal Scroll Indicators
        const categoriesContainer = document.getElementById('categoriesContainer');
        const leftIndicator = document.getElementById('leftIndicator');
        const rightIndicator = document.getElementById('rightIndicator');

        function updateScrollIndicators() {
            if (!categoriesContainer) return;

            const scrollLeft = categoriesContainer.scrollLeft;
            const scrollWidth = categoriesContainer.scrollWidth;
            const clientWidth = categoriesContainer.clientWidth;
            const maxScroll = scrollWidth - clientWidth;

            // Show/hide left indicator
            if (scrollLeft > 10) {
                leftIndicator.classList.add('show');
            } else {
                leftIndicator.classList.remove('show');
            }

            // Show/hide right indicator
            if (scrollLeft < maxScroll - 10) {
                rightIndicator.classList.remove('hide');
            } else {
                rightIndicator.classList.add('hide');
            }
        }

        if (categoriesContainer) {
            // Update indicators on scroll
            categoriesContainer.addEventListener('scroll', updateScrollIndicators);

            // Initial check
            updateScrollIndicators();

            // Re-check on window resize
            window.addEventListener('resize', updateScrollIndicators);
        }

        // Update Date and Time
        function updateDate() {
            const dateElement = document.getElementById('currentDate');
            const dateElementMobile = document.getElementById('currentDateMobile');
            const now = new Date();

            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
            ];

            const dayName = days[now.getDay()];
            const day = now.getDate();
            const month = months[now.getMonth()];
            const year = now.getFullYear();

            const dateText = `${dayName}, ${day} ${month}`;

            if (dateElement) {
                dateElement.textContent = dateText;
            }
            if (dateElementMobile) {
                dateElementMobile.textContent = dateText;
            }
        }

        updateDate();
        // Update every minute
        setInterval(updateDate, 60000);
    });
</script>
