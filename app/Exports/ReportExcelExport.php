<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReportExcelExport implements FromView
{
    public function __construct($ikdoutlet, $itgl, $itype)
    {
        $this->ikdoutlet = $ikdoutlet;
        $this->itgl = $itgl;
        $this->itype = $itype;
    }

    public function view(): View
    {

        $client = new \GuzzleHttp\Client();
        $ikdoutlet = $this->ikdoutlet;
        $itgl = $this->itgl;
        $itype = $this->itype;
        $tanggalll = $this->itgl;

        $response = $client->post('http://mspoon.online/mspoon_pos/openorder.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'kdoutlet' => $ikdoutlet,
                'tglorder' => $itgl,
            ],
        ]);

        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);
        //tglorder,tglterima,kdorderbarang,wktorder

        if ($json['order'] == []) {
            $detail = null;
            $kdbrng = '';
            $dford = '';
            $dfkdbrng = '';
            $jmlkdord = 0;
            $whdocno = '';
            $ordnip = '';
            $wktorder = '';
            $tglterima = '';
            $nmotl = '';
            $nm_lengkap = '';
        } else {
            // $tglord = $json['order'][0]['tglorder'];
            // $tgltrm = $json['order'][0]['tglterima'];
            // $kdbrng = $json['order'][0]['kdorderbarang'];
            // $wktord = $json['order'][0]['wktorder'];
            // $detail = $json['order'][0]['detail'];
            $detail = $json['order'];
            $dford = array();
            $dfkdbrng = array();
            $jmlkdord = count($detail);

            // dd();

            if ($jmlkdord == 1) {
                $kdbrng = $json['order'][0]['kdorderbarang'];

            } else {
                if (isset($_GET['txkdorgbrg'])) {
                    $kdbrng = $_GET['txkdorgbrg'];
                    $tglord = '';
                    $tgltrm = '';
                    $wktord = '';
                    $whdocno = '';
                    $ordnip = $json['order'][0]['nip'];
                    $wktorder = '';
                    $tglterima = '';

                } else {
                    $kdbrng = $json['order'][0]['kdorderbarang'];
                    $tgltrm = $json['order'][0]['tglterima'];
                    $tglord = $json['order'][0]['tglorder'];
                    $wktord = $json['order'][0]['wktorder'];
                    $whdocno = $json['order'][0]['whdocno'];
                    $ordnip = $json['order'][0]['nip'];
                    $wktorder = Carbon::parse($json['order'][0]['wktorder'])->translatedFormat('l, d M Y H:i');
                    $tglterima = Carbon::parse($json['order'][0]['tglterima'])->translatedFormat('l, d F Y');

                }
            }

            // dd($wktorder.'==='.$tglterima);

            for ($i = 0; $i < count($detail); $i++) {
                $kdbrgg = ([
                    'kdordbarang' => $detail[$i]['kdorderbarang'],
                ]);

                array_push($dfkdbrng, $kdbrgg);
                if ($detail[$i]['kdorderbarang'] == $kdbrng) {
                    // dd($detail[$i]['nip']);

                    // dd($detail[$i]['kdorderbarang'] . "===" . $kdbrng);

                    $ordnip = $detail[$i]['nip'];
                    $tglord = $detail[$i]['tglorder'];
                    $tgltrm = $detail[$i]['tglterima'];
                    $wktord = $detail[$i]['wktorder'];
                    $whdocno = $detail[$i]['whdocno'];
                    $wktorder = Carbon::parse($detail[$i]['wktorder'])->translatedFormat('l, d M Y H:i');
                    $tglterima = Carbon::parse($detail[$i]['tglterima'])->translatedFormat('l, d F Y');

                    for ($ii = 0; $ii < count($detail[$i]['detail']); $ii++) {
                        $det = ([
                            'urutan' => $detail[$i]['detail'][$ii]['urutan'],
                            'kdbarang' => $detail[$i]['detail'][$ii]['kdbarang'],
                            'nmbarang' => $detail[$i]['detail'][$ii]['nmbarang'],
                            'satuan' => $detail[$i]['detail'][$ii]['satuan'],
                            'qty' => $detail[$i]['detail'][$ii]['qty'],
                            'kdorderbarang' => $detail[$i]['kdorderbarang'],
                        ]);
                        array_push($dford, $det);
                    }
                }
                // else {
                //     $ordnip = $detail[0]['nip'];
                //     $tglord = $detail[0]['tglorder'];
                //     $tgltrm = $detail[0]['tglterima'];
                //     $wktord = $detail[0]['wktorder'];
                //     $whdocno = $detail[0]['whdocno'];
                //     $wktorder = Carbon::parse($detail[0]['wktorder'])->translatedFormat('l, d M Y H:i');
                //     $tglterima = Carbon::parse($detail[0]['tglterima'])->translatedFormat('l, d F Y');
                // }
            }
            // dd($ordnip);

            $rspersnl2 = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmteactivtity/getPersonalActivity', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    "nip" => $ordnip,
                    "tanggal" => $ttgl,
                ],
            ]
            );
            $jsonprsnl2 = $rspersnl2->getBody()->getContents();
            $jsdfpersnl2 = json_decode($jsonprsnl2, true);
            $dfuser2 = $jsdfpersnl2['df_psnl'];

            $nmotl = $dfuser2[0]['dept'] . ' (' . $dfuser2[0]['kdoutlet'] . ')';
            $nm_lengkap = $dfuser2[0]['nm_lengkap'];
        }
        return view('rptorderbrg.areaPDF', compact('detail', 'dford', 'itgl', 'kdbrng', 'whdocno', 'tanggalll', 'nmotl', 'nm_lengkap',
            'wktorder', 'tglterima', 'ordnip'));

    }

}
