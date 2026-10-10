/**
 * Sesi 6 — kontrak "bisa bergerak".
 * Interface menjawab: APA YANG BISA dilakukan, bukan APA benda ini.
 */
public interface Movable {

    void bergerak();

    double kecepatanMaksimum();

    /**
     * Default method: memberikan ringkasan kecepatan maksimum.
     * Contoh: "kecepatan maksimum 180 km/jam"
     *
     * Default method (Java 8+) menyediakan implementasi bawaan yang boleh
     * ditimpa implementornya. PHP tidak punya padanannya di interface.
     */
    default String ringkasanGerak() {
        return "kecepatan maksimum " + kecepatanMaksimum() + " km/jam";
    }
}
