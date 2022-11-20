<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\HallController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\userController;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ctimesController;
use App\Http\Controllers\tutionController;
use App\Http\Controllers\StudentController;
// use App\Http\Controllers\User\usercontroller;
use App\Http\Controllers\subjectsController;
use App\Http\Controllers\institutesController;
use App\Http\Controllers\ClassStudentController;
use App\Http\Controllers\paymentMonthController;
use App\Http\Controllers\Auth\ChangePasswordController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Auth::routes();
Route::middleware(['auth', 'PreventBackHistory'])->group(function () { 

     /**
//              * email verification
//              */

Route::get('/email/verify', function () {    return view('auth.verify');})->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) { $request->fulfill(); return redirect('/home');  })->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) { $request->user()->sendEmailVerificationNotification();  return back()->with('resent', 'Verification link sent!');})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Route::get('/email/verify', 'VerificationController@show')->name('verification.notice');
// Route::get('/email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify')->middleware(['signed']);
//Route::post('/email/resend', 'VerificationController@resend')->name('verification.resend');

Route::group(['middleware' => ['verified']], function() {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index'); 
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 
    Route::resource('students',StudentController::class);
    Route::get('tution/active/{tution}',[tutionController::class,'active'])->name('tution.active');
    Route::get('tution/deactive/{tution}',[tutionController::class,'deactive'])->name('tution.deactive');
    Route::resource('tution',tutionController::class);

Route::prefix('settings')->group(function(){
    Route::resource('subjects',subjectsController::class);
    Route::resource('hall',HallController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', userController::class);
});



    Route::prefix('tution/{tution}')->group(function(){

        Route::get('ctimes/{ctime}/attendance',[ctimesController::class,'attendance'])->name('ctimes.attendance');
        Route::post('ctimes/{ctime}/markattendance',[ctimesController::class,'markattendance'])->name('ctimes.markattendance');
        Route::resource('ctimes',ctimesController::class);
    
        Route::get('tstudents/add-to-class',[ClassStudentController::class,'addToClass'])->name('tstudent.add-to-class'); // show form
        Route::POST('tstudents/save-to-class',[ClassStudentController::class,'saveToClass'])->name('tstudent.save-to-class'); //store child to class


        Route::resource('tstudents',ClassStudentController::class);
        Route::get('payemnt-months',[paymentMonthController::class,'index'])->name('payemnt-months.index');
        Route::get('payemnt-months/{payment_month}/addpayment',[paymentMonthController::class,'addpayment'])->name('payemnt-months.add-payment');
        Route::post('payemnt-months/{payment_month}/addpayment',[paymentMonthController::class,'store'])->name('payemnt-months.store');

        Route::get('staff',[tutionController::class,'staff'])->name('tution.staff');
        Route::post('staff',[tutionController::class,'storeStaff'])->name('tution.staff-store');
   //     Route::resource('payemnt-months',paymentMonthController::class);




    });
    
    Route::get('/home/profile',[HomeController::class,'profile'])->name('profile');
    Route::post('/change-password', [ChangePasswordController::class,'store'])->name('change.password');
    });

});



 