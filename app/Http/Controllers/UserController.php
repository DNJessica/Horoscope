<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;

class UserController extends Controller
{
    public function login(Request $request){
       
        if ($request->isMethod('post')) 
        {
            $username = $request->input('username');
            $pass = $request->input('pass');
            // to do
            return redirect()->route('home');
        }
        return view('login');
    }
}
