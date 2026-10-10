public class Sepeda implements Movable {

    private final String nama;
    private final int tahun;

    public Sepeda(String nama, int tahun) {
        this.nama = nama;
        this.tahun = tahun;
    }

    @Override
    public void bergerak() {
        System.out.println(nama + " (tahun " + tahun + ") sedang dikayuh");
    }

    @Override
    public double kecepatanMaksimum() {
        return 30; // km/jam
    }
}