<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire et Tableau</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
</head>
<body>

<div class="container">
    <div class="row">
        <!-- Colonne du formulaire à gauche -->
        <div class="col-md-4">
            <h3>Création</h3>
            <form action="{{ route('store3') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="exampleInputName" name="nom" inputmode="latin" style="text-transform: uppercase;">
                </div>
                <!-- Ajoutez d'autres champs ici -->
                <button type="submit" class="btn btn-primary">Soumettre</button>
            </form>
        </div>
        @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Colonne du tableau scrollable à droite -->
        <div class="col-md-8">
            <h3>Liste des fournisseurs</h3>
            <div style="max-height: 400px; overflow-y: scroll;">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Identifiant</th>
                            <th scope="col">Dénomination</th>
                            <th scope="col">date de création</th>
                            <th scope="col">éditer</th>
                            <th scope="col">supprimer</th>


                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($donnees as $donnee)
                        <tr>
                            <td>{{$donnee->id}}</td>
                            <td>{{$donnee->denomination}}</td>
                            <td>{{$donnee->created_at}}</td>
                            <td><a href="#"><img src="{{asset('images/bic.jpg')}}" alt="" style="width:50px;"></a></td>
                            
                            <td>
                              <form action="{{route('fournisseur.delete',$donnee->id)}}"  method="post">
                                  @csrf
                                  @method("DELETE")
                                  <button  id="bx" type="submit"><img src="{{asset('images/pb.png')}}" alt="" style="width:50px;"></button>
                              </form> 
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
