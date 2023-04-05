<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    use HasFactory;
   
    protected $guarded=[];

    public function doctor(){ 
        return $this->belongsTo(Doctor::class);
    }
   
}
