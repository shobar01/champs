<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Session;
use View;

class PresenceController extends Controller
{
    // http://api.champ-group.com/champs-mobile/public/presence?nip=P2005116&periode_bln=05&periode_thn=2021
    public function presence(Request $request)
    {
        $waktu = date('H-i-s');
        $tanggals = date('Y-m-d');
        $tanggal = Carbon::parse($tanggals)->translatedFormat('l, d F Y');
        $client = new \GuzzleHttp\Client();
        $nip = $_GET['nip']; 

        // dd($nip);
        if (isset($_GET['nip'])) {
            
            if(isset($_GET['periode_bln']) && $_GET['periode_bln'] != 0){
                $thn = $_GET['periode_thn'];
                $bln = $_GET['periode_bln'];
            }else{
                $thn = date('Y');
                $bln = date('m');
            }
        }  

        $response = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmpresence/getViewAbsen?nip=' . $nip . '&periode_bln=' . $bln . '&periode_thn=' . $thn);
        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);
        $absensi = $json['absensi'];
        // dd($nip . "=========" . $thn."===".$bln);
        $request->session()->put('nip', $nip);
        $request->session()->put('thncm', $thn);
        $request->session()->put('blncm', $bln);

        // Log Visit 
        $rspnsvisit = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/logvisit', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nmfitur' => 'History Absen', 
            ],
            ]
            );
            $jsonsvist = $rspnsvisit->getBody()->getContents();
            $jsonvs = json_decode($jsonsvist, true); 
        // dd($absensi);
        return view('/presence/presence', compact('absensi'));
    }
    public function presence_periode(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $nip = session('nip');
        $bln = $request->input('perid_bln');
        $thn = $request->input('perid_thn');
        // dd($nip . "=========" . $thn . "===" . $bln);
        return redirect('/presence?nip=' . $nip . '&periode_bln=' . $bln . '&periode_thn=' . $thn);
    }
}
