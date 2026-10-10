# LAPORAN PRAKTIKUM PEMROGRAMAN BERBASIS OBJEK

| Informasi Praktikan | Keterangan |
| :--- | :--- |
| **Nama** | Ardhelia Salsabila |
| **NPM** | 4525210092 |
| **Kelas** | A |
| **Mata Kuliah** | Pemrograman Berbasis Objek (PBO) |
| **Pertemuan** | 03 - Class, Object and Encapsulation |
| **Tanggal** | 10 oktober 2026 |

---

## 1. Deskripsi Praktikum

Praktikum ini menerapkan invariant, constructor yang saling mendelegasikan, anggota statis, dan konstanta bernama. Implementasi kelas rekening bank tersedia dalam Java dan PHP untuk membandingkan penerapan konsep PBO pada kedua bahasa.

## 2. Implementasi Java

### 2.1. `RekeningBank.java`
### Before
<img width="878" height="1003" alt="Screenshot 2026-10-10 223015" src="https://github.com/user-attachments/assets/458c4985-68a8-4060-9bec-f84afb270d6c" />

### After
<img width="855" height="1011" alt="code sesudah Rekening java (pertemuan3)" src="https://github.com/user-attachments/assets/ef887035-7dcc-4d0d-8e67-cb03befbda9e" />
Kelas `RekeningBank` menyimpan nomor rekening, pemilik, dan saldo. Nomor rekening dibuat tetap setelah objek dibuat. Constructor ringkas mendelegasikan proses ke constructor lengkap, sehingga validasi dilakukan pada satu tempat. Kelas juga menyediakan operasi setor, tarik, pemotongan biaya administrasi, penghitung jumlah rekening, dan perhitungan bunga.

Konstanta yang digunakan meliputi bunga tahunan 2,5%, biaya administrasi Rp5.000, dan batas penarikan sekali transaksi Rp5.000.000. Saldo tidak boleh negatif dan nominal setor maupun tarik harus positif.

### 2.2. `Main.java`
### Before 
<img width="1062" height="872" alt="code sebelum main java (pertemuan3)" src="https://github.com/user-attachments/assets/f2c5ad1e-ca27-4b89-84fb-b22cfcceb9cb" />

### After
<img width="1068" height="924" alt="code sesudah main java (pertemuan3) (2)" src="https://github.com/user-attachments/assets/4e2c7032-d743-4330-9861-1c54ed16ab77" />
File utama menguji pembuatan beberapa rekening, jumlah rekening yang berhasil dibuat, penyetoran, penarikan yang melampaui batas, dan pemotongan biaya administrasi.

**Bukti screenshot:** tambahkan screenshot kode dan hasil eksekusi di bagian ini.
<img width="880" height="301" alt="output main java (pertemuan3)" src="https://github.com/user-attachments/assets/a4fb970d-fa6c-4c07-a16d-ac5e45c80fa6" />

## 3. Implementasi PHP

### 3.1. `RekeningBank.php`
### Before
<img width="478" height="1027" alt="Code sebelum Rekening php 03" src="https://github.com/user-attachments/assets/8c8d66ef-b156-4f97-8f14-e995a0455695" />

### After
<img width="334" height="942" alt="code sesudah rekening php (pertemuan3)" src="https://github.com/user-attachments/assets/df318321-a149-4da0-b884-11b9068dd55d" />
Kelas ini menerapkan konsep yang sama dengan versi Java menggunakan sintaks PHP, termasuk validasi saldo, konstanta, properti statis, dan constructor dengan parameter default atau named constructor sesuai implementasi.

### 3.2. `main.php`
### Before
<img width="1087" height="810" alt="code sebelum main php (pertermuan3)" src="https://github.com/user-attachments/assets/c7604725-9837-41ff-bffd-67a58b3fe5c6" />

### After
<img width="1056" height="803" alt="code sesudah main  php (pertemuan3)" src="https://github.com/user-attachments/assets/af106530-3754-454b-a0c1-ae537774c092" />
File utama digunakan untuk menguji pembuatan rekening dan operasi rekening melalui kelas PHP.

**Bukti screenshot:** tambahkan screenshot kode dan hasil eksekusi di bagian ini.
<img width="944" height="368" alt="output main php (pertemuan3)" src="https://github.com/user-attachments/assets/8b572cc3-312e-4ea9-acb0-096b1144951b" />

## 4. Konsep yang Dipelajari

- **Constructor berdelegasi:** menghindari pengulangan validasi dengan memanggil constructor lengkap.
- **Anggota statis:** menyimpan informasi yang dimiliki bersama oleh kelas, seperti jumlah rekening.
- **Konstanta bernama:** memberi nama pada nilai tetap agar kode lebih mudah dipahami.
- **Invariant:** menjaga saldo agar tidak negatif dan memastikan operasi menggunakan nominal yang valid.

## 5. Kesimpulan

Constructor berdelegasi membantu mengurangi duplikasi kode, anggota statis dapat menyimpan data bersama pada tingkat kelas, dan konstanta bernama membuat aturan program lebih jelas. Validasi menjaga agar operasi rekening tidak melanggar invariant.
