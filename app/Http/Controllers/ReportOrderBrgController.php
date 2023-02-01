<?php

namespace App\Http\Controllers;

use App\Exports\ReportExcelExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use View;

class ReportOrderBrgController extends Controller
{

    public function away($path, $status = 302, $headers = array())
    {
        return $this->createRedirect($path, $status, $headers);
    }
    // http://localhost/champs-mobile/repot_ob?kdakses=AVMS2&nip=K1100086
    public function repot_ob(Request $request)
    {
        $client = new \GuzzleHttp\Client();

        $ttgl = date('Y-m-d');
        $tglwk = date('Ymd_His');
        if (isset($_GET['tanggal_ordbrg'])) {
            $itgl = $_GET['tanggal_ordbrg'];
        } else {
            $itgl = $ttgl;
        }
        $tanggalll = Carbon::parse($itgl)->translatedFormat('l, d F Y');
        $rspnotl = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/getOtlMS', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
            ],
        ]
        );
        if (isset($_GET['kdakses'])) {
            // Khusus AVMS7
            if ($_GET['nip'] == 'K1070070') {
                $kdakses = $_GET['kdakses'];
                $nip = 'K1060078';
            } else {
                $kdakses = $_GET['kdakses'];
                $nip = $_GET['nip'];
            }
        } else {
            $kdakses = 'AVXXX';
            $nip = 'A1050012';
        }
        // K1030010    Suratin Dwi Prananto
        // K1060078    Yulius Evren
        // K1070070    Leonardus Dimas Diaz Gonzales

        $jsonotls = $rspnotl->getBody()->getContents();
        $jsonotl = json_decode($jsonotls, true);

        // dd($jsonotl);

        $dfotlam = $jsonotl['df_otl'];

        $dfotl = array();
        for ($i = 0; $i < count($dfotlam); $i++) {
            if ($kdakses == 'AVXXX') {
                $det = ([
                    'kdoutlet' => $dfotlam[$i]['kdoutlet'],
                    'nmoutlet' => $dfotlam[$i]['nmoutlet'],
                    'sngktotl' => $dfotlam[$i]['sngktotl'],
                    'AM' => $dfotlam[$i]['AM'],
                ]);
                array_push($dfotl, $det);
            } else {
                if ($nip == $dfotlam[$i]['AM']) {
                    $det = ([
                        'kdoutlet' => $dfotlam[$i]['kdoutlet'],
                        'nmoutlet' => $dfotlam[$i]['nmoutlet'],
                        'sngktotl' => $dfotlam[$i]['sngktotl'],
                        'AM' => $dfotlam[$i]['AM'],
                    ]);
                    array_push($dfotl, $det);
                }
            }

        }

        $rspersnl = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmteactivtity/getPersonalActivity', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                "nip" => $nip,
                "tanggal" => $ttgl,
            ],
        ]
        );
        $jsonprsnl = $rspersnl->getBody()->getContents();
        $jsdfpersnl = json_decode($jsonprsnl, true);
        $dfuser = $jsdfpersnl['df_psnl'];
        $nmdvc = substr($dfuser[0]['nmdvc'], 0, 5);

        // dd($dfuser);
        // nmotl,nm_lengkap

        if ($kdakses == 'AVMS2') {
            $ikdoutlet = $dfuser[0]['kdoutlet'];
        } else {
            if (isset($_GET['kdotl'])) {
                $ikdoutlet = $_GET['kdotl'];
            } else {
                $ikdoutlet = $dfotl[0]['kdoutlet'];
            }
        }

        // dd($dfotl);
        if (isset($_GET['dwnld_type'])) {
            $itype = $_GET['dwnld_type'];
        } else {
            $itype = 'btn_periode';
        }

        if (isset($_GET['lwttgl'])) {
            $lwttgl = $_GET['lwttgl'];
        } else {
            $lwttgl = $ttgl;
        }

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

        // tglorder,tglterima,kdorderbarang,wktorder
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

        // Log Visit
        $rspnsvisit = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/logvisit', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nmfitur' => 'View Order MS',
            ],
        ]
        );
        $jsonsvist = $rspnsvisit->getBody()->getContents();
        $jsonvs = json_decode($jsonsvist, true);

        // dd($dford);
        if ($itype == "btn_excel") {

            // dd("btn_excel " . $ikdoutlet . '==' . $itgl . '==' . $itype);
            // return Excel::download(new ExcelExport, 'excel.xlsx');
            return view('rptorderbrg.areaPDFf', compact('detail', 'itgl', 'kdbrng', 'tanggalll'));
            return Excel::download(new ReportExcelExport($ikdoutlet, $itgl, $itype),
                'laporan_bukutamu_periode_.xlsx');

        } elseif ($itype == "btn_pdf") {

            // if ($nmdvc == 'Apple') {
            //     $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])
            //     ->loadview('rptorderbrg.rpt_download',
            //     compact('detail', 'dford', 'itgl', 'kdbrng', 'whdocno', 'tanggalll', 'nmotl', 'nm_lengkap', 'wktorder', 'tglterima', 'ordnip'))->setpaper('legal', 'potrait');

            //     $content = $pdf->download()->getOriginalContent();
            //     // $content = $pdf->download()->getOriginalContent();
            //     Storage::put('public/pdf/RPT-' . $kdbrng . '.pdf',$content) ;
            //     $linkk = 'http://api.champ-group.com/champs-mobile/storage/app/public/pdf/RPT-' . $kdbrng . '.pdf';
            //     // dd($linkk);
            //     // return Redirect::to($linkk);

            //     // return response()->download($tempImage, $filename);
            //     // return $pdf->response()->download('RPT-' . $kdbrng . '.pdf');
            //     // Storage::disk('public')->put($pdf->download('RPT-' . $kdbrng . '.pdf'));
            //     return view('rptorderbrg.rpt_download', compact('detail', 'dford', 'itgl', 'kdbrng', 'whdocno', 'tanggalll', 'nmotl', 'nm_lengkap', 'wktorder', 'tglterima', 'ordnip','linkk'));
            // } else {
            return view('rptorderbrg.rpt_download', compact('detail', 'dford', 'itgl', 'kdbrng', 'whdocno', 'tanggalll', 'nmotl', 'nm_lengkap', 'wktorder', 'tglterima', 'ordnip'));
            // }
        } else {
            return view('rptorderbrg.rptorderbrgf', compact('dfotl', 'detail', 'dford', 'dfkdbrng', 'kdbrng', 'whdocno', 'tanggalll', 'itgl', 'ikdoutlet', 'kdakses', 'nip', 'jmlkdord', 'nmotl', 'nm_lengkap', 'wktorder', 'tglterima', 'ordnip'));
        }

    }

}
