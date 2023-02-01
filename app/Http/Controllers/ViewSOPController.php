<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use View;

class ViewSOPController extends Controller
{
    // http://localhost/champs-mobile/viewsop
    public function viewsop(Request $request)
    {
        $waktu = date('H-i-s');
        $tanggals = date('Y-m-d');
        $tanggal = Carbon::parse($tanggals)->translatedFormat('l, d F Y');
        $client = new \GuzzleHttp\Client();

        $rspnotl = $client->post('http://api.champ-group.com/champ_dev/cmtask/apk/stocktake.json', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
            ],
        ]
        );
        $jsonotls = $rspnotl->getBody()->getContents();
        $jsonotl = json_decode($jsonotls, true);

        $dfotl = $jsonotl['outlet'];

        // $files = Storage::allFiles('');
        //http://localhost/champs-mobile/public/storage/soppdf/IP.%20COOK%20PDF/SOP%20IP.%20PEMASAKAN%20BEEF%20TERIYAKI%20&%20CHICKEN%20TERIYAKI.pdf
        $ll = 'http://localhost/champs-mobile/public/';

        $datafl = Storage::allFiles('public/soppdf');
        $datta = str_replace('public', '', $datafl);
        $aa = $datafl[0];

        $filename = 'name.pdf';

        $path = storage_path($filename);

        $aa = str_replace('storage', 'public\storage', $path);

        // $file = File::get($file);
        // $response = Response::make($aa, 200);
        // $response->header('Content-Type', 'application/pdf');
        // return $response;
        // dd($aa);
        // return Response::make(file_get_contents($aa), 200, [

        //     'Content-Type' => 'application/pdf',

        //     'Content-Disposition' => 'inline; filename="' . $filename . '"',

        // ]);

        // $pdf = PDF::loadView('myPDF');

        // return $pdf->download($path);
        // dd($aa);
        // dd($datta);

        // Log Visit 
        $rspnsvisit = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/logvisit', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nmfitur' => 'View SOP', 
            ],
            ]
            );
            $jsonsvist = $rspnsvisit->getBody()->getContents();
            $jsonvs = json_decode($jsonsvist, true); 
        return view('/vsop/vsop', compact('datta'));
    }

}
