public class Segitiga extends BangunDatar {
    private final double sisi1;
    private final double sisi2;
    private final double sisi3;

    public Segitiga(double sisi1, double sisi2, double sisi3) {
        super("Segitiga");
        
        if (sisi1 <= 0 || sisi2 <= 0 || sisi3 <= 0) {
            throw new IllegalArgumentException("Sisi-sisi segitiga harus lebih dari 0");
        }
        if (sisi1 + sisi2 <= sisi3 || sisi1 + sisi3 <= sisi2 || sisi2 + sisi3 <= sisi1) {
            throw new IllegalArgumentException("Sisi-sisi tidak membentuk segitiga yang valid");
        }
        this.sisi1 = sisi1;
        this.sisi2 = sisi2;
        this.sisi3 = sisi3;
    }

    @Override
    public double luas() {
        double semiPerimeter = (sisi1 + sisi2 + sisi3) / 2;
        return Math.sqrt(semiPerimeter * (semiPerimeter - sisi1) * (semiPerimeter - sisi2) * (semiPerimeter - sisi3));
    }

    @Override
    public double keliling() {
        return sisi1 + sisi2 + sisi3;
    }

    @Override
    public String toString() {
        return String.format("Segitiga[sisia=%f, sisib=%f, sisic=%f]", sisi1, sisi2, sisi3);
    }
}
