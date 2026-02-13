@extends('layouts.app')

@section('title', 'Fokus Kito')

@section('content')


    <style>
        :root {
            --primary: #9CCFFF;
            --primary-dark: #0d5191;
            --text-dark: #1A1A1A;
            --text-gray: #64748B;
            --border-light: #E2E8F0;
            --border-medium: #94A3B8;
            --border-dark: #64748B;
            --bg-soft-gray: #F8F9FA;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        /* Hero Swiper */
        .hero-section {
            max-width: 1400px;
            margin: 2.5rem auto;
            padding: 0 2rem;
        }

        .swiper {
            border-radius: 24px;
            overflow: hidden;
        }

        .swiper-slide {
            position: relative;
            height: 500px;
            background-size: cover;
            background-position: center;
            border-radius: 24px;
            overflow: hidden;
        }

        .slide-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.75) 0%, rgba(0, 0, 0, 0) 60%);
        }

        .slide-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 3rem;
            z-index: 10;
        }

        .category-badge {
            display: inline-block;
            background: var(--primary);
            color: white;
            padding: 0.5rem 1.25rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .slide-title {
            font-family: Inter, system-ui, sans-serif;
            font-size: 2.75rem;
            font-weight: 900;
            color: white;
            line-height: 1.2;
            margin-bottom: 1rem;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .slide-author {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-top: 1rem;
        }

        .author-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 2px solid white;
            object-fit: cover;
        }

        .author-name {
            color: white;
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* Section Styling */
        .section {
            max-width: 1400px;
            margin: 5rem auto;
            padding: 0 2rem;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.25rem;
            font-weight: 900;
            line-height: 1.2;
            color: var(--text-dark);
        }

        .btn-view-all {
            padding: 0.75rem 2rem;
            background: var(--primary);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            display: inline-block;
        }

        .btn-view-all:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 107, 53, 0.3);
        }

        /* Featured Articles Grid */
        .featured-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .article-card {
            border: 3px solid var(--border-medium);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s ease;
            cursor: pointer;
            background: white;
            text-decoration: none;
            display: flex;
            flex-direction: column;
            height: 100%;
            color: inherit;

        }

        .article-card:hover {
            border-color: var(--primary);
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        }

        .article-image-wrapper {
            position: relative;
            overflow: hidden;
            position: relative;
            width: 100%;
            height: 220px;
            overflow: hidden;
            border-radius: 16px 16px 0 0;
        }

        .article-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.5s ease;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .article-card:hover .article-image {
            transform: scale(1.08);
        }

        .article-category {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: var(--primary);
            color: white;
            padding: 0.4rem 1rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 10;
        }

        .article-content {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            flex: 1;
            padding: 1rem;
        }

        .article-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 0.75rem;
            line-height: 1.4;
        }

        .article-date {
            color: var(--text-gray);
            font-size: 0.85rem;
        }

        /* Latest News Layout */
        .news-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 2rem;
        }

        .main-news {
            grid-column: span 7;
            border: 3px solid var(--border-medium);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            display: block;
            color: inherit;
        }

        .main-news:hover {
            border-color: var(--primary);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        }

        .main-news-image-wrapper {
            position: relative;
        }

        .main-news-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .main-news-content {
            padding: 2rem;
        }

        .main-news-title {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--text-dark);
            line-height: 1.3;
        }

        .main-news-excerpt {
            font-size: 0.9rem;
            color: var(--text-gray);
            display: -webkit-box;
            -webkit-line-clamp: 3;
            /* jumlah baris */
            -webkit-box-orient: vertical;
            overflow: hidden;
        }


        .news-excerpt-2line {
            font-size: 0.9rem;
            color: var(--text-gray);
            display: -webkit-box;
            -webkit-line-clamp: 2;
            /* jumlah baris */
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .side-news {
            grid-column: span 5;
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .news-item-image {
            width: 180px;
            height: 140px;
            object-fit: cover;
            border-radius: 12px;
            flex-shrink: 0;
        }

        .news-item-content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .news-item-title {
            font-size: 1.05rem;
            font-weight: 600;
            margin-top: 0.5rem;
            margin-bottom: 0.75rem;
            color: var(--text-dark);
            line-height: 1.4;
        }


        .hero-slide {
            position: relative;
            height: 320px;
            border-radius: 20px;
            background-size: cover;
            background-position: center;
            overflow: hidden;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.1));
        }

        .hero-content {
            position: absolute;
            bottom: 0;
            padding: 1.5rem;
            z-index: 2;
        }

        .hero-category {
            display: inline-block;
            background: var(--primary);
            color: #fff;
            font-size: 0.75rem;
            padding: 0.35rem 0.8rem;
            border-radius: 999px;
            margin-bottom: 0.5rem;
        }

        .hero-title {
            color: #fff;
            font-size: 1.25rem;
            font-weight: 700;
            line-height: 1.4;
        }

        /* ================= NEWS CONTAINER ================= */
        .container-news {
            max-width: 1400px;
            height: 700px;
            margin: 5rem auto;
            padding: 0 2rem;
        }

        .news-layout {
            display: grid;
            grid-template-columns: 2fr 1fr;
            height: 100%;
            gap: 2rem;
        }

        /* Main News List */
        .news-list {
            display: flex;
            justify-content: space-between;
            flex-direction: column;
        }

        .news-item {
            display: flex;
            gap: 1.25rem;
            border-radius: 16px;
            padding: 1rem;
            text-decoration: none;
            color: inherit;
            transition: all 0.3s ease;
        }

        .news-item:hover {
            border-color: var(--primary);
            transform: translateX(6px);
        }

        .news-item img {
            width: 200px;
            height: 140px;
            object-fit: cover;
            border-radius: 12px;
        }

        .news-meta {
            font-size: 0.75rem;
            color: var(--text-gray);
            margin-bottom: 0.25rem;
        }

        .list-border-news {
            border-top: 3px solid var(--border-dark);
            border-bottom: 3px solid var(--border-dark);
        }

        .news-category {
            color: var(--primary);
            font-weight: 600;
        }

        .news-title {
            /* font-family: 'Playfair Display', serif; */
            font-family: Inter, system-ui, sans-serif;
            font-size: 1.05rem;
            font-weight: 700;
            margin-bottom: 0.5rem;

        }

        .news-excerpt {
            font-size: 0.9rem;
            color: var(--text-gray);
            display: -webkit-box;
            -webkit-line-clamp: 3;
            /* jumlah baris */
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Sidebar news - Updated with soft gray background */
        .sidebar {
            border: 3px solid var(--border-medium);
            border-radius: 16px;
            padding: 1.5rem;
            height: 700px;
            overflow-y: auto;
            overflow-x: hidden;
            background-color: var(--bg-soft-gray);
        }

        .sidebar h3 {
            font-family: 'Playfair Display', serif;

            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 1.25rem;
            color: var(--text-dark);
        }

        .side-item {
            display: flex;
            gap: 0.75rem;
            margin-bottom: 1rem;
            text-decoration: none;
            color: inherit;
            padding: 10px 0px 10px 0px;
            border-bottom: 3px solid var(--border-dark);
        }

        .side-item img {
            width: 70px;
            height: 70px;
            border-radius: 10px;
            object-fit: cover;
        }

        .side-title {
            font-size: 0.85rem;
            font-weight: 600;
        }

        .side-time {
            font-size: 0.7rem;
            color: var(--text-gray);
        }


        .section {
            display: block;
        }

        /* Responsive */
        @media (max-width: 1024px) {

            .section {
                display: none;
            }

            .news-layout {
                grid-template-columns: 1fr;
            }

            .news-grid {
                grid-template-columns: 1fr;
            }

            .main-news,
            .side-news {
                grid-column: span 1;
            }

            .container-news {
                height: auto;
            }

            .news-layout {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .sidebar {
                height: auto;
                overflow: visible;
            }

            .news-list {
                gap: 1rem;
            }

            .news-item img {
                width: 160px;
                height: 120px;
            }
        }

        @media (max-width: 768px) {
            .slide-title {
                font-size: 1.75rem;
            }

            .section-title {
                font-size: 1.75rem;
            }

            .section-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .featured-grid {
                grid-template-columns: 1fr;
            }

            .news-item {
                flex-direction: column;
            }

            .news-item-image {
                width: 100%;
                height: 200px;
            }


        }

        @media (max-width: 640px) {



            .news-item {
                flex-direction: column;
            }

            .news-item img {
                width: 100%;
                height: 200px;
            }

            .swiper-slide {
                height: 350px;
            }

            .slide-content {
                padding: 2rem;
            }

            .slide-title {
                font-size: 1.5rem;
            }

            .main-news-image {
                height: 250px;
            }


            .news-item {
                flex-direction: column;
                padding: 0;
            }

            .news-item img {
                width: 100%;
                height: 220px;
                border-radius: 12px;
            }

            .sidebar {
                padding: 1rem;
            }

            .side-item {
                align-items: flex-start;
            }

            .side-item img {
                width: 80px;
                height: 80px;
            }

            .container-news {
                margin: 3rem auto;
                padding: 0 1rem;
            }
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
            animation-fill-mode: both;
        }

        .stagger-1 {
            animation-delay: 0.1s;
        }

        .stagger-2 {
            animation-delay: 0.2s;
        }

        .stagger-3 {
            animation-delay: 0.3s;
        }

        .stagger-4 {
            animation-delay: 0.4s;
        }
    </style>

    <!-- Hero Swiper Section -->
    <section class="hero-section">
        <div class="swiper mySwiper mt-9" style="max-height:300px">
            <div class="swiper-wrapper">
                @foreach ($articleBanners as $articleBanner)
                    <div class="swiper-slide">
                        <a href="{{ route('news.show', $articleBanner->slug) }}" class="block">
                            <div class="relative flex flex-col gap-1 justify-end p-3 h-72 rounded-xl bg-cover bg-center overflow-hidden"
                                style=" background-image:url('{{ asset('storage/' . $articleBanner->thumbnail) }}') ">
                                <div
                                    class="absolute inset-x-0 bottom-0 h-full bg-gradient-to-t from-[rgba(0,0,0,0.4)] to-[rgba(0,0,0,0)] rounded-b-xl">
                                </div>
                                <div class="relative z-10 mb-3" style="padding-left: 10px;">
                                    <div class="bg-primary text-white text-xs rounded-lg w-fit px-3 py-1 font-normal mt-3">
                                        {{ $articleBanner->category->title }}</div>
                                    <p class="text-3xl font-semibold text-white mt-1">{{ $articleBanner->title }}</p>

                                    <div class="flex items-center gap-1 mt-1">
                                        <img src="{{ asset('storage/' . $articleBanner->author->avatar) }}" alt=""
                                            class="w-5 h-5 rounded-full">
                                        <p class="text-white text-xs">{{ $articleBanner->author->name }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= NEWS ================= --}}
    <section class="container-news">
        <div class="news-layout">
            <div>
                <h2 class="section-title">Berita Terbaru</h2>
            </div>
            <div class="section-header">

            </div>
            {{-- MAIN --}}
            <div class="news-list">
                @foreach ($news as $item)
                    <div class="list-border-news">
                        <a href="{{ route('news.show', $item->slug) }}" class="news-item">
                            <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="">
                            <div>
                                <div class="news-meta">
                                    <span class="news-category">{{ $item->category->title }}</span>
                                    • {{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                </div>
                                <h3 class="news-title">{{ $item->title }}</h3>
                                <div class="news-excerpt">
                                    {!! $item->content !!}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>

            {{-- SIDEBAR --}}
            <aside class="sidebar">
                <h3>Terpopuler</h3>
                @foreach ($mostViewedDownList as $side)
                    <a href="{{ route('news.show', $side->slug) }}" class="side-item">
                        <img src="{{ asset('storage/' . $side->thumbnail) }}" alt="">
                        <div>
                            <p class="side-title news-title">{{ $side->title }}</p>
                            <span class="side-time">
                                <div class="news-excerpt-2line">
                                    {!! $side->content !!}
                                </div>
                                {{ \Carbon\Carbon::parse($side->created_at)->diffForHumans() }}
                            </span>
                        </div>
                    </a>
                @endforeach
            </aside>

        </div>
    </section>


    {{-- Dilihat terbanyak --}}
    <section class="section">
        <div class="section-header">
            <div>
                {{-- <h2 class="section-title">Berita Populer</h2> --}}
            </div>
        </div>

        <div class="news-grid">
            <!-- Main News (First Article) -->
            @if (isset($mostViewed[0]))
                <a href="{{ route('news.show', $mostViewed[0]->slug) }}" class="main-news">
                    <div class="main-news-image-wrapper">
                        <span class="article-category" style="position: absolute; top: 1.5rem; left: 1.5rem; z-index: 10;">
                            {{ $mostViewed[0]->category->title }}
                        </span>
                        <img src="{{ asset('storage/' . $mostViewed[0]->thumbnail) }}" alt="{{ $news[0]->title }}"
                            class="main-news-image">
                    </div>
                    <div class="main-news-content">
                        <h2 class="main-news-title">{{ $mostViewed[0]->title }}</h2>
                        <div class="main-news-excerpt">{!! $mostViewed[0]->content !!}</div>
                        <p class="article-date">
                            {{ \Carbon\Carbon::parse($mostViewed[0]->created_at)->format('d F Y') }}</p>
                    </div>
                </a>
            @endif

            <!-- Side News (Rest of Articles) -->
            <div class="side-news">
                @foreach ($mostViewed->skip(1) as $new)
                    <a href="{{ route('news.show', $new->slug) }}" class="news-item">
                        <img src="{{ asset('storage/' . $new->thumbnail) }}" alt="{{ $new->title }}"
                            class="news-item-image">
                        <div class="news-item-content">
                            <span class="category-badge" style="font-size: 0.75rem; padding: 0.3rem 0.8rem;">
                                {{ $new->category->title }}
                            </span>
                            <h3 class="news-item-title">{{ $new->title }}</h3>
                            <div class="news-excerpt">{!! $new->content !!}</div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Berita Unggulan Section -->
    <section class="section">
        <div class="section-header">
            <div>
                <h2 class="section-title">Berita Unggulan
            </div>
            <a href="{{ route('news.index') }}" class="btn-view-all">Lihat Semua</a>
        </div>

        <div class="featured-grid">
            @foreach ($featureds as $index => $featured)
                <div class="wrapper-featured">
                    <a href="{{ route('news.show', $featured->slug) }}"
                        class="article-card fade-in-up stagger-{{ ($index % 4) + 1 }}">
                        <div class="article-image-wrapper">
                            <span class="article-category">{{ $featured->category->title }}</span>
                            <img src="{{ asset('storage/' . $featured->thumbnail) }}" alt="{{ $featured->title }}"
                                class="article-image">
                        </div>
                        <div class="article-content">
                            <h3 class="article-title news-title">{{ $featured->title }}</h3>
                            <div class="news-excerpt">
                                {!! $featured->content !!}
                            </div>
                            <p class="article-date">{{ \Carbon\Carbon::parse($featured->created_at)->format('d F Y') }}
                            </p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>



    <!-- Swiper JS Initialization -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // Initialize Swiper
        const swiper = new Swiper('.mySwiper', {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
        });
    </script>

@endsection
