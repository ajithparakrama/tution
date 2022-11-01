<?php

namespace App\Http\Controllers;

use App\Models\ctimes;
use App\Models\tution_class;
use Illuminate\Http\Request;

class ctimesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(tution_class $tution)
    {
        return view('tutionClasses.ctimes.index',compact('tution'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(tution_class $tution)
    {
        return view('tutionClasses.ctimes.create',compact('tution'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(tution_class $tution, Request $request)
    {
        $request->validate([
            'date'=>'required|min:2|max:255',  
            'start_at'=>'required|after:now',
            'end_at'=>'required|after:start_at'
        ]);

        $tution->ctimes()->create([
            'date'=>$request->date,
            'start_at'=>$request->start_at,
            'end_at'=>$request->end_at,
            'remarks'=>$request->remarks,
        ]);
        return redirect()->route('ctimes.index',$tution->id)->with('message','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(tution_class $tution,ctimes $ctime)
    {
        return view('tutionClasses.ctimes.edit',compact('tution','ctime'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tution_class $tution,ctimes $ctime)
    {
        $request->validate([
            'date'=>'required|min:2|max:255',  
            'start_at'=>'required|after:now',
            'end_at'=>'required|after:start_at'
        ]);

        $ctime->update([
            'date'=>$request->date,
            'start_at'=>$request->start_at,
            'end_at'=>$request->end_at,
            'remarks'=>$request->remarks,
        ]);
        return redirect()->route('ctimes.index',$tution->id)->with('message','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
