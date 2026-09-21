<?php
declare(strict_types=1);

class RekeningBank
{
    public const BUNGA_TAHUNAN = 0.025;
    public const BIAYA_ADMIN = 5000.0;
    public const BATAS_TARIK_SEKALI = 5_000_000.0;

    private static int $jumlahRekening = 0;

    private float $saldo;

    public function __construct(
        private readonly string $nomor,
        private readonly string $pemilik,
        float $saldoAwal = 0,
    ) {
        if (trim($this->nomor) === '') {
            throw new InvalidArgumentException('Nomor rekening tidak boleh kosong');
        }
        // is_finite menolak NAN dan INF; sisanya menolak negatif
        if (!is_finite($saldoAwal) || $saldoAwal < 0) {
            throw new InvalidArgumentException('Saldo awal harus angka valid dan tidak negatif');
        }

        $this->saldo = $saldoAwal;
        self::$jumlahRekening++; // hanya tercapai jika semua validasi lolos
    }

    public static function rekeningPelajar(string $nomor, string $pemilik): static
    {
        return new static($nomor, $pemilik, 0);
    }

    public function setor(float $jumlah): void
    {
        if (!is_finite($jumlah) || !($jumlah > 0)) {
            throw new InvalidArgumentException('Jumlah setoran harus angka valid lebih dari 0');
        }
        $this->saldo += $jumlah;
    }

    public function tarik(float $jumlah): void
    {
        if (!is_finite($jumlah) || !($jumlah > 0)) {
            throw new InvalidArgumentException('Jumlah penarikan harus angka valid lebih dari 0');
        }
        if ($jumlah > self::BATAS_TARIK_SEKALI) {
            throw new InvalidArgumentException(
                'Penarikan melebihi batas sekali transaksi (Rp'
                . number_format(self::BATAS_TARIK_SEKALI, 0, ',', '.') . ')'
            );
        }
        if ($jumlah > $this->saldo) {
            throw new RuntimeException('Saldo tidak mencukupi');
        }
        $this->saldo -= $jumlah;
    }

    public function potongBiayaAdmin(): void
    {
        $this->saldo = max(0.0, $this->saldo - self::BIAYA_ADMIN);
    }

    public static function getJumlahRekening(): int
    {
        return self::$jumlahRekening;
    }

    public static function bungaSetahun(float $pokok): float
    {
        return $pokok * self::BUNGA_TAHUNAN;
    }

    public function getSaldo(): float { return $this->saldo; }
    public function getNomor(): string { return $this->nomor; }

    public function __toString(): string
    {
        return sprintf('Rekening[%s] %-14s Rp%s',
            $this->nomor, $this->pemilik, number_format($this->saldo, 2, ',', '.'));
    }
}