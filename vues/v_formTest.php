<div class="container-fluid">
    <table class="table table-bordered table-responsive table-striped">
        <form action="index.php?uc=intervention&action=insererFicheIntervention" method="post">
            <div class="row">
                <tr>
                    <th class="col-auto text-center">
                        Date/Heure de l'appel
                    </th>
                    <th class="col-auto text-center">
                        Origine de l'appel
                    </th>
                    <th class="col-auto text-center">
                        Axe/Sens
                    </th>
                    <th class="col-auto text-center">
                        Localisation
                    </th>
                    <th class="col-auto text-center">
                        Voie
                    </th>
                    <th class="col-auto text-center">
                        Heure de début/fin
                    </th>
                    <th class="col-auto text-center">
                        Type intervention/Précision de type 1
                    </th>

                    <th class="col-auto text-center">
                        DDP
                    </th>
                    <th class="col-auto text-center">
                        Présence du chef d'équipe
                    </th>
                    <th class="col-auto text-center">
                        Observation
                    </th>
                    <?php
                    if ($_SESSION['habilitation'] !== 'CEI') {
                    ?>
                        <th class="col-auto text-center">
                            CEI
                        </th>
                    <?php
                    }
                    ?>
                    <th class="col-auto text-center">
                    </th>
                </tr>

                <tr>
                    <td class="col-1">

                        <div class="m-2">
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>

                        <div class="m-2">
                            <input type="time" class="form-control" id="heureAppel" name="heureAppel" required>
                        </div>

                    </td>
                    <td class="col-1">
                        <div class="m-2">
                            <select name="origineAppel" id="origineAppel" class="form-select" aria-label="Default select example" required>
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
                        </div>
                    </td>
                    <td class="col-1">
                        <div class="m-2">
                            <input type="text" class="form-control" id="axe" name="axe" required>
                        </div>

                        <div class="m-2">
                            <select name="sens" id="sens" class="form-select" aria-label="Default select example" required>
                                <option value="W">W</option>
                                <option value="Y">Y</option>
                                <option value="INT">INT</option>
                                <option value="EXT">EXT</option>
                            </select>
                        </div>

                    </td>
                    <td class="col-auto">
                        <div class="m-2">
                            <input type="text" class="form-control" id="localisation" name="localisation" required>
                        </div>
                    </td>
                    <td class="col-auto">
                        <?php
                        $count = 0;
                        for ($i = 0; $i < 6; $i++) {
                        ?>
                            <div class="m-2">
                                <select name="voie<?php echo $i ?>" id="voie<?php echo $i ?>" class="form-select" aria-label="Default select example" onchange="showVoie(<?php echo $i ?>)" style="display:block">
                                    <option id="choix<?php echo $i ?>" value="none" hidden selected>Choisir une voie</option>
                                    <option value="1">BAU</option>
                                    <option value="2">Voie lente</option>
                                    <option value="3">Voie médiane</option>
                                    <option value="4">Voie rapide</option>
                                    <option value="5">TPC</option>
                                    <option value="6">Accotement</option>
                                    <option id="supp<?php echo $i ?>" value="none">Supprimer</option>

                                </select>
                            </div>


                        <?php
                            $count = $count + 1;
                        }
                        ?>
                    </td>

                    <td class="col-auto">
                        <div class="m-2">
                            <input type="time" class="form-control" id="heureDebut" name="heureDebut" required>
                        </div>
                        <div class="m-2">
                            <input type="time" class="form-control" id="heureFin" name="heureFin" required>
                        </div>
                    </td>
                    <td class="col-auto">
                        <div class="m-2">
                            <select name="type" id="type" class="form-select" aria-label="Default select example" onchange="discoverIntervention()" required>
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
                        </div>


                        <?php
                        for ($i = 0; $i < 3; $i++) {
                        ?>
                            <div class="m-2">
                                <select name="precisionAccident<?php echo $i ?>" id="precisionAccident<?php echo $i ?>" class="form-select" onchange="showAccident(<?php echo $i ?>)" aria-label=" Default select example" style="display:none">
                                    <option id="choixAccident<?php echo $i ?>" value="none" hidden selected>Choisir une précision</option>
                                    <option value="1">Matériel</option>
                                    <option value="2">Corporel</option>
                                    <option value="3">Mortel</option>
                                    <option id="suppAccident<?php echo $i ?>" value="none">Supprimer</option>
                                </select>
                            </div>

                        <?php
                        }

                        for ($i = 0; $i < 2; $i++) {
                        ?>
                            <div class="m-2">
                                <select name="precisionAnimaux<?php echo $i ?>" id="precisionAnimaux<?php echo $i ?>" class="form-select" onchange="showAnimaux(<?php echo $i ?>)" aria-label=" Default select example" style="display:none">
                                    <option id="choixAnimaux<?php echo $i ?>" value="none" hidden selected>Choisir une précision</option>
                                    <option value="4">Animal Errant</option>
                                    <option value="5">Animal Mort</option>
                                    <option id="suppAnimaux<?php echo $i ?>" value="none">Supprimer</option>
                                </select>
                            </div>

                        <?php
                        }

                        for ($i = 0; $i < 3; $i++) {
                        ?>
                            <div class="m-2">
                                <select name="precisionBouchon<?php echo $i ?>" id="precisionBouchon<?php echo $i ?>" class="form-select" onchange="showBouchon(<?php echo $i ?>)" aria-label=" Default select example" style="display:none">
                                    <option id="choixBouchon<?php echo $i ?>" value="none" hidden selected>Choisir une précision</option>
                                    <option value="6">Ralentissement</option>
                                    <option value="7">Circulations en accordéons</option>
                                    <option value="8">Circulations à l'arrêt</option>
                                    <option id="suppBouchon<?php echo $i ?>" value="none">Supprimer</option>
                                </select>
                            </div>

                        <?php
                        }

                        for ($i = 0; $i < 5; $i++) {
                        ?>
                            <div class="m-2">
                                <select name="precisionIntemp<?php echo $i ?>" id="precisionIntemp<?php echo $i ?>" class="form-select" onchange="showIntemp(<?php echo $i ?>)" aria-label=" Default select example" style="display:none">
                                    <option id="choixIntemp<?php echo $i ?>" value="none" hidden selected>Choisir une précision</option>
                                    <option value="9">Vent violent</option>
                                    <option value="10">Pluie violente</option>
                                    <option value="11">Chutes de neiges violente</option>
                                    <option value="12">Inondation</option>
                                    <option value="13">Incendie</option>
                                    <option id="suppIntemp<?php echo $i ?>" value="none">Supprimer</option>
                                </select>
                            </div>

                        <?php
                        }

                        for ($i = 0; $i < 7; $i++) {
                        ?>
                            <div class="m-2">
                                <select name="precisionObstacle<?php echo $i ?>" id="precisionObstacle<?php echo $i ?>" class="form-select" onchange="showObstacle(<?php echo $i ?>)" aria-label=" Default select example" style="display:none">
                                    <option id="choixObstacle<?php echo $i ?>" value="none" hidden selected>Choisir une précision</option>
                                    <option value="14">Chaussée glissante et produits sur la route</option>
                                    <option value="15">Évènement inopinés</option>
                                    <option value="16">Obstacles</option>
                                    <option value="17">Piéton-Cycliste</option>
                                    <option value="18">Véhicule gênant</option>
                                    <option value="19">Véhicule à contresens</option>
                                    <option value="20">Véhicule arrêté</option>
                                    <option id="suppObstacle<?php echo $i ?>" value="none">Supprimer</option>
                                </select>
                            </div>

                        <?php
                        }

                        for ($i = 0; $i < 2; $i++) {
                        ?>
                            <div class="m-2">
                                <select name="precisionBalisage<?php echo $i ?>" id="precisionBalisage<?php echo $i ?>" class="form-select" onchange="showBalisage(<?php echo $i ?>)" aria-label=" Default select example" style="display:none">
                                    <option id="choixBalisage<?php echo $i ?>" value="none" hidden selected>Choisir une précision</option>
                                    <option value="21">Introduction d’un véhicule dans le balisage</option>
                                    <option value="22">Autres</option>
                                    <option id="suppBalisage<?php echo $i ?>" value="none">Supprimer</option>
                                </select>
                            </div>

                        <?php
                        }

                        for ($i = 0; $i < 3; $i++) {
                        ?>
                            <div class="m-2">
                                <select name="precisionChaussee<?php echo $i ?>" id="precisionChaussee<?php echo $i ?>" class="form-select" onchange="showChaussee(<?php echo $i ?>)" aria-label=" Default select example" style="display:none">
                                    <option id="choixChaussee<?php echo $i ?>" value="none" hidden selected>Choisir une précision</option>
                                    <option value="23">Rebouchage d’un nid de poule</option>
                                    <option value="24">Épandage d’absorbant sur la chaussée </option>
                                    <option value="22">Autres </option>
                                    <option id="supp<?php echo $i ?>" value="none">Supprimer</option>
                                </select>
                            </div>

                        <?php
                        }
                        ?>

                    </td>
                    <td class="col-auto">
                        <div class="form-check m-2">
                            <input class="form-check-input" type="checkbox" name="DDP">
                            <label class="form-check-label" for="defaultCheck1">
                                DDP
                            </label>
                        </div>
                    </td>
                    <td class="col-auto">
                        <div class="form-check m-2">
                            <input class="form-check-input" type="checkbox" name="presenceChef">
                            <label class="form-check-label" for="defaultCheck1">
                                Présence du chef d'équipe
                            </label>
                        </div>
                    </td>
                    <td class="col-auto">
                        <div class="m-2">
                            <input type="text" class="form-control" id="observation" name="observation">
                        </div>
                    </td>
                    <?php

                    if ($_SESSION['habilitation'] !== 'CEI') {
                    ?>
                        <td class="col-auto">

                            <select name="choixCEI" id="choixCEI" class="form-select" required>
                                <?php
                                if ($_SESSION['habilitation'] == 'UER') {
                                    $cei = getCEIByUER($_SESSION['idUER']);
                                } else {
                                    $cei = getCEIByAGER($_SESSION['idAGER']);
                                }

                                foreach ($cei as $unCei) {
                                ?>
                                    <option hidden selected>CEI</option>
                                    <option value="<?php echo $unCei['idCEI'] ?>"><?php echo $unCei['libelleCEI'] ?></option>

                                <?php
                                }
                                ?>


                            </select>

                        </td>

                    <?php
                    }
                    ?>

                    <td class="col-1">
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit">Enregistrer</button>
                        </div>
                    </td>
                </tr>
            </div>
        </form>
    </table>
</div>

<script src="assets/js/js_form_intervention.js"></script>