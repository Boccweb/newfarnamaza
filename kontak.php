<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kontak – Apotek Farmaza 2</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700;800;900&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="Style.css" />
  <style>
    .kontak-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 40px;
      margin-top: 40px;
    }
    @media(max-width:768px){ .kontak-grid { grid-template-columns: 1fr; } }
    .kontak-info h2 { font-family: var(--font-head); font-size: 24px; font-weight: 900; color: var(--navy); margin-bottom: 24px; }
    .kontak-item {
      display: flex;
      gap: 16px;
      align-items: flex-start;
      margin-bottom: 24px;
      padding: 20px;
      background: var(--sky);
      border-radius: var(--radius);
      transition: all var(--transition);
    }
    .kontak-item:hover { background: var(--sky-mid); transform: translateX(4px); }
    .kontak-item-icon {
      width: 50px; height: 50px;
      background: var(--navy);
      border-radius: 14px;
      display: flex; align-items: center; justify-content: center;
      font-size: 22px;
      color: var(--gold);
      flex-shrink: 0;
    }
    .kontak-item h4 { font-family: var(--font-head); font-size: 15px; font-weight: 800; color: var(--navy); margin-bottom: 4px; }
    .kontak-item p { font-size: 13.5px; color: var(--gray); line-height: 1.6; }
    .kontak-item a { color: var(--navy); font-weight: 600; }
    .kontak-item a:hover { color: var(--gold); }

    .wa-card {
      background: linear-gradient(135deg, #25d366, #20ba5a);
      border-radius: var(--radius-lg);
      padding: 36px;
      color: var(--white);
      text-align: center;
    }
    .wa-card i { font-size: 60px; margin-bottom: 16px; display: block; }
    .wa-card h3 { font-family: var(--font-head); font-size: 22px; font-weight: 900; margin-bottom: 8px; }
    .wa-card p { opacity: 0.9; font-size: 14px; margin-bottom: 24px; line-height: 1.7; }
    .wa-card .wa-num { font-family: var(--font-head); font-size: 22px; font-weight: 900; margin-bottom: 20px; }
    .btn-wa-kontak {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: var(--white);
      color: #25d366;
      padding: 14px 28px;
      border-radius: 30px;
      font-weight: 800;
      font-size: 15px;
      transition: all var(--transition);
    }
    .btn-wa-kontak:hover { transform: scale(1.04); box-shadow: 0 8px 24px rgba(0,0,0,0.15); }

    .map-placeholder {
      background: linear-gradient(135deg, var(--sky), var(--sky-mid));
      border-radius: var(--radius-lg);
      height: 200px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 12px;
      margin-top: 20px;
      cursor: pointer;
      transition: all var(--transition);
      border: 2px dashed rgba(26,46,110,0.2);
    }
    .map-placeholder:hover { border-color: var(--navy); background: var(--sky-mid); }
    .map-placeholder i { font-size: 40px; color: var(--navy); }
    .map-placeholder p { font-weight: 700; color: var(--navy); font-size: 14px; }
    .map-placeholder span { font-size: 12px; color: var(--gray); }
  </style>
</head>
<body data-page="kontak">
  <div id="navbarPlaceholder"></div>

  <div class="page-hero">
    <div class="section-label">Hubungi Kami</div>
    <h1 class="section-title">Kontak Apotek Farmaza 2</h1>
    <p>Kami siap membantu Anda kapanpun dibutuhkan</p>
  </div>

  <div class="container" style="padding-top:40px; padding-bottom:60px;">
    <div class="kontak-grid">
      <div class="kontak-info fade-up">
        <h2>Informasi Kontak</h2>

        <div class="kontak-item">
          <div class="kontak-item-icon"><i class="fas fa-map-marker-alt"></i></div>
          <div>
            <h4>Alamat</h4>
            <p>Desa Ngemplak 01/01<br>Mranggen, Demak, Jawa Tengah</p>
          </div>
        </div>

        <div class="kontak-item">
          <div class="kontak-item-icon"><i class="far fa-clock"></i></div>
          <div>
            <h4>Jam Operasional</h4>
            <p>Setiap hari:<br><strong>05.00 – 22.00 WIB</strong></p>
          </div>
        </div>

        <div class="kontak-item">
          <div class="kontak-item-icon"><i class="fab fa-whatsapp"></i></div>
          <div>
            <h4>WhatsApp</h4>
            <p><a href="https://wa.me/6285179990832" target="_blank">0851-7999-0832 (Mas Barik)</a></p>
          </div>
        </div>

        <div class="kontak-item">
          <div class="kontak-item-icon"><i class="fab fa-tiktok"></i></div>
          <div>
            <h4>TikTok</h4>
            <p><a href="https://tiktok.com/@apotekfarmaza2" target="_blank">@apotekfarmaza2</a></p>
          </div>
        </div>

        <div class="map-placeholder" onclick="window.open('https://maps.google.com/?q=Desa+Ngemplak+Mranggen+Demak','_blank')">
          <i class="fas fa-map-marked-alt"></i>
          <p>Lihat di Google Maps</p>
          <span>Desa Ngemplak 01/01, Mranggen, Demak</span>
        </div>
      </div>

      <div class="fade-up">
        <div class="wa-card">
          <i class="fab fa-whatsapp"></i>
          <h3>Chat via WhatsApp</h3>
          <p>Konsultasi gratis dengan tim kami. Kami siap menjawab pertanyaan seputar obat, kesehatan, dan layanan kami.</p>
          <div class="wa-num">0851-7999-0832</div>
          <a href="https://wa.me/6285179990832?text=Halo%20Apotek%20Farmaza%202%2C%20saya%20ingin%20bertanya" target="_blank" class="btn-wa-kontak">
            <i class="fab fa-whatsapp"></i> Mulai Chat
          </a>
        </div>

        <div style="margin-top:24px; background:var(--gray-light); border-radius:var(--radius-lg); padding:28px;">
          <h3 style="font-family:var(--font-head); font-size:18px; font-weight:800; color:var(--navy); margin-bottom:16px;">Pertanyaan Cepat</h3>
          <div style="display:flex; flex-direction:column; gap:10px;">
            <a href="https://wa.me/6285179990832?text=Apakah%20obat%20X%20tersedia?" target="_blank" style="display:flex; align-items:center; gap:10px; padding:12px 16px; background:var(--white); border-radius:10px; font-weight:600; font-size:13px; color:var(--navy); transition:all 0.25s; border:1.5px solid transparent;" onmouseover="this.style.borderColor='var(--navy)'" onmouseout="this.style.borderColor='transparent'">
              <i class="fas fa-pills" style="color:var(--gold)"></i> Cek ketersediaan obat
            </a>
            <a href="https://wa.me/6285179990832?text=Saya%20mau%20order%20delivery%20obat" target="_blank" style="display:flex; align-items:center; gap:10px; padding:12px 16px; background:var(--white); border-radius:10px; font-weight:600; font-size:13px; color:var(--navy); transition:all 0.25s; border:1.5px solid transparent;" onmouseover="this.style.borderColor='var(--navy)'" onmouseout="this.style.borderColor='transparent'">
              <i class="fas fa-motorcycle" style="color:var(--gold)"></i> Pesan delivery obat
            </a>
            <a href="https://wa.me/6285179990832?text=Saya%20mau%20jadwal%20cek%20kesehatan" target="_blank" style="display:flex; align-items:center; gap:10px; padding:12px 16px; background:var(--white); border-radius:10px; font-weight:600; font-size:13px; color:var(--navy); transition:all 0.25s; border:1.5px solid transparent;" onmouseover="this.style.borderColor='var(--navy)'" onmouseout="this.style.borderColor='transparent'">
              <i class="fas fa-flask" style="color:var(--gold)"></i> Jadwal cek kesehatan
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="footer">
    <div class="footer-inner">
      <div class="footer-item"><i class="fab fa-whatsapp footer-icon"></i><div class="footer-text"><strong>WhatsApp</strong>0851-7999-0832</div></div>
      <div class="footer-item"><i class="fab fa-tiktok footer-icon"></i><div class="footer-text"><strong>TikTok</strong>@apotekfarmaza2</div></div>
      <div class="footer-item"><i class="fas fa-headset footer-icon"></i><div class="footer-text"><strong>Konsultasi 24 Jam</strong>Kami siap membantu Anda</div></div>
    </div>
  </footer>

  <nav class="bottom-nav">
    <div class="bottom-nav-inner">
      <div class="bottom-nav-item" data-page="index" data-href="user.php"><i class="fas fa-home"></i><span>Beranda</span></div>
      <div class="bottom-nav-item" data-page="produk" data-href="produk.php"><i class="fas fa-box"></i><span>Produk</span></div>
      <div class="bottom-nav-item" data-page="layanan" data-href="layanan.php"><i class="fas fa-heart"></i><span>Layanan</span></div>
      <div class="bottom-nav-item" data-page="artikel" data-href="artikel.php"><i class="fas fa-newspaper"></i><span>Artikel</span></div>
      <div class="bottom-nav-item active" data-page="kontak" data-href="kontak.php"><i class="fas fa-phone"></i><span>Kontak</span></div>
    </div>
  </nav>

  <div class="wa-float">
    <div class="wa-tooltip">💬 Konsultasi Gratis!</div>
    <div class="wa-float-btn"><i class="fab fa-whatsapp"></i></div>
  </div>

  
  <script src="main.js"></script>
</body>
</html>
