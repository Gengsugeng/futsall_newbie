package com.example.g.futsalapp.adapter;

import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.example.g.futsalapp.R;
import com.example.g.futsalapp.model.pemesanan.Pemesanan;

import java.util.List;

/**
 * Created by G on 1/15/2018.
 */

public class PemesananAdapter extends RecyclerView.Adapter<PemesananAdapter.ViewHolder> {
    private List<Pemesanan> mPemesanan;

    public PemesananAdapter() {
    }

    public PemesananAdapter(List<Pemesanan> mPemesanan) {

        this.mPemesanan = mPemesanan;
    }

    @Override
    public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View v = LayoutInflater.from(parent.getContext()).inflate(R.layout.item_pemesanan,parent,false);
        ViewHolder vh = new ViewHolder(v);
        return vh;
    }

    @Override
    public void onBindViewHolder(ViewHolder holder, int position) {
        holder.itemJam.setText(mPemesanan.get(position).getJam());
        holder.itemLama.setText(mPemesanan.get(position).getLama()+" Jam");
    }

    @Override
    public int getItemCount() {
        return mPemesanan.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {
        public TextView itemJam, itemLama;
        public ViewHolder(View itemView) {
            super(itemView);
            itemJam = itemView.findViewById(R.id.tvJam);
            itemLama = itemView.findViewById(R.id.tvLama);
        }
    }
}
