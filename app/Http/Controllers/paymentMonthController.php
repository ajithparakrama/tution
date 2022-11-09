<?php

namespace App\Http\Controllers;

use App\Models\TutionClass;
use App\Models\paymentMonth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\DataTables\tutionMonthPaymentsDatatable;

class paymentMonthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TutionClass $tution)
    {        
        return view('tutionClasses.paymentMonths.index',compact('tution'));
    }

    public function addpayment(tutionMonthPaymentsDatatable $dataTable ,TutionClass $tution, paymentMonth $payment_month){
         return $dataTable->with(['payment_month'=>$payment_month])->render('tutionClasses.paymentMonths.addpayment',compact('tution','payment_month'));
    }


    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    public function store(Request $request,TutionClass $tution, paymentMonth $payment_month)
    { 
         $res = $payment_month->student()->attach(
            $request->students_id
            ,[
                'amount'=>$request->amount,
                'created_by'=>Auth::user()->id,
                'ip'=>$request->ip()
            ]
         );

         return redirect()->route('payemnt-months.add-payment',[$tution->id,$payment_month->id])->with('message','Payment added.');
      
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
