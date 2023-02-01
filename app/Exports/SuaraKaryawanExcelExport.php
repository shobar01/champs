<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SuaraKaryawanExcelExport implements FromView
{
    public function __construct($tipe, $itgl, $ibln)
    {
        $this->tipe = $tipe;
        $this->itgl = $itgl;
        $this->ibln = $ibln;
    }

    public function view(): View
    {

        $client = new \GuzzleHttp\Client();
        $tipe = $this->tipe;
        $itgl = $this->itgl;
        $ibln = $this->ibln;

        $tanggal = date('Y-m-d');
        // $tanggal = Carbon::parse($ttgl)->translatedFormat('l, d F Y');

        $rspsrk = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/getBkSuaraKaryawan', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [ 
                'tipe' => $tipe,
                'tgl' => $itgl,
                'bln' => $ibln,
            ],
        ]
        );
        $jsons = $rspsrk->getBody()->getContents();
        $json = json_decode($jsons, true);
        if ($json['df_suarak'] == []) {
            $df_suarak = [];
        } else {
            $df_suarak = $json['df_suarak'];
        }
        // dd($json);
            return view('hris.exprt_suarakaryawan', compact('df_suarak'));

    }

}
