public class Dosen extends Pegawai {
    private int sks;
    private double tunjanganFungsional;

    public Dosen(String nip, String nama, double gajiPokok, int sks, double tunjanganFungsional) {
        super(nip, nama, gajiPokok);
        this.sks = sks;
        this.tunjanganFungsional = tunjanganFungsional;
    }

    @Override
    public double hitungGaji() {
        // Gaji dasar (gaji pokok) + honor dari SKS
        return super.hitungGaji() + (sks * tunjanganFungsional);
    }

    @Override
    public String jenis() {
        return "DOSEN";
    }

    public int getSks() { return sks; }
    public double gettunjanganFungsional() { return tunjanganFungsional; }
}