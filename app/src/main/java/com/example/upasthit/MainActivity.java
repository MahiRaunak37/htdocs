package com.example.upasthit;

//inport statement
import android.content.Intent;                 //use to call implicit and explicit intent in this acitivity
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;
import androidx.annotation.Nullable;
import androidx.appcompat.app.AppCompatActivity;
import com.google.zxing.integration.android.IntentIntegrator;
import com.google.zxing.integration.android.IntentResult;

import android.Manifest;
import android.annotation.SuppressLint;
import android.content.Context;
import android.content.pm.PackageManager;
import android.location.Location;
import android.location.LocationManager;
import android.os.Looper;
import android.provider.Settings;
import androidx.annotation.NonNull;
import androidx.core.app.ActivityCompat;

import com.google.android.gms.location.FusedLocationProviderClient;
import com.google.android.gms.location.LocationCallback;
import com.google.android.gms.location.LocationRequest;
import com.google.android.gms.location.LocationResult;
import com.google.android.gms.location.LocationServices;
import com.google.android.gms.tasks.OnCompleteListener;
import com.google.android.gms.tasks.Task;



public class MainActivity extends AppCompatActivity implements View.OnClickListener{
    Button scanBtn,connBtn;             //create variables for button and textview
    TextView messageText, messageFormat,gpsLocation;
    String stringGPS;
    FusedLocationProviderClient mFusedLocationClient;
    int PERMISSION_ID = 44;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////
        scanBtn = findViewById(R.id.scanBtn);       //assigning the value of xml file into the java code using id
        connBtn = findViewById(R.id.connBtn);
        messageText = findViewById(R.id.textContent);
        messageFormat = findViewById(R.id.textFormat);
        gpsLocation = findViewById(R.id.gpsLocation);

        scanBtn.setOnClickListener(this);              //start the same activity

        mFusedLocationClient = LocationServices.getFusedLocationProviderClient(this);

        // method to get the location
        getLastLocation();
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
@SuppressLint("MissingPermission")
private void getLastLocation() {
    // check if permissions are given
    if (checkPermissions()) {

        // check if location is enabled
        if (isLocationEnabled()) {

            // getting last
            // location from
            // FusedLocationClient
            // object
            mFusedLocationClient.getLastLocation().addOnCompleteListener(new OnCompleteListener<Location>() {
                @Override
                public void onComplete(@NonNull Task<Location> task) {
                    Location location = task.getResult();
                    if (location == null) {
                        requestNewLocationData();
                    } else {
                        stringGPS = location.getLatitude()+","+location.getLongitude();
                        gpsLocation.setText(stringGPS);
                    }
                }
            });
        } else {
            Toast.makeText(this, "Please turn on" + " your location...", Toast.LENGTH_LONG).show();
            Intent intent = new Intent(Settings.ACTION_LOCATION_SOURCE_SETTINGS);
            startActivity(intent);
        }
    } else {
        // if permissions aren't available,
        // request for permissions
        requestPermissions();
    }
}

    @SuppressLint("MissingPermission")
    private void requestNewLocationData() {

        // Initializing LocationRequest
        // object with appropriate methods
        LocationRequest mLocationRequest = new LocationRequest();
        mLocationRequest.setPriority(LocationRequest.PRIORITY_HIGH_ACCURACY);
        mLocationRequest.setInterval(5);
        mLocationRequest.setFastestInterval(0);
        mLocationRequest.setNumUpdates(1);

        // setting LocationRequest
        // on FusedLocationClient
        mFusedLocationClient = LocationServices.getFusedLocationProviderClient(this);
        mFusedLocationClient.requestLocationUpdates(mLocationRequest, mLocationCallback, Looper.myLooper());
    }

    private LocationCallback mLocationCallback = new LocationCallback() {

        @Override
        public void onLocationResult(LocationResult locationResult) {
            Location mLastLocation = locationResult.getLastLocation();
            gpsLocation.setText(mLastLocation.getLatitude()+","+ mLastLocation.getLongitude());
        }
    };

    private boolean checkPermissions() {
        return ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_COARSE_LOCATION) == PackageManager.PERMISSION_GRANTED && ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION) == PackageManager.PERMISSION_GRANTED;

        // If we want background location
        // on Android 10.0 and higher,
        // use:
        // ActivityCompat.checkSelfPermission(this, Manifest.permission.ACCESS_BACKGROUND_LOCATION) == PackageManager.PERMISSION_GRANTED
    }

    // method to request for permissions
    private void requestPermissions() {
        ActivityCompat.requestPermissions(this, new String[]{
                Manifest.permission.ACCESS_COARSE_LOCATION,
                Manifest.permission.ACCESS_FINE_LOCATION}, PERMISSION_ID);
    }

    // method to check
    // if location is enabled
    private boolean isLocationEnabled() {
        LocationManager locationManager = (LocationManager) getSystemService(Context.LOCATION_SERVICE);
        return locationManager.isProviderEnabled(LocationManager.GPS_PROVIDER) || locationManager.isProviderEnabled(LocationManager.NETWORK_PROVIDER);
    }

    // If everything is alright then
    @Override
    public void
    onRequestPermissionsResult(int requestCode, @NonNull String[] permissions, @NonNull int[] grantResults) {
        super.onRequestPermissionsResult(requestCode, permissions, grantResults);

        if (requestCode == PERMISSION_ID) {
            if (grantResults.length > 0 && grantResults[0] == PackageManager.PERMISSION_GRANTED) {
                getLastLocation();
            }
        }
    }

    @Override
    public void onResume() {
        super.onResume();
        if (checkPermissions()) {
            getLastLocation();
        }
    }
///////////////////////////////////////////////////////////////////////////////////////////////////
    @Override
    public void onClick(View v) {
        // we need to create the object of IntentIntegrator class which is the class of QR library
        IntentIntegrator intentIntegrator = new IntentIntegrator(this);         //creating new object of IntentIntegrator
        intentIntegrator.setPrompt("Scan QR");                                          //prompt the result
        intentIntegrator.setOrientationLocked(false);                                   //set Screen rotation will be false
        intentIntegrator.initiateScan();                                                //Initiate the scan
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        IntentResult intentResult = IntentIntegrator.parseActivityResult(requestCode, resultCode, data);
        // if the intentResult is null then toast a message as "cancelled"
        if (intentResult != null) {
            if (intentResult.getContents() == null) {
                Toast.makeText(getBaseContext(), "Cancelled", Toast.LENGTH_SHORT).show();
            } else {
                // if the intentResult is not null we'll set the content and format of scan message
                messageText.setVisibility(View.VISIBLE);
                messageFormat.setVisibility(View.VISIBLE);
                connBtn.setVisibility(View.VISIBLE);
                gpsLocation.setVisibility(View.VISIBLE);
                messageText.setText(intentResult.getContents());
                messageFormat.setText(intentResult.getFormatName());

                connBtn.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View view) {
                        Intent intent = new Intent(MainActivity.this, CaptureImage.class);
                        intent.putExtra("ip",intentResult.getContents());
                        intent.putExtra("gps",stringGPS);
                        startActivity(intent);
                    }
                });

            }
        } else {
            super.onActivityResult(requestCode, resultCode, data);
        }
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////

}