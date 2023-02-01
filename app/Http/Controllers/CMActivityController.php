<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Session;
use View;

class CMActivityController extends Controller
{

    // http://localhost/champs-mobile/cmactivity?kdakses=AVXXX&nip=K1050012&kdoutlet=MSJ00
    public function cmactivity(Request $request)
    {
        $client = new \GuzzleHttp\Client();

        $jamnow = Carbon::now()->timezone('Asia/Jakarta')->format('H:i');  
        // dd('============  '.$jamnow);
        if (isset($_GET['kdakses'])) {
            $kdakses = $_GET['kdakses'];
            $nip = $_GET['nip'];     
        }   
        if (isset($_GET['spin_tglactivty'])) {
            $ttgl = $_GET['spin_tglactivty']; 
            if ($ttgl == date('Y-m-d')) {
               
            $tglnow = 'T';
            }else {
                
            $tglnow = 'F';
            }
        } else { 
            $ttgl = date('Y-m-d');
            $tglnow = 'T';
        }
// dd($ttgl);
        $tanggalll = Carbon::parse($ttgl)->translatedFormat('l, d F Y');  
        $date_max = date('Y-m-d'); 
        $date_min = date('Y-m-d', strtotime('-1 month', strtotime( date('Y-m-d') ))); 
        // dd($tanggalll);
  

        $rspoffotl= $client->get('http://api.champ-group.com/champ_dev/champ_api/cmteactivtity/getAllOffOtl', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [ 
            ],
        ]
        ); 
        $jsonoffotl     = $rspoffotl->getBody()->getContents();
        $jsdf_offotl    = json_decode($jsonoffotl, true); 
        $dfoffotl       = $jsdf_offotl['dftr_outlet'];

        $rspersnl = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmteactivtity/getPersonalActivity', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [ 
                "nip" => $nip,
                "tanggal" => $ttgl
            ],
        ]
        ); 
        $jsonprsnl     = $rspersnl->getBody()->getContents();
        $jsdfpersnl    = json_decode($jsonprsnl, true); 
        $dfuser       = $jsdfpersnl['df_psnl'];

        // dd($dfuser);
       
        
        $rsactivty = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmteactivtity/getRptActivity', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [ 
                "nip" => $nip,
                "tanggal" => $ttgl,
                "tipe" => 'A'
            ],
        ]
        ); 
        $jsonactivty     = $rsactivty->getBody()->getContents();
        $jsdfactivty    = json_decode($jsonactivty, true); 
        $dfactivty       = $jsdfactivty['df_activty'];
       
        // Log Visit 
        $rspnsvisit = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/logvisit', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nmfitur' => 'Daily Activity', 
            ],
            ]
            );
            $jsonsvist = $rspnsvisit->getBody()->getContents();
            $jsonvs = json_decode($jsonsvist, true); 
        
        if($dfactivty == []){
            $jmlactivty = 0;
            $dfactivty = '[]';
            $dfactivtydet = '[]'; 
            $kdactivity = '';
        }else {
            $jmlactivty =count($dfactivty[0]['det']); 
            $dfactivtydet =$dfactivty[0]['det']; 
            $kdactivity = $dfactivty[0]['kdactivity'];
        }
        // dd($dfactivty);
        return view('cmactivity.cmactivity', compact('ttgl', 'dfoffotl','jamnow','dfuser' ,'jmlactivty', 'dfactivty','dfactivtydet','kdactivity','tanggalll','kdakses','nip','tglnow','date_min','date_max'));

    } 

    public function submit_tmbhactivty()
    {  
        $tipe           = $_POST['tipe']; 
        $kdactivity     = $_POST['kdactivity']; 
        $jmlactivty     = $_POST['jmlactivty']; 
        $nip            = $_POST['nip']; 
        $longisi        = $_POST['longisi']; 
        $latisi         = $_POST['latisi']; 
        $iddevice       = $_POST['iddevice']; 
        $nmdevice       = $_POST['nmdevice']; 
        $te_jamm         = date('Y-m-d ').$_POST['te_jammulai'].':00'; 
        $te_jams         = date('Y-m-d ').$_POST['te_jamselesai'].':00'; 
        $te_lokasi      = $_POST['te_lokasi']; 
        $te_detactivity = $_POST['te_detactivity']; 
 
        $detail = array();
        // for ($i = 0; $i < $jmlkdbrg; $i++) {
            $det = ([
                'urutan' => $jmlactivty,
                'jammulai' => $te_jamm,
                'jamselesai' => $te_jams,
                'lokasi' => $te_lokasi,
                'longisi' => $longisi,
                'latisi' => $latisi,
                'detactivity' => $te_detactivity,
            ]);
            array_push($detail, $det);
        // }
        $client = new \GuzzleHttp\Client();

        if ($tipe == 'A') { 
     
            $rspnprmhn = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmteactivtity/setTeActivty', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [ 
                    'nip' => $nip,
                    'iddevice' => $iddevice,
                    'nmdevice' => $nmdevice, 
                    'tipe' => $tipe, 
                    'detail' => $detail,
                ],
    
            ]);
        }elseif ($tipe == 'B') {
            $rspnprmhn = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmteactivtity/setTeActivty', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [ 
                    'nip' => $nip,
                    'tipe' => $tipe, 
                    'kdactivity' => $kdactivity,
                    'detail' => $detail,
                ],
    
            ]);
        }

       
        $jsnbdy = $rspnprmhn->getBody()->getContents();
        $jsrslt = json_decode($jsnbdy, true);

        return response()->json($jsrslt);
    }

    
    public function submit_editactivty()
    {   
        $kdactivity     = $_POST['kdactivity']; 
        $urutan         = $_POST['urutan'];   
        $te_jamm        = date('Y-m-d ').$_POST['te_jammulai'].':00'; 
        $te_jams        = date('Y-m-d ').$_POST['te_jamselesai'].':00'; 
        $te_lokasi      = $_POST['te_lokasi']; 
        $longisi        = $_POST['longisi']; 
        $latisi         = $_POST['latisi'];  
        $te_detactivity = $_POST['te_detactivity']; 
  
        $client = new \GuzzleHttp\Client(); 
     
            $rspnprmhn = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmteactivtity/setUpdTeActivty', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [ 
                    'kdactivity' => $kdactivity,
                    'urutan' => $urutan,
                    'jammulai' => $te_jamm, 
                    'jamselesai' => $te_jams, 
                    'lokasi' => $te_lokasi,
                    'longisi' => $longisi,
                    'latisi' => $latisi,
                    'detactivity' => $te_detactivity,
                ],
    
            ]); 
       
        $jsnbdy = $rspnprmhn->getBody()->getContents();
        $jsrslt = json_decode($jsnbdy, true);

        return response()->json($jsrslt);
    }

}
