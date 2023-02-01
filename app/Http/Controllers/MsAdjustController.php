<?php

namespace App\Http\Controllers;

use App\Exports\SuaraKaryawanExcelExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use View;

class MsAdjustController extends Controller
{
    //  http://localhost/champs-mobile/adjustms?kdakses=AVMS2&nip=K1070077&kdoutlet=MSJ03  
    public function masteradjust(Request $request)
    {
        $client = new \GuzzleHttp\Client();
  
        if (isset($_GET['nip'])) {  
            $nip        = $_GET['nip']; 
            $kdakses    = $_GET['kdakses']; 
        }  

        $ttgl       = date('Y-m-d');   
        $tanggalll  = Carbon::parse($ttgl)->translatedFormat('l, d F Y');

        $rspersnl = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmteactivtity/getPersonalActivity', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [ 
                "nip" => $nip,
                "tanggal" =>  date('Y-m-d')
            ],
        ]
        ); 
        $jsonprsnl     = $rspersnl->getBody()->getContents();
        $jsdfpersnl    = json_decode($jsonprsnl, true); 
        $dfuser       = $jsdfpersnl['df_psnl'];

        // dd($dfuser[0]['nm_lengkap']);  
        $nm = $dfuser[0]['nm_lengkap'];


        $rspswitchms = $client->get('http://mspoon.online/mspoon_pos/apk_master.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [ 
                "nip" => $nip,
                "kdakses" =>  $kdakses,
                "tipe" =>  'A',
                "nama" =>  $nm,
            ],
        ]
        ); 
        $jsonswcthms     = $rspswitchms->getBody()->getContents();
        $jsswtchms    = json_decode($jsonswcthms, true); 
        // dd($jsswtchms);
        $dflog          = $jsswtchms['df_log'];
        $dflinkurl      = $jsswtchms['df_linkurl'];
        $dfswitch       = $jsswtchms['df_switch'];

        $rspnotl = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/getOtlMS', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
            ],
        ]
        ); 
        $jsonotls   = $rspnotl->getBody()->getContents();
        $jsonotl    = json_decode($jsonotls, true);   
        $dfotl      = $jsonotl['df_otl'];
 
            $tgl = $ttgl; 

            // Log Visit 
        $rspnsvisit = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/logvisit', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nmfitur' => 'MS Adjust', 
            ],
            ]
            );
            $jsonsvist = $rspnsvisit->getBody()->getContents();
            $jsonvs = json_decode($jsonsvist, true); 
        // dd($dfotl);
        return view('msadjust.masterdash', compact('nip', 'kdakses','dflog','dflinkurl','dfswitch','dfotl','dfuser','tgl')); 
      

    }
    public function adjustms(Request $request)
    {
        $client = new \GuzzleHttp\Client();

        $ttgl = date('Y-m-d');  
        
        if (isset($_GET['nip'])) {  
            $nip = $_GET['nip']; 
        } else { 
            $nip = '';
        }
        if (isset($_GET['inpt_noorder']) ) {
            $noorder = $_GET['inpt_noorder'];   
            $itgl = $_GET['tgl_noorder'];
            
        } else {
            $noorder = "";  
            $itgl = $ttgl; 
        } 
        $tanggalll = Carbon::parse($itgl)->translatedFormat('l, d F Y');
        $rspadjst = $client->post('http://mspoon.online/mspoon_pos/scadjtrx.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [  
                'noorder' => $noorder, 
            ],
        ]
        );
            
        
        $jsnbdy = $rspadjst->getBody()->getContents();
        $jsrslt = json_decode($jsnbdy, true); 
            
         

        return view('msadjust.adjust', compact( 'jsrslt','itgl','tanggalll','noorder','nip')); 
      

    }
    public function submit_adjust()
    { 
         
        $client = new \GuzzleHttp\Client(); 
        $nip            = $_POST['nip'];
        $inpt_nor       = $_POST['inpt_nor'];
        $inpt_tgl       = $_POST['inpt_tgl'];    
        
        $ttgl = date('Y-m-d');  
        $rspnprmhn = $client->post('http://mspoon.online/mspoon_pos/scadjust.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nip' => $nip,
                'noorder' => $inpt_nor,
                'tglclosing' => $inpt_tgl, 
            ],

        ]);
        $jsnbdy = $rspnprmhn->getBody()->getContents();
        $jsrslt = json_decode($jsnbdy, true); 

        if($ttgl != $inpt_tgl){
            $rspredfr = $client->post('http://mspoon.online/mspoon_pos/recalldfr.php', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'kdoutlet' => substr($inpt_nor,0,5),
                    'tanggal' => $inpt_tgl,
                ],
    
            ]);
            $jsnbdydfr = $rspredfr->getBody()->getContents();
            $jsrsltdfr = json_decode($jsnbdydfr, true); 

            $rspresync = $client->post('http://mspoon.online/mspoon_pos/recalldfr.php', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'kdoutlet' => substr($inpt_nor,0,5),
                    'tanggal' => $inpt_tgl,
                ],
    
            ]);
            $jsnbdysync = $rspresync->getBody()->getContents();
            $jsrsltsync = json_decode($jsnbdysync, true); 
 
        };
        return response()->json($jsrslt);
    }

    // MS Adjust
    public function masterswitch(Request $request)
    {
        $client = new \GuzzleHttp\Client();
  
        if (isset($_GET['nip'])) {  
            $nip        = $_GET['nip']; 
            $kdakses    = $_GET['kdakses']; 
        }  

        $ttgl       = date('Y-m-d');   
        $tanggalll  = Carbon::parse($ttgl)->translatedFormat('l, d F Y');

        $rspersnl = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmteactivtity/getPersonalActivity', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [ 
                "nip" => $nip,
                "tanggal" =>  date('Y-m-d')
            ],
        ]
        ); 
        $jsonprsnl     = $rspersnl->getBody()->getContents();
        $jsdfpersnl    = json_decode($jsonprsnl, true); 
        $dfuser       = $jsdfpersnl['df_psnl'];

        // dd($dfuser[0]['nm_lengkap']);  
        $nm = $dfuser[0]['nm_lengkap'];


        $rspswitchms = $client->get('http://mspoon.online/mspoon_pos/apk_master.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [ 
                "nip" => $nip,
                "kdakses" =>  $kdakses,
                "tipe" =>  'A',
                "nama" =>  $nm,
            ],
        ]
        ); 
        $jsonswcthms     = $rspswitchms->getBody()->getContents();
        $jsswtchms    = json_decode($jsonswcthms, true); 
        // dd($jsswtchms);
        $dflog          = $jsswtchms['df_log'];
        $dflinkurl      = $jsswtchms['df_linkurl'];
        $dfswitch       = $jsswtchms['df_switch'];

        // $rspnotl = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/getOtlMS', [
        //     'headers' => [
        //         'Content-Type' => 'application/json',
        //     ],
        //     'json' => [
        //     ],
        // ]
        // ); 
        // $jsonotls   = $rspnotl->getBody()->getContents();
        // $jsonotl    = json_decode($jsonotls, true);   
        $dfotl      = $jsswtchms['df_linkurl']; 
            $tgl = $ttgl; 

            // Log Visit 
        $rspnsvisit = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/logvisit', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nmfitur' => 'Master Switch', 
            ],
            ]
            );
            $jsonsvist = $rspnsvisit->getBody()->getContents();
            $jsonvs = json_decode($jsonsvist, true); 

        // dd($dfotl);
        return view('msadjust.masterswitch', compact('nip', 'kdakses','dflog','dflinkurl','dfswitch','dfotl','dfuser','tgl','nm')); 
      

    }
    public function submit_switchms(Request $request)
    { 
         
        $client = new \GuzzleHttp\Client(); 

        $mstswt_nm              = $request->input('mstswt_nm');   
        $mstswt_kdakses         = $request->input('mstswt_kdakses');   
        $mstswt_nip             = $request->input('mstswt_nip');   
        $tx_urllink             = $request->input('tx_urllink');   
        $mstswt_sndpilihot      = $request->input('mstswt_sndpilihot');   
        $mstswt_sndpilihbflink  = $request->input('mstswt_sndpilihbflink');    

        // dd($tx_urllink);
        $rwupd = [];    
        for ($i = 0; $i < count($mstswt_sndpilihot); $i++) { 
            $tmpd = ([ 
                "kdoutlet" => $mstswt_sndpilihot[$i],
                "bflink" => $mstswt_sndpilihbflink[$i], 
            ]);   
            array_push($rwupd, $tmpd);
            $kdotlstr[] = $mstswt_sndpilihot[$i]; 
        }


        $data = [ 
            'tipe'      => 'B',
            'nip'       => $mstswt_nip,
            'kdakses'   => $mstswt_kdakses,
            'nama'      => $mstswt_nm, 
            'rwupd'     => $rwupd, 
            'aflink'    => $tx_urllink,
        ];    
        
        $kdoutlet = implode(', ', $kdotlstr);
        $responseNOtif = $client->post('http://api.champ-group.com/champs-mobile/champs_api/notif/sendPushByKdakses.php', [
            'form_params' => [
                'title' => $tx_urllink,
                'message' => 'URL MS '.$kdoutlet.' di Switch oleh '.$mstswt_nm,
                'submessage' => ' ',
                'kdakses' => $mstswt_kdakses,
            ],
        ]
        );
        $jsonsNotif = $responseNOtif->getBody()->getContents();
        $jsonNotif = json_decode($jsonsNotif, true);
 
        
        $ttgl = date('Y-m-d');  
        $rspnprmhn = $client->post('http://mspoon.online/mspoon_pos/apk_master.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'tipe'      => 'B',
                'nip'       => $mstswt_nip,
                'kdakses'   => $mstswt_kdakses,
                'nama'      => $mstswt_nm, 
                'rwupd'     => $rwupd, 
                'aflink'    => $tx_urllink,
            ],

        ]);
        $jsnbdy = $rspnprmhn->getBody()->getContents();
        $jsrslt = json_decode($jsnbdy, true); 
 
        return redirect('masterswitch?nip='.$mstswt_nip.'&kdakses='.$mstswt_kdakses);  
    }

    // Direct Supply 
    public function adjustds(Request $request)
    {
        $client = new \GuzzleHttp\Client();

        $ttgl = date('Y-m-d');  
        
        if (isset($_GET['nip'])) {  
            $nip = $_GET['nip']; 
            $kdakses = $_GET['kdakses']; 
        } else { 
            $nip = '';
            $kdakses = '';
        } 

        if (isset($_GET['kdotl']) ) {
            $kdotl = $_GET['kdotl'];   
            $nmotl = $_GET['nmotl'];   
            $plh_tglds = $_GET['tgl_terimads'];

            $rspnprmhn = $client->post('http://portal2.champ-group.com/notifierpo/directsup2/otllistawalds', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'kdoutlet' => $kdotl,
                    'tgl' => $plh_tglds, 
                ],
    
            ]);
            $jsnbdy = $rspnprmhn->getBody()->getContents();
            $jsrslt = json_decode($jsnbdy, true);  
            $dfterima = $jsrslt['dfterima']; 

            // dd($dfterima);
            
        } else {
            $kdotl = 'F';   
            $nmotl = '';   
            $plh_tglds = $ttgl; 

            $dfterima = null;
            $dfsuplir = '';
        } 

        $tanggalll = Carbon::parse($plh_tglds)->translatedFormat('l, d F Y'); 


        $response = $client->get('http://119.235.252.249/champ_dev/champ_api/cmfiturweb/getAllOutlet');
        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);
        $alloutlet = $json['dftr_outlet'];
        // dd($alloutlet);
         
         // Log Visit 
        $rspnsvisit = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/logvisit', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nmfitur' => 'Adjust DS', 
            ],
            ]
            );
            $jsonsvist = $rspnsvisit->getBody()->getContents();
            $jsonvs = json_decode($jsonsvist, true); 

        return view('msadjust.adjustdirectsply', compact(  'plh_tglds','tanggalll' ,'nip','kdakses','kdotl','nmotl','alloutlet', 'dfterima'));  
    }
    public function dltadjust_kodtrm()
    { 
         
        $client = new \GuzzleHttp\Client(); 
        $kdterima            = $_POST['kdterima'];
        $nip       = $_POST['nip']; 
        
        $ttgl = date('Y-m-d');  
        $rspnprmhn = $client->post('http://portal2.champ-group.com/notifierpo/directsup2/otldelterima', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'kdterima' => $kdterima,
                'nip' => $nip, 
            ],

        ]);
        $jsnbdy = $rspnprmhn->getBody()->getContents();
        $jsrslt = json_decode($jsnbdy, true);  
        // dd($jsrslt);
        return response()->json($jsrslt);
    }

    public function adjst_loncatclosing()
    { 
         
        $client = new \GuzzleHttp\Client(); 
        $kdoutlet            = $_POST['kdoutlet']; 
        $tglloncat            = $_POST['tglloncat']; 
        
        $ttgl = date('Y-m-d');  
        $rspnotll = $client->post('http://mspoon.online/mspoon_pos/loncatcls.php', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'kdoutlet' => $kdoutlet,
                'tglclosing' => $tglloncat,
            ],
        ]
        );
        $jsnbdy = $rspnotll->getBody()->getContents();
        $jsrslt = json_decode($jsnbdy, true);  
        // dd($jsrslt);
        return response()->json($jsrslt);
    }
    public function submit_tmbhbrgms()
    { 
         
        $client = new \GuzzleHttp\Client(); 
        $kdbarang       = $_POST['kdbarang']; 
        $nip            = $_POST['nip'];  
        $rspnotll = $client->post('http://portal2.champ-group.com/notifierpo/mspoon_pos/syncbrgtospoon', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'kdbarang' => $kdbarang,
                'kdkat' => 'KB002',
                'nip' => $nip,
                'tipe' => 'B', 
            ],
        ]
        );
        $jsnbdy = $rspnotll->getBody()->getContents();
        $jsrslt = json_decode($jsnbdy, true);  
        // dd($jsrslt);
        return response()->json($jsrslt);
    }
    
}
