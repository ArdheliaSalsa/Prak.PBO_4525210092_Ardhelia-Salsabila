# LAPORAN PRAKTIKUM PEMROGRAMAN BERBASIS OBJEK

| Informasi Praktikan | Keterangan |
| :--- | :--- |
| **Nama** | Ardhelia Sallsabila Al-Bahri |
| **NPM** | 4525210092 |
| **Kelas** | A |
| **Mata Kuliah** | Pemrograman Berbasis Objek (PBO) |
| **Pertemuan** | 7 - Relasi Objek dan UML Class Diagram |
| **Tanggal** | 15 Oktober 2026 |

---

## 1. Implementasi Java

### 1.1. File: `Buku.java`
**Penjelasan Kode:**
> Class `Buku` menerapkan **komposisi** terhadap class `Bab`. Bab ibarat halaman-halaman di dalam buku: tidak punya arti tanpa bukunya dan tidak pernah pindah ke buku lain. Tiga syarat komposisi dipenuhi: (1) tidak ada method atau constructor yang menerima objek `Bab` dari luar, karena `tambahBab(int nomor, String judulBab)` hanya menerima nomor dan judul; (2) objek `Bab` dibuat di dalam `Buku` lewat `new Bab(nomor, judulBab)`; (3) `getBab()` mengembalikan salinan yang tidak bisa diubah memakai `List.copyOf(this.bab)`. `Bab` adalah *nested class* `static final` dengan constructor `private`, sehingga hanya `Buku` yang bisa membuatnya. Constructor `Buku` menolak `jumlahEksemplar` negatif dengan `IllegalArgumentException`, dan `kurangiStok()` menolak pengurangan saat stok sudah 0.

**Bukti Eksekusi (Screenshot):**
* **Before** *(Kondisi awal / Kesalahan kompilasi)*: `getBab()` mengembalikan list internal apa adanya (`return this.bab;`), sehingga `buku.getBab().clear()` dari luar berhasil mengosongkan daftar bab.
<img width="402" height="957" alt="sebelum buku java 07" src="https://github.com/user-attachments/assets/78753258-10d1-4022-a40f-3655441d5d71" />


* **After** *(Kondisi akhir / Eksekusi berhasil)*: `getBab()` memakai `List.copyOf(...)`, sehingga percobaan mengubah dari luar ditolak.
<img width="472" height="947" alt="sesudah buku java 07" src="https://github.com/user-attachments/assets/aac1a67c-1150-48d4-a1bf-46255e0fbe93" />


### 1.2. File: `Jurusan.java`
**Penjelasan Kode:**
> Class `Jurusan` menerapkan **agregasi** terhadap `Mahasiswa`. Jurusan ibarat kelompok belajar: anggotanya datang dari luar, dan kalau ada yang keluar, orangnya tetap ada. `Mahasiswa` punya constructor `public` dan dibuat di luar `Jurusan`, lalu dimasukkan lewat `daftarkan(m)` (menolak `null` dengan `IllegalArgumentException`). `keluarkan(m)` hanya melepaskan referensi dari list, sedangkan objek `Mahasiswa` tetap hidup. `getMahasiswa()` mengembalikan salinan tak-berubah dengan `List.copyOf(...)`.

**Bukti Eksekusi (Screenshot):**
* **Before** *(Kondisi awal / Kesalahan kompilasi)*:
<img width="1098" height="1058" alt="sebelum jurusan java 07" src="https://github.com/user-attachments/assets/927bf158-9213-4584-9bb5-32396e3e2ced" />


* **After** *(Kondisi akhir / Eksekusi berhasil)*:
<img width="932" height="952" alt="sesudah jurusan java 07" src="https://github.com/user-attachments/assets/c0223a45-441f-4766-a737-32133265c3a8" />


### 1.3. File: `PerpustakaanService.java`
**Penjelasan Kode:**
> Class ini adalah kerangka lapisan layanan. `PerpustakaanService` menyimpan daftar `Buku` dalam `ArrayList<Buku>` sebagai **agregasi**, karena `Buku` punya siklus hidup mandiri dan tetap ada walau layanan dihapus. Method yang tersedia: `tambahKoleksi(Buku)` untuk menambah koleksi, `cariKoleksi(String nomorInduk)` untuk mencari buku berdasarkan nomor induk (mengembalikan `null` bila tidak ditemukan), serta `pinjam(...)` dan `kembalikan(...)` yang saat ini baru mencetak pesan. Aturan bisnis peminjaman akan disempurnakan di pertemuan berikutnya.

**Bukti Eksekusi (Screenshot):**
* **Before** *(Kondisi awal / Kesalahan kompilasi)*:
<img width="905" height="535" alt="sebelum perpustakaan java 07" src="https://github.com/user-attachments/assets/48a58cfe-762d-4e28-b8ca-c23158b21bb6" />


* **After** *(Kondisi akhir / Eksekusi berhasil)*: kompilasi berhasil tanpa error.
<img width="1216" height="972" alt="sesudah Perpus java 07" src="https://github.com/user-attachments/assets/fb1279f2-415f-4350-a513-9bbd3d0ce6a4" />

### 1.4. File: `Main.java`
**Penjelasan Kode:**
> `Main` menjalankan tiga bagian. Pertama, demo **komposisi**: membuat `Buku`, menambah tiga bab lewat `tambahBab`, lalu menampilkannya. Kedua, percobaan memanggil `buku.getBab().clear()`: bila `getBab()` benar mengembalikan salinan tak-berubah, `UnsupportedOperationException` tertangkap dan program mencetak "Ditolak". Ketiga, demo **agregasi**: membuat dua `Jurusan.Mahasiswa` di luar, mendaftarkannya ke `Jurusan`, lalu mengeluarkan Budi. Jumlah mahasiswa turun dari 2 menjadi 1, tetapi objek `budi` tetap ada.

**Bukti Eksekusi (Screenshot):**
* **Before** *(Kondisi awal / Kesalahan kompilasi)*:
<img width="986" height="843" alt="sebelum main java 07" src="https://github.com/user-attachments/assets/8bfea6ec-6dec-41ff-9a66-a8fce50e7429" />


* **After** *(Kondisi akhir / Eksekusi berhasil)*:
<img width="1171" height="1027" alt="sesudah Main java 07" src="https://github.com/user-attachments/assets/afd37517-4dd8-4d18-bd46-31ccba400f88" />


### Output
**Output Program:**
<img width="831" height="403" alt="Output main java 07" src="https://github.com/user-attachments/assets/852a604c-ea06-402c-abd0-ac43362defeb" />

---

## 2. Implementasi PHP

### 2.1. File: `relasi.php`
**Penjelasan Kode:**
> Berisi class `Bab`, `Buku`, `Mahasiswa`, dan `Jurusan`. Hubungannya sama dengan versi Java, tetapi PHP **tidak punya nested class**, jadi aturan "`Bab` hanya dibuat oleh `Buku`" dijaga lewat **konvensi**: `Bab` hanya dibuat di dalam `Buku::tambahBab()`. Data `Bab` memakai `private readonly` agar tidak bisa diubah. `getBab()` mengembalikan array *by-value* (salinan array), tetapi objek di dalamnya tetap berbagi referensi, sehingga `readonly` itulah yang melindungi isi `Bab`. `Buku` melempar `Error` jika `jumlahEksemplar` negatif. `Jurusan` menerapkan agregasi: `daftarkan()` menerima objek `Mahasiswa` dari luar, dan `keluarkan()` melepasnya dengan `array_search` + `unset` lalu `array_values` untuk merapikan indeks.

**Bukti Eksekusi (Screenshot):**
* **Before** *(Kondisi awal / Galat logika)*:
<img width="597" height="1070" alt="sebelum relas php 07-1" src="https://github.com/user-attachments/assets/183cd634-cac0-4fc1-9789-f751c89f6c8e" />
<img width="632" height="840" alt="sebelum relasi php 07-2" src="https://github.com/user-attachments/assets/4e5dc235-4d0e-4801-acee-b64fa8c80a4e" />


* **After** *(Kondisi akhir / Eksekusi berhasil)*: tidak ada galat sintaks.
<img width="587" height="1065" alt="sesudah relasi php  07-1" src="https://github.com/user-attachments/assets/a42325b0-4b2e-48f4-831e-342d03d7e2e8" />
<img width="523" height="955" alt="sesudah relasi php 07-2" src="https://github.com/user-attachments/assets/907abe3e-2e96-4937-96a1-d53e81ffd78d" />

### 2.2. File: `main.php`
**Penjelasan Kode:**
> Memuat `relasi.php` dengan `require_once`, lalu mendemonstrasikan komposisi (membuat `Buku` dan menambah tiga bab, lalu mencetaknya) dan agregasi (membuat dua `Mahasiswa`, mendaftarkannya ke `Jurusan` "TI", lalu mengeluarkan Budi). Output menunjukkan jumlah mahasiswa turun menjadi 1, tetapi Budi tetap ada sebagai objek.

**Bukti Eksekusi (Screenshot):**
* **Before** *(Kondisi awal / Galat logika)*:
<img width="623" height="506" alt="sebelum main php 07" src="https://github.com/user-attachments/assets/2647d1df-9b96-4760-9aec-289113782a73" />


* **After** *(Kondisi akhir / Eksekusi berhasil)*:
<img width="755" height="603" alt="sesudah main php 07" src="https://github.com/user-attachments/assets/11540415-feb4-47b2-9415-b42dc13dc6b3" />



### Output
**Output Program:**
<img width="1157" height="283" alt="output main php 07" src="https://github.com/user-attachments/assets/a4ad6b2a-31e7-4078-a61a-b3282e76ae7a" />

### uml
* **Before** *(Kondisi awal / Galat logika)*:
<img width="605" height="951" alt="sebelum uml 07" src="https://github.com/user-attachments/assets/ade58b84-2c1c-4871-8adc-40c27e0fa023" />

* **After** *(Kondisi akhir / Eksekusi berhasil)*:
<img width="590" height="1067" alt="sesudah uml 07" src="https://github.com/user-attachments/assets/45db5519-19b0-40ab-8c83-098b236d6155" />

### Output
* **Before** *(Kondisi awal / Galat logika)*:
<img width="760" height="437" alt="Output uml sebelum 07" src="https://github.com/user-attachments/assets/c1c0ff5b-721e-48eb-87c2-31f2e0af1547" />

* **After** *(Kondisi akhir / Eksekusi berhasil)*:
<img width="722" height="715" alt="output uml sesudah 07" src="https://github.com/user-attachments/assets/3dae0bb6-fd6a-41db-8d92-8e99cbfbb803" />


## 3. Kesimpulan
> **Komposisi** dan **agregasi** sama-sama berarti "memiliki", tetapi berbeda pada siapa yang membuat objek bagian dan apa yang terjadi setelah induknya hilang. Pada komposisi (`Buku` dan `Bab`), bagian dibuat di dalam induk, tidak bisa dibuat dari luar, dan tidak bermakna tanpa induknya; karena itu `getBab()` harus mengembalikan salinan tak-berubah. Pada agregasi (`Jurusan` dan `Mahasiswa`), bagian dibuat di luar lalu dimasukkan, dan tetap hidup walau dikeluarkan atau induknya dibubarkan. Di Java, komposisi dipaksa oleh compiler lewat nested class dan constructor `private`, sedangkan di PHP hanya dijaga lewat konvensi dan `readonly`. Keduanya dimodelkan di UML dengan simbol berlian hitam (`*--`) untuk komposisi dan berlian putih (`o--`) untuk agregasi.
