package id.ac.univpancasila.perpustakaan.service;

import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.Optional;
import java.util.stream.Collectors;

import id.ac.univpancasila.perpustakaan.exception.AnggotaTidakDitemukanException;
import id.ac.univpancasila.perpustakaan.exception.BatasPinjamTerlampauiException;
import id.ac.univpancasila.perpustakaan.exception.BukuSedangDipinjamException;
import id.ac.univpancasila.perpustakaan.exception.BukuTidakDitemukanException;
import id.ac.univpancasila.perpustakaan.model.Buku;
import id.ac.univpancasila.perpustakaan.repository.Repository;

public class LibraryService {

    public static final int BATAS_PINJAM = 3;

    private  final Repository<Buku> bukuRepository = new Repository<>(Buku::getNomorInduk);
    private final Map<String, Integer> pinjaman = new HashMap<>();

    public void tambahBuku(String isbn, String judulBuku, String penulis, int eksemplar) {

        Optional<Buku> bukuOpt = bukuRepository.cariById(isbn);

        if (bukuOpt.isPresent()){
            Buku bukuLama = bukuOpt.get();

            for (int i = 0; i < eksemplar; i++) {
                bukuLama.tambahStok();
            }
        } else {
            Buku bukuBaru = new Buku(isbn, judulBuku, penulis, eksemplar);
            bukuRepository.simpan(bukuBaru);
        }
    }

    public void daftarkanAnggota(String idAnggota) {
        pinjaman.putIfAbsent(idAnggota, 0);
    }


    public boolean pinjam(String idAnggota, String isbn) {
        if (!pinjaman.containsKey(idAnggota)) {
            throw new AnggotaTidakDitemukanException(idAnggota);
        }
        Buku bukuDiPinjam = bukuRepository.cariById(isbn)
                        .orElseThrow(() -> new BukuTidakDitemukanException(isbn));

        if (!bukuDiPinjam.tersedia()){
            throw new BukuSedangDipinjamException(isbn, bukuDiPinjam.getJudul());
        }

        if (pinjaman.get(idAnggota) >= BATAS_PINJAM){
            throw new BatasPinjamTerlampauiException(idAnggota, BATAS_PINJAM);
        }

        bukuDiPinjam.kurangiStok();
        pinjaman.merge(idAnggota, 1, Integer::sum);
        return true;
    }

    public int sisaEksemplar(String isbn) {
        Optional<Buku> bukuOpt = bukuRepository.cariById(isbn);

        if (bukuOpt.isPresent()){
            return  bukuOpt.get().getJumlahEksemplar();
        }

        return 0;
    }

    public String judulDari(String isbn) {
        Optional<Buku> bukuOpt = bukuRepository.cariById(isbn);

        if (bukuOpt.isPresent()) {
            return bukuOpt.get().getJudul();
        }
        return null; // Kembalikan null jika buku tidak ditemukan
    }

    public Map<String, String> getSemuaJudul() {
        Map<String, String> semuaJudul = new HashMap<>();

        List<Buku> semuaBuku = bukuRepository.cariSemua();

        for (Buku buku: semuaBuku) {
            semuaJudul.put(buku.getNomorInduk(), buku.getJudul());
        }

        return semuaJudul;
    }

    public List<Buku> getBukuTersedia() {
        return bukuRepository.cariSemua().stream()
                .filter(Buku::tersedia) // Menyaring buku yang stoknya > 0
                .collect(Collectors.toList());
    }

    public String getSemuaJudulDigabung() {
        return bukuRepository.cariSemua().stream()
                .map(Buku::getJudul) // Mengubah aliran objek Buku menjadi aliran String (Judul saja)
                .collect(Collectors.joining(", ")); // Menggabungkan semuanya dengan koma dan spasi
    }

    public Map<String, Long> getJumlahBukuPerPenulis() {
        return bukuRepository.cariSemua().stream()
                .collect(Collectors.groupingBy(
                        Buku::getPenulis, // Dikelompokkan berdasarkan nama penulis
                        Collectors.counting() // Dihitung jumlahnya
                ));
    }
}
