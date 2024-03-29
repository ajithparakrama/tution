<?php

namespace App\Http\Controllers;

use App\Models\TutionClass;
use Illuminate\Http\Request;
use App\DataTables\classStudentsDatatable;

class ClassStudentController extends Controller
{

    
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
      //   $this->middleware('permission:classes-list|classes-create|classes-edit|classes-delete', ['only' => ['index','store']]);
         $this->middleware('permission:classes-students-list', ['only' => ['index']]);
         $this->middleware('permission:classes-students-add', ['only' => ['addToClass','saveToClass']]);
      //   $this->middleware('permission:classes-delete', ['only' => ['destroy']]);
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(classStudentsDatatable $dataTable,TutionClass $tution)
    { 
         return $dataTable->with('tution',$tution)->render('tutionClasses.students.index',compact('tution'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('students.create');
      //  return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     //
    // }

    public function addToClass(TutionClass $tution){
        return view('tutionClasses.students.add-to-class',compact('tution'));
    }

    public function saveToClass(Request $request, TutionClass $tution){
        $request->validate([
            'student_id'=>'required|numeric:true'
        ]);
        if($tution->student()->where('id',$request->student_id)->exists()){
            return redirect()->route('tstudents.index',$tution->id)->with('info','Student alrady in the class');
        }

        $tution->student()->attach(['student_id'=>$request->student_id]);
        return redirect()->route('tstudents.index',$tution->id)->with('message','Student Added to class');
    }
    
}
