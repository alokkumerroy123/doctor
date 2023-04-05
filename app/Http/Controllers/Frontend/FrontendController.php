<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\District;
use App\Models\Backend\Division;
use App\Models\Backend\Upzila;
use App\Models\Backend\Doctor;
use App\Models\Backend\Diagnostic;
use App\Models\Backend\Specialist;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $district=District::all();
        $division=Division::all();
        $upzila=Upzila::all();
        $doctor=Doctor::all();
        $diagnostic=Diagnostic::all();
        $specialist=Specialist::all();
        return view("frontend.frondashboard",compact("district","division","upzila","doctor",'diagnostic','specialist'));
    }

  
}
