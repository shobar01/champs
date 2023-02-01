<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PTSExcelExport implements FromView
{
    public function __construct($tahun, $bulan)
    { 
        $this->tahun = $tahun;
        $this->bulan = $bulan;
    }

    public function view(): View
    {

        $client = new \GuzzleHttp\Client(); 
        $tahun = $this->tahun;
        $bulan = $this->bulan;

        $tanggal = date('Y-m-d');
        // $tanggal = Carbon::parse($ttgl)->translatedFormat('l, d F Y');

        $rspsrk = $client->post('http://mspoon.online/mspoon_pos/reqreturqa.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [  
                'tanggal' => $tanggal,
                'tipe' => 'D',
                'tahun' => $tahun,
                'bulan' => $bulan,
            ],
        ]
        );
        $jsons = $rspsrk->getBody()->getContents();
        $json = json_decode($jsons, true);
        if ($json['df_dwnld'] == []) {
            $df_dwnld = [];
        } else {
            $df_dwnld = $json['df_dwnld'];
        }
        // dd($json);
            return view('pts.exprt_pts', compact('df_dwnld'));

    }

}
