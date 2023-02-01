<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use View;

class CMDialogController extends Controller
{
    // http://api.champ-group.com/champs-mobile/cm_dashsaran?nip=K1050012&kdoutlet=null&kdakses=AVXXX
    public function cm_dashsaran(Request $request)
    { 
        $client = new \GuzzleHttp\Client();  
        $tanggals = date('Y-m-d');
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
                "tanggal" => $tanggals
            ],
        ]
        ); 
        $jsonprsnl     = $rspersnl->getBody()->getContents();
        $jsdfpersnl    = json_decode($jsonprsnl, true); 
        $dfuser       = $jsdfpersnl['df_psnl'];

        $kdoutlet = $dfuser[0]['kdoutlet'];
        $rspnprmhn = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/getMoodkotaksaran', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nip' => $nip,
            ],

        ]);
        $jsnbdy = $rspnprmhn->getBody()->getContents();
        $jsrslt = json_decode($jsnbdy, true);  

        $urllotti   = $jsrslt['dftr_mood'][0]['UrlCat'];
        $idtittle   = $jsrslt['dftr_mood'][0]['idTitle'];
        
        // Log Visit 
        $rspnsvisit = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/logvisit', [
        'headers' => [
            'Content-Type' => 'application/json',
        ],
        'json' => [
            'nmfitur' => 'Suara Karyawan', 
        ],
        ]
        );
        $jsonsvist = $rspnsvisit->getBody()->getContents();
        $jsonvs = json_decode($jsonsvist, true); 

        return view('cmdialog.cm_dashsaran', compact('urllotti',  'idtittle','nip','kdoutlet','kdakses'));
    }
    public function submit_dashsaran()
    { 
         
        $client = new \GuzzleHttp\Client();
        $waktu          = date('H-i-s');
        $tanggals       = date('Y-m-d');
        $nip            = $_POST['nip'];
        $idtittle       = $_POST['idtittle'];
        $isisaran       = $_POST['isisaran']; 
        $subjctt       = $_POST['subjctt']; 
        
        $rspnprmhn = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmdashboardBody/setMoodSrn', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nip' => $nip,
                'idtittle' => $idtittle,
                'isisaran' => $isisaran,
                'fotosrn' => "F", 
                'subjct' => $subjctt, 
            ],

        ]);
        $jsnbdy = $rspnprmhn->getBody()->getContents();
        $jsrslt = json_decode($jsnbdy, true);

        return response()->json($jsrslt);
    }
    public function cm_dashsaranHistory(Request $request)
    { 
        $client = new \GuzzleHttp\Client();  
        $tanggals = date('Y-m-d');
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
                "tanggal" => $tanggals
            ],
        ]
        ); 
        $jsonprsnl     = $rspersnl->getBody()->getContents();
        $jsdfpersnl    = json_decode($jsonprsnl, true); 
        $dfuser       = $jsdfpersnl['df_psnl'];

        $kdoutlet = $dfuser[0]['kdoutlet'];

        $rspHisModsrn= $client->get('http://api.champ-group.com/champ_dev/champ_api/cmdashboardBodyV19/getHistoryMoodSrn', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nip' => $nip,
            ],
        ]
        ); 
        $jsonHisModSrn  = $rspHisModsrn->getBody()->getContents();
        $jsHistmod      = json_decode($jsonHisModSrn, true); 
        if ($jsHistmod['success'] == 0) {
            $dfhis_mood     = null;
        }else {
            $dfhis_mood     = $jsHistmod['dfhis_mood'];
        }
        
        // dd($dfhis_mood);
        // Log Visit 
        $rspnsvisit = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/logvisit', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nmfitur' => 'Suara Karyawan History', 
            ],
            ]
            );
            $jsonsvist = $rspnsvisit->getBody()->getContents();
            $jsonvs = json_decode($jsonsvist, true); 
        return view('cmdialog.cm_dashsaranhistory', compact('dfhis_mood','nip','kdoutlet','kdakses'));
    }
}
