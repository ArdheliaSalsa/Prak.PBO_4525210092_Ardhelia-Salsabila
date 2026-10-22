public enum JenisLayanan {
    CUCI_KERING("Cuci Kering", 5000),
    CUCI_SETRIKA("Cuci Setrika", 7000),
    SETRIKA("Setrika Saja", 4000);

    private final String nama;
    private final double tarif;

    JenisLayanan(String nama, double tarif) {
        this.nama = nama;
        this.tarif = tarif;
    }

    public String getNama() { return nama; }
    public double getTarif() { return tarif; }
}