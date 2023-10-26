<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

</head>
<body>
<div class="col-md-6" style="margin: auto;">
                <h3>Mis à jour des achats</h3>
                <!-- Formulaire Bootstrap -->
                <form action="{{route('update_achat', ['id' => $achats->id])}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="fournisseur" class="form-label" style="font-weight:bold;">Fournisseur</label>
                        <select class="form-select" id="fournisseur" name="fournisseur">
                            @foreach($fournisseurs as $fournisseur)
                                <option value="{{ $fournisseur->denomination }}">{{ $fournisseur->denomination }}</option>
                            @endforeach                            
                            
                            <!-- Ajoutez d'autres options de fournisseur ici -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="typeCasier" class="form-label" style="font-weight:bold;">Type Casier</label>
                        <select class="form-select" id="typeCasier" name="typeCasier" required>
                            @foreach($casiers as $casier)
                                <option value="{{ $casier->type_casier }}">{{ $casier->type_casier }}</option>
                            @endforeach
                           
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="typeBouteille" class="form-label" style=" font-weight:bold;">Type Bouteille</label>
                        <select class="form-select" id="typeBouteille" name="typeBouteille">
                            @foreach ($bouteilles as $bouteille)
                                <option value="{{ $bouteille->type_bouteille }}">{{$bouteille->type_bouteille}}</option>

                            @endforeach
                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label" style=" font-weight:bold;">consignation initiale casier</label>
                        <input type="number" class="form-control" id="nombre" name="cic" min="0" step="1" value="{{ $achats->CIC }}">
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label" style=" font-weight:bold;">consignation initiale bouteille</label>
                        <input type="number" class="form-control" id="nombre" name="cib" min="0" step="1" value="{{ $achats->CIB }}">
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label" style=" font-weight:bold;">Nombre casier (retour)</label>
                        <input type="number" class="form-control" id="nombre" name="nombre_casierR" min="0" step="1" value="{{ $achats->retour_achat_casier }}">
                    </div>

                    <div class="mb-3">
                        <label for="nombre" class="form-label" style=" font-weight:bold;">Nombre bouteille (retour)</label>
                        <input type="number" class="form-control" id="nombre" name="nombre_bouteilleR" min="0" step="1" value="{{$achats->retour_achat_bouteille}}">
                    </div>

                    <div class="mb-3">
                        <label for="nombre" class="form-label" style=" font-weight:bold;">Nombre casier (achat)</label>
                        <input type="number" class="form-control" id="nombre" name="nombre_casierA" min="0" step="1" value="{{$achats->achat_casier}}">
                    </div>

                    <div class="mb-3">
                        <label for="nombre" class="form-label" style=" font-weight:bold;">Nombre bouteille (achat)</label>
                        <input type="number" class="form-control" id="nombre" name="nombre_bouteilleA" min="0" step="1" value="{{$achats->achat_bouteille}}">
                    </div>

                    <div class="mb-3">
                        <label for="nombre" class="form-label" style=" font-weight:bold;">consignation finale casier</label>
                        <input type="number" class="form-control" id="nombre" name="cfc" min="0" step="1" value="{{$achats->CFC}}">
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label" style=" font-weight:bold;">consignation finale bouteille</label>
                        <input type="number" class="form-control" id="nombre" name="cfb" min="0" step="1" value="{{$achats->CFB}}">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Enregistrer les modifiactions</button>
                </form>
            </div><br>

            <footer class="foot py-5 bg-dark" >
                <div class="container ">
                <div class="row">
                    <div class="col-3">
                    <nav class="nav flex-column">
                        <span class="sp">Le Bar</span>
                        <a class="nav-link active" aria-current="page" href="#">Active</a>
                        <a class="nav-link" href="#">Link</a>
                        <a class="nav-link" href="#">Link</a>
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </nav>
                    </div>
                    <div class="col-3">
                    <nav class="nav flex-column">
                        <span class="sp">Nos partenaires</span>
                        <a class="nav-link active" aria-current="page" href="#">Active</a>
                        <a class="nav-link" href="#">Link</a>
                        <a class="nav-link" href="#">Link</a>
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </nav>
                    </div>
                    <div class="col-3">
                    <nav class="nav flex-column">
                        <span class="sp">Liens utiles</span>
                        <a class="nav-link active" aria-current="page" href="#">Active</a>
                        <a class="nav-link" href="#">Link</a>
                        <a class="nav-link" href="#">Link</a>
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </nav>
                    </div>
                    <div class="col-3">
                    <nav class="nav flex-column">
                        <span class="sp">A propos</span>
                        <a class="nav-link active" aria-current="page" href="#">Active</a>
                        <a class="nav-link" href="#">Link</a>
                        <a class="nav-link" href="#">Link</a>
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </nav>
                    </div>
                </div>
                
                </div>
        <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>  

</body>
</html>
</x-app-layout>