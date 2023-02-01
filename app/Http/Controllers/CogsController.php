<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use View;

class CogsController extends Controller
{
    // http://localhost/champs-mobile/public/viewcogs?kdakses=AVXX3&nip=A1050012
    public function viewcogs(Request $request)
    {
        // $waktu = date('H-i-s');
        $tanggals = date('Y-m-d');
        $tanggal = Carbon::parse($tanggals)->translatedFormat('l, d F Y');
        $client = new \GuzzleHttp\Client();
        if (isset($_GET['nip'])) {
            $nip = $_GET['nip'];
        } elseif (isset($_GET['nipam'])) {
            $nip = $_GET['nipam'];
        } else {
            $nip = '97100001';
        }
        if (isset($_GET['idakses1'])) {
            $idakses = $_GET['idakses1'];
        } elseif (isset($_GET['idakses2'])) {
            $idakses = $_GET['idakses2'];
        } else {
            $idakses = $_GET['kdakses'];
        }
        $response = $client->post('http://api.champ-group.com/champ_dev/cmtask/ctbaru.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'otlbo' => 'OTL',
            ],
        ]
        );
        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);
        $areamanager = $json['areamanager'];
        // dd($areamanager);
        if (isset($_GET['waktu'])) {
            $waktu = $_GET['waktu'];
            $wkt = explode('-', $waktu);
            $tahun = $wkt[0];
            $bulan = $wkt[1];
        } else {
            $waktu = date('Y-m');
            $tahun = date('Y');
            $bulan = date('m');
        }

        $response = $client->post('http://portal2.champ-group.com/notifierpo/mkt_voucher/rptcogs', [

            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'tahun' => $tahun,
                'bulan' => $bulan,
                'nip' => $nip,
                'idakses' => $idakses,
            ],
        ]);
        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);
        $reportcogs = $json['reportcogs'];
        // $reportcogs =[];
        // dd($reportcogs);
        // $request->session()->put('nip', $nip);
        // $request->session()->put('idakses', $idakses);
        // Log Visit 
        $rspnsvisit = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/logvisit', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nmfitur' => 'COGS', 
            ],
            ]
            );
            $jsonsvist = $rspnsvisit->getBody()->getContents();
            $jsonvs = json_decode($jsonsvist, true); 
        return view('.cogs.viewcogs', compact('areamanager', 'reportcogs', 'waktu', 'nip', 'idakses'));
    }
}
