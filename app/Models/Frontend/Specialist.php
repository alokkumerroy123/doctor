<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialist extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function specialist(){
        return $this->belongsTo(Specialist::class,'specialist_id');
    }
}
