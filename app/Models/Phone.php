<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'battery_level',
        'model',
        'photo',
        'cam_pexel',
        'fingerprint',
        'power_type',
        'face',
        'memory',
        'camera_n',
        'ram',
        'status',
    ];
     public function company(){
        return $this->belongsTo(Company::class);
     }

     public function photos(){
        return $this->hasMany(Photo::class);
     }
}
