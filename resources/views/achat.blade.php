<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <title>Formulaire et Tableau Scrollable</title>
    <style>
        .scrollable-table {
            max-height: 300px;
            overflow-y: auto;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        
        <div class="row">
            <div class="col-md-3 scrollable" style="max-height: 400px; overflow-y: auto;">
                <h3>Enregistrement des achats</h3>
                <!-- Formulaire Bootstrap -->
                <form action="{{ route('store7') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="fournisseur" class="form-label" style="font-weight:bold;">Fournisseur</label>
                        <select class="form-select" id="fournisseur" name="fournisseur">
                            
                            @foreach ($fournisseurs as $fournisseur )
                                <option value="{{ $fournisseur->denomination }}">{{$fournisseur->denomination}}</option>
                            @endforeach
                            
                            <!-- Ajoutez d'autres options de fournisseur ici -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="typeCasier" class="form-label" style="font-weight:bold;">Type Casier</label>
                        <select class="form-select" id="typeCasier" name="typeCasier" required>
                            <option value=""></option>
                            @foreach($casiers as $casier)
                                <option value="{{ $casier->type_casier }}">{{ $casier->type_casier }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="typeBouteille" class="form-label" style=" font-weight:bold;">Type Bouteille</label>
                        <select class="form-select" id="typeBouteille" name="typeBouteille">
                            <option value=""></option>
                            @foreach ($bouteilles as $bouteille)
                                <option value="{{ $bouteille->type_bouteille }}">{{$bouteille->type_bouteille}}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label" style=" font-weight:bold;">consignation initiale casier</label>
                        <input type="number" class="form-control" id="nombre" name="cic" min="0" step="1">
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label" style=" font-weight:bold;">consignation initiale bouteille</label>
                        <input type="number" class="form-control" id="nombre" name="cib" min="0" step="1">
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label" style=" font-weight:bold;">Nombre casier (retour)</label>
                        <input type="number" class="form-control" id="nombre" name="nombre_casierR" min="0" step="1">
                    </div>

                    <div class="mb-3">
                        <label for="nombre" class="form-label" style=" font-weight:bold;">Nombre bouteille (retour)</label>
                        <input type="number" class="form-control" id="nombre" name="nombre_bouteilleR" min="0" step="1">
                    </div>

                    <div class="mb-3">
                        <label for="nombre" class="form-label" style=" font-weight:bold;">Nombre casier (achat)</label>
                        <input type="number" class="form-control" id="nombre" name="nombre_casierA" min="0" step="1">
                    </div>

                    <div class="mb-3">
                        <label for="nombre" class="form-label" style=" font-weight:bold;">Nombre bouteille (achat)</label>
                        <input type="number" class="form-control" id="nombre" name="nombre_bouteilleA" min="0" step="1">
                    </div>

                    <div class="mb-3">
                        <label for="nombre" class="form-label" style=" font-weight:bold;">consignation finale casier</label>
                        <input type="number" class="form-control" id="nombre" name="cfc" min="0" step="1">
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label" style=" font-weight:bold;">consignation finale bouteille</label>
                        <input type="number" class="form-control" id="nombre" name="cfb" min="0" step="1">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Soumettre</button>
                </form>
            </div>
            <div class="col-md-9">
                <h3>Achats</h3>
                <!-- Tableau -->
                <div class="scrollable-table">
                    <table class="table">
                        <thead>
                            <tr>
                                <th colspan="13">Date d'Achat : </th>
                                
                            </tr>
                            <tr>
                                <th>Fournisseur</th>
                                <th>Type Casier</th>
                                <th>Type Bouteille</th>
                                <th>CIC</th>
                                <th>CIB</th>

                                <th>NCR</th>
                                <th>NBR</th>
                                <th>NCA</th>
                                <th>NBA</th>
                                <th>CFC</th>
                                <th>CFB</th>

                                <th>Editer</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($achats as $achat)
                        <tr>
                            <td>{{ $achat->fournisseur }}</td>
                            <td>{{ $achat->type_casier }}</td>
                            <td>{{ $achat->type_bouteille }}</td>
                            <td>{{ $achat->CIC }}</td>
                            <td>{{ $achat->CIB }}</td>
                            <td>{{ $achat->retour_achat_casier }}</td>
                            <td>{{ $achat->retour_achat_bouteille }}</td>
                            <td>{{ $achat->achat_casier }}</td>
                            <td>{{ $achat->achat_bouteille }}</td>
                            <td>{{ $achat->CFC }}</td>
                            <td>{{ $achat->CFB }}</td>
                            <td><a href="{{route('aff_update',['id'=>$achat->id])}}"><img src="{{asset('images/bic.jpg')}}" alt="" style="width:50px;"></a></td>
                            <td><a href="{{ route('delete_achat',['id'=>$achat->id])}}"><img src="{{asset('images/pb.png')}}" alt="" style="width:50px;"></a></td>

                            <!-- Ajoutez d'autres cellules de données ici -->
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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

      


    </body>

</x-app-layout>