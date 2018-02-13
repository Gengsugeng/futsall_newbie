package com.example.g.futsalapp.adapter;

import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.g.futsalapp.CekLapanganActivity;
import com.example.g.futsalapp.R;
import com.example.g.futsalapp.api.ApiClient;
import com.example.g.futsalapp.model.lapangan.Lapangan;
import com.squareup.picasso.Picasso;

import java.util.List;

/**
 * Created by G on 1/15/2018.
 */

public class LapanganAdapter extends RecyclerView.Adapter<LapanganAdapter.ViewHolder> {
    private List<Lapangan> mLapangan;
    private String id_penyewa;

    public LapanganAdapter() {
    }

    public LapanganAdapter(List<Lapangan> mLapangan, String id_penyewa) {
        this.mLapangan = mLapangan;
        this.id_penyewa = id_penyewa;
    }

    @Override
    public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View v = LayoutInflater.from(parent.getContext()).inflate(R.layout.item_lapangan,parent,false);
        ViewHolder vh = new ViewHolder(v);

        return vh;
    }

    @Override
    public void onBindViewHolder(final ViewHolder holder, final int position) {
        holder.itemLapangan.setText(mLapangan.get(position).getNama());
        holder.itemUkuran.setText(mLapangan.get(position).getUkuran());
        holder.itemTexture.setText(mLapangan.get(position).getTexture());
        holder.itemHarga.setText("Rp. "+mLapangan.get(position).getHarga());

        if (this.mLapangan.get(position).getFoto().length()>0){
            Picasso.with(holder.itemView.getContext())
                    .load(ApiClient.BASE_URL+"upload/lapangan/"+this.mLapangan.get(position).getFoto())
                    .resize(200,200)
                    .into(holder.itemImage);
        }else {
            Picasso.with(holder.itemView.getContext())
                    .load(R.drawable.ic_launcher_foreground)
                    .resize(200,200)
                    .into(holder.itemImage);
        }

        holder.btnCek.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(view.getContext(), CekLapanganActivity.class);
                String id = mLapangan.get(position).getId_lapangan();
                i.putExtra("id_lapangan",id);
                i.putExtra("id_penyewa",id_penyewa);
                view.getContext().startActivity(i);
            }
        });
    }

    @Override
    public int getItemCount() {
        return mLapangan.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {
        public ImageView itemImage;
        public TextView itemLapangan, itemUkuran, itemTexture, itemHarga;
        public Button btnCek;

        public ViewHolder(View itemView) {
            super(itemView);

            itemImage = itemView.findViewById(R.id.imgLapangan);
            itemLapangan = itemView.findViewById(R.id.tvLapangan);
            itemUkuran = itemView.findViewById(R.id.tvUkuran);
            itemTexture = itemView.findViewById(R.id.tvTexture);
            itemHarga = itemView.findViewById(R.id.tvHarga);
            btnCek = itemView.findViewById(R.id.btnCek);
        }
    }
}
