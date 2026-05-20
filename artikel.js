// ===== ARTIKEL PAGE JS =====

let artikelFiltered = [...artikelData];
let kategoriAktif = 'Semua';

const kategoriList = [
  { label: 'Semua',        icon: '⊞',  emoji: true },
  { label: 'Kesehatan',    icon: '🏥', emoji: true },
  { label: 'Obat & Vitamin', icon: '💊', emoji: true },
  { label: 'Gaya Hidup',   icon: '🏃', emoji: true },
  { label: 'Ibu & Anak',   icon: '👶', emoji: true },
  { label: 'Lainnya',      icon: '⋯',  emoji: false },
];

// Format harga rupiah
function fmtNum(n) {
  if (typeof n === 'string') return n;
  return n >= 1000 ? (n/1000).toFixed(1).replace('.0','') + 'k' : n;
}

// Render kategori tabs
function renderKatTabs() {
  const wrap = document.getElementById('katScroll');
  if (!wrap) return;
  wrap.innerHTML = kategoriList.map(k => `
    <div class="kat-tab ${k.label === kategoriAktif ? 'active' : ''}" data-kat="${k.label}">
      <div class="kat-icon-wrap">${k.emoji ? k.icon : `<i class="fas fa-ellipsis-h"></i>`}</div>
      <span class="kat-lbl">${k.label}</span>
    </div>
  `).join('');
  wrap.querySelectorAll('.kat-tab').forEach(tab => {
    tab.addEventListener('click', () => {
      kategoriAktif = tab.dataset.kat;
      filterArtikel();
      renderKatTabs();
    });
  });
}

// Filter artikel
function filterArtikel(query = '') {
  const q = query.toLowerCase().trim();
  artikelFiltered = artikelData.filter(a => {
    const matchKat = kategoriAktif === 'Semua' ||
      a.kategori === kategoriAktif ||
      (kategoriAktif === 'Lainnya' && !['Kesehatan','Obat & Vitamin','Gaya Hidup','Ibu & Anak'].includes(a.kategori));
    const matchQ = !q || a.judul.toLowerCase().includes(q) || a.ringkasan.toLowerCase().includes(q);
    return matchKat && matchQ;
  });
  renderArtikel();
}

// Buat elemen gambar atau placeholder
function imgOrPlaceholder(a, cls, phCls) {
  if (a.gambar) {
    return `<img src="${a.gambar}" alt="${a.judul}" class="${cls}" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
            <div class="${phCls}" style="background:${a.gambarBg};display:none;">${a.gambarPlaceholder}</div>`;
  }
  return `<div class="${phCls}" style="background:${a.gambarBg};">${a.gambarPlaceholder}</div>`;
}

// Render semua artikel
function renderArtikel() {
  const featuredWrap = document.getElementById('featuredArtikel');
  const listWrap = document.getElementById('listArtikel');
  if (!featuredWrap || !listWrap) return;

  if (artikelFiltered.length === 0) {
    featuredWrap.innerHTML = '';
    listWrap.innerHTML = `<div class="no-result"><i class="fas fa-search"></i><p>Artikel tidak ditemukan</p></div>`;
    return;
  }

  // Featured: artikel pertama
  const f = artikelFiltered[0];
  featuredWrap.innerHTML = `
    <div class="artikel-featured" onclick="bukaArtikel('${f.id}')">
      ${imgOrPlaceholder(f, 'featured-img', 'featured-img-placeholder')}
      <div class="featured-body">
        <span class="featured-kat" style="background:${f.katWarna}22;color:${f.katWarna}">${f.kategori}</span>
        <div class="featured-judul">${f.judul}</div>
        <div class="featured-ringkasan">${f.ringkasan}</div>
        <div class="artikel-meta">
          <i class="far fa-calendar-alt"></i> ${f.tanggal}
          <i class="far fa-clock"></i> ${f.menit} menit baca
          <span class="meta-views"><i class="far fa-eye"></i> ${fmtNum(f.views)}</span>
        </div>
      </div>
    </div>`;

  // List: artikel sisanya
  const rest = artikelFiltered.slice(1);
  if (rest.length === 0) {
    listWrap.innerHTML = '';
    return;
  }
  listWrap.innerHTML = rest.map(a => `
    <div class="artikel-list-card" onclick="bukaArtikel('${a.id}')">
      ${imgOrPlaceholder(a, 'list-img', 'list-img-placeholder')}
      <div class="list-body">
        <span class="list-kat" style="background:${a.katWarna}22;color:${a.katWarna}">${a.kategori}</span>
        <div class="list-judul">${a.judul}</div>
        <div class="list-ringkasan">${a.ringkasan}</div>
        <div class="artikel-meta">
          <i class="far fa-calendar-alt"></i> ${a.tanggal} &nbsp;
          <i class="far fa-clock"></i> ${a.menit} mnt
          <span class="meta-views"><i class="far fa-eye"></i> ${fmtNum(a.views)}</span>
        </div>
      </div>
    </div>`).join('');
}

// Buka modal detail artikel
function bukaArtikel(id) {
  const a = artikelData.find(x => x.id === id);
  if (!a) return;
  const modal = document.getElementById('artModal');
  const body  = document.getElementById('artModalBody');
  body.innerHTML = `
    <div class="art-modal-handle"></div>
    <div class="art-modal-header">
      <div class="art-modal-back" onclick="tutupArtikel()"><i class="fas fa-arrow-left"></i></div>
      <span style="font-size:13px;font-weight:700;color:var(--navy)">Detail Artikel</span>
    </div>
    ${a.gambar
      ? `<img src="${a.gambar}" alt="${a.judul}" class="art-modal-img">`
      : `<div class="art-modal-img-placeholder" style="background:${a.gambarBg}">${a.gambarPlaceholder}</div>`}
    <div class="art-modal-body">
      <span class="art-modal-kat" style="background:${a.katWarna}22;color:${a.katWarna}">${a.kategori}</span>
      <div class="art-modal-judul">${a.judul}</div>
      <div class="art-modal-meta">
        <span><i class="far fa-calendar-alt"></i> ${a.tanggal}</span>
        <span><i class="far fa-clock"></i> ${a.menit} menit baca</span>
        <span><i class="far fa-eye"></i> ${fmtNum(a.views)} dilihat</span>
      </div>
      <div class="art-modal-isi">${a.isi}</div>
      <a href="https://wa.me/6285179990832?text=Halo%2C%20saya%20baca%20artikel%20${encodeURIComponent(a.judul)}%20dan%20ingin%20konsultasi"
         target="_blank" class="art-modal-wa">
        <i class="fab fa-whatsapp"></i> Konsultasi Sekarang
      </a>
    </div>`;
  modal.classList.add('open');
  document.body.style.overflow = 'hidden';
}

function tutupArtikel() {
  document.getElementById('artModal').classList.remove('open');
  document.body.style.overflow = '';
}

// Init
document.addEventListener('DOMContentLoaded', () => {
  renderKatTabs();
  renderArtikel();

  // Search
  const searchInput = document.getElementById('artikelSearch');
  if (searchInput) {
    searchInput.addEventListener('input', e => filterArtikel(e.target.value));
  }

  // Tutup modal klik overlay
  document.getElementById('artModal')?.addEventListener('click', e => {
    if (e.target === document.getElementById('artModal')) tutupArtikel();
  });
});
