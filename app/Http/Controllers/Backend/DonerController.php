<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Doner;
use Illuminate\Http\Request;
use Toastr;

class DonerController extends Controller
{
    public function index(){
        $doner=Doner::all();
        return view("backend.doner.index",compact("doner"));
    }

    public function store(Request $request){
        Doner::create($request->all());
        Toastr::success('Doner Successfully Added', 'Title', ["Success" => "toast-top-right"]);
        return redirect()->route('doner.index');
    }

    
    public function edit($id){
        $data = Doner::find($id);
        return response()->json($data);
    }

    public function update(Request $request)
    {   
        $data = Doner::find($request->update_id);
        $data->update($request->except('update_id'));
        return redirect()->route('doner.index')->with('success','Doner updated');
    }

    public function destroy($id)
    {
        $data = Doner::find($id);
        $data->delete();
        Toastr::success('Doner Successfully Delete', 'Title', ["Success" => "toast-top-right"]);
        return redirect()->route('doner.index');
    }
}
