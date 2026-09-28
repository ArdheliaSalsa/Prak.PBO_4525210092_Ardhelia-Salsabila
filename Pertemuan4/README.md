# Sistem Penggajian Pegawai (Pewarisan / Inheritance)

Praktikum **Pemrograman Berorientasi Objek (PBO) — Pertemuan 4**.
Proyek ini menerapkan konsep **pewarisan (inheritance)**, **overriding method**, dan **polimorfisme** untuk menghitung gaji berbagai jenis pegawai. Program yang sama ditulis dalam dua bahasa: **Java** dan **PHP**, sehingga logikanya bisa dibandingkan berdampingan.

---

## Tujuan Pembelajaran

- Menaruh atribut dan perilaku yang **sama** di kelas induk (`Pegawai`), sementara yang **berbeda** ditaruh di kelas turunan.
- Memakai `super` / `parent::` untuk **memperluas** perilaku induk, bukan menyalin ulang rumusnya.
- Memahami **kelas abstract** dan **method abstract** (`jenis()`), yang dibahas tuntas di pertemuan 6.
- Melakukan **validasi** di constructor (gaji pokok, masa kerja, hari kerja, dan tunjangan tidak boleh negatif).
- Memanfaatkan **polimorfisme**: satu array/daftar `Pegawai` berisi berbagai jenis objek, dan `hitungGaji()` otomatis memakai versi yang sesuai.

---

## Struktur Berkas

```
Pertemuan4/
├── Pegawai.java          # Kelas induk (abstract)
├── PegawaiTetap.java     # Turunan: tunjangan masa kerja
├── PegawaiKontrak.java   # Turunan: tanpa tunjangan
├── Dosen.java            # Turunan: honor berdasarkan SKS
├── Pegawaiharian.java    # Turunan: upah per hari
├── Main.java             # Program utama (Java)
│
├── pegawai.php           # Seluruh hierarki kelas (PHP, satu berkas)
├── main.php              # Program utama (PHP)
│
└── README.md
```

> File `.class` adalah hasil kompilasi Java dan dibuat otomatis oleh `javac`.

---

## Hierarki Kelas

### Versi Java

```
                 Pegawai (abstract)
                        │
     ┌───────────┬──────┴──────┬──────────────┐
PegawaiTetap  PegawaiKontrak   Dosen    Pegawaiharian
```

### Versi PHP

```
                 Pegawai (abstract)
                        │
     ┌───────────┬──────┴───────────┐
PegawaiTetap  PegawaiKontrak   PegawaiHarian
     │
   Dosen
```

> **Perbedaan penting:** di Java, `Dosen` langsung turunan `Pegawai`; di PHP, `Dosen` adalah turunan `PegawaiTetap` sehingga otomatis mendapat tunjangan masa kerja.

---

## Penjelasan Kelas

### `Pegawai` (abstract)
Kelas induk yang menampung data yang sama untuk semua pegawai.

| Anggota | Keterangan |
|---|---|
| `nip`, `nama`, `gajiPokok` | Atribut `protected final` (Java) / `protected readonly` (PHP) |
| Constructor | Menolak `gajiPokok` negatif dengan exception |
| `hitungGaji()` | Perilaku dasar: mengembalikan gaji pokok apa adanya |
| `jenis()` | Method **abstract**, wajib diisi oleh turunan |
| `getNama()`, `getNip()` | Getter |
| `toString()` / `__toString()` | Format baris: NIP, jenis, nama, gaji (`Rp#.###,##`) |

### `PegawaiTetap`
Gaji = gaji pokok + **tunjangan masa kerja**.
- Tunjangan **2% per tahun** masa kerja, **maksimum 40%**.
- Rumus: `gaji = pokok + pokok × min(masaKerja × 2%, 40%)`
- Memakai `super.hitungGaji()` / `parent::hitungGaji()` untuk mengambil gaji dasar.

### `PegawaiKontrak`
Tidak mendapat tunjangan masa kerja, sehingga **tidak perlu meng-override** `hitungGaji()`. Gaji sama dengan gaji pokok. Menyimpan tambahan atribut `bulanKontrak`.

### `Dosen`
| Versi | Rumus |
|---|---|
| **Java** | `gaji = gajiPokok + (sks × tunjanganFungsional)` |
| **PHP** | `gaji = gaji PegawaiTetap (pokok + tunjangan masa kerja) + tunjanganFungsional` (nominal tetap) |

### `Pegawaiharian` (Java) / `PegawaiHarian` (PHP)
`gajiPokok` diperlakukan sebagai **upah per hari**.
Rumus: `gaji = upahPerHari × hariKerja`

---

## Cara Menjalankan

### Java

Prasyarat: **JDK 8 atau lebih baru**.

```bash
# kompilasi semua berkas
javac *.java

# jalankan
java Main
```

### PHP

Prasyarat: **PHP 8.1 atau lebih baru** (memakai `readonly` property dan constructor promotion).

```bash
php main.php
```

> **Catatan:** `main.php` memuat `Pegawai.php` (huruf P kapital), sedangkan berkasnya bernama `pegawai.php`. Di Windows ini tidak masalah, tetapi di Linux/macOS (case-sensitive) nama berkas harus disamakan, misalnya dengan mengganti nama berkas menjadi `Pegawai.php`.

---

## Contoh Data & Hasil Perhitungan

### Versi PHP (`main.php`)

| NIP | Jenis | Nama | Perhitungan | Gaji |
|---|---|---|---|---|
| 198701012010 | TETAP | Ani Lestari | 6.000.000 + 30% (15 th) | Rp7.800.000,00 |
| K-2024-007 | KONTRAK | Budi Santoso | 5.000.000 | Rp5.000.000,00 |
| 199003152015 | DOSEN | Citra Dewi | 8.000.000 + 16% (8 th) + 2.500.000 | Rp11.780.000,00 |
| H-2025-001 | HARIAN | Doni Pratama | 200.000 × 22 hari | Rp4.400.000,00 |

**Total beban gaji: Rp28.980.000,00**

Contoh output terminal:

```
=== Daftar Gaji ===
  198701012010   TETAP     Ani Lestari          Rp7.800.000,00
  K-2024-007     KONTRAK   Budi Santoso         Rp5.000.000,00
  199003152015   DOSEN     Citra Dewi           Rp11.780.000,00
  H-2025-001     HARIAN    Doni Pratama         Rp4.400.000,00

  Total beban gaji: Rp28.980.000,00

Periksa: Ani (pokok 6.000.000, masa kerja 15 tahun)
  tunjangan 15 x 2% = 30%, jadi gaji seharusnya Rp7.800.000,00
```

### Versi Java (`Main.java`)

| NIP | Jenis | Nama | Perhitungan | Gaji |
|---|---|---|---|---|
| 198701012010 | TETAP | Ani Lestari | 6.000.000 + 30% (15 th) | Rp7.800.000,00 |
| K-2024-007 | KONTRAK | Budi Santoso | 5.000.000 | Rp5.000.000,00 |
| D-2024-001 | DOSEN | Citra Dewi | 7.000.000 + (10 SKS × 150.000) | Rp8.500.000,00 |
| H-2024-001 | HARIAN | Dedi Pratama | 100.000 × 20 hari | Rp2.000.000,00 |

**Total beban gaji: Rp23.300.000,00**

> Data contoh pada versi Java dan PHP sengaja berbeda, sehingga totalnya juga berbeda.

---

## Konsep OOP yang Ditunjukkan

| Konsep | Contoh dalam kode |
|---|---|
| **Inheritance** | `PegawaiTetap extends Pegawai` |
| **Abstraction** | `Pegawai` abstract dengan method abstract `jenis()` |
| **Overriding** | `hitungGaji()` di `PegawaiTetap`, `Dosen`, `Pegawaiharian` |
| **Polimorfisme** | `Pegawai[] daftar` diisi berbagai jenis pegawai, lalu `p.hitungGaji()` dipanggil dalam satu perulangan |
| **Enkapsulasi** | Atribut `protected` / `private` dengan getter |
| **Validasi input** | Exception `IllegalArgumentException` (Java) / `InvalidArgumentException` (PHP) |
| **Reuse via `super`** | Turunan memanggil `super.hitungGaji()` alih-alih menyalin rumus |

---

## Catatan Tambahan

- Constructor `PegawaiTetap` **wajib** memanggil `super(...)` sebagai pernyataan pertama (Java) agar atribut induk terisi.
- Pegawai kontrak tidak meng-override `hitungGaji()` karena perilaku dasar dari induk sudah sesuai.
- Mulai sesi 9, aturan **satu kelas = satu berkas** akan diterapkan pada versi PHP.
