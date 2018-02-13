package com.example.g.futsalapp.api;

import com.example.g.futsalapp.Transaksi;
import com.example.g.futsalapp.model.lapangan.Lapangan;
import com.example.g.futsalapp.model.login.Login;
import com.example.g.futsalapp.model.pemesanan.Pemesanan;
import com.example.g.futsalapp.model.penyewa.Penyewa;
import com.example.g.futsalapp.model.transaksi.Tr;

import java.util.List;

import okhttp3.MultipartBody;
import okhttp3.RequestBody;
import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.Multipart;
import retrofit2.http.POST;
import retrofit2.http.Part;
import retrofit2.http.Query;

/**
 * Created by G on 1/15/2018.
 */

public interface ApiInterface {

    @GET("penyewa/login")
    Call<List<Login>> cekLogin(@Query("email") String email,
                               @Query("password") String password);

    @GET("lapangan")
    Call<List<Lapangan>> getLapangan();

    @GET("pemesanan")
    Call<List<Pemesanan>> getPemesanan(@Query("id_lapangan") String id_lapangan,
                                       @Query("id_pemesanan")String id_pemesanan,
                                       @Query("id_penyewa") String id_penyewa);

    @GET("transaksi")
    Call<List<Tr>> getTransaksi(@Query("id_transaksi") String id_transaksi,
                                       @Query("id_pemesanan") String id_pemesanan,
                                       @Query("id_penyewa") String id_penyewa);

    @FormUrlEncoded
    @POST("penyewa")
    Call<List<Penyewa>> postPenyewa(@Field("id_penyewa")String id_penyewa,
                                    @Field("nama") String nama,
                                    @Field("alamat") String alamat,
                                    @Field("telepon") String telepon,
                                    @Field("email") String email,
                                    @Field("password") String password);

    @FormUrlEncoded
    @POST("SOAPfutsal/proses_pemesanan_android.php")
    Call<List<Pemesanan>> postPemesanan(@Field("id_pemesanan")String id_pemesanan,
                                       @Field("id_penyewa")String  id_penyewa,
                                       @Field("id_lapangan")String id_lapangan,
                                       @Field("lama")String lama,
                                       @Field("jam")String jam,
                                       @Field("tgl_pesan") String tgl_pesan,
                                       @Field("tgl_main")String tgl_main);

    @Multipart
    @POST("transaksi")
    Call<List<Tr>> postTransaksi(@Part("id_pemesanan") RequestBody id_pemesanan,
                                 @Part("id_penyewa") RequestBody id_penyewa,
                                 @Part("status") RequestBody status,
                                 @Part MultipartBody.Part file,
                                 @Part("kurang")RequestBody kurang,
                                 @Part("verified") RequestBody verified,
                                 @Part("scan") RequestBody scan,
                                 @Part("client")RequestBody client);
}
