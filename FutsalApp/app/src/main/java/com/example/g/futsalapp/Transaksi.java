package com.example.g.futsalapp;

import android.content.Intent;
import android.database.Cursor;
import android.net.Uri;
import android.provider.MediaStore;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.TextView;
import android.widget.Toast;

import com.example.g.futsalapp.api.ApiClient;
import com.example.g.futsalapp.api.ApiInterface;
import com.example.g.futsalapp.model.transaksi.Tr;
import com.squareup.picasso.Picasso;

import java.io.File;
import java.util.List;

import okhttp3.MediaType;
import okhttp3.MultipartBody;
import okhttp3.RequestBody;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class Transaksi extends AppCompatActivity {

    private TextView tvLapangan,tvLama,tvTanggal,tvJam;

    private EditText edtJumlah;
    private RadioGroup rg;
    private Button btnBrowse, btnProses;
    private ImageView imgPreview;
    private String imagePath = "";
    ApiInterface mInterface;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        requestWindowFeature(Window.FEATURE_NO_TITLE);
        getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN, WindowManager.LayoutParams.FLAG_FULLSCREEN);

        setContentView(R.layout.activity_transaksi);
        getSupportActionBar().hide();

        this.initComponent();
        this.proses();

    }

    private void proses() {
        this.btnProses.setOnClickListener(new View.OnClickListener() {
            String idPesan, idPenyewa, harga, status, kurang, verified,scan;


            @Override
            public void onClick(View view) {
                Intent i = getIntent();
                mInterface = ApiClient.getClient().create(ApiInterface.class);

                idPesan = i.getStringExtra("id_pemesanan");
                idPenyewa = i.getStringExtra("id_penyewa");
                harga = edtJumlah.getText().toString();
                int id = rg.getCheckedRadioButtonId();
                RadioButton rb = (RadioButton) findViewById(id);
                status = rb.getText().toString();
                kurang = edtJumlah.getText().toString();
                verified = "0";
                scan = "0";

                MultipartBody.Part body = null;
                if (!imagePath.isEmpty()){
                    File file = new File(imagePath);

                    RequestBody reqFile = RequestBody.create(MediaType.parse("multipart/form-data"),file);

                    body = MultipartBody.Part.createFormData("bukti",file.getName(),reqFile);
                }

                RequestBody id_pemesanan = MultipartBody.create(MediaType.parse("multipart/form-data"),idPesan);
                RequestBody id_penyewa = MultipartBody.create(MediaType.parse("multipart/form-data"),idPenyewa);
                RequestBody sts = MultipartBody.create(MediaType.parse("multipart/form-data"),status);
                RequestBody kr = MultipartBody.create(MediaType.parse("multipart/form-data"),kurang);
                RequestBody ver = MultipartBody.create(MediaType.parse("multipart/form-data"),verified);
                RequestBody sc = MultipartBody.create(MediaType.parse("multipart/form-data"),scan);
                RequestBody meth = MultipartBody.create(MediaType.parse("multipart/form-data"),"android");

                Call<List<Tr>> trCall = mInterface.postTransaksi(id_pemesanan,id_penyewa,sts,body,kr,ver,sc,meth);
                trCall.enqueue(new Callback<List<Tr>>() {
                    @Override
                    public void onResponse(Call<List<Tr>> call, Response<List<Tr>> response) {
                        Toast.makeText(Transaksi.this,"Proses Transaksi Berhasil",Toast.LENGTH_SHORT).show();
                    }

                    @Override
                    public void onFailure(Call<List<Tr>> call, Throwable t) {

                    }
                });


            }
        });
    }

    private void initComponent() {
        this.edtJumlah = findViewById(R.id.edtJumlah);
        this.rg = findViewById(R.id.rgPembayaran);
        this.btnProses = findViewById(R.id.btnProses);
        this.tvLapangan = findViewById(R.id.tvLapangan);
        this.tvLama = findViewById(R.id.tvLama);
        this.tvTanggal = findViewById(R.id.tvTanggal);
        this.tvJam = findViewById(R.id.tvJam);
        this.btnBrowse = findViewById(R.id.btnBrowse);
        this.imgPreview = findViewById(R.id.imgPreview);

        Intent i = getIntent();
        tvTanggal.setText(i.getStringExtra("tanggal"));
        tvLama.setText(i.getStringExtra("lama"));
        tvJam.setText(i.getStringExtra("jam"));
        tvLapangan.setText(i.getStringExtra("lapangan"));

        btnBrowse.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                final Intent gallery = new Intent();
                gallery.setType("image/*");
                gallery.setAction(Intent.ACTION_PICK);

                Intent intentChoose = Intent.createChooser(gallery,"Pilih Gambar");
                startActivityForResult(intentChoose,10);
            }
        });

    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);

        if (resultCode == RESULT_OK && requestCode ==10){
            if (data ==null){
                Toast.makeText(getApplicationContext(), "Gambar Gagal Di load",
                        Toast.LENGTH_LONG).show();
                return;
            }

            Uri selectedImage = data.getData();
            String[] filePathColumn = {MediaStore.Images.Media.DATA};
            Cursor cursor = getContentResolver().query(selectedImage,filePathColumn,null,null,null);

            if (cursor != null){
                cursor.moveToFirst();
                int columnIndex = cursor.getColumnIndex(filePathColumn[0]);
                imagePath = cursor.getString(columnIndex);

                Picasso.with(getApplicationContext()).load(new File(imagePath)).fit().into(imgPreview);
                cursor.close();
            }else {
                Toast.makeText(getApplicationContext(), "Gambar Gagal Di load",
                        Toast.LENGTH_LONG).show();
            }
        }
    }
}
