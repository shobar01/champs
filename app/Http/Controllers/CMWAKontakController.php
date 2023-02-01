<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Session;
use View;

class CMWAKontakController extends Controller
{ 
    // https://api.champ-group.com/champs-mobile/cmwakontak?kdakses=AVXXX&nip=K1050012
    public function cmwakontak(Request $request)
    {
        $client = new \GuzzleHttp\Client();

        $jamnow = Carbon::now()->timezone('Asia/Jakarta')->format('H:i');  
        // dd('============  '.$jamnow);
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
                "tanggal" => date('Y-m-d')
            ],
        ]
        ); 
        $jsonprsnl     = $rspersnl->getBody()->getContents();
        $jsdfpersnl    = json_decode($jsonprsnl, true); 
        $dfuser       = $jsdfpersnl['df_psnl'];

        // dd($dfuser[0]['dept']);
        if(isset($_GET['tx_dept'])){
            $tx_dept = $_GET['tx_dept']; 
        }else{ 
            $tx_dept = $dfuser[0]['dept']; 
        }

        $rspwa = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmdashboardBody_React/getAllWAContact', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [  
                "id_dept" => $tx_dept,
            ],
        ]
        ); 
        $jsonwa     = $rspwa->getBody()->getContents();
        $rsltwa     = json_decode($jsonwa, true);  

        if ($rsltwa['success'] == 1){

            $df_allwa   = $rsltwa['df_allwa']; 
        }else{
            $df_allwa   = 0; 
        }


        // dd($rsltwa); 
        $rspdept = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmdashboardBody_React/get_dept', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [   
            ],
        ]
        ); 
        $jsondept     = $rspdept->getBody()->getContents();
        $rsltdept     = json_decode($jsondept, true);  
        $df_dept   = $rsltdept['df_dept']; 

        // Log Visit 
        $rspnsvisit = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/logvisit', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nmfitur' => 'WA Contact', 
            ],
            ]
            );
            $jsonsvist = $rspnsvisit->getBody()->getContents();
            $jsonvs = json_decode($jsonsvist, true); 
        return view('cmallwa.dash_wa', compact('df_allwa', 'kdakses','nip', 'df_dept','tx_dept'));

    } 
 
    }
 
