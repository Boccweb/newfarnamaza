<?php
session_start();
require_once "koneksi.php";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'] ?? '';
    $kategori = $_POST['kategori'] ?? '';
    $tanggal_mulai = $_POST['tanggal_mulai'] ?? '';
    $tanggal_selesai = $_POST['tanggal_selesai'] ?? '';
    
    // Upload Gambar Sederhana
    $gambar = '';
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $target_dir = "uploads/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            $gambar = $target_file;
        }
    }

    if (empty($judul) || empty($tanggal_mulai) || empty($tanggal_selesai)) {
        $error = "Judul, Tanggal Mulai, dan Tanggal Selesai wajib diisi.";
    } else {
        $stmt = $conn->prepare("INSERT INTO promo (judul, kategori, tanggal_mulai, tanggal_selesai, gambar) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $judul, $kategori, $tanggal_mulai, $tanggal_selesai, $gambar);
        
        if ($stmt->execute()) {
            echo "<script>alert('Promo telah ditambahkan'); window.location.href='admin-dashboard.php';</script>";
            exit;
        } else {
            $error = "Gagal menambahkan promo: " . $conn->error;
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Promo - Apotek Farmaza 2</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="admin-style.css">
    <style>
        .breadcrumb {
            font-size: 13px;
            color: var(--text-muted);
            margin-bottom: 24px;
        }
        .breadcrumb a {
            color: var(--text-muted);
        }
        .breadcrumb a:hover {
            color: var(--blue);
        }
        
        .header-action {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }
        
        .btn-outline {
            border: 1px solid var(--border-color);
            background: white;
            color: var(--text-main);
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s;
        }
        .btn-outline:hover {
            background: #f8fafc;
        }

        .form-card {
            background: white;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            padding: 32px;
        }

        .section-banner {
            background: #f8faff;
            border-radius: 8px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 24px;
            border: 1px solid #e0e7ff;
        }
        
        .section-icon {
            width: 48px;
            height: 48px;
            background: #e0e7ff;
            color: var(--blue);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }
        
        .section-text h4 {
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 4px;
        }
        .section-text p {
            font-size: 13px;
            color: var(--text-muted);
        }

        .form-group {
            margin-bottom: 24px;
        }
        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--text-main);
        }
        .form-group label span.req {
            color: var(--red);
        }
        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-family: inherit;
            font-size: 14px;
            transition: border-color 0.2s;
        }
        .form-control:focus {
            outline: none;
            border-color: var(--blue);
        }
        .form-help {
            display: block;
            font-size: 12px;
            color: var(--text-muted);
            margin-top: 6px;
        }

        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        .upload-area {
            border: 2px dashed #cbd5e1;
            border-radius: 12px;
            padding: 32px;
            text-align: center;
            background: #f8fafc;
            position: relative;
            cursor: pointer;
            transition: all 0.2s;
        }
        .upload-area:hover {
            border-color: var(--blue);
            background: #f0fdf4; /* slight green/blue tint */
        }
        .upload-area i {
            font-size: 32px;
            color: var(--blue);
            margin-bottom: 12px;
        }
        .upload-area p.main-text {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-main);
            margin-bottom: 4px;
        }
        .upload-area p.sub-text {
            font-size: 12px;
            color: var(--text-muted);
        }
        .upload-input {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 16px;
            margin-top: 40px;
            padding-top: 24px;
            border-top: 1px solid var(--border-color);
        }

        .btn-submit {
            background: var(--blue);
            color: white;
            padding: 10px 24px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .btn-cancel {
            background: white;
            color: var(--text-main);
            border: 1px solid var(--border-color);
            padding: 10px 24px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
        }
        
        @media (max-width: 768px) {
            .grid-2 {
                grid-template-columns: 1fr;
                gap: 16px;
            }
            .header-action {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }
            .form-card {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <aside class="sidebar" id="sidebar">
        <!-- Sidebar -->
        <div class="sidebar-brand">
            <div class="brand-logo"><i class='bx bx-plus-medical'></i></div>
            <div class="brand-text"><h3>APOTEK</h3><h2>FARMAZA 2</h2><p>Admin Panel</p></div>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-item"><a href="admin-dashboard.php"><i class='bx bxs-home'></i> Beranda</a></li>
            <li class="menu-label">MENU UTAMA</li>
            <li class="menu-item has-submenu open">
                <a href="javascript:void(0)" onclick="toggleSubmenu(this)"><i class='bx bxs-purchase-tag'></i> Promo <i class='bx bx-chevron-down arrow'></i></a>
                <ul class="submenu" style="display: flex;">
                    <li><a href="list-promo.php">Semua Promo</a></li>
                    <li><a href="tambah-promo.php" style="color: white; font-weight: 600;"><span style="color: var(--blue); margin-right: 8px;">●</span> Tambah Promo</a></li>
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
            <li class="menu-item mt-auto"><a href="#"><i class='bx bxs-cog'></i> Pengaturan</a></li>
            <li class="menu-item"><a href="#"><i class='bx bx-log-out'></i> Logout</a></li>
        </ul>
    </aside>

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

        <div class="content-wrapper">
            <div class="breadcrumb">
                <a href="admin-dashboard.php">Beranda</a> &gt; <a href="list-promo.php">Promo</a> &gt; <span>Tambah Promo</span>
            </div>

            <div class="header-action">
                <div class="page-header">
                    <h1>Tambah Promo Baru</h1>
                    <p>Masukkan detail promo ke dalam sistem.</p>
                </div>
                <a href="admin-dashboard.php" class="btn-outline"><i class='bx bx-arrow-back'></i> Kembali</a>
            </div>

            <form method="POST" enctype="multipart/form-data" class="form-card">
                <?php if($error): ?><div class="alert alert-error" style="margin-bottom: 20px; color: red; font-weight: 500; background: var(--red-light); padding: 12px; border-radius: 6px;"><?= $error ?></div><?php endif; ?>

                <!-- Info Promo Banner -->
                <div class="section-banner" style="justify-content: space-between;">
                    <div style="display: flex; align-items: center; gap: 16px;">
                        <div class="section-icon"><i class='bx bxs-purchase-tag'></i></div>
                        <div class="section-text">
                            <h4>Informasi Promo</h4>
                            <p>Lengkapi informasi dasar promo Anda.</p>
                        </div>
                    </div>
                    <img src="aset-promo.png" alt="Ilustrasi Promo" style="height: 64px; object-fit: contain;">
                </div>

                <div class="form-group">
                    <label>Judul Promo <span class="req">*</span></label>
                    <input type="text" name="judul" class="form-control" required placeholder="Contoh: Diskon 20% Semua Produk">
                    <span class="form-help">Judul akan ditampilkan sebagai headline promo.</span>
                </div>

                <div class="form-group">
                    <label>Kategori <span class="req">*</span></label>
                    <select name="kategori" class="form-control" required>
                        <option value="" disabled selected>Pilih kategori promo</option>
                        <option value="Diskon">Diskon</option>
                        <option value="Cashback">Cashback</option>
                        <option value="Gratis Ongkir">Gratis Ongkir</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    <span class="form-help">Pilih kategori yang sesuai dengan promo ini.</span>
                </div>

                <div class="grid-2">
                    <div class="form-group">
                        <label>Tanggal Mulai <span class="req">*</span></label>
                        <input type="date" name="tanggal_mulai" class="form-control" required>
                        <span class="form-help">Tanggal mulai promo aktif.</span>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Selesai <span class="req">*</span></label>
                        <input type="date" name="tanggal_selesai" class="form-control" required>
                        <span class="form-help">Tanggal berakhirnya promo.</span>
                    </div>
                </div>

                <!-- Media Promo Banner -->
                <div class="section-banner" style="margin-top: 16px;">
                    <div class="section-icon"><i class='bx bx-image-alt'></i></div>
                    <div class="section-text">
                        <h4>Media Promo</h4>
                        <p>Upload gambar/banner promo.</p>
                    </div>
                </div>

                <div class="form-group">
                    <label>Gambar Promo <span class="req">*</span></label>
                    <div class="upload-area">
                        <i class='bx bx-cloud-upload'></i>
                        <p class="main-text">Klik untuk upload gambar<br><span style="font-weight: 400;">atau drag & drop file di sini</span></p>
                        <p class="sub-text">Format: JPG, PNG, WEBP (Maks. 2MB)</p>
                        <input type="file" name="gambar" id="gambarInput" class="upload-input" accept="image/*">
                    </div>
                </div>

                <div class="form-group" id="previewGroup" style="display: none;">
                    <label>Preview</label>
                    <div style="margin-top: 8px;">
                        <img id="imagePreview" src="" alt="Preview Tampilan Promo" style="max-width: 100%; max-height: 250px; border-radius: 8px; border: 1px solid var(--border-color); object-fit: contain;">
                    </div>
                    <span class="form-help">Preview tampilan promo</span>
                </div>

                <div class="form-actions">
                    <a href="admin-dashboard.php" class="btn-cancel">Batal</a>
                    <button type="submit" class="btn-submit"><i class='bx bx-save'></i> Simpan Promo</button>
                </div>
            </form>
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

        // Image Preview Logic
        const gambarInput = document.getElementById('gambarInput');
        const previewGroup = document.getElementById('previewGroup');
        const imagePreview = document.getElementById('imagePreview');

        gambarInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    previewGroup.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '';
                previewGroup.style.display = 'none';
            }
        });
    </script>
</body>
</html>
