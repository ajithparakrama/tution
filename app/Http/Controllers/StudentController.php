<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\TutionClass;
use Illuminate\Http\Request;
use App\Http\Requests\studentStoreRequest;
use App\DataTables\teacherStudentsDatatable;

class StudentController extends Controller
{

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:student-list|student-create|student-edit|student-delete', ['only' => ['index','store']]);
         $this->middleware('permission:student-create', ['only' => ['create','store']]);
         $this->middleware('permission:student-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:student-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(teacherStudentsDatatable $dataTable)
    {
        return    $dataTable->render('students.index'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tutionClass =   TutionClass::where('active','1')->get();
        return view('students.create',compact('tutionClass'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(studentStoreRequest $request)
    {
        $student =    student::create($request->all());

        $student->TutionClass()->sync($request->tution_classes_id);
        return redirect()->route('students.index')->with('message','Student Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
        return view('students.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {
        return view('students.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(studentStoreRequest $request, student $student)
    {
        $student->update($request->all());
        return redirect()->route('students.index')->with('message','Student Details updated');
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
