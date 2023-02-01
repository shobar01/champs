<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use View;

class MsBukutamuController extends Controller
{
    // http://localhost/champs-mobile/msbukutamu
    public function msbukutamu(Request $request)
    {
        // $waktu = date('H-i-s');
        $tanggals = date('Y-m-d');
        $tanggal = Carbon::parse($tanggals)->translatedFormat('l, d F Y');
        $client = new \GuzzleHttp\Client();

        $date_min = date('Y-m-d');
        $date_minplgtgl = date('Y-m-d', strtotime('-20 days', strtotime(date('Y-m-d'))));
        $date_max = date('Y-m-d', strtotime('14 days', strtotime(date('Y-m-d'))));
        // $kdotl = 'MSJ01';
        if (isset($_GET['tanggal_vbktamu'])) {
            $tgl = $_GET['tanggal_vbktamu'];
            $ttgl = 'T';
        } else {
            $tgl = $tanggals;
            $ttgl = 'F';
        }
        if (isset($_GET['btn_kontak'])) {
            $btn_kontak = $_GET['btn_kontak'];
        } else {
            $btn_kontak = 'F';
        }
        if (isset($_GET['kdoutlet'])) {
            $kdoutlet = $_GET['kdoutlet'];
            $nmoutlet = $_GET['nmoutlet'];
        } else {
            $kdoutlet = session('kd_dept');
            $nmoutlet = session('outlet');
        }

        if ($btn_kontak == 'F') {

            $response = $client->post('http://mspoon.online/mspoon_pos/tamu.php', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'kdoutlet' => $kdoutlet,
                    'wktdatang' => "",
                    'jmlorang' => "",
                    'nip' => "",
                    'nmcust' => "",
                    'kontak' => "",
                    'wktmasuk' => "",
                    'tipe' => "C",
                    'tanggal' => $tgl,
                    'sttusantrian' => "",
                    'noantriparm' => "",
                    'ket' => "",
                ],
            ]
            );
        } else if ($btn_kontak == 'R') {
            $response = $client->post('http://mspoon.online/mspoon_pos/tamu.php', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'kdoutlet' => $kdoutlet,
                    'wktdatang' => "",
                    'jmlorang' => "",
                    'nip' => "",
                    'nmcust' => "",
                    'kontak' => "",
                    'wktmasuk' => "",
                    'tipe' => "L",
                    'tanggal' => $tgl,
                    'sttusantrian' => "",
                    'noantriparm' => "",
                    'ket' => "",
                ],
            ]
            );
        } else {
            $response = $client->post('http://mspoon.online/mspoon_pos/tamu.php', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'kdoutlet' => $kdoutlet,
                    'wktdatang' => "",
                    'jmlorang' => "",
                    'nip' => "",
                    'nmcust' => "",
                    'kontak' => "",
                    'wktmasuk' => "",
                    'tipe' => "C",
                    'tanggal' => "",
                    'sttusantrian' => "",
                    'noantriparm' => "",
                    'ket' => "",
                ],
            ]
            );
        }
        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);
        if ($json['tamu'] == []) {
            $df_tamunow = null;
        } else {
            $df_tamunow = $json['tamu'];
        }

        $responseall = $client->post('http://mspoon.online/mspoon_pos/tamu.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'kdoutlet' => $kdoutlet,
                'wktdatang' => "",
                'jmlorang' => "",
                'nip' => "",
                'nmcust' => "",
                'kontak' => "",
                'wktmasuk' => "",
                'tipe' => "C",
                'tanggal' => "",
                'sttusantrian' => "",
                'noantriparm' => "",
                'ket' => "",
            ],
        ]
        );

        $jsonsall = $responseall->getBody()->getContents();
        $jsonall = json_decode($jsonsall, true);
        $df_tamuall = $jsonall['tamu'];

        $responseckmj = $client->post('http://mspoon.online/mspoon_pos/trxmeja2.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'kdoutlet' => session('kd_dept'),
            ],
        ]
        );

        $jsonsckmj = $responseckmj->getBody()->getContents();
        $jsonmj = json_decode($jsonsckmj, true);
        $df_meja = $jsonmj['meja'];
        // dd($df_tamunow);
        // return view('.bukutamums.bktamums', compact('tgl', 'ttgl', 'df_tamunow', 'df_tamuall', 'btn_kontak', 'kdoutlet', 'nmoutlet', 'df_meja','date_min','date_max','date_minplgtgl'));
    }

    public function contacttamu()
    {
        $kdoutlet = $_POST['kdoutlet'];
        $tipe = $_POST['tipe'];
        $nmcust = $_POST['nmcust'];
        $kontak = $_POST['kontak'];
        $meja = $_POST['meja'];
        $pax_tmu = $_POST['pax_tmu'];
        $tanggals = date('Y-m-d');
        $tglreservasi = $_POST['tglreservasi'];
        $client = new \GuzzleHttp\Client();
        if ($tipe == 'I' || $tipe == 'K') {

            $urutan = $_POST['urutan'];
            $responseDfrdet = $client->post('http://mspoon.online/mspoon_pos/tamu.php', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'kdoutlet' => $kdoutlet,
                    'wktdatang' => date('Y-m-d H:i:s'),
                    'jmlorang' => "1",
                    'nip' => session('nip'),
                    'nmcust' => $nmcust,
                    'kontak' => $kontak,
                    'wktmasuk' => date('Y-m-d H:i:s'),
                    'tipe' => $tipe,
                    'tanggal' => $tanggals,
                    'sttusantrian' => "",
                    'noantriparm' => "",
                    'ket' => "",
                    'meja' => $meja,
                    'urutan' => $urutan,
                    'kdantri' => 'TM' . date('ymd'),
                    'tglreservasi' => $tglreservasi,
                ],

            ]);
            $jsonsDfrdet = $responseDfrdet->getBody()->getContents();
            $json = json_decode($jsonsDfrdet, true);
            // $data = $json['tamu'];
            return response()->json($json);
        } else {

            $ketrngn = $_POST['ketrngn'];
            $tglreservasi = $_POST['tglreservasi'];
            $responseDfrdet = $client->post('http://mspoon.online/mspoon_pos/tamu.php', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'kdoutlet' => $kdoutlet,
                    'wktdatang' => date('Y-m-d H:i:s'),
                    'jmlorang' => "1",
                    'nip' => session('nip'),
                    'nmcust' => $nmcust,
                    'kontak' => $kontak,
                    'wktmasuk' => date('Y-m-d H:i:s'),
                    'tipe' => $tipe,
                    'tanggal' => $tanggals,
                    'sttusantrian' => "",
                    'noantriparm' => "",
                    'ket' => $ketrngn,
                    'meja' => $meja,
                    'pax_tmu' => $pax_tmu,
                    'kdantri' => 'TM' . date('ymd'),
                    'tglreservasi' => $tglreservasi,
                ],

            ]);
            $jsonsDfrdet = $responseDfrdet->getBody()->getContents();
            $json = json_decode($jsonsDfrdet, true);
            $data = $json['tamu'];
            // return response()->json($data);
        }

    }

    public function direct_msbukutamu(Request $request)
    {
        // $waktu = date('H-i-s');
        $tanggals = date('Y-m-d');
        $tanggal = Carbon::parse($tanggals)->translatedFormat('l, d F Y');
        $client = new \GuzzleHttp\Client();

        if (isset($_GET['kdoutlet'])) {
            $kdoutlet = $_GET['kdoutlet'];
            $nmoutlet = $_GET['nmoutlet'];
        } else {
            $kdoutlet = session('kd_dept');
            $nmoutlet = session('outlet');
        }
        // dd($df_tamunow);
        return view('.bukutamums.directbktamums', compact('kdoutlet', 'nmoutlet'));
    }
}
