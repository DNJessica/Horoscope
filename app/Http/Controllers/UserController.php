<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;

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
        return view('signup');
    }
}
