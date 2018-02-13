package com.example.g.futsalapp;

import android.content.Context;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.telecom.Call;
import android.view.View;
import android.view.Window;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import com.example.g.futsalapp.api.ApiClient;
import com.example.g.futsalapp.api.ApiInterface;
import com.example.g.futsalapp.model.login.Login;

import java.util.List;

import retrofit2.Callback;
import retrofit2.Response;

public class LoginActivity extends AppCompatActivity {

    private EditText edtEmail, edtPassword;
    private Button btnLogin, btnSignup;
    private Context context = this;

    ApiInterface mApiInterface;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        requestWindowFeature(Window.FEATURE_NO_TITLE);
        getWindow().setFlags(WindowManager.LayoutParams.FLAG_FULLSCREEN, WindowManager.LayoutParams.FLAG_FULLSCREEN);

        setContentView(R.layout.activity_login);
        getSupportActionBar().hide();

        this.initComponent();

        this.login();
        this.signup();

    }

    private void signup() {
        this.btnSignup.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent i = new Intent(context,SignupActivity.class);
                startActivityForResult(i,10);
            }
        });
    }

    private void login() {
        this.btnLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String email = edtEmail.getText().toString();
                String password = edtPassword.getText().toString();

                if(validateLogin(email,password)){
                    doLogin(email,password);
                }
            }
        });
    }

    private void doLogin( final String email, final String password) {
        mApiInterface = ApiClient.getClient().create(ApiInterface.class);
        retrofit2.Call<List<Login>> loginCall = mApiInterface.cekLogin(email,password);
        loginCall.enqueue(new Callback<List<Login>>() {
            @Override
            public void onResponse(retrofit2.Call<List<Login>> call, Response<List<Login>> response) {
                if (response.isSuccessful()){
                    List<Login> login = response.body();
                    if (login.get(0).getEmail().equals(email)){
                        //Pindah Activity
                        Intent i = new Intent(LoginActivity.this,FutsalApp.class);
                        i.putExtra("id_penyewa",login.get(0).getId_penyewa());
                        startActivity(i);
                    }else {
                        Toast.makeText(LoginActivity.this,"Email Atau Password Salah",Toast.LENGTH_LONG).show();
                    }
                } else {
                    Toast.makeText(LoginActivity.this,"Error Coba Lagi",Toast.LENGTH_LONG).show();
                }
            }

            @Override
            public void onFailure(retrofit2.Call<List<Login>> call, Throwable t) {
                Toast.makeText(LoginActivity.this,t.getMessage(),Toast.LENGTH_LONG).show();
            }
        });
    }

    private boolean validateLogin(String email, String password) {
        if (email == null || email.trim().length() == 0){
            Toast.makeText(this,"Email Harus Diisi",Toast.LENGTH_LONG).show();
            return false;
        }else if(password == null || password.trim().length() == 0 ){
            Toast.makeText(this,"Password Harus Diisi",Toast.LENGTH_LONG).show();
            return false;
        }
        return true;
    }

    private void initComponent() {
        this.edtEmail = findViewById(R.id.edtEmail);
        this.edtPassword = findViewById(R.id.edtPassword);
        this.btnLogin = findViewById(R.id.btnLogin);
        this.btnSignup = findViewById(R.id.btnSignUp);
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);

        if (requestCode == 10){
            Toast.makeText(this,"Pendaftaran Berhasil, Silahkan Login",Toast.LENGTH_LONG).show();
        }
    }
}
