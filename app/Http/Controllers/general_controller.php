<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class general_controller extends Controller
{
    public function district_list($division_id){
        return $division_id;
    }
}
