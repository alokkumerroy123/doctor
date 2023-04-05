<?php

namespace App\Http\Controllers;
use App\Models\Backend\District;
use App\Models\Backend\Division;
use App\Models\Backend\Upzila;
use App\Models\Backend\Doctor;
use App\Models\Backend\Specialist;
use App\Models\Backend\Diagnostic;
use App\Models\Backend\Doner;
use DB;

use Illuminate\Http\Request;

class FilterDoctorController extends Controller
{   

    //find dignostic
    public function filter_digonostic(Request $request){

        $data=DB::table('diagnostics')
        ->join('divisions','diagnostics.division_id','divisions.id')
        ->join('districts','diagnostics.district_id','districts.id')
        ->join('upzilas','diagnostics.upzila_id','upzilas.id')
        ->where('diagnostics.division_id',$request->division_id)
        ->where('diagnostics.district_id',$request->district_id)
        ->where('diagnostics.upzila_id',$request->upzila_id)
        ->select('diagnostics.*','divisions.division_name','districts.district_name','upzilas.upzila_name')
        ->get();
        $district=District::all();
        $division=Division::all();
        $upzila=Upzila::all();
        $doctor=Doctor::all();
        $diagnostic=Diagnostic::all();
        return view('frontend.find.index',compact("district","division","upzila","doctor","diagnostic","data"));
    }

    //find doctor
    public function filter_doctor(Request $request){
     
        $info=DB::table('doctors')
        ->join('specialists','doctors.specialist_id','specialists.id')
        ->join('divisions','doctors.division_id','divisions.id')
        ->join('districts','doctors.district_id','districts.id')
        ->join('upzilas','doctors.upzila_id','upzilas.id')
        ->where('doctors.specialist_id',$request->specialist_id)
        ->where('doctors.division_id',$request->division_id)
        ->where('doctors.district_id',$request->district_id)
        ->where('doctors.upzila_id',$request->upzila_id)
        ->select('doctors.*','divisions.division_name','districts.district_name','upzilas.upzila_name','specialists.specialist_name')
        ->get();  
        $district=District::all();
        $specialist=Specialist::all();
        $division=Division::all();
        $upzila=Upzila::all();
        $doctor=Doctor::all();
        $diagnostic=Diagnostic::all();
        return view('frontend.doctorfind.index',compact("district","division","upzila","doctor","diagnostic","info","specialist"));
    }

    //find blood
    public function filter_blood(Request $request){

        $blood=DB::table('doners')
        ->join('divisions','doners.division_id','divisions.id')
        ->join('districts','doners.district_id','districts.id')
        ->join('upzilas','doners.upzila_id','upzilas.id')
        ->where('doners.division_id',$request->division_id)
        ->where('doners.district_id',$request->district_id)
        ->where('doners.upzila_id',$request->upzila_id)
        ->select('doners.*','divisions.division_name','districts.district_name','upzilas.upzila_name')
        ->get();

        $district=District::all();
        $division=Division::all();
        $upzila=Upzila::all();
        $doctor=Doctor::all();
        $doner=Doner::all();
        return view('frontend.findblood.index',compact("district","division","upzila","doctor","blood","doner"));
    }

}
