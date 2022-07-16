<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staffs extends Model
{
    public function branch(){
        return $this->hasOne(Branch::class,'id','branch_id');
    }
    use HasFactory;
}
