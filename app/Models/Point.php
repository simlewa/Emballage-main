<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;
    public $timestamps = true; // Cela indique à Laravel d'utiliser les horodatages

    protected $fillable = ['points'];

}
