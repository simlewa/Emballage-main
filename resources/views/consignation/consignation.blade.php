<div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ __('Consignation Initiale') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('consegnation.store') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="type_bouteille" class="form-label">{{ __('Type Bouteille') }}</label>
                                <input id="type_bouteille" type="text" class="form-control @error('type_bouteille') is-invalid @enderror" name="type_bouteille" required autofocus>

                                @error('type_bouteille')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="type_casier" class="form-label">{{ __('Type Casier') }}</label>
                                <input id="type_casier" type="text" class="form-control @error('type_casier') is-invalid @enderror" name="type_casier" required>

                                @error('type_casier')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nombre_casier_cdj" class="form-label">{{ __('Nombre Casier (CDJ)') }}</label>
                                <select id="nombre_casier_cdj" class="form-select" name="nombre_casier_cdj" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <!-- Ajoutez d'autres options de nombre de casiers ici -->
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="nombre_bouteille_cdj" class="form-label">{{ __('Nombre Bouteille (CDJ)') }}</label>
                                <select id="nombre_bouteille_cdj" class="form-select" name="nombre_bouteille_cdj" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <!-- Ajoutez d'autres options de nombre de bouteilles ici -->
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="consignation_finale" class="form-label">{{ __('Consignation Finale') }}</label>
                                <input id="consignation_finale" type="number" class="form-control @error('consignation_finale') is-invalid @enderror" name="consignation_finale" min="0" required>

                               
                            </div>
                            

                            <button type="submit" class="btn btn-primary">{{ __('Enregistrer') }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Tableau à côté -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>Type Bouteille</th>
                            <th>Type Casier</th>
                            <th>Nombre Casier (CDJ)</th>
                            <th>Nombre Bouteille (CDJ)</th>
                            <th>Consignation Finale</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Remplir le tableau avec les données entrées par l'utilisateur -->
                    </tbody>
                </table>
            </div>
        </div>