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
<img width="989" height="447" alt="code sebelum Moveable java 06" src="https://github.com/user-attachments/assets/bcdcbb3e-507f-465d-8afe-1067273aa7b3" />

* **After**:
<img width="691" height="490" alt="code sesudah Moveable java 06" src="https://github.com/user-attachments/assets/5daacddd-1d3f-430f-9f12-cdb6927e5f52" />

### 1.2. File: `Fuelable.java`
**Penjelasan Kode:**

`Fuelable.java` mendefinisikan interface yang berkaitan dengan kendaraan berbahan bakar. Interface ini menyediakan method untuk mengisi bahan bakar, melihat kapasitas maksimum, serta melihat tipe bahan bakar.

**Bukti Kode:**

* **Before**:
<img width="706" height="314" alt="code sebelum fuelable java 06" src="https://github.com/user-attachments/assets/69f52182-17d5-4903-ae7b-807312d1b2da" />


* **After**:
<img width="686" height="293" alt="code sesudah Fuelable java 06" src="https://github.com/user-attachments/assets/a327d60f-3a7e-4780-a7e1-b7c30a4d35ae" />

### 1.3. File: `TipeBahanBakar.java`
**Penjelasan Kode:**

`TipeBahanBakar.java` menggunakan `enum` untuk mendefinisikan pilihan tipe bahan bakar yang tersedia. Dengan demikian, tipe bahan bakar direpresentasikan menggunakan nilai yang sudah ditentukan.

**Bukti Kode:**

* **Before**:
<img width="1206" height="749" alt="code sebelum TipeBahanBakar java 06" src="https://github.com/user-attachments/assets/33915a96-bb21-478b-8abd-c7b30d705a25" />

* **After**:
<img width="1182" height="807" alt="Code sesudah TipeBahanBakar java 06" src="https://github.com/user-attachments/assets/2ad0826d-ab62-4582-88f7-90b7acce91bf" />

### 1.4. File: `Kendaraan.java`
**Penjelasan Kode:**

`Kendaraan.java` merupakan kelas abstrak yang menjadi dasar bagi jenis kendaraan. Kelas ini menyimpan informasi umum kendaraan dan mendefinisikan perilaku yang dapat dilengkapi oleh kelas turunannya.

**Bukti Kode:**

* **Before**:
<img width="1072" height="563" alt="code sebelum Kendaraan java 06" src="https://github.com/user-attachments/assets/89650144-7988-403e-8b98-b72423f60d75" />

* **After**:
<img width="1071" height="532" alt="code sesudah Kendaraan java 06" src="https://github.com/user-attachments/assets/c6aa8002-c380-4b8a-8015-c61f12b02f81" />

### 1.5. File: `Mobil.java`
**Penjelasan Kode:**

`Mobil.java` merupakan kelas turunan dari `Kendaraan` yang juga menerapkan interface terkait pergerakan dan bahan bakar. Kelas ini mengimplementasikan perilaku khusus mobil, termasuk informasi kapasitas tangki dan tipe bahan bakar.

**Bukti Kode:**

* **Before**:
<img width="781" height="749" alt="code sebelum Mobil java 06" src="https://github.com/user-attachments/assets/dfb3cb2d-ce6b-49a6-89f2-797e23765eb3" />

* **After**:
<img width="870" height="1039" alt="code sesudah Mobil java 06" src="https://github.com/user-attachments/assets/ea419ba7-ad40-4b82-875a-ae6804223787" />

### 1.6. File: `Sepeda.java`
**Penjelasan Kode:**

`Sepeda.java` merupakan kelas turunan `Kendaraan` yang menerapkan perilaku kendaraan berupa sepeda. Kelas ini memberikan implementasi sesuai karakteristik sepeda, tanpa menggunakan bahan bakar.

**Bukti Kode:**

* **After**:
<img width="690" height="470" alt="Code sesudah Sepeda java 06" src="https://github.com/user-attachments/assets/fc41eafe-3e69-47ea-86c5-c8de927f6d08" />

### 1.7. File: `Main.java`
**Penjelasan Kode:**

`Main.java` menjadi kelas utama untuk menjalankan program. Di dalamnya dibuat objek kendaraan dan dipanggil method yang tersedia untuk memperlihatkan penerapan abstraksi, pewarisan, dan interface.

**Bukti Kode:**

* **Before**:
<img width="1188" height="964" alt="code sebelum main java 06" src="https://github.com/user-attachments/assets/26ae6615-29e2-4a25-aea2-e3199e2504f9" />


* **After**:
<img width="879" height="863" alt="code sesudah Main java 06" src="https://github.com/user-attachments/assets/bfd625cb-4665-4ee5-8467-9c69c5ef7a69" />

---

## 2. Implementasi PHP

### 2.1. File: `Abstraksi.php`
**Penjelasan Kode:**

`Abstraksi.php` berisi implementasi konsep abstraksi menggunakan kelas dan method yang sesuai dengan contoh kendaraan. Kelas abstrak digunakan sebagai dasar agar perilaku umum dapat ditentukan, sedangkan implementasi khusus diberikan oleh kelas turunannya.

**Bukti Kode:**

* **Before**:
<img width="292" height="984" alt="code sebelum Abstraksi php 06" src="https://github.com/user-attachments/assets/53cf8fbc-67e5-471e-b50a-ffa16daba718" />

* **After**:
<img width="438" height="1085" alt="code sesudah abstraksi php 06-1" src="https://github.com/user-attachments/assets/e88f0bbf-b788-48a5-86b8-feb8d6bbc9e1" />
<img width="483" height="1056" alt="code sesudah abstraksi php 06-2" src="https://github.com/user-attachments/assets/3c4f16ae-d463-40ca-8cd6-02d306813e7e" />
<img width="417" height="195" alt="code sesudah abstraksi 06-3" src="https://github.com/user-attachments/assets/560d3c4f-fd27-45ab-ad0f-350cb9db9f6e" />

### 2.2. File: `main.php`
**Penjelasan Kode:**

`main.php` menjalankan implementasi PHP dengan membuat objek dan memanggil perilaku kendaraan. File ini digunakan untuk menguji hasil implementasi abstraksi pada program PHP.

**Bukti Kode:**

* **Before**:
<img width="800" height="921" alt="code sebelum main php 06" src="https://github.com/user-attachments/assets/b5e84689-c8dd-44d0-9bd5-a031ea2b74c9" />

* **After**:
<img width="795" height="893" alt="code sesudah main php 06" src="https://github.com/user-attachments/assets/3f9caef1-833b-4e60-986f-d91b02135402" />


## Output
<img width="1600" height="900" alt="Output main java 06" src="https://github.com/user-attachments/assets/3e0514b3-8165-4414-b662-8f4787e28eee" />
<img width="1600" height="900" alt="Output main php 06" src="https://github.com/user-attachments/assets/d833bab9-8c74-4331-9355-5585e945a0e0" />

---

## 3. Kesimpulan

Praktikum ini menerapkan konsep **abstraksi** dalam Pemrograman Berbasis Objek melalui kelas abstrak, interface, pewarisan, dan `enum`. Kelas abstrak digunakan untuk mewakili karakteristik umum kendaraan, sedangkan kelas turunan seperti `Mobil` dan `Sepeda` memberikan implementasi sesuai jenis kendaraannya. Interface `Moveable` dan `Fuelable` menetapkan perilaku yang harus disediakan oleh kelas yang menerapkannya. Implementasi juga dibuat dalam Java dan PHP untuk melihat penerapan konsep tersebut pada dua bahasa pemrograman.

> **Catatan:** Folder screenshot pada arsip tidak menyertakan screenshot output terminal/hasil eksekusi terpisah. Oleh karena itu, bagian bukti di atas menggunakan screenshot kode sebelum dan sesudah perubahan.
