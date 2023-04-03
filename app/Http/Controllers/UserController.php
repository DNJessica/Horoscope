<?php

namespace App\Http\Controllers;

use App\Mail\Verification;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Login;
use App\Models\Temp_Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    public function getLoginData(){
        return Login::find(session('user_id'));
    }

    public function login(Request $request){
        if ($request->isMethod('post')) 
        {
            $username = $request->input('username');
            $pass = $request->input('pass');
            $login = Login::where('username', $username)->first();
            if($login){
                if($login->pass === md5($pass)){
                    $request->session()->put('user_id', $login->id);
                    return redirect()->route('home');
                } 
            } 
            $login = Login::where('email', $username)->first();
            if($login){
                if($login->pass === md5($pass)){
                    $request->session()->put('user_id', $login->id);
                    return redirect()->route('home');
                } 
            } 
            
            return redirect()->route('home');
        }
        return view('login');
    }

    public function signup(Request $request){
        if ($request->isMethod('post')) 
        {
            $request->validate([
                'password' => 'min:8'
            ]);
            $email = $request->input('email');
            $username = $request->input('username');
            $pass = $request->input('password');
            $login = Login::where('username', $username)->first();
            if($login){
                throw ValidationException::withMessages(['username_taken' => 'This username is already taken']);
            }
            $login = Login::where('email', $email)->first();
            if($login){
                throw ValidationException::withMessages(['email_taken' => 'This email is already registered']); 
            } 
            $temp_auth = new Temp_Auth();
            $temp_auth->email = $email;
            $temp_auth->username = $username;
            $temp_auth->pass = md5($pass);
            $temp_auth->verification_code = $this->verif_code();
            // $temp_auth->name = null;
            // $temp_auth->last_name = null;
            // $temp_auth->birth_date = null;
            $temp_auth->save();
            $temp= Temp_Auth::where('email', $email)->first();
            if($temp){
                $request->session()->put('temp_id', $temp->id);
            }
            return redirect()->route('signup_details');
        }
        return view('signup');
    }

    public function signup_details(Request $request){
        if ($request->isMethod('post')){
            $code = $this->verif_code();
            if(session()->has('temp_id')){
                $temp_user = Temp_Auth::find(session('temp_id'));
                $temp_user->name = $request->input('name');
                $temp_user->last_name = $request->input('last_name');
                $temp_user->birth_date = $request->input('birthdate');
                $temp_user->save();
                return redirect()->route('signup_verification');
            } else {
                throw ValidationException::withMessages(['session_error' => 'Connection time out. Try to sign up again']);
            }
        }
        return view('signup_details');
    }

    public function signup_verification(Request $request){
        if ($request->isMethod('post')){
            if(session()->has('temp_id')){
                $temp_user = Temp_Auth::find(session('temp_id'));
                if($temp_user->verification_code === $request->input('code')){
                    // $login = new Login();
                    // $login->email = $temp_user->email;
                    // $login->pass = $temp_user->pass;
                    // $login->username = $temp_user->username;
                    // $login->save();
                    // $login = Login::where('email', $temp_user->email);
                    // if($login){

                    // }
                } else {
                    throw ValidationException::withMessages(['verification_error' => 'verification code is incorrect. Please try again']);
                }
            } else {
                throw ValidationException::withMessages(['session_error' => 'Connection time out. Try to sign up again']);
            }
        }
        $temp_user = Temp_Auth::find(session('temp_id'));
        Mail::to($temp_user->email)->send(new Verification($temp_user->verification_code)); 
        return view('signup_verification');
       
    }


    private function verif_code(){
        return str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT); 
    } 
}
