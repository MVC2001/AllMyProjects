<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fuels extends Model
{
    use HasFactory;
       protected $fillable = [
        'tank_number',
        'category',
        'volumeLevel',
        'description'
    ];
}