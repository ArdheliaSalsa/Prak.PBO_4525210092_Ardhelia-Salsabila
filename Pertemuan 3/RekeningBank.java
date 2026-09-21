public class RekeningBank {

    public static final double BUNGA_TAHUNAN = 0.025;
    public static final double BIAYA_ADMIN = 5000;
    public static final double BATAS_TARIK_SEKALI = 5_000_000;

    private static int jumlahRekening = 0;

    private final String nomor;
    private final String pemilik;
    private double saldo;

    public RekeningBank(String nomor, String pemilik) {
        this(nomor, pemilik, 0);
    }

    public RekeningBank(String nomor, String pemilik, double saldoAwal) {
        if (nomor == null || nomor.isBlank()) {
            throw new IllegalArgumentException("Nomor rekening tidak boleh kosong");
        }
        // !(x >= 0) menolak negatif DAN NaN; isInfinite menolak tak hingga
        if (!(saldoAwal >= 0) || Double.isInfinite(saldoAwal)) {
            throw new IllegalArgumentException("Saldo awal harus angka valid dan tidak negatif");
        }

        this.nomor = nomor;
        this.pemilik = pemilik;
        this.saldo = saldoAwal;

        jumlahRekening++; // hanya di sini; lolos validasi dulu baru dihitung
    }

    public void setor(double jumlah) {
        if (!(jumlah > 0) || Double.isInfinite(jumlah)) {
            throw new IllegalArgumentException("Jumlah setoran harus angka valid lebih dari 0");
        }
        this.saldo += jumlah;
    }

    public void tarik(double jumlah) {
        if (!(jumlah > 0) || Double.isInfinite(jumlah)) {
            throw new IllegalArgumentException("Jumlah penarikan harus angka valid lebih dari 0");
        }
        if (jumlah > BATAS_TARIK_SEKALI) {
            throw new IllegalArgumentException(
                    String.format("Penarikan melebihi batas sekali transaksi (Rp%,.0f)", BATAS_TARIK_SEKALI));
        }
        if (jumlah > saldo) {
            throw new IllegalArgumentException("Saldo tidak mencukupi");
        }
        this.saldo -= jumlah;
    }

    public void potongBiayaAdmin() {
        this.saldo = Math.max(0, this.saldo - BIAYA_ADMIN);
    }

    public static int getJumlahRekening() {
        return jumlahRekening;
    }

    public static double bungaSetahun(double pokok) {
        return pokok * BUNGA_TAHUNAN;
    }

    public double getSaldo()  { return saldo; }
    public String getNomor()  { return nomor; }

    @Override
    public String toString() {
        return String.format("Rekening[%s] %-14s Rp%,.2f", nomor, pemilik, saldo);
    }
}