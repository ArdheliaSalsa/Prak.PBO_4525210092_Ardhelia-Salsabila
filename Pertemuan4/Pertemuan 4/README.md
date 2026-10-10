# LAPORAN PRAKTIKUM PEMROGRAMAN BERBASIS OBJEK

| Informasi Praktikan | Keterangan |
| :--- | :--- |
| **Nama** | Ardhelia Salsabila |
| **NPM** | 4525210092 |
| **Kelas** | A |
| **Mata Kuliah** | Pemrograman Berbasis Objek (PBO) |
| **Pertemuan** | 04 -  Pewarisan (Inheritance) |
| **Tanggal** | 10 oktober 2026 |

---

## 1. Deskripsi Praktikum

Praktikum ini membuat sistem perhitungan gaji untuk beberapa jenis pegawai, yaitu pegawai tetap, pegawai kontrak, dosen, dan pegawai harian. Program menerapkan **inheritance (pewarisan)** dengan kelas induk `Pegawai`, serta **polimorfisme** melalui pemanggilan method `hitungGaji()` dan `jenis()` pada objek yang berbeda. Implementasi tersedia dalam Java dan PHP.

## 2. Implementasi Program Java

### 2.1. `Pegawai.java`
### Before
<img width="824" height="907" alt="code sebelum pegawai java 04" src="https://github.com/user-attachments/assets/2ce6c9b9-a65f-4c4a-9264-f2416d423cdc" />

### After
<img width="884" height="922" alt="code sesudah Pegawai java 04" src="https://github.com/user-attachments/assets/bcf1bebf-0850-44f3-9f78-9b421c5a338b" />
Kelas `Pegawai` merupakan kelas induk abstrak untuk semua jenis pegawai. Atribut `nip`, `nama`, dan `gajiPokok` menggunakan modifier `protected` agar dapat diakses oleh kelas turunannya. Konstruktor memeriksa agar gaji pokok tidak negatif dan melempar `IllegalArgumentException` jika nilai tersebut tidak valid. Method `hitungGaji()` mengembalikan gaji pokok sebagai perhitungan dasar, sedangkan `jenis()` merupakan method abstrak yang wajib diimplementasikan oleh kelas turunan. Method `toString()` menyusun informasi NIP, jenis pegawai, nama, dan hasil perhitungan gaji dalam bentuk teks.

### 2.2. `PegawaiTetap.java`
### Before
<img width="1173" height="720" alt="code sebelum pegawaitetap java 04" src="https://github.com/user-attachments/assets/30e25f69-e528-4216-8706-757c64816c1f" />

### After
<img width="1151" height="899" alt="code sesudah PegawaiTetap java 04" src="https://github.com/user-attachments/assets/216d1939-6892-4797-88a4-b0050bfff890" />
Kelas `PegawaiTetap` mewarisi `Pegawai` dan menambahkan atribut `masaKerjaTahun`. Konstanta `TUNJANGAN_PER_TAHUN` bernilai 2% dan `TUNJANGAN_MAKSIMUM` bernilai 40%. Konstruktor memanggil `super(...)` untuk menginisialisasi data pada kelas induk. Method `hitungGaji()` mengambil gaji dasar melalui `super.hitungGaji()`, menghitung persentase tunjangan berdasarkan masa kerja dengan batas maksimum 40%, lalu menambahkan tunjangan ke gaji dasar. Method `jenis()` mengembalikan teks `TETAP`.

### 2.3. `PegawaiKontrak.java`
###  Before
<img width="1134" height="428" alt="code sebelum pegawaikontrak java 04" src="https://github.com/user-attachments/assets/67db637e-31e2-4eb9-8504-f0bc58994375" />

### After
<img width="1127" height="598" alt="code sesudah PegawaiKontrak java 04" src="https://github.com/user-attachments/assets/3c17b2cb-959d-465a-8220-1cf8acf65573" />
Kelas `PegawaiKontrak` merupakan turunan dari `Pegawai` dengan atribut tambahan `bulanKontrak`. Konstruktor meneruskan NIP, nama, dan gaji pokok ke konstruktor induk menggunakan `super(...)`. Kelas ini tidak meng-override `hitungGaji()`, sehingga perhitungan gajinya tetap menggunakan implementasi dasar dari `Pegawai` dan tidak memperoleh tunjangan masa kerja. Method `jenis()` mengembalikan `KONTRAK`, sedangkan `getBulanKontrak()` menyediakan akses ke lama kontrak.

### 2.4. `Dosen.java`
<img width="1042" height="620" alt="code sesudah Dosen java 04" src="https://github.com/user-attachments/assets/6a4a37fd-de8b-407a-bc3f-149c36d2afb9" />
Kelas `Dosen` merupakan turunan dari `Pegawai` yang memiliki atribut `sks` dan `tunjanganFungsional`. Konstruktor memanggil konstruktor induk untuk menyimpan data dasar pegawai. Method `hitungGaji()` di-override untuk menjumlahkan gaji dasar dengan honor SKS, yaitu `sks * tunjanganFungsional`. Method `jenis()` mengembalikan `DOSEN`. Getter disediakan untuk mengambil nilai SKS dan tunjangan fungsional.

### 2.5. `Pegawaiharian.java`
<img width="1213" height="707" alt="code sesudah pegawaiharian java 04" src="https://github.com/user-attachments/assets/03163b91-2fc3-4e6f-9088-a92172bcbb5c" />
Kelas `Pegawaiharian` merepresentasikan pegawai yang dibayar berdasarkan jumlah hari kerja. Atribut `hariKerja` menyimpan jumlah hari kerja. Konstruktor memanggil konstruktor induk dan menolak jumlah hari kerja negatif. Method `hitungGaji()` di-override untuk mengalikan upah per hari (yang disimpan sebagai `gajiPokok`) dengan jumlah hari kerja. Method `jenis()` mengembalikan `HARIAN`, dan `getHariKerja()` mengembalikan jumlah hari kerja.

### 2.6. `Main.java`
### Before
<img width="902" height="640" alt="code sebelum main java 04" src="https://github.com/user-attachments/assets/8d36facf-4163-4b58-9a75-929ad932ba95" />

### After
<img width="1232" height="544" alt="code sesudah Main java 04" src="https://github.com/user-attachments/assets/449f503e-8f1d-4552-9ce0-c48e0b5f6299" />
Kelas `Main` merupakan titik awal eksekusi program. Array `Pegawai[] daftar` menampung objek dari beberapa kelas turunan: `PegawaiTetap`, `PegawaiKontrak`, `Dosen`, dan `Pegawaiharian`. Perulangan pertama mencetak setiap objek; pemanggilan `toString()` menampilkan informasi pegawai dan memanggil `hitungGaji()` sesuai implementasi objek tersebut. Perulangan berikutnya menjumlahkan seluruh gaji dan menampilkan total beban gaji. Bagian akhir menampilkan pemeriksaan bahwa gaji Ani dengan gaji pokok Rp6.000.000 dan masa kerja 15 tahun mendapat tunjangan 30%, sehingga totalnya Rp7.800.000.

**Bukti screenshot:** tambahkan screenshot kode `Main.java` dan output program di sini.

## 3. Implementasi Program PHP

### 3.1. `pegawai.php`
### Before
<img width="378" height="929" alt="code sebelum pegawai php 04" src="https://github.com/user-attachments/assets/a03c22f6-6a48-4633-917c-82de8292bcbb" />

### After<img width="285" height="1041" alt="code sesudah pegawai php 04" src="https://github.com/user-attachments/assets/1edabe7f-fcbb-4c8b-8f61-2ad8eac67595" />
File `pegawai.php` berisi hierarki kelas PHP untuk perhitungan gaji. Kelas abstrak `Pegawai` menyimpan NIP, nama, dan gaji pokok melalui properti `protected readonly`. Konstruktor menolak gaji pokok negatif. Method `hitungGaji()` mengembalikan gaji pokok, sedangkan `jenis()` wajib diimplementasikan oleh kelas turunan. Method `__toString()` memformat data pegawai dan hasil gaji menjadi teks. Dalam file yang sama juga didefinisikan kelas-kelas turunan berikut.

- **`PegawaiTetap`**: menambahkan masa kerja; tunjangan sebesar 2% per tahun dengan maksimum 40%; menghitung gaji dasar ditambah tunjangan.
- **`PegawaiKontrak`**: menyimpan jumlah bulan kontrak dan menggunakan perhitungan gaji dasar dari kelas induk.
- **`Dosen`**: mewarisi `PegawaiTetap`, lalu menambahkan tunjangan fungsional pada hasil gaji pegawai tetap. Konstruktor memvalidasi agar tunjangan fungsional tidak negatif.
- **`PegawaiHarian`**: mengalikan upah per hari dengan jumlah hari kerja dan menolak jumlah hari kerja negatif.

**Bukti screenshot:** tambahkan screenshot kode `pegawai.php` di sini.

### 3.2. `main.php`
### Before
<img width="1102" height="489" alt="code sebelum main php 04" src="https://github.com/user-attachments/assets/64da5601-1a37-48b0-b236-09a76460ce20" />

### After<img width="849" height="483" alt="code sesudah main php 04" src="https://github.com/user-attachments/assets/6f53e28c-56a9-42b0-8ef8-efb0a223265f" />
File `main.php` mengaktifkan strict typing dan memuat definisi kelas dari `Pegawai.php` menggunakan `require_once`. Program membuat daftar objek pegawai tetap, pegawai kontrak, dosen, dan pegawai harian. Perulangan `foreach` menampilkan data setiap objek melalui `__toString()`. Fungsi `array_map()` memanggil `hitungGaji()` pada setiap pegawai, lalu `array_sum()` menjumlahkan seluruh gaji. Fungsi `printf()` dan `number_format()` digunakan untuk menampilkan total dalam format angka Indonesia.

**Bukti screenshot:** tambahkan screenshot kode `main.php` dan output program di sini.

## 4. Hasil Pengujian

Program menampilkan daftar pegawai beserta jenis dan gaji masing-masing, kemudian menampilkan total beban gaji. Setiap jenis pegawai menerapkan aturan perhitungan yang sesuai. Validasi juga mencegah penggunaan gaji pokok negatif, dan beberapa kelas menolak jumlah masa kerja atau hari kerja yang tidak valid.

<img width="1048" height="286" alt="Output Main php 04" src="https://github.com/user-attachments/assets/1c39fec7-8473-4484-a293-17a9ff53f6a7" />

<img width="956" height="265" alt="Output Main java 04" src="https://github.com/user-attachments/assets/3e66b1d1-9fb4-4600-8e5f-0f335a4e5b5b" />

## 5. Konsep PBO yang Diterapkan

1. **Abstraksi:** `Pegawai` menjadi kelas abstrak yang mendefinisikan struktur umum pegawai.
2. **Pewarisan:** kelas `PegawaiTetap`, `PegawaiKontrak`, `Dosen`, dan `Pegawaiharian`/`PegawaiHarian` mewarisi perilaku dari kelas induk.
3. **Polimorfisme:** objek dengan tipe turunan yang berbeda dapat disimpan dalam satu daftar bertipe `Pegawai`, lalu menjalankan implementasi `hitungGaji()` yang sesuai dengan kelasnya.
4. **Method overriding:** beberapa kelas mengganti implementasi `hitungGaji()` untuk menerapkan aturan gaji khusus.
5. **Validasi data:** konstruktor menolak nilai tertentu yang tidak valid, misalnya gaji pokok negatif.

## 6. Kesimpulan

Praktikum ini menunjukkan bagaimana kelas induk `Pegawai` dapat menyimpan atribut dan perilaku umum, sementara kelas turunannya menerapkan aturan perhitungan gaji yang berbeda. Dengan pewarisan dan polimorfisme, program dapat mengelola berbagai jenis pegawai melalui satu daftar tanpa perlu menulis alur pencetakan dan penjumlahan gaji secara terpisah untuk setiap jenis. Java dan PHP menerapkan konsep yang serupa dengan sintaks masing-masing.
