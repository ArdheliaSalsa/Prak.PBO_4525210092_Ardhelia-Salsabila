# Skenario Uji: Keputusan Hierarki Exception

## TODO 1 (PerpustakaanException): unchecked atau checked?

**Keputusan:** `PerpustakaanException` diturunkan dari `RuntimeException` (unchecked).

**Alasan:**

1. Semua kegagalan domain di sistem ini (anggota tidak terdaftar, ISBN tidak ada, stok habis, batas pinjam tercapai) berasal dari permintaan yang tidak sesuai aturan. Ini bukan keadaan luar yang wajar seperti kegagalan jaringan atau berkas, sehingga cocok disebut unchecked.
2. Jika checked, setiap method seperti `pinjam()` harus mendeklarasikan `throws` di signature-nya, dan setiap pemanggil dipaksa menangani. Hal ini membuat kode pemanggil penuh blok try-catch yang sering hanya menampilkan pesan.
3. PHP tidak mengenal checked exception. Dengan memilih unchecked di Java, kedua versi memiliki perilaku yang konsisten.
4. Konsekuensinya, kompilator tidak memaksa pemanggil menangani exception ini. Karena itu `PerpustakaanService.pinjamBuku()` menangkap `PerpustakaanException` secara eksplisit, dan `@throws` pada PHP (dan Javadoc di Java) menjadi dokumentasi kontrak yang penting.

## Skenario uji yang relevan

| No | Input (ID anggota, ISBN) | Kondisi | Exception yang diharapkan |
|----|--------------------------|---------|---------------------------|
| 1  | A-001, 111 | Anggota ada, buku ada, stok > 0, pinjaman < 3 | Berhasil |
| 2  | A-002, 111 | Stok buku 111 sudah 0 | `BukuSedangDipinjamException` |
| 3  | A-002, 999 | ISBN tidak ada di katalog | `BukuTidakDitemukanException` |
| 4  | X-999, 222 | Anggota belum terdaftar | `AnggotaTidakDitemukanException` |
| 5  | A-001, 222 (sampai pinjaman = 3) | Batas tercapai | `BatasPinjamTerlampauiException` |
