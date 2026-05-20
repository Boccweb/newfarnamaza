// ===== DATA ARTIKEL FARMAZA =====
// Untuk menambah artikel: copy salah satu objek di bawah, ubah datanya.
// Untuk foto: taruh file gambar di folder UMKM, isi "gambar" dengan nama filenya.
// Kosongkan gambar: "" — akan tampil placeholder warna.

const artikelData = [
  {
    id: "gula-darah-tinggi",
    judul: "Kenali Gejala Gula Darah Tinggi dan Cara Mengontrolnya",
    kategori: "Kesehatan",
    katWarna: "#3b82f6",
    gambar: "", // contoh: "artikel-gula-darah.jpg"
    gambarPlaceholder: "🩸",
    gambarBg: "#e8f4fd",
    ringkasan: "Gula darah tinggi (hiperglikemia) terjadi ketika kadar glukosa dalam darah lebih tinggi dari normal.",
    tanggal: "13 Mei 2024",
    menit: 5,
    views: "1.2k",
    featured: true,
    isi: `Diabetes tipe 2 sering tidak disadari oleh penderitanya. Gejala awal seperti sering haus, sering buang air kecil, dan mudah lelah sering dianggap sepele.\n\nPenting untuk melakukan cek gula darah secara rutin, terutama jika Anda memiliki riwayat keluarga penderita diabetes. Di Apotek Farmaza 2, tersedia layanan cek gula darah dengan harga terjangkau.\n\nBeberapa langkah pencegahan yang bisa dilakukan antara lain menjaga pola makan, berolahraga rutin, dan menghindari konsumsi gula berlebih.`
  },
  {
    id: "vitamin-c",
    judul: "Cara Tepat Mengonsumsi Vitamin C",
    kategori: "Obat & Vitamin",
    katWarna: "#f59e0b",
    gambar: "",
    gambarPlaceholder: "💊",
    gambarBg: "#e0f7ef",
    ringkasan: "Vitamin C membantu menjaga daya tahan tubuh. Ketahui waktu terbaik dan dosis yang tepat.",
    tanggal: "10 Mei 2024",
    menit: 4,
    views: "890",
    featured: false,
    isi: `Vitamin C adalah antioksidan penting yang membantu menjaga sistem imun tubuh. Dosis harian yang direkomendasikan untuk orang dewasa adalah 75-90 mg.\n\nWaktu terbaik mengonsumsi Vitamin C adalah setelah makan untuk menghindari gangguan lambung. Hindari mengonsumsi lebih dari 2000 mg per hari karena dapat menyebabkan efek samping seperti diare.\n\nTersedia berbagai pilihan suplemen Vitamin C di Apotek Farmaza 2, dari tablet biasa hingga tablet effervescent.`
  },
  {
    id: "kebiasaan-pagi",
    judul: "5 Kebiasaan Pagi Hari untuk Hidup Lebih Sehat",
    kategori: "Gaya Hidup",
    katWarna: "#10b981",
    gambar: "",
    gambarPlaceholder: "💪",
    gambarBg: "#e0f8f8",
    ringkasan: "Mulai hari dengan kebiasaan baik untuk meningkatkan energi dan produktivitas sepanjang hari.",
    tanggal: "8 Mei 2024",
    menit: 6,
    views: "760",
    featured: false,
    isi: `Pagi hari adalah waktu terbaik untuk membangun kebiasaan sehat. Berikut 5 kebiasaan yang bisa Anda mulai:\n\n1. Minum segelas air putih setelah bangun tidur\n2. Olahraga ringan 15-30 menit\n3. Sarapan bergizi seimbang\n4. Konsumsi suplemen vitamin jika diperlukan\n5. Meditasi atau pernapasan dalam selama 5 menit\n\nKonsultasikan kebutuhan suplemen Anda dengan apoteker di Farmaza 2.`
  },
  {
    id: "demam-anak",
    judul: "Demam pada Anak: Kapan Harus ke Dokter?",
    kategori: "Ibu & Anak",
    katWarna: "#ec4899",
    gambar: "",
    gambarPlaceholder: "🤱",
    gambarBg: "#ffeef5",
    ringkasan: "Demam adalah respons alami tubuh. Namun, ada tanda-tanda tertentu yang perlu diwaspadai.",
    tanggal: "5 Mei 2024",
    menit: 4,
    views: "650",
    featured: false,
    isi: `Demam pada anak sering membuat orang tua khawatir. Demam umumnya tidak berbahaya jika di bawah 38.5°C dan anak masih aktif.\n\nSegera ke dokter jika:\n- Suhu di atas 39°C dan tidak turun dengan obat\n- Anak menangis terus atau tidak responsif\n- Demam berlangsung lebih dari 3 hari\n- Disertai ruam, kejang, atau sesak napas\n\nSediakan termometer dan obat penurun demam anak di rumah. Tersedia di Apotek Farmaza 2.`
  },
  {
    id: "minum-obat",
    judul: "Minum Obat dengan Air Hangat atau Dingin?",
    kategori: "Kesehatan",
    katWarna: "#3b82f6",
    gambar: "",
    gambarPlaceholder: "💧",
    gambarBg: "#e8f4fd",
    ringkasan: "Ketahui perbedaan dan dampaknya agar obat bekerja lebih optimal dan aman untuk tubuh.",
    tanggal: "2 Mei 2024",
    menit: 3,
    views: "540",
    featured: false,
    isi: `Banyak orang bertanya-tanya apakah ada perbedaan minum obat dengan air hangat atau dingin.\n\nJawabannya: umumnya gunakan air putih biasa (suhu ruang). Air hangat dapat mempercepat penyerapan beberapa obat, namun dapat merusak lapisan pelindung kapsul tertentu. Air dingin tidak dianjurkan karena dapat memperlambat penyerapan.\n\nYang terpenting: gunakan air putih biasa, minimal 200ml, dan jangan berbaring langsung setelah minum obat.`
  },
  {
    id: "kolesterol",
    judul: "Bahaya Kolesterol Tinggi dan Cara Alami Menurunkannya",
    kategori: "Kesehatan",
    katWarna: "#3b82f6",
    gambar: "",
    gambarPlaceholder: "❤️",
    gambarBg: "#fff8e0",
    ringkasan: "Kolesterol tinggi adalah silent killer. Pelajari cara alami yang efektif untuk menjaga kadarnya tetap normal.",
    tanggal: "28 Apr 2024",
    menit: 5,
    views: "420",
    featured: false,
    isi: `Kolesterol tinggi sering tidak menunjukkan gejala apapun, sehingga disebut silent killer. Kadar kolesterol normal adalah di bawah 200 mg/dL.\n\nCara alami menurunkan kolesterol:\n- Kurangi makanan berlemak jenuh\n- Perbanyak serat dari buah dan sayuran\n- Olahraga minimal 30 menit per hari\n- Hindari merokok dan alkohol\n\nLakukan cek kolesterol rutin di Apotek Farmaza 2. Tersedia layanan cek kolesterol dengan hasil cepat.`
  }
];
