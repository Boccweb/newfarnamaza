<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Artikel – Apotek Farmaza 2</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700;800;900&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="Style.css">
</head>
<body data-page="artikel">

  <div id="navbarPlaceholder"></div>

  <!-- Hero -->
  <div class="artikel-page-hero">
    <div class="section-label">Tips & Info Kesehatan</div>
    <h1>Artikel Farmaza</h1>
    <p>Informasi kesehatan terpercaya untuk Anda dan keluarga</p>
  </div>

  <!-- Kategori scroll -->
  <div class="kat-scroll" id="katScroll"></div>

  <!-- Search -->
  <div class="artikel-search-row">
    <div class="artikel-search">
      <i class="fas fa-search"></i>
      <input type="text" id="artikelSearch" placeholder="Cari artikel kesehatan..." />
    </div>
    <button class="filter-btn"><i class="fas fa-sliders-h"></i> Filter</button>
  </div>

  <!-- Section header -->
  <div class="artikel-section-header">
    <h2>Artikel Terbaru</h2>
    <span class="lihat-semua">Lihat Semua <i class="fas fa-chevron-right"></i></span>
  </div>

  <!-- Featured artikel -->
  <div id="featuredArtikel"></div>

  <!-- List artikel -->
  <div class="artikel-list" id="listArtikel"></div>

  <!-- Newsletter banner -->
  <div class="newsletter-banner">
    <div class="newsletter-icon">📋</div>
    <div class="newsletter-text">
      <h4>Dapatkan Tips Kesehatan Terbaru</h4>
      
    </div>
    <a href="https://wa.me/6285179990832?text=Halo%2C%20saya%20ingin%20berlangganan%20info%20kesehatan%20Farmaza"
       target="_blank" class="newsletter-btn">Konsultasi sekarang</a>
  </div>

  <!-- Footer -->
  <footer class="footer">
    <div class="footer-inner">
      <div class="footer-item"><i class="fab fa-whatsapp footer-icon"></i><div class="footer-text"><strong>WhatsApp</strong>0851-7999-0832</div></div>
      <div class="footer-item"><i class="fab fa-tiktok footer-icon"></i><div class="footer-text"><strong>TikTok</strong>@apotekfarmaza2</div></div>
      <div class="footer-item"><i class="fas fa-headset footer-icon"></i><div class="footer-text"><strong>Konsultasi 24 Jam</strong>Kami siap membantu</div></div>
    </div>
  </footer>

  <!-- Bottom Nav -->
  <nav class="bottom-nav">
    <div class="bottom-nav-inner">
      <div class="bottom-nav-item" data-page="index" data-href="user.php"><i class="fas fa-home"></i><span>Beranda</span></div>
      <div class="bottom-nav-item" data-page="produk" data-href="produk.php"><i class="fas fa-box"></i><span>Produk</span></div>
      <div class="bottom-nav-item" data-page="layanan" data-href="layanan.php"><i class="fas fa-heart"></i><span>Layanan</span></div>
      <div class="bottom-nav-item active" data-page="artikel" data-href="artikel.php"><i class="fas fa-newspaper"></i><span>Artikel</span></div>
      <div class="bottom-nav-item" data-page="kontak" data-href="kontak.php"><i class="fas fa-phone"></i><span>Kontak</span></div>
    </div>
  </nav>

  <!-- Floating WA -->
  <div class="wa-float">
    <div class="wa-tooltip">💬 Konsultasi Gratis!</div>
    <div class="wa-float-btn"><i class="fab fa-whatsapp"></i></div>
  </div>

  <!-- Modal detail artikel -->
  <div class="art-modal-overlay" id="artModal">
    <div class="art-modal-sheet" id="artModalBody"></div>
  </div>

  <script src="artikel-data.js"></script>
  <script src="main.js"></script>
  <script src="artikel.js"></script>
</body>
</html>