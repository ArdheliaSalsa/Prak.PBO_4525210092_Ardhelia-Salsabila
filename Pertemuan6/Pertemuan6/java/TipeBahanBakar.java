/**
 * Enum: hanya nilai yang terdaftar di sini yang mungkin ada.
 * Bandingkan dengan `public static final int BENSIN = 1;`
 * yang membiarkan angka 99 lolos begitu saja.
 */
public enum TipeBahanBakar {

    // TODO 1: lengkapi konstanta enum beserta label dan harga per satuannya.
    //         BENSIN  -> "Bensin",  12000
    //         SOLAR   -> "Solar",   10500
    //         LISTRIK -> "Listrik",  2500   (per kWh)
    BENSIN("Bensin", 12000),
    SOLAR("Solar", 10500),
    LISTRIK("Listrik", 2500);

    private final String label;
    private final double hargaPerSatuan;

    TipeBahanBakar(String label, double hargaPerSatuan) {
        this.label = label;
        this.hargaPerSatuan = hargaPerSatuan;
    }

    public String getLabel() { return label; }

    /**
     * Menghitung biaya pengisian berdasarkan jumlah satuan yang dibeli.
     * Enum dapat memiliki method, berbeda dengan konstanta int biasa.
     */
    public double biayaPengisian(double jumlah) {
        return this.hargaPerSatuan * jumlah;
    }

    /** Hanya listrik yang dianggap ramah lingkungan. */
    public boolean ramahLingkungan() {
        return this == LISTRIK;
    }
}
