<?php
session_start();
require_once "koneksi.php";

// Set timezone
date_default_timezone_set('Asia/Jakarta');

// --- QUERIES STATISTIK ---
// Total Promo
$res_promo = $conn->query("SELECT COUNT(*) as total FROM promo");
$total_promo = $res_promo->fetch_assoc()['total'];

// Promo Aktif
$res_promo_aktif = $conn->query("SELECT COUNT(*) as total FROM promo WHERE tanggal_selesai >= CURDATE()");
$total_promo_aktif = $res_promo_aktif->fetch_assoc()['total'];

// Total Produk
$res_produk = $conn->query("SELECT COUNT(*) as total FROM produk");
$total_produk = $res_produk->fetch_assoc()['total'];

// Total Artikel
$res_artikel = $conn->query("SELECT COUNT(*) as total FROM artikel");
$total_artikel = $res_artikel->fetch_assoc()['total'];

// Total Admin
$res_admin = $conn->query("SELECT COUNT(*) as total FROM admin");
$total_admin = $res_admin->fetch_assoc()['total'];

// --- QUERIES DATA TERBARU ---
// Promo Terbaru (5 terakhir)
$promos = [];
$res_promos = $conn->query("SELECT * FROM promo ORDER BY id DESC LIMIT 5");
if ($res_promos) {
    while($row = $res_promos->fetch_assoc()) {
        $promos[] = $row;
    }
}

// Produk Terbaru (5 terakhir)
$produks = [];
$res_produks = $conn->query("SELECT * FROM produk ORDER BY id DESC LIMIT 5");
if ($res_produks) {
    while($row = $res_produks->fetch_assoc()) {
        $produks[] = $row;
    }
}

// Artikel Terbaru (5 terakhir)
$artikels = [];
$res_artikels = $conn->query("SELECT * FROM artikel ORDER BY id DESC LIMIT 5");
if ($res_artikels) {
    while($row = $res_artikels->fetch_assoc()) {
        $artikels[] = $row;
    }
}

// Helper Function for Date Format
function formatDate($dateString) {
    if (!$dateString) return '-';
    $time = strtotime($dateString);
    $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    return date('j', $time) . ' ' . $months[date('n', $time) - 1] . ' ' . date('Y', $time);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda Admin - Apotek Farmaza 2</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="admin-style.css">
</head>
<body>
    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <div class="brand-logo">
                <i class='bx bx-plus-medical'></i>
            </div>
            <div class="brand-text">
                <h3>APOTEK</h3>
                <h2>FARMAZA 2</h2>
                <p>Admin Panel</p>
            </div>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-item active">
                <a href="admin-dashboard.php"><i class='bx bxs-home'></i> Beranda</a>
            </li>
            <li class="menu-label">MENU UTAMA</li>
            <li class="menu-item has-submenu">
                <a href="javascript:void(0)" onclick="toggleSubmenu(this)"><i class='bx bxs-purchase-tag'></i> Promo <i class='bx bx-chevron-down arrow'></i></a>
                <ul class="submenu">
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
            <li class="menu-item mt-auto">
                <a href="#"><i class='bx bxs-cog'></i> Pengaturan <i class='bx bx-chevron-right arrow'></i></a>
            </li>
            <li class="menu-item">
                <a href="index.html"><i class='bx bx-log-out'></i> Keluar</a>
            </li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Topbar -->
        <header class="topbar">
            <div class="toggle-sidebar" onclick="toggleSidebar()">
                <i class='bx bx-menu'></i>
            </div>
            <div class="user-profile">
                <div class="avatar">
                    <i class='bx bxs-user'></i>
                </div>
                <span>Admin</span>
                <i class='bx bx-chevron-down'></i>
            </div>
        </header>

        <!-- Dashboard Content -->
        <div class="content-wrapper">
            <div class="page-header">
                <h1>Beranda Admin</h1>
                <p>Selamat datang kembali, Admin!</p>
            </div>

            <!-- Summary Cards -->
            <div class="summary-cards">
                <!-- Promo Card -->
                <div class="card summary-card card-promo">
                    <div class="card-body">
                        <div class="card-icon bg-blue-light text-blue">
                            <i class='bx bxs-purchase-tag'></i>
                        </div>
                        <div class="card-info">
                            <p class="card-title">Total Promo</p>
                            <h3 class="card-value"><?= $total_promo ?></h3>
                            <p class="card-desc">Promo aktif: <?= $total_promo_aktif ?></p>
                        </div>
                    </div>
                    <div class="card-footer text-blue">
                        <a href="list-promo.php">Lihat semua <i class='bx bx-chevron-right'></i></a>
                    </div>
                </div>
                <!-- Produk Card -->
                <div class="card summary-card card-produk">
                    <div class="card-body">
                        <div class="card-icon bg-green-light text-green">
                            <i class='bx bxs-box'></i>
                        </div>
                        <div class="card-info">
                            <p class="card-title">Total Produk</p>
                            <h3 class="card-value"><?= $total_produk ?></h3>
                            <p class="card-desc">Stok tersedia</p>
                        </div>
                    </div>
                    <div class="card-footer text-green">
                        <a href="list-produk.php">Lihat semua <i class='bx bx-chevron-right'></i></a>
                    </div>
                </div>
                <!-- Artikel Card -->
                <div class="card summary-card card-artikel">
                    <div class="card-body">
                        <div class="card-icon bg-orange-light text-orange">
                            <i class='bx bxs-file-blank'></i>
                        </div>
                        <div class="card-info">
                            <p class="card-title">Total Artikel</p>
                            <h3 class="card-value"><?= $total_artikel ?></h3>
                            <p class="card-desc">Artikel terbaru</p>
                        </div>
                    </div>
                    <div class="card-footer text-orange">
                        <a href="list-artikel.php">Lihat semua <i class='bx bx-chevron-right'></i></a>
                    </div>
                </div>
                <!-- Admin Card -->
                <div class="card summary-card card-admin">
                    <div class="card-body">
                        <div class="card-icon bg-purple-light text-purple">
                            <i class='bx bxs-group'></i>
                        </div>
                        <div class="card-info">
                            <p class="card-title">Total Admin</p>
                            <h3 class="card-value"><?= $total_admin ?></h3>
                            <p class="card-desc">Akun terdaftar</p>
                        </div>
                    </div>
                    <div class="card-footer text-purple">
                        <a href="#">Lihat semua <i class='bx bx-chevron-right'></i></a>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="quick-actions-section">
                <h3 class="section-title">Aksi Cepat</h3>
                <div class="quick-actions">
                    <a href="tambah-promo.php" class="action-card action-promo">
                        <div class="action-icon bg-blue text-white">
                            <i class='bx bx-plus'></i>
                        </div>
                        <div class="action-text">
                            <h4 class="text-blue">Tambah Promo Baru</h4>
                            <p>Buat promo baru</p>
                        </div>
                    </a>
                    <a href="tambah-produk.php" class="action-card action-produk">
                        <div class="action-icon bg-green text-white">
                            <i class='bx bx-plus'></i>
                        </div>
                        <div class="action-text">
                            <h4 class="text-green">Tambah Produk Baru</h4>
                            <p>Tambah produk ke toko</p>
                        </div>
                    </a>
                    <a href="tambah-artikel.php" class="action-card action-artikel">
                        <div class="action-icon bg-orange text-white">
                            <i class='bx bx-plus'></i>
                        </div>
                        <div class="action-text">
                            <h4 class="text-orange">Tambah Artikel Baru</h4>
                            <p>Tulis artikel baru</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Recent Data -->
            <div class="recent-data-section">
                <h3 class="section-title">Data Terbaru</h3>
                <div class="data-card">
                    <div class="data-tabs">
                        <button class="tab-btn active text-blue" onclick="switchTab('promo')">Promo Terbaru</button>
                        <button class="tab-btn text-green" onclick="switchTab('produk')">Produk Terbaru</button>
                        <button class="tab-btn text-orange" onclick="switchTab('artikel')">Artikel Terbaru</button>
                    </div>
                    
                    <div class="table-responsive">
                        <!-- Tabel Promo -->
                        <table class="data-table active" id="table-promo">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($promos) > 0): ?>
                                    <?php foreach($promos as $p): 
                                        $is_active = (strtotime($p['tanggal_selesai']) >= strtotime(date('Y-m-d')));
                                        $status_class = $is_active ? 'badge-aktif' : 'badge-selesai';
                                        $status_text = $is_active ? 'Aktif' : 'Selesai';
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="table-item-title">
                                                <div class="item-img promo-img-1" style="background-image: url('<?= htmlspecialchars($p['gambar']) ?>'); background-size: cover; background-position: center;">
                                                    <?php if(empty($p['gambar'])) echo "<span>".substr(htmlspecialchars($p['judul']), 0, 15)."</span>"; ?>
                                                </div>
                                                <span><?= htmlspecialchars($p['judul']) ?></span>
                                            </div>
                                        </td>
                                        <td><?= htmlspecialchars($p['kategori'] ?? 'Promo') ?></td>
                                        <td><?= formatDate($p['tanggal_mulai']) ?></td>
                                        <td><?= formatDate($p['tanggal_selesai']) ?></td>
                                        <td><span class="badge <?= $status_class ?>"><?= $status_text ?></span></td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href="edit-promo.php?id=<?= $p['id'] ?>" class="btn-icon btn-edit"><i class='bx bxs-pencil'></i></a>
                                                <a href="hapus-promo.php?id=<?= $p['id'] ?>" class="btn-icon btn-delete" onclick="return confirm('Yakin ingin menghapus?')"><i class='bx bxs-trash'></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr><td colspan="6" style="text-align:center; padding:20px;">Belum ada data promo.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>

                        <!-- Tabel Produk -->
                        <table class="data-table" id="table-produk" style="display: none;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($produks) > 0): ?>
                                    <?php foreach($produks as $pr): ?>
                                    <tr>
                                        <td>#<?= $pr['id'] ?></td>
                                        <td>
                                            <div class="table-item-title">
                                                <?php if(!empty($pr['gambar'])): ?>
                                                    <img src="<?= htmlspecialchars($pr['gambar']) ?>" alt="img" style="width: 40px; height: 40px; border-radius: 6px; object-fit: cover;">
                                                <?php else: ?>
                                                    <div class="item-img bg-green-light text-green"><i class='bx bxs-box'></i></div>
                                                <?php endif; ?>
                                                <span><?= htmlspecialchars($pr['nama']) ?></span>
                                            </div>
                                        </td>
                                        <td>Rp <?= number_format($pr['harga'], 0, ',', '.') ?></td>
                                        <td><?= substr(htmlspecialchars($pr['deskripsi']), 0, 30) ?>...</td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href="edit-produk.php?id=<?= $pr['id'] ?>" class="btn-icon btn-edit"><i class='bx bxs-pencil'></i></a>
                                                <a href="hapus-produk.php?id=<?= $pr['id'] ?>" class="btn-icon btn-delete" onclick="return confirm('Yakin ingin menghapus?')"><i class='bx bxs-trash'></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr><td colspan="5" style="text-align:center; padding:20px;">Belum ada data produk.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>

                        <!-- Tabel Artikel -->
                        <table class="data-table" id="table-artikel" style="display: none;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Judul Artikel</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(count($artikels) > 0): ?>
                                    <?php foreach($artikels as $ar): ?>
                                    <tr>
                                        <td>#<?= $ar['id'] ?></td>
                                        <td>
                                            <div class="table-item-title">
                                                <?php if(!empty($ar['gambar'])): ?>
                                                    <img src="<?= htmlspecialchars($ar['gambar']) ?>" alt="img" style="width: 40px; height: 40px; border-radius: 6px; object-fit: cover;">
                                                <?php else: ?>
                                                    <div class="item-img bg-orange-light text-orange"><i class='bx bxs-file-blank'></i></div>
                                                <?php endif; ?>
                                                <span><?= htmlspecialchars($ar['judul']) ?></span>
                                            </div>
                                        </td>
                                        <td><?= formatDate($ar['tanggal']) ?></td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href="edit-artikel.php?id=<?= $ar['id'] ?>" class="btn-icon btn-edit"><i class='bx bxs-pencil'></i></a>
                                                <a href="hapus-artikel.php?id=<?= $ar['id'] ?>" class="btn-icon btn-delete" onclick="return confirm('Yakin ingin menghapus?')"><i class='bx bxs-trash'></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr><td colspan="4" style="text-align:center; padding:20px;">Belum ada data artikel.</td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="data-footer" id="data-footer-link">
                        <a href="list-promo.php" class="text-blue">Lihat semua promo <i class='bx bx-chevron-right'></i></a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('sidebarOverlay').classList.toggle('active');
        }

        function toggleSubmenu(element) {
            const parent = element.parentElement;
            parent.classList.toggle('open');
            const submenu = parent.querySelector('.submenu');
            if (parent.classList.contains('open')) {
                submenu.style.display = 'flex';
            } else {
                submenu.style.display = 'none';
            }
        }

        function switchTab(tabName) {
            // Update buttons
            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
            
            // Hide all tables
            document.querySelectorAll('.data-table').forEach(table => table.style.display = 'none');
            
            // Show selected table & highlight button
            let footerLink = document.getElementById('data-footer-link');
            if (tabName === 'promo') {
                document.querySelector('.tab-btn.text-blue').classList.add('active');
                document.getElementById('table-promo').style.display = 'table';
                footerLink.innerHTML = `<a href="list-promo.php" class="text-blue">Lihat semua promo <i class='bx bx-chevron-right'></i></a>`;
            } else if (tabName === 'produk') {
                document.querySelector('.tab-btn.text-green').classList.add('active');
                document.getElementById('table-produk').style.display = 'table';
                footerLink.innerHTML = `<a href="list-produk.php" class="text-green">Lihat semua produk <i class='bx bx-chevron-right'></i></a>`;
            } else if (tabName === 'artikel') {
                document.querySelector('.tab-btn.text-orange').classList.add('active');
                document.getElementById('table-artikel').style.display = 'table';
                footerLink.innerHTML = `<a href="list-artikel.php" class="text-orange">Lihat semua artikel <i class='bx bx-chevron-right'></i></a>`;
            }
        }
    </script>
</body>
</html>
