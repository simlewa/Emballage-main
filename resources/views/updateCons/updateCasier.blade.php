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
            }
        </style>
    </head>
    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Mis à jour des consignations des casiers</div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('up_scc', ['id' => $casier_id->id]) }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="ci1" class="form-label">Consignation initiale</label>
                                    <input id="ci1" type="text" class="form-control" name="ci1" value="{{$casier_id->consignation_initial}}" autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="tc" class="form-label">Type de casier</label>
                                    <select id="tc" class="form-select" name="tc"  >
                                        @foreach ($casiers as $casier)
                                            <option value="{{$casier->type_casier}}" @if($casier->type_casier === $casier_id->type_casier) selected @endif>{{$casier->type_casier}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nc" class="form-label">Nombre Casier (CDJ)</label>
                                    <input id="nc" type="number" class="form-control" name="nc" value="{{$casier_id->nombre_casier}}" autofocus>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="representant" class="form-label">Représentant</label>
                                    <select id="representant" class="form-select" name="representant" required>
                                        @foreach ($personnels as $personnel)
                                            @php
                                                $personne = $personnel->nom . ' ' . $personnel->prenom;
                                            @endphp
                                            <option value="{{ $personne }}" @if($personne === $casier_id->nom_consignant) selected @endif >{{ $personne }}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="mb-3">
                                    <label for="depot" class="form-label">Depôt</label>
                                    <select id="depot" class="form-select" name="depot" required>
                                        @foreach ($points as $point)
                                            <option value="{{$point->denomination}}" @if($point->denomination === $casier_id->depot) selected @endif>{{$point->denomination}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="type_bouteille" class="form-label">Contact du client</label>
                                    <input id="type_bouteille" type="text" class="form-control" name="contact" value="{{$casier_id->contact}}" pattern="^[79]\d{7}$" autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="etat" class="form-label">État</label>
                                    <select id="etat" class="form-select" name="etat" required>
                                        <option value="En cours">En cours</option>
                                        <option value="Règlée">Règlée</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">{{ __('Enregistrer les modifications') }}</button>
                            </form>
                        </div>
                    </div>
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
