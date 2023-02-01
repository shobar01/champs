<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Exports\PTSExcelExport; 
use Maatwebsite\Excel\Facades\Excel;
use Session;
use View;

class PTSController extends Controller
{

    // http://api.champ-group.com/champs-mobile/pts_approvalqa?kdakses=AVMS2&nip=K1070077
    public function pts_approvalqa(Request $request)
    {
        $client = new \GuzzleHttp\Client();

        $ttgl = date('Y-m-d'); 

        $maxbln = date('Y-m',strtotime('+2 month'));
        $minbln = date('Y-m',strtotime('-3 month'));
        $nowbln = date('Y-m'); 
        
       
        if (isset($_GET['kdakses'])) { 
            $kdakses = $_GET['kdakses'];
            $nip = $_GET['nip']; 
        } 
        if (isset($_GET['tgl_returpts'])) { 
            $plhtgl = $_GET['tgl_returpts']; 
        } else {
            $plhtgl = $ttgl; 
        }
        $tanggalll = Carbon::parse($ttgl)->translatedFormat('l, d F Y');
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
         
        $rspnpts = $client->post('http://mspoon.online/mspoon_pos/reqreturqa.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [ 
                'tanggal' => $plhtgl,  
                'tipe' => 'A', 
            ],
        ]
        );  
        $jspts      = $rspnpts->getBody()->getContents();
        $jsondfpts  = json_decode($jspts, true); 
        $jsdfpts    = $jsondfpts['listreq']; 
        
        $rspnpts2 = $client->post('http://mspoon.online/mspoon_pos/reqreturqa.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [ 
                'tanggal' => '',  
                'tipe' => 'E', 
            ],
        ]
        ); 
 
        $jspts2 = $rspnpts2->getBody()->getContents();
        $jsondfpts2 = json_decode($jspts2, true); 
        $jsdfpts2 = $jsondfpts2['listreq']; 
        $jmlrow = $jsondfpts2['jmlrow'];  
    
        // Log Visit 
        $rspnsvisit = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/logvisit', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nmfitur' => 'MS PTS', 
            ],
            ]
            );
            $jsonsvist = $rspnsvisit->getBody()->getContents();
            $jsonvs = json_decode($jsonsvist, true); 

        // dd($jsondfpts);
  
        if (isset($_GET['bln_dwldpts'])) { 
            $isi = explode("-", $_GET['bln_dwldpts']);
            $thn_dwnld  = $isi[0];  
            $bln_dwnld  = $isi[1]; 
            $nmmm       = $thn_dwnld.$bln_dwnld;
 
            // return view('pts.exprt_pts', compact('df_dwnld'));
            return Excel::download(new PTSExcelExport( $thn_dwnld, $bln_dwnld),
                'PTS_'.$nmmm.'.xlsx'); 
        }else{

            return view('pts.approvalqa', compact('dfotl','tanggalll','nip','kdakses','plhtgl','jsdfpts','nowbln','maxbln','minbln','jmlrow','jsdfpts2'));
        }
       

    }
    public function pts_approvalqadet()
    { 
        $plhtgl    = $_POST['plhtgl']; 
        $kdretur    = $_POST['kdretur']; 

        $client = new \GuzzleHttp\Client();
        $rspnupdt = $client->post('http://mspoon.online/mspoon_pos/reqreturqa.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [ 
                'tanggal' => $plhtgl,  
                'tipe' => 'C', 
                'kdretur' => $kdretur, 
            ],

        ]);
        $jsnbdy = $rspnupdt->getBody()->getContents();
        $jsrslt = json_decode($jsnbdy, true);
        // dd($jsrslt);

        return response()->json($jsrslt);

    }

    public function simpan_approval(Request $request)
    {    
        $pts_kdretur        = $request->input('pts_kdretur');
        $pts_kdverifikasi   = $request->input('pts_kdverifikasi');
        $pts_kdbarang       = $request->input('pts_kdbarang');
        $pts_nmbarang       = $request->input('pts_nmbarang');
        $pts_qtyretur       = $request->input('pts_qtyretur');
        $pts_foto1          = $request->input('pts_foto1'); 
        $pts_foto2          = $request->input('pts_foto2'); 
        $pts_ketreq         = $request->input('pts_ketreq'); 
        $pts_isapprove      = $request->input('pts_isapprove'); 
        $pts_ketqa          = $request->input('pts_ketqa');  
        $tgl_returptsdet    = $request->input('tgl_returptsdet');   
        $nipdet             = $request->input('nipdet');   
        $kdaksesdet         = $request->input('kdaksesdet');   
        $rwupd = []; 

        $client = new \GuzzleHttp\Client();  
        if ($pts_kdretur != null) {
            for ($i = 0; $i < count($pts_kdretur); $i++) { 
                $tmpd = ([ 
                    "isapprove" => $pts_isapprove[$i],
                    "ketqa" => $pts_ketqa[$i],
                    "kdretur" => $pts_kdretur[$i],
                    "kdverifikasi" => $pts_kdverifikasi[$i],
                    "kdbarang" => $pts_kdbarang[$i], 
                ]);
                array_push($rwupd, $tmpd);
            }
            
            $rssycn = $client->post('http://portal2.champ-group.com/notifierpo/mspoon_pos/resyncPTS/'.$pts_kdretur[0], [
                'headers' => [
                    'Content-Type' => 'application/json',
                ]
            ]);
    
            $jssycn = $rssycn->getBody()->getContents();  
            $json4 = json_decode($jssycn, true); 
        }  

        $data = [ 
            'pts_kdretur' => $pts_kdretur[0],
            'rwupd' => $rwupd, 
            'nipdet' => $nipdet,  
            'tanggal' => $tgl_returptsdet,  
            'tipe' => 'B', 
        ];
 
        $response3 = $client->post('http://mspoon.online/mspoon_pos/reqreturqa.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => $data,
        ]);

        $jsons3 = $response3->getBody()->getContents(); 
        $json3 = json_decode($jsons3, true); 
        // dd($data);
        return redirect('pts_approvalqa?nip='.$nipdet.'&kdakses='.$kdaksesdet.'&tgl_returpts='.$tgl_returptsdet); 
  
        
    }
 

}
