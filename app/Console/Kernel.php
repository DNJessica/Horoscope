<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Horoscope;
use Illuminate\Support\Facades\Mail;
use App\Mail\Horoscope as HoroscopeMail;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            $horoscope = [
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
            $curl = curl_init();

            foreach($horoscope as $key=>$value){
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
                    $horoscope[$key] = $js->daily;
                }
            }

            $horoscope_today = new Horoscope();

            foreach($horoscope as $key=>$value){
                $horoscope_today[$key] = $value;
            }

            $horoscope_today->save();

            curl_close($curl);
        })->dailyAt('00:00')->timezone('America/Los_Angeles');


        $schedule->call(function () {
        $horoscope = Horoscope::where('created_at', '>=', date('Y-m-d').' 00:00:00')->first();
        $users = DB::table('logins')
            ->join('user__data', 'logins.id', '=', 'user__data.login_id')
            ->select('user__data.zodiac', 'logins.email')
            ->where('user__data.email_agree', true)
            ->get();

        $emails_aries = [];
        $emails_taurus = [];
        $emails_gemini = [];
        $emails_cancer = [];
        $emails_leo = [];
        $emails_virgo = [];
        $emails_libra = [];
        $emails_scorpio = [];
        $emails_sagittarius = [];
        $emails_capricorn = [];
        $emails_aquarius = [];
        $emails_pisces = [];
        foreach($users as $user){
            if($user->zodiac == 'Aries'){
                array_push($emails_aries, $user->email);
            } else if($user->zodiac == 'Taurus'){
                array_push($emails_taurus, $user->email);
            } else if($user->zodiac == 'Gemini'){
                array_push($emails_gemini, $user->email);
            } else if($user->zodiac == 'Cancer'){
                array_push($emails_cancer, $user->email);
            } else if($user->zodiac == 'Leo'){
                array_push($emails_leo, $user->email);
            } else if($user->zodiac == 'Virgo'){
                array_push($emails_virgo, $user->email);
            } else if($user->zodiac == 'Libra'){
                array_push($emails_libra, $user->email);
            } else if($user->zodiac == 'Scorpio'){
                array_push($emails_scorpio, $user->email);
            } else if($user->zodiac == 'Sagittarius'){
                array_push($emails_sagittarius, $user->email);
            } else if($user->zodiac == 'Capricorn'){
                array_push($emails_capricorn, $user->email);
            } else if($user->zodiac == 'Aquarius'){
                array_push($emails_aquarius, $user->email);
            } else if($user->zodiac == 'Pisces'){
                array_push($emails_pisces, $user->email);
            }
        }
            Mail::to($emails_aries)->send(new HoroscopeMail($horoscope->Aries));
            sleep(121);
            Mail::to($emails_taurus)->send(new HoroscopeMail($horoscope->Taurus));
            sleep(121);
            Mail::to($emails_gemini)->send(new HoroscopeMail($horoscope->Gemini));
            sleep(121);
            Mail::to($emails_cancer)->send(new HoroscopeMail($horoscope->Cancer));
            sleep(121);
            Mail::to($emails_leo)->send(new HoroscopeMail($horoscope->Leo));
            sleep(121);
            Mail::to($emails_virgo)->send(new HoroscopeMail($horoscope->Virgo));
            sleep(121);
            Mail::to($emails_libra)->send(new HoroscopeMail($horoscope->Libra));
            sleep(121);
            Mail::to($emails_scorpio)->send(new HoroscopeMail($horoscope->Scorpio));
            sleep(121);
            Mail::to($emails_sagittarius)->send(new HoroscopeMail($horoscope->Sagittarius));
            sleep(121);
            Mail::to($emails_capricorn)->send(new HoroscopeMail($horoscope->Capricorn));
            sleep(121);
            Mail::to($emails_aquarius)->send(new HoroscopeMail($horoscope->Aquarius));
            sleep(121);
            Mail::to($emails_pisces)->send(new HoroscopeMail($horoscope->Pisces));
        })->dailyAt('08:00')->timezone('America/Los_Angeles');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
