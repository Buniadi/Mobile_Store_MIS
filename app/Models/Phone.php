<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

     public function company(){
        return $this->belongsTo(Company::class);
     }

     public function photos(){
        return $this->hasMany(Photo::class);
     }
}
