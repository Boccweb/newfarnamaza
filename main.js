// ===== FARMAZA MAIN JS =====

function initApp() {
  const page = document.body.dataset.page || 'index';

  // ---- Active Nav Link ----
  document.querySelectorAll('[data-page]').forEach(el => {
    el.classList.toggle('active', el.dataset.page === page);
  });

  // ---- Sticky Nav shadow ----
  const nav = document.getElementById('mainNav');
  if (nav) {
    window.addEventListener('scroll', () => {
      nav.classList.toggle('scrolled', window.scrollY > 10);
    });
  }

  // ---- Services Horizontal Scroll Arrows ----
  const track = document.getElementById('servicesTrack');
  const leftArrow = document.getElementById('scrollLeft');
  const rightArrow = document.getElementById('scrollRight');

  if (track && leftArrow && rightArrow) {
    const SCROLL_AMT = 180;
    leftArrow.addEventListener('click', () => track.scrollBy({ left: -SCROLL_AMT, behavior: 'smooth' }));
    rightArrow.addEventListener('click', () => track.scrollBy({ left: SCROLL_AMT, behavior: 'smooth' }));

    // Drag scroll (desktop)
    let isDown = false, startX, scrollLeft;
    track.addEventListener('mousedown', e => {
      isDown = true;
      track.style.cursor = 'grabbing';
      startX = e.pageX - track.offsetLeft;
      scrollLeft = track.scrollLeft;
    });
    track.addEventListener('mouseleave', () => { isDown = false; track.style.cursor = ''; });
    track.addEventListener('mouseup', () => { isDown = false; track.style.cursor = ''; });
    track.addEventListener('mousemove', e => {
      if (!isDown) return;
      e.preventDefault();
      const x = e.pageX - track.offsetLeft;
      track.scrollLeft = scrollLeft - (x - startX) * 1.5;
    });
  }

  // ---- Fade-up Intersection Observer ----
  const fadeEls = document.querySelectorAll('.fade-up');
  if (fadeEls.length > 0) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.12 });
    fadeEls.forEach((el, i) => {
      el.style.transitionDelay = (i * 0.07) + 's';
      observer.observe(el);
    });
  }

  // ---- Bottom Nav Active & Click ----
  document.querySelectorAll('.bottom-nav-item').forEach(item => {
    item.classList.toggle('active', item.dataset.page === page);
    item.addEventListener('click', () => {
      const href = item.dataset.href;
      if (href) window.location.href = href;
    });
  });

  // ---- WA Float tooltip & click ----
  const waBtn = document.querySelector('.wa-float-btn');
  const waTooltip = document.querySelector('.wa-tooltip');
  if (waBtn && waTooltip) {
    setTimeout(() => {
      waTooltip.style.opacity = '0';
      waTooltip.style.transition = 'opacity 0.4s';
    }, 4000);
    waBtn.addEventListener('click', () => {
      window.open('https://wa.me/6285179990832?text=Halo%20Apotek%20Farmaza%202%2C%20saya%20ingin%20konsultasi%20gratis', '_blank');
    });
  }

  // ---- Delivery Card click ----
  const orderBtn = document.querySelector('.btn-order');
  orderBtn?.addEventListener('click', () => {
    window.open('https://wa.me/6285179990832?text=Halo%20saya%20ingin%20order%20delivery%20obat', '_blank');
  });

  // ---- Filter tabs (produk page) ----
  document.querySelectorAll('.filter-tab').forEach(tab => {
    tab.addEventListener('click', () => {
      document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
      tab.classList.add('active');
    });
  });
}

// ===== LOAD NAVBAR LALU INIT =====
document.addEventListener('DOMContentLoaded', function () {
  const placeholder = document.getElementById('navbarPlaceholder');
  if (placeholder) {
    fetch('navbar.html')
      .then(r => r.text())
      .then(html => {
        placeholder.innerHTML = html;
        initApp();
      })
      .catch(() => initApp());
  } else {
    initApp();
  }
});
/* ===================================================
   layanan.js — Logika Halaman Layanan Apotek Farmaza 2
   =================================================== */

/* ===== TOAST ===== */
function showFotoToast(msg) {
  const t = document.getElementById('fotoToast');
  t.textContent = msg;
  t.classList.add('show');
  setTimeout(() => t.classList.remove('show'), 2500);
}

/* ===== UPLOAD FOTO UNIVERSAL =====
   Setiap elemen .foto-label / .mini-foto-label / .trust-banner-placeholder
   punya data-target="#id-input" dan data-preview="#id-img"
*/
function initFotoUpload() {
  /* Trigger input saat klik label */
  document.querySelectorAll('[data-foto-trigger]').forEach(trigger => {
    trigger.addEventListener('click', () => {
      const inputId = trigger.getAttribute('data-foto-trigger');
      document.getElementById(inputId).click();
    });
  });

  /* Saat file dipilih → tampilkan preview */
  document.querySelectorAll('[data-foto-input]').forEach(input => {
    input.addEventListener('change', function () {
      const previewId = this.getAttribute('data-foto-input');
      const wrapId    = this.getAttribute('data-foto-wrap');
      const file = this.files[0];
      if (!file) return;

      /* validasi tipe */
      if (!file.type.startsWith('image/')) {
        showFotoToast('❌ File harus berupa gambar (JPG/PNG/WebP)');
        return;
      }
      /* validasi ukuran maks 5 MB */
      if (file.size > 5 * 1024 * 1024) {
        showFotoToast('❌ Ukuran file maksimal 5 MB');
        return;
      }

      const reader = new FileReader();
      reader.onload = function (e) {
        const wrap = document.getElementById(wrapId);
        /* Cari atau buat elemen <img> di dalam wrap */
        let img = wrap.querySelector('img.foto-result');
        if (!img) {
          /* Hapus placeholder jika ada */
          const ph = wrap.querySelector('.photo-placeholder, .trust-banner-placeholder');
          if (ph) ph.style.display = 'none';
          img = document.createElement('img');
          img.className = 'foto-result';
          img.style.cssText = 'width:100%;height:100%;object-fit:cover;display:block;';
          wrap.prepend(img);
        }
        img.src = e.target.result;
        showFotoToast('✅ Foto berhasil diupload!');
      };
      reader.readAsDataURL(file);
    });
  });
}

/* ===== FADE-UP OBSERVER ===== */
function initFadeUp() {
  const els = document.querySelectorAll('.fade-up');
  if (!els.length) return;
  const obs = new IntersectionObserver((entries) => {
    entries.forEach(en => {
      if (en.isIntersecting) {
        en.target.classList.add('visible');
        obs.unobserve(en.target);
      }
    });
  }, { threshold: 0.1 });
  els.forEach(el => obs.observe(el));
}

/* ===== INIT ===== */
document.addEventListener('DOMContentLoaded', () => {
  initFotoUpload();
  initFadeUp();
});
    const toggleBtn = document.getElementById('toggle-password');
    const pwInput = document.getElementById('input-password');
    const eyeOpen = document.getElementById('eye-open');
    const eyeClosed = document.getElementById('eye-closed');

    toggleBtn.addEventListener('click', function () {
      if (pwInput.type === 'password') {
        pwInput.type = 'text';
        eyeOpen.style.display = 'none';
        eyeClosed.style.display = 'block';
      } else {
        pwInput.type = 'password';
        eyeOpen.style.display = 'block';
        eyeClosed.style.display = 'none';
      }
    });

    // Loading state on submit
    const form = document.getElementById('login-form');
    const loginBtn = document.getElementById('btn-login');

    form.addEventListener('submit', function () {
      loginBtn.classList.add('loading');
    });
    // ===== EDIT PROMO JS =====
// Paste di paling bawah main.js (atau file JS admin)

(function() {
  // Jalankan hanya di halaman edit-promo
  if (!document.getElementById('editPromoForm')) return;

  // --- Image preview (ganti gambar) ---
  const gantiInput = document.getElementById('gantiGambarInput');
  const currentImgWrap = document.getElementById('currentImgWrap');
  const newPreviewWrap = document.getElementById('newPreviewWrap');
  const newPreviewImg = document.getElementById('newPreviewImg');
  const outputPreviewImg = document.getElementById('outputPreviewImg');

  if (gantiInput) {
    gantiInput.addEventListener('change', function () {
      const file = this.files[0];
      if (!file) return;
      const reader = new FileReader();
      reader.onload = function (e) {
        // Tampilkan preview baru
        if (newPreviewImg) {
          newPreviewImg.src = e.target.result;
          newPreviewImg.style.display = 'block';
        }
        if (newPreviewWrap) newPreviewWrap.style.display = 'block';
        // Update output preview
        if (outputPreviewImg) {
          outputPreviewImg.src = e.target.result;
          outputPreviewImg.style.display = 'block';
        }
      };
      reader.readAsDataURL(file);
    });
  }

  // --- Live update judul di output preview ---
  const judulInput = document.getElementById('judulInput');
  const outputTitle = document.getElementById('outputTitle');
  if (judulInput && outputTitle) {
    judulInput.addEventListener('input', function () {
      outputTitle.textContent = this.value || 'Judul Promo';
    });
  }

  // --- Live update tanggal di output preview ---
  const tglMulaiInput  = document.getElementById('tglMulaiInput');
  const tglSelesaiInput = document.getElementById('tglSelesaiInput');
  const outputDate = document.getElementById('outputDate');
  function updateDate() {
    if (!outputDate) return;
    const m = tglMulaiInput?.value  ? formatTgl(tglMulaiInput.value)  : '?';
    const s = tglSelesaiInput?.value ? formatTgl(tglSelesaiInput.value) : '?';
    outputDate.textContent = m + ' - ' + s;
  }
  function formatTgl(d) {
    if (!d) return '-';
    const dt = new Date(d);
    const bln = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agt','Sep','Okt','Nov','Des'];
    return dt.getDate() + ' ' + bln[dt.getMonth()] + ' ' + dt.getFullYear();
  }
  tglMulaiInput?.addEventListener('change', updateDate);
  tglSelesaiInput?.addEventListener('change', updateDate);

  // --- Status toggle ---
  const statusBtn = document.getElementById('statusToggleBtn');
  const statusInput = document.getElementById('statusInput');
  if (statusBtn && statusInput) {
    statusBtn.addEventListener('click', function () {
      const isAktif = statusInput.value === 'aktif';
      statusInput.value = isAktif ? 'nonaktif' : 'aktif';
      statusBtn.innerHTML = isAktif
        ? `<span class="dot"></span> Nonaktif <i class='bx bx-chevron-down'></i>`
        : `<span class="dot"></span> Aktif <i class='bx bx-chevron-down'></i>`;
      statusBtn.className = 'status-btn' + (isAktif ? ' nonaktif' : '');
    });
  }

  // --- Lihat Preview (scroll ke output) ---
  document.getElementById('btnLihatPreview')?.addEventListener('click', function () {
    document.getElementById('previewSection')?.scrollIntoView({ behavior: 'smooth' });
  });

  // --- Konfirmasi hapus ---
  document.getElementById('btnHapusPromo')?.addEventListener('click', function () {
    if (confirm('Yakin ingin menghapus promo ini? Tindakan tidak bisa dibatalkan.')) {
      document.getElementById('deletePromoForm')?.submit();
    }
  });

  // --- Sidebar toggle (jika belum ada di main) ---
  window.toggleSidebar = window.toggleSidebar || function () {
    document.getElementById('sidebar')?.classList.toggle('active');
    document.getElementById('sidebarOverlay')?.classList.toggle('active');
  };
  window.toggleSubmenu = window.toggleSubmenu || function (el) {
    const parent = el.parentElement;
    parent.classList.toggle('open');
    const sub = parent.querySelector('.submenu');
    if (sub) sub.style.display = parent.classList.contains('open') ? 'flex' : 'none';
  };
})();