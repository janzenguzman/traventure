<?php

namespace App\Http\Controllers;

use FarhanWazir\GoogleMaps\GMaps;
use Illuminate\Http\Request;
use Input;
use App\Http\Requests;
use App\Gis;

class MapController extends Controller
{

    protected $gmap;

    public function __construct(GMaps $gmap){
        $this->gmap = $gmap;
    }

    public function index(){

        /******** Custom Map Controls ********/


        $config = array();
        $config['map_height'] = "500px";
        $config['center'] = 'Mandaue City}, Philippines';
        $config['zoom'] ='14';

        $this->gmap->initialize($config); // Initialize Map with custom configuration

        // set up the marker ready for positioning
        $marker = array();
        $marker['position'] = 'Paknaan, Mandaue City';
        $marker['draggable'] = true;
        $marker['ondragend'] = '
        iw_'. $this->gmap->map_name .'.close();
        reverseGeocode(event.latLng, function(status, result, mark){
            if(status == 200){
                iw_'. $this->gmap->map_name .'.setContent(result);
                iw_'. $this->gmap->map_name .'.open('. $this->gmap->map_name .', mark);
            }
        }, this);
        ';
        $this->gmap->add_marker($marker);

        $marker = array();
        $marker['position'] = 'Cabancalan, Mandaue City';
        $marker['draggable'] = true;
        $marker['ondragend'] = '
        iw_'. $this->gmap->map_name .'.close();
        reverseGeocode(event.latLng, function(status, result, mark){
            if(status == 200){
                iw_'. $this->gmap->map_name .'.setContent(result);
                iw_'. $this->gmap->map_name .'.open('. $this->gmap->map_name .', mark);
            }
        }, this);
        ';
        $this->gmap->add_marker($marker);

        $marker = array();
        $marker['position'] = 'Ayala Mall, Cebu City';
        $marker['draggable'] = true;
        $marker['ondragend'] = '
        iw_'. $this->gmap->map_name .'.close();
        reverseGeocode(event.latLng, function(status, result, mark){
            if(status == 200){
                iw_'. $this->gmap->map_name .'.setContent(result);
                iw_'. $this->gmap->map_name .'.open('. $this->gmap->map_name .', mark);
            }
        }, this);
        ';
        $this->gmap->add_marker($marker);
        
        $map = $this->gmap->create_map(); // This object will render javascript files and map view; you can call JS by $map['js'] and map view by $map['html']

        return view('map', ['map' => $map]);
    }

    public function gis(){
        return view ('map');
    }

    // public function add(Request $req){
    //     Gis::create($req->all());
    //     return redirect()->back();
    // }

    public function add(Request $req){
        for($x = 0; $x < count($req->input('destination')); ++$x){
            $gis =  new gis;
            $gis->destination = $req->input('destination')[$x];
            $gis->lat = $req->input('lat')[$x];
            $gis->lng = $req->input('lng')[$x];
            $gis->save();
        }
    }

    public function show(){
        $gis = Gis::all();

        return view ('show')->with('gis', $gis);
    }
}
