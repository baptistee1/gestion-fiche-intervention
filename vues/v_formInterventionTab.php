<h1>Fiche Intervention</h1>
<div class="container-fluid">
    <table class="table table-bordered table-sm">
        <form action="index.php?uc=intervention&action=insererFicheIntervention" method="post">

            <thead>
                <tr>
                    <th class="text-center col-auto">Date/Heure de l'appel</th>
                    <th class="text-center col-auto">Origine de l'appel</th>
                    <th class="text-center col-auto">Axe</th>
                    <th class="text-center col-auto">Sens</th>
                    <th class="text-center col-auto">Localisation</th>
                    <th class="text-center col-auto">Voie</th>
                    <th class="text-center col-auto">Heure de début/fin</th>
                    <th class="text-center col-auto">Type intervention</th>
                    <th class="text-center col-auto">Précision de type 1</th>
                    <th class="text-center col-auto">DDP</th>
                    <th class="text-center col-auto">Présence du chef d'équipe</th>

                </tr>
            </thead>

</div>
<div>

    <tbody>

        <tr>
            <td class="col-auto">
                <input type="date" class="form-control" id="date" name="date">
                <input type="time" class="form-control" id="heureAppel" name="heureAppel">
            </td>
            <td class="col-auto">
                <select name="origineAppel" id="origineAppel" class="form-select" aria-label="Default select example">
                    <option value="OST">OST</option>
                    <option value="Police">Police</option>
                    <option value="Gendarmerie">Gendarmerie</option>
                    <option value="Pompiers">Pompiers</option>
                    <option value="Dépanneurs">Dépanneurs</option>
                    <option value="Autres gestionnaires de réseau">Autres gestionnaires de réseau</option>
                    <option value="Usagers">Usagers</option>
                    <option value="RI">RI</option>
                    <option value="Autre">Autre</option>
                </select>
            </td>
            <td>
                <input type="text" class="form-control" id="axe" name="axe">
                <select name="sens" id="sens" class="form-select" aria-label="Default select example">
                    <option value="W">W</option>
                    <option value="Y">Y</option>
                    <option value="INT">INT</option>
                    <option value="EXT">EXT</option>
                </select>
            </td>
            <td><input type="text" class="form-control" id="localisation" name="localisation"></td>

            <td class="col-auto">
                <?php

                for ($i = 0; $i < 6; $i++) {
                ?>
                    <select name="voie<?php echo $i ?>" id="voie<?php echo $i ?>" class="form-select" aria-label="Default select example" onclick="discoverVoie()" style="display:none">
                        <option value="none" hidden selected>Choisir une voie</option>
                        <option value="1">BAU</option>
                        <option value="2">Voie lente</option>
                        <option value="3">Voie médiane</option>
                        <option value="4">Voie rapide</option>
                        <option value="5">TPC</option>
                        <option value="6">Accotement</option>
                    </select>
                <?php
                }
                ?>


            </td>
            <td class="col-auto">
                <input type="time" class="form-control" id="heureDebut" name="heureDebut">
                <input type="time" class="form-control" id="heureFin" name="heureFin">
            </td>
            <td class="col-auto">
                <select name="type" id="type" class="form-select" aria-label="Default select example" onchange="discoverIntervention()">
                    <option value="none" hidden selected>Choisir un type</option>
                    <option value="Accident">Accident</option>
                    <option value="Animaux">Animaux</option>
                    <option value="Bouchon">Bouchon</option>
                    <option value="Intempéries">Intempéries</option>
                    <option value="Obstacle mobile ou fixe">Obstacle mobile ou fixe</option>
                    <option value="Véhicule en panne">Véhicule en panne</option>
                    <option value="Balisage">Balisage</option>
                    <option value="Chaussée">Chaussée</option>
                    <option value="Autre">Autre</option>
                </select>

            </td>
            <td class="col-auto">
                <?php
                for ($i = 0; $i < 3; $i++) {
                ?>
                    <select name="precisionAccident<?php echo $i ?>" id="precisionAccident<?php echo $i ?>" class="form-select" onclick="discoverPrecision1()" aria-label=" Default select example" style="display:none">
                        <option value="none" hidden selected>Choisir une précision</option>
                        <option value="1">Matériel</option>
                        <option value="2">Corporel</option>
                        <option value="3">Mortel</option>
                    </select>


                <?php
                }
                for ($i = 0; $i < 2; $i++) {
                ?>
                    <select name="precisionAnimaux<?php echo $i ?>" id="precisionAnimaux<?php echo $i ?>" class="form-select" onclick="discoverAnimaux()" aria-label=" Default select example" style="display:none">
                        <option value="none" hidden selected>Choisir une précision</option>
                        <option value="4">Animal Errant</option>
                        <option value="5">Animal Mort</option>
                    </select>


                <?php


                }


                ?>

            </td>
            <td class="col-auto">
                <select name="DDP" id="DDP" class="form-select">
                    <option value=" 1">Oui</option>
                    <option value="0">Non</option>
                </select>
            </td>
            <td class="col-auto">
                <select name="presenceChef" id="presenceChef" class="form-select">
                    <option value=" 1">Oui</option>
                    <option value="0">Non</option>
                </select>
            </td>
            <td class="col-auto">
                <button type="submit" class="btn btn-primary">Enregistrer</button>


            </td>
        </tr>
    </tbody>
</div>
</div>


</form>


</table>
<script src="assets/js/js_form_intervention.js"></script>