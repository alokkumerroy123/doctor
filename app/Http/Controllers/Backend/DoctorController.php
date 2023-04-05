<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Backend\Doctor;
use App\Models\Backend\Type;
use App\Models\Backend\District;
use App\Models\Backend\Division;
use App\Models\Backend\Upzila;
use App\Models\Backend\Visiting_day;
use App\Models\Backend\Specialist;
use Illuminate\Http\Request;
use Toastr;
use DB;

class DoctorController extends Controller
{
    public function index(){
        // $doctor=DB::table('doctors')
        // ->join('types','doctors.id','types.doctor_id')
        // ->select('doctors.*','types.*')
        // ->get();
        $division=Division::all();
        $doctor=Doctor::all();
        $district=District::all();
        $upzila=Upzila::all();
        $specialist=Specialist::all();
        return view('backend.doctor.index',compact("doctor","district","upzila","division","specialist"));
    }


    public function store(Request $request){ 
       
     
        //photo rename and photo upload
       $newName='doctor_'.time().'.'.$request->file('photo')->getClientOriginalExtension();
       $request->file('photo')->move('uploads/doctors',$newName);

       $inputs=[
        'doctor_name'=>$request->input('doctor_name'),
        'degree'=>$request->input('degree'),
        'specialist_id'=>$request->input('specialist_id'),
        'division_id'=>$request->input('division_id'),
        'district_id'=>$request->input('district_id'),
        'upzila_id'=>$request->input('upzila_id'),
        'mobile'=>$request->input('mobile'),
        'chamber'=>$request->input('chamber'),
        'appoinment'=>$request->input('appoinment'),
        'fee'=>$request->input('fee'),
        'photo'=>$newName,

    ];

         $doctor = Doctor::create($inputs);    
          foreach ($request->type as $key => $value) {
            $type['type'] = $value;
            $type['doctor_id'] = $doctor->id;
            Type::create($type);
          }

          foreach ($request->visiting_day as $key => $value) {
            $visiting_day['visiting_day'] = $value;
            $visiting_day['doctor_id'] = $doctor->id;
            Visiting_day::create($visiting_day);
          }
        
        Toastr::success('Doctor Successfully Added', 'Title', ["Success" => "toast-top-right"]);
        return redirect()->route('doctor.index');
    }

    public function edit($id){
        $data = Doctor::find($id);
        return response()->json($data);
    }

    public function update(Request $request)
    {   
        $data=[
            'doctor_name'=>$request->input('doctor_name'),
            'degree'=>$request->input('degree'),
            'specialist_id'=>$request->input('specialist_id'),
            'division_id'=>$request->input('division_id'),
            'district_id'=>$request->input('district_id'),
            'upzila_id'=>$request->input('upzila_id'),
            'mobile'=>$request->input('mobile'),
            'chamber'=>$request->input('chamber'),
            'appoinment'=>$request->input('appoinment'),
            'fee'=>$request->input('fee'),
    
        ];
         
        $inputs = Doctor::find($request->update_id);
        $inputs->update($data);
        
     
        Type::where('doctor_id',$inputs->id)->delete();
        foreach ($request->type as $key => $value) {
            $type['type'] = $value;
            $type['doctor_id'] = $inputs->id;
            Type::create($type);
          }
        Visiting_day::where('doctor_id',$inputs->id)->delete();
          foreach ($request->visiting_day as $key => $value) {
            $visiting_day['visiting_day'] = $value;
            $visiting_day['doctor_id'] = $inputs->id;
            Visiting_day::create($visiting_day);
          }
       
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
