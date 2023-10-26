<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsigneCasier extends Model
{
    use HasFactory;
    protected  $fillable=[
        'consignation_initial',
        'type_casier',
        'nombre_casier',
        'nom_consignant',
        'contact',
        'etat',
        'consignation_final',

    ];




}
