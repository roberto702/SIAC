package cl.estfel.siac;

import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.ListView;
import android.widget.TextView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.MalformedURLException;
import java.net.URL;

public class DisplayListView extends AppCompatActivity {



    String json_string;
    JSONObject jsonObject;
    JSONArray jsonArray;
    UsuariosAdapter usuariosAdapter;
    ListView listView;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.display_listview_layout);
        listView = (ListView)findViewById(R.id.listview);

        usuariosAdapter = new UsuariosAdapter(this,R.layout.row_layout);
        listView.setAdapter(usuariosAdapter);

        json_string = getIntent().getExtras().getString("json_data");

        try {
            jsonObject = new JSONObject(json_string);
            jsonArray = jsonObject.getJSONArray("Usuarios");

            int count = 0;
            String nombre, apellidos, usuarios_listview;

            while (count<jsonObject.length()){

            JSONObject JO = jsonArray.getJSONObject(count);
                nombre = JO.getString("nombre");
                apellidos = JO.getString("apellidos");
                usuarios_listview =JO.getString("nom_usuario");
                Usuarios usuarios = new Usuarios(nombre, apellidos,usuarios_listview);
                usuariosAdapter.add(usuarios);
                count++;


            }

        } catch (JSONException e) {
            e.printStackTrace();

        }
    }
}
