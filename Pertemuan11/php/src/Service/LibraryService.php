<?php
namespace Perpustakaan\Service;

use Perpustakaan\Exception\AnggotaTidakDitemukanException;
use Perpustakaan\Exception\BukuTidakDitemukanException;
use Perpustakaan\Exception\BukuSedangDipinjamException;
use Perpustakaan\Exception\BatasPinjamTerlampauiException;
use Perpustakaan\Model\Buku;
use Perpustakaan\Repository\KoleksiBuku;

final class LibraryService
{
    public const BATAS_PINJAM = 3;

    private KoleksiBuku $koleksiBuku;
    /** @var array<string,int> */
    private array $pinjaman = [];

    public function __construct()
    {
        $this->koleksiBuku = new KoleksiBuku();
    }

    public function tambahBuku(string $isbn, string $judulBuku, string $penulis, int $eksemplar): void
    {
        $buku = $this->koleksiBuku->cariByIsbn($isbn);

        if($buku !== null){
            for($i = 0; $i < $eksemplar; $i++){
                $buku->tambahStok();
            }
        } else {
            $bukuBaru = new Buku($isbn, $judulBuku, $penulis, $eksemplar);
            $this->koleksiBuku->simpan($bukuBaru);
        }
    }

    public function daftarkanAnggota(string $idAnggota): void
    {
        $this->pinjaman[$idAnggota] ??= 0;
    }

    /**
     * @throws AnggotaTidakDitemukanException jika anggota belum terdaftar
     * @throws BukuTidakDitemukanException    jika ISBN tidak ada di katalog
     * @throws BukuSedangDipinjamException    jika tidak ada eksemplar tersisa
     * @throws BatasPinjamTerlampauiException jika anggota sudah mencapai batas
     */
    public function pinjam(string $idAnggota, string $isbn): void
    {
        if (!array_key_exists($idAnggota, $this->pinjaman)) {
            throw new AnggotaTidakDitemukanException($idAnggota);
        }

        // Cari buku melalui KoleksiBuku
        $bukuDipinjam = $this->koleksiBuku->cariByIsbn($isbn);

        if ($bukuDipinjam === null) {
            throw new BukuTidakDitemukanException($isbn);
        }

        if (!$bukuDipinjam->tersedia()) {
            throw new BukuSedangDipinjamException($isbn, $bukuDipinjam->getJudul());
        }

        if ($this->pinjaman[$idAnggota] >= self::BATAS_PINJAM) {
            throw new BatasPinjamTerlampauiException($idAnggota, self::BATAS_PINJAM);
        }

        $bukuDipinjam->kurangiStok();
        $this->pinjaman[$idAnggota]++;
    }

    public function sisaEksemplar(string $isbn): int
    {
        $buku = $this->koleksiBuku->cariByIsbn($isbn);

        $sisaEksampelar = 0;

        if ($buku !== null){
            $sisaEksampelar = $buku->getJumlahEksampelar();
        }

        return $sisaEksampelar;
    }

    public function getSemuaJudul(): array
    {
        $semuaJudul = [];
        foreach ($this->koleksiBuku->semua() as $buku) {
            $semuaJudul[$buku->getNomorInduk()] = $buku->getJudul();
        }
        return $semuaJudul;

    }

    /**
     * 
     * @return Buku[]
     */
    public function getBukuTersedia(): array
    {
        return $this->koleksiBuku->filter(fn(Buku $b) => $b->tersedia())->semua();
    }

    /**
     * 
     */
    public function getSemuaJudulDigabung(): string
    {
        // map akan mengubah objek Buku menjadi string (judul saja)
        $daftarJudul = $this->koleksiBuku->map(fn(Buku $b) => $b->getJudul());
        return implode(", ", $daftarJudul); // Gabungkan array dengan koma
    }

    /**
     * 
     * @return array<string,int>
     */
    public function getJumlahBukuPerPenulis(): array
    {
        $dikelompokkan = $this->koleksiBuku->kelompokkan(fn(Buku $b) => $b->getPenulis());
        
        $hasil = [];
        foreach ($dikelompokkan as $penulis => $daftarBuku) {
            $hasil[$penulis] = count($daftarBuku);
        }
        return $hasil;
    }
}
