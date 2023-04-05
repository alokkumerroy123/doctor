<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function doctor_type(){ 
        return $this->hasMany(Type::class);
    }

    public function visiting_day(){ 
        return $this->hasMany(Visiting_day::class);
    }

    public function division(){
        return $this->belongsTo(Division::class,'division_id');
    }
    public function district(){
        return $this->belongsTo(District::class,'district_id');
    }
    public function upzila(){
        return $this->belongsTo(Upzila::class,'upzila_id');
    }
     
    public function specialist(){
        return $this->belongsTo(Specialist::class,'specialist_id');
    }

}
