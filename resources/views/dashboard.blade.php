<x-app-layout>
    
    <div style="position: relative; height: 100vh; overflow: hidden;">
        @hasrole("admin")
            <a href="{{route('register')}}">
                <button  class="btn btn-primary">Creer utilisateur</button>
            </a>        
        @endhasrole
        <section class="carroussel bg-dark text-center text-light py-0" style="height: 100%; width: 100%;">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" style="height: 100%;">
                <div class="carousel-inner" style="height: 100%;">
                    <div class="carousel-item active" style="height: 100%;">
                        <img src="{{ asset('images/pic21.jpg') }}" class="d-block w-100 h-100 object-cover" alt="...">
                        <div class="carousel-caption">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="bg-green p-4 " style="background-color: rgba(0, 0, 255, 0.5);">
                                        <a href="{{route('operation')}}" style="color:white; font-weight:bold;font-size:32px;border-radius:30%;">Opérations</a><br>
                                    </div>
                                    <div class="bg-green p-4 square " style="background-color: rgba(0, 0, 255, 0.5); width= 50%;">
                                        <a href="{{route('horeca')}}" style="color:white; font-weight:bold;font-size:32px;">Créer Fournisseurs-Depots-Responsables-Boissons-casiers-Bouteilles</a>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="height: 100%;">
                        <img src="{{ asset('images/pic20.jpg') }}" class="d-block w-100 h-100 object-cover" alt="...">
                        <div class="carousel-caption">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="bg-green p-4 " style="background-color: rgba(0, 0, 255, 0.5);">
                                        <a href="{{route('operation')}}" style="color:white; font-weight:bold;font-size:32px;">Opérations</a>
                                    </div>
                                    <div class="bg-green p-4 " style="background-color: rgba(0, 0, 255, 0.5);">
                                        <a href="{{route('horeca')}}" style="color:white; font-weight:bold;font-size:32px;">Créer Fournisseurs-Depots-Responsables-Boissons-casiers-Bouteilles</a>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="height: 100%;">
                        <img src="{{ asset('images/pic23.jpg') }}" class="d-block w-100 h-100 object-cover" alt="...">
                        <div class="carousel-caption">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="bg-green p-4 " style="background-color: rgba(0, 0, 255, 0.5);"> 
                                        <a href="{{route('operation')}}" style="color:white; font-weight:bold;font-size:32px;">Opérations</a>
                                    </div>
                                    <div class="bg-green p-4  " style="background-color: rgba(0, 0, 255, 0.5);">
                                        <a href="{{route('horeca')}}" style="color:white; font-weight:bold;font-size:32px;">Créer Fournisseurs-Depots-Responsables-Boissons-casiers-Bouteilles</a>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="height: 100%;">
                        <img src="{{ asset('images/pic24.jpg') }}" class="d-block w-100 h-100 object-cover" alt="...">
                        <div class="carousel-caption">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="bg-green p-4 " style="background-color: rgba(0, 0, 255, 0.5);">
                                        <a href="{{route('operation')}}" style="color:white; font-weight:bold;font-size:32px;">Opérations</a>
                                    </div>
                                    <div class="bg-green p-4  " style="background-color: rgba(0, 0, 255, 0.5);">
                                        <a href="{{route('horeca')}}" style="color:white; font-weight:bold;font-size:32px;">Créer Fournisseurs-Depots-Responsables-Boissons-casiers-Bouteilles</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            
        </section>
        
        
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
</footer>    
      </div>

</x-app-layout>
