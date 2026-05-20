<?php
session_start();
require_once "koneksi.php";
date_default_timezone_set('Asia/Jakarta');

$id = intval($_GET['id'] ?? 0);
if (!$id) { header("Location: list-promo.php"); exit; }

// Ambil data promo
$stmt = $conn->prepare("SELECT * FROM promo WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$promo = $result->fetch_assoc();
$stmt->close();
if (!$promo) { header("Location: list-promo.php"); exit; }

$error = "";
$success = "";

// Proses simpan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['_action']) && $_POST['_action'] === 'update') {
    $judul          = $_POST['judul'] ?? '';
    $kategori       = $_POST['kategori'] ?? '';
    $tanggal_mulai  = $_POST['tanggal_mulai'] ?? '';
    $tanggal_selesai = $_POST['tanggal_selesai'] ?? '';
    $gambar_lama    = $promo['gambar'];
    $gambar         = $gambar_lama;

    // Upload gambar baru jika ada
    if (isset($_FILES['gambar_baru']) && $_FILES['gambar_baru']['error'] == 0) {
        $target_dir = "uploads/";
        if (!file_exists($target_dir)) mkdir($target_dir, 0777, true);
        $ext = pathinfo($_FILES['gambar_baru']['name'], PATHINFO_EXTENSION);
        $filename = 'promo_' . time() . '.' . $ext;
        $target_file = $target_dir . $filename;
        if (move_uploaded_file($_FILES['gambar_baru']['tmp_name'], $target_file)) {
            $gambar = $target_file;
        }
    }

    if (empty($judul) || empty($tanggal_mulai) || empty($tanggal_selesai)) {
        $error = "Judul, Tanggal Mulai, dan Tanggal Selesai wajib diisi.";
    } else {
        $stmt2 = $conn->prepare("UPDATE promo SET judul=?, kategori=?, tanggal_mulai=?, tanggal_selesai=?, gambar=? WHERE id=?");
        $stmt2->bind_param("sssssi", $judul, $kategori, $tanggal_mulai, $tanggal_selesai, $gambar, $id);
        if ($stmt2->execute()) {
            echo "<script>alert('Promo berhasil diperbarui!'); window.location.href='list-promo.php';</script>";
            exit;
        } else {
            $error = "Gagal memperbarui: " . $conn->error;
        }
        $stmt2->close();
    }
}

// Helper
function fmtTgl($d) {
    if (!$d) return '-';
    $t = strtotime($d);
    $b = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
    return date('j', $t) . ' ' . $b[date('n', $t) - 1] . ' ' . date('Y', $t);
}
function fmtDate($d) {
    return $d ? date('d/m/Y', strtotime($d)) : '-';
}

$is_aktif = $promo['tanggal_selesai'] >= date('Y-m-d');
$status_text = $is_aktif ? 'Aktif' : 'Nonaktif';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Promo – Apotek Farmaza 2</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="admin-style.css">
  <!-- Edit Promo CSS (atau sudah di-paste ke admin-style.css) -->
  <link rel="stylesheet" href="Style.css">
</head>
<body>

<div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

<!-- Sidebar -->
<aside class="sidebar" id="sidebar">
  <div class="sidebar-brand">
    <div class="brand-logo"><i class='bx bx-plus-medical'></i></div>
    <div class="brand-text"><h3>APOTEK</h3><h2>FARMAZA 2</h2><p>Admin Panel</p></div>
  </div>
  <ul class="sidebar-menu">
    <li class="menu-item"><a href="admin-dashboard.php"><i class='bx bxs-home'></i> Beranda</a></li>
    <li class="menu-label">MENU UTAMA</li>
    <li class="menu-item has-submenu open">
      <a href="javascript:void(0)" onclick="toggleSubmenu(this)"><i class='bx bxs-purchase-tag'></i> Promo <i class='bx bx-chevron-down arrow'></i></a>
      <ul class="submenu" style="display:flex;">
        <li><a href="list-promo.php">Semua Promo</a></li>
        <li><a href="tambah-promo.php">Tambah Promo</a></li>
      </ul>
    </li>
    <li class="menu-item has-submenu">
      <a href="javascript:void(0)" onclick="toggleSubmenu(this)"><i class='bx bxs-box'></i> Produk <i class='bx bx-chevron-down arrow'></i></a>
      <ul class="submenu">
        <li><a href="list-produk.php">Semua Produk</a></li>
        <li><a href="tambah-produk.php">Tambah Produk</a></li>
      </ul>
    </li>
    <li class="menu-item has-submenu">
      <a href="javascript:void(0)" onclick="toggleSubmenu(this)"><i class='bx bxs-file-blank'></i> Artikel <i class='bx bx-chevron-down arrow'></i></a>
      <ul class="submenu">
        <li><a href="list-artikel.php">Semua Artikel</a></li>
        <li><a href="tambah-artikel.php">Tambah Artikel</a></li>
      </ul>
    </li>
    <li class="menu-item"><a href="#"><i class='bx bxs-cog'></i> Pengaturan</a></li>
    <li class="menu-item"><a href="index.html"><i class='bx bx-log-out'></i> Keluar</a></li>
  </ul>
</aside>

<!-- Main -->
<main class="main-content">
  <header class="topbar">
    <div class="toggle-sidebar" onclick="toggleSidebar()"><i class='bx bx-menu'></i></div>
    <div class="user-profile">
      <div class="avatar"><i class='bx bxs-user'></i></div>
      <span>Admin</span>
      <i class='bx bx-chevron-down'></i>
    </div>
  </header>

  <div class="content-wrapper">
    <!-- Breadcrumb -->
    <div class="breadcrumb">
      <a href="admin-dashboard.php">Beranda</a> &gt;
      <a href="list-promo.php">Promo</a> &gt;
      <span>Edit Promo</span>
    </div>

    <!-- Header + Status -->
    <div class="edit-header-row">
      <div>
        <div class="page-header" style="margin-bottom:0;">
          <h1>Edit Promo</h1>
          <p>Perbarui informasi promo pada sistem.</p>
        </div>
      </div>
      <div style="display:flex;gap:10px;align-items:center;flex-wrap:wrap;">
        <a href="list-promo.php" class="btn-outline" style="display:inline-flex;align-items:center;gap:6px;padding:8px 16px;border-radius:8px;border:1px solid #e2e8f0;font-size:13px;font-weight:600;background:#fff;">
          <i class='bx bx-arrow-back'></i> Kembali
        </a>
        <button class="status-btn <?= $is_aktif ? '' : 'nonaktif' ?>" id="statusToggleBtn" type="button">
          <span class="dot"></span> <?= $status_text ?> <i class='bx bx-chevron-down'></i>
        </button>
      </div>
    </div>

    <?php if ($error): ?>
      <div style="background:#fef2f2;color:#dc2626;padding:12px 16px;border-radius:8px;margin-bottom:18px;font-weight:600;font-size:13px;">
        <i class='bx bx-error'></i> <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>

    <!-- Preview card (info promo saat ini) -->
    <div class="promo-preview-card">
      <?php if (!empty($promo['gambar'])): ?>
        <img src="<?= htmlspecialchars($promo['gambar']) ?>" class="promo-preview-thumb" alt="Promo">
      <?php else: ?>
        <div class="promo-preview-thumb-ph"><i class='bx bxs-purchase-tag'></i></div>
      <?php endif; ?>
      <div class="promo-preview-info">
        <div class="promo-preview-title"><?= htmlspecialchars($promo['judul']) ?></div>
        <div class="promo-preview-date">
          <i class='bx bx-calendar'></i>
          <?= fmtTgl($promo['tanggal_mulai']) ?> – <?= fmtTgl($promo['tanggal_selesai']) ?>
        </div>
        <span class="promo-preview-badge"><?= htmlspecialchars($promo['kategori'] ?? 'Promo') ?></span>
      </div>
    </div>

    <!-- Stats -->
    <div class="promo-stats-row">
      <div class="promo-stat-box">
        <div class="promo-stat-icon" style="background:#eff6ff;color:#3b82f6;"><i class='bx bx-mouse-alt'></i></div>
        <div>
          <div class="promo-stat-val">–</div>
          <div class="promo-stat-lbl">Total Klik</div>
        </div>
      </div>
      <div class="promo-stat-box">
        <div class="promo-stat-icon" style="background:#f0fdf4;color:#16a34a;"><i class='bx bx-cart'></i></div>
        <div>
          <div class="promo-stat-val">–</div>
          <div class="promo-stat-lbl">Penggunaan</div>
        </div>
      </div>
      <div class="promo-stat-box">
        <div class="promo-stat-icon" style="background:#fff7ed;color:#ea580c;"><i class='bx bx-time'></i></div>
        <div>
          <div class="promo-stat-val" style="font-size:13px;"><?= date('d M Y, H:i') ?></div>
          <div class="promo-stat-lbl">Terakhir diupdate</div>
        </div>
      </div>
    </div>

    <!-- Quick Actions -->
    <div class="promo-actions-row">
      <button class="btn-action" type="button" id="btnLihatPreview">
        <i class='bx bx-show'></i> Lihat Preview
      </button>
      <a href="tambah-promo.php" class="btn-action">
        <i class='bx bx-copy'></i> Duplikat Promo
      </a>
      <button class="btn-action btn-danger" type="button" id="btnHapusPromo">
        <i class='bx bx-block'></i> Nonaktifkan
      </button>
    </div>

    <!-- Form Edit -->
    <form method="POST" enctype="multipart/form-data" id="editPromoForm">
      <input type="hidden" name="_action" value="update">
      <input type="hidden" name="status" id="statusInput" value="<?= $is_aktif ? 'aktif' : 'nonaktif' ?>">

      <!-- Informasi Promo -->
      <div style="background:#fff;border:1px solid #e2e8f0;border-radius:14px;padding:24px;margin-bottom:20px;">
        <div class="section-banner">
          <div style="display:flex;align-items:center;gap:14px;">
            <div class="section-icon" style="background:#e0e7ff;color:#3b82f6;"><i class='bx bxs-purchase-tag'></i></div>
            <div class="section-text">
              <h4>Informasi Promo</h4>
              <p>Ubah detail informasi promo.</p>
            </div>
          </div>
          <img src="aset-promo.png" alt="" class="section-banner-img" onerror="this.style.display='none'">
        </div>

        <div class="form-group">
          <label>Judul Promo <span style="color:#dc2626;">*</span></label>
          <input type="text" name="judul" id="judulInput" class="form-control" required
            value="<?= htmlspecialchars($promo['judul']) ?>"
            placeholder="Contoh: Diskon 20% Semua Produk">
          <span class="form-help">Judul akan ditampilkan sebagai headline promo.</span>
        </div>

        <div class="form-group">
          <label>Kategori <span style="color:#dc2626;">*</span></label>
          <select name="kategori" class="form-control" required>
            <?php
            $cats = ['Diskon','Cashback','Gratis Ongkir','Lainnya'];
            foreach ($cats as $c) {
              $sel = ($promo['kategori'] == $c) ? 'selected' : '';
              echo "<option value=\"$c\" $sel>$c</option>";
            }
            ?>
          </select>
          <span class="form-help">Pilih kategori yang sesuai.</span>
        </div>

        <div class="grid-2" style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">
          <div class="form-group">
            <label>Tanggal Mulai <span style="color:#dc2626;">*</span></label>
            <input type="date" name="tanggal_mulai" id="tglMulaiInput" class="form-control" required
              value="<?= htmlspecialchars($promo['tanggal_mulai']) ?>">
            <span class="form-help">Tanggal mulai promo aktif.</span>
          </div>
          <div class="form-group">
            <label>Tanggal Selesai <span style="color:#dc2626;">*</span></label>
            <input type="date" name="tanggal_selesai" id="tglSelesaiInput" class="form-control" required
              value="<?= htmlspecialchars($promo['tanggal_selesai']) ?>">
            <span class="form-help">Tanggal berakhirnya promo.</span>
          </div>
        </div>
      </div>

      <!-- Media Promo -->
      <div style="background:#fff;border:1px solid #e2e8f0;border-radius:14px;padding:24px;margin-bottom:20px;">
        <div class="section-banner" style="background:#f0fdf4;border-color:#bbf7d0;">
          <div style="display:flex;align-items:center;gap:14px;">
            <div class="section-icon" style="background:#dcfce7;color:#16a34a;"><i class='bx bx-image-alt'></i></div>
            <div class="section-text">
              <h4>Media Promo</h4>
              <p>Ubah gambar atau banner promo.</p>
            </div>
          </div>
          <img src="aset-media.png" alt="" class="section-banner-img" onerror="this.style.display='none'">
        </div>

        <label style="font-size:14px;font-weight:600;margin-bottom:8px;display:block;">
          Gambar Promo <span style="color:#dc2626;">*</span>
        </label>
        <div class="upload-2col">
          <!-- Gambar saat ini -->
          <div class="current-img-wrap" id="currentImgWrap">
            <?php if (!empty($promo['gambar'])): ?>
              <img src="<?= htmlspecialchars($promo['gambar']) ?>" alt="Gambar Promo" id="currentImg">
              <button type="button" class="remove-img-btn" title="Hapus gambar">✕</button>
            <?php else: ?>
              <div class="current-img-ph"><i class='bx bx-image' style="font-size:40px;color:#cbd5e1;"></i></div>
            <?php endif; ?>
          </div>
          <!-- Upload baru -->
          <div class="upload-area-sm" id="newPreviewWrap">
            <i class='bx bx-cloud-upload'></i>
            <p>Ganti Gambar</p>
            <span>JPG, PNG, WEBP (Maks. 2MB)</span>
            <input type="file" name="gambar_baru" id="gantiGambarInput" accept="image/*">
          </div>
        </div>
        <img id="newPreviewImg" src="" alt="" style="display:none;margin-top:10px;max-width:100%;max-height:160px;border-radius:8px;object-fit:contain;border:1px solid #e2e8f0;">
      </div>

      <!-- Preview Output -->
      <div id="previewSection" style="background:#fff;border:1px solid #e2e8f0;border-radius:14px;padding:24px;margin-bottom:20px;">
        <div class="section-banner" style="background:#faf5ff;border-color:#e9d5ff;margin-bottom:16px;">
          <div style="display:flex;align-items:center;gap:14px;">
            <div class="section-icon" style="background:#f3e8ff;color:#9333ea;"><i class='bx bx-bullhorn'></i></div>
            <div class="section-text">
              <h4>Preview Promo</h4>
              <p>Lihat tampilan promo seperti yang akan dilihat pelanggan.</p>
            </div>
          </div>
        </div>
        <div class="promo-output-preview">
          <div class="promo-output-text">
            <div class="po-label">DISKON SPESIAL</div>
            <div class="po-title" id="outputTitle"><?= htmlspecialchars($promo['judul']) ?></div>
            <div class="po-date" id="outputDate">
              <?= fmtTgl($promo['tanggal_mulai']) ?> – <?= fmtTgl($promo['tanggal_selesai']) ?>
            </div>
          </div>
          <?php if (!empty($promo['gambar'])): ?>
            <img src="<?= htmlspecialchars($promo['gambar']) ?>" class="promo-output-img" id="outputPreviewImg" alt="">
          <?php else: ?>
            <img id="outputPreviewImg" src="" style="display:none;" class="promo-output-img" alt="">
          <?php endif; ?>
          <div class="promo-output-deco"><i class='bx bxs-purchase-tag'></i></div>
        </div>
      </div>

      <!-- Bottom Actions -->
      <div class="form-bottom-actions">
        <button type="button" class="btn-hapus-promo" id="btnHapusPromo2">
          <i class='bx bxs-trash'></i> Hapus Promo
        </button>
        <button type="submit" class="btn-simpan-promo">
          <i class='bx bx-save'></i> Simpan Perubahan
        </button>
      </div>
    </form>

    <!-- Form hapus tersembunyi -->
    <form id="deletePromoForm" method="POST" action="hapus-promo.php" style="display:none;">
      <input type="hidden" name="id" value="<?= $id ?>">
    </form>

  </div><!-- end content-wrapper -->
</main>

<!-- Edit Promo JS (atau sudah di-paste ke main.js) -->
<script src="edit-promo.js"></script>
<script>
  // Tombol hapus bawah
  document.getElementById('btnHapusPromo2')?.addEventListener('click', function() {
    if (confirm('Yakin ingin menghapus promo ini? Tindakan tidak bisa dibatalkan.')) {
      document.getElementById('deletePromoForm').submit();
    }
  });
</script>
</body>
</html>
