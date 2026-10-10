<?php
declare(strict_types=1);

// ══ INTERFACE — kontrak "apa yang bisa dilakukan" ═══════════════
interface Movable
{
    public function bergerak(): void;
    public function kecepatanMaksimum(): float;
}

interface Fuelable
{
    public function isiBahanBakar(float $jumlah): void;
    public function kapasitasTangki(): float;
    public function tipeBahanBakar(): TipeBahanBakar;
}

// ══ ENUM (PHP 8.1+) — backed enum, punya nilai string ══════════
enum TipeBahanBakar: string
{
    case Bensin  = 'bensin';
    case Solar   = 'solar';
    case Listrik = 'listrik';

    public function label(): string
    {
        return match ($this) {
            self::Bensin => 'Bensin',
            self::Solar => 'Solar',
            self::Listrik => 'Listrik',
        };
    }

    public function hargaPerSatuan(): float
    {
        return match ($this) {
            self::Bensin => 12000.0,
            self::Solar => 10500.0,
            self::Listrik => 2500.0,
        };
    }

    public function biayaPengisian(float $jumlah): float
    {
        return $jumlah * $this->hargaPerSatuan();
    }

    public function ramahLingkungan(): bool
    {
        return $this === self::Listrik;
    }
}

// ══ TRAIT — penggunaan ulang horizontal, khas PHP ══════════════
trait Loggable
{
    public function log(string $pesan): void
    {
        echo sprintf('[%s] %s: %s' . PHP_EOL, date('H:i:s'), static::class, $pesan);
    }
}

// ══ ABSTRACT CLASS — kode yang benar-benar sama ═══════════════
abstract class Kendaraan
{
    public function __construct(
        protected readonly string $merek,
        protected readonly int    $tahun,
    ) {}

    public function umur(int $tahunSekarang): int
    {
        return max(0, $tahunSekarang - $this->tahun);
    }

    abstract public function jumlahRoda(): int;

    public function __toString(): string
    {
        return sprintf('%s (%d, %d roda)', $this->merek, $this->tahun, $this->jumlahRoda());
    }
}

final class Mobil extends Kendaraan implements Movable, Fuelable
{
    use Loggable;

    private float $isiTangki = 0;

    public function __construct(string $merek, int $tahun, private readonly float $kapasitas)
    {
        parent::__construct($merek, $tahun);
    }

    public function jumlahRoda(): int { return 4; }

    public function bergerak(): void
    {
        $this->log('mobil mulai bergerak');
    }

    public function kecepatanMaksimum(): float
    {
        return 180.0;
    }

    public function isiBahanBakar(float $jumlah): void
    {
        if ($jumlah < 0) {
            throw new InvalidArgumentException('Jumlah bahan bakar tidak boleh negatif.');
        }

        $this->isiTangki = min($this->kapasitas, $this->isiTangki + $jumlah);
    }

    public function kapasitasTangki(): float { return $this->kapasitas; }
    public function tipeBahanBakar(): TipeBahanBakar { return TipeBahanBakar::Bensin; }
    public function getIsiTangki(): float { return $this->isiTangki; }
}

class Sepeda extends Kendaraan implements Movable
{
    use Loggable;

    public function __construct(string $merek, int $tahun)
    {
        parent::__construct($merek, $tahun);
    }

    public function jumlahRoda(): int { return 2; }

    public function bergerak(): void
    {
        $this->log('sepeda mulai dikayuh');
    }

    public function kecepatanMaksimum(): float
    {
        return 35.0;
    }
}

class Pesanan
{
    use Loggable;

    public function __construct(
        public readonly string $nomor,
        public readonly float $total,
    ) {}

    public function __toString(): string
    {
        return sprintf('Pesanan %s: Rp %.2f', $this->nomor, $this->total);
    }
}
