<?php
// ============================================================
//  LOGIN ADMIN — Apotek Farmaza 2
//  File: login-admin.php
//  Koneksi: database farmaza, tabel admin
//  Password: plain text (tanpa hashing)
// ============================================================

session_start();

// Konfigurasi database
$host     = "localhost";
$user     = "root";
$pass     = "";
$database = "farmaza";

// Koneksi ke database
$conn = new mysqli($host, $user, $pass, $database);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$error = "";

// Proses login
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $password = trim($_POST["password"] ?? "");

    if ($username === "" || $password === "") {
        $error = "Username dan password wajib diisi!";
    } else {
        // Query cek username dan password (tanpa hash)
        $stmt = $conn->prepare("SELECT id, username FROM admin WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $admin = $result->fetch_assoc();
            $_SESSION["admin_id"]       = $admin["id"];
            $_SESSION["admin_username"] = $admin["username"];
            $_SESSION["admin_logged_in"] = true;

            // Redirect ke dashboard admin
            header("Location: admin-dashboard.php");
            exit;
        } else {
            $error = "Username atau password salah! Silakan coba lagi.";
        }

        $stmt->close();
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Admin - Apotek Farmaza 2</title>
  <meta name="description" content="Halaman login admin Apotek Farmaza 2. Masuk ke panel admin untuk mengelola data dan layanan apotek." />
  <link rel="stylesheet" href="style.css" />
</head>
<body class="la-page">

  <!-- ===== HERO SECTION ===== -->
  <div class="la-hero">
    <div class="la-hero-overlay"></div>

    <!-- Dekorasi -->
    <div class="la-deco la-deco-1"></div>
    <div class="la-deco la-deco-2"></div>
    <div class="la-deco la-deco-3"></div>
    <span class="la-plus la-plus-1">+</span>
    <span class="la-plus la-plus-2">+</span>
    <span class="la-plus la-plus-3">+</span>

    <!-- Tombol Kembali -->
    <a href="index.html" class="la-back" id="btn-kembali">
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
      Kembali
    </a>

    <!-- Brand Logo -->
    <div class="la-brand">
      <div class="la-logo-icon">
        <img src="logo.jpg" alt="Logo Apotek Farmaza 2" />
      </div>
      <div class="la-brand-text">
        <span class="la-brand-apotek">APOTEK</span>
        <span class="la-brand-name">FARMAZA 2</span>
      </div>
    </div>

    <!-- Hero Text -->
    <div class="la-hero-content">
      <h1 class="la-hero-title">Login Admin</h1>
      <p class="la-hero-sub">Masuk ke panel admin untuk<br>mengelola data dan layanan apotek</p>
    </div>
  </div>

  <!-- ===== MAIN CONTENT ===== -->
  <div class="la-main">

    <!-- Login Card -->
    <div class="la-card">
      <!-- Shield Icon -->
      <div class="la-shield">
        <svg viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M20 4L24.5 8H32V15.5L36 20L32 24.5V32H24.5L20 36L15.5 32H8V24.5L4 20L8 15.5V8H15.5L20 4Z" fill="#10B981" opacity="0.2"/>
          <path d="M20 4L24.5 8H32V15.5L36 20L32 24.5V32H24.5L20 36L15.5 32H8V24.5L4 20L8 15.5V8H15.5L20 4Z" stroke="#10B981" stroke-width="2"/>
          <circle cx="20" cy="20" r="5" fill="#10B981"/>
          <path d="M17 20l2 2 4-4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </div>

      <h2 class="la-card-title">Selamat Datang, Admin!</h2>
      <p class="la-card-subtitle">Silakan masukkan username dan password<br>untuk melanjutkan</p>

      <!-- Error Message -->
      <?php if ($error !== ""): ?>
      <div class="la-error" id="error-message">
        <div class="la-error-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"/><path d="M15 9l-6 6M9 9l6 6"/>
          </svg>
        </div>
        <span class="la-error-text"><?php echo htmlspecialchars($error); ?></span>
      </div>
      <?php endif; ?>

      <!-- Login Form -->
      <form method="POST" action="login-admin.php" id="login-form">
        <!-- Username -->
        <div class="la-form-group">
          <label class="la-label" for="input-username">Username</label>
          <div class="la-input-wrap">
            <span class="la-input-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
                <circle cx="12" cy="7" r="4"/>
              </svg>
            </span>
            <input type="text" id="input-username" name="username" placeholder="Masukkan username" autocomplete="username" required value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>" />
          </div>
        </div>

        <!-- Password -->
        <div class="la-form-group">
          <label class="la-label" for="input-password">Password</label>
          <div class="la-input-wrap">
            <span class="la-input-icon">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                <path d="M7 11V7a5 5 0 0110 0v4"/>
              </svg>
            </span>
            <input type="password" id="input-password" name="password" placeholder="Masukkan password" autocomplete="current-password" required />
            <button type="button" class="la-toggle-pw" id="toggle-password" aria-label="Toggle password visibility">
              <svg id="eye-open" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                <circle cx="12" cy="12" r="3"/>
              </svg>
              <svg id="eye-closed" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none;">
                <path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19m-6.72-1.07a3 3 0 11-4.24-4.24"/>
                <line x1="1" y1="1" x2="23" y2="23"/>
              </svg>
            </button>
          </div>
        </div>
        <!-- Login Button -->
        <button type="submit" class="la-btn-login" id="btn-login">
          <span class="la-btn-text">Login Admin</span>
          <svg class="la-btn-arrow" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
          <span class="la-spinner"></span>
        </button>
      </form>

      <!-- Divider -->
      <div class="la-divider">
        <span class="la-divider-line"></span>
        <span class="la-divider-text">atau</span>
        <span class="la-divider-line"></span>
      </div>

      <!-- Back Button -->
      <a href="index.html" class="la-btn-back" id="btn-pilih-akun">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
        Kembali ke Pilih Akun
      </a>
    </div>

    <!-- Akses Terbatas -->
    <div class="la-restricted" id="restricted-info">
      <div class="la-restricted-icon">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#c2410c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0110 0v4"/>
        </svg>
      </div>
      <div>
        <p class="la-restricted-title">Akses Terbatas</p>
        <p class="la-restricted-desc">Halaman ini hanya dapat diakses oleh admin yang memiliki izin resmi dari Apotek Farmaza 2.</p>
      </div>
    </div>

    <!-- WhatsApp Footer -->
    <div class="la-wa-footer">
      <div class="la-wa-icon">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="white">
          <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
        </svg>
      </div>
      <span class="la-wa-text">Butuh bantuan? Hubungi kami via WhatsApp <a href="https://wa.me/6285778901234" class="la-wa-link">0857-7890-1234</a></span>
    </div>

  </div>

  <!-- ===== JAVASCRIPT ===== -->

<script src="main.js"></script>
</body>
</html>
