<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use View;

class CMDataHrisController extends Controller
{
     // https://api.champ-group.com/champs-mobile/CMEditKaryawan?nip=K1050012&kdakses=AVXXX
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
         $rspnagma = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmdashboardbodyV19/get_agama', [
             'headers' => [
                 'Content-Type' => 'application/json',
             ],
             'json' => [
             ],
         ]
         ); 
         $jsonbdagm = $rspnagma->getBody()->getContents();
         $jsonagm = json_decode($jsonbdagm, true); 
         $dfagma = $jsonagm['df_agama'];

         $rspnusr = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmlogin/loginCekCMNip', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nip' => $nip, 
            ],
        ]
        );
        $jsonusrs = $rspnusr->getBody()->getContents();
        $df_user = json_decode($jsonusrs, true);

        $df_jnsklm  = array(["klm" => "Laki-Laki"],
        ["klm" => "Perempuan"] ); 
        $df_kwin  = array(["status_kel" => "Menikah"],
        ["status_kel" => "Belum"],
        ["status_kel" => "Janda"],
        ["status_kel" => "Duda"] ); 
        $df_anak  = array(["jml_anak" => "0"],
        ["jml_anak" => "1"],
        ["jml_anak" => "2"],
        ["jml_anak" => "3"],
        ["jml_anak" => "4"],
        ["jml_anak" => "5"],
        ["jml_anak" => "6"],
        ["jml_anak" => "7"],
        ["jml_anak" => "8"],
        ["jml_anak" => "9"],
        ["jml_anak" => "10"] ); 
        

        
        $rspcek = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmprofiel/cekPermohonan', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nip' => $nip, 
                'kdakses' => $kdakses, 
            ],
        ]
        );
        $jsncek = $rspcek->getBody()->getContents();
        $df_cek = json_decode($jsncek, true);
        // dd($df_cek);
        // dd($dfagma);
        // Log Visit 
        $rspnsvisit = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/logvisit', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nmfitur' => 'Detail Karyawan', 
            ],
            ]
            );
            $jsonsvist = $rspnsvisit->getBody()->getContents();
            $jsonvs = json_decode($jsonsvist, true); 
         return view('hris.edit_karyawan', compact('dfagma',  'kdakses','nip','df_user','df_jnsklm','df_kwin','df_anak', 'df_cek','maxbln'));
     }
      
    public function submit_pengajuan()
    { 
        $nip            = $_POST['nip'];
        $jeniskelamin   = $_POST['jeniskelamin'];
        $agama          = $_POST['agama'];
        $alm_domisili   = $_POST['alm_domisili'];
        $telepon        = $_POST['telepon'];
        $tgl_lahir      = $_POST['tgl_lahir'];
        $tpt_lahir      = $_POST['tpt_lahir'];
        $alm_email      = $_POST['alm_email'];
        $nama           = $_POST['nama'];
        $status_kel     = $_POST['status_kel'];
        $tgl_menikah    = $_POST['tgl_menikah'];
        $jml_anak       = $_POST['jml_anak'];
        $client = new \GuzzleHttp\Client();
        // nip, jeniskelamin, agama, alm_domisili, telepon, tgl_lahir, tpt_lahir, alm_email, nama, status_kel,tgl_menikah,jml_anak
        $rspnprmhn = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmprofiel/setPermohonan', [
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'nip' => $nip,
                'jeniskelamin' => $jeniskelamin,
                'agama' => $agama,
                'alm_domisili' => $alm_domisili,
                'telepon' => $telepon,
                'tgl_lahir' => $tgl_lahir,
                'tpt_lahir' => $tpt_lahir,
                'alm_email' => $alm_email,
                'nama' => $nama,
                'status_kel' => $status_kel, 
                'tgl_menikah' => $tgl_menikah,
                'jml_anak' => $jml_anak,
            ],

        ]);
        $jsnbdy = $rspnprmhn->getBody()->getContents();
        $jsrslt = json_decode($jsnbdy, true);

        return response()->json($jsrslt);
    }

}
