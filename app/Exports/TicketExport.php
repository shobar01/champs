<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TicketExport implements FromView
{
    public function __construct($tglawal, $tglakhir, $kdoutlet)
    {
        $this->tglawal = $tglawal;
        $this->tglakhir = $tglakhir;
        $this->kdoutlet = $kdoutlet;
    }

    public function view(): View
    {

        $client = new \GuzzleHttp\Client();
        $tglawal = $this->tglawal;
        $tglakhir = $this->tglakhir;
        $kdoutlet = $this->kdoutlet;

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
        // dd($json);

        // $listrpt = $json['listrpt'];
        // $ls = collect($listrpt)->toArray();

        $awal = \Carbon\Carbon::parse($tglawal)->translatedFormat('l, d F Y');
        $akhir = \Carbon\Carbon::parse($tglakhir)->translatedFormat('l, d F Y');
        $periode = $awal . ' - ' . $akhir;
        return view('backend.report', compact('json', 'periode'));
    }

}
