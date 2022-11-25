<?php

namespace App\Http\Controllers;

use App\Models\hall;
use App\Models\User;
use App\Models\subject;
use App\Models\institute;
use App\Models\TutionClass;
use Illuminate\Http\Request;
use App\DataTables\tutionDatatable;
use Illuminate\Support\Facades\Auth;
use App\DataTables\checkListDataTable;

class tutionController extends Controller
{

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('permission:classes-list|classes-create|classes-edit|classes-delete', ['only' => ['index','store']]);
         $this->middleware('permission:classes-create', ['only' => ['create','store']]);
         $this->middleware('permission:classes-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:classes-delete', ['only' => ['active','deactive']]);
         $this->middleware('permission:classes-staff', ['only' => ['staff','storeStaff']]);
         $this->middleware('permission:classes-check-list', ['only' => ['checkList','storeStaff']]);
         
    } 


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(tutionDatatable $dataTable)
    {
        return $dataTable->render('tutionClasses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subject =  subject::all();
        $hall = hall::all();
        return view('tutionClasses.create',compact('subject','hall'));
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
            'name'=>'required|min:2|max:250',
      //      'location'=>'required|min:2|max:250',
            'subjects_id'=>'required',
            'type'=>'required',
           'hall_id'=>'required'
        ]);

         TutionClass::create(
            ['name'=>$request->name,
        //    'location'=>$request->location,
            'type'=>$request->type,
            'subjects_id'=>$request->subjects_id,
            'hall_id'=>$request->hall_id,
            'teacher_id'=>Auth::user()->id]
        );

        return redirect()->route('tution.index')->with('message','Class Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TutionClass $tution)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TutionClass $tution)
    {
        if($tution->teacher_id==Auth::user()->id){ 
        $subject =  subject::all(); 
        $hall = hall::all();
        return view('tutionClasses.edit',compact('subject','tution','hall'));
        }
       // abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TutionClass $tution)
    {
        if($tution->teacher_id==Auth::user()->id){ 
        $tution->update(
            ['name'=>$request->name,
   //      'location'=>$request->location,
            'type'=>$request->type,
            'subjects_id'=>$request->subjects_id,
            'hall_id'=>$request->hall_id
            ]
        );
        return redirect()->route('tution.index')->with('message','Class updated');
        }
       // abort(403);
        //return redirect()->route('tution.index')->with('message','Class updated');
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

    public function active(TutionClass $tution){
        $tution->update(
            ['active'=>1]
        );
        return redirect()->route('tution.index')->with('error','Activated class');
    }

    public function deactive(TutionClass $tution){
        $tution->update(
            ['active'=>0]
        );
        return redirect()->route('tution.index')->with('error','Deactivated class');
    }

    public function staff(TutionClass $tution){
     //   $users = User::where('type','=',2)->get();
        $users = User::whereHas(
            'roles', function($q){
                $q->where('name', 'Card Checker');
            }
        )->get();
        return view('tutionClasses.staff.index',compact('tution','users'));
    }


    public function storeStaff(Request $request, TutionClass $tution){

        $tution->staff()->sync($request->user_id);
        return redirect()->route('tution.index')->with('message','Staff added to class');
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkList(checkListDataTable $dataTable)
    {
        return $dataTable->render('tutionClasses.index');
    }


}
