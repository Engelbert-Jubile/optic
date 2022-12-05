<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Auth extends Controller
{
    public function login(){
        return view('auth/login');
    }
    function login_process(Request $request){
        if(($request->username=="jubile")&&($request->password=="jubile")){
            $request->session()->put('user',$request->username);
            return redirect('customer');
        }
        return back()->with('fail',"Username atau Password Salah");
    }
    public function logout(){
        if(session()->has('user')){
            session()->pull('user');
            return redirect('/');
        }
    }
}
