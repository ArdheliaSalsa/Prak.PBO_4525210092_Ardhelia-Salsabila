# LAPORAN PRAKTIKUM PEMROGRAMAN BERBASIS OBJEK

| Informasi Praktikan | Keterangan |
| :--- | :--- |
| **Nama** | Ardhelia Salsabila |
| **NPM** | 4525210092 |
| **Kelas** | A |
| **Mata Kuliah** | Pemrograman Berbasis Objek (PBO) |
| **Pertemuan** | 05 - Polimorfisme |
| **Tanggal** | [Isi tanggal praktikum] |

---

## 1. Deskripsi Praktikum

Praktikum ini membahas **polimorfisme** melalui contoh bangun datar. Kelas induk `BangunDatar` menetapkan kontrak berupa method `luas()` dan `keliling()`, sedangkan kelas turunannya memberikan implementasi masing-masing.

## 2. Implementasi Java

### 2.1. `BangunDatar.java`

`BangunDatar` merupakan kelas abstrak yang menyimpan nama bangun dan mendeklarasikan method abstrak `luas()` serta `keliling()`. Method `toString()` menampilkan informasi bangun dengan memanggil implementasi method dari objek turunannya.

**Bukti screenshot:** tambahkan screenshot kode dan hasil eksekusi di bagian ini.

### 2.2. Kelas Bangun Datar

- `Lingkaran.java`: menghitung luas dan keliling berdasarkan jari-jari.
- `Persegi.java`: menghitung luas dan keliling berdasarkan panjang sisi.
- `Segitiga.java`: menghitung luas dan keliling berdasarkan data segitiga yang diberikan.
- `Trapesium.java`: menyediakan perhitungan untuk bangun trapesium.

Setiap kelas mengimplementasikan perilaku yang diwajibkan oleh kelas induk.

**Bukti screenshot:** tambahkan screenshot masing-masing kelas di bagian ini.

### 2.3. `Main.java`

Program utama menyimpan berbagai objek turunan ke dalam array bertipe `BangunDatar[]`. Perulangan dapat memanggil `luas()` pada setiap objek tanpa perlu memeriksa tipe objek satu per satu. Program juga menghitung total luas seluruh bangun.

**Bukti screenshot:** tambahkan screenshot kode dan hasil eksekusi di bagian ini.

### 2.4. `AntiPattern.java`

File ini menunjukkan pendekatan yang tidak menggunakan polimorfisme. Method `hitungLuas(Object bangun)` memeriksa jenis objek dengan rangkaian `if/else if`. Ketika tipe bangun baru ditambahkan, method tersebut perlu diubah sehingga berisiko menambah kompleksitas dan menyebabkan cabang terlewat.

**Bukti screenshot:** tambahkan screenshot kode dan hasil eksekusi di bagian ini.

## 3. Implementasi PHP

### 3.1. `BangunDatar.php` dan `main.php`

File PHP digunakan untuk menunjukkan penerapan perhitungan bangun datar dan pemanggilan perilaku objek dalam versi PHP.

**Bukti screenshot:** tambahkan screenshot kode dan hasil eksekusi di bagian ini.

## 4. Penelusuran

Untuk menambahkan bangun datar baru pada versi polimorfik, umumnya dibuat kelas turunan baru yang mengimplementasikan kontrak `BangunDatar`, kemudian objeknya ditambahkan ke daftar. Pada versi antarpola, selain menambahkan data bangun, method pemeriksaan tipe seperti `hitungLuas()` juga perlu disunting.

Catat jumlah baris yang disunting secara aktual pada file `penelusuran.md` setelah membandingkan kedua versi.

## 5. Kesimpulan

Polimorfisme memungkinkan objek dari kelas turunan diperlakukan melalui tipe induk yang sama, sementara setiap objek menjalankan implementasi method sesuai jenisnya. Pendekatan ini membuat penambahan jenis bangun lebih mudah dipelihara dibandingkan pemeriksaan tipe secara manual.
