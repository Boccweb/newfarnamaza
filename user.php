<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Apotek Farmaza 2 – Beranda</title>
  <meta name="description" content="Apotek Farmaza 2 – Solusi kesehatan terpercaya di Mranggen, Demak." />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700;800;900&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="Style.css" />
</head>
<body data-page="index">

  <div id="navbarPlaceholder"></div>

  <!-- ===== HERO =====
       Ganti "hero-banner.png" dengan file gambar Anda (taruh di folder UMKM)
       Ukuran ideal hero banner: LEBAR 1400px x TINGGI 500px
  -->
  <section class="hero" style="background-image: url('hero-banner.png');">
    <div class="hero-inner">
      <div class="hero-content">
        <span class="hero-label">Apotek Farmaza 2</span>
        <h1 class="hero-title">
          <span class="line1">Sehat Bersama,</span>
          <span class="line2">Kami Siap Melayani</span>
        </h1>
        <p class="hero-desc">Solusi kesehatan terpercaya untuk Anda dan keluarga. Konsultasi, obat, dan layanan terbaik setiap hari.</p>
        <div class="hero-btns">
          <a href="https://wa.me/6285179990832?text=Halo%20saya%20mau%20konsultasi" target="_blank" class="btn-primary">
            <i class="fab fa-whatsapp"></i> 0851-7999-0832
          </a>
          <a href="layanan.html" class="btn-outline">
            Lihat Layanan <i class="fas fa-arrow-right"></i>
          </a>
          <a href="index.html" class="btn-outline" style="border-color: #ef4444; color: #ef4444; background: #fef2f2;">
            <i class="fas fa-sign-out-alt"></i> Keluar
          </a>
        </div>
        <div class="hero-badges">
          <div class="hero-badge"><i class="fas fa-shield-alt"></i> Obat Terjamin</div>
          <div class="hero-badge"><i class="fas fa-comments"></i> Konsultasi 24 Jam</div>
          <div class="hero-badge"><i class="fas fa-truck"></i> Layanan Antar</div>
        </div>
      </div>
      <!-- Delivery card pojok kanan -->
      <div class="hero-img-wrap">
        <div class="delivery-card">
          <div class="d-title">FARMAZA<br><span>DELIVERY</span></div>
          <div class="d-sub">Siap mengantarkan obat Anda</div>
          <a href="https://wa.me/6285179990832?text=Halo%20saya%20mau%20order%20delivery" target="_blank" class="btn-order">Order Sekarang</a>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== SERVICES HORIZONTAL SCROLL ===== -->
  <div class="services-scroll-section">
    <div class="services-scroll-inner">
      <div class="services-scroll-outer">
        <button class="scroll-arrow left" id="scrollLeft"><i class="fas fa-chevron-left"></i></button>
        <div class="services-scroll-track" id="servicesTrack">
          <div class="service-item" onclick="window.location='layanan.php'">
            <div class="service-icon si-blue"><i class="fas fa-comment-medical"></i></div>
            <span class="svc-label">Konsultasi Obat Gratis</span>
          </div>
          <div class="service-item" onclick="window.location='layanan.php'">
            <div class="service-icon si-green"><i class="fas fa-flask"></i></div>
            <span class="svc-label">Cek Kesehatan</span>
          </div>
          <div class="service-item" onclick="window.location='produk.html'">
            <div class="service-icon si-yellow"><i class="fas fa-stethoscope"></i></div>
            <span class="svc-label">Perlengkapan & Alat Kesehatan</span>
          </div>
          <div class="service-item" onclick="window.location='produk.html'">
            <div class="service-icon si-pink"><i class="fas fa-baby"></i></div>
            <span class="svc-label">Perlengkapan Bayi</span>
          </div>
          <div class="service-item" onclick="window.location='layanan.php'">
            <div class="service-icon si-purple"><i class="fas fa-motorcycle"></i></div>
            <span class="svc-label">Layanan Antar</span>
          </div>
          <div class="service-item" onclick="window.location='layanan.php'">
            <div class="service-icon si-teal"><i class="fas fa-lungs"></i></div>
            <span class="svc-label">Pusat Oksigen & Alat Kesehatan</span>
          </div>
        </div>
        <button class="scroll-arrow right" id="scrollRight"><i class="fas fa-chevron-right"></i></button>
      </div>
    </div>
  </div>

  <!-- ===== CEK KESEHATAN — FULL IMAGE CARD =====
       Ganti "health-card.png" dengan file gambar desain Anda.
       Ukuran ideal: LEBAR 1160px x TINGGI 280px
       (Gambar akan tampil penuh, tidak terpotong, di Windows maupun Android)
  -->
  <section class="health-check-section">
    <div class="container">
      <div class="health-card-img fade-up">
        <a href="https://wa.me/6285179990832?text=Halo%2C%20saya%20mau%20cek%20kesehatan%20di%20Farmaza" target="_blank">
          <img src="hg (1).jpg" alt="Cek Kesehatanmu di Farmaza" />
        </a>
      </div>
    </div>
  </section>

  <!-- ===== TENTANG & INFO ===== -->
  <section class="info-section">
    <div class="container">
      <div class="info-grid">
        <div class="about-card fade-up">
          <div class="section-label">Tentang Kami</div>
          <h3 class="section-title">Apotek Farmaza 2</h3>
          <p>Apotek Farmaza 2 berkomitmen untuk memberikan pelayanan kesehatan terbaik dengan obat berkualitas, harga terjangkau, dan pelayanan yang ramah kepada seluruh masyarakat Mranggen dan sekitarnya.</p>
          <a href="tentang.html" class="btn-selengkapnya">Selengkapnya <i class="fas fa-arrow-right"></i></a>
        </div>
        <div class="info-cards fade-up">
          <div class="info-item" onclick="window.location='kontak.php'">
            <div class="info-icon"><i class="far fa-clock"></i></div>
            <div class="info-text"><h4>Jam Buka</h4><p>05.00 – 22.00 · Setiap Hari</p></div>
            <i class="fas fa-chevron-right info-chevron"></i>
          </div>
          <div class="info-item" onclick="window.location='kontak.php'">
            <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
            <div class="info-text"><h4>Lokasi Kami</h4><p>Desa Ngemplak 01/01, Mranggen, Demak</p></div>
            <i class="fas fa-chevron-right info-chevron"></i>
          </div>
          <div class="info-item" onclick="window.open('https://wa.me/6285179990832','_blank')">
            <div class="info-icon"><i class="fab fa-whatsapp"></i></div>
            <div class="info-text"><h4>Konsultasi 24 Jam</h4><p>Kami siap membantu Anda kapanpun</p></div>
            <i class="fas fa-chevron-right info-chevron"></i>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== FOOTER ===== -->
  <footer class="footer">
    <div class="footer-inner">
      <div class="footer-item">
        <i class="fab fa-whatsapp footer-icon"></i>
        <div class="footer-text"><strong>WhatsApp</strong>0851-7999-0832</div>
      </div>
      <div class="footer-item">
        <i class="fab fa-tiktok footer-icon"></i>
        <div class="footer-text"><strong>TikTok</strong>@apotekfarmaza2</div>
      </div>
      <div class="footer-item">
        <i class="fas fa-headset footer-icon"></i>
        <div class="footer-text"><strong>Konsultasi 24 Jam</strong>Kami siap membantu</div>
      </div>
    </div>
  </footer>

  <!-- ===== BOTTOM NAV ===== -->
  <nav class="bottom-nav">
    <div class="bottom-nav-inner">
      <div class="bottom-nav-item active" data-page="index" data-href="user.php">
        <i class="fas fa-home"></i><span>Beranda</span>
      </div>
      <div class="bottom-nav-item" data-page="produk" data-href="produk.php">
        <i class="fas fa-box"></i><span>Produk</span>
      </div>
      <div class="bottom-nav-item" data-page="layanan" data-href="layanan.php">
        <i class="fas fa-heart"></i><span>Layanan</span>
      </div>
      <div class="bottom-nav-item" data-page="artikel" data-href="artikel.php">
        <i class="fas fa-newspaper"></i><span>Artikel</span>
      </div>
      <div class="bottom-nav-item" data-page="kontak" data-href="kontak.php">
        <i class="fas fa-phone"></i><span>Kontak</span>
      </div>
    </div>
  </nav>

  <div class="wa-float">
    <div class="wa-tooltip">💬 Konsultasi Gratis!</div>
    <div class="wa-float-btn"><i class="fab fa-whatsapp"></i></div>
  </div>

  <script src="main.js"></script>
</body>
</html>