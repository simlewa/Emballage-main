<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MouvInterne extends Model
{
    use HasFactory;

    protected $fillable = [
        'denomination',
        'data',
        
    ]
    ;
}
