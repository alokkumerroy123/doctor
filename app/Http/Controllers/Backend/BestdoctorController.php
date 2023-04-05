<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Doctor;
use DB;
use Laravel\Scout\Searchable;
use Illuminate\Http\Request;

class BestdoctorController extends Controller
{
    public function index(){
        $doctor = DB::table('doctors')
        ->join('types', 'doctors.id', 'types.doctor_id')
        ->where('types.type', "best")
        ->select('doctors.*', 'types.*')
        ->get();
        return view("backend.best.index",compact("doctor"));
    }
}
