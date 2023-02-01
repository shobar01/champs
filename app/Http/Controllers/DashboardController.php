<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use View;

class DashboardController extends Controller
{
    public function dashboard()
    {

        $waktu = date('H-i-s');
        $tanggals = date('Y-m-d');
        $tanggal = Carbon::parse($tanggals)->translatedFormat('l, d F Y');
        $nip = session('nip');
        $client = new \GuzzleHttp\Client();
        $response = $client->post('http://mspoon.online/mspoon_worder/cekawal.php', [

            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'kdoutlet' => session('kd_dept'),
                'tglclosing' => $tanggals,
                'nip' => $nip,
            ],
        ]);

        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);
        // dd($json);
        $arrybrgwo = $json['barangwo'];

        $response2 = $client->post('http://mspoon.online/mspoon_worder/addbrgwo.php', [

            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'kdoutlet' => session('kd_dept'),
                'tglclosing' => $tanggals,
            ],
        ]);

        $jsons_baking = $response2->getBody()->getContents();
        $json_baking = json_decode($jsons_baking, true);
        $arryhtmsk = $json_baking['histmasak'];
        // dd($arryhtmsk);
//        dd($tanggal."====".$waktu);
//        dd($outlet."====".$waktu);
        return view('dashboard', compact('arrybrgwo', 'arryhtmsk'));

    }
    public function dashboard_addlstmenu(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $kdoutlet = session('kd_dept');
        $tglclosing = date('Y-m-d');
        $kdbarang = $request->input('kdbarang');
        $qtybarang = $request->input('qtybarang');
        $periode1 = $request->input('periode1');
        $nip = session('nip');
        // dd($kdoutlet . "===" . $tglclosing . "===" . $kdbarang . "===" . $qtybarang . "===" . $periode1 . "===" . $nip);
        $response = $client->post('http://mspoon.online/mspoon_worder/addbrgwo.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'kdoutlet' => $kdoutlet,
                'tglclosing' => $tglclosing,
                'kdbarang' => $kdbarang,
                'qtybarang' => $qtybarang,
                'periode1' => $periode1,
                'nip' => $nip,
            ],

        ]
        );
        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);
        // dd($json);
        return redirect('dashboard');
    }
}
