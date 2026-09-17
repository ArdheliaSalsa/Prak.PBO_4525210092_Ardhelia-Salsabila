<?php
declare(strict_types=1);

/**
 * Sesi 2 — enkapsulasi yang menjaga invariant (PHP).
 * Bandingkan baris demi baris dengan java/Mahasiswa.java.
 */
class Mahasiswa
{
    public const float BOBOT_TUGAS = 0.30;
    public const float BOBOT_UTS   = 0.30;
    public const float BOBOT_UAS   = 0.40;

    private const float NILAI_MIN = 0;
    private const float NILAI_MAX = 100;

    /**
     * Constructor property promotion (PHP 8):
     * readonly adalah padanan `final` pada atribut Java.
     *
     * TODO 1: nim & nama readonly (tidak berubah), nilai tidak readonly.
     */
    public function __construct(
        private readonly string $nim,
        private readonly string $nama,
        private float $nilaiTugas,
        private float $nilaiUts,
        private float $nilaiUas,
    ) {
        // TODO 2: tolak NIM yang kosong (setelah di-trim).
        if (trim($this->nim) === '') {
            throw new InvalidArgumentException('NIM tidak boleh kosong');
        }

        // TODO 3: tolak setiap komponen nilai di luar rentang 0-100.
        self::pastikanNilaiSah('tugas', $this->nilaiTugas);
        self::pastikanNilaiSah('UTS', $this->nilaiUts);
        self::pastikanNilaiSah('UAS', $this->nilaiUas);
    }

    /**
     * TODO 4: validasi satu komponen nilai.
     */
    private static function pastikanNilaiSah(string $namaKomponen, float $nilai): void
    {
        if ($nilai < self::NILAI_MIN || $nilai > self::NILAI_MAX) {
            throw new InvalidArgumentException(
                sprintf('Nilai %s harus di antara %s dan %s, diberikan: %s',
                    $namaKomponen, self::NILAI_MIN, self::NILAI_MAX, $nilai)
            );
        }
    }

    /** TODO 5: hitung nilai akhir memakai konstanta bobot. */
    public function nilaiAkhir(): float
    {
        return $this->nilaiTugas * self::BOBOT_TUGAS
             + $this->nilaiUts * self::BOBOT_UTS
             + $this->nilaiUas * self::BOBOT_UAS;
    }

    /** TODO 6: kembalikan huruf mutu. */
    public function hurufMutu(): string
    {
        $akhir = $this->nilaiAkhir();
        return match (true) {
            $akhir >= 80 => 'A',
            $akhir >= 70 => 'B',
            $akhir >= 60 => 'C',
            $akhir >= 50 => 'D',
            default => 'E',
        };
    }

    // TODO 7: getter seperlunya. Tidak ada setNim().
    public function getNim(): string  { return $this->nim; }
    public function getNama(): string { return $this->nama; }
    public function getNilaiAkhir(): float { return $this->nilaiAkhir(); }

    public function __toString(): string
    {
        return sprintf('%-10s %-18s akhir=%6.2f  mutu=%s',
            $this->nim, $this->nama, $this->nilaiAkhir(), $this->hurufMutu());
    }
}
