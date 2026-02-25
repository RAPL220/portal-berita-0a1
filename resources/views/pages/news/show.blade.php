@extends('layouts.app')

@section('title', $news->title)

@section('content')

    <style>
        :root {
            --primary: #9CCFFF;
            --primary-dark: #0d5191;
            --primary-mid: #1a78c2;
            --text-dark: #1A1A1A;
            --text-gray: #64748B;
            --border-light: #E2E8F0;
            --border-medium: #94A3B8;
            --bg-soft: #F0F7FF;
            --bg-white: #FFFFFF;
            --dark-navy: #0a3d72;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* ==================== WRAPPER ==================== */
        .detail-wrapper {
            background: #F8FAFC;
            padding: 2.5rem 0 5rem;
        }

        .detail-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* ==================== BREADCRUMB ==================== */
        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 2rem;
            font-size: 0.85rem;
            color: var(--text-gray);
            flex-wrap: wrap;
            font-weight: 500;
        }

        .breadcrumb a {
            color: var(--primary-dark);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s;
        }

        .breadcrumb a:hover {
            color: var(--primary-mid);
            text-decoration: underline;
        }

        .breadcrumb-sep {
            color: var(--border-medium);
        }

        .breadcrumb-current {
            color: var(--text-dark);
            font-weight: 600;
        }

        /* ==================== GRID ==================== */
        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 2.5rem;
            align-items: start;
        }

        /* ==================== MAIN ARTICLE ==================== */
        .article-main {
            background: var(--bg-white);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 24px rgba(13, 81, 145, 0.08);
            border: 2px solid var(--border-light);
        }

        /* Top accent bar */
        .article-main-inner {
            border-top: 5px solid var(--primary-dark);
            padding: 2.5rem;
        }

        /* Category Badge */
        .article-category-badge {
            display: inline-block;
            background: var(--primary-dark);
            color: white;
            padding: 0.4rem 1.25rem;
            font-size: 0.72rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            border-radius: 50px;
            margin-bottom: 1.25rem;
        }

        /* Title */
        .article-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 900;
            color: var(--text-dark);
            line-height: 1.25;
            margin-bottom: 1.5rem;
        }

        /* Meta */
        .article-meta {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            padding: 1.25rem 0;
            border-top: 2px solid var(--border-light);
            border-bottom: 2px solid var(--border-light);
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }

        .author-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .author-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            border: 2.5px solid var(--primary-dark);
            object-fit: cover;
            flex-shrink: 0;
        }

        .author-name {
            font-weight: 800;
            color: var(--text-dark);
            font-size: 0.92rem;
        }

        .author-role {
            font-size: 0.75rem;
            color: var(--text-gray);
            font-weight: 500;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            color: var(--text-gray);
            font-size: 0.85rem;
            font-weight: 600;
        }

        .meta-icon {
            width: 16px;
            height: 16px;
            color: var(--primary-dark);
            flex-shrink: 0;
        }

        /* Featured Image — KONSISTEN, selalu sama tingginya */
        .article-featured-image-wrapper {
            width: 100%;
            height: 480px;
            overflow: hidden;
            border-radius: 14px;
            margin-bottom: 2rem;
            background: var(--bg-soft);
            position: relative;
        }

        .article-featured-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center top;
            display: block;
            transition: transform 0.4s ease;
        }

        .article-featured-image-wrapper:hover .article-featured-image {
            transform: scale(1.02);
        }

        /* Content */
        .article-content {
            font-size: 1.05rem;
            line-height: 1.95;
            color: #2d3748;
        }

        .article-content p {
            margin-bottom: 1.5rem;
        }

        .article-content h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.75rem;
            font-weight: 900;
            color: var(--text-dark);
            margin-top: 2.5rem;
            margin-bottom: 1rem;
            padding-bottom: 0.6rem;
            border-bottom: 3px solid var(--primary);
        }

        .article-content h3 {
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-top: 2rem;
            margin-bottom: 0.75rem;
        }

        .article-content h4 {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-top: 1.5rem;
            margin-bottom: 0.6rem;
        }

        .article-content ul,
        .article-content ol {
            padding-left: 1.75rem;
            margin-bottom: 1.5rem;
        }

        .article-content li {
            margin-bottom: 0.6rem;
            line-height: 1.8;
        }

        .article-content blockquote {
            border-left: 5px solid var(--primary-dark);
            background: var(--bg-soft);
            padding: 1.25rem 1.75rem;
            margin: 2rem 0;
            border-radius: 0 12px 12px 0;
            font-style: italic;
            color: var(--text-gray);
            font-size: 1.05rem;
        }

        .article-content img {
            width: 100%;
            height: auto;
            border-radius: 12px;
            margin: 2rem 0;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            display: block;
        }

        .article-content a {
            color: var(--primary-dark);
            text-decoration: underline;
            font-weight: 600;
        }

        .article-content a:hover {
            color: var(--primary-mid);
        }

        /* ==================== TAG SECTION ==================== */
        .article-tags {
            margin-top: 2rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            flex-wrap: wrap;
        }

        .tag-label {
            font-size: 0.8rem;
            font-weight: 800;
            color: var(--text-dark);
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .tag-item {
            background: var(--bg-soft);
            border: 1.5px solid var(--primary);
            color: var(--primary-dark);
            padding: 0.3rem 0.9rem;
            border-radius: 50px;
            font-size: 0.78rem;
            font-weight: 700;
            text-decoration: none;
            transition: all 0.2s;
        }

        .tag-item:hover {
            background: var(--primary-dark);
            color: white;
            border-color: var(--primary-dark);
        }

        /* ==================== SHARE SECTION ==================== */
        .share-section {
            margin-top: 2.5rem;
            padding-top: 2rem;
            border-top: 2px solid var(--border-light);
        }

        .share-title {
            font-size: 1rem;
            font-weight: 900;
            color: var(--text-dark);
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .share-buttons {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .share-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.65rem 1.4rem;
            font-weight: 700;
            font-size: 0.82rem;
            text-decoration: none;
            border-radius: 50px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            letter-spacing: 0.3px;
        }

        .share-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
        }

        .share-btn svg {
            width: 16px;
            height: 16px;
            flex-shrink: 0;
        }

        .btn-facebook {
            background: #1877F2;
            color: white;
        }

        .btn-twitter {
            background: #1DA1F2;
            color: white;
        }

        .btn-whatsapp {
            background: #25D366;
            color: white;
        }

        .btn-copy {
            background: var(--dark-navy);
            color: white;
        }

        /* ==================== AUTHOR CARD ==================== */
        .author-card {
            background: var(--bg-soft);
            border-radius: 16px;
            padding: 2rem;
            margin-top: 2.5rem;
            border: 2px solid var(--border-light);
            border-left: 5px solid var(--primary-dark);
        }

        .author-card-title {
            font-size: 0.72rem;
            font-weight: 900;
            color: var(--text-gray);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 1.25rem;
        }

        .author-card-content {
            display: flex;
            gap: 1.5rem;
            align-items: flex-start;
        }

        .author-card-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 3px solid var(--primary-dark);
            object-fit: cover;
            flex-shrink: 0;
        }

        .author-card-name {
            font-size: 1.2rem;
            font-weight: 900;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .author-card-bio {
            font-size: 0.9rem;
            line-height: 1.7;
            color: var(--text-gray);
        }

        .author-card-bio p {
            margin-bottom: 0;
        }

        /* ==================== SIDEBAR ==================== */
        .sidebar-sticky {
            position: sticky;
            top: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 1.75rem;
        }

        /* Widget */
        .sidebar-widget {
            background: var(--bg-white);
            border-radius: 18px;
            border: 2px solid var(--border-light);
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(13, 81, 145, 0.07);
        }

        .widget-header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-dark));
            padding: 1.1rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .widget-icon {
            width: 34px;
            height: 34px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            flex-shrink: 0;
        }

        .widget-title {
            font-size: 1rem;
            font-weight: 900;
            color: white;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .widget-content {
            padding: 1.25rem;
        }

        /* Sidebar Article */
        .sidebar-article {
            display: flex;
            gap: 1rem;
            padding: 1rem 0;
            text-decoration: none;
            color: inherit;
            border-bottom: 1.5px solid var(--border-light);
            transition: all 0.2s ease;
        }

        .sidebar-article:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .sidebar-article:hover {
            transform: translateX(4px);
        }

        .sidebar-article:hover .sidebar-article-title {
            color: var(--primary-dark);
        }

        /* Gambar sidebar — KONSISTEN ukurannya */
        .sidebar-article-image-wrapper {
            width: 90px;
            height: 90px;
            border-radius: 10px;
            overflow: hidden;
            flex-shrink: 0;
            background: var(--bg-soft);
        }

        .sidebar-article-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            transition: transform 0.3s ease;
        }

        .sidebar-article:hover .sidebar-article-image {
            transform: scale(1.05);
        }

        .sidebar-article-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        .sidebar-article-badge {
            display: inline-block;
            background: var(--primary-dark);
            color: white;
            padding: 0.22rem 0.7rem;
            font-size: 0.6rem;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            border-radius: 50px;
            margin-bottom: 0.4rem;
            width: fit-content;
        }

        .sidebar-article-title {
            font-size: 0.88rem;
            font-weight: 700;
            color: var(--text-dark);
            line-height: 1.45;
            margin-bottom: 0.4rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: color 0.2s;
        }

        .sidebar-article-time {
            font-size: 0.72rem;
            color: var(--text-gray);
            font-weight: 600;
            margin-top: auto;
            display: flex;
            align-items: center;
            gap: 0.3rem;
        }

        /* ==================== READ MORE / RELATED ==================== */
        .related-section {
            margin-top: 3rem;
        }

        .related-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 900;
            color: var(--text-dark);
            margin-bottom: 0.4rem;
        }

        .related-bar {
            width: 48px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-dark), var(--primary));
            border-radius: 99px;
            margin-bottom: 1.75rem;
        }

        /* ==================== RESPONSIVE ==================== */
        @media (max-width: 1100px) {
            .detail-grid {
                grid-template-columns: 1fr 320px;
                gap: 2rem;
            }
        }

        @media (max-width: 900px) {
            .detail-grid {
                grid-template-columns: 1fr;
            }

            .sidebar-sticky {
                position: relative;
                top: 0;
            }

            .article-title {
                font-size: 2rem;
            }

            .article-featured-image-wrapper {
                height: 380px;
            }
        }

        @media (max-width: 640px) {
            .detail-container {
                padding: 0 1rem;
            }

            .detail-wrapper {
                padding: 1.5rem 0 3rem;
            }

            .article-main-inner {
                padding: 1.5rem 1.25rem;
            }

            .article-title {
                font-size: 1.65rem;
            }

            .article-featured-image-wrapper {
                height: 260px;
            }

            .article-meta {
                gap: 0.75rem;
            }

            .article-content {
                font-size: 0.97rem;
            }

            .author-card-content {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .share-buttons {
                gap: 0.5rem;
            }

            .share-btn {
                padding: 0.6rem 1rem;
                font-size: 0.78rem;
            }

            .sidebar-article {
                flex-direction: column;
            }

            .sidebar-article-image-wrapper {
                width: 100%;
                height: 200px;
            }
        }

        /* ==================== ANIMATIONS ==================== */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(24px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeInUp 0.55s ease-out forwards;
        }

        .delay-1 {
            animation-delay: 0.1s;
        }

        .delay-2 {
            animation-delay: 0.2s;
        }
    </style>

    <div class="detail-wrapper">
        <div class="detail-container">

            <!-- Breadcrumb -->
            <nav class="breadcrumb fade-in">
                <a href="{{ route('landing') }}">Beranda</a>
                <span class="breadcrumb-sep">›</span>
                <a href="{{ route('news.category', $news->category->slug) }}">{{ $news->category->title }}</a>
                <span class="breadcrumb-sep">›</span>
                <span class="breadcrumb-current">{{ Str::limit($news->title, 55) }}</span>
            </nav>

            <div class="detail-grid">

                <!-- ========== MAIN ARTICLE ========== -->
                <article class="article-main fade-in delay-1">
                    <div class="article-main-inner">

                        <!-- Category -->
                        <span class="article-category-badge">{{ $news->category->title }}</span>

                        <!-- Title -->
                        <h1 class="article-title">{{ $news->title }}</h1>

                        <!-- Meta -->
                        <div class="article-meta">
                            <div class="author-info">
                                <img src="{{ asset('storage/' . $news->author->avatar) }}" alt="{{ $news->author->name }}"
                                    class="author-avatar">
                                <div>
                                    <div class="author-name">{{ $news->author->name }}</div>
                                    <div class="author-role">Penulis</div>
                                </div>
                            </div>

                            <div class="meta-item">
                                <svg class="meta-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ \Carbon\Carbon::parse($news->created_at)->format('d F Y') }}
                            </div>

                            <div class="meta-item">
                                <svg class="meta-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ \Carbon\Carbon::parse($news->created_at)->diffForHumans() }}
                            </div>

                            <div class="meta-item">
                                <svg class="meta-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                {{ number_format($news->views ?? 0) }} dibaca
                            </div>
                        </div>

                        <!-- Featured Image — tinggi fixed agar konsisten -->
                        <div class="article-featured-image-wrapper">
                            <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="{{ $news->title }}"
                                class="article-featured-image">
                        </div>

                        <!-- Content -->
                        <div class="article-content">
                            {!! $news->content !!}
                        </div>

                        <!-- Tags -->
                        <div class="article-tags">
                            <span class="tag-label">Topik:</span>
                            <a href="{{ route('news.category', $news->category->slug) }}" class="tag-item">
                                {{ $news->category->title }}
                            </a>
                        </div>

                        <!-- Share -->
                        <div class="share-section">
                            <p class="share-title">Bagikan Artikel Ini</p>
                            <div class="share-buttons">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('news.show', $news->slug)) }}"
                                    target="_blank" rel="noopener" class="share-btn btn-facebook">
                                    <svg fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                    </svg>
                                    Facebook
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('news.show', $news->slug)) }}&text={{ urlencode($news->title) }}"
                                    target="_blank" rel="noopener" class="share-btn btn-twitter">
                                    <svg fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                    </svg>
                                    Twitter
                                </a>
                                <a href="https://wa.me/?text={{ urlencode($news->title . ' ' . route('news.show', $news->slug)) }}"
                                    target="_blank" rel="noopener" class="share-btn btn-whatsapp">
                                    <svg fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                    </svg>
                                    WhatsApp
                                </a>
                                <button onclick="copyLink('{{ route('news.show', $news->slug) }}')"
                                    class="share-btn btn-copy">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                    </svg>
                                    Salin Link
                                </button>
                            </div>
                        </div>

                        <!-- Author Bio -->
                        <div class="author-card">
                            <p class="author-card-title">Tentang Penulis</p>
                            <div class="author-card-content">
                                <img src="{{ asset('storage/' . $news->author->avatar) }}" alt="{{ $news->author->name }}"
                                    class="author-card-avatar">
                                <div>
                                    <h4 class="author-card-name">{{ $news->author->name }}</h4>
                                    <div class="author-card-bio">
                                        {!! $news->author->bio !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </article>

                <!-- ========== SIDEBAR ========== -->
                <aside class="sidebar-sticky fade-in delay-2">

                    <!-- Berita Terbaru Widget -->
                    <div class="sidebar-widget">
                        <div class="widget-header">
                            <div class="widget-icon">
                                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                </svg>
                            </div>
                            <span class="widget-title">Berita Terbaru</span>
                        </div>
                        <div class="widget-content">
                            @foreach ($sideArticles as $sideArticle)
                                <a href="{{ route('news.show', $sideArticle->slug) }}" class="sidebar-article">
                                    {{-- Wrapper dengan ukuran fixed agar gambar selalu rata --}}
                                    <div class="sidebar-article-image-wrapper">
                                        <img src="{{ asset('storage/' . $sideArticle->thumbnail) }}"
                                            alt="{{ $sideArticle->title }}" class="sidebar-article-image">
                                    </div>
                                    <div class="sidebar-article-content">
                                        <span class="sidebar-article-badge">{{ $sideArticle->category->title }}</span>
                                        <h4 class="sidebar-article-title">{{ $sideArticle->title }}</h4>
                                        <div class="sidebar-article-time">
                                            <svg width="11" height="11" fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                                <path
                                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                            </svg>
                                            {{ \Carbon\Carbon::parse($sideArticle->created_at)->diffForHumans() }}
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <!-- Kategori Widget -->
                    <div class="sidebar-widget">
                        <div class="widget-header">
                            <div class="widget-icon">
                                <svg width="18" height="18" fill="none" stroke="currentColor"
                                    stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                            </div>
                            <span class="widget-title">Kategori</span>
                        </div>
                        <div class="widget-content" style="padding: 1rem 1.25rem;">
                            @foreach (\App\Models\Categories::all() as $cat)
                                <a href="{{ route('news.category', $cat->slug) }}"
                                    style="display:flex; justify-content:space-between; align-items:center;
                                      padding: 0.65rem 0; border-bottom: 1.5px solid var(--border-light);
                                      text-decoration:none; color: var(--text-dark); font-weight:600;
                                      font-size:0.88rem; transition: all 0.2s;"
                                    onmouseover="this.style.color='var(--primary-dark)'; this.style.paddingLeft='0.4rem'"
                                    onmouseout="this.style.color='var(--text-dark)'; this.style.paddingLeft='0'">
                                    <span>{{ $cat->title }}</span>
                                    <svg width="14" height="14" fill="none" stroke="currentColor"
                                        stroke-width="2.5" viewBox="0 0 24 24"
                                        style="color: var(--primary-dark); flex-shrink:0;">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            @endforeach
                        </div>
                    </div>

                </aside>
            </div>
        </div>
    </div>

    <script>
        function copyLink(url) {
            navigator.clipboard.writeText(url).then(() => {
                const btn = event.currentTarget;
                const original = btn.innerHTML;
                btn.innerHTML =
                    '<svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg> Tersalin!';
                btn.style.background = '#16a34a';
                setTimeout(() => {
                    btn.innerHTML = original;
                    btn.style.background = '';
                }, 2000);
            }).catch(() => alert('Gagal menyalin link.'));
        }
    </script>

@endsection
