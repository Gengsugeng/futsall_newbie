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
import com.example.g.futsalapp.Transaksi;
import com.example.g.futsalapp.adapter.TransaksiAdapter;
import com.example.g.futsalapp.api.ApiClient;
import com.example.g.futsalapp.api.ApiInterface;
import com.example.g.futsalapp.model.transaksi.Tr;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

/**
 * Created by G on 1/18/2018.
 */

public class Fragment_final extends Fragment{

    private String id_penyewa;

    ApiInterface mInterface;

    RecyclerView mRecyclerView;
    RecyclerView.LayoutManager mLayoutManager;
    RecyclerView.Adapter mAdapter;

    public Fragment_final() {
    }

    @SuppressLint("ValidFragment")
    public Fragment_final(String id_penyewa) {
        this.id_penyewa = id_penyewa;
    }

    @Nullable
    @Override
    public View onCreateView(LayoutInflater inflater, @Nullable ViewGroup container, @Nullable Bundle savedInstanceState) {
        View v = inflater.inflate(R.layout.fragment_final,container,false);

        mRecyclerView = v.findViewById(R.id.rvFinal);
        mRecyclerView.setHasFixedSize(true);

        mLayoutManager = new LinearLayoutManager(getActivity());
        mRecyclerView.setLayoutManager(mLayoutManager);

        mInterface = ApiClient.getClient().create(ApiInterface.class);
        this.loadData();

        return v;
    }

    private void loadData() {
        String id_penyewa = this.id_penyewa;
        Call<List<Tr>> trList = mInterface.getTransaksi("","",id_penyewa);

        trList.enqueue(new Callback<List<Tr>>() {
            @Override
            public void onResponse(Call<List<Tr>> call, Response<List<Tr>> response) {
                List<Tr> trList = response.body();

                if (trList.isEmpty()==true){
                    Toast.makeText(getContext(),"Anda Belum Pesan Lapangan ",Toast.LENGTH_LONG).show();
                }else {
                    mAdapter = new TransaksiAdapter(trList);
                    mRecyclerView.setAdapter(mAdapter);
                }
            }

            @Override
            public void onFailure(Call<List<Tr>> call, Throwable t) {

            }
        });
    }
}
