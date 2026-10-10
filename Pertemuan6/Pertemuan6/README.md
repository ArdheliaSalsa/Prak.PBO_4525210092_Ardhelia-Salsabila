# LAPORAN PRAKTIKUM PEMROGRAMAN BERBASIS OBJEK

| Informasi Praktikan | Keterangan |
| :--- | :--- |
| **Nama** | Ardhelia Salsabila Al-Bahri |
| **NPM** | 4525210078 |
| **Kelas** | A |
| **Mata Kuliah** | Pemrograman Berbasis Objek (PBO) |
| **Pertemuan** | 06 - Abstraksi dan Interface |
| **Tanggal** | 10 Oktober 2026 |

---

## 1. Implementasi Java

### 1.1. File: `Moveable.java`
**Penjelasan Kode:**

`Moveable.java` mendefinisikan interface `Moveable` sebagai kontrak bagi kelas yang dapat bergerak. Interface ini berisi deklarasi method yang perlu diimplementasikan oleh kelas turunannya.

**Bukti Kode:**

* **Before**:
![Kode sebelum Moveable.java](code%20sebelum%20Moveable.java%2006.png)

* **After**:
![Kode sesudah Moveable.java](code%20sesudah%20Moveable.java%2006.png)

### 1.2. File: `Fuelable.java`
**Penjelasan Kode:**

`Fuelable.java` mendefinisikan interface yang berkaitan dengan kendaraan berbahan bakar. Interface ini menyediakan method untuk mengisi bahan bakar, melihat kapasitas maksimum, serta melihat tipe bahan bakar.

**Bukti Kode:**

* **Before**:
![Kode sebelum Fuelable.java](code%20sebelum%20fuelable.java%2006.png)

* **After**:
![Kode sesudah Fuelable.java](code%20sesudah%20Fuelable.java%2006.png)

### 1.3. File: `TipeBahanBakar.java`
**Penjelasan Kode:**

`TipeBahanBakar.java` menggunakan `enum` untuk mendefinisikan pilihan tipe bahan bakar yang tersedia. Dengan demikian, tipe bahan bakar direpresentasikan menggunakan nilai yang sudah ditentukan.

**Bukti Kode:**

* **Before**:
![Kode sebelum TipeBahanBakar.java](code%20sebelum%20TipeBahanBakar.java%2006.png)

* **After**:
![Kode sesudah TipeBahanBakar.java](Code%20sesudah%20TipeBahanBakar.java%2006.png)

### 1.4. File: `Kendaraan.java`
**Penjelasan Kode:**

`Kendaraan.java` merupakan kelas abstrak yang menjadi dasar bagi jenis kendaraan. Kelas ini menyimpan informasi umum kendaraan dan mendefinisikan perilaku yang dapat dilengkapi oleh kelas turunannya.

**Bukti Kode:**

* **Before**:
![Kode sebelum Kendaraan.java](code%20sebelum%20Kendaraan.java%2006.png)

* **After**:
![Kode sesudah Kendaraan.java](code%20sesudah%20Kendaraan.java%2006.png)

### 1.5. File: `Mobil.java`
**Penjelasan Kode:**

`Mobil.java` merupakan kelas turunan dari `Kendaraan` yang juga menerapkan interface terkait pergerakan dan bahan bakar. Kelas ini mengimplementasikan perilaku khusus mobil, termasuk informasi kapasitas tangki dan tipe bahan bakar.

**Bukti Kode:**

* **Before**:
![Kode sebelum Mobil.java](code%20sebelum%20Mobil.java%2006.png)

* **After**:
![Kode sesudah Mobil.java](code%20sesudah%20Mobil.java%2006.png)

### 1.6. File: `Sepeda.java`
**Penjelasan Kode:**

`Sepeda.java` merupakan kelas turunan `Kendaraan` yang menerapkan perilaku kendaraan berupa sepeda. Kelas ini memberikan implementasi sesuai karakteristik sepeda, tanpa menggunakan bahan bakar.

**Bukti Kode:**

* **After**:
![Kode sesudah Sepeda.java](Code%20sesudah%20Sepeda.java%2006.png)

### 1.7. File: `Main.java`
**Penjelasan Kode:**

`Main.java` menjadi kelas utama untuk menjalankan program. Di dalamnya dibuat objek kendaraan dan dipanggil method yang tersedia untuk memperlihatkan penerapan abstraksi, pewarisan, dan interface.

**Bukti Kode:**

* **Before**:
![Kode sebelum Main.java](code%20sebelum%20main.java%2006.png)

* **After**:
![Kode sesudah Main.java](code%20sesudah%20Main.java%2006.png)

---

## 2. Implementasi PHP

### 2.1. File: `Abstraksi.php`
**Penjelasan Kode:**

`Abstraksi.php` berisi implementasi konsep abstraksi menggunakan kelas dan method yang sesuai dengan contoh kendaraan. Kelas abstrak digunakan sebagai dasar agar perilaku umum dapat ditentukan, sedangkan implementasi khusus diberikan oleh kelas turunannya.

**Bukti Kode:**

* **Before**:
![Kode sebelum Abstraksi.php](code%20sebelum%20Abstraksi.php%2006.png)

* **After**:
![Kode sesudah Abstraksi.php bagian 1](code%20sesudah%20abstraksi.php%2006-1.png)

![Kode sesudah Abstraksi.php bagian 2](code%20sesudah%20abstraksi.php%2006-2.png)

![Kode sesudah Abstraksi.php bagian 3](code%20sesudah%20abstraksi%2006-3.png)

### 2.2. File: `main.php`
**Penjelasan Kode:**

`main.php` menjalankan implementasi PHP dengan membuat objek dan memanggil perilaku kendaraan. File ini digunakan untuk menguji hasil implementasi abstraksi pada program PHP.

**Bukti Kode:**

* **Before**:
![Kode sebelum main.php](code%20sebelum%20main.php%2006.png)

* **After**:
![Kode sesudah main.php](code%20sesudah%20main.php%2006.png)

---

## 3. Kesimpulan

Praktikum ini menerapkan konsep **abstraksi** dalam Pemrograman Berbasis Objek melalui kelas abstrak, interface, pewarisan, dan `enum`. Kelas abstrak digunakan untuk mewakili karakteristik umum kendaraan, sedangkan kelas turunan seperti `Mobil` dan `Sepeda` memberikan implementasi sesuai jenis kendaraannya. Interface `Moveable` dan `Fuelable` menetapkan perilaku yang harus disediakan oleh kelas yang menerapkannya. Implementasi juga dibuat dalam Java dan PHP untuk melihat penerapan konsep tersebut pada dua bahasa pemrograman.

> **Catatan:** Folder screenshot pada arsip tidak menyertakan screenshot output terminal/hasil eksekusi terpisah. Oleh karena itu, bagian bukti di atas menggunakan screenshot kode sebelum dan sesudah perubahan.
