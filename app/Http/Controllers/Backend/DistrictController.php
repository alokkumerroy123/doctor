<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\District;
use App\Models\Backend\Division;
use Illuminate\Http\Request;
use Toastr;

class DistrictController extends Controller
{
    public function index(){
        $division=Division::all();
        $district=District::all();
        return view("backend.district.index",compact('division','district'));
    }

    public function store(Request $request){
        District::create($request->all());
        Toastr::success('District Successfully Added', 'Title', ["Success" => "toast-top-right"]);
        return redirect()->route('district.index');
    }

    
    public function edit($id){
        $data =District::find($id);
        return response()->json($data);
    }

    public function update(Request $request)
    {   
        $data =District::find($request->update_id);
        $data->update($request->except('update_id'));
        return redirect()->route('district.index')->with('success','District updated');
    }

    public function destroy($id)
    {
        $data = District::find($id);
        $data->delete();
        Toastr::success('District Successfully Delete', 'Title', ["Success" => "toast-top-right"]);
        return redirect()->route('district.index');
    }
}
