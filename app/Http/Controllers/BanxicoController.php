<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BanxicoController extends Controller
{

    /**
     * Display a listing of the https://www.banxico.org.mx/SieAPIRest/service/v1/series/SP68257 resource
     */
    public function index(Request $request)
    {
        if ( !env('BMX_TOKEN') ) {
            throw new \Exception("BMX_TOKEN is not present on .env file. Request a new one over here https://www.banxico.org.mx/SieAPIRest/service/v1/token");
        }
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => env('BMX_URL_SERIES', 'https://www.banxico.org.mx/SieAPIRest/service/v1/series/SP68257'),
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(env('BMX_TOKEN') ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);

        return view('banxico.index')
            ->with('response', $response);
    }

}
