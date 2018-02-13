package com.example.g.futsalapp.adapter;

import android.content.Intent;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.example.g.futsalapp.QRActivity;
import com.example.g.futsalapp.R;
import com.example.g.futsalapp.Transaksi;
import com.example.g.futsalapp.api.ApiClient;
import com.example.g.futsalapp.api.ApiInterface;
import com.example.g.futsalapp.model.pemesanan.Pemesanan;

import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

/**
 * Created by G on 1/18/2018.
 */

public class PesankuAdapter extends RecyclerView.Adapter<PesankuAdapter.ViewHolder>{
    private List<Pemesanan> mPemesanan;
    ApiInterface mInterface;

    public PesankuAdapter(List<Pemesanan> mPemesanan) {
        this.mPemesanan = mPemesanan;
    }

    @Override
    public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View v = LayoutInflater.from(parent.getContext()).inflate(R.layout.item_pesanku,parent,false);
        ViewHolder vh = new ViewHolder(v);
        return vh;
    }

    @Override
    public void onBindViewHolder(ViewHolder holder, final int position) {
        holder.itemLapangan.setText(mPemesanan.get(position).getLapangan());
        holder.itemTanggal.setText(mPemesanan.get(position).getTgl_main());
        holder.itemJam.setText(mPemesanan.get(position).getJam());
        holder.itemLama.setText(mPemesanan.get(position).getLama()+" Jam");

        final String idPesan = mPemesanan.get(position).getId_pemesanan();
        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(final View view) {
                Intent i = new Intent(view.getContext(),Transaksi.class);
                i.putExtra("lapangan",mPemesanan.get(position).getLapangan());
                i.putExtra("lama", mPemesanan.get(position).getLama());
                i.putExtra("tanggal",mPemesanan.get(position).getTgl_main());
                i.putExtra("jam",mPemesanan.get(position).getJam());
                i.putExtra("id_pemesan",idPesan);
                i.putExtra("id_penyewa",mPemesanan.get(position).getId_penyewa());

                view.getContext().startActivity(i);
            }
        });
    }

    @Override
    public int getItemCount() {
        return mPemesanan.size();
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

//    private void load(){
//        mInterface = ApiClient.getClient().create(ApiInterface.class);
//
//        final Call<List<Transaksi>> transaksiCall = mInterface.getTransaksi("",idPesan);
//        transaksiCall.enqueue(new Callback<List<Transaksi>>() {
//            @Override
//            public void onResponse(Call<List<Transaksi>> call, Response<List<Transaksi>> response) {
//                List<Transaksi> transaksiList = response.body();
//                if (transaksiList.isEmpty()){
//                    Intent i = new Intent(view.getContext(),Transaksi.class);
//                    i.putExtra("id_pemesanan",idPesan);
//                    view.getContext().startActivity(i);
//                }
//                else if (transaksiList.isEmpty() == false){
//                    Intent i = new Intent(view.getContext(), QRActivity.class);
//                    i.putExtra("id_pemesanan",idPesan);
//                    view.getContext().startActivity(i);
//                }
//            }
//
//            @Override
//            public void onFailure(Call<List<Transaksi>> call, Throwable t) {
//
//            }
//        });
//    }
}
