<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Ambulance;
use Illuminate\Http\Request;
use Toastr;
class AmbulanceController extends Controller
{
    public function index(){
        $ambulance=Ambulance::all();
          return view('backend.ambulance.index',compact("ambulance"));
        }

        public function store(Request $request){
            Ambulance::create($request->all());
            Toastr::success('Ambulance Successfully Added', 'Title', ["Success" => "toast-top-right"]);
            return redirect()->route('ambulance.index');
        }

        public function edit($id){
            $data = Ambulance::find($id);
            return response()->json($data);
        }
    
        public function update(Request $request)
        {   
            $data = Ambulance::find($request->update_id);
            $data->update($request->except('update_id'));
            return redirect()->route('ambulance.index')->with('success','Ambulance updated');
        }

        public function destroy($id)
        {
            $data = Ambulance::find($id);
            $data->delete();
            Toastr::success('Ambulance Successfully Delete', 'Title', ["Success" => "toast-top-right"]);
            return redirect()->route('ambulance.index');
        }
    
}
