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

<div class="container p-5">
    <div class="row">
        <!-- Colonne du formulaire à gauche -->
        <div class="col-md-4">
            <h4>Création de bouteilles</h4>
            <form action="{{route('store4')}}" method="post">
               @csrf
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="exampleInputName" name="bouteille">
                </div>
                <div class="mb-3">
                    <label for="exampleInputSoc" class="form-label">Société</label>
                    <input type="text" class="form-control" id="exampleInputSoc" name="societe">
                </div>
                <!-- Ajoutez d'autres champs ici -->
                <button type="submit" class="btn btn-primary">Soumettre</button>
            </form>
        </div>
        <!-- Colonne du tableau scrollable à droite -->
        <div class="col-md-8">
            <h4>Liste de bouteilles</h4>
            <div style="max-height: 400px; overflow-y: scroll;">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Identifiant</th>
                            <th scope="col">Type de bouteille</th>
                            <th scope="col">date de création</th>
                            <th scope="col">éditer</th>
                            <th scope="col">supprimer</th>
                            <!-- Ajoutez d'autres en-têtes de colonne ici -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bouteilles as $bouteille)
                        <tr>
                            <td>{{$bouteille->id}}</td>
                            <td>{{$bouteille->type_bouteille}}</td>
                            <td>{{$bouteille->created_at}}</td>
                            <td><a href="#"><img src="{{asset('images/bic.jpg')}}" alt="" style="width:50px;"></a></td>
                            
                            <td>
                              <form action="{{route('Bouteilles.delete',$bouteille->id)}}"  method="post">
                                  @csrf
                                  @method("DELETE")
                                  <button  id="bx" type="submit"><img src="{{asset('images/pb.png')}}" alt="" style="width:50px;"></button>
                              </form>                         
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!--div class="container p-5">
    <div class="row">
        <!-- Colonne du formulaire à gauche -->
        <!--div class="col-md-4">
            <h4>Creation de boisson</h4>
            <form action="{{ route('store5') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="exampleInputName" name="boisson">
                </div>
                <!-- Ajoutez d'autres champs ici -->
                <!--button type="submit" class="btn btn-primary">Soumettre</button>
            </form>
        </div-->
        <!-- Colonne du tableau scrollable à droite -->
        <!--div class="col-md-8">
            <h4>Liste de boissons</h4>
            <div style="max-height: 400px; overflow-y: scroll;">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Identifiant</th>
                            <th scope="col">Nom de boisson</th>
                            <th scope="col">date de création</th>
                            <th scope="col">éditer</th>
                            <th scope="col">supprimer</th>
                            <!-- Ajoutez d'autres en-têtes de colonne ici -->
                        <!--/tr-->
                    <!--/thead-->
                    <!--tbody>
                        @foreach($boissons as $boisson)
                        <tr>
                            <td>{{$boisson->id}}</td>
                            <td>{{$boisson->libelle}}</td>
                            <td>{{$boisson->created_at}}</td>
                            <td><a href="#"><img src="{{asset('images/bic.jpg')}}" alt="" style="width:50px;"></a></td>
                            <td><a href="#"><img src="{{asset('images/pb.png')}}" alt="" style="width:50px;"></a></td>

                            
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
          
        </div-->
    </footer>
<script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>  

</body>
</html>
</x-app-layout>
