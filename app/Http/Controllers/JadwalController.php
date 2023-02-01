<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use View;

class JadwalController extends Controller
{
    // http://localhost/champs-mobile/jadwal?kdakses=AVXXX&nip=K1050012
    public function jadwal(Request $request)
    {
        
        $thr = date('d');
        $bln = date('m');
        $client = new \GuzzleHttp\Client();
        if (isset($_GET['kdakses'])) {
            $kdakses = $_GET['kdakses'];
            $nip = $_GET['nip'];     
        }  


        $rspersnl = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmteactivtity/getPersonalActivity', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [ 
                "nip" => $nip,
                "tanggal" =>  date('Y-m-d')
            ],
        ]
        ); 
        $jsonprsnl     = $rspersnl->getBody()->getContents();
        $jsdfpersnl    = json_decode($jsonprsnl, true); 
        $dfuser       = $jsdfpersnl['df_psnl'];

        // dd($dfuser);  
        $nm = $dfuser[0]['nm_lengkap'];
        $deptt = $dfuser[0]['dept']; 

        $response = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmjadwal/getViewJadwal?dept=' . $deptt);
        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true); 
         
        // dd($json);
        $dept = $json['dept'];
        $perd = $json['periode'];
        // Log Visit 
        $rspnsvisit = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/logvisit', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nmfitur' => 'Schedule', 
            ],
            ]
            );
            $jsonsvist = $rspnsvisit->getBody()->getContents();
            $jsonvs = json_decode($jsonsvist, true); 
        return view('.jadwal.jadwal', compact( 'dept', 'perd', 'thr', 'bln'));

    }
}
