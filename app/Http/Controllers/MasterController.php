<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Session;
use View;

class MasterController extends Controller
{

    // http://api.champ-group.com/champs-mobile/public/master?nmapprovl=ahmad%20sobari
    public function master(Request $request)
    {

        $waktu = date('H-i-s');
        $tanggals = date('Y-m-d');
        $tanggal = Carbon::parse($tanggals)->translatedFormat('l, d F Y');
        $client = new \GuzzleHttp\Client();

        if (isset($_GET['kdakses'])) {
            $kdakses = $_GET['kdakses'];
            $nip = $_GET['nip'];
        }
        $rspersnl = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmteactivtity/getPersonalActivity', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                "nip" => $nip,
                "tanggal" => date('Y-m-d'),
            ],
        ]
        );
        $jsonprsnl = $rspersnl->getBody()->getContents();
        $jsdfpersnl = json_decode($jsonprsnl, true);
        $dfuser = $jsdfpersnl['df_psnl'];

        // dd($dfuser[0]['nm_lengkap']);
        $nm = $dfuser[0]['nm_lengkap'];

        $rspswitchms = $client->get('http://mspoon.online/mspoon_pos/apk_master.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                "nip" => $nip,
                "kdakses" => $kdakses,
                "tipe" => 'A',
                "nama" => $nm,
            ],
        ]
        );
        $jsonswcthms = $rspswitchms->getBody()->getContents();
        $jsswtchms = json_decode($jsonswcthms, true);
        // dd($jsswtchms);
        $dflog = $jsswtchms['df_log'];
        $dflinkurl = $jsswtchms['df_linkurl'];
        $dfswitch = $jsswtchms['df_switch'];

        // Log Visit
        $rspnsvisit = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/logvisit', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nmfitur' => 'Master Device',
            ],
        ]
        );
        $jsonsvist = $rspnsvisit->getBody()->getContents();
        $jsonvs = json_decode($jsonsvist, true);

        if ($nm == 'ICT') {
            dd('Who are you? anonymous');
        } else {
            $response = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/getimeiapprove');

            $jsons = $response->getBody()->getContents();
            $json = json_decode($jsons, true);
            if (isset($json['dfrgnti'])) {
                $dfrgnti = $json['dfrgnti'];
            } else {
                $dfrgnti = '0';
            }
            // dd($json);
            $request->session()->put('nmapprove', $nm . '&kdakses=' . $kdakses . '&nip=' . $nip);
            return view('.master.master', compact('dfrgnti', 'dflog', 'dflinkurl', 'dfswitch', 'kdakses', 'nm', 'nip'))->with('nmapprove');
        }
    }

    public function master_gantiimei(Request $request)
    {

        // a_nip, a_dvcimei, a_dvchp, a_nm, a_con
        $client = new \GuzzleHttp\Client();
        $nip = $request->input('a_nip');
        $approval = session('nmapprove');
        $afnmdvc = $request->input('a_dvchp');
        $afiddvc = $request->input('a_dvcimei');
        $nmnip = $request->input('a_nm');
        $cont = $request->input('a_con');
        // afiddvc ,afnmdvc ,  nip
        // dd($nip  . "===" . $approval . "===" . $afnmdvc . "===" . $afiddvc);
        $response = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/setupdateimei', [
            'form_params' => [
                'nip' => $nip,
                'approval' => $approval,
                'afnmdvc' => $afnmdvc,
                'afiddvc' => $afiddvc,
            ],
        ]
        );
        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);
        $gtniimei = $json['gtniimei'];

        if ($gtniimei == 'true') {
            $msg = 'Success! ' . $nmnip . ' (' . $nip . ') Sudah melakukan ganti perangkat sebanyak ' . $cont . ' kali';
            $stt = '1';

            $responseNOtif = $client->post('http://api.champ-group.com/champs-mobile/champs_api/notif/sendPushByNip.php', [
                'form_params' => [
                    'title' => 'Silahkan Login Kembali',
                    'message' => 'Melakukan ganti perangkat sebanyak ' . $cont . ' kali',
                    'submessage' => 'Ganti Perangkat',
                    'nip' => $nip,
                ],
            ]
            );
            $jsonsNotif = $responseNOtif->getBody()->getContents();
            $jsonNotif = json_decode($jsonsNotif, true);

        } else {
            $msg = 'Gagal Update perangkat! ';
            $stt = '0';
        }
        $aa = str_replace(" ", "%20", $approval);
        // dd($msg);
        return redirect('/master?nmapprovl=' . $aa)->with(['msg' => $msg, 'stt' => $stt]);
    }

    public function master_resetpass(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $nip = $_POST['pass_nip'];
        $type = $_POST['type']; // setResetGandtidevice, setResetPass
        $rspnprmhn = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/' . $type, [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nip' => $nip,
            ],

        ]);
        $jsnbdy = $rspnprmhn->getBody()->getContents();
        $jsrslt = json_decode($jsnbdy, true);

        return response()->json($jsrslt);

        // return redirect('/master?nmapprovl=' . $aa)->with(['jmessage' => $jmessage, 'jsuccess' => $jsuccess]);
    }

}
