package com.example.g.futsalapp.model.lapangan;

import com.google.gson.annotations.SerializedName;

import java.util.List;

/**
 * Created by G on 1/15/2018.
 */

public class ResultLapangan {
    @SerializedName("")
    private List<Lapangan> result;

    public ResultLapangan() {
    }

    public ResultLapangan(List<Lapangan> result) {

        this.result = result;
    }

    public List<Lapangan> getResult() {
        return result;
    }

    public void setResult(List<Lapangan> result) {
        this.result = result;
    }
}
