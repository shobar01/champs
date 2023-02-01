<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use View;

class CMAboutController extends Controller
{
    // http://api.champ-group.com/champs-mobile/public/cri_profiel
    public function cri_about(Request $request)
    {
        // $waktu = date('H-i-s');
        // $tanggals = date('Y-m-d');
        // $tanggal = Carbon::parse($tanggals)->translatedFormat('l, d F Y');
        $client = new \GuzzleHttp\Client();

        $rspabout = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmabout/getabout');
        $jsabout = $rspabout->getBody()->getContents();
        $jsnabout = json_decode($jsabout, true);
        $dfabout = $jsnabout['list_about'];
  ;  
        // dd('============  '.$jamnow);
        if (isset($_GET['kdakses'])) {
            $kdakses = $_GET['kdakses'];
            $nip = $_GET['nip'];     
        }    
        $ttgl = date('Y-m-d') ;

        $rspersnl = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmteactivtity/getPersonalActivity', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [ 
                "nip" => $nip,
                "tanggal" => $ttgl
            ],
        ]
        ); 
        $jsonprsnl     = $rspersnl->getBody()->getContents();
        $jsdfpersnl    = json_decode($jsonprsnl, true); 
        $dfuser       = $jsdfpersnl['df_psnl'];

        $nmdvc          = substr($dfuser[0]['nmdvc'],0,5);

        // Log Visit 
        $rspnsvisit = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/logvisit', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nmfitur' => 'About', 
            ],
            ]
            );
            $jsonsvist = $rspnsvisit->getBody()->getContents();
            $jsonvs = json_decode($jsonsvist, true); 
        // dd($nmdvc);
        return view('.about.dash', compact('dfabout','dfuser','nmdvc'));
        // return view('.about.cri_profiel');
    }
    public function cri_profiel(Request $request)
    {
        // $waktu = date('H-i-s');
        // $tanggals = date('Y-m-d');
        // $tanggal = Carbon::parse($tanggals)->translatedFormat('l, d F Y');
        $client = new \GuzzleHttp\Client();

        $rspabout = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmabout/getabout');
        $jsabout = $rspabout->getBody()->getContents();
        $jsnabout = json_decode($jsabout, true);
        $dfabout = $jsnabout['list_about'];
        // dd($dfabout); 
        return view('.about.cri_profiel');
    }
    // http://localhost/champs-mobile/cri_underdevlopment
    public function cri_underdevlopment(Request $request)
    {
        // $waktu = date('H-i-s');
        // $tanggals = date('Y-m-d');
        // $tanggal = Carbon::parse($tanggals)->translatedFormat('l, d F Y');
        $client = new \GuzzleHttp\Client();
 
        return view('.about.cri_devlop');
    }
}
