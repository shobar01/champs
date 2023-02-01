<?php

namespace App\Http\Controllers;

use App\Exports\SuaraKaryawanExcelExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use View;

class MsVerificationController extends Controller
{
    //  http://localhost/champs-mobile/msverification?kdakses=AVMS2&nip=K1070077
    public function msverification(Request $request)
    {
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
                "nip" => $nip 
            ],
        ]
        ); 
        $jsonprsnl     = $rspersnl->getBody()->getContents();
        $jsdfpersnl    = json_decode($jsonprsnl, true); 
        $dfuser       = $jsdfpersnl['df_psnl'];
        $ttgl       = $dfuser[0]['ttgl'];
        $waktu       = $dfuser[0]['waktu'];
 
        $tanggalll = Carbon::parse($ttgl)->translatedFormat('l, d F Y');
        $qrgnrt = base64_encode($nip.'#'.$ttgl.'#'.$waktu.'#POSTAB');
        // $qrgnrt = $nip.'#'.$ttgl.'#'.$waktu.'#POSTAB';

        // dd($qrgnrt);
      
         // Log Visit 
        $rspnsvisit = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/logvisit', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nmfitur' => 'PosTab Verification', 
            ],
            ]
            );
            $jsonsvist = $rspnsvisit->getBody()->getContents();
            $jsonvs = json_decode($jsonsvist, true); 

        return view('msverification.msverification', compact( 'dfuser','ttgl','tanggalll','kdakses','nip','qrgnrt')); 
      

    }
    
}
