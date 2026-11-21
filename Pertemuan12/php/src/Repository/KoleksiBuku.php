<?php

declare(strict_types=1);

namespace Perpustakaan\Repository;

use Countable;
use Perpustakaan\Model\Buku;

/**
 * Sesi 11 — padanan Repository<Buku> di Java.
 *
 * PHP tidak punya generics sungguhan, jadi kelas ini khusus untuk Buku dan
 * tipe itu dijaga lewat type hint pada parameter. Operasi fungsional
 * (filter, map, kelompokkan, jumlahkan) menerima callable, sama seperti
 * Java menerima Function/Predicate.
 *
 * Implements Countable agar count($koleksi) dan assertCount() bisa dipakai.
 */
final class KoleksiBuku implements Countable
{
    /** @var array<string,Buku> kunci = nomor induk (ISBN) */
    private array $data = [];

    /** Simpan buku. ISBN yang sama menimpa data lama. */
    public function simpan(Buku $buku): void
    {
        $this->data[$buku->getNomorInduk()] = $buku;
    }

    /** Kembalikan null (bukan exception) bila ISBN tidak ada. */
    public function cariByIsbn(string $isbn): ?Buku
    {
        return $this->data[$isbn] ?? null;
    }

    /** Hapus buku; true bila ada yang terhapus. */
    public function hapus(string $isbn): bool
    {
        if (!array_key_exists($isbn, $this->data)) {
            return false;
        }

        unset($this->data[$isbn]);
        return true;
    }

    /**
     * Salinan array berurutan (0, 1, 2, ...) dari seluruh isi.
     * Array PHP dikembalikan by-value, jadi koleksi internal tidak bocor.
     *
     * @return Buku[]
     */
    public function semua(): array
    {
        return array_values($this->data);
    }

    public function count(): int
    {
        return count($this->data);
    }

    /**
     * Saring buku yang lolos predikat. Hasilnya KoleksiBuku baru,
     * sehingga bisa dirantai: $k->filter(...)->semua().
     *
     * @param callable(Buku): bool $predikat
     */
    public function filter(callable $predikat): self
    {
        $hasil = new self();

        foreach ($this->data as $buku) {
            if ($predikat($buku)) {
                $hasil->simpan($buku);
            }
        }

        return $hasil;
    }

    /**
     * Ubah tiap buku menjadi nilai lain (mis. judulnya saja).
     *
     * @template R
     * @param callable(Buku): R $pengubah
     * @return R[]
     */
    public function map(callable $pengubah): array
    {
        return array_map($pengubah, $this->semua());
    }

    /**
     * Kelompokkan buku berdasarkan kunci hasil $pengambilKunci.
     *
     * @param callable(Buku): string $pengambilKunci
     * @return array<string,Buku[]>
     */
    public function kelompokkan(callable $pengambilKunci): array
    {
        $hasil = [];

        foreach ($this->data as $buku) {
            $hasil[$pengambilKunci($buku)][] = $buku;
        }

        return $hasil;
    }

    /**
     * Jumlahkan nilai numerik hasil $pengambilNilai dari semua buku.
     *
     * @param callable(Buku): (int|float) $pengambilNilai
     */
    public function jumlahkan(callable $pengambilNilai): float
    {
        $total = 0.0;

        foreach ($this->data as $buku) {
            $total += $pengambilNilai($buku);
        }

        return $total;
    }
}
