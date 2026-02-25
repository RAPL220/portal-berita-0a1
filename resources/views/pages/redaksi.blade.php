@extends('layouts.app')

@section('title', 'Redaksi - Fokus Kito')

@section('content')

    <style>
        :root {
            --primary: #9CCFFF;
            --primary-dark: #0d5191;
            --text-dark: #1A1A1A;
            --text-gray: #64748B;
            --border-medium: #94A3B8;
            --bg-soft: #F0F7FF;
        }

        /* HERO */
        .redaksi-hero {
            background: linear-gradient(135deg, #0a3d72 0%, #0d5191 55%, #1a78c2 100%);
            padding: 5rem 2rem 6rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .redaksi-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle at 20% 50%, rgba(156, 207, 255, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.05) 0%, transparent 40%);
        }

        .redaksi-hero-inner {
            max-width: 700px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        .hero-kicker {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.25);
            color: white;
            padding: 0.45rem 1.25rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            margin-bottom: 1.5rem;
        }

        .hero-kicker-dot {
            width: 7px;
            height: 7px;
            background: #9CCFFF;
            border-radius: 50%;
            display: inline-block;
        }

        .redaksi-hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.2rem, 5vw, 3.5rem);
            font-weight: 900;
            color: white;
            line-height: 1.15;
            margin-bottom: 1.25rem;
        }

        .redaksi-hero p {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.78);
            line-height: 1.8;
            max-width: 540px;
            margin: 0 auto;
        }

        /* STRUKTUR */
        .struktur-wrapper {
            max-width: 1200px;
            margin: 0 auto;
            padding: 5rem 2rem 4rem;
        }

        .struktur-head {
            text-align: center;
            margin-bottom: 3.5rem;
        }

        .struktur-head h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 900;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .struktur-head p {
            color: var(--text-gray);
            font-size: 0.95rem;
        }

        .struktur-bar {
            width: 56px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-dark), var(--primary));
            border-radius: 99px;
            margin: 0.75rem auto 0;
        }

        /* ORG TREE */
        .org-tree {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .org-level {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .level-pill {
            display: inline-block;
            background: var(--primary-dark);
            color: white;
            font-size: 0.68rem;
            font-weight: 800;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            padding: 0.38rem 1.25rem;
            border-radius: 50px;
            margin-bottom: 1.5rem;
        }

        .cards-row {
            display: flex;
            justify-content: center;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .v-connector {
            width: 3px;
            height: 44px;
            background: linear-gradient(to bottom, var(--primary-dark), var(--primary));
            border-radius: 2px;
            margin: 0 auto;
        }

        /* CARD individual */
        .member-card {
            background: white;
            border: 2.5px solid var(--border-medium);
            border-radius: 18px;
            overflow: hidden;
            transition: all 0.3s ease;
            text-align: center;
            width: 200px;
            flex-shrink: 0;
        }

        .member-card:hover {
            border-color: var(--primary);
            transform: translateY(-7px);
            box-shadow: 0 20px 40px rgba(13, 81, 145, 0.13);
        }

        .member-card.lead {
            width: 220px;
            border-color: var(--primary-dark);
            border-width: 3px;
        }

        .member-card.lead:hover {
            border-color: #1a78c2;
            box-shadow: 0 20px 40px rgba(13, 81, 145, 0.18);
        }

        .card-img {
            width: 100%;
            height: auto;
            display: block;
            object-fit: contain;
            background: #f8fafc;
        }

        .card-body {
            padding: 0.9rem 0.8rem 1.1rem;
            border-top: 3px solid var(--bg-soft);
        }

        .card-role-badge {
            display: inline-block;
            background: var(--primary-dark);
            color: white;
            font-size: 0.65rem;
            font-weight: 800;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 0.28rem 0.85rem;
            border-radius: 50px;
            margin-bottom: 0.55rem;
        }

        .card-name {
            font-family: Inter, system-ui, sans-serif;
            font-size: 0.9rem;
            font-weight: 800;
            color: var(--text-dark);
            line-height: 1.3;
            margin: 0;
        }

        /* CARD GRUP */
        .group-card {
            background: white;
            border: 2.5px solid var(--border-medium);
            border-radius: 18px;
            overflow: hidden;
            transition: all 0.3s ease;
            text-align: center;
        }

        .group-card:hover {
            border-color: var(--primary);
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(13, 81, 145, 0.13);
        }

        .group-card .card-img {
            width: 100%;
            height: auto;
            display: block;
            object-fit: contain;
            background: #000;
        }

        .group-names {
            display: flex;
            justify-content: space-around;
            padding: 1rem 0.5rem;
            border-top: 3px solid var(--bg-soft);
            gap: 0.5rem;
        }

        .group-member {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
        }

        .group-member .card-role-badge {
            display: inline-block;
            color: white;
            font-size: 0.6rem;
            font-weight: 800;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 0.25rem 0.7rem;
            border-radius: 50px;
            margin-bottom: 0.4rem;
        }

        .group-member .card-name {
            font-family: Inter, system-ui, sans-serif;
            font-size: 0.82rem;
            font-weight: 800;
            color: var(--text-dark);
            line-height: 1.3;
            margin: 0;
        }

        /* VISI MISI */
        .vm-section {
            background: var(--bg-soft);
            padding: 5rem 2rem;
        }

        .vm-inner {
            max-width: 1000px;
            margin: 0 auto;
        }

        .vm-title {
            margin-bottom: 2.5rem;
        }

        .vm-title h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 900;
            color: var(--text-dark);
            margin-bottom: 0.4rem;
        }

        .vm-title p {
            color: var(--text-gray);
            font-size: 0.95rem;
        }

        .vm-bar {
            width: 56px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-dark), var(--primary));
            border-radius: 99px;
            margin: 0.75rem 0 0;
        }

        .vm-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }

        .vm-card {
            background: white;
            border: 2.5px solid var(--border-medium);
            border-radius: 20px;
            padding: 2.25rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .vm-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-dark), var(--primary));
        }

        .vm-card:hover {
            border-color: var(--primary);
            transform: translateY(-4px);
            box-shadow: 0 14px 36px rgba(0, 0, 0, 0.07);
        }

        .vm-card h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 0.9rem;
        }

        .vm-card p,
        .vm-card ul {
            color: var(--text-gray);
            line-height: 1.8;
            font-size: 0.92rem;
        }

        .vm-card ul {
            padding-left: 1.2rem;
            margin: 0;
        }

        .vm-card ul li {
            margin-bottom: 0.4rem;
        }

        .vm-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.1rem;
        }

        .vm-icon svg {
            width: 24px;
            height: 24px;
            color: white;
            fill: none;
            stroke: currentColor;
            stroke-width: 2;
        }

        /* KONTAK */
        .kontak-section {
            max-width: 1000px;
            margin: 5rem auto;
            padding: 0 2rem;
        }

        .kontak-box {
            background: linear-gradient(135deg, #0a3d72 0%, #1a78c2 100%);
            border-radius: 24px;
            padding: 3rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .kontak-box h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.65rem;
            font-weight: 800;
            color: white;
            margin-bottom: 0.4rem;
        }

        .kontak-box p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.92rem;
        }

        .kontak-email {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            background: white;
            color: var(--primary-dark);
            font-weight: 700;
            padding: 0.85rem 1.85rem;
            border-radius: 50px;
            text-decoration: none;
            font-size: 0.92rem;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .kontak-email:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 768px) {
            .cards-row {
                gap: 1.25rem;
            }

            .member-card {
                width: 155px;
            }

            .member-card.lead {
                width: 170px;
            }

            .vm-grid {
                grid-template-columns: 1fr;
            }

            .kontak-box {
                flex-direction: column;
                text-align: center;
            }

            .group-names {
                flex-direction: column;
                align-items: center;
                gap: 0.75rem;
            }
        }

        @media (max-width: 480px) {
            .member-card {
                width: 130px;
            }

            .member-card.lead {
                width: 145px;
            }
        }
    </style>

    <!-- HERO -->
    <section class="redaksi-hero">
        <div class="redaksi-hero-inner">
            <div class="hero-kicker">
                <span class="hero-kicker-dot"></span>
                Fokus Kito
            </div>
            <h1>Struktur Redaksi</h1>
            <p>Tim jurnalis dan editor berdedikasi yang berkomitmen menghadirkan berita akurat, berimbang, dan berdampak
                bagi masyarakat Indonesia.</p>
        </div>
    </section>

    <!-- STRUKTUR ORGANISASI -->
    <section class="struktur-wrapper">
        <div class="struktur-head">
            <h2>Susunan Redaksi</h2>
            <p>Kenali tim di balik setiap berita yang kami hadirkan</p>
            <div class="struktur-bar"></div>
        </div>

        <div class="org-tree">

            {{-- ===== LEVEL 1: PIMPINAN REDAKSI ===== --}}
            <div class="org-level">
                <span class="level-pill">Pimpinan Redaksi</span>
                <div class="cards-row">

                    <div class="member-card lead">
                        <img src="{{ asset('asset/img/redaksi/pimpinan-redaksi1.png') }}" alt="Abdul Rahman Adi Putra"
                            class="card-img">
                        <div class="card-body">
                            <span class="card-role-badge">Pimpinan Redaksi</span>
                            <p class="card-name">Abdul Rahman Adi Putra</p>
                        </div>
                    </div>


                </div>
            </div>

            <div class="v-connector"></div>

            {{-- ===== LEVEL 2: EDITOR ===== --}}
            <div class="org-level">
                <span class="level-pill">Editor & Wartawan & Kontributor</span>
                <div class="cards-row">

                    <div class="member-card">
                        <img src="{{ asset('asset/img/redaksi/editor.png') }}" alt="Rahmad Aditya" class="card-img">
                        <div class="card-body">
                            <span class="card-role-badge">Editor</span>
                            <p class="card-name">Rahmad Aditya</p>
                        </div>
                    </div>

                    <div class="cards-row">

                        {{-- Grup: Tri Satya (Wartawan) + Adelia (Kontributor) --}}
                        <div class="group-card" style="max-width: 600px;">
                            <img src="{{ asset('asset/img/redaksi/wartawan-kontributor.png') }}"
                                alt="Tri Satya dan Adelia Nur Alfarisi" class="card-img">
                            <div class="group-names">
                                <div class="group-member">
                                    <span class="card-role-badge" style="background: #1a6b3a;">Wartawan</span>
                                    <p class="card-name">Tri Satya</p>
                                </div>
                                <div class="group-member">
                                    <span class="card-role-badge" style="background: #7c3aed;">Kontributor</span>
                                    <p class="card-name">Adelia Nur Alfarisi</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Grup: Syafira (Editor) + Suswanti (Wartawan) + Iqbal (Kontributor) --}}
                    {{-- <div class="group-card" style="max-width: 420px;">
                        <img src="{{ asset('asset/img/redaksi/editor-wartawan-kontributor.png') }}"
                            alt="Syafira Rizky F, Suswanti, M Iqbal Hakim" class="card-img">
                        <div class="group-names">
                            <div class="group-member">
                                <span class="card-role-badge" style="background: var(--primary-dark);">Editor</span>
                                <p class="card-name">Syafira Rizky F</p>
                            </div>
                            <div class="group-member">
                                <span class="card-role-badge" style="background: #1a6b3a;">Wartawan</span>
                                <p class="card-name">Suswanti</p>
                            </div>
                            <div class="group-member">
                                <span class="card-role-badge" style="background: #7c3aed;">Kontributor</span>
                                <p class="card-name">M Iqbal Hakim</p>
                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>

        </div>
    </section>


    <!-- VISI & MISI -->
    {{-- <section class="vm-section">
        <div class="vm-inner">
            <div class="vm-title">
                <h2>Visi & Misi</h2>
                <p>Landasan kami dalam menghadirkan jurnalisme berkualitas</p>
                <div class="vm-bar"></div>
            </div>
            <div class="vm-grid">
                <div class="vm-card">
                    <div class="vm-icon">
                        <svg viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h3>Visi</h3>
                    <p>Menjadi media berita digital terdepan di Sumatera Selatan yang dipercaya masyarakat sebagai sumber
                        informasi akurat, independen, dan bertanggung jawab dalam menegakkan nilai-nilai jurnalisme
                        profesional.</p>
                </div>
                <div class="vm-card">
                    <div class="vm-icon">
                        <svg viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                        </svg>
                    </div>
                    <h3>Misi</h3>
                    <ul>
                        <li>Menyajikan berita faktual, berimbang, dan tepat waktu</li>
                        <li>Mengedepankan kepentingan publik dalam setiap liputan</li>
                        <li>Mendorong transparansi dan akuntabilitas di masyarakat</li>
                        <li>Mengembangkan jurnalisme digital yang inovatif dan berkualitas</li>
                    </ul>
                </div>
            </div>
        </div>
    </section> --}}


    <!-- KONTAK REDAKSI -->
    <section class="kontak-section">
        <div class="kontak-box">
            <div>
                <h3>Hubungi Tim Redaksi</h3>
                <p>Punya informasi, kritik, atau saran? Kami terbuka untuk masukan dari Anda.</p>
            </div>
            <a href="mailto:fokuskito@gmail.com" class="kontak-email">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="currentColor"
                    stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                </svg>
                fokuskito@gmail.com
            </a>
        </div>
    </section>

@endsection
