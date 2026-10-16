<?php
declare(strict_types=1);

/**
 * Sesi 7 — komposisi dan agregasi (PHP).
 * Bandingkan dengan versi Java.
 */

final class Bab
{
    /**
     * TODO 1: buat constructor readonly untuk $nomor dan $judul.
     *         Perhatikan: agar benar-benar komposisi, kelas ini hanya
     *         boleh dibuat dari dalam Buku. PHP tidak punya nested class
     *         seperti Java, jadi disiplin ini dijaga lewat konvensi —
     *         tuliskan catatannya di bukti-relasi.md.
     */

    public function __construct(
        private readonly int $nomor,
        private readonly string $judul,
    ) {}

    public function getNomor(): int { 
        return $this->nomor; }

        public function getjudul(): string { 
            return $this->judul; }
    public function __toString(): string
    {
        return 'Bab' . $this->nomor . ': ' . $this->judul;
    }
}

final class Buku
{
    /** @var Bab[] */
    private array $bab = [];

    public function __construct(
        private readonly string $nomorInduk,
        private readonly string $judul,
        private readonly string $penulis,
        private int $jumlahEksemplar,
    ) {
        // TODO 2: tolak jumlah eksemplar negatif.
        if ($jumlahEksemplar <0) {
            throw new Error ('Jumlah eksemplar tidak boleh negatif');
        }
    }

    /** TODO 3: satu-satunya cara Bab lahir. Parameternya nomor dan judul, bukan objek Bab. */
    public function tambahBab(int $nomor, string $judulBab): void
    {
        array_push($this->bab, new Bab($nomor, $judulBab));
    }

    /**
     * PHP mengembalikan array secara by-value, sehingga pemanggil hanya
     * memperoleh salinan larik-nya. Namun objek DI DALAMNYA tetap berbagi
     * referensi — itulah sebabnya Bab dibuat readonly.
     * Tuliskan penjelasan ini di bukti-relasi.md.
     *
     * @return Bab[]
     */
    public function getBab(): array { return $this->bab; }

    public function tersedia(): bool { return $this->jumlahEksemplar > 0; }

    /** TODO 4 */
    public function kurangiStok(): void {
        if ($this->jumlahEksemplar < 0) {
            throw new Error ('Jumlah eksemplaer = 0');
        }
        $this->jumlahEksemplar--;
    }

    public function tambahStok(): void { $this->jumlahEksemplar++; }

    public function getNomorInduk(): string { return $this->nomorInduk; }
    public function getJudul(): string { return $this->judul; }

    public function __toString(): string
    {
        return sprintf('%-32s %-16s [%d eks, %d bab]',
            $this->judul, $this->penulis, $this->jumlahEksemplar, count($this->bab));
    }
}

final class Mahasiswa
{
    public function __construct(
        private readonly string $nim,
        private readonly string $nama,
    ) {}

    public function getNim(): string { return $this->nim; }
    public function __toString(): string { return $this->nim . ' ' . $this->nama; }
}

final class Jurusan
{
    /** @var Mahasiswa[] */
    private array $mahasiswa = [];

    public function __construct(
        private readonly string $kode,
        private readonly string $nama,
    ) {}

    /** TODO 5: terima objek dari luar (agregasi). Jangan menambahkan duplikat. */
    public function daftarkan(Mahasiswa $m): void {
        array_push($this->mahasiswa, $m);
    }

    /** TODO 6: lepaskan dari jurusan. Objeknya tetap hidup. */
    public function keluarkan(Mahasiswa $m): void {
        $key = array_search($m, $this->mahasiswa, true);
        if ($key !== false) {
            unset($this->mahasiswa[$key]);
            $this->mahasiswa = array_values($this->mahasiswa);
        }
    }

    /** @return Mahasiswa[] */
    public function getMahasiswa(): array { return $this->mahasiswa; }

    public function __toString(): string
    {
        return sprintf('%s - %s (%d mahasiswa)', $this->kode, $this->nama, count($this->mahasiswa));
    }
}
