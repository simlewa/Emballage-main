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
            <form action="{{ route('store1') }}" method="post">
                @csrf   
                
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Type</label>
                    <input type="text" class="form-control" id="exampleInputName" name="type">
                </div>
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">sociéte</label>
                    <input type="text" class="form-control" id="exampleInputName" name="societe">
                </div>
                
                <a href="{{route('store1')}}"><button type="submit" class="btn btn-primary">Soumettre</button></a>
            </form>
        </div>
        
    
    <div class="col-md-8">
    <h3>Liste des casiers</h3>
    <div style="max-height: 400px; overflow-y: scroll;">
        @if($casiers->isEmpty())
            <p>Aucun casier trouvé.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Identifiant</th>
                        <th scope="col">Type de casier</th>
                        <th scope="col">Date de création</th>
                        <th scope="col">Éditer</th>
                        <th scope="col">Supprimer</th>
                        <!-- Ajoutez d'autres en-têtes de colonne ici -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($casiers as $casier)
                        <tr>
                            <td>{{ $casier->id }}</td>
                            <td>{{ $casier->type_casier }}</td>
                            <td>{{ $casier->created_at }}</td>
                            <td><a href="#"><img src="{{asset('images/bic.jpg')}}" alt="" style="width:50px;"></a></td>
                            <td>
                              <form action="{{route('casiers.delete',$casier->id)}}"  method="post">
                                  @csrf
                                  @method("DELETE")
                                  <button  id="bx" type="submit"><img src="{{asset('images/pb.png')}}" alt="" style="width:50px;"></button>
                              </form> 
                            </td>
                            <!-- Ajoutez d'autres cellules de données ici -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>


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
