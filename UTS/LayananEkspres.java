public class LayananEkspres extends Layanan {
    private static final double BIAYA_EKSPRES = 3000; // per kg

    public LayananEkspres(JenisLayanan jenis, double berat) {
        super(jenis, berat);
    }

    @Override
    public double hitungBiaya() {
        return getBerat() * (getJenis().getTarif() + BIAYA_EKSPRES);
    }

    @Override
    public String getTipe() { return "Ekspres (1 hari)"; }
}