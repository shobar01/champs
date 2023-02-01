<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use View;

class LoncatClsController extends Controller
{
    // http://localhost/champs-mobile/loncatcls
    public function loncat(Request $request)
    {
        $waktu = date('H-i-s');
        $tanggals = date('Y-m-d');
        $tanggal = Carbon::parse($tanggals)->translatedFormat('l, d F Y');
        $client = new \GuzzleHttp\Client();


        $rspnotl = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/getOtlMS', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
            ],
        ]
        ); 
        $jsonotls = $rspnotl->getBody()->getContents();
        $jsonotl = json_decode($jsonotls, true); 

        $dfotl = $jsonotl['df_otl'];

        if (isset($_GET['kdotl'])) {
            $kdotl = $_GET['kdotl'];
        } else {
            $kdotl = 'MSJ01';
        }
        if (isset($_GET['tgl'])) {
            $tgl = $_GET['tgl'];
            // dd($tgl);
        } else {
            $tgl = $tanggals;
        }
        if (isset($_GET['stts_lonctcls'])) {
            $rspnotll = $client->post('http://mspoon.online/mspoon_pos/loncatcls.php', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'kdoutlet' => $kdotl,
                    'tglclosing' => $tgl,
                ],
            ]
            );
            $jsonotlsl = $rspnotll->getBody()->getContents();
            $jsonotll = json_decode($jsonotlsl, true);

            $ssion_sttslonctcls = $_GET['stts_lonctcls'];
            // dd($dfotll);
        } else {
            $ssion_sttslonctcls = 'F';

        }
        // Log Visit 
        $rspnsvisit = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/logvisit', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nmfitur' => 'Loncat Closing', 
            ],
            ]
            );
            $jsonsvist = $rspnsvisit->getBody()->getContents();
            $jsonvs = json_decode($jsonsvist, true); 
        // dd($ssion_sttslonctcls);
        return view('/loncatcls/loncatcls', compact('dfotl', 'tgl', 'kdotl', 'ssion_sttslonctcls'));
    }

}
