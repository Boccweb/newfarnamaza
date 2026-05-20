<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Layanan – Apotek Farmaza 2</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700;800;900&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="Style.css" />
</head>
<body data-page="layanan">

  <div id="navbarPlaceholder"></div>

  <!-- ===== HERO ===== -->
  <div class="layanan-hero">
    <div class="lbl">Layanan Kami</div>
    <h1>Layanan Apotek Farmaza 2</h1>
    <p>Kami siap memberikan layanan terbaik<br>untuk kesehatan Anda dan keluarga.</p>
  </div>

  <!-- ==============================================
       LAYANAN UNGGULAN
       Ganti src="" dengan path foto Anda,
       contoh: src="img/konsultasi.jpg"
       ============================================== -->
  <div class="lay-section-title">Layanan Unggulan</div>

  <div class="featured-wrap">

    <!-- CARD 1: Konsultasi Obat -->
    <div class="feat-card fade-up">
      <div class="feat-top">

        <!-- Kiri: konten -->
        <div class="feat-content">
          <div>
            <div class="feat-icon-wrap si-blue">
              <i class="fas fa-comment-medical"></i>
            </div>
            <div class="feat-judul">Konsultasi Obat Gratis</div>
            <div class="feat-desc">
              Konsultasi langsung dengan tenaga farmasi kami seputar obat dan
              penggunaannya tanpa biaya apapun.
            </div>
          </div>
          <div class="pasien-row">
            <div class="pasien-avatars">
              <span>A</span><span>B</span><span>C</span>
            </div>
            <div class="pasien-count"><strong>128+</strong> pasien telah berkonsultasi</div>
          </div>
        </div>

        <!-- Kanan: foto -->
        <div class="feat-photo">
          <!--
            GANTI FOTO: ubah src="" di bawah dengan path foto Anda
            Contoh: src="img/konsultasi.jpg"
            Ukuran ideal: 300x320px, rasio potret
          -->
          <img src="" alt="Konsultasi Obat"
               onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
          <div class="feat-photo-ph">
            <i class="fas fa-image"></i>
            <span>Ganti src=""<br>dengan foto Anda</span>
          </div>
          <div class="feat-doc-label">
            <i class="fas fa-camera"></i> Dokumentasi Layanan
          </div>
        </div>

      </div>
      <div class="feat-footer">
        <a href="https://wa.me/6285179990832?text=Halo%2C%20saya%20mau%20konsultasi%20obat"
           target="_blank" class="feat-cta">
          Konsultasi Sekarang <i class="fas fa-arrow-right"></i>
        </a>
      </div>
    </div>

    <!-- CARD 2: Cek Kesehatan -->
    <div class="feat-card fade-up">
      <div class="feat-top">

        <div class="feat-content">
          <div>
            <div class="feat-icon-wrap si-green">
              <i class="fas fa-flask"></i>
            </div>
            <div class="feat-judul">Cek Kesehatan</div>
            <div class="feat-desc">
              Layanan cek gula darah, kolesterol, dan asam urat.
              Bonus cek tekanan darah (tensi) gratis!
            </div>
          </div>
          <div class="pasien-row">
            <div class="pasien-avatars">
              <span>D</span><span>E</span><span>F</span>
            </div>
            <div class="pasien-count"><strong>245+</strong> pelanggan telah cek kesehatan</div>
          </div>
        </div>

        <div class="feat-photo">
          <!--
            Contoh: src="img/cek-kesehatan.jpg"
          -->
          <img src="" alt="Cek Kesehatan"
               onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
          <div class="feat-photo-ph">
            <i class="fas fa-image"></i>
            <span>Ganti src=""<br>dengan foto Anda</span>
          </div>
          <div class="feat-doc-label">
            <i class="fas fa-camera"></i> Dokumentasi Layanan
          </div>
        </div>

      </div>
      <div class="feat-footer">
        <a href="https://wa.me/6285179990832?text=Halo%2C%20saya%20mau%20cek%20kesehatan"
           target="_blank" class="feat-cta green">
          Daftar Sekarang <i class="fas fa-arrow-right"></i>
        </a>
      </div>
    </div>

  </div><!-- /featured-wrap -->


  <!-- ==============================================
       LAYANAN LAINNYA — grid 2 kolom
       Tiap item: ikon + teks + foto thumb + panah
       ============================================== -->
  <div class="lay-section-title">Layanan Lainnya</div>

  <div class="layanan-lain-grid">

    <!-- Item 1: Perlengkapan & Alat Kesehatan -->
    <div class="lain-item fade-up">
      <div class="lain-icon si-yellow"><i class="fas fa-stethoscope"></i></div>
      <div class="lain-text">
        <div class="lain-judul">Perlengkapan &amp; Alat Kesehatan</div>
        <div class="lain-desc">Kebutuhan alat kesehatan lengkap &amp; berkualitas.</div>
      </div>
      <!--
        GANTI FOTO: src="img/alkes.jpg"
        Ukuran ideal: 120x110px
      -->
      <img src="" alt="Alat Kesehatan" class="lain-thumb"
           onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
      <div class="lain-thumb-ph"><i class="fas fa-wheelchair"></i></div>
      <i class="fas fa-chevron-right lain-arrow"></i>
    </div>

    <!-- Item 2: Perlengkapan Bayi -->
    <div class="lain-item fade-up">
      <div class="lain-icon si-pink"><i class="fas fa-baby"></i></div>
      <div class="lain-text">
        <div class="lain-judul">Perlengkapan Bayi</div>
        <div class="lain-desc">Produk bayi aman dan terpercaya.</div>
      </div>
      <!--
        GANTI FOTO: src="img/bayi.jpg"
      -->
      <img src="" alt="Perlengkapan Bayi" class="lain-thumb"
           onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
      <div class="lain-thumb-ph"><i class="fas fa-baby-carriage"></i></div>
      <i class="fas fa-chevron-right lain-arrow"></i>
    </div>

    <!-- Item 3: Layanan Antar -->
    <div class="lain-item fade-up">
      <div class="lain-icon si-purple"><i class="fas fa-motorcycle"></i></div>
      <div class="lain-text">
        <div class="lain-judul">Layanan Antar</div>
        <div class="lain-desc">Antar obat sampai ke rumah Anda.</div>
      </div>
      <!--
        GANTI FOTO: src="img/delivery.jpg"
      -->
      <img src="" alt="Layanan Antar" class="lain-thumb"
           onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
      <div class="lain-thumb-ph"><i class="fas fa-motorcycle"></i></div>
      <i class="fas fa-chevron-right lain-arrow"></i>
    </div>

    <!-- Item 4: Pusat Oksigen -->
    <div class="lain-item fade-up">
      <div class="lain-icon si-teal"><i class="fas fa-lungs"></i></div>
      <div class="lain-text">
        <div class="lain-judul">Pusat Oksigen &amp; Alat Kesehatan</div>
        <div class="lain-desc">Oksigen &amp; alat kesehatan tersedia lengkap.</div>
      </div>
      <!--
        GANTI FOTO: src="img/oksigen.jpg"
      -->
      <img src="" alt="Pusat Oksigen" class="lain-thumb"
           onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
      <div class="lain-thumb-ph"><i class="fas fa-lungs"></i></div>
      <i class="fas fa-chevron-right lain-arrow"></i>
    </div>

    <!-- Item 5: Obat Resep Dokter -->
    <div class="lain-item fade-up">
      <div class="lain-icon si-blue"><i class="fas fa-prescription"></i></div>
      <div class="lain-text">
        <div class="lain-judul">Obat Resep Dokter</div>
        <div class="lain-desc">Pembelian obat resep dokter lebih mudah.</div>
      </div>
      <!--
        GANTI FOTO: src="img/resep.jpg"
      -->
      <img src="" alt="Obat Resep" class="lain-thumb"
           onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
      <div class="lain-thumb-ph"><i class="fas fa-prescription-bottle"></i></div>
      <i class="fas fa-chevron-right lain-arrow"></i>
    </div>

    <!-- Item 6: Imunisasi & Vaksinasi -->
    <div class="lain-item fade-up">
      <div class="lain-icon si-pink"><i class="fas fa-shield-virus"></i></div>
      <div class="lain-text">
        <div class="lain-judul">Imunisasi &amp; Vaksinasi</div>
        <div class="lain-desc">Layanan imunisasi untuk anak &amp; dewasa.</div>
      </div>
      <!--
        GANTI FOTO: src="img/vaksin.jpg"
      -->
      <img src="" alt="Imunisasi" class="lain-thumb"
           onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
      <div class="lain-thumb-ph"><i class="fas fa-syringe"></i></div>
      <i class="fas fa-chevron-right lain-arrow"></i>
    </div>

    <!-- Item 7: Health Check Up -->
    <div class="lain-item fade-up">
      <div class="lain-icon si-green"><i class="fas fa-clipboard-list"></i></div>
      <div class="lain-text">
        <div class="lain-judul">Health Check Up</div>
        <div class="lain-desc">Cek kesehatan menyeluruh untuk Anda.</div>
      </div>
      <!--
        GANTI FOTO: src="img/checkup.jpg"
      -->
      <img src="" alt="Health Check Up" class="lain-thumb"
           onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
      <div class="lain-thumb-ph"><i class="fas fa-heartbeat"></i></div>
      <i class="fas fa-chevron-right lain-arrow"></i>
    </div>

    <!-- Item 8: Lainnya -->
    <div class="lain-item fade-up">
      <div class="lain-icon si-blue"><i class="fas fa-ellipsis-h"></i></div>
      <div class="lain-text">
        <div class="lain-judul">Lainnya</div>
        <div class="lain-desc">Masih banyak layanan lainnya untuk Anda.</div>
      </div>
      <!--
        GANTI FOTO: src="img/lainnya.jpg"
      -->
      <img src="" alt="Lainnya" class="lain-thumb"
           onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
      <div class="lain-thumb-ph"><i class="fas fa-store"></i></div>
      <i class="fas fa-chevron-right lain-arrow"></i>
    </div>

  </div><!-- /layanan-lain-grid -->


  <!-- ==============================================
       TRUST BANNER — teks kiri + foto tim kanan
       INI SECTION TERAKHIR, tidak ada card setelahnya
       ============================================== -->
  <div class="trust-banner fade-up">

    <!-- Kiri: teks -->
    <div class="trust-body">
      <div class="trust-badge">
        <i class="fas fa-shield-alt"></i> Terpercaya &amp; Profesional
      </div>
      <div class="trust-judul">Terpercaya &amp; Profesional</div>
      <div class="trust-desc">
        Tenaga farmasi kami berpengalaman dan siap melayani Anda dengan sepenuh hati.
      </div>
    </div>

    <!-- Kanan: foto tim -->
    <div class="trust-photo">
      <!--
        GANTI FOTO TIM: src="img/tim-farmaza.jpg"
        Ukuran ideal: 280x220px, foto lanskap tim apotek
      -->
      <img src="" alt="Tim Farmaza"
           onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
      <div class="trust-photo-ph">
        <i class="fas fa-users"></i>
        <span>Foto Tim<br>Apotek</span>
      </div>
    </div>

  </div><!-- /trust-banner -->


  <!-- ===== FOOTER ===== -->
  <footer class="footer" style="margin-top:24px;">
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
        <div class="footer-text"><strong>Konsultasi 24 Jam</strong>Kami siap membantu Anda</div>
      </div>
    </div>
  </footer>

  <!-- ===== BOTTOM NAV ===== -->
  <nav class="bottom-nav">
    <div class="bottom-nav-inner">
      <div class="bottom-nav-item" data-page="index" data-href="user.php">
        <i class="fas fa-home"></i><span>Beranda</span>
      </div>
      <div class="bottom-nav-item" data-page="produk" data-href="produk.php">
        <i class="fas fa-box"></i><span>Produk</span>
      </div>
      <div class="bottom-nav-item active" data-page="layanan" data-href="layanan.php">
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

  <!-- ===== FLOATING WA ===== -->
  <div class="wa-float">
    <div class="wa-tooltip">💬 Konsultasi Gratis!</div>
    <a href="https://wa.me/6285179990832?text=Halo%2C%20saya%20mau%20konsultasi" target="_blank">
      <div class="wa-float-btn"><i class="fab fa-whatsapp"></i></div>
    </a>
  </div>

  <script src="main.js"></script>
</body>
</html>