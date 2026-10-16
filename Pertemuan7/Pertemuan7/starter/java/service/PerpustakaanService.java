package service;

import java.util.ArrayList;
import model.Buku;

/**
 * Kerangka lapisan layanan.
 * Pada sesi 7 cukup struktur dan tanda tangan method; isinya boleh minimal.
 * Lapisan ini akan diperdalam pada sesi 10 (exception) dan 12 (SOLID).
 *
 * TODO: sesuaikan seluruh isi berkas ini dengan class diagram Anda sendiri.
 *       Kelas dan method di sini hanya contoh awal.
 */
public class PerpustakaanService {

    // Agregasi: layanan menyimpan referensi Buku yang siklus hidupnya mandiri,
    // sehingga Buku tetap dapat ada meskipun layanan ini dihapus.
    private ArrayList<Buku> buku = new ArrayList<>();


    public void tambahKoleksi(Buku buku) {
        // TODO 2
        this.buku.add(buku);
    }

    public Buku cariKoleksi(String nomorInduk) {
        // TODO 3
        for (Buku buku :this.buku) {
            if (buku.getNomorInduk().equals(nomorInduk)) {
                return buku;
            }
        }
        return null;
    }

    public void pinjam(String nomorAnggota, String nomorInduk) {
        System.out.printf("anggota"+ nomorAnggota +  "Meminjam buku"+ nomorInduk);
        // TODO 4: terapkan aturan bisnis dari deskripsi-kebutuhan.md.
        //         Aturan lengkapnya akan disempurnakan pada sesi 10.
    }

    public void kembalikan(String nomorAnggota, String nomorInduk) {
        // TODO 5
        System.out.printf("anggota"+ nomorAnggota +  "Mengembalikan buku"+ nomorInduk);
    }
}