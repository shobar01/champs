<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddMenuController extends Controller
{
    public function nip()
    {
        if (session('nip') == null) {
            if (isset($_GET['nip'])) {
                session(['nip' => $_GET['nip']]);
                return session('nip');
            } else {
                return redirect()->back()->with('error', 'NIP TIDAK TERBACA!');
            }
        }else{
            return session('nip');
        }
    }
    public function viewAddMenu(Request $request)
    {
        $nip = $this->nip();
        $tanggal = $request->input('tanggal') ?? date('Y-m-d');

        $client = new \GuzzleHttp\Client();
        $response = $client->post('http://mspoon.online/mspoon_pos/addmenu.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'tanggal' => $tanggal,
                'tipe' => 'E',
            ],

        ]);
        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);
        $menu = $json['menu'];
        $jmlmn = $json['jmlmn'];
        // dd($json);
        return view('addmenu.viewmenu', compact('menu', 'tanggal', 'jmlmn'));
    }

    public function viewAlertMenu(Request $request)
    {
        $tanggal = $request->input('tanggal') ?? date('Y-m-d');

        $client = new \GuzzleHttp\Client();
        $response = $client->post('http://mspoon.online/mspoon_pos/addmenu.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'tipe' => 'F',
            ],

        ]);
        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);
        $menu = $json['menu'];
        $jmlmn = $json['jmlmn'];
        // dd($json);
        return view('addmenu.viewmenu', compact('menu', 'tanggal', 'jmlmn'));
    }

    public function updatemenu(Request $request)
    {
        // dd($request->all());

        $client = new \GuzzleHttp\Client();

        $kdoutlet = $request->input('kdoutlet');
        $kdmenu = $request->input('kdmenu');
        $harga = $request->input('harga');
        $isapproval = $request->input('isapproval');
        $note = $request->input('note');
        $nipreq = $request->input('nipreq');

        $detail = [];
        for ($i = 0; $i < count($kdmenu); $i++) {
            $det = [];
            $det['kdoutlet'] = $kdoutlet[$i];
            $det['kdmenu'] = $kdmenu[$i];
            $det['harga'] = $harga[$i];
            $det['isapprove'] = $isapproval[$i];
            $det['note'] = $note[$i];
            array_push($detail, $det);
            if ($isapproval[$i] != 'F') {
                $client->post(
                    'http://api.champ-group.com/champs-mobile/champs_api/notif/sendPushByKdaksesKdoutlet.php',
                    [
                        'form_params' => [
                            'title' => 'Tambah Menu Telah Disetujui',
                            'message' => 'Silahkan Reload Menu Pada POSTAB',
                            'submessage' => 'Berhasil Menambahkan Menu',
                            'image' => null,
                            'kdakses' => 'AVMS2',
                            'kdoutlet' => $kdoutlet[$i],
                        ],
                    ]
                );
            }
        }

        $data = [
            "kdoutlet" => "",
            "nip" => $this->nip(),
            "tipe" => "C",
            "menu" => $detail,
        ];

        // dd($data);
        $response = $client->post('http://mspoon.online/mspoon_pos/addmenu.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => $data,

        ]);
        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);

        return redirect()->back()->with('success', 'Data Berhasil Disimpan');
    }
    public function histmenu(Request $request)
    {
        $tanggal = $request->input('tanggal');
        
        $client = new \GuzzleHttp\Client();
        $data = [
            "kdoutlet" => "",
            "nip" => $this->nip(),
            "tipe" => "G",
            "tanggal" => $tanggal,
        ];

        // dd($data);
        $response = $client->post('http://mspoon.online/mspoon_pos/addmenu.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => $data,

        ]);
        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);
        
        return response()->json($json);
    }
}
