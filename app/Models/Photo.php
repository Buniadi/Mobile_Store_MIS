<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'company_id',
        'battery_level',
        'model',
        'photo',
        'cam_pexel',
        'fingerprint',
        'face',
        'power_type',
        'memory',
        'camera_n',
        'ram',
        'status',
    ];

    public function phone(){
        return $this->belongsTo(Phone::class);
    }
}
