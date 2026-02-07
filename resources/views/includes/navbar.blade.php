<!-- Navigation Bar -->
<nav class="navbar sticky top-0 z-50 bg-white shadow-sm" id="navbar">
    <div class="nav-container flex justify-between py-5 px-4 lg:px-14">
        <div class="flex gap-10 w-full items-center">
            <!-- Logo dan Menu Toggle -->
            <div class="flex items-center justify-between w-full lg:w-auto">
                <!-- Logo -->
                <a href="{{ route('landing') }}" class="flex items-center gap-2">
                    <div class="logo-section">
                        {{-- <div class="logo">L</div> --}}
                        <img id="logo_navbar" src="{{ asset('asset/img/Logo.png') }}" alt="Logo">
                        {{-- <span class="logo-text">Liputan Palembang</span> --}}
                    </div>
                </a>

                <!-- Mobile Menu Toggle -->
                <button class="menu-toggle lg:hidden text-primary text-2xl focus:outline-none" id="menu-toggle">
                    ☰
                </button>
            </div>

            <!-- Navigation Menu -->
            <div id="menu"
                class="hidden lg:flex flex-col lg:flex-row lg:items-center lg:gap-10 w-full lg:w-auto mt-5 lg:mt-0">
                <ul
                    class="nav-menu flex flex-col lg:flex-row items-start lg:items-center gap-4 font-medium text-base w-full lg:w-auto">
                    <li>
                        <a href="{{ route('landing') }}"
                            class="nav-link {{ request()->is('/') ? 'active' : '' }}">Beranda</a>
                    </li>
                    @foreach (\App\Models\Categories::all() as $category)
                        <li>
                            <a
                                href="{{ route('news.category', $category->slug) }}"class="nav-link {{ request()->is($category->slug) ? 'active' : '' }}">{{ $category->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Search and Login -->
        <div class="nav-actions hidden lg:flex items-center gap-2 w-full lg:w-auto">
            <div class="search-box relative w-full lg:w-auto">
                <form action="{{ route('news.index') }}" method="GET">
                    <input name="search" type="text" placeholder="Cari berita..."
                        class="search-input border border-slate-300 rounded-full px-4 py-2 pl-10 w-full text-sm font-normal lg:w-auto focus:outline-none focus:ring-primary focus:border-primary"
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
    </div>
</nav>

<style>
    :root {
        --primary: #FF6B35;
        --primary-dark: #E85A2A;
        --text-dark: #1A1A1A;
        --text-gray: #64748B;
        --border-light: #E2E8F0;
    }

    #logo_navbar {
        max-height: 40px;
        width: auto;
        transform: scale(2.4);
        transform-origin: left center;
    }

    /* Navbar Styles */
    .navbar {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }

    .navbar.scrolled {
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    }

    .logo-section {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .logo {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, var(--primary), var(--primary-dark));
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 900;
        font-size: 1.5rem;
    }

    .logo-text {
        font-family: 'Playfair Display', serif;
        font-size: 1.35rem;
        font-weight: 900;
        color: var(--text-dark);
        letter-spacing: -0.5px;
    }

    .nav-menu {
        display: flex;
        list-style: none;
        gap: 2.5rem;
    }

    .nav-link {
        text-decoration: none;
        color: var(--text-dark);
        font-weight: 500;
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

    .search-box {
        position: relative;
    }

    .search-input {
        padding: 0.65rem 1rem 0.65rem 2.5rem;
        border: 2px solid var(--border-light);
        border-radius: 50px;
        font-size: 0.9rem;
        width: 240px;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(255, 107, 53, 0.1);
        width: 280px;
    }

    .search-icon {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: var(--text-gray);
    }

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

    .menu-toggle {
        background: none;
        border: none;
        cursor: pointer;
        color: var(--primary);
    }

    #menu {
        margin-left: 50px;
    }

    /* Mobile Menu Styles */
    @media (max-width: 1024px) {
        #menu {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }

        #menu.active {
            display: flex !important;
        }

        .nav-menu {
            flex-direction: column;
            width: 100%;
            gap: 1.5rem;
        }

        .nav-link {
            width: 100%;
            padding: 0.75rem 0;
        }
    }
</style>

<script>
    // Mobile Menu Toggle
    document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.getElementById('menu-toggle');
        const menu = document.getElementById('menu');

        if (menuToggle) {
            menuToggle.addEventListener('click', function() {
                menu.classList.toggle('active');
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
    });
</script>
