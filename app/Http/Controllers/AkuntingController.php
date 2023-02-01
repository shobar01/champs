<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use View;

class AkuntingController extends Controller
{
    // http://localhost/champs-mobile/public/akunting
    public function akunting(Request $request)
    {
        $waktu = date('H-i-s');
        $tanggals = date('Y-m-d');
        $tanggal = Carbon::parse($tanggals)->translatedFormat('l, d F Y');
        $client = new \GuzzleHttp\Client();

        $response = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/getAllOutlet');
        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);
        $alloutlet = $json['dftr_outlet'];

        // Log Visit 
        $rspnsvisit = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/logvisit', [
        'headers' => [
            'Content-Type' => 'application/json',
        ],
        'json' => [
            'nmfitur' => 'Reedem Sodexo', 
        ],
        ]
        );
        $jsonsvist = $rspnsvisit->getBody()->getContents();
        $jsonvs = json_decode($jsonsvist, true);
        // dd($alloutlet);
        return view('/akunting/akunting', compact('alloutlet'));
    }
    public function akunting_cekvoucher(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $noorder = $request->input('noorder');
        $kdvocher = $request->input('kdvocher');
        $kdoutlet = $request->input('kdoutlet');
        $btnpilih = $request->input('btnpilih');

        /* "kodevoucher":"SX4BWEZ1B5",
        "outlet":"BPB02" */
        // dd($noorder . "===" . $kdvocher . "===" . $kdoutlet);
        if ($btnpilih == "btncek") {

            $response = $client->post('http://gokanaramenmania.com/pos_dana/sdx_cekvoucher.php', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'kodevoucher' => $kdvocher,
                    'outlet' => $kdoutlet,
                ],
            ]
            );
            $jsons = $response->getBody()->getContents();
            $json = json_decode($jsons, true);
            $cek_sttus = $json['areAllVouchersValid'];
            $cek_ttl = $json['totalFaceValue'];
            if ($cek_sttus == null) {
                $cek_msg = "Invalid voucher code [" . $kdvocher . "]";
            } else {
                $cek_msg = "Total FaceValue : " . $cek_ttl;
            }
        } else {

            $response = $client->post('http://gokanaramenmania.com/pos_dana/sdx_redeem.php', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'kodevoucher' => $kdvocher,
                    'outlet' => $kdoutlet,
                    'noorder' => $noorder,
                    'kodepc' => "Champs-Mobile",
                ],
            ]
            );
            $jsons = $response->getBody()->getContents();
            $json = json_decode($jsons, true);
            $cek_sttus = $json['isRedeemed'];
            $cek_ttl = $json['transactionValue'];
            if ($cek_sttus == null) {
                $cek_msg = "Invalid voucher code [" . $kdvocher . "]";
            } else {
                $cek_msg = $json['message'] . "- Transaction Value " . $cek_ttl;
            }

        }
        if ($cek_sttus == null) {
            $cek_sttus = 'false';
        } else {
            $cek_sttus = 'true';
        }
        // dd($json);

        // dd($cek_sttus . "========" . $cek_ttl . "========" . $cek_msg . "JSOOOON");
        return redirect('/akunting')->with(['cek_sttus' => $cek_sttus, 'cek_ttl' => $cek_ttl, 'cek_msg' => $cek_msg]);
    }
}
