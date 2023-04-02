<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\Login;
use App\Models\Temp_Auth;

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
                if($login->pass === $pass){
                    $request->session()->put('user_id', $login->id);
                    return redirect()->route('home');
                } 
            } 
            $login = Login::where('email', $username)->first();
            if($login){
                if($login->pass === $pass){
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
            $temp_auth->save();
            $temp= Temp_Auth::where('email', $email)->first();
            if($temp){
                $request->session()->put('temp_id', $temp->id);
                $request->session()->put('temp_email', $temp->email);
            }
            return redirect()->route('signup/details');
        }
        return view('signup');
    }

    private function verif_code(){
        return str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT); 
    } 
}
