<?php

namespace App\Http\Controllers;

use App\Exports\SuaraKaryawanExcelExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use View;

class SuaraKaryawanController extends Controller
{
    // http://localhost/champs-mobile/suara_krwn 
    public function suara_krwn(Request $request)
    {
        $client = new \GuzzleHttp\Client();

        $ttgl = date('Y-m-d');
        $maxbln = date('Y-m',strtotime('+2 month'));
        $nowbln = date('Y-m'); 
        if (isset($_GET['tgl_suarakrwan']) OR isset($_GET['bln_suarakrwan'])) {
            $itgl = $_GET['tgl_suarakrwan'];
            $ibln = $_GET['bln_suarakrwan'];
            $tipe = $_GET['tipe_suarakrwan'];
            
        // dd($itgl.'===='.$ibln.'====='.$tipe);
        // dd($itgl.'===='.$ibln);
        } else {
            $tipe = "A";
            $itgl = $ttgl;
            $ibln = $nowbln;
        }
        $tanggalll = Carbon::parse($itgl)->translatedFormat('l, d F Y');
        $rspsrk = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/getBkSuaraKaryawan', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [ 
                'tipe' => $tipe,
                'tgl' => $itgl,
                'bln' => $ibln,
            ],
        ]
        );
        
        $jsnbdy = $rspsrk->getBody()->getContents();
        $jsrslt = json_decode($jsnbdy, true);
        if ($jsrslt['df_suarak'] == []) {
            $df_suarak = null; 
        } else {  
             $df_suarak = $jsrslt['df_suarak'];
        }


        // Log Visit 
        $rspnsvisit = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/logvisit', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nmfitur' => 'Dashboard Suara Karyawan', 
            ],
            ]
            );
            $jsonsvist = $rspnsvisit->getBody()->getContents();
            $jsonvs = json_decode($jsonsvist, true); 

        if ($tipe == "C") {

            // return view('hris.exprt_suarakaryawan', compact('df_suarak'));
            return Excel::download(new SuaraKaryawanExcelExport($tipe, $itgl, $ibln),
                'suarakaryawan_' . $ibln . '.xlsx');

        } else {
            
        return view('hris.suarakaryawan', compact( 'tanggalll', 'itgl','df_suarak','maxbln','ibln'  )); 
        }
        
        // dd($df_suarak);

    }

}
