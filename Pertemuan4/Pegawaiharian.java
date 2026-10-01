/** Pegawai harian: gajiPokok diperlakukan sebagai upah per hari kerja. */
public class Pegawaiharian extends Pegawai {

    private final int hariKerja;

    public Pegawaiharian(String nip, String nama, double upahPerHari, int hariKerja) {
        super(nip, nama, upahPerHari);
        if (hariKerja < 0) {
            throw new IllegalArgumentException("Hari kerja tidak boleh negatif: " + hariKerja);
        }
        this.hariKerja = hariKerja;
    }

    @Override
    public double hitungGaji() {
        return super.hitungGaji() * hariKerja;
    }

    @Override
    public String jenis() { return "HARIAN"; }

    public int getHariKerja() { return hariKerja; }
}