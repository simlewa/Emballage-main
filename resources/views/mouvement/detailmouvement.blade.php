<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>mouvements</title>
        
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    </head>
    <body style="background:blue;">
        <div class="container">
            <div class="row">
                @foreach($pointsDeVente as $pointDeVente)
                    <div class="col-md-3"> <!-- Adjust the column width as needed -->
                        <a href="{{ route('point_de_vente.index2', ['denomination' => $pointDeVente->denomination]) }}">
                            <div class="d-flex align-items-center justify-content-center bg-light rounded p-3 m-3 shadow-sm">
                                {{ $pointDeVente->nom }}
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Include Bootstrap JS (Optional) -->
        <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>  
    </body>
    </html>
</x-app-layout>
