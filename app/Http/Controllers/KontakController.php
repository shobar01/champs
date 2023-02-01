<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use View;

class KontakController extends Controller
{
    //http://localhost/champ_dev/champ_api/cmfiturweb/getkontak?kdarea=KdAreaIct
    // http://localhost/champs-mobile/public/kontak?kdarea=KdAreaIct
    public function kontak(Request $request)
    { 
        $client = new \GuzzleHttp\Client(); 
        $response = $client->get('http://api.champ-group.com/champ_dev/champ_api/cmfiturweb/getkontak');
        $jsons = $response->getBody()->getContents();
        $json = json_decode($jsons, true);  
        $dfrcntact = $json['dfrcntact'];
        // dd($dfrcntact);  
        return view('/kontak/kontak', compact('dfrcntact'));

    }
}
