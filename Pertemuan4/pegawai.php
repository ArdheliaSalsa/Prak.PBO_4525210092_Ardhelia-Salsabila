<?php
declare(strict_types=1);

/**
 * Sesi 4 — hierarki pegawai (PHP).
 * Seluruh hierarki ditaruh dalam satu berkas agar mudah dibaca berdampingan
 * dengan versi Java. Mulai sesi 9, satu kelas = satu berkas.
 */
abstract class Pegawai
{
    public function __construct(
        protected readonly string $nip,
        protected readonly string $nama,
        protected readonly float  $gajiPokok,
    ) {
        // TODO 1: tolak gaji pokok negatif.
        if ($gajiPokok < 0) {
            throw new InvalidArgumentException('Gaji pokok tidak boleh negatif.');
        }
    }

    /** TODO 2: kembalikan gaji pokok apa adanya. */
    public function hitungGaji(): float
    {
        return $this->gajiPokok;
    }

    abstract public function jenis(): string;

    public function getNama(): string { return $this->nama; }
    public function getNip(): string  { return $this->nip; }

    public function __toString(): string
    {
        return sprintf('%-14s %-9s %-20s Rp%s',
            $this->nip, $this->jenis(), $this->nama,
            number_format($this->hitungGaji(), 2, ',', '.'));
    }
}

class PegawaiTetap extends Pegawai
{
    protected const TUNJANGAN_PER_TAHUN = 0.02;
    protected const TUNJANGAN_MAKSIMUM  = 0.40;

    public function __construct(
        string $nip, string $nama, float $gajiPokok,
        protected readonly int $masaKerjaTahun,
    ) {
        // WAJIB. TODO 3 (Langkah 3): hapus sementara baris ini,
        //         jalankan, salin pesan kesalahannya, lalu kembalikan.
        parent::__construct($nip, $nama, $gajiPokok);

        if ($masaKerjaTahun < 0) {
            throw new InvalidArgumentException('Masa kerja tidak boleh negatif.');
        }
    }

    /**
     * TODO 4: gaji dasar induk + tunjangan masa kerja.
     *         Gunakan parent::hitungGaji(), jangan menyalin rumusnya.
     */
    public function hitungGaji(): float
    {
        $dasar = parent::hitungGaji();
        $persen = min(
            $this->masaKerjaTahun * self::TUNJANGAN_PER_TAHUN,
            self::TUNJANGAN_MAKSIMUM
        );

        return $dasar + $dasar * $persen;
    }

    public function jenis(): string { return 'TETAP'; }
}

class PegawaiKontrak extends Pegawai
{
    public function __construct(
        string $nip, string $nama, float $gajiPokok,
        private readonly int $bulanKontrak,
    ) {
        parent::__construct($nip, $nama, $gajiPokok);
    }

    public function jenis(): string { return 'KONTRAK'; }

    public function getBulanKontrak(): int { return $this->bulanKontrak; }
}

/** Dosen: pegawai tetap + tunjangan fungsional (nominal tetap). */
class Dosen extends PegawaiTetap
{
    public function __construct(
        string $nip, string $nama, float $gajiPokok, int $masaKerjaTahun,
        private readonly float $tunjanganFungsional,
    ) {
        parent::__construct($nip, $nama, $gajiPokok, $masaKerjaTahun);

        if ($tunjanganFungsional < 0) {
            throw new InvalidArgumentException('Tunjangan fungsional tidak boleh negatif.');
        }
    }

    public function hitungGaji(): float
    {
        return parent::hitungGaji() + $this->tunjanganFungsional;
    }

    public function jenis(): string { return 'DOSEN'; }
}

/** Pegawai harian: $gajiPokok diperlakukan sebagai upah per hari kerja. */
class PegawaiHarian extends Pegawai
{
    public function __construct(
        string $nip, string $nama, float $upahPerHari,
        private readonly int $hariKerja,
    ) {
        parent::__construct($nip, $nama, $upahPerHari);

        if ($hariKerja < 0) {
            throw new InvalidArgumentException('Hari kerja tidak boleh negatif.');
        }
    }

    public function hitungGaji(): float
    {
        return parent::hitungGaji() * $this->hariKerja;
    }

    public function jenis(): string { return 'HARIAN'; }
}
