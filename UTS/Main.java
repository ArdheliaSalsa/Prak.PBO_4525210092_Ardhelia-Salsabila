import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);

        System.out.print("Nama pelanggan : ");
        String nama = in.nextLine();
        System.out.print("No HP          : ");
        String hp = in.nextLine();
        System.out.print("Member? (y/n)  : ");
        boolean member = in.nextLine().equalsIgnoreCase("y");

        System.out.println("Pilih layanan:");
        JenisLayanan[] daftar = JenisLayanan.values();
        for (int i = 0; i < daftar.length; i++) {
            System.out.println((i + 1) + ". " + daftar[i].getNama()
                    + " (Rp" + (long) daftar[i].getTarif() + "/kg)");
        }
        System.out.print("Pilihan        : ");
        JenisLayanan jenis = daftar[in.nextInt() - 1];

        System.out.print("Berat (kg)     : ");
        double berat = in.nextDouble();

        System.out.print("Ekspres? (y/n) : ");
        boolean ekspres = in.next().equalsIgnoreCase("y");

        // Polimorfisme
        Layanan layanan;
        if (ekspres) {
            layanan = new LayananEkspres(jenis, berat);
        } else {
            layanan = new LayananReguler(jenis, berat);
        }

        Pelanggan pelanggan = new Pelanggan(nama, hp, member);
        Nota nota = new Nota(pelanggan, layanan);

double bayar;
do {
    System.out.print("Uang bayar     : ");
    bayar = in.nextDouble();

    if (!nota.UangCukup(bayar)) {
        System.out.println("Uang tidak cukup! Kurang Rp"
                + (long) (nota.getTotal() - bayar));
    }
} while (!nota.UangCukup(bayar));


        nota.cetak(bayar);
        System.out.println("Total nota dibuat: " + Nota.getJumlahNota());
        in.close();
    }
}