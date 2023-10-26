<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <title>Personnel</title>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <h2>Modification</h2>
                <form action="{{route ('responsables.update', $personnel-> id)}}" method="post">
                  @csrf
                    <div class="form-group">
                        <label for="nom">Nom :</label>
                        <input type="text" class="form-control" id="nom" name="nom" required pattern="[A-Za-z]{3,}" title="uniquement de lettre et pas moins de 3 lettres" value="@php if (!empty($personnel)){echo $personnel->nom;} @endphp">
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom :</label>
                        <input type="text" class="form-control" id="prenom" name="prenom" required pattern="[A-Za-z]{3,}" title="uniquement de lettre et pas moins de 3 lettres" value="@php if (!empty($personnel)){echo $personnel->prenom;} @endphp">
                    </div>
                    <div class="form-group">
                        <label>Sexe :</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="homme" name="sexe" value="homme">
                            <label class="form-check-label" for="homme">Homme</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="femme" name="sexe" value="femme">
                            <label class="form-check-label" for="femme">Femme</label>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="contact">Contact :</label>
                      <input type="text" class="form-control" id="contact" name="contact" pattern="[0-9]{8}" title="Veuillez entrer exactement 8 chiffres" required value="@php if (!empty($personnel)){echo $personnel->  contact;} @endphp">
                    </div>

                    <div class="form-group">
                        <label for="adresse">Adresse :</label>
                        <input type="text" class="form-control" id="adresse" name="adresse" required placeholder="Ville-quartier" pattern="[a-zA-Z]+-[a-zA-Z]+" title="Veuillez entrer l'adresse au format <h1>ville-quartier</h1>" value="@php if (!empty($personnel)){echo $personnel->adresse;} @endphp">
                    </div><br>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
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
    </footer>
    <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>  

</body>
</html>
</x-app-layout>
