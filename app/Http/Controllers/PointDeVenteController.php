<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Illuminate\Http\Request;

class PointDeVenteController extends Controller
{
    //

    public function donnees_points()
    {
        // Récupérer les données de votre modèle (ajustez selon vos besoins)
        $donnees = Point::select('id', 'denomination', 'created_at')->get();

        // Passer les données à la vue en utilisant la fonction compact
        return view('CreationVue.point', compact('donnees'));
    }
}
