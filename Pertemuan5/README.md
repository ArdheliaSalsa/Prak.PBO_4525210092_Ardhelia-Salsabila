# LAPORAN PRAKTIKUM PEMROGRAMAN BERBASIS OBJEK

| Informasi Praktikan | Keterangan |
| :--- | :--- |
| **Nama** | Ardhelia Salsabila |
| **NPM** | 4525210092 |
| **Kelas** | A |
| **Mata Kuliah** | Pemrograman Berbasis Objek (PBO) |
| **Pertemuan** | 05 - Polimorfisme |
| **Tanggal** | 10 Oktober 2026 |

---

## 1. Deskripsi Praktikum

Praktikum ini membahas **polimorfisme** melalui contoh bangun datar. Kelas induk `BangunDatar` menetapkan kontrak berupa method `luas()` dan `keliling()`, sedangkan kelas turunannya memberikan implementasi masing-masing.

## 2. Implementasi Java

### 2.1. `BangunDatar.java`
### Before
<img width="884" height="638" alt="Code sebelum BangunDatar java 05" src="https://github.com/user-attachments/assets/d988847a-1952-4d19-b0ad-22cecdfe6baf" />

### After
<img width="881" height="590" alt="code sesudah BangunDatar java 05" src="https://github.com/user-attachments/assets/a9bc24bb-ee7b-42b0-9470-c572265bbf76" />
`BangunDatar` merupakan kelas abstrak yang menyimpan nama bangun dan mendeklarasikan method abstrak `luas()` serta `keliling()`. Method `toString()` menampilkan informasi bangun dengan memanggil implementasi method dari objek turunannya.

### 2.3. `Main.java`
### Before 
<img width="1162" height="830" alt="code sebelum main java 05" src="https://github.com/user-attachments/assets/4bfc89b7-ae27-4c51-aead-c3609f63246c" />

###  After
<img width="1074" height="1006" alt="code sesudah Main java 05" src="https://github.com/user-attachments/assets/51db02b3-bdab-45aa-9c98-9b4935b205af" />
Program utama menyimpan berbagai objek turunan ke dalam array bertipe `BangunDatar[]`. Perulangan dapat memanggil `luas()` pada setiap objek tanpa perlu memeriksa tipe objek satu per satu. Program juga menghitung total luas seluruh bangun.

### 2.4. `AntiPattern.java`
### Before
<img width="751" height="997" alt="Code  sebelum AntiPattern java 05" src="https://github.com/user-attachments/assets/f36dbe38-ab12-42f2-8478-83e1694dbe80" />

### After
<img width="798" height="1003" alt="Code sesudah AntiPattern java 05" src="https://github.com/user-attachments/assets/77e8399f-7a44-4790-9c18-ae4716692464" />
File ini menunjukkan pendekatan yang tidak menggunakan polimorfisme. Method `hitungLuas(Object bangun)` memeriksa jenis objek dengan rangkaian `if/else if`. Ketika tipe bangun baru ditambahkan, method tersebut perlu diubah sehingga berisiko menambah kompleksitas dan menyebabkan cabang terlewat.

## Persegi
### Before
<img width="800" height="378" alt="code sebelum persegi java 05" src="https://github.com/user-attachments/assets/884d24e1-8cf0-4cec-9cb2-ed303b2f9fb6" />

### After
<img width="648" height="362" alt="code sesudah Persegi java 05" src="https://github.com/user-attachments/assets/b7e72501-d959-4178-bbdf-539b5bd361b8" />

## Lingkaran
### Before
<img width="794" height="425" alt="Code Sebelum Lingkaran java 05" src="https://github.com/user-attachments/assets/61865fef-9874-4bc8-afad-b1ada7c47506" />

### After
<img width="864" height="490" alt="code sesudah Lingkaran java 05" src="https://github.com/user-attachments/assets/6b462407-87d0-42f7-a9a3-3028ce466a05" />

## Segitiga
<img width="1039" height="750" alt="code sesudah Segitiga java 05" src="https://github.com/user-attachments/assets/25e88967-cb11-431c-ac65-30d88bf305e1" />

## Trapesium
<img width="1037" height="679" alt="code sesudah Trapesium java 05" src="https://github.com/user-attachments/assets/719d3e98-b1f0-471c-9c1e-18a7ed22176a" />

## 3. Implementasi PHP

### 3.1. `BangunDatar.php` dan `main.php`
### Before
<img width="497" height="896" alt="Code sebelum BangunDatar php 05" src="https://github.com/user-attachments/assets/fc901eae-900c-4904-8b97-5df1990e59df" />

<img width="765" height="499" alt="code sebelum main php 05" src="https://github.com/user-attachments/assets/ff62e3da-7102-49cd-b803-5b26685aa7c9" />

### After
<img width="309" height="935" alt="code sesudah BangunDatar php 05" src="https://github.com/user-attachments/assets/4bcf166b-9842-421c-942b-55400f729299" />

<img width="936" height="554" alt="code sesudah main php 05" src="https://github.com/user-attachments/assets/9e7e7a6b-99aa-4b09-a1bd-cb83310c204e" />

## Notifikasi
### Before
<img width="635" height="895" alt="code sebelum notifikasi php 05" src="https://github.com/user-attachments/assets/9e9ce678-b645-4f1c-b1ca-9bc7da9f1565" />

### After
<img width="329" height="999" alt="code sesudah notifikasi php 05" src="https://github.com/user-attachments/assets/44e3853b-a604-484b-bd78-6b23564ba3b0" />
File PHP digunakan untuk menunjukkan penerapan perhitungan bangun datar dan pemanggilan perilaku objek dalam versi PHP.


## Output
<img width="823" height="207" alt="output main php 05" src="https://github.com/user-attachments/assets/53a6fb45-01b7-4b2b-a341-a5476e094aea" />

<img width="872" height="133" alt="output notifikasi php 05" src="https://github.com/user-attachments/assets/24748cab-6b5b-4a43-9afd-3d4c5f75ad6e" />

<img width="731" height="346" alt="Output Main java 05" src="https://github.com/user-attachments/assets/7898e0ca-e35d-424c-890e-1c8b78e6a904" />

## 4. Penelusuran

Untuk menambahkan bangun datar baru pada versi polimorfik, umumnya dibuat kelas turunan baru yang mengimplementasikan kontrak `BangunDatar`, kemudian objeknya ditambahkan ke daftar. Pada versi antarpola, selain menambahkan data bangun, method pemeriksaan tipe seperti `hitungLuas()` juga perlu disunting.

Catat jumlah baris yang disunting secara aktual pada file `penelusuran.md` setelah membandingkan kedua versi.

## 5. Kesimpulan

Polimorfisme memungkinkan objek dari kelas turunan diperlakukan melalui tipe induk yang sama, sementara setiap objek menjalankan implementasi method sesuai jenisnya. Pendekatan ini membuat penambahan jenis bangun lebih mudah dipelihara dibandingkan pemeriksaan tipe secara manual.
