package cl.estfel.siac;

import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.TextView;
import android.widget.Toast;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
//import java.net.MalformedURLException;
import java.net.URL;

/**
 * Created by robma on 15/04/2017.
 */

public class SuccessActivity extends AppCompatActivity {

        //ActionBar actionBar;

        String JSON_STRING;

        @Override
        protected  void onCreate (Bundle savedInstanceState){
            super.onCreate(savedInstanceState);
            setContentView(R.layout.activity_success);



        }

        @Override
        public boolean onCreateOptionsMenu(Menu menu){
            getMenuInflater().inflate(R.menu.androidstudiofaqs, menu);
            return true;

        }

        @Override
        public boolean onOptionsItemSelected(MenuItem item) {

            switch (item.getItemId()) {

                case R.id.MenuOpcion1:
                    Toast.makeText(SuccessActivity.this, "Asistencia", Toast.LENGTH_SHORT).show();
                    return true;

                case R.id.MenuOpcion2:
                    Toast.makeText(SuccessActivity.this, "Usuarios", Toast.LENGTH_SHORT).show();

                    Intent intent = new Intent(SuccessActivity.this,DisplayListView.class);
                    startActivity(intent);
                    SuccessActivity.this.finish();
                    return true;

                case R.id.MenuOpcion3:
                    Toast.makeText(SuccessActivity.this, "Cerrando la Aplicación", Toast.LENGTH_SHORT).show();
                    finish();
                    return true;

                default:
                    return super.onOptionsItemSelected(item);
            }
        }


    public void getJSON(View view){

        new BackgrundTask().execute();



    }

    private class BackgrundTask extends AsyncTask<Void, Void, String> {
        String json_url;

        @Override
        protected  void onPreExecute(){
            json_url = "http://robertoadvance.dreamhosters.com//Connections/Android/obtener_usuarios.php";


        }



        @Override
        protected String doInBackground(Void... voids) {
            try{
                URL url = new URL(json_url);
                HttpURLConnection httpURLConnection = (HttpURLConnection) url.openConnection();
                InputStream inputStream = httpURLConnection.getInputStream();
                BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(inputStream));
                StringBuilder stringBuilder = new StringBuilder();
                while ((JSON_STRING = bufferedReader.readLine())!=null)
                {

                    stringBuilder.append(JSON_STRING).append("\n");

                }

                bufferedReader.close();
                inputStream.close();
                httpURLConnection.disconnect();
                return stringBuilder.toString().trim();

            } catch (IOException e) {
                e.printStackTrace();
            }

            return null;
        }

        @Override
        protected void onProgressUpdate(Void... values){

            super.onProgressUpdate(values);



        }

        @Override
        protected  void onPostExecute (String result){

            String aVoid;
            super.onPostExecute(aVoid);
            TextView textView = (TextView) findViewById(R.id.textView);
            textView.setText(result);

        }
    }



}

