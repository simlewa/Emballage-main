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
                text-align: center;

            }
        </style>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                
                <div class="col-md-12">
                    <h3 style="text-align: center;text-decoration:underline">Archive des consignations casier</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Consignation initiale</th>
                                <th>Type Casier</th>
                                <th>Nombre Casier </th>
                                
                                <th>Consignation Finale</th>
                                <th>Représentant</th>
                                <th>depôt</th>
                                <th>Contact du client</th>
                                <th>État</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($donneesPremiereTable as $cc )
                            <tr>
                        
                                <td>{{$cc->consignation_initial}}</td>
                                <td>{{$cc->type_casier}}</td>
                                <td>{{$cc->nombre_casier}}</td>
                                <td>{{$cc->consignation_final}}</td>
                                <td>{{$cc->nom_consignant}}</td>
                                <td>{{$cc->depot}}</td>
                                <td>{{$cc->contact}}</td>
                                <td>{{$cc->etat}}</td>
                                <td>{{$cc->updated_at}}</td>
                            
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div><br>
        <div class="container mt-5">
            <div class="row">
                
                        
                <div class="col-md-12">
                    <!-- Tableau à côté -->
                    <h3 style="text-align: center; text-decoration:underline">Archive des consignations bouteille</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Consignation initiale</th>
                                <th>Type Bouteille</th>
                                <th>Nombre Bouteille </th>
                                
                                <th>Consignation Finale</th>
                                <th>Représentant</th>
                                <th>Dépôt</th>
                                <th>Contact du client</th>

                                <th>État</th>
                                <th>Date</th>
                                

                            </tr>
                        </thead>
                        <tbody>
                            <!-- Remplir le tableau avec les données entrées par l'utilisateur -->
                            @foreach ($donneesDeuxiemeTable as $bb )
                            <tr>
                        
                                <td>{{$bb->consignation_initial}}</td>
                                <td>{{$bb->type_bouteille}}</td>
                                <td>{{$bb->nombre_bouteille}}</td>
                                <td>{{$bb->consignation_final}}</td>
                                <td>{{$bb->nom_consignant}}</td>
                                <td>{{$bb->depot}}</td>
                                <td>{{$bb->contact}}</td>
                                <td>{{$bb->etat}}</td>
                                <td>{{$bb->updated_at}}</td>
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
