package com.example.g.futsalapp;

import android.content.Context;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.example.g.futsalapp.api.ApiClient;
import com.example.g.futsalapp.api.ApiInterface;
import com.example.g.futsalapp.model.penyewa.Penyewa;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class SignupActivity extends AppCompatActivity {

    private EditText edtNama, edtEmail, edtAlamat, edtTelepon, edtPassword;
    private Button btnDaftar, btnBatal;

    ApiInterface mInterface;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        requestWindowFeature(Window.FEATURE_NO_TITLE);
        getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN, WindowManager.LayoutParams.FLAG_FULLSCREEN);

        setContentView(R.layout.activity_signup);
        getSupportActionBar().hide();

        this.initComponent();

        this.daftar();
        this.batal();

    }

    private void batal() {
        this.btnBatal.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                finish();
            }
        });
    }

    private void daftar() {
        this.btnDaftar.setOnClickListener(new View.OnClickListener() {
            String nama, email, alamat, telepon, password;
            @Override
            public void onClick(final View view) {
                mInterface = ApiClient.getClient().create(ApiInterface.class);

                nama = edtNama.getText().toString();
                email = edtEmail.getText().toString();
                alamat = edtAlamat.getText().toString();
                telepon = edtTelepon.getText().toString();
                password = edtPassword.getText().toString();

                Call<List<Penyewa>> penyewaCall = mInterface.postPenyewa("",nama,alamat,telepon,email,password);
                penyewaCall.enqueue(new Callback<List<Penyewa>>() {
                    @Override
                    public void onResponse(Call<List<Penyewa>> call, Response<List<Penyewa>> response) {

                    }

                    @Override
                    public void onFailure(Call<List<Penyewa>> call, Throwable t) {

                    }
                });
                SignupActivity.this.finish();
            }
        });
    }

    private void initComponent() {
        this.edtNama = findViewById(R.id.edtNama);
        this.edtEmail = findViewById(R.id.edtEmail);
        this.edtAlamat = findViewById(R.id.edtAlamat);
        this.edtTelepon = findViewById(R.id.edtTelepon);
        this.edtPassword = findViewById(R.id.edtPassword);
        this.btnDaftar = findViewById(R.id.btnDaftar);
        this.btnBatal = findViewById(R.id.btnBatal);
    }

}
