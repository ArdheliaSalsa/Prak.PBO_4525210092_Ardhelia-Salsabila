# LAPORAN PRAKTIKUM PEMROGRAMAN BERBASIS OBJEK

| Informasi Praktikan | Keterangan |
| :--- | :--- |
| **Nama** | Ardhelia Sallsabila Al-Bahri |
| **NPM** | 4525210092 |
| **Kelas** | A |
| **Mata Kuliah** | Pemrograman Berbasis Objek (PBO) |
| **Pertemuan** | 7 - Komposisi dan Agregasi (Sistem Perpustakaan) |
| **Tanggal** | [Tanggal Praktikum] |

---

## 1. Implementasi Java

### 1.1. File: `Buku.java`
**Penjelasan Kode:**
> Class `Buku` menerapkan **komposisi** terhadap class `Bab`. Bab ibarat halaman-halaman di dalam buku: tidak punya arti tanpa bukunya dan tidak pernah pindah ke buku lain. Tiga syarat komposisi dipenuhi: (1) tidak ada method atau constructor yang menerima objek `Bab` dari luar, karena `tambahBab(int nomor, String judulBab)` hanya menerima nomor dan judul; (2) objek `Bab` dibuat di dalam `Buku` lewat `new Bab(nomor, judulBab)`; (3) `getBab()` mengembalikan salinan yang tidak bisa diubah memakai `List.copyOf(this.bab)`. `Bab` adalah *nested class* `static final` dengan constructor `private`, sehingga hanya `Buku` yang bisa membuatnya. Constructor `Buku` menolak `jumlahEksemplar` negatif dengan `IllegalArgumentException`, dan `kurangiStok()` menolak pengurangan saat stok sudah 0.

**Bukti Eksekusi (Screenshot):**
* **Before** *(Kondisi awal / Kesalahan kompilasi)*: `getBab()` mengembalikan list internal apa adanya (`return this.bab;`), sehingga `buku.getBab().clear()` dari luar berhasil mengosongkan daftar bab.
![SS Before Buku.java](screenshot/before-Buku.png)

* **After** *(Kondisi akhir / Eksekusi berhasil)*: `getBab()` memakai `List.copyOf(...)`, sehingga percobaan mengubah dari luar ditolak.
![SS After Buku.java](screenshot/after-Buku.png)

### 1.2. File: `Jurusan.java`
**Penjelasan Kode:**
> Class `Jurusan` menerapkan **agregasi** terhadap `Mahasiswa`. Jurusan ibarat kelompok belajar: anggotanya datang dari luar, dan kalau ada yang keluar, orangnya tetap ada. `Mahasiswa` punya constructor `public` dan dibuat di luar `Jurusan`, lalu dimasukkan lewat `daftarkan(m)` (menolak `null` dengan `IllegalArgumentException`). `keluarkan(m)` hanya melepaskan referensi dari list, sedangkan objek `Mahasiswa` tetap hidup. `getMahasiswa()` mengembalikan salinan tak-berubah dengan `List.copyOf(...)`.

**Bukti Eksekusi (Screenshot):**
* **Before** *(Kondisi awal / Kesalahan kompilasi)*:
![SS Before Jurusan.java](screenshot/before-Jurusan.png)

* **After** *(Kondisi akhir / Eksekusi berhasil)*:
![SS After Jurusan.java](screenshot/after-Jurusan.png)

### 1.3. File: `PerpustakaanService.java`
**Penjelasan Kode:**
> Class ini adalah kerangka lapisan layanan. `PerpustakaanService` menyimpan daftar `Buku` dalam `ArrayList<Buku>` sebagai **agregasi**, karena `Buku` punya siklus hidup mandiri dan tetap ada walau layanan dihapus. Method yang tersedia: `tambahKoleksi(Buku)` untuk menambah koleksi, `cariKoleksi(String nomorInduk)` untuk mencari buku berdasarkan nomor induk (mengembalikan `null` bila tidak ditemukan), serta `pinjam(...)` dan `kembalikan(...)` yang saat ini baru mencetak pesan. Aturan bisnis peminjaman akan disempurnakan di pertemuan berikutnya.

**Bukti Eksekusi (Screenshot):**
* **Before** *(Kondisi awal / Kesalahan kompilasi)*:
![SS Before PerpustakaanService.java](screenshot/before-PerpustakaanService.png)

* **After** *(Kondisi akhir / Eksekusi berhasil)*: kompilasi berhasil tanpa error.
![SS After PerpustakaanService.java](screenshot/after-PerpustakaanService.png)

### 1.4. File: `Main.java`
**Penjelasan Kode:**
> `Main` menjalankan tiga bagian. Pertama, demo **komposisi**: membuat `Buku`, menambah tiga bab lewat `tambahBab`, lalu menampilkannya. Kedua, percobaan memanggil `buku.getBab().clear()`: bila `getBab()` benar mengembalikan salinan tak-berubah, `UnsupportedOperationException` tertangkap dan program mencetak "Ditolak". Ketiga, demo **agregasi**: membuat dua `Jurusan.Mahasiswa` di luar, mendaftarkannya ke `Jurusan`, lalu mengeluarkan Budi. Jumlah mahasiswa turun dari 2 menjadi 1, tetapi objek `budi` tetap ada.

**Bukti Eksekusi (Screenshot):**
* **Before** *(Kondisi awal / Kesalahan kompilasi)*:
![SS Before Main.java](screenshot/before-Main.png)

* **After** *(Kondisi akhir / Eksekusi berhasil)*:
![SS After Main.java](screenshot/after-Main.png)

### Output
**Output Program:**
![Output Java](screenshot/output-java.png)

---

## 2. Implementasi PHP

### 2.1. File: `relasi.php`
**Penjelasan Kode:**
> Berisi class `Bab`, `Buku`, `Mahasiswa`, dan `Jurusan`. Hubungannya sama dengan versi Java, tetapi PHP **tidak punya nested class**, jadi aturan "`Bab` hanya dibuat oleh `Buku`" dijaga lewat **konvensi**: `Bab` hanya dibuat di dalam `Buku::tambahBab()`. Data `Bab` memakai `private readonly` agar tidak bisa diubah. `getBab()` mengembalikan array *by-value* (salinan array), tetapi objek di dalamnya tetap berbagi referensi, sehingga `readonly` itulah yang melindungi isi `Bab`. `Buku` melempar `Error` jika `jumlahEksemplar` negatif. `Jurusan` menerapkan agregasi: `daftarkan()` menerima objek `Mahasiswa` dari luar, dan `keluarkan()` melepasnya dengan `array_search` + `unset` lalu `array_values` untuk merapikan indeks.

**Bukti Eksekusi (Screenshot):**
* **Before** *(Kondisi awal / Galat logika)*:
![SS Before relasi.php](screenshot/before-relasi.png)

* **After** *(Kondisi akhir / Eksekusi berhasil)*: tidak ada galat sintaks.
![SS After relasi.php](screenshot/after-relasi.png)

### 2.2. File: `main.php`
**Penjelasan Kode:**
> Memuat `relasi.php` dengan `require_once`, lalu mendemonstrasikan komposisi (membuat `Buku` dan menambah tiga bab, lalu mencetaknya) dan agregasi (membuat dua `Mahasiswa`, mendaftarkannya ke `Jurusan` "TI", lalu mengeluarkan Budi). Output menunjukkan jumlah mahasiswa turun menjadi 1, tetapi Budi tetap ada sebagai objek.

**Bukti Eksekusi (Screenshot):**
* **Before** *(Kondisi awal / Galat logika)*:
![SS Before main.php](screenshot/before-main-php.png)

* **After** *(Kondisi akhir / Eksekusi berhasil)*:
![SS After main.php](screenshot/after-main-php.png)

### Output
**Output Program:**
![Output PHP](screenshot/output-php.png)

---

## 3. Kesimpulan
> **Komposisi** dan **agregasi** sama-sama berarti "memiliki", tetapi berbeda pada siapa yang membuat objek bagian dan apa yang terjadi setelah induknya hilang. Pada komposisi (`Buku` dan `Bab`), bagian dibuat di dalam induk, tidak bisa dibuat dari luar, dan tidak bermakna tanpa induknya; karena itu `getBab()` harus mengembalikan salinan tak-berubah. Pada agregasi (`Jurusan` dan `Mahasiswa`), bagian dibuat di luar lalu dimasukkan, dan tetap hidup walau dikeluarkan atau induknya dibubarkan. Di Java, komposisi dipaksa oleh compiler lewat nested class dan constructor `private`, sedangkan di PHP hanya dijaga lewat konvensi dan `readonly`. Keduanya dimodelkan di UML dengan simbol berlian hitam (`*--`) untuk komposisi dan berlian putih (`o--`) untuk agregasi.
