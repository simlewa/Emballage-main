<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CreationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VueController;
use App\Http\Controllers\WorkController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Acceuil');
})->name('home');

//Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::get('login', [VueController::class, 'index2'])->name('login');
Route::get('les pros', [WorkController::class, 'acceuil2'])->name('acceuil2');
Route::get('operation', [WorkController::class, 'operation'])->name('operation');
Route::get('achat', [WorkController::class, 'achat'])->name('achat');
Route::get('vente', [WorkController::class, 'vente'])->name('vente');

Route::get('consignation', [WorkController::class, 'consign'])->name('consignation');

Route::get('mouvement', [WorkController::class, 'moov'])->name('mouvement');
Route::get('creation', [WorkController::class, 'horeca'])->name('horeca');


//Routes pour les creations
Route::get('fournisseur', [CreationController::class, 'fournisseur'])->name('fournisseur');

Route::get('responsables', [CreationController::class, 'respons'])->name('responsable');
Route::delete('responsables_delete/{personnel}', [CreationController::class, 'destroy_responsables'])->name('responsables.delete');
Route::post('responsables_update/{personnel}', [CreationController::class, 'update_responsables'])->name('responsables.update');
Route::get('responsables_edit/{personnel}', [CreationController::class, 'edit'])->name('responsables.edit');
Route::get('responsables_show/{personnel}', [CreationController::class, 'affiche_responsables'])->name('responsables.show');

Route::get('points', [CreationController::class, 'points'])->name('points');
Route::get('/point_de_vente/tableau/', [WorkController::class, 'index2'])->name('point_de_vente.index2');
Route::get('/fournisseur-tableau', [WorkController::class, 'index3'])->name('fournisseur.index3');






Route::get('boissons', [CreationController::class, 'boisson'])->name('boissons');
Route::get('case', [CreationController::class, 'casier'])->name('asier');
//Route::post('!',[RegisteredUserController::class, 'store'])->name('registerStore');;




//routes enregistrement creation

//Route::get('list', [CreationController::class, 'recup_casier'])->name('list_casiers');

//Route::get('list',[CreationController::class,'recup_casier'])->name('point');

Route::post('casiers', [CreationController::class, 'store_casier'])->name('store1');
Route::delete('casiers_delete/{casier}', [CreationController::class, 'destroy_casier'])->name('casiers.delete');

Route::post('Points', [CreationController::class, 'store_points'])->name('store2');
Route::delete('point_delete/{point}', [CreationController::class, 'destroy_point'])->name('point.delete');


Route::post('Fournisseur', [CreationController::class, 'store_fourn'])->name('store3');
Route::delete('Fournisseur_delete/{fournisseur}', [CreationController::class, 'destroy_fournisseur'])->name('fournisseur.delete');

Route::post('Bouteilles', [CreationController::class, 'store_bottle'])->name('store4');
Route::delete('Bouteilles_delete/{bouteille}', [CreationController::class, 'destroy_bouteilles'])->name('Bouteilles.delete');

Route::post('Boissons', [CreationController::class, 'store_boisson'])->name('store5'); // Nom de route différent
Route::post('Personnel', [CreationController::class, 'store_personal'])->name('store6'); // Nom de route différent



//routes Pour les achats

Route::post('achats', [WorkController::class,'store_achat'])->name('store7'); 
Route::get('Achats/{id}', [WorkController::class,'edit'])->name('aff_update'); 

Route::post('Achats', [WorkController::class, 'update'])->name('update_achat');
Route::get('Achats_suppresion/{id}', [WorkController::class, 'destroy_achat'])->name('delete_achat');











//routes pour l'enregistrement des consignations
Route::post('Consignations_c', [WorkController::class, 'store_consign_casier'])->name('scc');
Route::post('Consignations_b', [WorkController::class, 'store_consign_bout'])->name('scb');
//mis a jour des consignations

Route::get('Consignations_c/{id}', [WorkController::class, 'edit_casier'])->name('edit_scc');
Route::post('c', [WorkController::class, 'update_casier'])->name('up_scc');

Route::get('Consignations_b/{id}', [WorkController::class, 'edit_bouteille'])->name('edit_scb');
Route::post('b', [WorkController::class, 'update_bout'])->name('up_scb');


//archivage
Route::get('archive', [WorkController::class, 'achive_cons'])->name('archive');

//Route pour la sauvegarde et la recuperation des donnees depuis la base de donnee pour les operation avec fournisseur
Route::post('/save-data', [WorkController::class, 'saveData'])->name('save-data');
Route::post('/restore-data', [WorkController::class, 'restoreData'])->name('restore-data');




//Route pour la sauvegarde et la recuperation des donnees depuis la base de donnee pour les operation interne
Route::post('/save-data2', [WorkController::class, 'save_Data'])->name('savedata');
Route::post('/restore-data2', [WorkController::class, 'restore_Data'])->name('restoredata');









Route::middleware(['guest'])->group(function () {
    Route::get('/login-then-register', [App\Http\Controllers\Auth\LoginRegisterController::class, 'showRegisterAfterLogin'])
        ->name('login_then_register');
});





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
