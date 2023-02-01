<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use View;

class DFRMobileController extends Controller
{
    // http://localhost/champs-mobile/dfr_mobile?nip=K1050012&kdakses=AVXXX
    public function dfr_mobile(Request $request)
    {
        $waktu = date('H-i-s');
        $tanggals = date('Y-m-d');
        $tanggal = Carbon::parse($tanggals)->translatedFormat('d F Y');
        $client = new \GuzzleHttp\Client();

        $rspnotl = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/getOtlMS', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
            ],
        ]
        );

        if (isset($_GET['kdakses'])) {
            $kdakses = $_GET['kdakses'];
            $nip = $_GET['nip']; // yolius
        } else {
            $kdakses = 'AVMS3';
            $nip = 'K1060078';
            // E2050001    Dede Koswara
            // K1060078    Yulius Evren
        }

        $jsonotls = $rspnotl->getBody()->getContents();
        $jsonotl = json_decode($jsonotls, true); 
        $dfotlam = $jsonotl['df_otl'];

        $rspersnl = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmteactivtity/getPersonalActivity', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [ 
                "nip" => $nip,
                "tanggal" => $tanggals
            ],
        ]
        ); 
        $jsonprsnl     = $rspersnl->getBody()->getContents();
        $jsdfpersnl    = json_decode($jsonprsnl, true); 
        $dfuser       = $jsdfpersnl['df_psnl'];

        // dd($dfuser);



        $dfotl = array();
        if ($kdakses == 'AVMS4') {
            $det = ([
                'kdoutlet' => $dfuser[0]['kdoutlet'],
                'nmoutlet' => $dfuser[0]['dept'],
                'sngktotl' => $dfuser[0]['dept'],
                'AM' => '',
            ]);
            array_push($dfotl, $det);
        }else{
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
        }

        // dd($dfotl);
        if (isset($_GET['kdotl'])) {
            $kdotl = $_GET['kdotl'];
        } else {
            $kdotl = $dfotl[0]['kdoutlet'];
        }
        if (isset($_GET['tgl'])) {
            $tgl = $_GET['tgl'];
            // dd($tgl);
        } else {
            $tgl = $tanggals;
        }

        $response = $client->post('http://mspoon.online/mspoon_pos/dfr.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'kdoutlet' => $kdotl,
                'tanggal' => $tgl,
            ],
        ]
        );
        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);
        // $df_jlkasir = $json['jualkasir'];
        if (isset($json['kdoutlet'])) {
            // $df_tcup = $json['tcup'];
            $krgpssales = 100 - (float) $json['pssales'];
        } else {
            $krgpssales = 0;
            // $pssales = 30;

        }
        $responsehitung = $client->post('http://mspoon.online/mspoon_pos/deldita.php', [

            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'kdoutlet' => $kdotl,
                'tanggal' => $tgl,
            ],
        ]);
        $jsonshitung = $responsehitung->getBody()->getContents();
        $jsonhitung = json_decode($jsonshitung, true);
        $hitung = $jsonhitung['hitung'];
        // dd($json);
        // Log Visit 
        $rspnsvisit = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/logvisit', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nmfitur' => 'DFR MS/DW/CR', 
            ],
            ]
            );
            $jsonsvist = $rspnsvisit->getBody()->getContents();
            $jsonvs = json_decode($jsonsvist, true); 
        return view('.dfr_mobile.dfr', compact('dfotl', 'tgl', 'kdotl', 'json', 'krgpssales', 'hitung', 'tanggal', 'kdakses', 'nip'));
    }
    public function dfrdet()
    {
        $tipe = $_POST['tipe'];
        $tanggal = $_POST['tanggal'];
        $kdotll = $_POST['kdotl'];

        $wktawal = $_POST['wktawal'];
        $wktakhir = $_POST['wktakhir'];
        // dd($kdotl);
        // $tipe = 'A';
        // $tanggal = date('Y-m-d');

        $client = new \GuzzleHttp\Client();
        $responseDfrdet = $client->post('http://mspoon.online/mspoon_pos/dfrdet.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'kdoutlet' => $kdotll,
                'tanggal' => $tanggal,
                'tipe' => $tipe,
                'wktawal' => $wktawal,
                'wktakhir' => $wktakhir,
            ],
        ]);
        $jsonsDfrdet = $responseDfrdet->getBody()->getContents();
        $json = json_decode($jsonsDfrdet, true);

        return response()->json($json);
    }

    public function dfrmenuterjual()
    {
        $tanggal = $_POST['tanggal'];
        $kdotll = $_POST['kdotl'];

        $client = new \GuzzleHttp\Client();
        $responseDfrdet = $client->post('http://mspoon.online/mspoon_pos/menuterjual.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'kdoutlet' => $kdotll,
                'tglclosing' => $tanggal,
            ],
        ]);
        $jsonsDfrdet = $responseDfrdet->getBody()->getContents();
        $json = json_decode($jsonsDfrdet, true);
        $data = $json['menuterjual'];
        return response()->json($data);
    }

}
