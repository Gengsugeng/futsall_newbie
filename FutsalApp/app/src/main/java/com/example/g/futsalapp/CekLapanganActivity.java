package com.example.g.futsalapp;

import android.app.FragmentManager;
import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v4.app.Fragment;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;

import com.example.g.futsalapp.fragment.Fragment_form;
import com.example.g.futsalapp.fragment.Fragment_pemesanan;

public class CekLapanganActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_cek_lapangan);
        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        getSupportActionBar().setDisplayShowHomeEnabled(true);

        Intent i = getIntent();
        String id = i.getStringExtra("id_lapangan");
        String idPenyewa = i.getStringExtra("id_penyewa");

        Fragment_pemesanan fragmentPemesanan = new Fragment_pemesanan(id);
        android.support.v4.app.FragmentManager fragmentManager = getSupportFragmentManager();
        fragmentManager.beginTransaction()
                .replace(R.id.relativeUp,fragmentPemesanan,fragmentPemesanan.getTag())
                .commit();

        Fragment_form fragmentForm = new Fragment_form(id,idPenyewa);
        android.support.v4.app.FragmentManager fragmentManager2 = getSupportFragmentManager();
        fragmentManager2.beginTransaction()
                .replace(R.id.relativeDown, fragmentForm,fragmentForm.getTag())
                .commit();

    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        int id = item.getItemId();

        if (id== android.R.id.home){
            this.finish();
        }
        return super.onOptionsItemSelected(item);

    }
}
