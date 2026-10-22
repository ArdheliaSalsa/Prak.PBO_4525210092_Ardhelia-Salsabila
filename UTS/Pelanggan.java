public class Pelanggan implements Diskon {
    private String nama;
    private String noHp;
    private boolean member;

    public Pelanggan(String nama, String noHp, boolean member) {
        this.nama = nama;
        this.noHp = noHp;
        this.member = member;
    }

    public String getNama() { return nama; }
    public String getNoHp() { return noHp; }
    public boolean isMember() { return member; }

    // Member dapat diskon 10%
    @Override
    public double hitungDiskon(double total) {
        return member ? total * 0.10 : 0;
    }
}