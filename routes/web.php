<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DoctorController;
use App\Http\Controllers\Backend\DiagnosticController;
use App\Http\Controllers\Backend\DivisionController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\UpzilaController;
use App\Http\Controllers\Backend\AmbulanceController;
use App\Http\Controllers\Backend\DonerController;
use App\Http\Controllers\Backend\AppointmentController;
use App\Http\Controllers\Backend\BestdoctorController;
use App\Http\Controllers\FilterDoctorController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\SpecialistController;
use App\Http\Controllers\general_controller;

// Route::get('/', function () {
//     return view('layouts.backend');
// });


require __DIR__ . '/auth.php';

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    // Route::get('/doctor',[HomeController::class,'index'])->name('doctor');

    // doctor
    Route::group(['as' => 'doctor.', 'prefix' => 'doctor'], function () {
        Route::get('/index', [DoctorController::class, 'index'])->name('index');
        Route::post('/stotre', [DoctorController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [DoctorController::class, 'edit'])->name('edit');
        Route::post('/update', [DoctorController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [DoctorController::class, 'destroy'])->name('delete');
    });

    //Diagnostic
    Route::group(['as' => 'diagnostic.', 'prefix' => 'diagnostic'], function () {
        Route::get('/index', [DiagnosticController::class, 'index'])->name('index');
        Route::post('/store', [DiagnosticController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [DiagnosticController::class, 'edit'])->name('edit');
        Route::post('/update', [DiagnosticController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [DiagnosticController::class, 'destroy'])->name('delete');
    });

    //Division
    Route::group(['as' => 'division.', 'prefix' => 'division'], function () {
        Route::get('/index', [DivisionController::class, 'index'])->name('index');
        Route::post('/store', [DivisionController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [DivisionController::class, 'edit'])->name('edit');
        Route::post('/update', [DivisionController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [DivisionController::class, 'destroy'])->name('delete');
    });

    //District
    Route::group(['as' => 'district.', 'prefix' => 'district'], function () {
        Route::get('/index', [DistrictController::class, 'index'])->name('index');
        Route::post('/store', [DistrictController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [DistrictController::class, 'edit'])->name('edit');
        Route::post('/update', [DistrictController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [DistrictController::class, 'destroy'])->name('delete');
    });

    //upzila
    Route::group(['as' => 'upzila.', 'prefix' => 'upzila'], function () {
        Route::get('/index', [UpzilaController::class, 'index'])->name('index');
        Route::post('/store', [UpzilaController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [UpzilaController::class, 'edit'])->name('edit');
        Route::post('/update', [UpzilaController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [UpzilaController::class, 'destroy'])->name('delete');
    });

    //ambulance
    Route::group(['as' => 'ambulance.', 'prefix' => 'ambulance'], function () {
        Route::get('/index', [AmbulanceController::class, 'index'])->name('index');
        Route::post('/store', [AmbulanceController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AmbulanceController::class, 'edit'])->name('edit');
        Route::post('/update', [AmbulanceController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [AmbulanceController::class, 'destroy'])->name('delete');
    });

    //doner
    Route::group(['as' => 'doner.', 'prefix' => 'doner'], function () {
        Route::get('/index', [DonerController::class, 'index'])->name('index');
        Route::post('/store', [DonerController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [DonerController::class, 'edit'])->name('edit');
        Route::post('/update', [DonerController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [DonerController::class, 'destroy'])->name('delete');
    });

    //appointment
    Route::group(['as' => 'appointment.', 'prefix' => 'appointment'], function () {
        Route::get('/index', [AppointmentController::class, 'index'])->name('index');
        Route::get('/destroy/{id}', [AppointmentController::class, 'destroy'])->name('delete');
    });

    //best
    Route::group(['as' => 'bestdoctor.', 'prefix' => 'bestdoctor'], function () {
        Route::get('/index', [BestdoctorController::class, 'index'])->name('index');
    });

     //specialist
     Route::group(['as' => 'specialist.', 'prefix' => 'specialist'], function () {
        Route::get('/index', [SpecialistController::class, 'index'])->name('index');
        Route::post('/store', [SpecialistController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [SpecialistController::class, 'edit'])->name('edit');
        Route::post('/update', [SpecialistController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [SpecialistController::class, 'destroy'])->name('delete');
    });

});

Route::post('/filter_digonostic',[FilterDoctorController::class,'filter_digonostic'])->name('filter_digonostic');
Route::post('/filter_doctor',[FilterDoctorController::class,'filter_doctor'])->name('filter_doctor');
Route::post('/filter_blood',[FilterDoctorController::class,'filter_blood'])->name('filter_blood');
Route::get('/get_district_list/{division_id}',[general_controller::class,'district_list']);

  
 


