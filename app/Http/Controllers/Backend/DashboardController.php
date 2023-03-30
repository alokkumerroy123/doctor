<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Division;
use App\Models\Backend\Doctor;
use App\Models\Backend\District;
use App\Models\Backend\Doner;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    

    public function index(){
        $division=Division::count();
        $doctor=Doctor::count();
        $district=District::count();
        $doner=Doner::count();
        return view('backend.dashboard',compact('division','doctor','district','doner'));
    }
}
