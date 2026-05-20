<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Produk – Apotek Farmaza 2</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@700;800;900&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="Style.css" />
</head>
<body data-page="produk">

  <div id="navbarPlaceholder"></div>

  <!-- ===== SEARCH BAR ===== -->
  <div class="search-bar-wrap">
    <div class="search-bar">
      <i class="fas fa-search"></i>
      <input type="text" id="searchInput" placeholder="Cari obat, vitamin, atau produk kesehatan..." />
    </div>
    <div class="cart-btn" onclick="toggleCart()">
      <i class="fas fa-shopping-cart"></i>
      <span class="cart-badge" id="cartBadge">0</span>
    </div>
  </div>

  <!-- ===== KATEGORI SCROLL ===== -->
  <div class="kategori-scroll">
    <div class="kat-chip active" onclick="filterKat('semua', this)">
      <div class="kat-icon si-blue"><i class="fas fa-th"></i></div>
      <span class="kat-label">Semua</span>
    </div>
    <div class="kat-chip" onclick="filterKat('obat bebas', this)">
      <div class="kat-icon si-green"><i class="fas fa-pills"></i></div>
      <span class="kat-label">Obat Bebas</span>
    </div>
    <div class="kat-chip" onclick="filterKat('obat keras', this)">
      <div class="kat-icon si-pink"><i class="fas fa-prescription-bottle-alt"></i></div>
      <span class="kat-label">Obat Keras</span>
    </div>
    <div class="kat-chip" onclick="filterKat('vitamin', this)">
      <div class="kat-icon si-yellow"><i class="fas fa-capsules"></i></div>
      <span class="kat-label">Vitamin</span>
    </div>
    <div class="kat-chip" onclick="filterKat('suplemen', this)">
      <div class="kat-icon si-teal"><i class="fas fa-leaf"></i></div>
      <span class="kat-label">Suplemen</span>
    </div>
    <div class="kat-chip" onclick="filterKat('alat kesehatan', this)">
      <div class="kat-icon si-purple"><i class="fas fa-heartbeat"></i></div>
      <span class="kat-label">Alat Kesehatan</span>
    </div>
    <div class="kat-chip" onclick="filterKat('perawatan tubuh', this)">
      <div class="kat-icon si-pink"><i class="fas fa-spa"></i></div>
      <span class="kat-label">Perawatan</span>
    </div>
  </div>

  <!-- ===== FILTER ROW ===== -->
  <div class="filter-row">
    <div class="filter-select">
      <i class="fas fa-list"></i> Semua Kategori <i class="fas fa-chevron-down"></i>
    </div>
    <div class="filter-select">
      Urutkan <i class="fas fa-chevron-down"></i>
    </div>
    <div class="filter-select">
      <i class="fas fa-filter"></i> Filter
    </div>
    <span class="count-label" id="countLabel"></span>
  </div>

  <!-- ===== PRODUK GRID ===== -->
  <div class="produk-grid" id="produkGrid"></div>

  <!-- ===== MODAL DETAIL ===== -->
  <div class="modal-overlay" id="modalOverlay" onclick="closeModalOutside(event)">
    <div class="modal-sheet" id="modalSheet">
      <div class="modal-handle"></div>
      <div class="modal-header">
        <div class="modal-back" onclick="closeModalBtn()"><i class="fas fa-arrow-left"></i></div>
        <span class="modal-title">Detail Produk</span>
        <div class="modal-wish"><i class="far fa-heart"></i></div>
      </div>
      <div class="modal-img-wrap">
        <img id="mImg" src="" alt="" />
      </div>
      <div class="modal-body">
        <span class="modal-badge" id="mBadge"></span>
        <div class="modal-nama"  id="mNama"></div>
        <div class="modal-harga" id="mHarga"></div>
        <div class="modal-stok"  id="mStok"></div>

        <div class="modal-qty-row">
          <label>Jumlah</label>
          <div class="qty-btn" onclick="changeQty(-1)">−</div>
          <div class="qty-num" id="qtyNum">1</div>
          <div class="qty-btn" onclick="changeQty(1)">+</div>
        </div>

        <div class="modal-section-title">Deskripsi</div>
        <div class="modal-desc" id="mDesc"></div>

        <div class="modal-section-title">Informasi Produk</div>
        <table class="modal-info-table" id="mTable"></table>

        <div class="modal-section-title">Peringatan</div>
        <div class="modal-warning"><ul id="mWarning"></ul></div>

        <div class="modal-actions">
          <div class="btn-keranjang" onclick="addToCart()">
            <i class="fas fa-shopping-cart"></i> Tambah ke Keranjang
          </div>
          <div class="btn-beli" onclick="beliSekarang()">
            <i class="fas fa-bolt"></i> Beli Sekarang
          </div>
        </div>

        <div class="modal-section-title" style="margin-top:20px;">Produk Lainnya</div>
        <div class="modal-related-scroll" id="mRelated"></div>
      </div>
    </div>
  </div>

  <!-- ===== TOAST ===== -->
  <div class="toast" id="toast"></div>

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
      <div class="bottom-nav-item active" data-page="produk" data-href="produk.php">
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

  <!-- ===== FLOATING WA ===== -->
  <div class="wa-float">
    <div class="wa-tooltip">💬 Konsultasi Gratis!</div>
    <a href="https://wa.me/6285179990832?text=Halo%2C%20saya%20mau%20tanya%20produk" target="_blank">
      <div class="wa-float-btn"><i class="fab fa-whatsapp"></i></div>
    </a>
  </div>

  <script src="main.js"></script>
  <script>
  /* ============================================================
     DATA PRODUK — ganti img dengan path foto asli, misal:
     img: "img/promag.jpg"
     ============================================================ */
  const produkData = [
    {
      id: 1, nama: "Promag Tablet", kategori: "obat bebas", harga: 5000, satuan: "strip",
      stok: 120, img: "https://via.placeholder.com/200x200/e0eeff/3b6fd4?text=Promag",
      badge: "Obat Bebas", badgeClass: "badge-bebas",
      desc: "Promag Tablet digunakan untuk mengurangi gejala sakit maag seperti perih, mual, kembung, dan nyeri ulu hati akibat peningkatan asam lambung.",
      info: { Kategori:"Obat Bebas", "Bentuk Sediaan":"Tablet", Kemasan:"Strip @ 10 Tablet", Pabrik:"KALBE", "No. Izin Edar":"DBL1234567810A1", Halal:"✅ Ya" },
      warning: ["Tidak dianjurkan untuk anak-anak di bawah 12 tahun.", "Bila gejala berlanjut, segera konsultasikan ke dokter.", "Simpan di tempat sejuk dan kering."]
    },
    {
      id: 2, nama: "Bodrex Tablet", kategori: "obat bebas", harga: 4000, satuan: "strip",
      stok: 85, img: "https://via.placeholder.com/200x200/ffeef5/e0457a?text=Bodrex",
      badge: "Obat Bebas", badgeClass: "badge-bebas",
      desc: "Bodrex mengandung paracetamol untuk meredakan demam, sakit kepala, dan nyeri ringan hingga sedang.",
      info: { Kategori:"Obat Bebas", "Bentuk Sediaan":"Tablet", Kemasan:"Strip @ 10 Tablet", Pabrik:"Tempo", "No. Izin Edar":"DBL0023451210A1", Halal:"✅ Ya" },
      warning: ["Jangan melebihi dosis yang dianjurkan.", "Hentikan pemakaian jika timbul reaksi alergi.", "Simpan di bawah 30°C."]
    },
    {
      id: 3, nama: "Procold Flu & Batuk", kategori: "obat bebas terbatas", harga: 6500, satuan: "strip",
      stok: 60, img: "https://via.placeholder.com/200x200/ffedd5/c2410c?text=Procold",
      badge: "Obat Bebas Terbatas", badgeClass: "badge-terbatas",
      desc: "Procold digunakan untuk meredakan gejala flu seperti hidung tersumbat, bersin-bersin, batuk, dan demam.",
      info: { Kategori:"Obat Bebas Terbatas", "Bentuk Sediaan":"Tablet", Kemasan:"Strip @ 4 Tablet", Pabrik:"Kalbe", "No. Izin Edar":"DTL9801234567A1", Halal:"✅ Ya" },
      warning: ["Tidak boleh digunakan oleh pengemudi atau operator mesin.", "Jangan dikonsumsi bersama alkohol.", "Hati-hati pada penderita hipertensi."]
    },
    {
      id: 4, nama: "Enervon-C Tablet", kategori: "suplemen", harga: 7500, satuan: "strip",
      stok: 200, img: "https://via.placeholder.com/200x200/d1fae5/065f46?text=Enervon-C",
      badge: "Suplemen", badgeClass: "badge-suplemen",
      desc: "Enervon-C mengandung vitamin C dan vitamin B kompleks untuk menjaga daya tahan tubuh dan memberikan energi.",
      info: { Kategori:"Suplemen", "Bentuk Sediaan":"Tablet", Kemasan:"Strip @ 4 Tablet", Pabrik:"Abbot", "No. Izin Edar":"SD131234567810", Halal:"✅ Ya" },
      warning: ["Konsultasikan dengan dokter bila mengonsumsi obat lain.", "Hentikan jika terjadi reaksi tidak biasa.", "Simpan di tempat kering."]
    },
    {
      id: 5, nama: "Redoxon Vitamin C", kategori: "vitamin", harga: 8500, satuan: "tablet",
      stok: 150, img: "https://via.placeholder.com/200x200/fef9c3/854d0e?text=Redoxon",
      badge: "Vitamin", badgeClass: "badge-vitamin",
      desc: "Redoxon adalah suplemen vitamin C effervescent yang membantu meningkatkan imunitas dan menjaga kesehatan tubuh.",
      info: { Kategori:"Vitamin", "Bentuk Sediaan":"Effervescent", Kemasan:"Tube 10 Tablet", Pabrik:"Bayer", "No. Izin Edar":"SD051234567810", Halal:"✅ Ya" },
      warning: ["Tidak dianjurkan lebih dari 1 tablet per hari.", "Penderita batu ginjal konsultasikan ke dokter.", "Habiskan dalam 3 hari setelah dibuka."]
    },
    {
      id: 6, nama: "Sanmol Tablet", kategori: "obat bebas", harga: 3000, satuan: "strip",
      stok: 300, img: "https://via.placeholder.com/200x200/e0eeff/3b6fd4?text=Sanmol",
      badge: "Obat Bebas", badgeClass: "badge-bebas",
      desc: "Sanmol mengandung paracetamol 500mg untuk menurunkan demam dan meredakan nyeri ringan hingga sedang.",
      info: { Kategori:"Obat Bebas", "Bentuk Sediaan":"Tablet", Kemasan:"Strip @ 10 Tablet", Pabrik:"Sanbe", "No. Izin Edar":"DBL7801234567A1", Halal:"✅ Ya" },
      warning: ["Jangan melebihi 8 tablet per hari.", "Jarak minum minimal 4 jam.", "Hentikan jika ada gangguan hati atau ginjal."]
    },
    {
      id: 7, nama: "Amoxicillin 500 mg", kategori: "obat keras", harga: 12000, satuan: "strip",
      stok: 8, img: "https://via.placeholder.com/200x200/fee2e2/dc2626?text=Amoxicillin",
      badge: "Obat Keras", badgeClass: "badge-keras",
      desc: "Amoxicillin adalah antibiotik yang digunakan untuk mengobati berbagai infeksi bakteri. Harus sesuai resep dokter.",
      info: { Kategori:"Obat Keras", "Bentuk Sediaan":"Kapsul", Kemasan:"Strip @ 10 Kapsul", Pabrik:"Generic", "No. Izin Edar":"DKL9901234567A1", Halal:"✅ Ya" },
      warning: ["Harus dengan resep dokter.", "Habiskan seluruh antibiotik meski gejala membaik.", "Informasikan riwayat alergi penisilin kepada dokter."]
    },
    {
      id: 8, nama: "CTM Tablet", kategori: "obat bebas terbatas", harga: 2500, satuan: "strip",
      stok: 180, img: "https://via.placeholder.com/200x200/ffedd5/c2410c?text=CTM",
      badge: "Obat Bebas Terbatas", badgeClass: "badge-terbatas",
      desc: "CTM digunakan untuk mengatasi gejala alergi seperti bersin, mata berair, dan gatal-gatal.",
      info: { Kategori:"Obat Bebas Terbatas", "Bentuk Sediaan":"Tablet", Kemasan:"Strip @ 10 Tablet", Pabrik:"Generic", "No. Izin Edar":"DTL5601234567A1", Halal:"✅ Ya" },
      warning: ["Menyebabkan kantuk, jangan mengemudi.", "Hindari alkohol.", "Tidak untuk anak di bawah 6 tahun."]
    },
    {
      id: 9, nama: "Imboost Force", kategori: "suplemen", harga: 15000, satuan: "kaplet",
      stok: 75, img: "https://via.placeholder.com/200x200/d1fae5/065f46?text=Imboost",
      badge: "Suplemen", badgeClass: "badge-suplemen",
      desc: "Imboost Force mengandung Echinacea purpurea dan Zink untuk memperkuat sistem imun tubuh.",
      info: { Kategori:"Suplemen", "Bentuk Sediaan":"Kaplet", Kemasan:"Strip @ 4 Kaplet", Pabrik:"Soho", "No. Izin Edar":"SD131234891011", Halal:"✅ Ya" },
      warning: ["Tidak untuk penggunaan jangka panjang tanpa anjuran dokter.", "Konsultasikan pada ibu hamil dan menyusui.", "Simpan di tempat sejuk."]
    },
    {
      id: 10, nama: "Vitacimin Tablet", kategori: "vitamin", harga: 3500, satuan: "strip",
      stok: 500, img: "https://via.placeholder.com/200x200/fef9c3/854d0e?text=Vitacimin",
      badge: "Vitamin", badgeClass: "badge-vitamin",
      desc: "Vitacimin mengandung vitamin C 500mg rasa jeruk untuk mendukung daya tahan tubuh sehari-hari.",
      info: { Kategori:"Vitamin", "Bentuk Sediaan":"Tablet Hisap", Kemasan:"Strip @ 6 Tablet", Pabrik:"Bintang Toedjoe", "No. Izin Edar":"SD051234678910", Halal:"✅ Ya" },
      warning: ["Tidak melebihi dosis yang dianjurkan.", "Bukan pengganti obat.", "Simpan di bawah 30°C."]
    },
    {
      id: 11, nama: "Betadine Solution", kategori: "perawatan tubuh", harga: 10000, satuan: "botol",
      stok: 45, img: "https://via.placeholder.com/200x200/fce7f3/9d174d?text=Betadine",
      badge: "Perawatan Tubuh", badgeClass: "badge-perawatan",
      desc: "Betadine mengandung povidone-iodine 10% untuk antiseptik luka luar dan mencegah infeksi.",
      info: { Kategori:"Perawatan Tubuh", "Bentuk Sediaan":"Larutan", Kemasan:"Botol 30 mL", Pabrik:"Mundipharma", "No. Izin Edar":"DKL7801234511A1", Halal:"✅ Ya" },
      warning: ["Hanya untuk penggunaan luar.", "Jauhkan dari jangkauan anak-anak.", "Hindari kontak dengan mata."]
    },
    {
      id: 12, nama: "Tensimeter Omron", kategori: "alat kesehatan", harga: 350000, satuan: "unit",
      stok: 12, img: "https://via.placeholder.com/200x200/ede9fe/6d28d9?text=Tensimeter",
      badge: "Alat Kesehatan", badgeClass: "badge-alkes",
      desc: "Tensimeter digital Omron untuk mengukur tekanan darah secara akurat dan mudah digunakan di rumah.",
      info: { Kategori:"Alat Kesehatan", "Bentuk Sediaan":"Digital", Kemasan:"1 Unit + Cuff + Baterai", Pabrik:"Omron", "No. Izin Edar":"AKL20401234567", Halal:"-" },
      warning: ["Jangan gunakan pada lengan yang cedera.", "Istirahat 5 menit sebelum pengukuran.", "Jauhkan dari medan magnet."]
    },
    {
      id: 13, nama: "Glukometer Accu-Chek", kategori: "alat kesehatan", harga: 280000, satuan: "unit",
      stok: 6, img: "https://via.placeholder.com/200x200/ede9fe/6d28d9?text=Glukometer",
      badge: "Alat Kesehatan", badgeClass: "badge-alkes",
      desc: "Glukometer untuk memantau kadar gula darah secara mandiri di rumah dengan akurasi tinggi.",
      info: { Kategori:"Alat Kesehatan", "Bentuk Sediaan":"Digital", Kemasan:"1 Unit + Strip 10pcs", Pabrik:"Roche", "No. Izin Edar":"AKL20501234560", Halal:"-" },
      warning: ["Kalibrasi sesuai batch strip.", "Simpan strip di tempat kering.", "Gunakan darah kapiler ujung jari."]
    },
    {
      id: 14, nama: "Masker Medis 3ply", kategori: "alat kesehatan", harga: 25000, satuan: "box",
      stok: 90, img: "https://via.placeholder.com/200x200/ede9fe/6d28d9?text=Masker",
      badge: "Alat Kesehatan", badgeClass: "badge-alkes",
      desc: "Masker medis 3 lapis sekali pakai untuk perlindungan dari debu, polusi, dan droplet.",
      info: { Kategori:"Alat Kesehatan", "Bentuk Sediaan":"Masker", Kemasan:"Box @ 50 pcs", Pabrik:"Sensi", "No. Izin Edar":"AKL20601234512", Halal:"-" },
      warning: ["Hanya untuk sekali pakai.", "Ganti jika masker lembab atau rusak.", "Buang di tempat sampah khusus medis."]
    },
    {
      id: 15, nama: "Antasida Doen", kategori: "obat bebas", harga: 3500, satuan: "strip",
      stok: 250, img: "https://via.placeholder.com/200x200/e0eeff/3b6fd4?text=Antasida",
      badge: "Obat Bebas", badgeClass: "badge-bebas",
      desc: "Antasida Doen menetralisir asam lambung berlebih untuk meredakan rasa perih dan kembung.",
      info: { Kategori:"Obat Bebas", "Bentuk Sediaan":"Tablet Kunyah", Kemasan:"Strip @ 10 Tablet", Pabrik:"Generic", "No. Izin Edar":"DBL1201234567A1", Halal:"✅ Ya" },
      warning: ["Kunyah sebelum ditelan.", "Minum 1–2 jam setelah makan.", "Konsultasikan jika gejala berlanjut lebih dari 2 minggu."]
    },
    {
      id: 16, nama: "Ibuprofen 400 mg", kategori: "obat bebas terbatas", harga: 5500, satuan: "strip",
      stok: 130, img: "https://via.placeholder.com/200x200/ffedd5/c2410c?text=Ibuprofen",
      badge: "Obat Bebas Terbatas", badgeClass: "badge-terbatas",
      desc: "Ibuprofen adalah NSAID untuk meredakan nyeri, peradangan, dan demam.",
      info: { Kategori:"Obat Bebas Terbatas", "Bentuk Sediaan":"Tablet", Kemasan:"Strip @ 10 Tablet", Pabrik:"Generic", "No. Izin Edar":"DTL1201234567A1", Halal:"✅ Ya" },
      warning: ["Konsumsi bersama makanan untuk menghindari iritasi lambung.", "Hindari pada penderita tukak lambung.", "Tidak untuk ibu hamil trimester ketiga."]
    },
    {
      id: 17, nama: "Cetirizine 10 mg", kategori: "obat keras", harga: 6000, satuan: "strip",
      stok: 70, img: "https://via.placeholder.com/200x200/fee2e2/dc2626?text=Cetirizine",
      badge: "Obat Keras", badgeClass: "badge-keras",
      desc: "Cetirizine adalah antihistamin generasi kedua untuk mengatasi gejala alergi tanpa rasa kantuk berlebihan.",
      info: { Kategori:"Obat Keras", "Bentuk Sediaan":"Tablet", Kemasan:"Strip @ 10 Tablet", Pabrik:"Generic", "No. Izin Edar":"DKL0801234567A1", Halal:"✅ Ya" },
      warning: ["Harus dengan resep dokter.", "Hati-hati pada penderita gangguan ginjal.", "Hindari konsumsi alkohol."]
    },
    {
      id: 18, nama: "Vitamin D3 1000 IU", kategori: "vitamin", harga: 12000, satuan: "botol",
      stok: 55, img: "https://via.placeholder.com/200x200/fef9c3/854d0e?text=VitD3",
      badge: "Vitamin", badgeClass: "badge-vitamin",
      desc: "Vitamin D3 1000 IU untuk mendukung kesehatan tulang, gigi, dan sistem imun tubuh.",
      info: { Kategori:"Vitamin", "Bentuk Sediaan":"Softgel", Kemasan:"Botol @ 30 Kapsul", Pabrik:"Nature's Plus", "No. Izin Edar":"SD051234891011", Halal:"✅ Ya" },
      warning: ["Jangan melebihi dosis yang dianjurkan.", "Konsultasikan pada penderita hiperkalsemia.", "Simpan di tempat sejuk dan kering."]
    },
    {
      id: 19, nama: "Omeprazole 20 mg", kategori: "obat keras", harga: 8000, satuan: "strip",
      stok: 40, img: "https://via.placeholder.com/200x200/fee2e2/dc2626?text=Omeprazole",
      badge: "Obat Keras", badgeClass: "badge-keras",
      desc: "Omeprazole adalah PPI (Proton Pump Inhibitor) untuk mengobati tukak lambung dan GERD.",
      info: { Kategori:"Obat Keras", "Bentuk Sediaan":"Kapsul", Kemasan:"Strip @ 10 Kapsul", Pabrik:"Generic", "No. Izin Edar":"DKL0901234567A1", Halal:"✅ Ya" },
      warning: ["Harus dengan resep dokter.", "Konsumsi 30 menit sebelum makan.", "Penggunaan jangka panjang sesuai anjuran dokter."]
    },
    {
      id: 20, nama: "Loratadine 10 mg", kategori: "obat bebas", harga: 4500, satuan: "strip",
      stok: 110, img: "https://via.placeholder.com/200x200/e0eeff/3b6fd4?text=Loratadine",
      badge: "Obat Bebas", badgeClass: "badge-bebas",
      desc: "Loratadine antihistamin untuk alergi rinitis dan urtikaria dengan efek kantuk minimal.",
      info: { Kategori:"Obat Bebas", "Bentuk Sediaan":"Tablet", Kemasan:"Strip @ 10 Tablet", Pabrik:"Generic", "No. Izin Edar":"DBL1301234567A1", Halal:"✅ Ya" },
      warning: ["Tidak untuk anak di bawah 2 tahun.", "Konsultasikan pada ibu hamil.", "Simpan di tempat kering."]
    },
    {
      id: 21, nama: "Minyak Kayu Putih", kategori: "perawatan tubuh", harga: 9000, satuan: "botol",
      stok: 200, img: "https://via.placeholder.com/200x200/fce7f3/9d174d?text=KayuPutih",
      badge: "Perawatan Tubuh", badgeClass: "badge-perawatan",
      desc: "Minyak kayu putih untuk meredakan masuk angin, perut kembung, dan gigitan serangga.",
      info: { Kategori:"Perawatan Tubuh", "Bentuk Sediaan":"Minyak", Kemasan:"Botol 60 mL", Pabrik:"Cap Lang", "No. Izin Edar":"TR201234567891", Halal:"✅ Ya" },
      warning: ["Hanya untuk penggunaan luar.", "Jauhkan dari api.", "Hindari kontak dengan mata."]
    },
    {
      id: 22, nama: "Zinc 20 mg", kategori: "suplemen", harga: 5000, satuan: "strip",
      stok: 160, img: "https://via.placeholder.com/200x200/d1fae5/065f46?text=Zinc",
      badge: "Suplemen", badgeClass: "badge-suplemen",
      desc: "Suplemen Zinc untuk mendukung sistem imun, pertumbuhan sel, dan penyembuhan luka.",
      info: { Kategori:"Suplemen", "Bentuk Sediaan":"Tablet", Kemasan:"Strip @ 10 Tablet", Pabrik:"Generic", "No. Izin Edar":"SD131234001122", Halal:"✅ Ya" },
      warning: ["Konsumsi bersama makanan.", "Tidak melebihi 40mg per hari.", "Jauhkan dari jangkauan anak-anak."]
    },
    {
      id: 23, nama: "Nebulizer Omron", kategori: "alat kesehatan", harga: 450000, satuan: "unit",
      stok: 5, img: "https://via.placeholder.com/200x200/ede9fe/6d28d9?text=Nebulizer",
      badge: "Alat Kesehatan", badgeClass: "badge-alkes",
      desc: "Nebulizer Omron NE-C28 untuk terapi inhalasi penderita asma dan gangguan pernapasan.",
      info: { Kategori:"Alat Kesehatan", "Bentuk Sediaan":"Elektrik", Kemasan:"1 Set Lengkap", Pabrik:"Omron", "No. Izin Edar":"AKL20401234890", Halal:"-" },
      warning: ["Cuci masker setelah setiap penggunaan.", "Gunakan obat sesuai anjuran dokter.", "Simpan di tempat bersih dan kering."]
    },
    {
      id: 24, nama: "Rivanol Antiseptik", kategori: "perawatan tubuh", harga: 6000, satuan: "botol",
      stok: 80, img: "https://via.placeholder.com/200x200/fce7f3/9d174d?text=Rivanol",
      badge: "Perawatan Tubuh", badgeClass: "badge-perawatan",
      desc: "Rivanol (Ethacridine Lactate) untuk antiseptik luka luar dan mencegah infeksi.",
      info: { Kategori:"Perawatan Tubuh", "Bentuk Sediaan":"Larutan", Kemasan:"Botol 100 mL", Pabrik:"Generic", "No. Izin Edar":"DKL7801234522A1", Halal:"✅ Ya" },
      warning: ["Hanya untuk penggunaan luar.", "Jauhkan dari mata.", "Hentikan jika terjadi iritasi."]
    }
  ];

  /* ===== STATE ===== */
  let cartCount = 0;
  let currentKat = 'semua';
  let currentProduk = null;
  let qty = 1;

  /* ===== FORMAT HARGA ===== */
  function formatRp(n) {
    return 'Rp ' + n.toLocaleString('id-ID');
  }

  /* ===== RENDER GRID ===== */
  function renderGrid(data) {
    const grid  = document.getElementById('produkGrid');
    const count = document.getElementById('countLabel');
    count.textContent = `Menampilkan 1–${data.length} dari ${data.length} produk`;
    grid.innerHTML = '';

    if (data.length === 0) {
      grid.innerHTML = `<div style="grid-column:1/-1;text-align:center;padding:40px 0;color:var(--gray);">
        <i class="fas fa-search" style="font-size:36px;margin-bottom:12px;display:block;opacity:.3;"></i>
        Produk tidak ditemukan
      </div>`;
      return;
    }

    data.forEach(p => {
      const stokClass = p.stok > 20 ? 'stok-ok' : 'stok-low';
      grid.innerHTML += `
        <div class="produk-card fade-up" onclick="openModal(${p.id})">
          <span class="produk-badge-top ${p.badgeClass}">${p.badge}</span>
          <div class="wishlist-btn" onclick="event.stopPropagation()">
            <i class="far fa-heart"></i>
          </div>
          <div class="produk-img-wrap">
            <img src="${p.img}" alt="${p.nama}" loading="lazy"
              onerror="this.style.display='none';this.nextElementSibling.style.display='flex'" />
            <div class="img-placeholder" style="display:none">
              <i class="fas fa-box-open"></i>
            </div>
          </div>
          <div class="produk-info">
            <div class="produk-nama">${p.nama}</div>
            <div class="produk-harga">${formatRp(p.harga)} <span class="satuan">/ ${p.satuan}</span></div>
            <div class="produk-footer">
              <span class="stok-label">Stok: <span class="${stokClass}">${p.stok}</span></span>
              <div class="add-cart-btn" onclick="event.stopPropagation(); quickAdd(${p.id})">
                <i class="fas fa-plus"></i>
              </div>
            </div>
          </div>
        </div>`;
    });

    /* trigger fade-up */
    setTimeout(() => {
      document.querySelectorAll('.fade-up').forEach((el, i) => {
        setTimeout(() => el.classList.add('visible'), i * 40);
      });
    }, 50);
  }

  /* ===== FILTER ===== */
  function filterKat(kat, el) {
    currentKat = kat;
    document.querySelectorAll('.kat-chip').forEach(c => c.classList.remove('active'));
    el.classList.add('active');
    applyFilter();
  }

  function applyFilter() {
    let data = currentKat === 'semua'
      ? produkData
      : produkData.filter(p => p.kategori.toLowerCase().includes(currentKat));
    const q = document.getElementById('searchInput').value.toLowerCase().trim();
    if (q) data = data.filter(p => p.nama.toLowerCase().includes(q));
    renderGrid(data);
  }

  document.getElementById('searchInput').addEventListener('input', applyFilter);

  /* ===== MODAL ===== */
  function openModal(id) {
    const p = produkData.find(x => x.id === id);
    if (!p) return;
    currentProduk = p;
    qty = 1;
    document.getElementById('qtyNum').textContent = '1';

    document.getElementById('mImg').src  = p.img;
    document.getElementById('mImg').alt  = p.nama;
    document.getElementById('mNama').textContent  = p.nama;
    document.getElementById('mHarga').textContent = formatRp(p.harga);
    document.getElementById('mStok').textContent  = `Stok: ${p.stok} ${p.satuan}`;
    document.getElementById('mDesc').textContent  = p.desc;

    const badge = document.getElementById('mBadge');
    badge.textContent = p.badge;
    badge.className   = 'modal-badge ' + p.badgeClass;

    document.getElementById('mTable').innerHTML =
      Object.entries(p.info).map(([k, v]) => `<tr><td>${k}</td><td>${v}</td></tr>`).join('');

    document.getElementById('mWarning').innerHTML =
      p.warning.map(w => `<li>${w}</li>`).join('');

    const others = produkData.filter(x => x.id !== id).slice(0, 6);
    document.getElementById('mRelated').innerHTML =
      others.map(o => `
        <div class="related-card" onclick="openModal(${o.id})">
          <img src="${o.img}" alt="${o.nama}" />
          <div class="rel-nama">${o.nama}</div>
          <div class="rel-harga">${formatRp(o.harga)}</div>
        </div>`).join('');

    document.getElementById('modalOverlay').classList.add('open');
    document.body.style.overflow = 'hidden';

    /* scroll modal ke atas */
    document.getElementById('modalSheet').scrollTop = 0;
  }

  function closeModalOutside(e) {
    if (e.target === document.getElementById('modalOverlay')) closeModalBtn();
  }
  function closeModalBtn() {
    document.getElementById('modalOverlay').classList.remove('open');
    document.body.style.overflow = '';
  }

  function changeQty(d) {
    qty = Math.max(1, qty + d);
    document.getElementById('qtyNum').textContent = qty;
  }

  /* ===== CART ===== */
  function quickAdd(id) {
    const p = produkData.find(x => x.id === id);
    cartCount++;
    document.getElementById('cartBadge').textContent = cartCount;
    showToast(`${p.nama} ditambahkan ke keranjang 🛒`);
  }
  function addToCart() {
    cartCount += qty;
    document.getElementById('cartBadge').textContent = cartCount;
    showToast(`${qty}x ${currentProduk.nama} ditambahkan ke keranjang 🛒`);
    closeModalBtn();
  }
  function beliSekarang() {
    const msg = encodeURIComponent(
      `Halo, saya ingin membeli *${currentProduk.nama}* sebanyak ${qty} ${currentProduk.satuan}. Apakah tersedia?`
    );
    window.open(`https://wa.me/6285179990832?text=${msg}`, '_blank');
  }
  function toggleCart() {
    showToast('Fitur keranjang segera hadir! 🛒');
  }

  /* ===== TOAST ===== */
  function showToast(msg) {
    const t = document.getElementById('toast');
    t.textContent = msg;
    t.classList.add('show');
    setTimeout(() => t.classList.remove('show'), 2500);
  }

  /* ===== INIT ===== */
  renderGrid(produkData);
  </script>
</body>
</html>