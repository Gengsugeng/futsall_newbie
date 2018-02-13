package com.example.g.futsalapp;

import android.content.Intent;
import android.support.design.widget.TabLayout;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;

import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentPagerAdapter;
import android.support.v4.view.ViewPager;
import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.view.ViewGroup;

import android.widget.TextView;

import com.example.g.futsalapp.fragment.Fragment_code;
import com.example.g.futsalapp.fragment.Fragment_final;
import com.example.g.futsalapp.fragment.Fragment_lapangan;
import com.example.g.futsalapp.fragment.SectionPageAdapter;

public class FutsalApp extends AppCompatActivity {

    private SectionPageAdapter mSPA;
    private ViewPager mVP;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_futsal_app);

        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);

        this.mSPA = new SectionPageAdapter(getSupportFragmentManager());

        //set viewpager with section adapter
        this.mVP = findViewById(R.id.container);
        setupViewPager(this.mVP);

        TabLayout tabLayout = findViewById(R.id.tabs);
        tabLayout.setupWithViewPager(this.mVP);

    }

    private void setupViewPager(ViewPager viewPager){
        Intent i = getIntent();
        String id = i.getStringExtra("id_penyewa");

        SectionPageAdapter adapter = new SectionPageAdapter(getSupportFragmentManager());
        adapter.addFragment(new Fragment_lapangan(id),"Lapangan");
        adapter.addFragment(new Fragment_code(id),"Pesananku");
        adapter.addFragment(new Fragment_final(id),"QR-Code");


        viewPager.setAdapter(adapter);
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        MenuInflater menuInflater = getMenuInflater();
        menuInflater.inflate(R.menu.menu_futsal_app,menu);
        return true;
    }

}
