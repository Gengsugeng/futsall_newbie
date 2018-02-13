package com.example.g.futsalapp;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.widget.ImageView;

import com.example.g.futsalapp.adapter.QRAdapter;
import com.example.g.futsalapp.api.ApiClient;
import com.example.g.futsalapp.api.ApiInterface;
import com.example.g.futsalapp.model.transaksi.Tr;
import com.squareup.picasso.Picasso;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class QRActivity extends AppCompatActivity {

    ApiInterface mInterface;

    RecyclerView mRecyclerView;
    RecyclerView.LayoutManager mLayoutManager;
    RecyclerView.Adapter mAdapter;

    ImageView img;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_qr);

        img = findViewById(R.id.imgQR);

        Intent  i = getIntent();
        String  id = i.getStringExtra("id_pemesanan");
        String qrcode = i.getStringExtra("qr-code");

        mInterface = ApiClient.getClient().create(ApiInterface.class);
        Call<List<Tr>> qr = mInterface.getTransaksi("",id,"");

        qr.enqueue(new Callback<List<Tr>>() {
            @Override
            public void onResponse(Call<List<Tr>> call, Response<List<Tr>> response) {
                List<Tr> trList = response.body();

                mAdapter = new QRAdapter(trList);
                mRecyclerView.setAdapter(mAdapter);

            }

            @Override
            public void onFailure(Call<List<Tr>> call, Throwable t) {

            }
        });
    }
}
