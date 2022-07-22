package com.example.rumahsakitfinder;

import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;
import androidx.fragment.app.FragmentActivity;

import android.Manifest;
import android.content.pm.PackageManager;
import android.os.Bundle;

import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.MarkerOptions;

import java.util.Vector;

public class MapsActivity extends FragmentActivity implements OnMapReadyCallback {

    private GoogleMap mMap;
    MarkerOptions marker;
    LatLng centerlocation;
    Vector<MarkerOptions> markerOptions;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_maps2);
        SupportMapFragment mapFragment = (SupportMapFragment) getSupportFragmentManager()
                .findFragmentById(R.id.map);
        mapFragment.getMapAsync(this);

        centerlocation = new LatLng(3.0,101);

        markerOptions = new Vector<>();

        markerOptions.add(new MarkerOptions().title("Raja Permaisuri Bainun Hospital, Ipoh")
                .position(new LatLng(4.603928566961929,101.09016969744681))
                .snippet("Hospital Raja Permaisuri Bainun, Jalan Raja Ashman Shah, 30450 Ipoh, Perak")
        );
        markerOptions.add(new MarkerOptions().title("Alor Setar Hospital")
                .position(new LatLng(6.141872329336346,100.3720555017734))
                .snippet("Lorong Penjara, Bandar Alor Setar, 05100 Alor Setar, Kedah")
        );
        markerOptions.add(new MarkerOptions().title("Penang General Hospital")
                .position(new LatLng(5.416970454042282,100.31132015303969))
                .snippet("Jalan Residensi, 10990 George Town, Pulau Pinang")
        );
        markerOptions.add(new MarkerOptions().title("Tuanku Fauziah Hospital")
                .position(new LatLng(6.440892964014912,100.19135914360793))
                .snippet("3, Jalan Tun Abdul Razak, Pusat Bandar Kangar, 01000 Kangar, Perlis")
        );
        markerOptions.add(new MarkerOptions().title("Kuala Lumpur General Hospital")
                .position(new LatLng(3.171611077147244,101.70257426736045))
                .snippet("Jalan Pahang, 50586 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur")
        );

    }
    @Override
    public void onMapReady(GoogleMap googleMap) {
        mMap = googleMap;

        // Add a marker in Sydney and move the camera
        //LatLng sydney = new LatLng(-34, 151);
        //mMap.addMarker(new MarkerOptions().position(sydney).title("Marker in Sydney"));

        for (MarkerOptions mark: markerOptions) {
            mMap.addMarker(mark);
        }

        enableMyLocation();

        mMap.moveCamera(CameraUpdateFactory.newLatLngZoom(centerlocation,8));
    }
    /**
     * Enables the My Location layer if the fine location permission has been granted.
     */
    private void enableMyLocation() {
        if (ContextCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION)
                == PackageManager.PERMISSION_GRANTED) {
            if (mMap != null) {
                mMap.setMyLocationEnabled(true);
            }
        } else {
            String perms[] = {"android.permission.ACCESS_FINE_LOCATION"};
            // Permission to access the location is missing. Show rationale and request permission
            ActivityCompat.requestPermissions(this, perms,200);
        }
    }

}