package com.example.g.futsalapp.fragment;

import android.annotation.SuppressLint;
import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v4.app.Fragment;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Toast;

import com.example.g.futsalapp.R;
import com.example.g.futsalapp.adapter.PemesananAdapter;
import com.example.g.futsalapp.api.ApiClient;
import com.example.g.futsalapp.api.ApiInterface;
import com.example.g.futsalapp.model.pemesanan.Pemesanan;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

/**
 * Created by G on 1/15/2018.
 */

@SuppressLint("ValidFragment")
public class Fragment_pemesanan extends Fragment {

    ApiInterface mInterface;

    RecyclerView mRecyclerView;
    RecyclerView.LayoutManager mLayoutManager;
    RecyclerView.Adapter mAdapter;

    private String id_lapangan;

    public Fragment_pemesanan() {
    }

    @SuppressLint("ValidFragment")
    public Fragment_pemesanan(String id_lapangan) {
        this.id_lapangan = id_lapangan;
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        View v = inflater.inflate(R.layout.fragment_pemesanan,container,false);

        mRecyclerView = v.findViewById(R.id.rvPemesanan);
        mRecyclerView.setHasFixedSize(true);

        mLayoutManager = new GridLayoutManager(getActivity(),2);
        mRecyclerView.setLayoutManager(mLayoutManager);

        mInterface = ApiClient.getClient().create(ApiInterface.class);
        this.loadData();

        return v;

    }

    private void loadData() {
        String id = this.id_lapangan;
        Call<List<Pemesanan>> pemesananCall = mInterface.getPemesanan(id,"","");
        pemesananCall.enqueue(new Callback<List<Pemesanan>>() {
            @Override
            public void onResponse(Call<List<Pemesanan>> call, Response<List<Pemesanan>> response) {
                List<Pemesanan> pemesananList = response.body();

                if (pemesananList.isEmpty()==true){
                    Toast.makeText(getContext(),"Belum Ada Yang Pesan Lapangan ",Toast.LENGTH_LONG).show();
                }else {
                    mAdapter = new PemesananAdapter(pemesananList);
                    mRecyclerView.setAdapter(mAdapter);
                }

            }

            @Override
            public void onFailure(Call<List<Pemesanan>> call, Throwable t) {
                Toast.makeText(getContext(),"Tidak Ada Koneksi Internet",Toast.LENGTH_LONG).show();
            }
        });
    }
}
