package com.example.g.futsalapp.fragment;

import android.annotation.SuppressLint;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Toast;

import com.example.g.futsalapp.R;
import com.example.g.futsalapp.adapter.PemesananAdapter;
import com.example.g.futsalapp.adapter.PesankuAdapter;
import com.example.g.futsalapp.api.ApiClient;
import com.example.g.futsalapp.api.ApiInterface;
import com.example.g.futsalapp.model.pemesanan.Pemesanan;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

/**
 * Created by G on 1/13/2018.
 */

public class Fragment_code extends Fragment {

    private String id_penyewa;

    ApiInterface mInterface;

    RecyclerView mRecyclerView;
    RecyclerView.LayoutManager mLayoutManager;
    RecyclerView.Adapter mAdapter;

    public Fragment_code() {
    }

    @SuppressLint("ValidFragment")
    public Fragment_code(String id_penyewa) {

        this.id_penyewa = id_penyewa;
    }

    @Nullable
    @Override
    public View onCreateView(LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View v = inflater.inflate(R.layout.fragment_code,container,false);

        mRecyclerView = v.findViewById(R.id.rvPemesanan);
        mRecyclerView.setHasFixedSize(true);

        mLayoutManager = new LinearLayoutManager(getActivity());
        mRecyclerView.setLayoutManager(mLayoutManager);

        mInterface = ApiClient.getClient().create(ApiInterface.class);

        this.loadData();

        return v;
    }

    private void loadData() {
        final String idPenyewa = this.id_penyewa;
        Call<List<Pemesanan>> pemesananCall = mInterface.getPemesanan("","",idPenyewa);
        pemesananCall.enqueue(new Callback<List<Pemesanan>>() {
            @Override
            public void onResponse(Call<List<Pemesanan>> call, Response<List<Pemesanan>> response) {
                List<Pemesanan> pemesananList = response.body();

                    mAdapter = new PesankuAdapter(pemesananList);
                    mRecyclerView.setAdapter(mAdapter);
            }

            @Override
            public void onFailure(Call<List<Pemesanan>> call, Throwable t) {

            }
        });

    }
}
