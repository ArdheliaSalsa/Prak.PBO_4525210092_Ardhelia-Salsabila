<?php
declare(strict_types=1);

class Mahasiswa
{
    public const BOBOT_TUGAS = 0.30;
    public const BOBOT_UTS   = 0.30;
    public const BOBOT_UAS   = 0.40;

    private const NILAI_MIN = 0;
    private const NILAI_MAX = 100;

    public function __construct(
        private readonly string $nim,
        private readonly string $nama,
        private float $nilaiTugas,
        private float $nilaiUts,
        private float $nilaiUas,
    ) {
        if (trim($this->nim) === '') {
            throw new InvalidArgumentException('NIM tidak boleh kosong');
        }

        self::pastikanNilaiSah('tugas', $this->nilaiTugas);
        self::pastikanNilaiSah('UTS', $this->nilaiUts);
        self::pastikanNilaiSah('UAS', $this->nilaiUas);
    }

    private static function pastikanNilaiSah(string $namaKomponen, float $nilai): void
    {
        if ($nilai < self::NILAI_MIN || $nilai > self::NILAI_MAX) {
            throw new InvalidArgumentException(
                sprintf('Nilai %s harus di antara %s dan %s, diberikan: %s',
                    $namaKomponen, self::NILAI_MIN, self::NILAI_MAX, $nilai)
            );
        }
    }

    public function nilaiAkhir(): float
    {
        return $this->nilaiTugas * self::BOBOT_TUGAS
             + $this->nilaiUts * self::BOBOT_UTS
             + $this->nilaiUas * self::BOBOT_UAS;
    }

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

    public function getNim(): string  { return $this->nim; }
    public function getNama(): string { return $this->nama; }
    public function getNilaiAkhir(): float { return $this->nilaiAkhir(); }

    public function __toString(): string
    {
        return sprintf('%-10s %-18s akhir=%6.2f  mutu=%s',
            $this->nim, $this->nama, $this->nilaiAkhir(), $this->hurufMutu());
    }
}

// Instansiasi Objek & Pengujian Output
try {
    $mhs = new Mahasiswa("4525210092", "Ardhelia Salsabila", 85.5, 90.0, 88.0);
    echo "<h1>Data Mahasiswa</h1>";
    echo "NIM: " . $mhs->getNim() . "<br>";
    echo "Nama: " . $mhs->getNama() . "<br>";
    echo "Nilai Akhir: " . $mhs->getNilaiAkhir() . "<br>";
    echo "Huruf Mutu: " . $mhs->hurufMutu() . "<br><hr>";
    echo "<pre>" . $mhs . "</pre>";
} catch (InvalidArgumentException $e) {
    echo "Error Validasi: " . $e->getMessage();
}
