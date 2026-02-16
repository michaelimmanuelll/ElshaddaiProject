<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GPdI El-Shaddai | Rumah Bagi Setiap Jiwa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;900&family=Crimson+Pro:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-black: #0a0a0a;
            --soft-black: #1a1a1a;
            --gray: #666;
            --light-gray: #999;
            --white: #ffffff;
            --off-white: #f5f5f5;
        }

        body {
            font-family: 'Crimson Pro', serif;
            background: var(--primary-black);
            color: var(--white);
            overflow-x: hidden;
            line-height: 1.7;
        }

        /* Video Background Hero */
        .hero {
            position: relative;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .video-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: grayscale(100%) brightness(0.4);
            z-index: 0;
        }

        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, 
                rgba(10, 10, 10, 0.7) 0%, 
                rgba(10, 10, 10, 0.5) 50%, 
                rgba(10, 10, 10, 0.9) 100%);
            z-index: 1;
        }

        /* Navigation */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            padding: 2rem 4rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 100;
            background: linear-gradient(to bottom, rgba(10, 10, 10, 0.8), transparent);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        nav.scrolled {
            padding: 1.5rem 4rem;
            background: rgba(10, 10, 10, 0.95);
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            font-weight: 900;
            letter-spacing: 2px;
            color: var(--white);
            text-decoration: none;
            animation: fadeInDown 1s ease;
        }

        .nav-links {
            display: flex;
            gap: 3rem;
            list-style: none;
            animation: fadeInDown 1s ease 0.2s backwards;
        }

        .nav-links a {
            color: var(--white);
            text-decoration: none;
            font-size: 0.95rem;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 1px;
            background: var(--white);
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        /* Hero Content */
        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 900px;
            padding: 0 2rem;
            animation: fadeInUp 1.2s ease 0.5s backwards;
        }

        .hero-subtitle {
            font-size: 0.9rem;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--light-gray);
            margin-bottom: 2rem;
            font-weight: 300;
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 6rem;
            font-weight: 900;
            line-height: 1.1;
            margin-bottom: 2rem;
            letter-spacing: -2px;
        }

        .hero-description {
            font-size: 1.3rem;
            color: var(--light-gray);
            margin-bottom: 3rem;
            font-weight: 300;
        }

        .cta-button {
            display: inline-block;
            padding: 1.2rem 3rem;
            background: var(--white);
            color: var(--primary-black);
            text-decoration: none;
            font-size: 0.9rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 600;
            transition: all 0.4s ease;
            border: 2px solid var(--white);
        }

        .cta-button:hover {
            background: transparent;
            color: var(--white);
            transform: translateY(-3px);
        }

        .scroll-indicator {
            position: absolute;
            bottom: 3rem;
            left: 50%;
            transform: translateX(-50%);
            z-index: 2;
            animation: bounce 2s infinite;
        }

        .scroll-indicator span {
            display: block;
            font-size: 0.8rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
            color: var(--light-gray);
        }

        .scroll-indicator::after {
            content: '';
            display: block;
            width: 1px;
            height: 40px;
            background: var(--white);
            margin: 0 auto;
        }

        /* About Section */
        .about-section {
            background: var(--white);
            color: var(--primary-black);
            padding: 8rem 4rem;
            position: relative;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 4rem;
            font-weight: 900;
            margin-bottom: 3rem;
            line-height: 1.2;
            letter-spacing: -1px;
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 6rem;
            margin-top: 4rem;
        }

        .about-content h3 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            margin-bottom: 1.5rem;
            font-weight: 700;
        }

        .about-content p {
            font-size: 1.1rem;
            color: var(--gray);
            line-height: 1.9;
            margin-bottom: 1.5rem;
        }

        .gpdi-info {
            background: var(--primary-black);
            color: var(--white);
            padding: 3rem;
            margin-top: 4rem;
        }

        .gpdi-info h3 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            margin-bottom: 2rem;
        }

        .gpdi-info p {
            color: var(--light-gray);
            font-size: 1.1rem;
            line-height: 1.9;
        }

        /* Vision Mission Section */
        .vision-mission {
            background: var(--primary-black);
            padding: 8rem 4rem;
            position: relative;
        }

        .vm-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .vm-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 6rem;
            margin-top: 4rem;
        }

        .vm-card {
            padding: 3rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .vm-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--white);
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }

        .vm-card:hover::before {
            transform: scaleX(1);
        }

        .vm-card:hover {
            border-color: rgba(255, 255, 255, 0.3);
            transform: translateY(-10px);
        }

        .vm-label {
            font-size: 0.8rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--light-gray);
            margin-bottom: 1.5rem;
        }

        .vm-card h3 {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            margin-bottom: 2rem;
            font-weight: 700;
        }

        .vm-card ul {
            list-style: none;
            padding: 0;
        }

        .vm-card li {
            font-size: 1.1rem;
            color: var(--light-gray);
            margin-bottom: 1.5rem;
            padding-left: 2rem;
            position: relative;
            line-height: 1.8;
        }

        .vm-card li::before {
            content: '—';
            position: absolute;
            left: 0;
            color: var(--white);
        }

        /* Activities Section */
        .activities {
            background: var(--off-white);
            color: var(--primary-black);
            padding: 8rem 4rem;
        }

        .activities-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 3rem;
            margin-top: 4rem;
        }

        .activity-card {
            background: var(--white);
            padding: 3rem 2rem;
            border: 1px solid rgba(0, 0, 0, 0.05);
            transition: all 0.4s ease;
            text-align: center;
        }

        .activity-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        }

        .activity-icon {
            font-size: 3rem;
            margin-bottom: 2rem;
            opacity: 0.8;
        }

        .activity-card h4 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .activity-time {
            font-size: 0.9rem;
            color: var(--gray);
            margin-bottom: 1rem;
            letter-spacing: 1px;
        }

        .activity-card p {
            font-size: 1rem;
            color: var(--gray);
            line-height: 1.7;
        }

        /* Gallery Section */
        .gallery {
            background: var(--primary-black);
            padding: 8rem 4rem;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
            margin-top: 4rem;
        }

        .gallery-item {
            aspect-ratio: 1;
            background: var(--soft-black);
            position: relative;
            overflow: hidden;
            cursor: pointer;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: grayscale(100%);
            transition: all 0.5s ease;
        }

        .gallery-item:hover img {
            filter: grayscale(0%);
            transform: scale(1.1);
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        /* Contact Section */
        .contact {
            background: var(--white);
            color: var(--primary-black);
            padding: 8rem 4rem;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 6rem;
            margin-top: 4rem;
        }

        .contact-info h4 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            font-weight: 700;
        }

        .contact-info p {
            font-size: 1.1rem;
            color: var(--gray);
            margin-bottom: 1rem;
            line-height: 1.8;
        }

        .social-links {
            display: flex;
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .social-links a {
            width: 50px;
            height: 50px;
            border: 1px solid var(--primary-black);
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: var(--primary-black);
            transition: all 0.3s ease;
            font-size: 1.2rem;
        }

        .social-links a:hover {
            background: var(--primary-black);
            color: var(--white);
            transform: translateY(-3px);
        }

        .map-container {
            background: var(--off-white);
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1); /* Memberi sedikit bayangan */
            border-radius: 15px; /* Membuat sudut peta melengkung */
        }

        /* Footer */
        footer {
            background: var(--primary-black);
            padding: 3rem 4rem;
            text-align: center;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        footer p {
            color: var(--light-gray);
            font-size: 0.9rem;
            letter-spacing: 1px;
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

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounce {
            0%, 100% {
                transform: translateX(-50%) translateY(0);
            }
            50% {
                transform: translateX(-50%) translateY(-10px);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            nav {
                padding: 1.5rem 2rem;
            }

            .nav-links {
                display: none;
            }

            .hero-title {
                font-size: 3rem;
            }

            .section-title {
                font-size: 2.5rem;
            }

            .about-grid,
            .vm-grid,
            .contact-grid {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .activities-grid {
                grid-template-columns: 1fr;
            }

            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* Scroll Progress Bar */
        .progress-bar {
            position: fixed;
            top: 0;
            left: 0;
            height: 3px;
            background: var(--white);
            z-index: 1000;
            transition: width 0.1s ease;
        }
    </style>
</head>
<body>
    <div class="progress-bar" id="progressBar"></div>

    <!-- Navigation -->
    <nav id="navbar">
        <a href="#" class="logo">EL-SHADDAI</a>
        <ul class="nav-links">
            <li><a href="#tentang">Tentang</a></li>
            <li><a href="#visi-misi">Visi & Misi</a></li>
            <li><a href="#kegiatan">Kegiatan</a></li>
            <li><a href="#kontak">Kontak</a></li>
            <li><a href="{{ route('login') }}" class="btn-login">Login</a></li>
        </ul>
    </nav>

    <!-- Hero Section with Video Background -->
    <section class="hero">
        <video class="video-background" autoplay muted loop playsinline>
            <source src="https://cdn.coverr.co/videos/coverr-congregation-praising-in-church-9146/1080p.mp4" type="video/mp4">
        </video>
        <div class="video-overlay"></div>
        
        <div class="hero-content">
            <div class="hero-subtitle">Gereja Pentakosta di Indonesia</div>
            <h1 class="hero-title">El-Shaddai</h1>
            <p class="hero-description">
                Rumah bagi setiap jiwa yang haus akan kebenaran.<br>
                Sebuah komunitas yang dibangun atas kasih dan iman.
            </p>
            <a href="#tentang" class="cta-button">Kenali Kami Lebih Dekat</a>
        </div>

        <div class="scroll-indicator">
            <span>Scroll</span>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section" id="tentang">
        <h2 class="section-title">Lebih dari sekadar<br>tempat ibadah</h2>
        
        <div class="about-grid">
            <div class="about-content">
                <h3>Selamat Datang di Keluarga Kami</h3>
                <p>
                    GPdI El-Shaddai adalah komunitas iman yang berdiri sejak tahun 1995, 
                    melayani ribuan jemaat dengan kasih Kristus. Kami percaya bahwa gereja 
                    adalah lebih dari sekadar bangunan—ini adalah keluarga yang saling 
                    menguatkan, mendukung, dan bertumbuh bersama dalam perjalanan rohani.
                </p>
                <p>
                    Nama "El-Shaddai" yang berarti "Allah Yang Mahakuasa" menjadi fondasi 
                    keyakinan kami bahwa Tuhan adalah sumber kekuatan di setiap musim kehidupan. 
                    Di sini, setiap orang dikasihi, setiap cerita dihargai, dan setiap jiwa 
                    menemukan rumah.
                </p>
            </div>
            
            <div class="about-content">
                <h3>Mengapa El-Shaddai?</h3>
                <p>
                    Di tengah hiruk pikuk kehidupan modern, kami menawarkan tempat yang teduh—
                    ruang untuk berefleksi, berdoa, dan menemukan kedamaian sejati. Ibadah kami 
                    penuh dengan pujian yang mengangkat jiwa, firman yang mengubah hidup, dan 
                    persekutuan yang tulus.
                </p>
                <p>
                    Kami tidak hanya berkumpul pada hari Minggu, tetapi hidup sebagai komunitas 
                    sepanjang minggu—melalui kelompok sel, pelayanan sosial, dan kegiatan yang 
                    memperkuat iman dan memberkati sesama.
                </p>
            </div>
        </div>

        <div class="gpdi-info">
            <h3>Tentang Gereja Pentakosta di Indonesia (GPdI)</h3>
            <p>
                Gereja Pentakosta di Indonesia (GPdI) adalah salah satu denominasi Kristen 
                Pentakosta terbesar di Indonesia yang didirikan pada tahun 1946. GPdI menekankan 
                pengalaman pribadi dengan Roh Kudus, baptisan Roh Kudus dengan bukti berbahasa roh, 
                dan karunia-karunia rohani sebagaimana tercatat dalam Alkitab.
            </p>
            <p>
                Dengan lebih dari 6.000 gereja lokal dan jutaan jemaat di seluruh nusantara, 
                GPdI berkomitmen untuk memberitakan Injil Yesus Kristus, membangun jemaat yang kuat 
                dalam iman, dan melayani masyarakat dengan kasih. El-Shaddai adalah bagian dari 
                keluarga besar GPdI yang terus bertumbuh dan membawa transformasi rohani di setiap 
                generasi.
            </p>
        </div>
    </section>

    <!-- Vision Mission Section -->
    <section class="vision-mission" id="visi-misi">
        <div class="vm-container">
            <h2 class="section-title">Visi & Misi Kami</h2>
            
            <div class="vm-grid">
                <div class="vm-card">
                    <div class="vm-label">Visi Kami</div>
                    <h3>Menjadi Terang bagi Dunia</h3>
                    <ul>
                        <li>
                            Membangun komunitas Kristen yang kuat, dipenuhi kasih, dan 
                            berdampak nyata bagi masyarakat sekitar
                        </li>
                        <li>
                            Menghadirkan kerajaan Allah melalui pelayanan yang holistik—
                            menjangkau jiwa, raga, dan kehidupan sosial jemaat
                        </li>
                        <li>
                            Menjadi gereja yang relevan bagi setiap generasi, tanpa 
                            kehilangan akar iman Pentakosta yang autentik
                        </li>
                        <li>
                            Memperlengkapi setiap jemaat untuk menjadi saksi Kristus di 
                            mana pun mereka berada—di keluarga, pekerjaan, dan masyarakat
                        </li>
                    </ul>
                </div>

                <div class="vm-card">
                    <div class="vm-label">Misi Kami</div>
                    <h3>Melayani dengan Kasih</h3>
                    <ul>
                        <li>
                            Menyelenggarakan ibadah yang hidup, penuh pujian, dan 
                            dipimpin oleh Roh Kudus untuk memuliakan nama Tuhan
                        </li>
                        <li>
                            Mengajar Firman Allah secara sistematis dan aplikatif agar 
                            jemaat bertumbuh dalam pengenalan akan Kristus
                        </li>
                        <li>
                            Mengembangkan pelayanan kelompok sel untuk membangun 
                            persekutuan yang intim dan saling menguatkan
                        </li>
                        <li>
                            Melakukan pelayanan sosial dan misi penginjilan untuk 
                            menjangkau jiwa-jiwa yang belum percaya
                        </li>
                        <li>
                            Memberdayakan generasi muda melalui program pemuridan dan 
                            kepemimpinan yang relevan
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Activities Section -->
    <section class="activities" id="kegiatan">
        <h2 class="section-title">Kegiatan Gereja</h2>
        
        <div class="activities-grid">
            <div class="activity-card">
                <div class="activity-icon">✝️</div>
                <h4>Ibadah Minggu</h4>
                <div class="activity-time">Minggu, 08:00 & 17:00 WITA</div>
                <p>
                    Ibadah raya yang penuh sukacita dengan pujian, penyembahan, 
                    dan khotbah firman Tuhan yang menginspirasi. Datanglah 
                    bersama keluarga dan rasakan hadirat-Nya.
                </p>
            </div>

            <div class="activity-card">
                <div class="activity-icon">🙏</div>
                <h4>Unit Doa</h4>
                <div class="activity-time">SENIN, 19:00 WITA</div>
                <p>
                    
                </p>
            </div>

            <div class="activity-card">
                <div class="activity-icon">📖</div>
                <h4>Nama Kegiatan</h4>
                <div class="activity-time"> -- WITA</div>
                <p>
                    Menggali kedalaman Firman Tuhan melalui pembahasan interaktif, 
                    diskusi kelompok, dan aplikasi praktis dalam kehidupan sehari-hari.
                </p>
            </div>

            <div class="activity-card">
                <div class="activity-icon">👨‍👩‍👧‍👦</div>
                <h4>Nama Kegiatan</h4>
                <div class="activity-time">Waktu</div>
                <p>
                    penjelasan
                </p>
            </div>

            <div class="activity-card">
                <div class="activity-icon">🎸</div>
                <h4>Youth Service</h4>
                <div class="activity-time">Sabtu, 19:00 WITA</div>
                <p>
                    Ibadah khusus untuk generasi muda dengan pujian yang energik, 
                    firman yang relevan, dan komunitas yang seru. Temukan tujuan 
                    hidupmu di sini!
                </p>
            </div>

            <div class="activity-card">
                <div class="activity-icon">🎓</div>
                <h4>Sekolah Minggu</h4>
                <div class="activity-time">Minggu, 08:00 WITA</div>
                <p>
                    Program khusus untuk anak-anak dengan pengajaran Alkitab yang fun, 
                    permainan edukatif, dan aktivitas yang membangun karakter Kristiani 
                    sejak dini.
                </p>
            </div>

            <div class="activity-card">
                <div class="activity-icon">🎵</div>
                <h4>Latihan Paduan Suara</h4>
                <div class="activity-time">Jumat, 19:30 WITA</div>
                <p>
                    Bagi yang memiliki talenta musik dan ingin melayani Tuhan 
                    melalui nyanyian. Mari memuliakan nama-Nya dengan harmoni 
                    yang indah!
                </p>
            </div>

            <div class="activity-card">
                <div class="activity-icon">❤️</div>
                <h4>Pelayanan Sosial</h4>
                <div class="activity-time">Sabtu Terakhir Setiap Bulan</div>
                <p>
                    Mengasihi sesama melalui tindakan nyata—kunjungan ke panti 
                    asuhan, bakti sosial, dan pelayanan kepada mereka yang 
                    membutuhkan.
                </p>
            </div>

            <div class="activity-card">
                <div class="activity-icon">💼</div>
                <h4>Retreat & Seminar</h4>
                <div class="activity-time">Acara Khusus</div>
                <p>
                    Program pelatihan kepemimpinan, seminar keluarga, retreat 
                    rohani, dan konferensi yang dirancang untuk memperlengkapi 
                    jemaat dalam berbagai aspek kehidupan.
                </p>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery">
        <h2 class="section-title">Momen Bersama</h2>
        
        <div class="gallery-grid">
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1438232992991-995b7058bbb3?w=400" alt="Worship">
                <div class="gallery-overlay">
                    <span style="color: white; font-size: 0.9rem; letter-spacing: 2px;">WORSHIP</span>
                </div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1507692049790-de58290a4334?w=400" alt="Prayer">
                <div class="gallery-overlay">
                    <span style="color: white; font-size: 0.9rem; letter-spacing: 2px;">PRAYER</span>
                </div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=400" alt="Youth">
                <div class="gallery-overlay">
                    <span style="color: white; font-size: 0.9rem; letter-spacing: 2px;">YOUTH</span>
                </div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?w=400" alt="Community">
                <div class="gallery-overlay">
                    <span style="color: white; font-size: 0.9rem; letter-spacing: 2px;">COMMUNITY</span>
                </div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1544027993-37dbfe43562a?w=400" alt="Kids">
                <div class="gallery-overlay">
                    <span style="color: white; font-size: 0.9rem; letter-spacing: 2px;">KIDS</span>
                </div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?w=400" alt="Baptism">
                <div class="gallery-overlay">
                    <span style="color: white; font-size: 0.9rem; letter-spacing: 2px;">BAPTISM</span>
                </div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1491975474562-1f4e30bc9468?w=400" alt="Mission">
                <div class="gallery-overlay">
                    <span style="color: white; font-size: 0.9rem; letter-spacing: 2px;">MISSION</span>
                </div>
            </div>
            <div class="gallery-item">
                <img src="https://images.unsplash.com/photo-1517457373958-b7bdd4587205?w=400" alt="Fellowship">
                <div class="gallery-overlay">
                    <span style="color: white; font-size: 0.9rem; letter-spacing: 2px;">FELLOWSHIP</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="kontak">
        <h2 class="section-title">Hubungi Kami</h2>
        
        <div class="contact-grid">
            <div class="contact-info">
                <h4>Kunjungi Kami</h4>
                <p>
                    <strong>Alamat:</strong><br>
                    Jl. Perintis Kemerdekaan No.78, Kapasa, Kec. Tamalanrea<br>
                    Kota Makassar, Sulawesi Selatan 90245
                </p>
                
                <p>
                    <strong>Telepon:</strong><br>
                    -----
                </p>
                
                <p>
                    <strong>Email:</strong><br>
                    ----
                </p>

                <p>
                    <strong>Jam Pelayanan Pastori:</strong><br>
                    --- WITA<br>
                    --- WITA
                </p>

                <div class="social-links">
                    <a href="#">📘</a>
                    <a href="#">📷</a>
                    <a href="#">▶️</a>
                    <a href="#">🎵</a>
                </div>
            </div>

            <div class="map-container">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d527.7949397681392!2d119.50117567864919!3d-5.122500102824292!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbefca14c8c6483%3A0x61a7083b32edcedf!2sGereja%20Pantekosta%20di%20Indonesia%20jemaat%20El-Shaddai!5e0!3m2!1sid!2sid!4v1769586390404!5m2!1sid!2sid"
                    width="100%" 
                    height="400" 
                    style="border:0; border-radius: 10px;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>© 2026 GPdI El-Shaddai Makassar | Gereja Pentakosta di Indonesia</p>
        <p style="margin-top: 0.5rem; font-size: 0.8rem;">
            "Karena di mana dua atau tiga orang berkumpul dalam nama-Ku, di situ Aku ada di tengah-tengah mereka." - Matius 18:20
        </p>
    </footer>

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Progress bar
        window.addEventListener('scroll', function() {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            document.getElementById('progressBar').style.width = scrolled + '%';
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Intersection Observer for fade-in animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all cards and sections
        document.querySelectorAll('.activity-card, .vm-card, .gallery-item').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'all 0.6s ease';
            observer.observe(el);
        });
    </script>
</body>
</html>