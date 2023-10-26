<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsigneBouteille extends Model
{
    use HasFactory;
    protected  $fillable=[
        'consignation_initial',
        'type_bouteille',
        'nombre_bouteille',
        'nom_consignant',
        'contact',
        'etat',
        'consignation_final',
    ];
}
