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

    <script>

        //fonction pour tester les entrées avec le masque
        function isNumeric(value) {
            return /^-?\d+(\.\d+)?$/.test(value);
        }

        //fonction de vérification des entrées 
        function verificationNumerique(cell) {
            var inputValue = cell.innerText.trim();

            if (isNumeric(inputValue)) {
                cell.innerText = inputValue;
            } else {
                cell.innerText = "";
            }
        }

        // Fonction pour calculer la somme et mettre à jour "Consignation finale"
        function updateResult(row) {
            var cells = row.cells;
            var totalResult = 0;

            // Calculer la somme des valeurs des cellules
            for (var i = 1; i < cells.length - 5; i++) {
                var pointValue = parseInt(cells[i].innerText) || 0; // Utilisez parseInt avec une valeur par défaut
                totalResult += pointValue;
            }

            // Affecter le total calculé à la cellule "Consignation finale"
            row.cells[row.cells.length - 5].textContent = totalResult;

            
        }
        

        // Fonction pour enregistrer la valeur d'une cellule dans le stockage local
        function saveCellValue(cell) {
            const cellId = cell.getAttribute('data-key');
            const cellValue = cell.innerText;
            localStorage.setItem(cellId, cellValue);
        }

        // Fonction pour charger les valeurs des cellules de consignation initiale à partir du stockage local
        function loadCellValues() {
            const consignationCells = document.querySelectorAll('[data-key^="consg_initiale_"]');
            



            consignationCells.forEach(function (cell) {
                const cellId = cell.getAttribute('data-key');
                const storedValue = localStorage.getItem(cellId);
                if (storedValue !== null) {
                    cell.innerText = storedValue;
                }
            });

            
            
        }



        //fonction de verification de dette ou avoir
        function achatRet(row) {
            var cells = row.cells;
            var nombre1 = parseInt(row.cells[row.cells.length - 7].textContent) || 0; // Valeur par défaut de 0 si non numérique
            var nombre2 = parseInt(row.cells[row.cells.length - 6].textContent) || 0; // Valeur par défaut de 0 si non numérique
            var diff = nombre1 + nombre2;

            if (diff > 0) {
                row.cells[row.cells.length - 3].innerText = diff;
                row.cells[row.cells.length - 4].innerText = 0;
                saveDataLocally();
                
            } else if (diff < 0) {
                row.cells[row.cells.length - 3].innerText = 0;
                row.cells[row.cells.length - 4].innerText = diff;
                saveDataLocally();
            } else {
                row.cells[row.cells.length - 3].innerText = 0;
                row.cells[row.cells.length - 4].innerText = 0;
                saveDataLocally();
            }


           
        }



        function calculerTotalDetteAvoir() {
            var rows = document.querySelectorAll('tbody tr');

            for (var i = 0; i < rows.length; i++) {
                var row = rows[i];
                var cells = row.cells;

                // Convertir le texte des cellules en nombres ou 0 si non numérique
                var totaldette = parseInt(cells[cells.length - 1].textContent) || 0;
                var totalavoir = parseInt(cells[cells.length - 2].textContent) || 0;
                var dette = parseInt(cells[cells.length - 3].textContent) || 0;
                var avoir = parseInt(cells[cells.length - 4].textContent) || 0;

                var cal1 = totalavoir + avoir;
                var cal2 = totaldette + dette;

                

                // Condition pour mettre à jour les cellules totalavoir et totaldette
                if ((totalavoir == 0 && totaldette == 0)) {
                    cells[cells.length - 2].textContent = cal1;
                    cells[cells.length - 1].textContent = cal2;
                } else if (totalavoir == 0 && totaldette > 0) {
                    if (avoir != 0) {
                        var cal4 = totaldette + avoir;

                        if (cal4 < 0) {
                            cells[cells.length - 2].textContent = cal4;
                            cells[cells.length - 1].textContent = 0;
                        } else {
                            cells[cells.length - 1].textContent = cal4;
                        }
                    }
                } else if (totalavoir < 0 && totaldette == 0) {
                    if (dette != 0) {
                        var cal3 = totalavoir + dette;

                        if (cal3 > 0) {
                            cells[cells.length - 2].textContent = 0;
                            cells[cells.length - 1].textContent = cal3;
                        } else {
                            cells[cells.length - 2].textContent = cal3;
                        }
                    }
                } else {
                    var cal3 = totalavoir + dette;
                    var cal4 = totaldette + avoir;


                    if (cal3 <= 0) {
                        cells[cells.length - 2].textContent = cal3;
                    } else {
                        cells[cells.length - 2].textContent = 0;
                        cells[cells.length - 1].textContent = cal3;
                    }

                    if (cal4 >= 0) {
                        cells[cells.length - 1].textContent = cal4;
                    } else {
                        cells[cells.length - 1].textContent = 0;
                        cells[cells.length - 2].textContent = cal4;
                    }
                }
            }

            const urlParams = new URLSearchParams(window.location.search);
            const linkParam = urlParams.get('denomination');
            saveDataLocally(linkParam);
        }



     

                    
                        
                        

                    



                

                
                

        


        // Fonction pour générer le PDF
        function generatePDF() {
            const element = document.querySelector('table');

            // Créer un élément pour le titre
            const titleElement = document.createElement('h2');
            titleElement.textContent = 'FICHE DE SUIVI DES EMBALLAGES'; // Remplacez par votre propre titre
            titleElement.style.textAlign = 'center'; // Centrer le texte

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

            // Générer le PDF
            html2pdf().from(container).set(opt).save();
        }

        // Fonction pour insérer la date d'aujourd'hui au chargement de la page
        window.addEventListener('DOMContentLoaded', function () {
            const dateCell = document.querySelector('#date-cell');
            const currentDate = new Date().toLocaleDateString();
            dateCell.innerText = "Date: " + currentDate;
        });

        //fonction pour rendre ma cellule de retour automatiquement negative
        function formatNegativeNumber(cell) {
            var valeur = cell.textContent.trim(); // Supprime les espaces avant et après le texte

            // Supprime tous les caractères non numériques (sauf "-")
            valeur = valeur.replace(/[^-\d]/g, '');

            // Assurez-vous qu'il commence par un signe "-"
            if (!valeur.startsWith("-")) {
                valeur = "-" + valeur;
            }

            // Mettez à jour le contenu de la cellule avec la valeur formatée
            cell.textContent = valeur;
        }

        

            


    </script>
    <title>Les PROS</title>
    <style>
        td {
            font-size: 12px;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>

<body>
<div class="container mt-5">
    <button onclick="generatePDF()" class="btn btn-primary">Imprimer</button>    <button onclick="calculerTotalDetteAvoir()" class="btn btn-primary">Calculer Total Dette et Avoir</button>     <button class="btn btn-primary" id="save-button">Enregistrer</button>




    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive print-table-wrapper">
            <table class="table table-bordered " class="casier" id="your-table-id">
                <thead>
                <tr>
                    <th id="date-cell" colspan="9"></th>
                </tr>
                <tr>
                    @foreach ($fournisseurs as $fournisseur)
                        @if ($fournisseurDenomination === $fournisseur->denomination)
                            <th style="background-color: gray; text-align:center;">{{ $fournisseur->denomination }}</th>
                        @endif
                    @endforeach
                    <th>Consignation initiale</th>
                    <th>Achat</th>
                    <th>Retour Achat</th>
                    <th>Consignation finale</th>
                    <th>Avoir</th>
                    <th>Dette</th>
                    <th>total avoir</th>
                    <th>total dette</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($casiers as $index => $casier)
                    <tr class="casier">
                        <td style="font-size: 12px;">{{ $casier->type_casier }}</td>
                        <td contenteditable="true" data-key="col"   title="Veuillez entrer uniquement des chiffres positifs ou négatifs" oninput="updateResult(this.parentElement); saveCellValue(this);">0</td>
                        <td contenteditable="true" data-key="col1"   title="Veuillez entrer uniquement des chiffres positifs ou négatifs" oninput="updateResult(this.parentElement); verificationNumerique(this); achatRet(this.parentElement);">0</td>
                        <td contenteditable="true" data-key="col1"  id="neg" oninput="updateResult(this.parentElement); verificationNumerique(this); achatRet(this.parentElement); formatNegativeNumber(this);">0</td>
                        <td contenteditable="false" data-key="col"  >0</td>
                        <td contenteditable="false" data-key="col1"  id="cell1" style="color:green;">0</td>
                        <td contenteditable="false" data-key="col1"   id="cell2" style="color:red;">0</td>
                        <td contenteditable="false" data-key="col"   id="cell3" style="color:green;font-size: 25px;">0</td>
                        <td contenteditable="false" data-key="col"  id="cell4" style="color:red; font-size: 25px;">0</td>
                    </tr>
                @endforeach
                @foreach ($bouteilles as $index => $bouteille)
                    <tr class="casier">
                        <td style="font-size: 12px;">{{ $bouteille->type_bouteille }}</td>
                        <td contenteditable="true" data-key="col" title="Veuillez entrer uniquement des chiffres positifs ou négatifs" oninput="updateResult(this.parentElement); saveCellValue(this);">0</td>
                        <td contenteditable="true" data-key="col1"  title="Veuillez entrer uniquement des chiffres positifs ou négatifs" oninput="updateResult(this.parentElement); verificationNumerique(this); achatRet(this.parentElement);">0</td>
                        <td contenteditable="true" data-key="col1" id="neg" title="Veuillez entrer uniquement des chiffres positifs ou négatifs" oninput="updateResult(this.parentElement); verificationNumerique(this); achatRet(this.parentElement); formatNegativeNumber(this);">0</td>
                        <td contenteditable="false" data-key="col" >0</td>
                        <td contenteditable="false" data-key="col1" id="cell1" style="color:green;">0</td>
                        <td contenteditable="false" data-key="col1"  id="cell2" style="color:red;" >0</td>
                        <td contenteditable="false" data-key="col"  id="cell3" style="color:green;font-size: 25px;">0</td>
                        <td contenteditable="false" data-key="col"  id="cell4" style="color:red; font-size:25px;">0</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
            
        </div>
    </div>
</div><br>

<footer class="foot py-5 bg-dark">
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
                xhr.open('POST', '/save-data', true);
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
                    xhr.open('POST', '/restore-data', true);
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
</html>
</x-app-layout>
