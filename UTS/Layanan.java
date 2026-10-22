public abstract class Layanan {
    private JenisLayanan jenis;
    private double berat;

    public Layanan(JenisLayanan jenis, double berat) {
        this.jenis = jenis;
        setBerat(berat);
    }

    public JenisLayanan getJenis() { return jenis; }
    public double getBerat() { return berat; }

    public void setBerat(double berat) {
        if (berat <= 0) {
            throw new IllegalArgumentException("Berat harus lebih dari 0");
        }
        this.berat = berat;
    }

    public abstract double hitungBiaya();

    public abstract String getTipe();
}