package id.ac.univpancasila.perpustakaan.repository;

import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.DisplayName;
import org.junit.jupiter.api.Test;
import java.util.List;
import java.util.Optional;
import id.ac.univpancasila.perpustakaan.service.LibraryService;
import id.ac.univpancasila.perpustakaan.exception.BukuTidakDitemukanException;
import id.ac.univpancasila.perpustakaan.exception.AnggotaTidakDitemukanException;
import id.ac.univpancasila.perpustakaan.exception.BatasPinjamTerlampauiException;
import id.ac.univpancasila.perpustakaan.exception.BukuSedangDipinjamException;

import static org.junit.jupiter.api.Assertions.*;


/**
 * Sesi 11 — unit test pertama Anda.
 *
 * Letakkan berkas ini di src/test/java/id/ac/univpancasila/perpustakaan/
 * Jalankan dengan: mvn test
 *
 * Konvensi Maven: hanya berkas di src/test/java yang bernama *Test
 * yang akan dijalankan sebagai pengujian.
 */
class RepositoryTest {

    /** Objek sederhana untuk diuji. */
    record Buku(String isbn, String judul) {}

    private Repository<Buku> repo;

    @BeforeEach
    void siapkan() {
        // Dijalankan ulang sebelum SETIAP pengujian, sehingga tiap uji
        // berangkat dari keadaan yang bersih dan tidak saling memengaruhi.
        repo = new Repository<>(Buku::isbn);
    }

    @Test
    @DisplayName("Item yang disimpan dapat ditemukan kembali")
    void simpanLaluTemukan() {
        repo.simpan(new Buku("978-1", "PBO"));

        // [SELESAI] TODO 1: pastikan cariById("978-1") berisi nilai,
        //         dan judulnya "PBO".
        //         Petunjuk: assertTrue(...isPresent()) dan assertEquals(...)
        Optional<Buku> hasilCari = repo.cariById("978-1");

        assertTrue(hasilCari.isPresent(), "Buku seharusnya ditemukan");
        assertEquals("PBO", hasilCari.get().judul(), "Judul buku tidak sesuai");
    }

    @Test
    @DisplayName("Mencari id yang tidak ada mengembalikan Optional kosong")
    void cariYangTidakAda() {
        Optional<Buku> hasilCari = repo.cariById("ISBN-KOSONG");

        assertTrue(hasilCari.isEmpty(), "Mencari ID yang tidak ada harus mengembalikan Optional kosong");
    }

    @Test
    @DisplayName("Item yang dihapus tidak dapat ditemukan lagi")
    void hapusItem() {
        // [SELESAI] TODO 3
        repo.simpan(new Buku("978-2", "Struktur Data"));
        boolean isTerhapus = repo.hapus("978-2");


        assertTrue(isTerhapus, "Proses hapus harus mengembalikan nilai true");
        assertTrue(repo.cariById("978-2").isEmpty(), "Buku yang sudah dihapus seharusnya tidak ditemukan lagi");
    }

    @Test
    @DisplayName("Repository baru berisi nol item")
    void repositoryKosong() {
        // [SELESAI] TODO 4
        assertEquals(0, repo.jumlah(), "Jumlah item pada repository baru harus 0");
        assertTrue(repo.cariSemua().isEmpty(), "List yang dikembalikan harus kosong");
    }

    @Test
    @DisplayName("Koleksi yang dikembalikan cariSemua tidak dapat diubah dari luar")
    void koleksiTidakBocor() {
        repo.simpan(new Buku("978-1", "PBO"));

        // [SELESAI] TODO 5: pastikan memanggil .add(...) pada hasil cariSemua()
        //         melemparkan UnsupportedOperationException.
        //         Petunjuk: assertThrows(UnsupportedOperationException.class, () -> ...)
        List<Buku> hasilList = repo.cariSemua();
        
        assertThrows(UnsupportedOperationException.class, () -> {
            hasilList.add(new Buku("978-9", "Buku Hack"));
        }, "Memodifikasi list salinan harus melempar UnsupportedOperationException");
    }

    // [SELESAI] TODO 6: tambahkan minimal TIGA pengujian lagi dari daftar skenario
    //         yang Anda susun pada sesi 10, termasuk satu yang memastikan
    //         exception yang benar dilemparkan.
    @Test
    @DisplayName("Menyimpan item dengan kunci yang sama akan menimpa data lama")
    void simpanKunciSamaMenimpaData() {
        repo.simpan(new Buku("978-3", "Buku Versi Lama"));
        repo.simpan(new Buku("978-3", "Buku Versi Revisi")); // ISBN sama

        assertEquals(1, repo.jumlah(), "Jumlah item seharusnya tetap 1");
        assertEquals("Buku Versi Revisi", repo.cariById("978-3").get().judul(), "Data lama seharusnya tertimpa");
    }

    @Test
    @DisplayName("Menghapus item dengan ID yang tidak ada akan mengembalikan false")
    void hapusItemTidakAdaMengembalikanFalse() {
        boolean isTerhapus = repo.hapus("ISBN-TIDAK-ADA");
        
        assertFalse(isTerhapus, "Menghapus ID yang tidak ada harus mengembalikan false");
    }

    @Test
    @DisplayName("Exception: Meminjam dengan ISBN yang tidak terdaftar melempar BukuTidakDitemukanException")
    void exceptionPinjamBukuTidakAda() {
        LibraryService service = new LibraryService();
        service.daftarkanAnggota("ANG-001");
        
        // Memastikan method pinjam() melempar exception saat ISBN salah
        assertThrows(BukuTidakDitemukanException.class, () -> {
            service.pinjam("ANG-001", "ISBN-NGASAL");
        }, "Harus melempar BukuTidakDitemukanException jika ISBN tidak ada");
    }
    
    @Test
    @DisplayName("Exception: Meminjam dengan ID Anggota yang tidak terdaftar melempar AnggotaTidakDitemukanException")
    void exceptionPinjamAnggotaTidakAda() {
        LibraryService service = new LibraryService();
        
        assertThrows(AnggotaTidakDitemukanException.class, () -> {
            service.pinjam("ANG-NGASAL", "978-1");
        }, "Harus melempar AnggotaTidakDitemukanException jika Anggota tidak terdaftar");
    }

    @Test
    @DisplayName("Skenario 1: Peminjaman berhasil mengurangi stok buku")
    void pinjamBerhasilMengurangiStok() {
        LibraryService service = new LibraryService();
        service.tambahBuku("111", "Laskar Pelangi", "Andrea Hirata", 2);
        service.daftarkanAnggota("A-001");

        assertTrue(service.pinjam("A-001", "111"), "Peminjaman seharusnya berhasil");
        assertEquals(1, service.sisaEksemplar("111"), "Stok seharusnya berkurang satu");
    }

    @Test
    @DisplayName("Skenario 2: Exception: Stok habis melempar BukuSedangDipinjamException")
    void exceptionPinjamStokHabis() {
        LibraryService service = new LibraryService();
        service.tambahBuku("111", "Laskar Pelangi", "Andrea Hirata", 1);
        service.daftarkanAnggota("A-001");
        service.daftarkanAnggota("A-002");
        service.pinjam("A-001", "111");

        assertThrows(BukuSedangDipinjamException.class, () -> {
            service.pinjam("A-002", "111");
        }, "Harus melempar BukuSedangDipinjamException jika stok sudah 0");
    }

    @Test
    @DisplayName("Skenario 5: Exception: Batas pinjam tercapai melempar BatasPinjamTerlampauiException")
    void exceptionBatasPinjamTerlampaui() {
        LibraryService service = new LibraryService();
        service.tambahBuku("222", "Bumi Manusia", "Pramoedya", 5);
        service.daftarkanAnggota("A-001");
        for (int i = 0; i < LibraryService.BATAS_PINJAM; i++) {
            service.pinjam("A-001", "222");
        }

        assertThrows(BatasPinjamTerlampauiException.class, () -> {
            service.pinjam("A-001", "222");
        }, "Harus melempar BatasPinjamTerlampauiException jika sudah mencapai batas");
    }
}
