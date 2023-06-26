<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horoscope;

class IndexController extends Controller
{

    private $horoscope = [
        'Aries' => null,
        'Taurus' => null,
        'Gemini' => null,
        'Cancer' => null,
        'Leo' => null,
        'Virgo' => null,
        'Libra' => null,
        'Scorpio' => null,
        'Sagittarius' => null,
        'Capricorn' => null,
        'Aquarius' => null,
        'Pisces' => null
    ];

    public function index(){
        $horoscope_today = Horoscope::where('created_at', '>=', date('Y-m-d').' 00:00:00')->first();
        if($horoscope_today){
            return view('home', ["horoscope" => $horoscope_today]);
        }
        $curl = curl_init();

        foreach($this->horoscope as $key=>$value){
            curl_setopt_array($curl, [
                CURLOPT_URL => "https://horoscope-astrology.p.rapidapi.com/dailyphrase",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => [
                    "X-RapidAPI-Host: horoscope-astrology.p.rapidapi.com",
                    "X-RapidAPI-Key: 93571833damshc388b21d40a5baap16c71bjsn2549a09ed19e"
                ],
            ]);

            $response = curl_exec($curl);
            $err = curl_error($curl);
            if($err){
                abort(500, $err);
            } else {
                $js = json_decode($response);
                $this->horoscope[$key] = $js->daily;
            }
        }

        $horoscope = new Horoscope();

        foreach($this->horoscope as $key=>$value){
            $horoscope[$key] = $value;
        }

        $horoscope->save();

        curl_close($curl);

        return view('home', ["horoscope" => $horoscope]);
    }
    
}
