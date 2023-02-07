<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Storage;

class TicketingController extends Controller
{
    public function nip()
    {
        if (session('nip') == null) {
            if (isset($_GET['nip'])) {
                session(['nip' => $_GET['nip']]);
                return session('nip');
            } else {
                return view('ticketing.error');
            }
        } else if (isset($_GET['nip']) && $_GET['nip'] != session('nip')) {
            Session::forget('nip');
            session(['nip' => $_GET['nip']]);
            return session('nip');
        } else {
            return session('nip');
        }
    }

    public function location()
    {
        $client = new \GuzzleHttp\Client();
        $response1 = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmteactivtity/getPersonalActivity', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nip' => session('nip'),
            ],
        ]);

        $jsons1 = $response1->getBody()->getContents();
        $json1 = json_decode($jsons1, true);
        // dd(session('nip'));
        return $json1;
    }

    public function ambiltgl(Request $request)
    {
        $tanggal = $request->input('tanggal');
        $bln = date('Y-m', strtotime($tanggal));
        // return collect(session('tanggalreq'))->where('tanggal',$bln);
        $data = collect(session('tanggalreq'))->filter(function ($item) use ($bln) {
            return stripos($item['tanggal'], $bln) !== false;
        });
        return array_values($data->toArray());
    }

    public function ticketing(Request $request)
    {

        $nip = $this->nip();
        $tipe = $request->input('tipe');
        $tanggal = $request->input('tanggal');
        if ($tanggal == null) {
            $tanggal = date('Y-m-d');
        }
        if (isset($_GET['kdstatus'])) {
            $kdstatus = $_GET['kdstatus'];
        } else {
            $kdstatus = 'T001';
        }

        $data = [
            'nip' => $nip,
            'tanggal' => $tanggal,
            'kdstatus' => $kdstatus,
            'tipe' => 'A',
        ];
        // dd($data);
        $client = new \GuzzleHttp\Client();
        $response = $client->post('http://localhost/ticketing_api/otlawal.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => $data,
        ]);
        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);
        // dd($json);
        $long = $json['long'];
        $df_status = $json['df_status'];
        $piltujuan = $json['piltujuan'];
        session(['piltujuan' => $piltujuan]);
        // dd($piltujuan);
        $lstrack = $json['lstrack'];
        Session::forget('lstrack');
        session(['lstrack' => $lstrack]);
        // dd($json);
        $nmstatus = $json['nmstatus'];
        $bgcolor = $json['bgcolor'];
        $tanggalreq = $json['tanggalreq'];
        session(['tanggalreq' => $tanggalreq]);
        return view('ticketing.ticketing', compact('long', 'piltujuan', 'kdstatus', 'bgcolor', 'nip', 'lstrack', 'df_status', 'tanggal', 'nmstatus', 'tanggalreq'));
    }

    public function openticket(Request $request)
    {
        $kdticket = $request->input('kdticket');
        $lstrack = collect(session('lstrack', 'piltujuan'))->where('kdticket', $kdticket)->first();
        return response()->json($lstrack);
    }

    public function datatujuan(Request $request)
    {
        $dept = $request->input('dept');
        $tujuan = session('piltujuan');
        $data = collect($tujuan)->where('kddept', $dept)->first();
        return response()->json($data);
    }

    public function simpan_ticketing(Request $request)
    {
        $json1 = $this->location();
        $kdoutlet = $json1['df_psnl'][0]['kdoutlet'];
        $tujuan = $request->input('tujuan');
        $kategori = $request->input('kategori');
        $pesan = $request->input('pesan');
        $level = $request->input('level');
        $foto1 = $request->input('fefoto');
        $namatxtujuan = $request->input('namatxtujuan');

        if ($foto1 != "") {
            $dir = $kdoutlet . '/' . date('Y-m');
            $image = str_replace('data:image/webp;base64,', '', $foto1);
            $image = str_replace(' ', '+', $image);
            $imageName = $kdoutlet . '-' . date('YmdHis') . '-' . '-f1.' . 'png';
            $file = base64_decode($image);
            Storage::disk('ticketing')->put($dir . '/' . $imageName, $file);
            $linkurl1 = asset("public/storage/ticketing/" . $dir . '/' . $imageName);
            // dd($foto1);
        } else {
            $linkurl1 = 'F';
        }

        $client = new \GuzzleHttp\Client();
        $data = [
            'nipreq' => session('nip'),
            'kdoutlet' => $kdoutlet,
            'kdtujuan' => $tujuan,
            'kdkat' => $kategori,
            'isiticket' => $pesan,
            'lvreq' => $level,
            'foto1' => $linkurl1,
            'foto2' => 'F',
            'xlat' => $json1['df_psnl'][0]['lokasilat'],
            'xlong' => $json1['df_psnl'][0]['lokasilong'],
            'namatxtujuan' => $namatxtujuan,

        ];

        // dd($data);
        $response = $client->post('http://localhost/ticketing_api/newtick.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => $data,
        ]);

        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);
        $kdticket = $json['kdticket'];
        $dept = session('dept');
        $this->notif($namatxtujuan, $kdticket, $dept . '-' . $pesan, 'Ticket Baru');
        // dd($json);
        return redirect('ticketing')->with('success', 'Request Ticket Berhasil Dikirim');
    }

    public function simpan_rating(Request $request)
    {
        // dd($request->all());

        $kdticket = $request->input('kdticket');
        $rate = $request->input('rate');
        $ulasan = $request->input('ulasan');

        $json1 = $this->location();
        $client = new \GuzzleHttp\Client();
        $data = [
            'kdticket' => $kdticket,
            'jmlpoin' => $rate,
            'ulasan' => $ulasan,
            'lat' => $json1['df_psnl'][0]['lokasilat'],
            'long' => $json1['df_psnl'][0]['lokasilong'],
        ];
        // dd($data);

        $response = $client->post('http://localhost/ticketing_api/finishtick.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => $data,
        ]);
        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);
        return redirect('ticketing')->with('success', 'Rating Anda Berhasil Terkirim, Terima Kasih!');
    }

    public function notif($tujuan, $message, $ket, $ttl)
    {
        $datanotif = [
            'title' => $ttl,
            'message' => $message,
            'submessage' => $ket,
            'dept' => $tujuan,
        ];
        // return response()->json($datanotif);
        $client = new \GuzzleHttp\Client();
        $responseNOtif = $client->post('http://api.champ-group.com/champs-mobile/champs_api/notifRN/sendPushByDeptBody.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => $datanotif,
        ]);
        $jsons = $responseNOtif->getBody()->getContents();
        $json = json_decode($jsons, true);
        if ($ttl == 'Ticketing Baru') {
            return response()->json($json);
        }
    }
    public function notifnip($tujuan, $message, $ket, $ttl)
    {
        $datanotif = [
            'title' => $ttl,
            'message' => $message,
            'submessage' => $ket,
            'nip' => $tujuan,
        ];
        // return response()->json($datanotif);
        $client = new \GuzzleHttp\Client();
        $responseNOtif = $client->post('http://api.champ-group.com/champs-mobile/champs_api/notifRN/sendPushByNipBody.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => $datanotif,
        ]);
        $jsons = $responseNOtif->getBody()->getContents();
        $json = json_decode($jsons, true);
        if ($ttl == 'Ticketing Baru') {
            return response()->json($json);
        }
    }
    public function reminder(Request $request)
    {
        $dtujuan = $request->input('txtujuan');
        $dmessage = $request->input('txmessage');
        $kdticket = $request->input('tiket');
        return $this->notif($dtujuan, $dmessage, $kdticket, 'Reminder Ticketing');
    }

    public function getuniform()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get('http://api2.champ-group.com/ticketing_api/uniformperso.php');
        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);
        // dd($json);
        return response()->json($json['dfbrg']);

    }
}
