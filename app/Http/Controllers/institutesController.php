<?php

namespace App\Http\Controllers;

use App\Models\institute;
use Illuminate\Http\Request;
use App\DataTables\instituteDatatable;
use App\Http\Requests\instituteRequest;

class institutesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(instituteDatatable $dataTable)
    {
        return $dataTable->render('institutes.admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('institutes.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(instituteRequest $request)
    {
        institute::create($request->toArray());
        return redirect()->route('admin.institute.index')->with('message','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(institute $institute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(institute $institute)
    {
        return view('institutes.admin.edit',compact('institute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(instituteRequest $request, institute $institute)
    { 
        //need to chage
        $institute->update($request->all());
        return redirect()->route('admin.institute.index')->with('message','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(institute $institute)
    {
        $institute->update(['active'=>0]);
        return redirect()->route('admin.institute.index')->with('message','success');
    
    }
}
