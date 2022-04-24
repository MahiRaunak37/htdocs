package com.example.upasthit;

import androidx.appcompat.app.AppCompatActivity;

import android.provider.Settings;
import android.util.Base64;
import android.widget.TextView;
import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;
import android.Manifest;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.graphics.Bitmap;
import android.media.Image;
import android.os.Bundle;
import android.provider.MediaStore;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.Toast;

import java.io.ByteArrayOutputStream;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.HashMap;
import java.util.Map;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import android.graphics.Bitmap;
import android.util.Base64;


public class CaptureImage extends AppCompatActivity {
    TextView ipAddress;
    ImageView imageView;
    Button btOpen,btSend;
    //String ipAddr = getIntent().getStringExtra("ip");
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_capture_image);
        ipAddress = findViewById(R.id.captureIP);
        Toast.makeText(this, "Connection Success", Toast.LENGTH_SHORT).show();

        //Assign Variable
        imageView = findViewById(R.id.image_view);
        btOpen = findViewById(R.id.button);
        btSend = findViewById(R.id.Send);

        //Request for camera permission
        if(ContextCompat.checkSelfPermission(CaptureImage.this, Manifest.permission.CAMERA) != PackageManager.PERMISSION_GRANTED)
        {
            ActivityCompat.requestPermissions(CaptureImage.this, new String[]{Manifest.permission.CAMERA},100);
        }
        btOpen.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                //Open Camera
                Intent intent = new Intent(MediaStore.ACTION_IMAGE_CAPTURE);
                startActivityForResult(intent,100);
            }
        });
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        ////////////////////////////////////////////////////////////////////////
        String ID = Settings.Secure.getString(getContentResolver(),Settings.Secure.ANDROID_ID);
        String id = ID.toUpperCase();

        SimpleDateFormat date = new SimpleDateFormat( "yyyyMMddHHmmssSS");
        String idOfPhoto = id + date.format(new Date());

        /////////////////////////////////////////////////////////////////////////


        if (requestCode == 100) {
            //ip
            String ipAddr1 = getIntent().getStringExtra("ip");
            String gpsLocation = getIntent().getStringExtra("gps");
            //ipAddress.setText(gpsLocation);

            //get Capture Image

            Bitmap captureImage = (Bitmap) data.getExtras().get("data");
            ByteArrayOutputStream stream = new ByteArrayOutputStream();
            captureImage.compress(Bitmap.CompressFormat.JPEG, 100, stream);
            byte[] byteArray = stream.toByteArray();
            String result = Base64.encodeToString(byteArray, Base64.DEFAULT);

            //////////////////////////////////////////////////////////////////////////////////////////////////////////////
//            //convert captureImage to string and send through http post request to the server,i.e. laptop
//            //https://stackoverflow.com/questions/13562429/how-many-ways-to-convert-bitmap-to-string-and-vice-versa
//            //https://stackoverflow.com/questions/13562429/how-many-ways-to-convert-bitmap-to-string-and-vice-versa
//            //in laptop make a php page which will read and store this data
            //////////////////////////////////////////////////////////////////////////////////////////////////////////////

            btSend.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    if(result.isEmpty())
                    {
                        Toast.makeText(CaptureImage.this, "Please Capture the Image", Toast.LENGTH_SHORT).show();
                        //////////////////////////////////////////////////////////////////////////////////////

                        //////////////////////////////////////////////////////////////////////////////////////
                    }
                    else
                    {
                        //Toast.makeText(MainActivity.this, "Data is Collected", Toast.LENGTH_SHORT).show();
                        //192.168.172.218
                        /////////////////////////////////////////////////////////////////////////////////////////////////
                       // String url = "http://192.168.250.218:8080/CamRequest.php";
                        String url = ipAddr1;
                        StringRequest stringRequest = new StringRequest(Request.Method.POST, url,
                                new Response.Listener<String>() {
                                    @Override
                                    public void onResponse(String response) {
                                        Toast.makeText(CaptureImage.this, response.trim(), Toast.LENGTH_LONG).show();
                                    }
                                },
                                new Response.ErrorListener() {
                                    @Override
                                    public void onErrorResponse(VolleyError error) {
                                        Toast.makeText(CaptureImage.this, error.toString(), Toast.LENGTH_LONG).show();
                                    }
                                }
                        ){
                            @Override
                            protected Map<String,String> getParams()
                            {
                                Map <String, String> Params = new HashMap<String, String>();
                                Params.put("data",result);
                                Params.put("idOfPhotos",idOfPhoto);
                                Params.put("gpsLocation",gpsLocation);
                                return Params;
                            }
                        };
                        RequestQueue requestQueue = Volley.newRequestQueue(CaptureImage.this);
                        requestQueue.add(stringRequest);
                        //////////////////////////////////////////////////////////////////////////////////////////////////////

                    }
                }
            });

            //set Capture Image to Image View
            imageView.setImageBitmap(captureImage);
        }
    }
    }
