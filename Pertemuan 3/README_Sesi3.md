# Rekening Bank & Program Uji Mahasiswa

Praktikum **Pemrograman Berorientasi Objek (PBO) — Sesi 3**.
Fokus sesi ini: **enkapsulasi dan invariant**, **constructor berdelegasi**, **anggota statis**, dan **konstanta bernama**. Setiap konsep ditulis dalam dua bahasa, **Java** dan **PHP**, agar bisa dibandingkan.

---

## Struktur Berkas

```
Sesi3/
├── RekeningBank.java   # Kelas RekeningBank (Java)
├── RekeningBank.php    # Kelas RekeningBank (PHP)
├── Main.java           # Program uji Mahasiswa (Java)
├── main.php            # Program uji Mahasiswa (PHP)
├── Mahasiswa.java      # (belum ada di folder ini, lihat catatan)
└── Mahasiswa.php       # (belum ada di folder ini, lihat catatan)
```

> **Catatan penting:** `Main.java` dan `main.php` adalah program uji untuk kelas **`Mahasiswa`**, bukan `RekeningBank`. Berkas `Mahasiswa.java` dan `Mahasiswa.php` belum termasuk, sehingga kedua program uji itu belum bisa dijalankan sampai kelasnya dibuat. `RekeningBank` sendiri sudah lengkap dan dapat dikompilasi terpisah.

---

## 1. Kelas `RekeningBank`

### Invariant (aturan yang selalu benar)

1. Saldo **tidak pernah negatif**.
2. Nomor rekening **tidak berubah** setelah objek dibuat (`final` / `readonly`).
3. Setoran dan penarikan **selalu bernilai positif**.

### Konstanta

| Konstanta | Nilai | Fungsi |
|---|---|---|
| `BUNGA_TAHUNAN` | `0.025` (2,5%) | Bunga per tahun |
| `BIAYA_ADMIN` | `5000` | Biaya administrasi |
| `BATAS_TARIK_SEKALI` | `5_000_000` | Batas penarikan per transaksi |

### Anggota

| Anggota | Keterangan |
|---|---|
| Constructor lengkap | Satu-satunya tempat validasi: nomor tidak boleh kosong, saldo awal tidak boleh negatif. Menaikkan penghitung rekening. |
| `setor(jumlah)` | Menolak jumlah `<= 0`, lalu menambah saldo. |
| `tarik(jumlah)` | Menolak jumlah `<= 0`, jumlah di atas batas sekali tarik, dan jumlah di atas saldo. |
| `potongBiayaAdmin()` | Mengurangi saldo sebesar biaya admin, hasil minimum `0` (tidak pernah negatif). |
| `getJumlahRekening()` | Method **statis**: jumlah rekening yang pernah dibuat. |
| `bungaSetahun(pokok)` | Method **statis** utilitas: `pokok × BUNGA_TAHUNAN`. |
| `getSaldo()`, `getNomor()` | Getter. |
| `toString()` / `__toString()` | Format: `Rekening[nomor] pemilik Rp#.###,##` |

### Perbedaan Java vs PHP

| Aspek | Java | PHP |
|---|---|---|
| Constructor ringkas | Constructor **overloading**: `RekeningBank(nomor, pemilik)` memanggil `this(nomor, pemilik, 0)` | PHP tidak punya overloading, diganti **default parameter** (`$saldoAwal = 0`) |
| Rekening saldo nol | Lewat constructor ringkas | **Named constructor** `rekeningPelajar()` memakai `new static()` (bukan `new self()`) agar mendukung kelas turunan |
| Penghitung rekening | `private static int jumlahRekening` | `private static int $jumlahRekening`, diakses dengan `self::` |
| Konstanta | `public static final` | `public const` |
| Error saldo tidak cukup | `IllegalArgumentException` | `RuntimeException` |
| Error argumen lain | `IllegalArgumentException` | `InvalidArgumentException` |
| Nomor kosong | `nomor == null \|\| nomor.isBlank()` | `trim($nomor) === ''` |

### Konsep yang ditunjukkan

- **Constructor berdelegasi:** constructor ringkas memanggil constructor lengkap, sehingga validasi hanya ditulis sekali dan penghitung hanya naik **satu kali** per objek.
- **Validasi sebelum mengubah state:** exception dilempar sebelum `jumlahRekening++`, jadi objek yang gagal dibuat tidak ikut dihitung.
- **Anggota statis:** `jumlahRekening` dimiliki kelas, bukan objek.
- **Konstanta bernama:** menggantikan angka ajaib (`0.025`, `5000`, `5_000_000`).

### Contoh Penggunaan

**Java**

```java
RekeningBank a = new RekeningBank("001", "Ani", 1_000_000);
RekeningBank b = new RekeningBank("002", "Budi");   // saldo awal 0

a.setor(500_000);
a.tarik(200_000);
a.potongBiayaAdmin();

System.out.println(a);
System.out.println(RekeningBank.getJumlahRekening());   // 2
System.out.println(RekeningBank.bungaSetahun(1_000_000)); // 25000.0
```

**PHP**

```php
require_once __DIR__ . '/RekeningBank.php';

$a = new RekeningBank('001', 'Ani', 1_000_000);
$b = RekeningBank::rekeningPelajar('002', 'Budi');  // saldo awal 0

$a->setor(500_000);
$a->tarik(200_000);
$a->potongBiayaAdmin();

echo $a, PHP_EOL;
echo RekeningBank::getJumlahRekening(), PHP_EOL;    // 2
echo RekeningBank::bungaSetahun(1_000_000), PHP_EOL; // 25000
```

---

## 2. Program Uji `Main` (kelas `Mahasiswa`)

`Main.java` dan `main.php` menguji kelas `Mahasiswa` (NIM, nama, dan tiga nilai). Keluarannya terdiri dari dua bagian:

1. **Rekap Nilai:** mencetak tiga objek `Mahasiswa` (Ani Lestari, Budi Santoso, Citra Wijaya).
2. **Objek menolak data yang melanggar aturan:** memastikan constructor melempar exception ketika:
   - salah satu nilai di luar rentang yang valid (contoh uji: nilai `150`),
   - NIM kosong.

Jika penolakan tidak terjadi, program mencetak pesan `MASALAH: ... seharusnya ditolak!`. Program ini **tidak boleh diubah** pada Langkah 1 sampai 4, karena berfungsi sebagai penguji kebenaran kelas `Mahasiswa`.

---

## Cara Menjalankan

**Prasyarat:** JDK 11+ (`String.isBlank()`) dan PHP 8.1+ (`readonly` property dan constructor promotion).

**Java**

```bash
javac RekeningBank.java        # RekeningBank saja
javac *.java                   # semua, jika Mahasiswa.java sudah ada
java Main
```

**PHP**

```bash
php main.php                   # butuh Mahasiswa.php
```

> `main.php` memuat `Mahasiswa.php` (huruf M kapital). Di Linux/macOS nama berkas harus persis sama.

---

## Catatan

- Format uang `Rp%,.2f` di Java mengikuti **locale** sistem. Pada komputer berlokal Indonesia hasilnya `Rp1.000.000,00`; pada locale lain bisa berbeda. Versi PHP memakai `number_format(..., 2, ',', '.')` sehingga hasilnya selalu berformat Indonesia.
- Pesan batas penarikan di Java mencetak nilai `double`, sehingga tampil `Rp5000000.0`, sedangkan PHP menampilkan `Rp5000000`.
