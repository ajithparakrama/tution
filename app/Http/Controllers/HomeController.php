<?php

namespace App\Http\Controllers;

use App\Models\hall;
use App\Models\User;
use App\Models\student;
use App\Models\subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $subjcets =  subject::all()->count();
        $user =  User::all()->count();
        $hall =  hall::all()->count();
        $students = student::all()->count();

        $tutions = Auth::user()->tution;
        return view('home',compact('subjcets','user','hall','students','tutions'));
    }

    public function adminindex(){
        return view('admin.home');
    }

    public function profile(){ 
        return view('profile');
    }
}
