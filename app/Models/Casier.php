<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casier extends Model
{
    use HasFactory;
    public $timestamps = true; // Cela indique à Laravel d'utiliser les horodatages
    protected $fillable = ['type_complet','created_at'];
}
