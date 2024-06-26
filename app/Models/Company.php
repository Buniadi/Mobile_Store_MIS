<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'country',
        'created_by',
    ];

    public function phones(){
        return $this->hasMany(Phone::class);
    }
}
