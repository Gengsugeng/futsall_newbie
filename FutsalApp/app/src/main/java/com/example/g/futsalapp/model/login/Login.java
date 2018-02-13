package com.example.g.futsalapp.model.login;

/**
 * Created by G on 1/16/2018.
 */

public class Login {
    private String message;
    private String id_penyewa;
    private String nama;
    private String alamat;
    private String telepon;
    private String email;
    private String password;

    public Login() {
    }

    public Login(String message, String id_penyewa, String nama, String alamat, String telepon, String email, String password) {
        this.message = message;
        this.id_penyewa = id_penyewa;
        this.nama = nama;
        this.alamat = alamat;
        this.telepon = telepon;
        this.email = email;
        this.password = password;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
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

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }
}
