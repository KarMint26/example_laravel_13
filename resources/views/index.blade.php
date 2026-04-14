@extends('layouts.app')
@section('subtitle', 'Koneksi Tanpa Akhir, Peluang Tanpa Batas | Freelance Hub')
@section('style_custom')
    <link rel="stylesheet" href="{{ asset('mystyle/css/style-index.css') }}">
@endsection

@section('content')
    <nav class="navbar">
        <div class="nav-brand">
            <img src="{{ asset('mystyle/images/logo/logo.png') }}" alt="AeroLink Logo" class="logo-image">
            <h2 class="logo">AeroLink</h2>
        </div>
        <ul>
            <li><a href="{{ route('index') }}">Beranda</a></li>
            <li><a href="#">Cari Freelance</a></li>
            <li><a href="#">Pasang Proyek</a></li>
            <li>
                @if (Auth::user())
                    @if (Auth::user()->hasRole('Admin'))
                        <a href="{{ route('admin.dashboard') }}" class="btn-nav">Dashboard</a>
                    @endif
                    @if (Auth::user()->hasRole('Employee'))
                        <a href="{{ route('employee.dashboard') }}" class="btn-nav">Dashboard</a>
                    @endif
                    @if (Auth::user()->hasRole('Engineer'))
                        <a href="{{ route('engineer.dashboard') }}" class="btn-nav">Dashboard</a>
                    @endif
                @else
                    <a href="{{ route('auth.register_g') }}" class="btn-nav">Daftar Gratis</a>
                @endif
            </li>
        </ul>
    </nav>

    <section class="hero">
        <div class="hero-text">
            <span class="hero-badge">Platform Freelance #1 di Indonesia</span>
            <h1><span class="highlight">Koneksi Tanpa Akhir</span>, Peluang Tanpa Batas</h1>
            <p>Temukan talenta terbaik atau proyek impianmu. AeroLink jembatan antara perusahaan profesional dan freelancer
                handal dari seluruh Indonesia.</p>
            <div class="hero-actions">
                <a href="{{ route('auth.register_g') }}" class="btn btn-primary">Cari Freelance</a>
                <a href="#" class="btn btn-outline">Pasang Proyek</a>
            </div>
        </div>
    </section>

    <section class="stats">
        <div class="stat-item">
            <span class="stat-number">25K+</span>
            <span class="stat-label">Freelancer Aktif</span>
        </div>
        <div class="stat-divider"></div>
        <div class="stat-item">
            <span class="stat-number">8K+</span>
            <span class="stat-label">Perusahaan Terdaftar</span>
        </div>
        <div class="stat-divider"></div>
        <div class="stat-item">
            <span class="stat-number">15K+</span>
            <span class="stat-label">Proyek Terselesaikan</span>
        </div>
        <div class="stat-divider"></div>
        <div class="stat-item">
            <span class="stat-number">34</span>
            <span class="stat-label">Kota Terjangkau</span>
        </div>
    </section>

    <section class="features">
        <div class="section-header">
            <span class="section-label">Mengapa AeroLink?</span>
            <h2>Jembatan andal antara bakat dan peluang</h2>
            <p>Platform freelance yang dirancang untuk kemudahan dan kepercayaan</p>
        </div>
        <div class="cards">
            <div class="card">
                <div class="card-icon icon-fast">
                    <img src="{{ asset('mystyle/images/icons/fast.png') }}" alt="Fast Icon" class="icon-img">
                </div>
                <h3>Pencocokan Cepat</h3>
                <p>Algoritma cerdas kami mempertemukan perusahaan dengan freelancer yang tepat dalam hitungan jam, bukan
                    minggu.</p>
            </div>
            <div class="card">
                <div class="card-icon icon-secure">
                    <img src="{{ asset('mystyle/images/icons/secure.png') }}" alt="Secure Icon" class="icon-img">
                </div>
                <h3>Sistem Eskrow Aman</h3>
                <p>Dana proyek terlindungi 100%. Pembayaran hanya dicairkan setelah pekerjaan selesai dan disetujui kedua
                    belah pihak.</p>
            </div>
            <div class="card">
                <div class="card-icon icon-reliable">
                    <img src="{{ asset('mystyle/images/icons/reliable.png') }}" alt="Reliable Icon" class="icon-img">
                </div>
                <h3>Verifikasi Talenta</h3>
                <p>Setiap freelancer melalui proses kurasi dan portofolio untuk memastikan kualitas terbaik bagi klien Anda.
                </p>
            </div>
        </div>
    </section>

    <section class="how-it-works">
        <div class="section-header">
            <span class="section-label">Cara Kerja</span>
            <h2>Mulai dalam 3 langkah mudah</h2>
            <p>Untuk perusahaan maupun freelancer, prosesnya simpel dan transparan</p>
        </div>
        <div class="steps">
            <div class="step">
                <div class="step-number">1</div>
                <h4>Daftar & Buat Profil</h4>
                <p>Daftar gratis, lengkapi profil sebagai perusahaan atau freelancer.</p>
            </div>
            <div class="step-arrow">&rarr;</div>
            <div class="step">
                <div class="step-number">2</div>
                <h4>Pasang / Lamar Proyek</h4>
                <p>Perusahaan posting proyek, freelancer kirim penawaran terbaik.</p>
            </div>
            <div class="step-arrow">&rarr;</div>
            <div class="step">
                <div class="step-number">3</div>
                <h4>Kerja & Dapatkan Hasil</h4>
                <p>Kolaborasi, serahkan hasil, dan terima pembayaran aman lewat AeroLink.</p>
            </div>
        </div>
    </section>

    <section class="testimonials">
        <div class="section-header">
            <span class="section-label">Testimoni</span>
            <h2>Apa kata mitra kami</h2>
        </div>
        <div class="testimonial-cards">
            <div class="testimonial-card">
                <p class="testimonial-text">"AeroLink membantu startup kami menemukan UI/UX designer berbakat dalam waktu 3
                    hari. Prosesnya sangat transparan!"</p>
                <div class="testimonial-author">
                    <img src="{{ asset('mystyle/images/avatars/BudiSantoso.png') }}" alt="Budi Santoso" class="avatar">
                    <div>
                        <strong>Budi Santoso</strong>
                        <span>Founder, TechStart.id</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <p class="testimonial-text">"Sebagai freelancer, AeroLink memberi saya proyek rutin setiap bulan. Pembayaran
                    selalu tepat waktu berkat sistem eskrow."</p>
                <div class="testimonial-author">
                    <img src="{{ asset('mystyle/images/avatars/SariDewi.png') }}" alt="Sari Dewi" class="avatar">
                    <div>
                        <strong>Sari Dewi</strong>
                        <span>Freelance Writer, Bandung</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <p class="testimonial-text">"Kami sudah merekrut 5 developer lewat AeroLink. Kualitas talenta luar biasa dan
                    dukungan customer service sangat responsif."</p>
                <div class="testimonial-author">
                    <img src="{{ asset('mystyle/images/avatars/RezaFirmansyah.png') }}" alt="Reza Firmansyah"
                        class="avatar">
                    <div>
                        <strong>Reza Firmansyah</strong>
                        <span>HRD, Solusi24 Group</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta">
        <div class="cta-box">
            <h2>Siap untuk koneksi tanpa akhir?</h2>
            <p>Bergabung dengan ribuan perusahaan dan freelancer yang sudah sukses melalui AeroLink.</p>
            <a href="{{ route('auth.register_g') }}" class="btn btn-primary">Daftar Gratis Sekarang</a>
        </div>
    </section>

    <footer>
        <div class="footer-top">
            <div class="footer-brand">
                <img src="{{ asset('mystyle/images/logo/logo.png') }}" alt="AeroLink Logo" class="footer-logo">
                <h3>AeroLink</h3>
                <p>Koneksi tanpa akhir antara bakat terbaik dan peluang terbaik.</p>
            </div>
            <div class="footer-links">
                <div class="footer-col">
                    <h4>Untuk Freelancer</h4>
                    <ul>
                        <li><a href="#">Cari Proyek</a></li>
                        <li><a href="#">Tips Sukses</a></li>
                        <li><a href="#">Komunitas</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Untuk Perusahaan</h4>
                    <ul>
                        <li><a href="#">Pasang Lowongan</a></li>
                        <li><a href="#">Cari Talenta</a></li>
                        <li><a href="#">Paket Kerjasama</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Dukungan</h4>
                    <ul>
                        <li><a href="#">Pusat Bantuan</a></li>
                        <li><a href="#">Kontak</a></li>
                        <li><a href="#">Status Layanan</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} AeroLink. Koneksi Tanpa Akhir, Peluang Tanpa Batas.</p>
            <div class="footer-legal">
                <a href="#">Kebijakan Privasi</a>
                <a href="#">Syarat &amp; Ketentuan</a>
            </div>
        </div>
    </footer>
@endsection
