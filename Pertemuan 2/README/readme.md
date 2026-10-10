# LAPORAN PRAKTIKUM PEMROGRAMAN BERBASIS OBJEK

| Informasi Praktikan | Keterangan |
| :--- | :--- |
| **Nama** | Ardhelia Salsabila |
| **NPM** | 4525210092 |
| **Kelas** | A |
| **Mata Kuliah** | Pemrograman Berbasis Objek (PBO) |
| **Pertemuan** | 02 -  Class, Object and Encapsulation|
| **Tanggal** | 10 Oktober 2026|

---

## 1. Deskripsi Praktikum

Praktikum ini membahas penerapan **enkapsulasi** dan **invariant** pada kelas `Mahasiswa` menggunakan Java dan PHP. Enkapsulasi digunakan untuk membatasi akses langsung terhadap data, sedangkan invariant merupakan aturan yang harus selalu dipenuhi oleh objek.

## 2. Implementasi Java

### 2.1. `Mahasiswa.java`

<img width="781" height="1006" alt="code sebelum mahasiswa java (pertemuan2)" src="https://github.com/user-attachments/assets/eec39b5d-1453-438f-866d-62bb6c12f86a" />

<img width="514" height="1018" alt="Screenshot 2026-10-10 220243" src="https://github.com/user-attachments/assets/5360d26a-11e9-4f89-b982-dd9eda22831b" />

Kelas `Mahasiswa` menyimpan data mahasiswa dan nilai tugas, UTS, serta UAS. Data dikelola melalui atribut dan method yang sesuai. Validasi memastikan NIM tidak kosong dan setiap nilai berada pada rentang 0 sampai 100. Nilai akhir dihitung dengan bobot tugas 30%, UTS 30%, dan UAS 40%, lalu dikonversi menjadi huruf mutu.

**Bukti screenshot:** tambahkan screenshot kode dan hasil eksekusi di bagian ini.

### 2.2. `Main.java`
<img width="950" height="901" alt="code sebelum main java (Pertemuan2)" src="https://github.com/user-attachments/assets/0b738bc9-4434-40ec-a51f-7d89bb7757bd" />

<img width="791" height="623" alt="Screenshot 2026-10-10 220543" src="https://github.com/user-attachments/assets/b10612e4-f9e0-412b-801c-0c002fc4e5a9" />

File utama digunakan untuk membuat objek `Mahasiswa`, menjalankan method yang tersedia, dan menampilkan informasi serta hasil perhitungan nilai.

**Bukti screenshot:** tambahkan screenshot kode dan hasil eksekusi di bagian ini.

## 3. Implementasi PHP

### 3.1. `Mahasiswa.php`
<img width="618" height="995" alt="code sebelum Mahasiswa php (Pertemuan2)" src="https://github.com/user-attachments/assets/39f08f85-0aee-4f98-bae6-08de5b1334b6" />

<img width="363" height="898" alt="Screenshot 2026-10-10 220839" src="https://github.com/user-attachments/assets/a2087ddf-4e7d-4480-9cd3-4b17babfdb8b" />
Kelas `Mahasiswa` menerapkan enkapsulasi dan validasi nilai menggunakan PHP. Properti tertentu dibuat tidak dapat diubah setelah objek dibuat, dan nilai yang tidak memenuhi aturan ditolak.

**Bukti screenshot:** tambahkan screenshot kode dan hasil eksekusi di bagian ini.

### 3.2. `Main.php`
<img width="814" height="765" alt="code sebelum Main php (Pertemuan2)" src="https://github.com/user-attachments/assets/bab92674-b84e-4bea-a153-806e0c417df2" />

<img width="688" height="661" alt="Screenshot 2026-10-10 220917" src="https://github.com/user-attachments/assets/6d2ee9be-7d71-4b14-97e9-cac59be9bc4b" />
File utama membuat objek mahasiswa dan menguji perhitungan nilai akhir serta huruf mutu.

**Bukti screenshot:** tambahkan screenshot kode dan hasil eksekusi di bagian ini.
<img width="1181" height="189" alt="Screenshot 2026-10-10 220511" src="https://github.com/user-attachments/assets/b5ced9a0-e1d3-4c2f-9f7c-182834a849c7" />

<img width="497" height="167" alt="Screenshot 2026-10-10 220403" src="https://github.com/user-attachments/assets/a263a9c0-532b-4220-b460-ae6b420bd0bc" />

## 4. Aturan Invariant

1. NIM tidak boleh kosong dan tidak dapat diubah setelah objek dibuat.
2. Nilai tugas, UTS, dan UAS harus berada di antara 0 dan 100.
3. Nilai akhir dihitung dengan rumus: `(30% × Tugas) + (30% × UTS) + (40% × UAS)`.
4. Huruf mutu: A untuk nilai ≥ 80, B untuk ≥ 70, C untuk ≥ 60, D untuk ≥ 50, dan E untuk nilai di bawah 50.

## 5. Kesimpulan

Enkapsulasi membantu menjaga data agar tidak diubah sembarangan, sementara invariant memastikan objek selalu berada dalam kondisi yang valid. Implementasi Java dan PHP menunjukkan cara menerapkan prinsip tersebut dalam dua bahasa pemrograman.
