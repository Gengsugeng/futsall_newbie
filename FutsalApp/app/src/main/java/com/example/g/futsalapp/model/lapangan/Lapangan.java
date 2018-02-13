package com.example.g.futsalapp.model.lapangan;

/**
 * Created by G on 1/15/2018.
 */

public class Lapangan {

    private String id_lapangan;
    private String nama;
    private String ukuran;
    private String harga;
    private String texture;
    private String foto;


    public Lapangan() {

    }

    public Lapangan(String id_lapangan, String nama, String ukuran, String harga, String texture, String foto) {
        this.id_lapangan = id_lapangan;
        this.nama = nama;
        this.ukuran = ukuran;
        this.harga = harga;
        this.texture = texture;
        this.foto = foto;
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

    public String getUkuran() {
        return ukuran;
    }

    public void setUkuran(String ukuran) {
        this.ukuran = ukuran;
    }

    public String getHarga() {
        return harga;
    }

    public void setHarga(String harga) {
        this.harga = harga;
    }

    public String getTexture() {
        return texture;
    }

    public void setTexture(String texture) {
        this.texture = texture;
    }

    public String getFoto() {
        return foto;
    }

    public void setFoto(String foto) {
        this.foto = foto;
    }
}
