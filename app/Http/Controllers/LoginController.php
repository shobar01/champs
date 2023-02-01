<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Redirect;
use Session;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function setlogin(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $nip = $request->input('nip');
        $PassUser = $request->input('PassUser');
        $response = $client->post('http://api.champ-group.com/champ_dev/champ_api/cmlogin/loginwo', [
            'form_params' => [
                'nip' => $nip,
                'passuser' => $PassUser,
            ],
        ]
        );
        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);
        // dd($json);
        $status = $json['status'];
        $message = $json['message'];

        // menambahkan session

        // Validasi session
        //        if($request->session()->has('bari')){
        // mengambil data session
        //            dd($request->session()->get('bari'));
        //        }else{
        //            dd( 'Tidak ada data dalam session.');
        //        }
        //         menghapus data session
        //        dd($request->session()->forget('nama'));
        //         menghapus semua data session
        //  $request->session()->flush();
        // dd($status);
        // echo $status . '=' . $message;

        if ($status == 'T') {
            $detail = $json['detail'][0];
            // input user
            $input = User::firstOrNew(array('email' => $nip));
            $nama = $detail['nm_lengkap'];
            $input->email = $nip;
            $input->password = Hash::make($PassUser);
            $input->name = $nama;
            $input->foto = $detail['fotoqu'];
            $input->idakses = $detail['kdakses'];
            $input->save();
            $detail = $json['detail'][0];

            $request->session()->put('nip', $detail['nip']);
            $request->session()->put('nm_lengkap', $detail['nm_lengkap']);
            $request->session()->put('outlet', $detail['outlet']);
            // $request->session()->put('posisi', $detail['posisi']);
            $request->session()->put('kd_dept', $detail['kd_dept']);
            $request->session()->put('fotoqu', $detail['fotoqu']);

//            dd($detail);

            if (Auth::attempt(['email' => $nip, 'password' => $PassUser])) {

                return redirect('msbukutamu')->with('success', $message)->with('json', $json);

            } else {
                return redirect()->route('login')->with('error', "User atau Password Salah!!");
            }
            // } else {
            //     return redirect()->route('login')->with('error', 'Hanya Staff Kasir Yang Bisa Login!!');
            // }
        } else {
            return redirect()->route('login')->with('error', $message);
        }
    }
}
