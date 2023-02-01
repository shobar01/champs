<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use View;

class MSCompareController extends Controller
{
    // http://localhost/champs-mobile/public/mscompare
    public function mscompare(Request $request)
    {
        $waktu = date('H-i-s');
        $tanggals = date('Y-m-d');
        $tanggal = Carbon::parse($tanggals)->translatedFormat('l, d F Y');
        $client = new \GuzzleHttp\Client();

        $response = $client->get('http://portal.champ-group.com/notifierpo/ms_compare/dfoutlet');
        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);
        $otlms = $json['outlet'];

        // Log Visit 
        $rspnsvisit = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/logvisit', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nmfitur' => 'MS Compare', 
            ],
            ]
            );
            $jsonsvist = $rspnsvisit->getBody()->getContents();
            $jsonvs = json_decode($jsonsvist, true); 

        // dd($otlms);
        return view('/mscompare/mscompare', compact('otlms'));
    }
    public function mscompare_cek(Request $request)
    {
        $client = new \GuzzleHttp\Client();

        $kdoutlet = $request->input('kdoutlet');
        $tanggal = $request->input('tanggal');

        /* "kodevoucher":"SX4BWEZ1B5",
        "outlet":"BPB02" */
        // dd($kdoutlet . "===" . $tanggal);

        $response = $client->post('http://portal.champ-group.com/notifierpo/ms_compare/getmsjldet', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'tanggal' => $tanggal,
                'kdoutlet' => $kdoutlet,
            ],
        ]
        );
        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);

        $rowdet = $json['rowdet'];
        $blmmasuk = $json['blmmasuk'];

        // dd($json);
        // dd($json['blmmasuk']);

        // dd($cek_sttus . "========" . $cek_ttl . "========" . $cek_msg . "JSOOOON");
        return redirect('/mscompare')->with(['rowdet' => $rowdet, 'blmmasuk' => $blmmasuk, 'kdoutlet' => $kdoutlet]);
    }
    public function mscompare_resync(Request $request)
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->post('http://portal.champ-group.com/notifierpo/ms_compare/resync', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
            ],
        ]
        );
        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);

        $mssg = $json['mssg'];
        $rowres = $json['rowres'];

        // dd($mssg);
        // dd($json['blmmasuk']);

        // dd($cek_sttus . "========" . $cek_ttl . "========" . $cek_msg . "JSOOOON");
        return redirect('/mscompare')->with(['mssg' => $mssg, 'rowres' => $rowres]);
    }
}
