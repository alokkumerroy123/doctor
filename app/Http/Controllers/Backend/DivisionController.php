<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Division;
use Illuminate\Http\Request;
use Toastr;

class DivisionController extends Controller
{
    public function index(){
        $division=Division::all();
        return view("backend.division.index",compact("division"));
    }

    public function store(Request $request){
        Division::create($request->all());
        Toastr::success('Division Successfully Added', 'Title', ["Success" => "toast-top-right"]);
        return redirect()->route('division.index');
    }

    public function edit($id){
        $data = Division::find($id);
        return response()->json($data);
    }

    public function update(Request $request)
    {   
        $data = Division::find($request->update_id);
        $data->update($request->except('update_id'));
        return redirect()->route('division.index')->with('success','Division updated');
    }

    public function destroy($id)
    {
        $data = Division::find($id);
        $data->delete();
        Toastr::success('Division Successfully Delete', 'Title', ["Success" => "toast-top-right"]);
        return redirect()->route('division.index');
    }
}
