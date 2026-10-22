public class LayananReguler extends Layanan {
    public LayananReguler(JenisLayanan jenis, double berat) {
        super(jenis, berat);
    }

    @Override
    public double hitungBiaya() {
        return getBerat() * getJenis().getTarif();
    }

    @Override
    public String getTipe() { return "Reguler (2 hari)"; }
}