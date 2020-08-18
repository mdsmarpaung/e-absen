<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\admin;
use App\operator;
use Illuminate\Http\Request;

class login extends Controller
{
    function masuk(Request $kiriman){
    $data1 = admin::where('username',$kiriman->username)->where('password',$kiriman->
        password)->get();
    $data2 = operator::where('username',$kiriman->username)->where('password',$kiriman->
        password)->get();

    $kiriman->validate([
        'username' => 'required',
        'password' => 'required',

    ]);

    if (count($data1)>0){
   //login berhasil admin
   Auth::guard('admin')->loginUsingId($data1[0]['id']);
        return redirect('/admin');
    }else if(count($data2)>0){
    //login berhasil operator
    Auth::guard('operator')->loginUsingId($data2[0]['id']);
        return redirect('/operator');
    }else{
        //gagal login
        return redirect ('/login');
    }


    }
    function keluar(){
        if(Auth::guard('admin')->check()){
        Auth::guard('admin')->logout();
        }else if(Auth::guard('operator')->check()){
        Auth::guard('operator')->logout();
        }

       return redirect ('/login');

    }
}
