<?php

namespace App\Http\Controllers;

use App\Models\TutionClass;
use Illuminate\Http\Request;

class reportController extends Controller
{
    

    public function index( TutionClass $tution){
        return view('tutionClasses.reports.index',compact('tution'));
    }
}
