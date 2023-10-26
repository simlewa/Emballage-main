<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Bouteille;
use App\Models\Casier;
use App\Models\ConsigneArchiveBout;
use App\Models\ConsigneArchiveCasier;
use App\Models\ConsigneBouteille;
use App\Models\ConsigneCasier;
use App\Models\Fournisseur;
use App\Models\Personnel;
use App\Models\Point;
use App\Models\MouvInterne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function acceuil2()
    {
        //
        return view('Acceuil2');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function operation()
    {
        //
        return view('operation');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function achat()
    {
        //
        
            $achats=Achat::all();
            $fournisseurs=Fournisseur::all();
            $casiers=Casier::all();
            $bouteilles=Bouteille::all();
            return view('fournisseurMouvement')->with('achats',$achats)->with('fournisseurs',$fournisseurs)->with('casiers',$casiers)->with('bouteilles',$bouteilles);
        
    }

    /**
     * Display the specified resource.
     */
    public function consign()
    {
        //
        $points=Point::all();
        $casiers=Casier::all();
        $bouteilles=Bouteille::all();
        $personnels=Personnel::all();
        $cons_casiers=ConsigneCasier::all();
        $cons_bouts=ConsigneBouteille::all();

        return view('consignation')->with('points',$points)->with('casiers',$casiers)->with('bouteilles',$bouteilles)->with('personnels',$personnels)->with('cons_casiers',$cons_casiers)->with('cons_bouts',$cons_bouts);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function vente()
    {
        //
        $points=Point::all();
        $casiers=Casier::all();
        $bouteilles=Bouteille::all();

        $donnees = DB::table('consigne_casiers')
            ->select('depot', 'type_casier', DB::raw('SUM(CAST(consignation_final AS integer)) as ntc'))
            ->groupBy('depot', 'type_casier')
            ->get();

        $donnees2 = DB::table('consigne_bouteilles')
            ->select('depot', 'type_bouteille', DB::raw('SUM(CAST(consignation_final AS integer)) as ntb'))
            ->groupBy('depot', 'type_bouteille')
            ->get();
        return view('vente')->with([
            'points' => $points,
            'casiers' => $casiers,
            'bouteilles' => $bouteilles,
            'donnees2' => $donnees2,
            'donnees' => $donnees,
        ]);  
         
        }

    public function moov()
    {
        //
        $pointsDeVente = Point::all();
        return view('mouvement', compact('pointsDeVente'));
    }

    

    public function index2(Request $request)
    {
        $denomination = $request->input('denomination');
        $points=Point::all();
        $casiers=Casier::all();
        $bouteilles=Bouteille::all();
        return view('mouvement.tableau', [
            'points' => $points,
            'casiers' => $casiers,
            'bouteilles' => $bouteilles,
            'denominationDepot' => $denomination
        ]);    }



        public function index3(Request $request)
        {   $denomination = $request->input('denomination');
            $fournisseurs=Fournisseur::all();
            $casiers=Casier::all();
            $bouteilles=Bouteille::all();
            return view('mouvement.tableau1', [
                'fournisseurs' => $fournisseurs,
                'casiers' => $casiers,
                'bouteilles' => $bouteilles,
                'fournisseurDenomination' => $denomination
            ]);    }


            
          

        
    public function horeca()
    {
        //
        return view('horeca');
    }




    
    //traitement des consignations

    public function store_consign_casier(Request $request){
        $consign_initiale_casier = $request->input('ci1');
        $typeCasier = $request->input('tc');
        $nmb_casier = $request->input('nc');
        $contact = $request->input('contact');
        $representant = $request->input('representant');
        $etat = $request->input('etat');
        $depot = $request->input('depot');

        $consignation_finale= $consign_initiale_casier + $nmb_casier;


        
        // Création et sauvegarde de la consigne de casier
        $consigneCasier = new ConsigneCasier();
        $consigneCasier->consignation_initial = $consign_initiale_casier;
        $consigneCasier->type_casier = $typeCasier;
        $consigneCasier->nombre_casier = $nmb_casier;
        $consigneCasier->nom_consignant = $representant;
        $consigneCasier->contact = $contact;
        $consigneCasier->etat = $etat;
        $consigneCasier->depot = $depot;
        $consigneCasier->consignation_final = $consignation_finale;
        $consigneCasier->save();

        if ($consigneCasier) {
            // Redirection avec message de succès
            return redirect()->route('consignation')->with('success', 'Consigne de casier créée avec succès');
        } else {
            // Gestion des erreurs en cas d'échec de la sauvegarde
            return redirect()->route('consignation')->with('error', 'Erreur lors de la création de la consigne de casier');
        }
    }

    public function store_consign_bout(Request $request){

        $consign_initiale_bout = $request->input('ci2');
        $typeBout = $request->input('tb');
        $nmb_bout = $request->input('nb');
        $contact = $request->input('contact');
        $representant = $request->input('representant');
        $etat = $request->input('etat');
        $depot = $request->input('depot');


        $consignation_finale= $consign_initiale_bout + $nmb_bout;


        

        // Création et sauvegarde de la consigne de bouteille
        $consigneBout = new ConsigneBouteille();
        $consigneBout->consignation_initial = $consign_initiale_bout;
        $consigneBout->type_bouteille = $typeBout;
        $consigneBout->nombre_bouteille = $nmb_bout;
        $consigneBout->nom_consignant = $representant;
        $consigneBout->contact = $contact;
        $consigneBout->etat = $etat;
        $consigneBout->depot = $depot;

        $consigneBout->consignation_final = $consignation_finale;
        $consigneBout->save();

        if ($consigneBout) {
            // Redirection avec message de succès
            return redirect()->route('consignation')->with('success', 'Consigne de casier créée avec succès');
        } else {
            // Gestion des erreurs en cas d'échec de la sauvegarde
            return redirect()->route('consignation')->with('error', 'Erreur lors de la création de la consigne de casier');
        }
    }



    //mis ajour des consignations

    public function edit_casier($id){
        $casier_id = ConsigneCasier::findOrFail($id);
        $casiers=Casier::all();
        $bouteilles=Bouteille::all();
        $personnels=Personnel::all();
        $points=Point::all();

        $cons_casiers=ConsigneCasier::all();

        return view('updateCons.updateCasier', compact('points','casier_id','personnels','cons_casiers', 'bouteilles', 'casiers'));


    }


    public function edit_bouteille($id){
        $bouteille_id = ConsigneBouteille::findOrFail($id);
        $casiers=Casier::all();
        $bouteilles=Bouteille::all();
        $personnels=Personnel::all();
        $points=Point::all();

        $cons_bouteille=ConsigneBouteille::all();

        return view('updateCons.updateBout', compact('points','bouteille_id','personnels','cons_bouteille', 'bouteilles', 'casiers'));


    }

    public function update_casier(Request $request){
        $cons_casiers = ConsigneCasier::findOrFail($request->id);

        $cons_casiers->consignation_initial = $request->input('ci1');
        $cons_casiers->type_casier = $request->input('tc');
        $cons_casiers->nombre_casier = $request->input('nc');
        $cons_casiers->nom_consignant = $request->input('representant');
        $cons_casiers->contact = $request->input('contact');
        $cons_casiers->etat = $request->input('etat');
        $cons_casiers->depot = $request->input('depot');

        $consignation_finale= $cons_casiers->consignation_initial + $cons_casiers->nombre_casier;
        $cons_casiers->consignation_final = $consignation_finale;


        $cons_casiers->update(); // Sauvegardez les modifications

        return redirect()->back()->with('success', 'mis à jour réussi.');
    }

    


    public function update_bout(Request $request){
        $cons_bouts = ConsigneBouteille::findOrFail($request->id);

        $cons_bouts->consignation_initial = $request->input('ci2');
        $cons_bouts->type_bouteille = $request->input('tb');
        $cons_bouts->nombre_bouteille = $request->input('nb');
        $cons_bouts->nom_consignant = $request->input('representant');
        $cons_bouts->contact = $request->input('contact');
        $cons_bouts->etat = $request->input('etat');
        $cons_bouts->depot = $request->input('depot');

        $consignation_finale= $cons_bouts->consignation_initial + $cons_bouts->nombre_bouteille;
        $cons_bouts->consignation_final = $consignation_finale;


        $cons_bouts->update(); // Sauvegardez les modifications

        return redirect()->back()->with('success', 'mis à jour réussi.');
    }

    //methode pour l'archivage des consignes
    public function achive_cons()
{
    // Récupérez les données de la première table en fonction de votre condition
    $donneesPremiereTable = ConsigneCasier::where('etat', '=', 'Règlée')->get();

    // Récupérez les données de la deuxième table en fonction de votre condition
    $donneesDeuxiemeTable = ConsigneBouteille::where('etat', '=', 'Règlée')->get();

    // Parcourez les données de la première table et insérez-les dans la table d'archives
    foreach ($donneesPremiereTable as $donnees) {
        $achiveCasier = new ConsigneArchiveCasier();
        $achiveCasier->consignation_initial = $donnees->consignation_initial;
        $achiveCasier->type_casier = $donnees->type_casier;
        $achiveCasier->nombre_casier = $donnees->nombre_casier;
        $achiveCasier->nom_consignant = $donnees->nom_consignant;
        $achiveCasier->depot = $donnees->depot;
        $achiveCasier->contact = $donnees->contact;
        $achiveCasier->etat = $donnees->etat;
        $achiveCasier->consignation_final = $donnees->consignation_final;
        $achiveCasier->updated_at = $donnees->updated_at;
        $achiveCasier->save();
    }

    // Parcourez les données de la deuxième table et insérez-les dans la table d'archives
    foreach ($donneesDeuxiemeTable as $donnees) {
        $achiveBout = new ConsigneArchiveBout();
        $achiveBout->consignation_initial = $donnees->consignation_initial;
        $achiveBout->type_bouteille = $donnees->type_bouteille;
        $achiveBout->nombre_bouteille = $donnees->nombre_bouteille;
        $achiveBout->nom_consignant = $donnees->nom_consignant;
        $achiveBout->depot = $donnees->depot;
        $achiveBout->contact = $donnees->contact;
        $achiveBout->etat = $donnees->etat;
        $achiveBout->consignation_final = $donnees->consignation_final;
        $achiveBout->updated_at = $donnees->updated_at;
        $achiveBout->save();
    }

    // Supprimez les données de la première table en fonction de votre condition
    ConsigneCasier::where('etat', '=', 'Règlée')->delete();

    // Supprimez les données de la deuxième table en fonction de votre condition
    ConsigneBouteille::where('etat', '=', 'Règlée')->delete();

    // Redirigez l'utilisateur vers une autre page après le traitement
    $donneesDeuxiemeTable= ConsigneArchiveBout::all();
    $donneesPremiereTable=ConsigneArchiveCasier::all();
    return view('ArchiveConsign', [
        'donneesPremiereTable' => $donneesPremiereTable,
        'donneesDeuxiemeTable' => $donneesDeuxiemeTable,
    ]);
}



    //fonction pour la sauvegarde et la recuperation des donnees depuis le base de donnee pour les operation avec les fournisseur

    public function saveData(Request $request)
    {
        $denomination = $request->input('denomination');
        $data = $request->input('data');

        // Enregistrez les données dans la base de données
        Achat::updateOrCreate(
            ['denomination' => $denomination],
            ['data' => json_encode($data)]
        );

        return response()->json(['message' => 'Données sauvegardées avec succès']);
    }

    public function restoreData(Request $request)
    {
        $denomination = $request->input('denomination');

        $denomination = $request->input('denomination');

        // Récupérez les données de la base de données en fonction de 'denomination'
        $data = Achat::where('denomination', $denomination)->pluck('data')->toArray();

        // Retournez les données au format JSON
        return response()->json(['data' => $data]);

    }



        //fonction pour la sauvegarde et la recuperation des donnees depuis le base de donnee pour les operation interne

        public function save_Data(Request $request)
        {
            $denomination = $request->input('denomination');
            $data = $request->input('data');
    
            // Enregistrez les données dans la base de données
            MouvInterne::updateOrCreate(
                ['denomination' => $denomination],
                ['data' => json_encode($data)]
            );
    
            return response()->json(['message' => 'Données sauvegardées avec succès']);
        }
    
        public function restore_Data(Request $request)
        {
            $denomination = $request->input('denomination');
    
            $denomination = $request->input('denomination');
    
            // Récupérez les données de la base de données en fonction de 'denomination'
            $data = MouvInterne::where('denomination', $denomination)->pluck('data')->toArray();
    
            // Retournez les données au format JSON
            return response()->json(['data' => $data]);
    
        }


}




    

