<x-app-layout>
    <style>
        .card {
            border: 3px solid gray;
            border-radius: 50px;
            padding: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: darkslateblue;
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
            margin-top: 10px;
            color: white;
        }

        .card-text {
            font-size: 16px;
            color: greenyellow;
        }

        .containe {
            background-image: url('{{ asset("images/pic20.jpg") }}');
            background-size: cover;
            background-position: center;
        }
        
    </style>
    <div class="container p-2">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <a href="{{route('achat')}}" class="col">
                <div class="card">
                    <img src="{{ asset('images/achat.png') }}" class="card-img-top" alt="..." style="width:100px;">
                    <div class="card-body">
                        <h5 class="card-title">Achat</h5>
                        <p class="card-text">Les Pros, l'entreprise de référence dans la gestion optimale de casiers et de bouteilles de bière. </p>
                    </div>
                </div>
            </a>
            <a href="{{route('vente')}}" class="col">
                <div class="card">
                    <img src="{{ asset('images/mv.png') }}" class="card-img-top" alt="..." style="width:78px;">
                    <div class="card-body">
                        <h5 class="card-title">Situation finale du jour</h5>
                        <p class="card-text">Les Pros, l'entreprise de référence dans la gestion optimale de casiers et de bouteilles de bière. </p>
                    </div>
                </div>
            </a>
            <a href="{{route('consignation')}}" class="col">
                <div class="card">
                    <img src="{{ asset('images/consignation.png') }}" class="card-img-top" alt="..." style="width:100px;">
                    <div class="card-body">
                        <h5 class="card-title">Détail des consignations </h5>
                        <p class="card-text">Les Pros, l'entreprise de référence dans la gestion optimale de casiers et de bouteilles de bière. </p>
                    </div>
                </div>
            </a>
            <a href="{{route('mouvement')}}" class="col">
                <div class="card">
                    <img src="{{ asset('images/mv.png') }}" class="card-img-top" alt="..." style="width:78px;">
                    <div class="card-body">
                        <h5 class="card-title">Mouvements internes</h5>
                        <p class="card-text">Les Pros, l'entreprise de référence dans la gestion optimale de casiers et de bouteilles de bière. </p>
                    </div>
                </div>
            </a>
        </div>
    </div><br> <br>
    <footer class="foot py-5 bg-dark" >
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
              <span class="sp">A propos</span>
              <a class="nav-link active" aria-current="page" href="#">Active</a>
              <a class="nav-link" href="#">Link</a>
              <a class="nav-link" href="#">Link</a>
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </nav>
          </div>
        </div>
      </footer>  
        
      </div>
</x-app-layout>
