<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Upzila;
use App\Models\Backend\District;
use App\Models\Backend\Division;
use Illuminate\Http\Request;
use Toastr;

class UpzilaController extends Controller
{
    public function index(){
        $district=District::all();
        $upzila=Upzila::all();
        $division=Division::all();
        return view('backend.upzila.index',compact('district','upzila','division'));
    }

    public function store(Request $request){
        Upzila::create($request->all());
        Toastr::success('Upzila Successfully Added', 'Title', ["Success" => "toast-top-right"]);
        return redirect()->route('upzila.index');
    }
    public function edit($id){
        $data = Upzila::find($id);
        return response()->json($data);
    }

    public function update(Request $request)
    {   
        $data = Upzila::find($request->update_id);
        $data->update($request->except('update_id'));
        return redirect()->route('upzila.index')->with('success','Upzila updated');
    }

    public function destroy($id)
    {
        $data = Upzila::find($id);
        $data->delete();
        Toastr::success('Upzila Successfully Delete', 'Title', ["Success" => "toast-top-right"]);
        return redirect()->route('upzila.index');
    }
}
