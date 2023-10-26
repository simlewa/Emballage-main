<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
        <link rel="stylesheet" href="{{ asset('fontawesome-free-6.4.0-web/css/all.min.css') }}">
        <title>Les PROS</title>
        <style>
            td{
                text-align: center;
                background: gray;
            }
            
            
            th{
                background: gray;
            }
        </style>
    </head>
    <body>
        <div class="container mt-5">
            <a href="{{ route('archive')}}"><button class="btn btn-primary">Actualiser les données</button><br><br></a>

            <div class="row">
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-header">Consignations des casiers</div>
                        <div class="card-body">
                            <form method="POST" action="{{route('scc')}}">
                                @csrf
                                <div class="mb-3">
                                    <label for="ci1" class="form-label">Consignation initiale</label>
                                    <input id="ci1" type="text" class="form-control" name="ci1" required autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="tc" class="form-label">Type de casier</label>
                                    <select id="tc" class="form-select" name="tc" required>
                                        @foreach ($casiers as $casier)
                                            <option value="{{$casier->type_casier}}">{{$casier->type_casier}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nc" class="form-label">Nombre Casier (CDJ)</label>
                                    <input id="nc" type="number" class="form-control" name="nc" required autofocus>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="representant" class="form-label">Représentant</label>
                                    <select id="representant" class="form-select" name="representant" required>
                                        @foreach ($personnels as $personnel)
                                            <option value="{{$personnel->id . '' . $personnel->nom . ' ' . $personnel->prenom}}">{{$personnel->id .'- '. $personnel->nom . ' ' . $personnel->prenom}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="depot" class="form-label">Depôt</label>
                                    <select id="depot" class="form-select" name="depot" required>
                                        @foreach ($points as $point)
                                            <option value="{{$point->denomination}}">{{$point->denomination}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="type_bouteille" class="form-label">Contact du client</label>
                                    <input id="type_bouteille" type="text" class="form-control" name="contact" pattern="^[79]\d{7}$" required autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="etat" class="form-label">État</label>
                                    <select id="etat" class="form-select" name="etat" required>
                                        <option value="En cours">En cours</option>
                                        <option value="Règlée">Règlée</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-10">
                    <!-- Tableau à côté -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Consignation initiale</th>
                                <th>Type Casier</th>
                                <th>Nombre Casier (CDJ)</th>
                                
                                <th>Consignation Finale</th>
                                <th>Représentant</th>
                                <th>depôt</th>
                                <th>Contact du client</th>
                                <th>État</th>
                                <th>Date</th>
                                <th>editer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cons_casiers as $cons_casier )
                            <tr>
                        
                                <td>{{$cons_casier->consignation_initial}}</td>
                                <td>{{$cons_casier->type_casier}}</td>
                                <td>{{$cons_casier->nombre_casier}}</td>
                                <td>{{$cons_casier->consignation_final}}</td>
                                <td>{{$cons_casier->nom_consignant}}</td>
                                <td>{{$cons_casier->depot}}</td>
                                <td>{{$cons_casier->contact}}</td>
                                <td>{{$cons_casier->etat}}</td>
                                <td>{{$cons_casier->updated_at}}</td>
                                <td><a href="{{ route('edit_scc',['id'=>$cons_casier->id]) }}"><img src="{{asset('images/msj.jpg')}}" alt="" style="width:50px;"></a></td>

                            
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><br>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-2">
                    <div class="card">
                        <div class="card-header">Consignations des bouteilles</div>
                        <div class="card-body">
                            <form method="POST" action="{{route('scb')}}">
                                @csrf
                                <div class="mb-3">
                                    <label for="ci2" class="form-label">Consignation initiale</label>
                                    <input id="ci2" type="text"  name="ci2" class="form-control" required autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="tb" class="form-label">Type de bouteille</label>
                                    <select id="tb" class="form-select" name="tb" required>
                                        @foreach ($bouteilles as $bouteille)
                                            <option value="{{$bouteille->type_bouteille}}">{{$bouteille->type_bouteille}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nb" class="form-label">Nombre bouteille (CDJ)</label>
                                    <input id="nb" type="number" class="form-control " name="nb" required autofocus>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="representant" class="form-label">Représentant</label>
                                    <select id="representant" class="form-select" name="representant" required>
                                        @foreach ($personnels as $personnel)
                                            <option value="{{$personnel->id .' '. $personnel->nom . ' ' . $personnel->prenom}}">{{$personnel->id .'- '. $personnel->nom . ' ' . $personnel->prenom}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="depot" class="form-label">Depôt</label>
                                    <select id="depot" class="form-select" name="depot" required>
                                        @foreach ($points as $point)
                                            <option value="{{$point->denomination}}">{{$point->denomination}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="contact" class="form-label">Contact du client</label>
                                    <input id="contact" type="text" class="form-control"  name="contact"  required>
                                </div>
                                <div class="mb-3">
                                    <label for="etat" class="form-label">État</label>
                                    <select id="etat" class="form-select" name="etat" required>
                                        <option value="En cours">En cours</option>
                                        <option value="Règlée">Règlée</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <!-- Tableau à côté -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Consignation initiale</th>
                                <th>Type Bouteille</th>
                                <th>Nombre Bouteille (CDJ)</th>
                                
                                <th>Consignation Finale</th>
                                <th>Représentant</th>
                                <th>Dépôt</th>
                                <th>Contact du client</th>

                                <th>État</th>
                                <th>Date</th>
                                <th>editer</th>

                            </tr>
                        </thead>
                        <tbody>
                            <!-- Remplir le tableau avec les données entrées par l'utilisateur -->
                            @foreach ($cons_bouts as $cons_bout )
                            <tr>
                        
                                <td>{{$cons_bout->consignation_initial}}</td>
                                <td>{{$cons_bout->type_bouteille}}</td>
                                <td>{{$cons_bout->nombre_bouteille}}</td>
                                <td>{{$cons_bout->consignation_final}}</td>
                                <td>{{$cons_bout->nom_consignant}}</td>
                                <td>{{$cons_bout->depot}}</td>
                                <td>{{$cons_bout->contact}}</td>
                                <td>{{$cons_bout->etat}}</td>
                                <td>{{$cons_bout->updated_at}}</td>
                                <td><a href="{{ route('edit_scb',['id'=>$cons_bout->id]) }}"><img src="{{asset('images/msj.jpg')}}" alt="" style="width:50px;"></a></td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><br>
        
    <footer class="foot py-5 bg-dark">
        <div class="container">
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
                        <span class="sp">À propos</span>
                        <a class="nav-link active" aria-current="page" href="#">Active</a>
                        <a class="nav-link" href="#">Link</a>
                        <a class="nav-link" href="#">Link</a>
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </nav>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
    </body>
    </html>
</x-app-layout>
