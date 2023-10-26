<x-app-layout>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
        <link rel="stylesheet" href="asset/fontawesome-free-6.4.0-web/css/all.min.css">
        <title>Les PROS</title>
        <style>
        

            

             

            a{
                text-decoration: none;

            }

            .square {
                width: 150px;
                height: 150px;
                border: 2px solid #ccc;
                background-color: #f0f0f0;
                margin: 10px;
                display: inline-block;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .square:hover{
                background: blueviolet;
            }

            .custom-body {
                background: url('../images/pic20.jpg') no-repeat center center fixed;
                background-size: cover;
                background-color: black;
            }

      </style>
        
    <head>
    <body>

    <div class="container mt-5">
        <div class="row"></div>
        <div class="row"></div>
        <div class="row"></div>
        <div class="row">
        @foreach ($fournisseurs as $fournisseur)
            <div class="col-md-3">
                
                    <a href="{{ route('fournisseur.index3', ['denomination' => $fournisseur->denomination]) }}" style="color: black; font-size: 20px; font-weight: bold;" ">
                        <div class="square">{{ $fournisseur->denomination }}</div>
                    </a>
                
            </div>
        @endforeach


        

        </div>
    </div>

    </div>   
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
        
      </div>


        <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>  
    </body>

</x-app-layout>