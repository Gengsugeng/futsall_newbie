package com.example.g.futsalapp.fragment;


import android.annotation.SuppressLint;
import android.app.DatePickerDialog;
import android.app.TimePickerDialog;
import android.content.Intent;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.TimePicker;
import android.widget.Toast;

import com.example.g.futsalapp.R;
import com.example.g.futsalapp.api.ApiClient;
import com.example.g.futsalapp.api.ApiInterface;
import com.example.g.futsalapp.model.pemesanan.Pemesanan;

import java.util.Calendar;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

/**
 * A simple {@link Fragment} subclass.
 */
public class Fragment_form extends Fragment {

    Button btnDate, btnTime, btnPesan;
    EditText edtDate, edtTime, edtLama;
    private int mYear, mMonth, mDay, mHour, mMinute;

    ApiInterface mInterface;

    private String id_lapangan,id_penyewa;
    private String idPemesanan;

    public Fragment_form() {
        // Required empty public constructor
    }

    @SuppressLint("ValidFragment")
    public Fragment_form(String id_lapangan, String id_penyewa) {
        this.id_lapangan = id_lapangan;
        this.id_penyewa = id_penyewa;
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View v = inflater.inflate(R.layout.fragment_form,container,false);
        btnDate = v.findViewById(R.id.btnTanggal);
        btnTime = v.findViewById(R.id.btnJam);
        btnPesan = v.findViewById(R.id.btnPesan);
        edtDate = v.findViewById(R.id.edtTanggal);
        edtTime = v.findViewById(R.id.edtJam);
        edtLama = v.findViewById(R.id.edtLama);

        btnDate.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                final Calendar c = Calendar.getInstance();
                mYear = c.get(Calendar.YEAR);
                mMonth = c.get(Calendar.MONTH);
                mDay = c.get(Calendar.DAY_OF_MONTH);

                DatePickerDialog datePickerDialog = new DatePickerDialog(getContext(),
                        new DatePickerDialog.OnDateSetListener() {

                            @Override
                            public void onDateSet(DatePicker view, int year,
                                                  int monthOfYear, int dayOfMonth) {

                                edtDate.setText(year + "-" + (monthOfYear + 1) + "-" + dayOfMonth);

                            }
                        }, mYear, mMonth, mDay);
                datePickerDialog.show();
            }
        });

        btnTime.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                // Get Current Time
                final Calendar c = Calendar.getInstance();
                mHour = c.get(Calendar.HOUR_OF_DAY);
                mMinute = c.get(Calendar.MINUTE);

                // Launch Time Picker Dialog
                TimePickerDialog timePickerDialog = new TimePickerDialog(getContext(),
                        new TimePickerDialog.OnTimeSetListener() {

                            @Override
                            public void onTimeSet(TimePicker view, int hourOfDay,
                                                  int minute) {

                                edtTime.setText(hourOfDay + ":" + minute);
                            }
                        }, mHour, mMinute, false);
                timePickerDialog.show();
            }
        });

        btnPesan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String idpenyewa = id_penyewa;
                String idlapangan = id_lapangan;
                String lama = edtLama.getText().toString();
                String jam = edtTime.getText().toString();
                String main = edtDate.getText().toString();

                mInterface = ApiClient.getClient().create(ApiInterface.class);
                Call<List<Pemesanan>> pemesananCall = mInterface.postPemesanan("",idpenyewa,idlapangan,lama,jam,"",main);
                pemesananCall.enqueue(new Callback<List<Pemesanan>>() {
                    @Override
                    public void onResponse(Call<List<Pemesanan>> call, Response<List<Pemesanan>> response) {
                        if(response.body().isEmpty()== false){
                            Toast.makeText(getContext(),"Lapangan Berhasil Dipesan",Toast.LENGTH_SHORT).show();
                        }
                    }

                    @Override
                    public void onFailure(Call<List<Pemesanan>> call, Throwable t) {

                    }
                });
            }
        });

        return v;
    }

}
