<?php

namespace App\Http\Controllers;

use App\Exports\TicketExport;
use App\Http\Controllers\TicketingController;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use Storage;

class BackendController extends TicketingController
{

    public function ambiltgl2(Request $request)
    {
        $tanggal = $request->input('tanggal');
        $bln = date('Y-m', strtotime($tanggal));
        // return collect(session('tanggalreq'))->where('tanggal',$bln);
        $data = collect(session('tanggalreq'))->filter(function ($item) use ($bln) {
            return stripos($item['tanggal'], $bln) !== false;
        });
        return array_values($data->toArray());
    }
    public function backend(Request $request)
    {
        $nip = $this->nip();
        $tipe = $request->input('tipe');
        $tanggal = $request->input('tanggal');
        $kdkat = $request->input('kdkat');

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
            'tipe' => 'B',
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

        Session::forget('kddept');
        $kddept = $json['kddept'];
        session(['kddept' => $kddept]);

        Session::forget('df_outlet');
        $df_outlet = $json['df_outlet'];
        session(['df_outlet' => $df_outlet]);

        $df_status = $json['df_status'];
        $lskat = $json['lskat'];
        $lstrack = $json['lstrack'];
        $piltujuan = $json['piltujuan'];
        Session::forget('piltujuan');
        session(['piltujuan' => $piltujuan]);
        Session::forget('lstrack');
        session(['lstrack' => $lstrack]);
        // dd($json);
        $nmstatus = $json['nmstatus'];
        $bgcolor = $json['bgcolor'];
        $tanggalreq = $json['tanggalreq'];
        session(['tanggalreq' => $tanggalreq]);

        $lsstatus = collect($json['lsstatus']);
        Session::forget('lsstatus');
        session(['lsstatus' => $lsstatus]);
        return view('backend.backend', compact('piltujuan', 'kdkat', 'kdstatus', 'lskat', 'bgcolor', 'nip', 'lstrack', 'df_status', 'tanggal', 'nmstatus', 'tanggalreq'));
    }

    public function openticketbe(Request $request)
    {
        $nip = $this->nip();
        $kdticket = $request->input('kdticket');
        $kdkat = $request->input('kdkat');
        $client = new \GuzzleHttp\Client();
        $response = $client->post('http://localhost/ticketing_api/readtick.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nip' => $nip,
                'kdticket' => $kdticket,
            ],
        ]);
        $lstrack = collect(session('lstrack'))->where('kdticket', $kdticket)->first();
        $kdtracking = $lstrack['kdtracking'];
        $dtstatus = [];
        foreach ($kdtracking as $xx) {
            array_push($dtstatus, $xx['kdtracking']);
        }
        $lsstatus = array_values(collect(session('lsstatus'))->whereNotIn('kdstatus', $dtstatus)->toArray());
        return response()->json(['lsstatus' => $lsstatus, 'lstrack' => $lstrack]);

    }

    public function simpan_ubahstatus(Request $request)
    {
        // dd($request->all());
        $kdoutlet = session('kdoutlet');
        $tipe = $request->input('tipe');
        // $nmtujuan = $request->input('nmtujuan');
        $dept = $request->input('depart');
        $outlet = $request->input('nmoutlet');
        $nmstatus = $request->input('nmstatus');
        $nipreq = $request->input('nipreq');
        $kdticket = $request->input('kdticket');
        $ubahstatus = $request->input('ubahstatus');
        $kategori = $request->input('kategoribe');
        $keterangan = $request->input('ket');
        $ket1 = $request->input('ket1');
        $ket2 = $request->input('ket2');
        $tanggal = date('Y-m-d');
        $foto1 = $request->input('bayz');
        $foto2 = $request->input('backendfoto');
        if ($foto2 != "") {
            $dir = $dept . '/' . date('Y-m');
            $image = str_replace('data:image/webp;base64,', '', $foto2);
            $image = str_replace(' ', '+', $image);
            $imageName = $dept . '-' . date('YmdHis') . '-' . '-f2.' . 'png';
            $file = base64_decode($image);
            Storage::disk('backend')->put($dir . '/' . $imageName, $file);
            $linkurl2 = asset("public/storage/backend/" . $dir . '/' . $imageName);
            // dd($foto1);
        } else {
            $linkurl2 = 'F';
        }

        if ($foto1 != "") {
            $dir = $kdoutlet . '/' . date('Y-m');
            $image = str_replace('data:image/webp;base64,', '', $foto1);
            $image = str_replace(' ', '+', $image);
            $imageName = $kdoutlet . '-' . date('YmdHis') . '-' . '-f3.' . 'png';
            $file = base64_decode($image);
            Storage::disk('ticketing')->put($dir . '/' . $imageName, $file);
            $linkurl1 = asset("public/storage/ticketing/" . $dir . '/' . $imageName);
            // dd($foto1);
        } else {
            $linkurl1 = 'F';
        }

        $json1 = $this->location();
        $client = new \GuzzleHttp\Client();
        $data = [

            'nip' => session('nip'),
            'kdticket' => $kdticket,
            'kdkat' => $kategori,
            'laststat' => $ubahstatus,
            'catatan' => $keterangan,
            'foto1' => $linkurl1,
            'foto2' => $linkurl2,
            'xlat' => $json1['df_psnl'][0]['lokasilat'],
            'xlong' => $json1['df_psnl'][0]['lokasilong'],

        ];
        // dd($data);
        $response = $client->post('http://localhost/ticketing_api/beupdtick.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => $data,
        ]);
        // . ' Oleh' . $ket1
        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);
        $this->notifnip($nipreq, $nmstatus . ' oleh ' . $ket1, 'test keterangan', $kdticket);
        if ($tipe == 'T') {
            return redirect('ticketing')->with('success', 'Bukti Terima Berhasil Terkirim');
        }
        return redirect('backend')->with('success', 'Status Ticket Berhasil Diubah');
        // return redirect()->route('backend', ['kdstatus' => $ubahstatus, 'tanggal' => $tanggal])->with('success', 'Status Ticket Berhasil Diubah');
    }

    public function simpan_kategori(Request $request)
    {
        $nip = session('nip');
        $kddept = session('kddept');
        $nmkat = $request->input('nmkat');
        $kdkat = $request->input('kdkat') ?? '';

        $client = new \GuzzleHttp\Client();
        $data = [
            'nip' => $nip,
            'kddept' => $kddept,
            'nmkat' => $nmkat,
            'kdkat' => $kdkat,
            'tipe' => 'B',
        ];
        // dd($data);
        $response = $client->post('http://localhost/ticketing_api/updkat.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => $data,
        ]);

        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);
        return response()->json($json);
        // return redirect('backend')->with('success', 'Kategori Berhasil ditambah');
    }

    public function hapus_kategori(Request $request)
    {
        $nip = session('nip');
        $kddept = session('kddept');
        $nmkat = $request->input('nmkat');
        $kdkat = $request->input('kdkat') ?? '';

        $client = new \GuzzleHttp\Client();
        $data = [
            'nip' => $nip,
            'kddept' => $kddept,
            'nmkat' => $nmkat,
            'kdkat' => $kdkat,
            'tipe' => 'C',
        ];
        // return response()->json($data);
        $response = $client->post('http://localhost/ticketing_api/updkat.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => $data,
        ]);

        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);
        return response()->json($json);
        // return redirect('backend')->with('success', 'Kategori Berhasil ditambah');
    }
    public function nipeska(Request $request)
    {
        $dept = $request->input('dept');

        $client = new \GuzzleHttp\Client();
        $data = [
            'dept' => $dept,
        ];
        // return response()->json($data);
        $response = $client->post('http://localhost/ticketing_api/belisteska.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => $data,
        ]);

        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);
        return response()->json($json['dfnip']);
        // return redirect('backend')->with('success', 'Kategori Berhasil ditambah');
    }

    public function simpaneskalasi(Request $request)
    {
        $kdticket = $request->input('kdticket');
        $deptawal = $request->input('deptawal');
        $dept = $request->input('dept');
        $nipawal = session('nip');
        $nip = $request->input('nip');
        $ket = $request->input('ket');
        $json1 = $this->location();

        $client = new \GuzzleHttp\Client();
        $data = [
            'kdticket' => $kdticket,
            'deptawal' => $deptawal,
            'dept' => $dept,
            'nip' => $nip,
            'nipawal' => $nipawal,
            'ket' => $ket,
            'xlat' => $json1['df_psnl'][0]['lokasilat'],
            'xlong' => $json1['df_psnl'][0]['lokasilong'],
        ];
        $response = $client->post('http://localhost/ticketing_api/updeska.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => $data,
        ]);

        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);
        if ($nip != 'F') {
            $this->notifnip($nip, $ket, $ket, 'Status Ticketing Di Alihkan (Eskalasi)');
        } else {
            $this->notif($nip, $ket, $ket, 'Status Ticketing Di Alihkan');
        }
        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    public function report(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $today = date("Y-m-d");
        $tglawal = $request->input('tglawal');
        $tglakhir = $request->input('tglakhir');
        $kdoutlet = $request->input('kdoutlet');
        return Excel::download(new TicketExport($tglawal, $tglakhir, $kdoutlet),
            'laporan_ticketing ' . $today . ' .xlsx');
        $rspsrk = $client->post('http://localhost/ticketing_api/report.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'kdoutlet' => $kdoutlet,
                'tglawal' => $tglawal,
                'tglakhir' => $tglakhir,
            ],
        ]
        );
        $jsons = $rspsrk->getBody()->getContents();
        $json = json_decode($jsons, true);
        // dd($jsons);

        $awal = \Carbon\Carbon::parse($tglawal)->translatedFormat('l, d F Y');
        $akhir = \Carbon\Carbon::parse($tglakhir)->translatedFormat('l, d F Y');
        $periode = $awal . ' - ' . $akhir;
        return view('backend.report', compact('json', 'periode'));
    }
}
