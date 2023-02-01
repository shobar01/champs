<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Session;
use View;

class MsCmSettingMejaController extends Controller
{

    // http://api.champ-group.com/champs-mobile/msetmeja?kdakses=AVMS2&nip=K1070077&kdoutlet=MSJ03
    public function msetmeja(Request $request)
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


        $dfotlam = $jsonotl['df_otl'];

        $dfotl = array();
        for ($i = 0; $i < count($dfotlam); $i++) {
            if ($kdakses == 'AVXXX') {
                $det = ([
                    'kdoutlet' => $dfotlam[$i]['kdoutlet'],
                    'nmoutlet' => $dfotlam[$i]['nmoutlet'],
                    'sngktotl' => $dfotlam[$i]['sngktotl'],
                    'AM' => $dfotlam[$i]['AM'],
                ]);
                array_push($dfotl, $det);
            } else {
                if ($nip == $dfotlam[$i]['AM']) {
                    $det = ([
                        'kdoutlet' => $dfotlam[$i]['kdoutlet'],
                        'nmoutlet' => $dfotlam[$i]['nmoutlet'],
                        'sngktotl' => $dfotlam[$i]['sngktotl'],
                        'AM' => $dfotlam[$i]['AM'],
                    ]);
                    array_push($dfotl, $det);
                }
            }

        }
        if ($kdakses == 'AVMS2') {
            if (isset($_GET['kdoutlet'])) {
                $ikdoutlet = $_GET['kdoutlet'];
            }
        } else {
            if (isset($_GET['kdotlmj'])) {
                $ikdoutlet = $_GET['kdotlmj'];
            } else {
                $ikdoutlet = $dfotl[0]['kdoutlet'];
            }
        }
        // A = Setting Meja, B = Update kapasitas
        $rspwebcm = $client->post('http://mspoon.online/mspoon_pos/apk_webcm.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [ 
                'kdotl' => $ikdoutlet,
                'type' => 'A',
                'kdakses' => $kdakses,
            ],
        ]
        ); 
        $jsnwbcm = $rspwebcm->getBody()->getContents();
        $jsnja = json_decode($jsnwbcm, true);  
        $df_meja = $jsnja['df_meja'];

        $df_smking  = array(['jnsarea' => 'T', 'nmarea' => 'Smoking'],['jnsarea' => 'F', 'nmarea' => 'Non Smoking']); 
        // dd(count($df_meja));
        // $request->session()->put('nmapprove', $nm);
        // return view('mssettingmeja.msmeja', compact('dfotl','kdakses','ikdoutlet','df_meja'));

        // Log Visit 
        $rspnsvisit = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/logvisit', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nmfitur' => 'MS Setting Meja', 
            ],
            ]
            );
            $jsonsvist = $rspnsvisit->getBody()->getContents();
            $jsonvs = json_decode($jsonsvist, true); 
        return view('mssettingmeja.msmejabulet', compact('dfotl','kdakses','ikdoutlet','df_meja','df_smking'));

    }
    public function sbt_updtsetmja()
    {
        $kdotl      = $_POST['kdotl'];
        $kdakses    = $_POST['kdakses'];
        $nomeja     = $_POST['nomeja'];
        $kapasitas  = $_POST['kapasitas'];
        $smokarea   = $_POST['smokarea']; 
        $tippe   = $_POST['tippe']; 
        $client = new \GuzzleHttp\Client();
        $rspnupdt = $client->post('http://mspoon.online/mspoon_pos/apk_webcm.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [ 
                'kdotl' => $kdotl,
                'type' => $tippe,
                'kdakses' => $kdakses,
                'nomeja' => $nomeja,
                'kapasitas' => $kapasitas,
                'smokarea' => $smokarea, 
            ],

        ]);
        $jsnbdy = $rspnupdt->getBody()->getContents();
        $jsrslt = json_decode($jsnbdy, true);

        return response()->json($jsrslt);

    }
 

}
