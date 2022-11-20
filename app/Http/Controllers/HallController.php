<?php

namespace App\Http\Controllers;

use App\Models\hall;
use Illuminate\Http\Request;
use App\DataTables\hallDataTable;

class HallController extends Controller
{

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:halls-list|halls-create|halls-edit|halls-delete', ['only' => ['index','store']]);
         $this->middleware('permission:halls-create', ['only' => ['create','store']]);
         $this->middleware('permission:halls-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:halls-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(hallDataTable $dataTable)
    {
      return  $dataTable->render('settings.hall.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.hall.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:halls,name',
            'capacity'=>'required|integer'
        ]);

        hall::create([
            'name'=>$request->name,
            'capacity'=>$request->capacity
        ]);

        return redirect()->route('hall.index')->with('message','Hall created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function show(hall $hall)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function edit(hall $hall)
    {
        return view('settings.hall.edit',compact('hall'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, hall $hall)
    {
        $request->validate([
            'name'=>'required|unique:halls,name',
            'capacity'=>'required|integer'
        ]);

        $hall->update([
            'name'=>$request->name,
            'capacity'=>$request->capacity
        ]);

        return redirect()->route('hall.index')->with('message','Hall Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\hall  $hall
     * @return \Illuminate\Http\Response
     */
    public function destroy(hall $hall)
    {
        //
    }
}
