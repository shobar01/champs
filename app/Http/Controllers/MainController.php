<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Support\Carbon;
use JonnyW\PhantomJs\Client;
use View;

class MainController extends Controller
{
    public function main()
    {
        $tanggals = date('Y-m-d');
        $tanggal = Carbon::parse($tanggals)->translatedFormat('l, d F Y');
        $kdoutlet = Auth::user()->kdoutlet;
        $client = new \GuzzleHttp\Client();

        // dd($kdoutlet);
        $responseMeja = $client->post('http://mspoon.online/mspoon_pos/trxmeja.php', [

            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'kdoutlet' => Auth::user()->kdoutlet,
            ],
        ]);
        $jsonsMeja = $responseMeja->getBody()->getContents();
        $jsonMeja = json_decode($jsonsMeja, true);
        $meja = $jsonMeja['meja'];
        $setting = collect($jsonMeja['settoutlet']);
        $valtax = intval($setting->where('nmsetting', 'valtax')->first()['valuesetting']);
        // $wktnotif = intval($setting->where('nmsetting', 'wktnotif')->first()['valuesetting']);
        $tglclosings = $setting->where('nmsetting', 'tglclosing')->first()['valuesetting'];
        $tglclosing = Carbon::parse($tglclosings)->translatedFormat('l, d F Y');
        $color1 = $setting->where('nmsetting', 'color1')->first()['valuesetting'];
        $color2 = $setting->where('nmsetting', 'color2')->first()['valuesetting'];
        $color3 = $setting->where('nmsetting', 'color3')->first()['valuesetting'];
        $color4 = $setting->where('nmsetting', 'color4')->first()['valuesetting'];
        $color5 = $setting->where('nmsetting', 'color5')->first()['valuesetting'];
        $posisicart = $setting->where('nmsetting', 'posisicart')->first()['valuesetting'];
        $takeaway = $setting->where('nmsetting', 'takeaway')->first()['valuesetting'];
        $billnow = $setting->where('nmsetting', 'billnow')->first()['valuesetting'];
        $zonawaktu = intval($setting->where('nmsetting', 'zonawaktu')->first()['valuesetting']);
        $valserv = floatval($setting->where('nmsetting', 'valserv')->first()['valuesetting']);
        $alamat = $setting->where('nmsetting', 'alamat')->first()['valuesetting'];
        $kota = $setting->where('nmsetting', 'kota')->first()['valuesetting'];
        $kurir = $jsonMeja['kurir'];
        $kartu = $jsonMeja['kartu'];
        if (isset($jsonMeja['pssales'])) {
            $pssales = $jsonMeja['pssales'];
        } else {
            $pssales = 0;
        }
        return view('main', compact('alamat', 'kota', 'pssales', 'valserv', 'zonawaktu', 'billnow', 'jsonMeja', 'kurir', 'kartu', 'meja', 'tglclosing', 'tglclosings', 'takeaway', 'posisicart', 'kdoutlet', 'tanggal', 'valtax', 'color1', 'color2', 'color3', 'color4', 'color5'));

    }
}
