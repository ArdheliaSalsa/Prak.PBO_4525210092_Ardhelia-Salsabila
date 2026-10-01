public class Persegi extends BangunDatar {

    private final double sisi;

    public Persegi(double sisi) {
        super("Persegi");
        if (sisi <= 0) {
            throw new Error("Sisi harus lebih besar dari 0");
        }
        this.sisi = sisi;
    }

    @Override public double luas()     { return sisi * sisi; }
    @Override public double keliling() { return 4 * sisi; } 
}
