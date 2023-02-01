<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Session;
use View;

class CMLogKreditController extends Controller
{

    // http://localhost/champs-mobile/dashlogkredit?kdakses=AVMS2&nip=K1070077&kdoutlet=MSJ03
    public function dashlogkredit(Request $request)
    {
        $client = new \GuzzleHttp\Client();

        $ttgl = date('Y-m-d');  
       
        if (isset($_GET['kdakses'])) { 
            $kdakses = $_GET['kdakses'];
            $nip = $_GET['nip']; 
        } else {
            $kdakses = 'AVXXX';
            $nip = 'K1050012';
        }
        $tanggalll = Carbon::parse($ttgl)->translatedFormat('l, d F Y');

        $rsplogk = $client->get('http://api.champ-group.com/champ_dev/logtblkredit/cektabel', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [  
            ],

        ]);
        $jsnbdylogk = $rsplogk->getBody()->getContents();
        $jsrsltlogk = json_decode($jsnbdylogk, true);
        // Log Visit 
        $rspnsvisit = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/logvisit', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nmfitur' => 'Log Kredit', 
            ],
            ]
            );
            $jsonsvist = $rspnsvisit->getBody()->getContents();
            $jsonvs = json_decode($jsonsvist, true); 
        // dd($jsrsltlogk); 
        return view('logkredit.dash_logkredit', compact('kdakses','nip','jsrsltlogk'));

    }
    
    public function submit_upket(Request $request)
    {
        // kdoutlet,tanggal,nipcek,ket,ipdb
        $tipe           = $_POST['tipe'];
        $kdoutlet       = $_POST['kdoutlet'];
        $nipcek         = $_POST['nipcek'];
        $ket            = $_POST['ket'];
        $ipdb           = $_POST['tipp']; 
        
        $tanggal = date('Y-m-d');
        $client = new \GuzzleHttp\Client();
        if ($tipe == 'A') {
            $rspnn = $client->post('http://api.champ-group.com/champ_dev/logtblkredit/ubahipdb', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'kdoutlet' => $kdoutlet,
                    'ipdb' => $ipdb,
                ],
    
            ]);
        }elseif ($tipe == 'B') {
            $rspnn = $client->post('http://api.champ-group.com/champ_dev/logtblkredit/ubahaction', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'kdoutlet' => $kdoutlet,
                    'tanggal' => $tanggal,
                    'nipcek' => $nipcek,
                    'ket' => $ket,
                ],
    
            ]);
        }
        
    
        $jsnbdy = $rspnn->getBody()->getContents();
        $jsrslt = json_decode($jsnbdy, true);

        return response()->json($jsrslt);

    }
 

}
