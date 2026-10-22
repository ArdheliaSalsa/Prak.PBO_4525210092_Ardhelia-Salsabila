import java.time.LocalDate;

public class Nota {
    private static int counter = 0;
    public static final String NAMA_TOKO = "LAUNDRY BERSIH";

    private String noNota;
    private LocalDate tanggal;
    private Pelanggan pelanggan;
    private Layanan layanan;

    public Nota(Pelanggan pelanggan, Layanan layanan) {
        counter++;
        this.noNota = String.format("LD-%03d", counter);
        this.tanggal = LocalDate.now();
        this.pelanggan = pelanggan;
        this.layanan = layanan;
    }

    public static int getJumlahNota() { return counter; }

    public double getTotal() {
        double biaya = layanan.hitungBiaya();
        return biaya - pelanggan.hitungDiskon(biaya);
    }
    public boolean UangCukup(double bayar) {
        return bayar >=getTotal();
    }

    public void cetak(double bayar) {
        double biaya = layanan.hitungBiaya();
        System.out.println("\n===== " + NAMA_TOKO + " =====");
        System.out.println("No Nota   : " + noNota);
        System.out.println("Tanggal   : " + tanggal);
        System.out.println("Pelanggan : " + pelanggan.getNama() + " (" + pelanggan.getNoHp() + ")");
        System.out.println("Layanan   : " + layanan.getJenis().getNama() + " - " + layanan.getTipe());
        System.out.println("Berat     : " + layanan.getBerat() + " kg");
        System.out.println("Biaya     : Rp" + (long) biaya);
        System.out.println("Diskon    : Rp" + (long) pelanggan.hitungDiskon(biaya));
        System.out.println("Total     : Rp" + (long) getTotal());
        System.out.println("Bayar     : Rp" + (long) bayar);
        System.out.println("Kembali   : Rp" + (long) (bayar - getTotal()));
        System.out.println("==============================");
    }
}