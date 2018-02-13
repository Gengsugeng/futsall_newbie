package com.example.g.futsalapp.model.penyewa;

/**
 * Created by G on 1/16/2018.
 */

public class Penyewa {
    private String id_penyewa;
    private String nama;
    private String alamat;
    private String telepon;
    private String password;

    public Penyewa() {
    }

    public Penyewa(String id_penyewa, String nama, String alamat, String telepon, String password) {
        this.id_penyewa = id_penyewa;
        this.nama = nama;
        this.alamat = alamat;
        this.telepon = telepon;
        this.password = password;
    }

    public String getId_penyewa() {
        return id_penyewa;
    }

    public void setId_penyewa(String id_penyewa) {
        this.id_penyewa = id_penyewa;
    }

    public String getNama() {
        return nama;
    }

    public void setNama(String nama) {
        this.nama = nama;
    }

    public String getAlamat() {
        return alamat;
    }

    public void setAlamat(String alamat) {
        this.alamat = alamat;
    }

    public String getTelepon() {
        return telepon;
    }

    public void setTelepon(String telepon) {
        this.telepon = telepon;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }
}
