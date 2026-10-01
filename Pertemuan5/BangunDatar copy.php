<?php
declare(strict_types=1);

abstract class BangunDatar
{
    public function __construct(private readonly string $nama) {}

    abstract public function luas(): float;
    abstract public function keliling(): float;

    public function getNama(): string { return $this->nama; }

    public function __toString(): string
    {
        return sprintf('%-12s luas=%10.2f  keliling=%10.2f',
            $this->nama, $this->luas(), $this->keliling());
    }
}

class Lingkaran extends BangunDatar
{
    public function __construct(private readonly float $jariJari)
    {
        parent::__construct('Lingkaran');
        if ($jariJari <= 0) {
            throw new InvalidArgumentException('Jari-jari harus lebih besar dari 0.');
        }
    }

    // Luas dan keliling lingkaran menggunakan konstanta M_PI.
    public function luas(): float     { return M_PI * $this->jariJari ** 2; }
    public function keliling(): float { return 2 * M_PI * $this->jariJari; }

    public function getJariJari(): float { return $this->jariJari; }
}

class Persegi extends BangunDatar
{
    public function __construct(private readonly float $sisi)
    {
        parent::__construct('Persegi');
        if ($sisi <= 0) {
            throw new InvalidArgumentException('Sisi harus lebih besar dari 0.');
        }
    }

    // TODO 2: lengkapi.
    public function luas(): float     { return $this->sisi ** 2; }
    public function keliling(): float { return 4 * $this->sisi; }
}

// TODO Langkah 2: buat kelas Segitiga (tiga sisi, rumus Heron).
//                 Tolak konstruksi bila ketiga sisi tidak membentuk segitiga.
class Segitiga extends BangunDatar
{
    public function __construct(
        private readonly float $sisiA,
        private readonly float $sisiB,
        private readonly float $sisiC
    ) {
        parent::__construct('Segitiga');

        if ($sisiA <= 0 || $sisiB <= 0 || $sisiC <= 0
            || $sisiA + $sisiB <= $sisiC
            || $sisiA + $sisiC <= $sisiB
            || $sisiB + $sisiC <= $sisiA) {
            throw new InvalidArgumentException('Ketiga sisi harus membentuk segitiga.');
        }
    }

    public function luas(): float
    {
        $s = $this->keliling() / 2;
        return sqrt($s * ($s - $this->sisiA) * ($s - $this->sisiB) * ($s - $this->sisiC));
    }

    public function keliling(): float
    {
        return $this->sisiA + $this->sisiB + $this->sisiC;
    }
}

class Trapesium extends BangunDatar
{
    public function __construct(
        private readonly float $sisiAtas,
        private readonly float $sisiBawah,
        private readonly float $sisiKiri,
        private readonly float $sisiKanan,
        private readonly float $tinggi
    ) {
        parent::__construct('Trapesium');

        if ($sisiAtas <= 0 || $sisiBawah <= 0 || $sisiKiri <= 0 || $sisiKanan <= 0 || $tinggi <= 0) {
            throw new InvalidArgumentException('Semua ukuran trapesium harus lebih besar dari 0.');
        }
    }

    public function luas(): float
    {
        return (($this->sisiAtas + $this->sisiBawah) / 2) * $this->tinggi;
    }

    public function keliling(): float
    {
        return $this->sisiAtas + $this->sisiBawah + $this->sisiKiri + $this->sisiKanan;
    }

    public function getSisiAtas(): float { return $this->sisiAtas; }
    public function getSisiBawah(): float { return $this->sisiBawah; }
    public function getSisiKiri(): float { return $this->sisiKiri; }
    public function getSisiKanan(): float { return $this->sisiKanan; }
    public function getTinggi(): float { return $this->tinggi; }
}
