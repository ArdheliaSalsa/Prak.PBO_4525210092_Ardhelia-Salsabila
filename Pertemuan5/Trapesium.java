public class Trapesium extends BangunDatar {
	private double sisiAtas;
	private double sisiBawah;
	private double tinggi;

	public Trapesium(double sisiAtas, double sisiBawah, double tinggi) {
		super("Trapesium");
        if (sisiAtas < 0 || sisiBawah < 0 || tinggi < 0) {
			throw new IllegalArgumentException("Nilai sisi dan tinggi tidak boleh negatif");
		}
		this.sisiAtas = sisiAtas;
		this.sisiBawah = sisiBawah;
		this.tinggi = tinggi;
	}

	public double hitungLuas() {
		return (sisiAtas + sisiBawah) * tinggi / 2;
	}

	@Override
	public double luas() {
		return hitungLuas();
	}

	@Override
	public double keliling() {
		// Menghitung keliling trapesium (jumlah semua sisi)
		// Ini adalah versi sederhana; dalam praktiknya, Anda mungkin perlu menghitung sisi miring
		return sisiAtas + sisiBawah + 2 * Math.sqrt(Math.pow((sisiBawah - sisiAtas) / 2, 2) + Math.pow(tinggi, 2));
	}
}
