<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Admin;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    function check(Request $requerst){
        $requerst->validate([
            'email'=>'required|email|exists:admins,email',
            'password'=>'required|min:5|max:30'
        ],['email.exists'=>'No admin account with this email']);

    $creds = $requerst->only('email','password');
        if(Auth::guard('admin')->attempt($creds)){
            return redirect()->route('admin.home');
        }else{
            return \redirect()->route('admin.login')->with('fail','Incorrect Credentials');
        }
    }

    function logout(){
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
