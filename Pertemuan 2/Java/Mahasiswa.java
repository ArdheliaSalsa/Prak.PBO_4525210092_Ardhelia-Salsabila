/**
 * Sesi 2 — enkapsulasi yang menjaga invariant.
 *
 * Invariant:
 *   1. nim tidak pernah kosong/null dan tidak berubah setelah objek dibuat
 *   2. setiap komponen nilai (tugas, UTS, UAS) berada di rentang 0-100
 *   3. nilai akhir = 30% tugas + 30% UTS + 40% UAS
 */
public class Mahasiswa {

    // Konstanta bobot — jangan menulis angka 0.30 dan 0.40 di dalam method.
    public static final double BOBOT_TUGAS = 0.30;
    public static final double BOBOT_UTS   = 0.30;
    public static final double BOBOT_UAS   = 0.40;

    private static final double NILAI_MIN = 0;
    private static final double NILAI_MAX = 100;

    // TODO 1: nim & nama tidak boleh berubah -> final. nilai boleh berubah -> tidak final.
    private final String nim;
    private final String nama;
    private double nilaiTugas;
    private double nilaiUts;
    private double nilaiUas;

    public Mahasiswa(String nim, String nama, double nilaiTugas, double nilaiUts, double nilaiUas) {
        // TODO 2: tolak NIM yang kosong atau null.
        if (nim == null || nim.isBlank()) {
            throw new IllegalArgumentException("NIM tidak boleh kosong");
        }

        // TODO 3: tolak setiap komponen nilai yang di luar rentang 0-100.
        pastikanNilaiSah("tugas", nilaiTugas);
        pastikanNilaiSah("UTS", nilaiUts);
        pastikanNilaiSah("UAS", nilaiUas);

        this.nim = nim;
        this.nama = nama;
        this.nilaiTugas = nilaiTugas;
        this.nilaiUts = nilaiUts;
        this.nilaiUas = nilaiUas;
    }

    // TODO 4: method privat pembantu untuk memvalidasi satu komponen nilai.
    private static void pastikanNilaiSah(String namaKomponen, double nilai) {
        if (nilai < NILAI_MIN || nilai > NILAI_MAX) {
            throw new IllegalArgumentException(
                    "Nilai " + namaKomponen + " harus di antara " + NILAI_MIN + " dan " + NILAI_MAX
                            + ", diberikan: " + nilai);
        }
    }

    /**
     * TODO 5: hitung nilai akhir memakai konstanta bobot di atas.
     */
    public double nilaiAkhir() {
        return nilaiTugas * BOBOT_TUGAS + nilaiUts * BOBOT_UTS + nilaiUas * BOBOT_UAS;
    }

    /**
     * TODO 6: kembalikan huruf mutu berdasarkan nilai akhir.
     */
    public String hurufMutu() {
        double akhir = nilaiAkhir();
        if (akhir >= 80) return "A";
        if (akhir >= 70) return "B";
        if (akhir >= 60) return "C";
        if (akhir >= 50) return "D";
        return "E";
    }

    // ── Getter ────────────────────────────────────────────────
    // TODO 7: getter untuk nim, nama, dan nilaiAkhir. Tidak ada setNim().
    public String getNim()  { return nim; }
    public String getNama() { return nama; }
    public double getNilaiAkhir() { return nilaiAkhir(); }

    @Override
    public String toString() {
        return String.format("%-10s %-18s akhir=%6.2f  mutu=%s",
                nim, nama, nilaiAkhir(), hurufMutu());
    }
}
