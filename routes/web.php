<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ctimesController;
use App\Http\Controllers\tutionController;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\subjectsController;
use App\Http\Controllers\User\usercontroller;
use App\Http\Controllers\institutesController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index'); 

//
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
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 
    Route::resource('students',StudentController::class);
    Route::get('tution/active/{tution}',[tutionController::class,'active'])->name('tution.active');
    Route::get('tution/deactive/{tution}',[tutionController::class,'deactive'])->name('tution.deactive');
    Route::resource('tution',tutionController::class);

    Route::prefix('tution/{tution}')->group(function(){
        Route::resource('ctimes',ctimesController::class);
    });
    
    Route::get('/home/profile',[HomeController::class,'profile'])->name('profile');
    });

});



 





Route::prefix('adm')->name('admin.')->group(function(){
    Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function () {
        Route::view('/login','admin.login')->name('login');
        Route::POST('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function () {
       // Route::view('/home', 'admin.home')->name('home');
       route::get('/',[HomeController::class,'adminindex'])->name('index');
        route::get('/home',[HomeController::class,'adminindex'])->name('home');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
        Route::resource('/subjects',subjectsController::class);
        Route::resource('/institute',institutesController::class);
    });
});