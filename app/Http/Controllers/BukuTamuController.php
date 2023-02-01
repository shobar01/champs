<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use View;

class BukuTamuController extends Controller
{

    // http://api.champ-group.com/champs-mobile/public/master?nmapprovl=ahmad%20sobari
    public function repot_bt(Request $request)
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->get('http://api.champ-group.com/champ_dev/rpt_tamu/pengunjung');

        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);
        $dfrbyOutlet = $json['byOutlet'];
        // Log Visit 
        $rspnsvisit = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/logvisit', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nmfitur' => 'BukuTamu', 
            ],
            ]
            );
            $jsonsvist = $rspnsvisit->getBody()->getContents();
            $jsonvs = json_decode($jsonsvist, true); 
        // dd($dfrbyOutlet);
        return view('/bukutamu/rptbukutamu', compact('dfrbyOutlet'));

    }

}
