<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Session;
use View;

class CMDirectSupplyController extends Controller
{

    // http://localhost/champs-mobile/dashdirecsupply?kdakses=AVMS2&nip=K1070077&kdoutlet=MSJ03
    public function dashdirecsupply(Request $request)
    {
        $client = new \GuzzleHttp\Client();

        $ttgl = date('Y-m-d');  
       
        if (isset($_GET['kdakses'])) { 
            $kdakses = $_GET['kdakses'];
            if (isset($_GET['nipam'])) {
                $nip = $_GET['nipam']; 
            }else {
                $nip = $_GET['nip']; 
                
            }
        } else {
            $kdakses = 'AVXXX';
            $nip = 'K1050012';
        }
        $tanggalll = Carbon::parse($ttgl)->translatedFormat('l, d F Y');
        if (isset($_GET['spin_tglds'])) {
            $ttgl = $_GET['spin_tglds'];  
        } else { 
            $ttgl = date('Y-m-d'); 
        }
        
        $date_max = date('Y-m-d'); 
        $date_min = date('Y-m-d', strtotime('-1 month', strtotime( date('Y-m-d') ))); 
        $rspdsdnrt = $client->post('portal2.champ-group.com/notifierpo/directsup/cmgenrptterima', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [  
                'tanggal' => $ttgl, 
            ],

        ]);

        $jsnbdydstr = $rspdsdnrt->getBody()->getContents();
        $jsrsltdstr = json_decode($jsnbdydstr, true);

        $rspds = $client->post('portal2.champ-group.com/notifierpo/directsup/cmviewrptds', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [  
                'tanggal' => $ttgl,
                'nipam' => $nip,
            ],

        ]);
        $jsnbdyds = $rspds->getBody()->getContents();
        $jsrsltd = json_decode($jsnbdyds, true);
        if ($jsrsltd == []){

            $jsrsltds = null;
        }else {
            $jsrsltds = $jsrsltd;
        } 

        $responseam = $client->post('http://api.champ-group.com/champ_dev/cmtask/ctbaru.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'otlbo' => 'OTL',
            ],
        ]);
        $jsonsam = $responseam->getBody()->getContents();
        $jsonam = json_decode($jsonsam, true);
        // dd($jsonam);
        $am = $jsonam['areamanager'];

        // Log Visit 
        $rspnsvisit = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/logvisit', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nmfitur' => 'Direct Supply', 
            ],
            ]
            );
            $jsonsvist = $rspnsvisit->getBody()->getContents();
            $jsonvs = json_decode($jsonsvist, true); 
        // dd($am); 
        return view('directsuply.dash_ds', compact('kdakses','nip','jsrsltds','ttgl','date_max','date_min','am'));

    }
    
    public function dfdet_dsuplier(Request $request)
    {  
        $tanggal    = $_POST['tanggal'];
        $nipam      = $_POST['nipam'];
        $kdoutlet   = $_POST['kdoutlet'];
        $kdsup      = $_POST['kdsup'];

        $client = new \GuzzleHttp\Client();
        $responseDfrdet = $client->post('portal2.champ-group.com/notifierpo/directsup/cmviewrptdetds', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'tanggal' => $tanggal,
                'nipam' => $nipam,
                'kdoutlet' => $kdoutlet,
                'kdsup' => $kdsup,
            ],
        ]);
        $jsonsDfrdet = $responseDfrdet->getBody()->getContents();
        $json = json_decode($jsonsDfrdet, true);
        $data = $json['detterima'];
        return response()->json($data);

    }
 

}
