<?php

namespace App\Http\Controllers;

use App\Models\subject;
use Illuminate\Http\Request;
use App\DataTables\subjectsDatatable;
use App\Http\Requests\subjectUpdateRequest;
use App\Http\Requests\subjectCareateRequest;

class subjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(subjectsDatatable $datatable)
    {
        return $datatable->render('subjects.admin.index');
       // return view('subjects.admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subjects.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(subjectCareateRequest $request)
    {
        subject::create($request->toArray());
        return redirect()->route('admin.subjects.index')->with('message','Succesfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(subject $subject)
    {
        return view('subjects.admin.edit',compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(subjectUpdateRequest $request, subject $subject)
    {
        $subject->update($request->all());
        return redirect()->route('admin.subjects.index')->with('message','Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(subject $subject)
    {
        $subject->update(['active'=>0]);
        return redirect()->route('admin.subjects.index')->with('message','Success');
    }
}
