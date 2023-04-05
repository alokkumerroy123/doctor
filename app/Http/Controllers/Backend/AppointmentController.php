<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Doctor;
use App\Models\Backend\Type;
use Illuminate\Http\Request;
use DB;

class AppointmentController extends Controller
{
    public function index()
    {
        $doctor = DB::table('doctors')
            ->join('types', 'doctors.id', 'types.doctor_id')
            ->where('types.type', "appointment")
            ->select('doctors.*', 'types.*')
            ->get();
        return view("backend.appointment.index", compact("doctor"));
    }

    public function destroy($id)
    {
        $data = Doctor::find($id);
        $data->delete();
        Toastr::success('Doctor Successfully Delete', 'Title', ["Success" => "toast-top-right"]);
        return redirect()->route('backend.appointment.index');
    }
}
