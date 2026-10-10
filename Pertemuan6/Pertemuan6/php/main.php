<?php
declare(strict_types=1);

require_once __DIR__ . '/abstraksi.php';

/** Tidak peduli kelas konkretnya — hanya peduli kontraknya. */
function isiPenuh(Fuelable $kendaraan): void
{
    $kendaraan->isiBahanBakar($kendaraan->kapasitasTangki());
    $biaya = $kendaraan->tipeBahanBakar()->biayaPengisian($kendaraan->kapasitasTangki());
    printf('  Diisi penuh %s — biaya Rp%s%s',
        $kendaraan->tipeBahanBakar()->label(),
        number_format($biaya, 0, ',', '.'), PHP_EOL);
}

$mobil = new Mobil('Toyota Avanza', 2022, 45);
$sepeda = new Sepeda('Polygon', 2024);

echo '=== Semua Movable ===', PHP_EOL;
echo '', PHP_EOL;
foreach ([$mobil, $sepeda] as $m) {
    $m->bergerak();
    printf('    kecepatan maksimum %.0f km/jam%s', $m->kecepatanMaksimum(), PHP_EOL);
}

echo PHP_EOL . "=== Hanya yang Fuelable ===\n";
isiPenuh($mobil);

echo PHP_EOL, '=== Enum punya perilaku ===', PHP_EOL;
foreach (TipeBahanBakar::cases() as $t) {
    printf('  %-8s ramah lingkungan? %-5s  biaya 10 satuan: Rp%s%s',
        $t->label(),
        $t->ramahLingkungan() ? 'ya' : 'tidak',
        number_format($t->biayaPengisian(10), 0, ',', '.'), PHP_EOL);
}

echo PHP_EOL, '=== Trait dipakai kelas yang tidak sekerabat ===', PHP_EOL;
$mobil->log('servis berkala selesai');
echo 'pesanan #1042 dibuat', PHP_EOL;
