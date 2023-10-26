

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
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
                background: gray;
            }

            .custom-body {
                background: url('../images/pic20.jpg') no-repeat center center fixed;
                background-size: cover;
                background-color: black;
            }
            
        </style>
    </head>
    <body class="custom-body">
 
        <div class="container mt-5">

            <div class="row"></div>
            <div class="row"></div>

            <div class="row"></div>

            <div class="row">
                <div class="col-md-3">
                    <a href="{{route('fournisseur')}}"><div class="square">FOURNISSEURS</div></a>
                </div>
                <div class="col-md-3">
                <a href="{{route('responsable')}}"><div class="square">RESPONSABLES</div></a>

                </div>
                <div class="col-md-3">
                <a href="{{route('points')}}"><div class="square">DEPOTS</div></a>
                </div>
                <div class="col-md-3">
                    <a href="{{route('asier')}}"><div class="square">CASIERS</div></a>
                </div>
                <div class="col-md-3" >
                    <a href="{{route('boissons')}}"><div class="square">BOUTEILLES</div></a>
                </div>

            </div>
        </div>
        <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>  
    </body>
</html>

