<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use View;

class CmDashController extends Controller
{
    public function cmdash()
    {

        $waktu = date('H-i-s');
        $tanggals = date('Y-m-d');
        $tanggal = Carbon::parse($tanggals)->translatedFormat('l, d F Y');
        return view('cmmodal.cmdashbord');

    }
}
