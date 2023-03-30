<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Backend\Doctor;
use Illuminate\Http\Request;
use Toastr;

class DoctorController extends Controller
{
    public function index(){
        $doctor=Doctor::all();
        return view('backend.doctor.index',compact("doctor"));
    }

    
    public function store(Request $request){
        // Doctor::create($request->all());
     
        $doctor=new Doctor;
        $doctor->doctor_name=$request->doctor_name;
        $doctor->degree=$request->degree;
        $doctor->mobile=$request->mobile;
        $doctor->chamber=$request->chamber;
        // $doctor->visiting_day=$request->visiting_day;
        $doctor->visiting_day=json_encode($request->visiting_day);
        $doctor->appoinment=$request->appoinment;
        $doctor->fee=$request->fee;
        $doctor->type=json_encode($request->type);
        $doctor->save();
        Toastr::success('Doctor Successfully Added', 'Title', ["Success" => "toast-top-right"]);
        return redirect()->route('doctor.index');
    }

    public function edit($id){
        $data = Doctor::find($id);
        return response()->json($data);
    }

    public function update(Request $request)
    {   
        $data = Doctor::find($request->update_id);
        $data->update($request->except('update_id'));
        return redirect()->route('doctor.index')->with('success','Doctor updated');
    }

    public function destroy($id)
    {
        $data = Doctor::find($id);
        $data->delete();
        Toastr::success('Doctor Successfully Delete', 'Title', ["Success" => "toast-top-right"]);
        return redirect()->route('doctor.index');
    }
}
