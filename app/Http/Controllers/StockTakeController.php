<?php

namespace App\Http\Controllers;

use App\Exports\StckCCExcelExport;
use App\Http\Controllers\Controller;
use App\Imports\UserssImport;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use View;

class StockTakeController extends Controller
{
    // http://localhost/champs-mobile/rptstkcc
    public function rptstkcc(Request $request)
    {
        // $waktu = date('H-i-s');
        $tanggals = date('Y-m-d');
        $tanggal = Carbon::parse($tanggals)->translatedFormat('l, d F Y');
        $client = new \GuzzleHttp\Client();

        if (isset($_GET['kdotl'])) {
            $kdotl = $_GET['kdotl'];
        } else {
            $kdotl = 'MSJ01';
        }
        if (isset($_GET['tgl'])) {
            $tgl = $_GET['tgl'];
        } else {
            $tgl = $tanggals;
        }

        $rspnotl = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/getOtlMS', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
            ],
        ]
        ); 
        $jsonotls = $rspnotl->getBody()->getContents();
        $jsonotl = json_decode($jsonotls, true);

        $dfotl = $jsonotl['df_otl'];

        // dd($dfotl);
        $response = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/getHasilSTKCC', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'kdoutlet' => $kdotl,
                'tgl' => $tgl,
            ],
        ]
        );
        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);

        // dd($json);
        if ($json['dftr_hsl'] == []) {
            $nama = '-';
            $nip = '-';
            $dftr_hsl = [];
        } else {
            $nama = $json['dftr_hsl'][0]['nama'];
            $nip = $json['dftr_hsl'][0]['nip'];
            $dftr_hsl = $json['dftr_hsl'];
        }
        // Log Visit 
        $rspnsvisit = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/logvisit', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nmfitur' => 'Stock Take', 
            ],
            ]
            );
            $jsonsvist = $rspnsvisit->getBody()->getContents();
            $jsonvs = json_decode($jsonsvist, true); 
        return view('/rptstocktake/hasilstkcc', compact('dfotl', 'tgl', 'nama', 'nip', 'dftr_hsl', 'kdotl'));
    }
    //http://localhost/champs-mobile/exportstkcc
    public function exportstkcc(Request $request)
    {
        // $waktu = date('H-i-s');
        $tanggals = date('Y-m-d');
        $tanggal = Carbon::parse($tanggals)->translatedFormat('dMY');

        $client = new \GuzzleHttp\Client();

        $rspnotl = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/getOtlMS', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
            ],
        ]
        ); 
        $jsonotls = $rspnotl->getBody()->getContents();
        $jsonotl = json_decode($jsonotls, true);

        $dfotl = $jsonotl['df_otl'];

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
        // $elementCount = count($json['kategori']);

        // dd($tanggal);
        if ($json['allbrgbk'] == []) {
            $allbrgbk = [];
        } else {
            $allbrgbk = $json['allbrgbk'];
        }
        if (isset($_GET['kdotl'])) {
            $kdotl = $_GET['kdotl'];
        } else {
            $kdotl = 'MSJ01';
        }
        if (isset($_GET['nmotl'])) {
            $nmotl = $_GET['nmotl'];
        } else {
            $nmotl = 'MONSIEUR SPOON PANTAI INDAH KAPUK';
        }
        if (isset($_GET['itype'])) {
            $itype = $_GET['itype'];
        } else {
            $itype = 'non_excel';
        }

        if ($itype == "btn_excel") {

            // return view('/rptstocktake/exprt_stckcc', compact('kdotl', 'allbrgbk', 'tanggal'));
            return Excel::download(new StckCCExcelExport($kdotl, $itype, $nmotl),
                'Form_SO_' . $kdotl . '_' . $tanggal . '.xlsx');

        } else {
            return view('.rptstocktake.dwnldstkcc', compact('dfotl', 'allbrgbk', 'kdotl', 'itype', 'nmotl'));
        }
    }

    //http://localhost/champs-mobile/importviewstkcc
    public function importviewstkcc(Request $request)
    {

        return view('/rptstocktake/imprt_stckcc');
    }
    public function importstkcc(Request $request)
    {

        // $waktu = date('H-i-s');
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx',
        ]);

        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = $file->hashName();

        //temporary file
        $path = $file->storeAs('public/excel/', $nama_file);

        // import data
        $data = Excel::toArray(new UserssImport(), storage_path('app/public/excel/' . $nama_file));

        //remove from server
        Storage::delete($path);
        $hasilimprt = $data[0];
        $nmotl = $data[0][0][1];
        $kdotl = $data[0][1][1];
        $tanggal = $data[0][2][1];
        $nip = $data[0][3][1];
        $nama = $data[0][4][1];
        // dd($nmotl . '==' . $tanggal . '==' . $nip . '==' . $nama);

        return view('/rptstocktake/imprt_stckcc', compact('hasilimprt', 'kdotl', 'nmotl', 'tanggal', 'nip', 'nama'));
    }

    //insert ke server
    public function simpanimprt(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $tx_nip = $request->input('tx_nip');
        $tx_tgl = $request->input('tx_tgl');
        // dd($tx_tgl);
        $tx_kdotl = $request->input('tx_kdotl');
        $urutan = $request->input('urutan');
        $kdbrg = $request->input('kdbrg');
        $satuan = $request->input('satuan');
        $qty = $request->input('jumlah');
        $kdstk = 'F';
        $detail = 'F';

        $jmlkdbrg = count($kdbrg);

        // dd($tx_nip."==".$tx_tgl."==".$tx_kdotl."==".$jmlkdbrg);
        $detail = array();
        for ($i = 0; $i < $jmlkdbrg; $i++) {
            $det = ([
                'urutan' => $urutan[$i],
                'kdbarang' => $kdbrg[$i],
                'satuan' => $satuan[$i],
                'qty' => $qty[$i],
            ]);
            array_push($detail, $det);
        }
        $msg = 'T';

        $rspnotl = $client->post('http://portal.champ-group.com/notifierpo/mspoon_pos/insertstkcc', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'kdoutlet' => $tx_kdotl,
                'tglclosing' => $tx_tgl,
                'nip' => $tx_nip,
                'kdstk' => 'F',
                'detail' => $detail,
            ],
        ]
        );
        $jsonotls = $rspnotl->getBody()->getContents();
        $jsonotl = json_decode($jsonotls, true);
        // dd($detail);

        return redirect('/importviewstkcc')->with(['succes' => $msg]);
        // return view('/rptstocktake/importstkcc');
    }
}
