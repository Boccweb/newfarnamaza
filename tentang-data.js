// ===== DATA TENTANG KAMI =====
// Ganti gambar dengan nama file JPG/PNG di folder UMKM

const tentangData = {
  // Foto apotek di hero (kanan atas)
  // Ukuran ideal: 500x380px
  fotoApotek: "", // contoh: "foto-apotek.jpg"

  // Teks hero
  heroLabel: "Tentang Kami",
  heroJudul: "Apotek Farmaza 2",
  heroSubjudul: "Melayani kesehatan masyarakat dengan sepenuh hati sejak hari pertama",
  heroDeskripsi: "Kami berkomitmen memberikan pelayanan terbaik dengan obat-obatan berkualitas tinggi yang telah tersertifikasi serta didukung oleh tenaga farmasi profesional.",

  // Keunggulan (grid 4 kolom)
  keunggulan: [
    {
      icon: "fas fa-shield-alt",
      ikonBg: "#e0eeff",
      ikonWarna: "#3b6fd4",
      judul: "Kualitas Terjamin",
      deskripsi: "Semua produk kami berasal dari distributor resmi dan telah tersertifikasi BPOM."
    },
    {
      icon: "fas fa-hand-holding-heart",
      ikonBg: "#e0f7ef",
      ikonWarna: "#27ae60",
      judul: "Pelayanan Ramah",
      deskripsi: "Tim kami siap melayani Anda dengan senyum dan penuh ketulusan setiap hari."
    },
    {
      icon: "fas fa-tag",
      ikonBg: "#fff8e0",
      ikonWarna: "#e09010",
      judul: "Harga Terjangkau",
      deskripsi: "Kami menghadirkan harga yang kompetitif tanpa mengorbankan kualitas produk."
    },
    {
      icon: "fas fa-bolt",
      ikonBg: "#f0e8ff",
      ikonWarna: "#8e44ad",
      judul: "Layanan Cepat",
      deskripsi: "Proses pelayanan dan pengantaran cepat untuk kenyamanan Anda."
    }
  ],

  // Statistik (banner navy)
  statistik: [
    { icon: "far fa-clock",     nilai: "17+",   label: "Jam Operasional/Hari" },
    { icon: "fab fa-whatsapp",  nilai: "24/7",  label: "Konsultasi WA\nSiap Membantu" },
    { icon: "fas fa-shield-alt",nilai: "100%",  label: "Produk Berkualitas\nAman & Terpercaya" },
    { icon: "fas fa-motorcycle",nilai: "Cepat", label: "Delivery Cepat\nSampai ke Rumah" }
  ],

  // Layanan singkat (grid 4)
  layananSingkat: [
    {
      icon: "fas fa-comment-medical",
      ikonBg: "#e0eeff", ikonWarna: "#3b6fd4",
      judul: "Konsultasi Obat Gratis",
      deskripsi: "Konsultasi langsung dengan tenaga farmasi seputar obat dan penggunaannya tanpa biaya apapun.",
      linkLabel: "Konsultasi Sekarang",
      linkWarna: "#3b6fd4",
      linkWa: "https://wa.me/6285179990832?text=Halo%2C%20saya%20mau%20konsultasi%20obat"
    },
    {
      icon: "fas fa-flask",
      ikonBg: "#e0f7ef", ikonWarna: "#27ae60",
      judul: "Cek Kesehatan",
      deskripsi: "Layanan cek gula darah, kolesterol, dan asam urat. Bonus cek tekanan darah (tensi) gratis!",
      linkLabel: "Daftar Sekarang",
      linkWarna: "#27ae60",
      linkWa: "https://wa.me/6285179990832?text=Halo%2C%20saya%20mau%20cek%20kesehatan"
    },
    {
      icon: "fas fa-motorcycle",
      ikonBg: "#f0e8ff", ikonWarna: "#8e44ad",
      judul: "Layanan Antar",
      deskripsi: "Antar obat sampai ke rumah Anda dengan aman dan tepat waktu.",
      linkLabel: "Pesan Sekarang",
      linkWarna: "#8e44ad",
      linkWa: "https://wa.me/6285179990832?text=Halo%2C%20saya%20mau%20order%20delivery"
    },
    {
      icon: "fas fa-baby",
      ikonBg: "#ffeef5", ikonWarna: "#e0457a",
      judul: "Perlengkapan Bayi",
      deskripsi: "Produk bayi aman, berkualitas, dan terpercaya.",
      linkLabel: "Lihat Produk",
      linkWarna: "#e0457a",
      linkWa: "produk.html"
    }
  ],

  // Komitmen banner bawah
  // Ukuran ideal foto tim: 300x200px
  fotoTim: "hg (1).jpg", // contoh: "foto-tim.jpg"
  komitmenJudul: "Komitmen Kami",
  komitmenDeskripsi: "Kepuasan dan kesehatan Anda adalah prioritas utama kami.",
  komitmenSubteks: "Kami siap melayani Anda dengan sepenuh hati."
};
