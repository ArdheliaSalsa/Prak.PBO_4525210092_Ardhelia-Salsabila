# LAPORAN PRAKTIKUM PEMROGRAMAN BERBASIS OBJEK

| Informasi Praktikan | Keterangan |
| :--- | :--- |
| **Nama** | Ardhelia Salsabila |
| **NPM** | 4525210092 |
| **Kelas** | A |
| **Mata Kuliah** | Pemrograman Berbasis Objek (PBO) |
| **Pertemuan** | 03 - Constructor, Anggota Statis, dan Konstanta |
| **Tanggal** | [Isi tanggal praktikum] |

---

## 1. Deskripsi Praktikum

Praktikum ini menerapkan invariant, constructor yang saling mendelegasikan, anggota statis, dan konstanta bernama. Implementasi kelas rekening bank tersedia dalam Java dan PHP untuk membandingkan penerapan konsep PBO pada kedua bahasa.

## 2. Implementasi Java

### 2.1. `RekeningBank.java`

Kelas `RekeningBank` menyimpan nomor rekening, pemilik, dan saldo. Nomor rekening dibuat tetap setelah objek dibuat. Constructor ringkas mendelegasikan proses ke constructor lengkap, sehingga validasi dilakukan pada satu tempat. Kelas juga menyediakan operasi setor, tarik, pemotongan biaya administrasi, penghitung jumlah rekening, dan perhitungan bunga.

Konstanta yang digunakan meliputi bunga tahunan 2,5%, biaya administrasi Rp5.000, dan batas penarikan sekali transaksi Rp5.000.000. Saldo tidak boleh negatif dan nominal setor maupun tarik harus positif.

**Bukti screenshot:** tambahkan screenshot kode dan hasil eksekusi di bagian ini.

### 2.2. `Main.java`

File utama menguji pembuatan beberapa rekening, jumlah rekening yang berhasil dibuat, penyetoran, penarikan yang melampaui batas, dan pemotongan biaya administrasi.

**Bukti screenshot:** tambahkan screenshot kode dan hasil eksekusi di bagian ini.

## 3. Implementasi PHP

### 3.1. `RekeningBank.php`

Kelas ini menerapkan konsep yang sama dengan versi Java menggunakan sintaks PHP, termasuk validasi saldo, konstanta, properti statis, dan constructor dengan parameter default atau named constructor sesuai implementasi.

**Bukti screenshot:** tambahkan screenshot kode dan hasil eksekusi di bagian ini.

### 3.2. `main.php`

File utama digunakan untuk menguji pembuatan rekening dan operasi rekening melalui kelas PHP.

**Bukti screenshot:** tambahkan screenshot kode dan hasil eksekusi di bagian ini.

## 4. Konsep yang Dipelajari

- **Constructor berdelegasi:** menghindari pengulangan validasi dengan memanggil constructor lengkap.
- **Anggota statis:** menyimpan informasi yang dimiliki bersama oleh kelas, seperti jumlah rekening.
- **Konstanta bernama:** memberi nama pada nilai tetap agar kode lebih mudah dipahami.
- **Invariant:** menjaga saldo agar tidak negatif dan memastikan operasi menggunakan nominal yang valid.

## 5. Kesimpulan

Constructor berdelegasi membantu mengurangi duplikasi kode, anggota statis dapat menyimpan data bersama pada tingkat kelas, dan konstanta bernama membuat aturan program lebih jelas. Validasi menjaga agar operasi rekening tidak melanggar invariant.
