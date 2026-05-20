// ===== TENTANG KAMI JS =====

function renderTentangHero() {
  const d = tentangData;
  // Hero text
  document.getElementById('tentangLabel').textContent = d.heroLabel;
  document.getElementById('tentangJudul').textContent = d.heroJudul;
  document.getElementById('tentangSub').textContent = d.heroSubjudul;
  document.getElementById('tentangDesc').textContent = d.heroDeskripsi;

  // Foto apotek
  const imgWrap = document.getElementById('tentangImgWrap');
  if (d.fotoApotek) {
    imgWrap.innerHTML = `<img src="${d.fotoApotek}" alt="Apotek Farmaza 2" class="tentang-hero-img"
      onerror="this.outerHTML='<div class=tentang-hero-img-placeholder>🏥</div>'">`;
  } else {
    imgWrap.innerHTML = `<div class="tentang-hero-img-placeholder">🏥</div>`;
  }
}

function renderKeunggulan() {
  const wrap = document.getElementById('keunggulanGrid');
  if (!wrap) return;
  wrap.innerHTML = tentangData.keunggulan.map(k => `
    <div class="keunggulan-card">
      <div class="keunggulan-ikon" style="background:${k.ikonBg};">
        <i class="${k.icon}" style="color:${k.ikonWarna};"></i>
      </div>
      <div class="keunggulan-judul">${k.judul}</div>
      <div class="keunggulan-desc">${k.deskripsi}</div>
    </div>
  `).join('');
}

function renderStatistik() {
  const wrap = document.getElementById('statistikBanner');
  if (!wrap) return;
  wrap.innerHTML = tentangData.statistik.map(s => `
    <div class="stat-item">
      <div class="stat-icon-wrap"><i class="${s.icon}"></i></div>
      <div>
        <div class="stat-nilai">${s.nilai}</div>
        <div class="stat-label">${s.label}</div>
      </div>
    </div>
  `).join('');
}

function renderLayananSingkat() {
  const wrap = document.getElementById('layananSingkatGrid');
  if (!wrap) return;
  wrap.innerHTML = tentangData.layananSingkat.map(l => {
    const isExternal = l.linkWa.startsWith('http');
    return `
      <div class="layanan-singkat-card">
        <div class="ls-ikon" style="background:${l.ikonBg};">
          <i class="${l.icon}" style="color:${l.ikonWarna};"></i>
        </div>
        <div class="ls-judul">${l.judul}</div>
        <div class="ls-desc">${l.deskripsi}</div>
        <a href="${l.linkWa}" ${isExternal ? 'target="_blank"' : ''}
           class="ls-link" style="color:${l.linkWarna};">
          ${l.linkLabel} <i class="fas fa-arrow-right"></i>
        </a>
      </div>
    `;
  }).join('');
}

function renderKomitmen() {
  const wrap = document.getElementById('komitmenBanner');
  if (!wrap) return;
  const d = tentangData;

  const fotoHtml = d.fotoTim
    ? `<img
        src="${d.fotoTim}"
        alt="Tim Farmaza"
        onerror="this.outerHTML='<div class=komitmen-img-placeholder><i class=fas fa-users></i><span>Foto Tim</span></div>'"
      >`
    : `<div class="komitmen-img-placeholder">
        <i class="fas fa-users"></i>
        <span>Foto Tim</span>
       </div>`;

  wrap.innerHTML = `
    <div class="komitmen-info">
      <div class="komitmen-icon-wrap">
        <i class="fas fa-check-circle"></i>
      </div>
      <div class="komitmen-judul">${d.komitmenJudul}</div>
      <div class="komitmen-desc">${d.komitmenDeskripsi}</div>
      <div class="komitmen-subteks">${d.komitmenSubteks}</div>
    </div>
    <div class="komitmen-img-wrap">
      ${fotoHtml}
    </div>
  `;
}

document.addEventListener('DOMContentLoaded', () => {
  renderTentangHero();
  renderKeunggulan();
  renderStatistik();
  renderLayananSingkat();
  renderKomitmen();
});
