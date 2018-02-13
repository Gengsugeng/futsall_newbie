package com.example.g.futsalapp.adapter;

import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;

import com.example.g.futsalapp.R;
import com.example.g.futsalapp.api.ApiClient;
import com.example.g.futsalapp.model.transaksi.Tr;
import com.squareup.picasso.Picasso;

import java.util.List;

/**
 * Created by G on 1/19/2018.
 */

public class QRAdapter extends RecyclerView.Adapter<QRAdapter.ViewHolder> {

    List<Tr> mTr;

    public QRAdapter(List<Tr> mTr) {
        this.mTr = mTr;
    }

    @Override
    public ViewHolder onCreateViewHolder(ViewGroup parent, int viewType) {
        View v = LayoutInflater.from(parent.getContext()).inflate(R.layout.item_qr,parent,false);
        ViewHolder vh = new ViewHolder(v);

        return vh;
    }

    @Override
    public void onBindViewHolder(ViewHolder holder, int position) {

        Picasso.with(holder.itemView.getContext())
                .load(ApiClient.BASE_URL+"upload/qr/"+mTr.get(position).getQr())
                .resize(200,200)
                .into(holder.img);
    }

    @Override
    public int getItemCount() {
        return mTr.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder {
        public ImageView img;
        public ViewHolder(View itemView) {
            super(itemView);

            img = itemView.findViewById(R.id.imgQR);
        }
    }
}
