package com.example.g.futsalapp.model.pemesanan;

/**
 * Created by G on 1/15/2018.
 */

public class Pemesanan {
    private String id_pemesanan;
    private String id_penyewa;
    private String id_lapangan;
    private String nama;
    private String lapangan;
    private String lama;
    private String jam;
    private String tgl_pesan;
    private String tgl_main;

    public Pemesanan() {

    }

    public Pemesanan(String id_pemesanan, String id_penyewa, String id_lapangan, String nama, String lapangan, String lama, String jam, String tgl_pesan, String tgl_main) {
        this.id_pemesanan = id_pemesanan;
        this.id_penyewa = id_penyewa;
        this.id_lapangan = id_lapangan;
        this.nama = nama;
        this.lapangan = lapangan;
        this.lama = lama;
        this.jam = jam;
        this.tgl_pesan = tgl_pesan;
        this.tgl_main = tgl_main;
    }

    public String getId_pemesanan() {
        return id_pemesanan;
    }

    public void setId_pemesanan(String id_pemesanan) {
        this.id_pemesanan = id_pemesanan;
    }

    public String getId_penyewa() {
        return id_penyewa;
    }

    public void setId_penyewa(String id_penyewa) {
        this.id_penyewa = id_penyewa;
    }

    public String getId_lapangan() {
        return id_lapangan;
    }

    public void setId_lapangan(String id_lapangan) {
        this.id_lapangan = id_lapangan;
    }

    public String getNama() {
        return nama;
    }

    public void setNama(String nama) {
        this.nama = nama;
    }

    public String getLapangan() {
        return lapangan;
    }

    public void setLapangan(String lapangan) {
        this.lapangan = lapangan;
    }

    public String getLama() {
        return lama;
    }

    public void setLama(String lama) {
        this.lama = lama;
    }

    public String getJam() {
        return jam;
    }

    public void setJam(String jam) {
        this.jam = jam;
    }

    public String getTgl_pesan() {
        return tgl_pesan;
    }

    public void setTgl_pesan(String tgl_pesan) {
        this.tgl_pesan = tgl_pesan;
    }

    public String getTgl_main() {
        return tgl_main;
    }

    public void setTgl_main(String tgl_main) {
        this.tgl_main = tgl_main;
    }
}
