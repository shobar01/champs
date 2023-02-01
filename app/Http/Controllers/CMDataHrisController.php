<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use View;

class CMDataHrisController extends Controller
{
     // https://api.champ-group.com/champs-mobile/CMHris?nip=K1050012&kdakses=AVXXX
     public function CMHris(Request $request)
     {
         $waktu = date('H-i-s');
         $tanggals = date('Y-m-d');
         $maxbln = date('Y-m-d');
         $tanggal = Carbon::parse($tanggals)->translatedFormat('d F Y');
         $client = new \GuzzleHttp\Client();
 
         if (isset($_GET['kdakses'])) {
             $kdakses = $_GET['kdakses'];
             $nip = $_GET['nip'];     
         }    
         if (isset($_GET['simpan_succs'])) {
            $simpan_succs = $_GET['simpan_succs'];    
        }else{
            $request->session()->put('simpan_succs', 3);
        } 

        //  dd($dfuser);
         $link_dataprofile = htmlspecialchars("http://api.champ-group.com/champs-mobile/CMEditKaryawan?nip=".$nip."#kdakses=".$kdakses);
         $link_datapenddkn = htmlspecialchars("http://api.champ-group.com/champs-mobile/CMHris_Pendidikan?nip=".$nip."#kdakses=".$kdakses);
         $link_datapnglman = htmlspecialchars("http://api.champ-group.com/champs-mobile/CMHris_Pengalaman?nip=".$nip."#kdakses=".$kdakses);
         $link_datakkelrga = htmlspecialchars("http://api.champ-group.com/champs-mobile/CMHris_KartuKeluarga?nip=".$nip."#kdakses=".$kdakses); 
         $link_detppk = htmlspecialchars("http://api.champ-group.com/champs-mobile/CMHris_PPK?nip=".$nip."#kdakses=".$kdakses); 
        // Log Visit 
        $rspnsvisit = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/logvisit', [
        'headers' => [
            'Content-Type' => 'application/json',
        ],
        'json' => [
            'nmfitur' => 'Edit Detail Karyawan', 
        ],
        ]
        );
        $jsonsvist = $rspnsvisit->getBody()->getContents();
        $jsonvs = json_decode($jsonsvist, true); 

         return view('hris.dash', compact( 'kdakses','nip' ,'link_dataprofile','link_datapenddkn','link_datapnglman','link_datakkelrga','link_detppk'));
     }
     public function CMHris_Pendidikan(Request $request)
     {
         $waktu = date('H-i-s');
         $tanggals = date('Y-m-d');
         $maxbln = date('Y-m-d');
         $tanggal = Carbon::parse($tanggals)->translatedFormat('d F Y');
         $client = new \GuzzleHttp\Client();
 
         if (isset($_GET['kdakses'])) {
             $kdakses = $_GET['kdakses'];
             $nip = $_GET['nip'];      
         }   
         $link_dataprofile = htmlspecialchars("http://api.champ-group.com/champs-mobile/CMEditKaryawan?nip=".$nip."#kdakses=".$kdakses);

         $rsppddkn = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmhris/ambil_hris_pendidikan', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [ 
                "nip" => $nip, 
            ],
        ]
        ); 
        $jsonpddkn     = $rsppddkn->getBody()->getContents();
        $jsdfpddkn     = json_decode($jsonpddkn, true);  
        $df_pddkn      = $jsdfpddkn['data'];
        $df_succes      = $jsdfpddkn['success']; 
        $df_tngktpddkn  = array(["pddkn" => "SD/Sederajat"],
        ["pddkn" => "SMP/Sederajat"],
        ["pddkn" => "SMK/Sederajat"],
        ["pddkn" => "SMA/Sederajat"],
        ["pddkn" => "D1"],
        ["pddkn" => "D2"],
        ["pddkn" => "D3"],
        ["pddkn" => "D4"],
        ["pddkn" => "S1"],
        ["pddkn" => "S2"],
        ["pddkn" => "S3"],
        ["pddkn" => "Kursus"] ); 

        $rspersnl = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmteactivtity/getPersonalActivity', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [ 
                "nip" => $nip,
                "tanggal" => $tanggals
            ],
        ]
        ); 
        $jsonprsnl     = $rspersnl->getBody()->getContents();
        $jsdfpersnl    = json_decode($jsonprsnl, true); 
        $dfuser       = $jsdfpersnl['df_psnl'][0];
        $nm_lengkap     = $dfuser['nm_lengkap'];
        // dd($df_tngktpddkn);
         return view('hris.pendidikan', compact( 'kdakses','nip' ,'df_pddkn','df_succes','df_tngktpddkn','nm_lengkap' ));
     } 
     public function CMHris_Pengalaman(Request $request)
     {
         $waktu = date('H-i-s');
         $tanggals = date('Y-m-d');
         $maxbln = date('Y-m-d');
         $tanggal = Carbon::parse($tanggals)->translatedFormat('d F Y');
         $client = new \GuzzleHttp\Client();
 
         if (isset($_GET['kdakses'])) {
             $kdakses = $_GET['kdakses'];
             $nip = $_GET['nip'];     
         }    

         $rsppnglmnn = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmhris/ambil_hris_pengalaman', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [ 
                "nip" => $nip, 
            ],
        ]
        ); 
        $jsonpnglmn     = $rsppnglmnn->getBody()->getContents();
        $jsdfpnglmn     = json_decode($jsonpnglmn, true);  
        $df_pnglmn      = $jsdfpnglmn['data'];
        $df_succes      = $jsdfpnglmn['success'];
        $rspersnl = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmteactivtity/getPersonalActivity', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [ 
                "nip" => $nip,
                "tanggal" => $tanggals
            ],
        ]
        ); 
        $jsonprsnl     = $rspersnl->getBody()->getContents();
        $jsdfpersnl    = json_decode($jsonprsnl, true); 
        $dfuser       = $jsdfpersnl['df_psnl'][0];
        $nm_lengkap     = $dfuser['nm_lengkap'];
        // dd($df_pnglmn);

        //  
         return view('hris.pengalaman', compact( 'kdakses','nip' ,'df_pnglmn','df_succes','nm_lengkap'));
     } 

     public function CMHris_KartuKeluarga(Request $request)
     {
         $waktu = date('H-i-s');
         $tanggals = date('Y-m-d');
         $maxbln = date('Y-m-d');
         $tanggal = Carbon::parse($tanggals)->translatedFormat('d F Y');
         $client = new \GuzzleHttp\Client();
 
         if (isset($_GET['kdakses'])) {
             $kdakses = $_GET['kdakses'];
             $nip = $_GET['nip'];     
         }    

         $rspkk = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmhris/ambil_hris_keluarga', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [ 
                "nip" => $nip, 
            ],
        ]
        ); 
        $jsonkk     = $rspkk->getBody()->getContents();
        $jsdfkk     = json_decode($jsonkk, true);  
        $df_kk      = $jsdfkk['data'];
        // dd(count($df_kk));
        $df_succes      = $jsdfkk['success'];
        $df_sttsklrga  = array(["kk" => "1-Suami"],
        ["kk" => "2-Istri"],
        ["kk" => "3-Anak"],
        ["kk" => "4-Lainlaint"],
        ["kk" => "5-Ayah"],
        ["kk" => "6-Ibu"],
        ["kk" => "7-Kakak"],
        ["kk" => "8-Adik"]); 
        $df_jnsklmn  = array(["jnsklmn" => "1-Laki-Laki"],
        ["jnsklmn" => "2-Perempuan"] ); 

        $rspersnl = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmteactivtity/getPersonalActivity', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [ 
                "nip" => $nip,
                "tanggal" => $tanggals
            ],
        ]
        ); 
        $jsonprsnl     = $rspersnl->getBody()->getContents();
        $jsdfpersnl    = json_decode($jsonprsnl, true); 
        $dfuser       = $jsdfpersnl['df_psnl'][0];
        $nm_lengkap     = $dfuser['nm_lengkap'];

        $date_max = date('Y-m-d'); 
        $date_min = date('Y-m-d', strtotime('-80 year', strtotime( date('Y-m-d') ))); 
         return view('hris.kartukeluarga', compact( 'kdakses','nip' ,'df_kk','df_succes',
         'nm_lengkap','df_sttsklrga','df_jnsklmn','date_max','date_min' ));
     } 

    //  Tambah dan Update
    public function tmbhpendidikan()
    {  
        $nip           = $_POST['nip'];  
        $type           = $_POST['type'];  
        $tksklh         = $_POST['tksklh'];  
        $nmsklh         = $_POST['nmsklh'];  
        $lokasi         = $_POST['lokasi'];  
        $thnjzh         = $_POST['thnjzh'];  
        $jurusn         = $_POST['jurusn'];  
        $ktrngn         = $_POST['ktrngn'];  
        $nmanip         = $_POST['nmanip']; 
        $client = new \GuzzleHttp\Client();

        if ($type == 'Tambah') { 
     
            $rspnprmhn = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmhris/setPendidikan', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [ 
                    'nip' => $nip,
                    'type' => $type,
                    'tksklh' => $tksklh, 
                    'nmsklh' => $nmsklh, 
                    'lokasi' => $lokasi,
                    'thnjzh' => $thnjzh,
                    'jurusn' => $jurusn,
                    'ktrngn' => $ktrngn,
                    'nmanip' => $nmanip,
                ],
    
            ]);
        }elseif ($type == 'Update') {
            $rspnprmhn = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmhris/setPendidikan', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [ 
                    'nip' => $nip,
                    'type' => $type,
                    'tksklh' => $tksklh, 
                    'nmsklh' => $nmsklh, 
                    'lokasi' => $lokasi,
                    'thnjzh' => $thnjzh,
                    'jurusn' => $jurusn,
                    'ktrngn' => $ktrngn,
                    'nmanip' => $nmanip,
                ],
    
            ]);
        }

       
        $jsnbdy = $rspnprmhn->getBody()->getContents();
        $jsrslt = json_decode($jsnbdy, true);

        return response()->json($jsrslt);
    }
    public function tmbhpenglaman()
    {  
        $nip           = $_POST['nip']; 
        $nmanip        = $_POST['nmanip'];  
        $type          = $_POST['type'];  
        $prshn         = $_POST['prshn'];  
        $jbtan         = $_POST['jbtan'];  
        $mskrj         = $_POST['mskrj'];  
        $gajih         = $_POST['gajih'];  
        $almat         = $_POST['almat'];  
        $alsan         = $_POST['alsan'];    
        $client = new \GuzzleHttp\Client();

        if ($type == 'Tambah') { 
     
            $rspnprmhn = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmhris/setPengalaman', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [ 
                    'nip' => $nip,
                    'type' => $type,
                    'nmanip' => $nmanip,
                    'prshn' => $prshn, 
                    'jbtan' => $jbtan, 
                    'mskrj' => $mskrj,
                    'gajih' => $gajih,
                    'almat' => $almat,
                    'alsan' => $alsan,
                ],
    
            ]);
        }elseif ($type == 'Update') {
            $rspnprmhn = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmhris/setPengalaman', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [ 
                    'nip' => $nip,
                    'type' => $type,
                    'nmanip' => $nmanip,
                    'prshn' => $prshn, 
                    'jbtan' => $jbtan, 
                    'mskrj' => $mskrj,
                    'gajih' => $gajih,
                    'almat' => $almat,
                    'alsan' => $alsan, 
                ],
    
            ]);
        }

       
        $jsnbdy = $rspnprmhn->getBody()->getContents();
        $jsrslt = json_decode($jsnbdy, true);

        return response()->json($jsrslt);
    }
    public function tmbhkk()
    {  
        // $type, $nip, $nmnip , $ktpkk , $nikkk, $anggt , $stskl , $jklmn, $umurk , $pddkn , $almat, $tplhr , $tglhr, $tlpon 
        $type          = $_POST['type']; 
        $nip           = $_POST['nip']; 
        $nmanip        = $_POST['nmanip'];  
        $ktpkk         = $_POST['ktpkk'];  
        $nikkk         = $_POST['nikkk'];  
        $anggt         = $_POST['anggt'];  
        $stskl         = $_POST['stskl'];  
        $jklmn         = $_POST['jklmn'];  
        $umurk         = $_POST['umurk'];    
        $pddkn         = $_POST['pddkn'];    
        $almat         = $_POST['almat'];    
        $tplhr         = $_POST['tplhr'];   
        $tglhr         = $_POST['tglhr'];     
        $tlpon         = $_POST['tlpon'];     
        $client = new \GuzzleHttp\Client();  

        if ($type == 'Tambah') { 
     
            $rspnprmhn = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmhris/setKeluarga', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [ 
                    'nip' => $nip,
                    'type' => $type,
                    'nmanip' => $nmanip,
                    'ktpkk' => $ktpkk, 
                    'nikkk' => $nikkk, 
                    'anggt' => $anggt,
                    'stskl' => $stskl,
                    'jklmn' => $jklmn,
                    'umurk' => $umurk,
                    'pddkn' => $pddkn,
                    'almat' => $almat,
                    'tplhr' => $tplhr,
                    'tglhr' => $tglhr,
                    'tlpon' => $tlpon,
                ],
    
            ]);
        }elseif ($type == 'Update') {
            $rspnprmhn = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmhris/setKeluarga', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [ 
                    'nip' => $nip,
                    'type' => $type,
                    'nmanip' => $nmanip,
                    'ktpkk' => $ktpkk, 
                    'nikkk' => $nikkk, 
                    'anggt' => $anggt,
                    'stskl' => $stskl,
                    'jklmn' => $jklmn,
                    'umurk' => $umurk,
                    'pddkn' => $pddkn,
                    'almat' => $almat,
                    'tplhr' => $tplhr,
                    'tglhr' => $tglhr,
                    'tlpon' => $tlpon, 
                ],
    
            ]);
        }

       
        $jsnbdy = $rspnprmhn->getBody()->getContents();
        $jsrslt = json_decode($jsnbdy, true);

        return response()->json($jsrslt);
    }
    //  Delete/Batalkan
    public function btlknppk()
    {  
        $kdupdpeg       = $_POST['kdupdpeg'];   
        $client         = new \GuzzleHttp\Client(); 
    
        $rspnprmhn = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmhris/deletPKK', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [ 
                'kdupdpeg' => $kdupdpeg,  
            ],

        ]); 

        
        $jsnbdy = $rspnprmhn->getBody()->getContents();
        $jsrslt = json_decode($jsnbdy, true);

        return response()->json($jsrslt);
    }
    public function updateppk()
    {  
        $kdupdpeg       = $_POST['kdupdpeg'];   
        $client         = new \GuzzleHttp\Client(); 
    
        $rspnprmhn = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmhris/updatePKK', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [ 
                'kdupdpeg' => $kdupdpeg,  
            ],

        ]); 

        
        $jsnbdy = $rspnprmhn->getBody()->getContents();
        $jsrslt = json_decode($jsnbdy, true);

        return response()->json($jsrslt);
    }
    // Detail PPK
    public function CMHris_PPK(Request $request)
    {
        $waktu = date('H-i-s');
        $tanggals = date('Y-m-d');
        $maxbln = date('Y-m-d');
        $tanggal = Carbon::parse($tanggals)->translatedFormat('d F Y');
        $client = new \GuzzleHttp\Client();

        if (isset($_GET['kdakses'])) {
            $kdakses = $_GET['kdakses'];
            $nip = $_GET['nip'];      
        }    

        $rsppk = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmhris/hris_ppk', [
           'headers' => [
               'Content-Type' => 'application/json',
           ],
           'json' => [ 
               "nip" => $nip, 
           ],
       ]
       ); 
       $jsonppk         = $rsppk->getBody()->getContents();
       $jsdfppk         = json_decode($jsonppk, true);
    //    dd($jsdfppk);  
    //  jsdfppk  head_is_approv , head_is_proses ,head_ket_hrd ,head_kdupdpeg , 

        if($jsdfppk['df_pnglman'] == []){
            $df_pnglman      = '0'; 
        }else {
            $df_pnglman      = $jsdfppk['df_pnglman']; 
        }
        if($jsdfppk['df_pendidikn'] == []){ 
            $df_pendidikn    = '0'; 
        }else { 
            $df_pendidikn    = $jsdfppk['df_pendidikn']; 
        }
        if($jsdfppk['df_kelrga'] == [] ){ 
            $df_kelrga       = '0';
        }else { 
            $df_kelrga       = $jsdfppk['df_kelrga'];
        }

        if($jsdfppk['df_tkijazah'] == [] ){ 
            $df_tkpddkn1       = [];
        }else { 
            $df_tkpddkn1       = $jsdfppk['df_tkijazah']; 
 


        }

        // dd($df_tkpddkn1);
        // dd(count($df_pendidikn));
       $df_tngktpddkn  = array(["pddkn" => "SD/Sederajat"],
                                ["pddkn" => "SMP/Sederajat"],
                                ["pddkn" => "SMK/Sederajat"],
                                ["pddkn" => "SMA/Sederajat"],
                                ["pddkn" => "D1"],
                                ["pddkn" => "D2"],
                                ["pddkn" => "D3"],
                                ["pddkn" => "D4"],
                                ["pddkn" => "S1"],
                                ["pddkn" => "S2"],
                                ["pddkn" => "S3"],
                                ["pddkn" => "Kursus"] ); 

       $df_sttsklrga  = array(["kk" => "1-Suami"],
                                ["kk" => "2-Istri"],
                                ["kk" => "3-Anak"],
                                ["kk" => "4-Lainlain"],
                                ["kk" => "5-Ayah"],
                                ["kk" => "6-Ibu"],
                                ["kk" => "7-Kakak"],
                                ["kk" => "8-Adik"]); 
                                
        $df_jnsklmn  = array(["jnsklmn" => "1-Laki-Laki"],
                                ["jnsklmn" => "2-Perempuan"] ); 

       $rspersnl = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmteactivtity/getPersonalActivity', [
           'headers' => [
               'Content-Type' => 'application/json',
           ],
           'json' => [ 
               "nip" => $nip,
               "tanggal" => $tanggals
           ],
       ]
       ); 
       $jsonprsnl       = $rspersnl->getBody()->getContents();
       $jsdfpersnl      = json_decode($jsonprsnl, true); 
       $dfuser          = $jsdfpersnl['df_psnl'][0];
       $nm_lengkap      = $dfuser['nm_lengkap'];

       $date_max = date('Y-m-d'); 
       $date_min = date('Y-m-d', strtotime('-80 year', strtotime( date('Y-m-d') ))); 
    //    dd($df_tngktpddkn);
        return view('hris.ppk', compact( 'kdakses','nip' ,'df_pnglman','df_pendidikn','df_tkpddkn1','df_kelrga','nm_lengkap','df_tngktpddkn','df_sttsklrga','df_jnsklmn','date_max' ,'date_min','jsdfppk'));
    } 

    public function simpan_ppk(Request $request)
    { 

        // header
        $tx_kettmbhn      = $request->input('tx_kettmbhn');
        $tx_reqnik      = $request->input('tx_reqnip'); 
        $tx_reqnmusr      = $request->input('tx_reqnmusr');  
        $tx_kdakses      = $request->input('tx_kdakses');  

        
       
        //Pendidikan Detail 
        $pddkn_tksklh     = $request->input('pddkn_tksklh');
        $pddkn_sklh       = $request->input('pddkn_sklh');
        $pddkn_lksi       = $request->input('pddkn_lksi');
        $pddkn_thnijzh    = $request->input('pddkn_thnijzh');
        $pddkn_jurusan    = $request->input('pddkn_jurusan');
        $pddkn_ketrngn    = $request->input('pddkn_ketrngn'); 
        $df_pnddkndetail = []; 
        if ($pddkn_tksklh != null) {
            for ($i = 0; $i < count($pddkn_tksklh); $i++) { 
                $tmpd = ([
                    "urutan" => $i + 1,
                    "pddkn_tksklh" => $pddkn_tksklh[$i],
                    "pddkn_sklh" => $pddkn_sklh[$i],
                    "pddkn_lksi" => $pddkn_lksi[$i],
                    "pddkn_thnijzh" => $pddkn_thnijzh[$i],
                    "pddkn_jurusan" => $pddkn_jurusan[$i],
                    "pddkn_ketrngn" => $pddkn_ketrngn[$i],
                ]);
                array_push($df_pnddkndetail, $tmpd);
            }
        } 

    // dd($df_pnddkndetail);
        //Pengalaman Detail 
        $pnglmn_nmpt    = $request->input('pnglmn_nmpt');
        $pnglmn_jbtn    = $request->input('pnglmn_jbtn');
        $pnglmn_mskrj   = $request->input('pnglmn_mskrj');
        $pnglmn_gajih   = $request->input('pnglmn_gajih');
        $pnglmn_almat   = $request->input('pnglmn_almat');
        $pnglmn_alsan   = $request->input('pnglmn_alsan'); 

        $df_pengalamandetail = []; 
        if ($pnglmn_nmpt != null) {
            for ($i = 0; $i < count($pnglmn_nmpt); $i++) { 
                $tmpd = ([
                    "urutan" => $i + 1,
                    "pnglmn_nmpt" => $pnglmn_nmpt[$i],
                    "pnglmn_jbtn" => $pnglmn_jbtn[$i],
                    "pnglmn_mskrj" => $pnglmn_mskrj[$i],
                    "pnglmn_gajih" => $pnglmn_gajih[$i],
                    "pnglmn_almat" => $pnglmn_almat[$i],
                    "pnglmn_alsan" => $pnglmn_alsan[$i],
                ]);
                array_push($df_pengalamandetail, $tmpd);
            }
        } 
        // dd($df_pengalamandetail); 
        // Keluarga Detail

        $kel_sttuskel   = $request->input('kel_sttuskel');
        $kel_nmanggt    = $request->input('kel_nmanggt');
        $kel_kk         = $request->input('kel_kk');
        $kel_niik       = $request->input('kel_niik');
        $kel_jnsklmn    = $request->input('kel_jnsklmn');
        $kel_tmptlhr    = $request->input('kel_tmptlhr');
        $kel_tgllhr     = $request->input('kel_tgllhr');
        $kel_umur       = $request->input('kel_umur');
        $kel_tlpon      = $request->input('kel_tlpon');
        $kel_profesi      = $request->input('kel_profesi');
        $kel_tngktpddknkk      = $request->input('kel_tngktpddknkk');
        $kel_rmh        = $request->input('kel_rmh'); 

        $df_keldetail = []; 
        if ($kel_sttuskel != null) {
            for ($i = 0; $i < count($kel_sttuskel); $i++) { 
                $tmpd = ([
                    "urutan" => $i + 1,
                    "kel_sttuskel" => $kel_sttuskel[$i],
                    "kel_nmanggt" => $kel_nmanggt[$i],
                    "kel_kk" => $kel_kk[$i],
                    "kel_niik" => $kel_niik[$i],
                    "kel_jnsklmn" => $kel_jnsklmn[$i],
                    "kel_tmptlhr" => $kel_tmptlhr[$i],
                    "kel_tgllhr" => $kel_tgllhr[$i],
                    "kel_umur" => $kel_umur[$i],
                    "kel_tlpon" => $kel_tlpon[$i],
                    "kel_profesi" => $kel_profesi[$i],
                    "kel_tngktpddknkk" => $kel_tngktpddknkk[$i],
                    "kel_rmh" => $kel_rmh[$i], 
                ]);
                array_push($df_keldetail, $tmpd);
            }
        }
 
        $data = [ 
            'kettambahan' => $tx_kettmbhn,
            'nip' => $tx_reqnik,
            'nmanip' => $tx_reqnmusr,
            'df_pengalaman' => $df_pengalamandetail,
            'df_ppendidikan' => $df_pnddkndetail, 
            'df_kk' => $df_keldetail, 
        ];
// dd($data);
        $client = new \GuzzleHttp\Client();  
            $response3 = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmhris/setTambahPPK', [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => $data,
            ]);

            $jsons3 = $response3->getBody()->getContents(); 
            $json3 = json_decode($jsons3, true); 
            // dd($json3['message']); 

            $simpan_msg = $json3['message'];
            $simpan_succs = $json3['success'];

         $request->session()->put('simpan_succs', $simpan_succs);
        //     if ($response3->getStatusCode() >= 300) { 
        //         $statusCode = $response3->getStatusCode(); 
        //         return redirect()->back()->with('error', $statusCode);
        //     } else { 

        return redirect('CMHris?nip=' . $tx_reqnik.'&kdakses='.$tx_kdakses.'&simpan_succs='.$simpan_succs)->with(['simpan_msg'=>$simpan_msg]);
                // return redirect()->route('CMHris',['nip'=> $tx_reqnik,'kdakses'=> $tx_kdakses])->with(['simpan_msg'=>$simpan_msg],['simpan_succs'=>$simpan_succs]);
        //     }  
        
    }
    // http://localhost/champs-mobile/caricri?nip=K1050012&kdakses=AVXXX
    public function caricri(Request $request)
    {
        $client = new \GuzzleHttp\Client();

        $jamnow = Carbon::now()->timezone('Asia/Jakarta')->format('H:i');  
        // dd('============  '.$jamnow);
        if (isset($_GET['kdakses'])) {
            $kdakses = $_GET['kdakses'];
            $nip = $_GET['nip'];     
        }    

        $rspersnl = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmteactivtity/getPersonalActivity', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [ 
                "nip" => $nip,
                "tanggal" => date('Y-m-d')
            ],
        ]
        ); 
        $jsonprsnl     = $rspersnl->getBody()->getContents();
        $jsdfpersnl    = json_decode($jsonprsnl, true); 
        $dfuser       = $jsdfpersnl['df_psnl'];

        // dd($dfuser[0]['dept']);
        if(isset($_GET['tx_dept'])){
            $tx_dept = $_GET['tx_dept']; 
        }else{ 
            $tx_dept = $dfuser[0]['dept']; 
        }

        $rspwa = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/getAllKaryawan', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [   
                "nip" => $nip,
                "kdakses" => $kdakses,
                "type" => 'B',
                "id_dept" => $tx_dept,
            ],
        ]
        ); 
        $jsonwa     = $rspwa->getBody()->getContents();
        $rsltwa     = json_decode($jsonwa, true);  

        if ($rsltwa['success'] == 1){

            $df_allwa   = $rsltwa['df_krywan']; 
        }else{
            $df_allwa   = 0; 
        }

        // dd($df_allwa);

        // dd($rsltwa); 
        $rspdept = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/get_dept', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [   
            ],
        ]
        ); 
        $jsondept     = $rspdept->getBody()->getContents();
        $rsltdept     = json_decode($jsondept, true);  
        $df_dept   = $rsltdept['df_dept']; 
        // Log Visit 
        $rspnsvisit = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/logvisit', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nmfitur' => 'Cari Karyawan', 
            ],
            ]
            );
            $jsonsvist = $rspnsvisit->getBody()->getContents();
            $jsonvs = json_decode($jsonsvist, true); 
        // dd($rsltwa);
        return view('hris.dash_carikaryawan', compact('df_allwa', 'kdakses','nip', 'df_dept','tx_dept'));

    } 
    public function cari_krwnbynip()
    {   
        $nip     = $_POST['tx_crinip'];    
        $typee     = $_POST['typee'];    

        $client = new \GuzzleHttp\Client(); 
        
        $rspwa = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/getAllKaryawan', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [   
                "nip" => $nip,
                "kdakses" => '',
                "type" => $typee,
                "id_dept" => '',
            ],
        ]
        ); 
        $jsonwa     = $rspwa->getBody()->getContents();
        $rsltwa     = json_decode($jsonwa, true);  
      

        return response()->json($rsltwa);
    }
}
