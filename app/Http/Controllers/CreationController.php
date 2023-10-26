<?php

namespace App\Http\Controllers;

use App\Models\Point;
use App\Models\Casier;
use App\Models\Fournisseur;
use App\Models\Bouteille;
use App\Models\Boisson;
use App\Models\Personnel;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class CreationController extends Controller
{
    //

    public function fournisseur()
    {
        //
        $donnees=Fournisseur::all();
        return view('CreationVue.fournisseur')->with('donnees',$donnees);
    }
    public function respons()
    {
        //
        $donnees=Personnel::all();
        return view('CreationVue.responsable')->with('donnees',$donnees);    }
    public function points()
    {
        //
        $donnees=Point::all();
        return view('CreationVue.point')->with('donnees',$donnees);
        
    }
    public function casier()
    {
        //
        $casiers=Casier::all();
        return view('CreationVue.casier')->with('casiers',$casiers);
    }
    public function boisson()
    {
        //
        $boissons=Boisson::all();
        $bouteilles=Bouteille::all();
        return view('CreationVue.boisson')->with('boissons', $boissons)->with('bouteilles', $bouteilles);
    }

    public function store_casier( Request $request){
            $type = $request->input('type');
            $societe = $request->input('societe');
        
            $typeComplet = $type . '-' . $societe;

            $casier = new Casier();
            $casier->type_casier = $typeComplet;
            $casier->save();

            

            return redirect()->route('asier');
    }


    public function store_bottle( Request $request){
        $type = $request->input('bouteille');
        $societe = $request->input('societe');
        
        $typeComplet = $type . '-' . $societe;

        $bouteille = new Bouteille();
        $bouteille->type_bouteille = $typeComplet;
        $bouteille->save();

        

        return redirect()->back()->with('success', 'Enregistrement réussi.');
    }


    public function store_personal( Request $request){
        $nom = $request->input('nom');
        $prenom = $request->input('prenom');
        $sexe = $request->input('sexe');
        $contact = $request->input('contact');
        $adresse = $request->input('adresse');
        

        $personnel = new Personnel();
        $personnel->nom = $nom;
        $personnel->prenom = $prenom;
        $personnel->contact = $contact;
        $personnel->sexe = $sexe;
        $personnel->adresse = $adresse;
        $personnel->save();

        

        return redirect()->back()->with('success', 'Enregistrement réussi.');
    }


    public function store_boisson( Request $request){
        $type = $request->input('boisson');
        

        $boisson = new Boisson();
        $boisson->libelle = $type;
        $boisson->save();

        

        return redirect()->back()->with('success', 'Enregistrement réussi.');
    }




    function recup_casier(){
        
        }

    public function store_points(Request $request){
            $deno = $request->input('points');
            
        

            $point = new Point();
            $point->denomination = $deno;
            $point->save();

            

            return redirect()->back()->with('success', 'Enregistrement réussi.');
    }

    public function store_fourn(Request $request){
        $request->validate([
            'nom' => 'required|unique:fournisseurs,denomination', // Assurez-vous que le champ 'nom' est unique dans la table 'fournisseurs'
            // Autres règles de validation pour d'autres champs
        ]);
    
        // Si la validation réussit, ajoutez le fournisseur
        $nom = $request->input('nom');
        $fournisseur = new Fournisseur();
        $fournisseur->denomination = $nom;
        $fournisseur->save();
    
        return redirect()->back()->with('success', 'Enregistrement réussi.');
    }
    



    public function destroy_casier(Casier $casier)
    {
        $casier->delete();
        return redirect()->route('asier');

    }
    public function destroy_fournisseur(Fournisseur $fournisseur)
    {
        $fournisseur->delete();
        return redirect()->route('fournisseur');    
    }
    public function  destroy_bouteilles(Bouteille $bouteille)
    {

        $bouteille->delete();
        return redirect()->route('boissons'); 
    }

    public function  destroy_point(Point $point)
    {

        $point->delete();
        return redirect()->route('points'); 
    }

    public function  destroy_responsables(Personnel $personnel)
    {

        $personnel->delete();
        return redirect()->route('responsable'); 
    }


    public function edit(Personnel $personnel)
    {
        //
        return view('CreationVue.editPersonnel',compact('personnel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_responsables(Request $request, Personnel $personnel): RedirectResponse

    {
        $personnel->update($request->all());
        return redirect()->route('responsable');

    }
    
    
}