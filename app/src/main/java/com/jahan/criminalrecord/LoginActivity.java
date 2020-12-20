package com.jahan.criminalrecord;

import androidx.appcompat.app.AppCompatActivity;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.jahan.criminalrecord.utils.Internet;
import com.jahan.criminalrecord.utils.PreferenceUtils;

import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class LoginActivity extends AppCompatActivity {

    EditText edtSigninEmail;
    EditText edtSigninPassword;
    Button btnSignin;
    ProgressDialog dialog;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        registration();
        setClickListeners();
    }

    private void registration() {
        edtSigninEmail = findViewById(R.id.edtSigninEmail);
        edtSigninPassword = findViewById(R.id.edtSigninPassword);
        btnSignin = findViewById(R.id.btnSignin);

        dialog = new ProgressDialog(LoginActivity.this);
        dialog.setMessage("Signing in.\nPlease Wait...");
    }


    private void setClickListeners() {
        btnSignin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (Internet.isAvailable(LoginActivity.this)) {

                    if (validData()) {
//                        sendDataToServer();
                        startActivity(new Intent(LoginActivity.this, HomeActivity.class));
                    }
                } else {
                    Toast.makeText(LoginActivity.this, "No internet connection", Toast.LENGTH_SHORT).show();
                }
            }
        });
    }
    private boolean validData() {
        if (!edtSigninEmail.getText().toString().contains("@") || (!edtSigninEmail.getText().toString().contains("."))) {
            Toast.makeText(this, "Enter a valid Email", Toast.LENGTH_SHORT).show();
            return false;
        }
        if (edtSigninPassword.getText().toString().length() < 6) {
            Toast.makeText(this, "Invalid Password", Toast.LENGTH_SHORT).show();
            return false;
        }
        return true;
    }


    private void sendDataToServer() {

        //Prepare data to send to the server

        dialog.show();

        final String email = edtSigninEmail.getText().toString();
        final String password = edtSigninPassword.getText().toString();

        RequestQueue queue = Volley.newRequestQueue(this);

        String url = "http://criminal.tritec.online/api/login";

        //Create a request
        StringRequest postRequest = new StringRequest(Request.Method.POST, url,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {

                        //Response
                        dialog.dismiss();
                        try {

                            //Get Response in a JSON object
                            JSONObject object = new JSONObject(response);
                            String errorState = object.get("error").toString();

                            //Check if there is any error
                            if (errorState.equals("true")) {

                                String error = object.get("error_data").toString();
                                Toast.makeText(LoginActivity.this, error, Toast.LENGTH_SHORT).show();

                            } else {
                                //No Error
                                //Receive and store user Object

                                boolean dataSaved = PreferenceUtils.setData(object, edtSigninPassword.getText().toString(), LoginActivity.this);

                                if(dataSaved){
                                    Intent intent = new Intent(LoginActivity.this, HomeActivity.class);
                                    startActivity(intent);
                                    finish();
                                }
                            }

                        } catch (Exception e) {
                            e.printStackTrace();
                        }

                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        // error
                        dialog.dismiss();
                        if ((error + "").equals("com.android.volley.TimeoutError")) {
                            Toast.makeText(LoginActivity.this, "Err: Try Again", Toast.LENGTH_SHORT).show();
                        }
                    }
                }
        ) {
            @Override
            protected Map<String, String> getParams() {
                Map<String, String> params = new HashMap<>();

                //Parameters

                params.put("email", email);
                params.put("password", password);

                return params;
            }
        };
        queue.add(postRequest);
    }

}