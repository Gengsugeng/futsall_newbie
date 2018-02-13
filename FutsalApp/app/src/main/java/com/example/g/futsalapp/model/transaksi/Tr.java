package com.example.g.futsalapp.model.transaksi;

/**
 * Created by G on 1/18/2018.
 */

public class Tr {
    private String id_transaksi;
    private String id_pemesanan;
    private String nama;
    private String lapangan;
    private String lama;
    private String jam;
    private String tgl_main;
    private String harga;
    private String status;
    private String bukti;
    private String kurang;
    private String verified;
    private String scan;
    private String qr;

    public Tr() {
    }

    public Tr(String id_transaksi, String id_pemesanan, String nama, String lapangan, String lama, String jam, String tgl_main, String harga, String status, String bukti, String kurang, String verified, String scan, String qr) {
        this.id_transaksi = id_transaksi;
        this.id_pemesanan = id_pemesanan;
        this.nama = nama;
        this.lapangan = lapangan;
        this.lama = lama;
        this.jam = jam;
        this.tgl_main = tgl_main;
        this.harga = harga;
        this.status = status;
        this.bukti = bukti;
        this.kurang = kurang;
        this.verified = verified;
        this.scan = scan;
        this.qr = qr;
    }

    public String getId_transaksi() {
        return id_transaksi;
    }

    public void setId_transaksi(String id_transaksi) {
        this.id_transaksi = id_transaksi;
    }

    public String getId_pemesanan() {
        return id_pemesanan;
    }

    public void setId_pemesanan(String id_pemesanan) {
        this.id_pemesanan = id_pemesanan;
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

    public String getTgl_main() {
        return tgl_main;
    }

    public void setTgl_main(String tgl_main) {
        this.tgl_main = tgl_main;
    }

    public String getHarga() {
        return harga;
    }

    public void setHarga(String harga) {
        this.harga = harga;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }

    public String getBukti() {
        return bukti;
    }

    public void setBukti(String bukti) {
        this.bukti = bukti;
    }

    public String getKurang() {
        return kurang;
    }

    public void setKurang(String kurang) {
        this.kurang = kurang;
    }

    public String getVerified() {
        return verified;
    }

    public void setVerified(String verified) {
        this.verified = verified;
    }

    public String getScan() {
        return scan;
    }

    public void setScan(String scan) {
        this.scan = scan;
    }

    public String getQr() {
        return qr;
    }

    public void setQr(String qr) {
        this.qr = qr;
    }
}
