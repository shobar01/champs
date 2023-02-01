<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StckCCExcelExport implements FromView
{
    public function __construct($kdotl, $itype, $nmotl)
    {
        $this->kdotl = $kdotl;
        $this->itype = $itype;
        $this->nmotl = $nmotl;
    }

    public function view(): View
    {

        $client = new \GuzzleHttp\Client();
        $nmotl = $this->nmotl;
        $kdotl = $this->kdotl;
        $itype = $this->itype;

        $tanggal = date('Y-m-d');
        // $tanggal = Carbon::parse($ttgl)->translatedFormat('l, d F Y');

        $response = $client->post('http://mspoon.online/mspoon_pos/barang.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'kdoutlet' => 'MSJ01',
                'tipe' => 'E',
            ],
        ]
        );
        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);
        if ($json['allbrgbk'] == []) {
            $allbrgbk = [];
        } else {
            $allbrgbk = $json['allbrgbk'];
        }
        // dd($json);
        return view('/rptstocktake/exprt_stckcc', compact('kdotl', 'allbrgbk', 'tanggal', 'nmotl'));

    }

}
