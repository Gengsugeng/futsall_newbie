package com.example.g.futsalapp.fragment;

import android.annotation.SuppressLint;
import android.content.Intent;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Toast;

import com.example.g.futsalapp.R;
import com.example.g.futsalapp.adapter.LapanganAdapter;
import com.example.g.futsalapp.api.ApiClient;
import com.example.g.futsalapp.api.ApiInterface;
import com.example.g.futsalapp.model.lapangan.Lapangan;
import com.example.g.futsalapp.model.lapangan.ResultLapangan;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

/**
 * Created by G on 1/13/2018.
 */

public class Fragment_lapangan extends Fragment {

    private String id_penyewa;

    ApiInterface mInterface;

    RecyclerView mRecyclerView;
    RecyclerView.LayoutManager mLayoutManager;
    RecyclerView.Adapter mAdapter;

    public Fragment_lapangan() {
    }

    @SuppressLint("ValidFragment")
    public Fragment_lapangan(String id_penyewa) {
        this.id_penyewa = id_penyewa;
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        View v = inflater.inflate(R.layout.fragment_lapangan,container,false);

        mRecyclerView = v.findViewById(R.id.rvLapangan);
        mRecyclerView.setHasFixedSize(true);

        mLayoutManager = new GridLayoutManager(getActivity(),2);
        mRecyclerView.setLayoutManager(mLayoutManager);

        mInterface = ApiClient.getClient().create(ApiInterface.class);

        this.loadData();

        return v;
    }

    private void loadData() {
        Call<List<Lapangan>> lapanganCall = mInterface.getLapangan();
        lapanganCall.enqueue(new Callback<List<Lapangan>>() {
            @Override
            public void onResponse(Call<List<Lapangan>> call, Response<List<Lapangan>> response) {
                List<Lapangan> lapanganList = response.body();

                mAdapter = new LapanganAdapter(lapanganList,id_penyewa);
                mRecyclerView.setAdapter(mAdapter);
            }

            @Override
            public void onFailure(Call<List<Lapangan>> call, Throwable t) {
                Toast.makeText(getContext(),"Tidak Ada Koneksi Internet",Toast.LENGTH_LONG).show();
            }
        });
    }


}
