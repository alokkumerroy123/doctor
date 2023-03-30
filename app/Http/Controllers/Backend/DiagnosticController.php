<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Diagnostic;
use Illuminate\Http\Request;
use Toastr;

class DiagnosticController extends Controller
{
    public function index(){
        $diagnostic=Diagnostic::all();
        return view('backend.diagnostic.index',compact('diagnostic'));
    }

       
    public function store(Request $request){
        Diagnostic::create($request->all());
        Toastr::success('Diagnostic Successfully Added', 'Title', ["Success" => "toast-top-right"]);
        return redirect()->route('diagnostic.index');
    }

    public function edit($id){
        $data = Diagnostic::find($id);
        return response()->json($data);
    }

    public function update(Request $request)
    {   
        $data = Diagnostic::find($request->update_id);
        $data->update($request->except('update_id'));
        return redirect()->route('diagnostic.index')->with('success','Diagnostic updated');
    }

    public function destroy($id)
    {
        $data = Diagnostic::find($id);
        $data->delete();
        Toastr::success('Diagnostic Successfully Delete', 'Title', ["Success" => "toast-top-right"]);
        return redirect()->route('diagnostic.index');
    }
}
