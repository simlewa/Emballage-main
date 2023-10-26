<x-app-layout>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script >

          //mise en couleur

          function mettreEnCouleur(element) {
            const valeur = parseInt(element.textContent);

            if (!isNaN(valeur)) {
                if (valeur >= 0) {
                    element.classList.remove('negatif');
                    element.classList.add('positif');
                } else {
                    element.classList.remove('positif');
                    element.classList.add('negatif');
                }
            }
          }



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


            function updateResult(row) {
                var cells = row.cells;
                var totalResult = 0;

                // Calculer la somme des valeurs des cellules
                for (var i = 1; i < cells.length - 3; i++) {
                    var pointValue = parseInt(cells[i].innerText);
                    totalResult += isNaN(pointValue) ? 0 : pointValue;
                }

                // Affecter le total calculé à la cellule avant la dernière
                row.cells[row.cells.length - 3].innerText = totalResult;

                // Calculer la différence entre le total et la valeur de la cellule précédente
                var difference = totalResult - parseInt(cells[cells.length - 2].innerText);

                // Affecter la différence à la dernière cellule
                var cellDifference = row.cells[row.cells.length - 1];
                cellDifference.innerText = difference;
            }


            function generatePDF() {


              const element = document.querySelector('table');


              // Créer un élément pour le titre
              const titleElement = document.createElement('h6');
              titleElement.textContent = 'FICHE JOURNALIERE DE GESTION DES EMBALLAGES'; // Remplacez par votre propre titre
              titleElement.style.textAlign = 'center'; // Centrer le texte
              titleElement.style.textDecoration = 'underline'; // Centrer le texte


              // Créer un élément pour l'image
              const imageElement = document.createElement('img');
              var imagePath = "{{ asset('images/logo.png') }}";
              imageElement.src = imagePath; // Chemin vers votre image
              imageElement.style.width = '150px';
              imageElement.style.display = 'block'
              imageElement.style.marginTop = '0'; // Ajustez la largeur de l'image si nécessaire




              // Créer un conteneur div pour le titre et le tableau et l'image
              const container = document.createElement('div');
              container.appendChild(imageElement);
              container.appendChild(titleElement);
              container.appendChild(element);

              const opt = {
                  margin: [50, 5, 5, 5],
                  filename: 'tableau.pdf',
                  image: { type: 'jpeg', quality: 0.98 },
                  html2canvas: { scale: 2 },
                  jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' }
              };

              html2pdf().from(container).set(opt).save();
          }

          // Fonction pour insérer la date d'aujourd'hui au chargement de la page
          window.addEventListener('DOMContentLoaded', function() {
                  const dateCell = document.querySelector('#date-cell');
                  const dateActuelle = new Date().toLocaleDateString();
                  dateCell.innerText = "Date:" + dateActuelle;
                });

          function calculerTotalDetteAvoir() {
            var rows = document.querySelectorAll('tbody tr');
            var totalReelGlobal = 0; // Variable pour stocker la somme totale

            for (var i = 0; i < rows.length; i++) {
                var row = rows[i];
                var cells = row.cells;
                // Convertir le texte des cellules en nombres ou 0 si non numérique
                var totalReel = parseInt(cells[cells.length - 2].textContent) || 0;


                // Ajouter la valeur de la cellule au total global
                totalReelGlobal += totalReel;
            }

            // Mettre à jour la cellule avec l'ID "si" avec le total global
            document.getElementById('si').innerText = totalReelGlobal;

            const urlParams = new URLSearchParams(window.location.search);
            const linkParam = urlParams.get('denomination');
            saveDataLocally(linkParam);
        }

       







        </script>
        <title>Les PROS</title>

       <style>
          td{
            font-size: 20px;
            font-weight: bold;
            text-align: center;
          }

          .positif {
            color: black;
          }
          .negatif {
              color: red;
          }

          .cls{
            margin-left:800px;
          }

          .spacer {
            margin-right: 400px; /* Ajustez cette valeur pour obtenir l'espacement souhaité */
          }


       </style>
    <head>
    
    <body>
        <div class="container mt-5">
            <button onclick="generatePDF()" class="btn btn-primary">Imprimer</button>            <button onclick="calculerTotalDetteAvoir()" class="btn btn-primary cls">Actualiser le stocke initiale</button><br><br>


            <div class="row">
            
                
                
                <div class="col-md-12">
                    <!-- Tableau à côté -->
                    <div class="table-responsive print-table-wrapper">
                        <table class="table table-bordered " id="your-table-id" >
                        <thead>
                            <tr>
                              
                              <th id="date-cell" colspan="11"></th>
                            </tr>
                            <tr>
                                @foreach ($points as $point)
                                    @if ($denominationDepot === $point->denomination)
                                        <th style="background-color: gray;">{{ $point->denomination }}</th>
                                    @endif
                                @endforeach
                                <th>stock initiale</th>
                                <th>Achat</th>
                                
                                @foreach ($points as $point)
                                    @if ($denominationDepot !== $point->denomination)
                                        <th>{{ $point->denomination }}</th>
                                    @endif
                                @endforeach
                                <th>Consign Jour </th>
                                <th>stock Fin theorique</th>
                                <th>stock Fin réel</th>
                                <th>Facturation</th>

                                
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($casiers as $casier)
                              <tr class="casier">
                                  <td style="font-size: 12px;">{{ $casier->type_casier }}</td>
                                  <td contenteditable="true" data-key="col" id="si" title="Veuillez entrer uniquement des chiffres positifs ou négatifs" oninput="updateResult(this.parentElement); verificationNumerique(this); mettreEnCouleur(this)">0</td>                        
                                  <td contenteditable="true" title="Veuillez entrer uniquement des chiffres positifs ou négatifs" oninput="updateResult(this.parentElement); verificationNumerique(this); mettreEnCouleur(this)">0</td>                        
                                                        
                                  @foreach ($points as $point )
                                    <td contenteditable="true" title="Veuillez entrer uniquement des chiffres positifs ou négatifs" oninput="updateResult(this.parentElement); verificationNumerique(this); mettreEnCouleur(this)">0</td>                        

                                  @endforeach
                                  <td contenteditable="false">0</td>                        
                                  <td contenteditable="true" oninput="updateResult(this.parentElement); verificationNumerique(this); mettreEnCouleur(this);">0</td>                        
                                  <td contenteditable="false" data-key="" oninput="mettreEnCouleur(this)"  >0</td> 
                       
                                  
                              </tr>
                            @endforeach

                            @foreach ($bouteilles as $bouteille)
                            <tr class="casier">
                                  <td style="font-size: 12px;">{{ $bouteille->type_bouteille }}</td>
                                  <td contenteditable="true" data-key="col" title="Veuillez entrer uniquement des chiffres positifs ou négatifs" oninput="updateResult(this.parentElement); verificationNumerique(this); mettreEnCouleur(this)">0</td>                        
                                  <td contenteditable="true" title="Veuillez entrer uniquement des chiffres positifs ou négatifs" oninput="updateResult(this.parentElement); verificationNumerique(this); mettreEnCouleur(this)">0</td>                        
                                                         
                                  @foreach ($points as $point )
                                    <td contenteditable="true" title="Veuillez entrer uniquement des chiffres positifs ou négatifs" oninput="updateResult(this.parentElement); verificationNumerique(this); mettreEnCouleur(this)">0</td>                        

                                  @endforeach
                                  <td contenteditable="false" >0</td>                        
                                  <td contenteditable="true" oninput="updateResult(this.parentElement); verificationNumerique(this); mettreEnCouleur(this);" >0</td>                        
                                  <td contenteditable="false" oninput="mettreEnCouleur(this)">0</td>
                        
                                  
                              </tr>
                            @endforeach
                            
                            
                            
                        </tbody>
                        <tfoot>
                          <th colspan="11" contenteditable="true">
                              <span>Nom et Signature </span>&nbsp;&nbsp;&nbsp;
                              <span>Arrivant:</span><span class="spacer"></span>
                              <span>Partant:</span>
                          </th>

                        </tfoot>
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
        </footer>

        <script>
          function saveDataToServer(key, data) {
                  const urlParams = new URLSearchParams(window.location.search);
                  const linkParam = urlParams.get('denomination');
                  
                  const xhr = new XMLHttpRequest();
                  xhr.open('POST', '/save-data2', true);
                  xhr.setRequestHeader('Content-Type', 'application/json');
                  
                  // Inclure le jeton CSRF dans l'en-tête de la requête
                  const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                  xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                  
                  xhr.onreadystatechange = function () {
                      if (xhr.readyState === 4 && xhr.status === 200) {
                          console.log('Données sauvegardées avec succès');
                      } else if (xhr.readyState === 4 && xhr.status !== 200) {
                          console.error('Erreur lors de la sauvegarde des données', xhr.statusText);
                      }
                  };
                  
                  xhr.send(JSON.stringify({
                      denomination: linkParam,
                      data: data
                  }));
              }


            


              function restoreDataFromServer(key) {
                      const urlParams = new URLSearchParams(window.location.search);
                      const linkParam = urlParams.get('denomination');

                      const xhr = new XMLHttpRequest();
                      xhr.open('POST', '/restore-data2', true);
                      xhr.setRequestHeader('Content-Type', 'application/json');

                      // Inclure le jeton CSRF dans l'en-tête de la requête
                      const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                      xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);

                      xhr.onreadystatechange = function () {
                          if (xhr.readyState === 4 && xhr.status === 200) {
                              const response = JSON.parse(xhr.responseText);
                              console.log(xhr.responseText);
                              const dataString = response.data[0]; // Obtenez la chaîne de caractères JSON à partir du tableau
                              const data = JSON.parse(dataString); 
                              console.log(data)
                              const table = document.getElementById('your-table-id'); // Remplacez 'your-table-id' par l'ID réel de votre tableau

                              data.forEach(function (row, rowIndex) {
                                  const cells = table.rows[rowIndex + 2].cells; // +1 car la première ligne contient les titres
                                  row.forEach(function (cellData, cellIndex) {
                                      cells[cellIndex+1].innerText = cellData;
                                  });
                              });
                          } else if (xhr.readyState === 4 && xhr.status !== 200) {
                              console.error('Erreur lors de la restauration des données', xhr.statusText);
                          }
                      };

                  xhr.send(JSON.stringify({
                      denomination: linkParam,
                  }));
              }


              // Écoutez les événements d'édition des cellules et sauvegardez les données au serveur
              // Écoutez les événements d'édition des cellules
                  const editableCells = document.querySelectorAll('td[contenteditable="true"]');
                  editableCells.forEach(function (cell) {
                      cell.addEventListener('input', function () {
                          const urlParams = new URLSearchParams(window.location.search);
                          const linkParam = urlParams.get('denomination');
                          
                          var data = [];
                          var rows = document.querySelectorAll('tr.casier');

                          for (var i = 0; i < rows.length; i++) {
                              var row = rows[i].querySelectorAll('td');
                              var rowData = [];
                              for (var j = 1; j < row.length; j++) {
                                  rowData.push(row[j].innerText);
                              }
                              data.push(rowData);
                          }

                          // Appelez la fonction saveDataToServer avec les données modifiées
                          saveDataToServer(linkParam, data);
                      });
                  });



            




                  // Restaurez les données depuis le serveur lors du chargement de la page
                  const urlParams = new URLSearchParams(window.location.search);
                  const linkParam = urlParams.get('denomination');
                  restoreDataFromServer(linkParam);
          </script>

          <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>  
        </body>

</x-app-layout>