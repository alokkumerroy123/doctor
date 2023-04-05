<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Specialist;
use Toastr;

class SpecialistController extends Controller
{
    public function index(){
        $specialist=Specialist::all();
        return view('backend.specialist.index',compact('specialist'));
    }

    public function store(Request $request){
        Specialist::create($request->all());
        Toastr::success('Specialist Successfully Added', 'Title', ["Success" => "toast-top-right"]);
        return redirect()->route('specialist.index');
    }

       
    public function edit($id){
        $data =Specialist::find($id);
        return response()->json($data);
    }

    public function update(Request $request)
    {   
        $data =Specialist::find($request->update_id);
        $data->update($request->except('update_id'));
        return redirect()->route('specialist.index')->with('success','specialist updated');
    }

    public function destroy($id)
    {
        $data = Specialist::find($id);
        $data->delete();
        Toastr::success('Specialist Successfully Delete', 'Title', ["Success" => "toast-top-right"]);
        return redirect()->route('specialist.index');
    }
}
