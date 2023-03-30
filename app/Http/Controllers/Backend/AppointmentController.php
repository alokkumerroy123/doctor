<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Doctor;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(){
        $doctor=Doctor::all();
        return view("backend.appointment.index",compact("doctor"));
    }

    public function unpaidindex(){
        // $client=Client::all();
        // $throp=Throp::all();
        // $area=Area::all();
        // $collection=Collection::all();
        // return view('components.collection.unpaid.index',compact('client','throp','area','collection'));
    
    
        $data = DB::table('doctors')
        // ->join('doctors','doctors.id','collections.client_id')
        // ->join('areas','areas.id','collections.area_id')
        // ->join('throps','throps.id','collections.throp_id')
        ->where('collections.status',0)
        ->select('clients.*',"collections.status as status","collections.date as date",'areas.name as area_name','throps.name as throp_name',)
        ->get();
        return view('components.collection.unpaid.index',compact('data'));
    }
}
