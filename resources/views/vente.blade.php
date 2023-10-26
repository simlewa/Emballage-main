<x-app-layout>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
        <script src="{{asset('js/calculerStock.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

        <title>Les PROS</title>

       <style>
         .custom-table {
              width: 100%;
          }

          .custom-table th,
          .custom-table td {
              white-space: nowrap;
              overflow: hidden;
              text-overflow: ellipsis;
          }
          td{
            font-size: 12px;
            font-weight: bold;
          }

          th{
            font-weight: bold;
            
          }


          
          

                </style>

       <script>

        //fonction pour tester les entrées avec le masque
        function isNumeric(value) {
                return /^-?\d+(\.\d+)?$/.test(value);
            }

            //fonction de verification des entrée 

            function verificationNumerique(cell) {
              var inputValue = cell.innerText.trim();
              
              if (isNumeric(inputValue)) {
                cell.innerText = inputValue;
              } else {
                cell.innerText = "";
              }
            }
            function generatePDF() {
                  const tableToPrint = document.querySelector('table');

                  // Appliquer des styles de bordure aux cellules et aux en-têtes du tableau
                  const tableCells = tableToPrint.querySelectorAll('td, th');
                  tableCells.forEach((cell) => {
                      cell.style.border = '1px solid black'; // Vous pouvez ajuster le style de bordure selon vos préférences
                      cell.style.padding = '5px'; // Ajoutez un peu d'espace pour améliorer l'apparence
                  });

                  // Créer un élément pour le titre
                  const titleElement = document.createElement('h2');
                  titleElement.textContent = 'Situation finale';
                  titleElement.style.textAlign = 'center';

                  // Créer un élément pour l'image
                  const imageElement = document.createElement('img');
                  var imagePath = "{{ asset('images/logo.png') }}"; // Assurez-vous que le chemin est correct
                  imageElement.src = imagePath;
                  imageElement.style.width = '100px';
                  imageElement.style.display = 'block';
                  imageElement.style.marginTop = '0';

                  // Créer un conteneur div pour le titre, le tableau et l'image
                  const container = document.createElement('div');
                  container.appendChild(imageElement);
                  container.appendChild(titleElement);
                  container.appendChild(tableToPrint);

                  const newWindow = window.open('', '_blank', 'width=800,height=600,location=no,menubar=no,toolbar=no');
                  newWindow.document.open();
                  newWindow.document.write(container.outerHTML);
                  newWindow.document.close();
                  newWindow.print();
                  newWindow.close();
              }


              // Fonction pour insérer la date d'aujourd'hui au chargement de la page
                window.addEventListener('DOMContentLoaded', function() {
                  const dateCell = document.querySelector('#date-cell');
                  const currentDate2 = new Date();
                  const currentDate = new Date().toLocaleDateString();
                  const currentHour = currentDate2.getHours().toString().padStart(2, '0'); // Obtient l'heure actuelle
                  const currentMinute = currentDate2.getMinutes().toString().padStart(2, '0'); // Obtient les minutes actuelles
                      dateCell.innerText = "Date: " + currentDate + " " + currentHour + ":" + currentMinute;
                });

       </script>
    <head>
    
    <body>
        <div class="container mt-5">
            <button onclick="generatePDF()" class="btn btn-primary">Imprimer</button><br><br>
            
            <div class="row">
            
                
                
                <div class="col-md-12">
                    <!-- Tableau à côté -->
                    
                    <div class="table-responsive print-table-wrapper">
                      <table class="table table-bordered custom-table">
                        <thead>
                            <tr>
                                <th id="date-cell" rowspan="2" style="text-align: center; background: gray;"></th>
                                @foreach ($points as $point)
                                    <th colspan="3" style="text-align: center;">{{ $point->denomination }}</th>
                                @endforeach
                                <th colspan="3">Totale les Pros kara</th>
                            </tr>
                            <tr>
                                @foreach ($points as $point)
                                    <th>Stock Dispo</th>
                                    <th>Stock consign</th>
                                    <th>Total</th>
                                @endforeach
                                <th>Stock Dispo</th>
                                <th>Stock consign</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($casiers as $casier)
                                <tr>
                                    <td style="font-size: 12px;">{{ $casier->type_casier }}</td>
                                    @foreach ($points as $point)
                                        <td contenteditable="true" oninput="verificationNumerique(this)"></td>
                                        @php
                                            $donnee = $donnees->first(function ($item) use ($point, $casier) {
                                                return $item->depot == $point->denomination && $item->type_casier == $casier->type_casier;
                                            });
                                        @endphp
                                        <td contenteditable="true" oninput="verificationNumerique(this)">
                                            @if ($donnee)
                                                {{ $donnee->ntc }}
                                            @endif
                                        </td>
                                        <td contenteditable="true" pattern="[0-9]*" title="Veuillez entrer uniquement des chiffres" oninput="verificationNumerique(this)"></td>
                                    @endforeach
                                    <td contenteditable="true" pattern="[0-9]*" title="Veuillez entrer uniquement des chiffres" oninput="verificationNumerique(this)"></td>
                                    <td contenteditable="true" pattern="[0-9]*" title="Veuillez entrer uniquement des chiffres" oninput="verificationNumerique(this)"></td>
                                    <td contenteditable="true" pattern="[0-9]*" title="Veuillez entrer uniquement des chiffres" oninput="verificationNumerique(this)"></td>
                                </tr>
                            @endforeach

                            @foreach ($bouteilles as $bouteille)
                                <tr>
                                    <td style="font-size: 12px;">{{ $bouteille->type_bouteille }}</td>
                                    @foreach ($points as $point)
                                        <td contenteditable="true" title="Veuillez entrer uniquement des chiffres" oninput="verificationNumerique(this)"></td>

                                        @php
                                            $donnee2 = $donnees2->first(function ($item) use ($point, $bouteille) {
                                                return $item->depot == $point->denomination && $item->type_bouteille == $bouteille->type_bouteille;
                                            });
                                        @endphp
                                        <td contenteditable="true" oninput="verificationNumerique(this)">
                                            @if ($donnee2)
                                                {{ $donnee2->ntb }}
                                            @endif
                                        </td> 
                                        <td contenteditable="true" title="Veuillez entrer uniquement des chiffres" oninput="verificationNumerique(this)"></td>
                                    @endforeach
                                    <td contenteditable="true" class="numeric-input" oninput="verificationNumerique(this)"></td>
                                    <td contenteditable="true" title="Veuillez entrer uniquement des chiffres" oninput="verificationNumerique(this)"></td>
                                    <td contenteditable="true" title="Veuillez entrer uniquement des chiffres" oninput="verificationNumerique(this)"></td>
                                </tr>
                            @endforeach
                                                  
                              
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
        </div><br>


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