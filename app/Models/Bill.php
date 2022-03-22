<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    public function student()
    {
        return $this->hasOne(Admission::class,'id','admission_id');
    }
}
