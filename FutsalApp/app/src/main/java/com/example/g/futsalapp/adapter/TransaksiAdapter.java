package com.example.g.futsalapp.adapter;

import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.example.g.futsalapp.QRActivity;
import com.example.g.futsalapp.R;
import com.example.g.futsalapp.model.transaksi.Tr;

import java.util.List;

/**
 * Created by G on 1/18/2018.
 */

public class TransaksiAdapter extends RecyclerView.Adapter<TransaksiAdapter.ViewHolder> {
    private List<Tr> mTransaksi;

    public TransaksiAdapter() {
    }

    public TransaksiAdapter(List<Tr> mTransaksi) {
        this.mTransaksi = mTransaksi;
    }

    @Override
    public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View v = LayoutInflater.from(parent.getContext()).inflate(R.layout.item_final,parent,false);
        ViewHolder vh = new ViewHolder(v);
        return vh;
    }

    @Override
    public void onBindViewHolder(ViewHolder holder, final int position) {
        holder.itemLapangan.setText(mTransaksi.get(position).getLapangan());
        holder.itemTanggal.setText(mTransaksi.get(position).getTgl_main());
        holder.itemJam.setText(mTransaksi.get(position).getJam());
        holder.itemLama.setText(mTransaksi.get(position).getLama());

        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(view.getContext(), QRActivity.class);
                i.putExtra("id_pemesanan",mTransaksi.get(position).getId_pemesanan());
                i.putExtra("qr-code",mTransaksi.get(position).getQr());
                view.getContext().startActivity(i);

            }
        });
    }

    @Override
    public int getItemCount() {
        return mTransaksi.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {
        public TextView itemLapangan, itemTanggal, itemJam, itemLama;
        public ViewHolder(View itemView) {
            super(itemView);

            itemLapangan = itemView.findViewById(R.id.tvLapangan);
            itemTanggal = itemView.findViewById(R.id.tvTanggal);
            itemJam = itemView.findViewById(R.id.tvJam);
            itemLama = itemView.findViewById(R.id.tvLama);
        }
    }
}
