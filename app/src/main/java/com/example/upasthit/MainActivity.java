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

public class MainActivity extends AppCompatActivity implements View.OnClickListener{
    Button scanBtn,connBtn;             //create variables for button and textview
    TextView messageText, messageFormat;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////
        scanBtn = findViewById(R.id.scanBtn);       //assigning the value of xml file into the java code using id
        connBtn = findViewById(R.id.connBtn);
        messageText = findViewById(R.id.textContent);
        messageFormat = findViewById(R.id.textFormat);

        scanBtn.setOnClickListener(this);              //start the same activity

    }

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
                messageText.setText(intentResult.getContents());
                messageFormat.setText(intentResult.getFormatName());

                connBtn.setOnClickListener(new View.OnClickListener() {
                    @Override
                    public void onClick(View view) {
                        Intent intent = new Intent(MainActivity.this, CaptureImage.class);
                        intent.putExtra("ip",intentResult.getContents());
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