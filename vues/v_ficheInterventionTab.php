<table class=" table table-bordered table-striped">
    <tr>
        <th class="text-center">Référence</th>
        <th class="text-center">Date/Heure d'appel</th>
        <th class="text-center">Origine de l'appel</th>
        <th class="text-center">Axe/Sens</th>
        <th class="text-center">Localisation</th>
        <th class="text-center">Voie</th>
        <th class="text-center">Heure de début/fin</th>
        <th class="text-center">Type d'intervention/Précision de type 1</th>
        <th class="text-center">Observation</th>
        <th class="text-center"></th>

        </div>

        </div>



    </tr>
    <?php
    foreach ($lesLignes as $laLigne) {
        $ref = $laLigne['ref'];
        $idCEI = $laLigne['idCEI'];
        $CEI = getLibelleCei($idCEI);
        $date = $laLigne['date'];
        $heureAppel = $laLigne['heure appel'];
        $origineAppel = $laLigne['origine appel'];
        $axe =  $laLigne['axe'];
        $sens =  $laLigne['sens'];
        $localisation =  $laLigne['localisation'];
        $heureDebut =  $laLigne['heure debut'];
        $heureFin =  $laLigne['heure fin'];
        $typeIntervention =  $laLigne['type intervention'];
    ?>
        <tr>
            <form action=" index.php?uc=intervention&action=modifierFicheIntervention" method="post">

                <td>
                    <div>
                        <input type="text" class="form-control-plaintext" id="RI<?= $ref ?>" name="RI" value="<?php echo $CEI['libelleCEI'] ?>">
                        <input type="text" class="form-control-plaintext" id="reference<?= $ref ?>" name="reference" value="<?php echo $ref ?>" hidden>
                    </div>
                </td>
                <td>
                    <div>
                        <input type="date" class="form-control" id="date" name="date" value="<?php echo $date ?>">
                    </div>
                    <div>
                        <input type="time" class="form-control" id="heureAppel" name="heureAppel" value="<?php echo $heureAppel ?>">
                    </div>


                </td>
                <td>
                    <div>
                        <select name="origineAppel" id="origineAppel" class="form-select" aria-label="Default select example">
                            <option value="<?php echo $origineAppel ?>" selected hidden><?php echo $origineAppel ?></option>
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
                <td>
                    <div>
                        <input type="text" class="form-control" id="axe" name="axe" value="<?php echo $axe ?>">

                    </div>

                    <div>
                        <select name="sens" id="sens" class="form-select" aria-label="Default select example">
                            <option value="<?php echo $sens ?>" selected hidden><?php echo $sens ?></option>
                            <option value="W">W</option>
                            <option value="Y">Y</option>
                            <option value="INT">INT</option>
                            <option value="EXT">EXT</option>
                        </select>
                    </div>



                </td>
                <td><input type="text" class="form-control" id="localisation" name="localisation" value="<?php echo $localisation ?>"></td>

                <td>
                    <?php


                    $voiesIds = getIdVoies($ref);

                    $lesVoiesNotIn = getVoiesNotIn($ref);


                    for ($i = 0; $i < 6; $i++) {
                    ?>

                        <select class="form-select" aria-label="Default select example" id="voie<?= $i ?>ref<?php echo $ref ?>" name="voie<?= $i ?>" style="display:block">
                            <?php

                            $lesVoies = getVoies($ref);



                            if (!empty($lesVoies[$i]['idVoie'])) {

                                if ($lesVoies[$i]['idVoie'] == 1) {

                            ?>
                                    <option selected hidden value="1">BAU</option>

                                    <?php

                                } else {

                                    if ($lesVoies[$i]['idVoie'] == 2) {

                                    ?>
                                        <option selected hidden value="2">Voie lente</option>

                                        <?php

                                    } else {

                                        if ($lesVoies[$i]['idVoie'] == 3) {

                                        ?>
                                            <option selected hidden value="3">Voie médiane</option>

                                            <?php

                                        } else {

                                            if ($lesVoies[$i]['idVoie'] == 4) {

                                            ?>
                                                <option selected hidden value="4">Voie rapide</option>

                                                <?php

                                            } else {

                                                if ($lesVoies[$i]['idVoie'] == 5) {

                                                ?>
                                                    <option selected hidden value="5">TPC</option>

                                                    <?php

                                                } else {

                                                    if ($lesVoies[$i]['idVoie'] == 6) {

                                                    ?>
                                                        <option selected hidden value="6">Accotement</option>
                                <?php
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                ?>

                                <option value="1">BAU</option>
                                <option value="2">Voie lente</option>
                                <option value="3">Voie médiane</option>
                                <option value="4">Voie rapide</option>
                                <option value="5">TPC</option>
                                <option value="6">Accotement</option>
                                <option value="supp">
                                    Supprimer
                                </option>



                            <?php
                            } else {
                            ?>

                                <option selected hidden value="none">Choisir une Voie</option>
                                <?php

                                foreach ($lesVoiesNotIn as $laVoie) {
                                ?>
                                    <option value="<?php echo $laVoie['idVoie']; ?>"><?php echo $laVoie['laVoie']; ?></option>

                                <?php


                                }
                                ?>



                            <?php

                            }
                            ?>
                        </Select>
                    <?php
                    }
                    ?>
                </td>
                <td>
                    <input type="time" class="form-control" id="heureDebut" name="heureDebut" value="<?php echo $heureDebut ?>">
                    <input type="time" class="form-control" id="heureFin" name="heureFin" value="<?php echo $heureFin ?>">
                </td>
                <td>
                    <div>
                        <select name="type" id="typeInter<?php echo $ref ?>" class="form-select" aria-label="Default select example">
                            <option value="<?php echo $typeIntervention ?>" selected hidden><?php echo $typeIntervention ?></option>
                            <option value="Accident">Accident</option>
                            <option value="Animaux">Animaux</option>
                            <option value="Bouchon">Bouchon</option>
                            <option value="Intempéries">Intempéries</option>
                            <option value="Obstacles mobiles ou fixes">Obstacles mobiles ou fixes</option>
                            <option value="Véhicule en panne">Véhicule en panne</option>
                            <option value="Balisage">Balisage</option>
                            <option value="Chaussée">Chaussée</option>
                            <option value="Autre">Autre</option>
                        </select>

                    </div>


                    <div class="m-2">
                        <?php

                        $lesAccidentsNotIn = getAccidentNotIn($ref);

                        $lesPrecisions = getPrecisionNiv1($ref);

                        for ($i = 0; $i < 3; $i++) {

                        ?>

                            <select name="precisionAccident<?php echo $i ?>" id="precisionAccident<?php echo $i ?>voie<?php echo $ref ?>" class="form-select" aria-label="Default select example" style="display:none">
                                <?php

                                if (!empty($lesPrecisions[$i]['idPrecision'])) {

                                    if ($lesPrecisions[$i]['idPrecision'] == 1) {
                                ?>
                                        <option selected hidden value="1">Matériel</option>

                                        <?php
                                    } else {
                                        if ($lesPrecisions[$i]['idPrecision'] == 2) {
                                        ?>
                                            <option selected hidden value="2">Corporel</option>

                                            <?php

                                        } else {
                                            if ($lesPrecisions[$i]['idPrecision'] == 3) {
                                            ?>
                                                <option selected hidden value="3">Mortel</option>

                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="none" hidden>Choisir une précision</option>
                                    <option value="1">Matériel</option>
                                    <option value="2">Corporel</option>
                                    <option value="3">Mortel</option>
                                    <option value="supp">
                                        Supprimer
                                    </option>
                                <?php
                                } else {
                                ?>
                                    <option selected hidden value="none">Choisir une précision</option>
                                    <?php

                                    foreach ($lesAccidentsNotIn as $unAccident) {
                                    ?>
                                        <option value="<?php echo $unAccident['idPrecision']; ?>"><?php echo $unAccident['libellePrecision']; ?></option>

                                <?php
                                    }
                                }
                                ?>

                            </select>
                        <?php

                        }


                        $lesAnimauxNotIn = getAnimauxNotIn($ref);
                        for ($i = 0; $i < 2; $i++) {

                        ?>

                            <select name="precisionAnimaux<?php echo $i ?>" id="precisionAnimaux<?php echo $i ?>voie<?php echo $ref ?>" class="form-select" aria-label="Default select example" style="display:none">
                                <?php
                                $lesPrecisions = getPrecisionNiv1($ref);
                                if (!empty($lesPrecisions[$i]['idPrecision'])) {
                                    if ($lesPrecisions[$i]['idPrecision'] == 4) {
                                ?>
                                        <option selected hidden value="4">Animal Errant</option>
                                        <option value="none" disabled hidden>Choisir une précision</option>
                                        <option value="4">Animal Errant</option>
                                        <option value="5">Animal Mort</option>
                                        <option value="supp">
                                            Supprimer
                                        </option>

                                        <?php
                                    } else {
                                        if ($lesPrecisions[$i]['idPrecision'] == 5) {

                                        ?>
                                            <option selected hidden value="5">Animal Mort</option>
                                            <option value="none" disabled hidden>Choisir une précision</option>
                                            <option value="4">Animal Errant</option>
                                            <option value="5">Animal Mort</option>
                                            <option value="supp">
                                                Supprimer
                                            </option>
                                        <?php
                                        } else {
                                        ?>
                                            <option value="none" hidden>Choisir une précision</option>
                                            <option value="4">Animal Errant</option>
                                            <option value="5">Animal Mort</option>
                                    <?php
                                        }
                                    }
                                    ?>

                                <?php
                                } else {
                                ?>
                                    <option selected hidden value="none">Choisir une précision</option>
                                    <?php
                                    foreach ($lesAnimauxNotIn as $unAnimal) {
                                    ?>

                                        <option value="<?php echo $unAnimal['idPrecision']; ?>"><?php echo $unAnimal['libellePrecision']; ?></option>


                                <?php
                                    }
                                }
                                ?>



                            </select>
                        <?php

                        }











                        $lesBouchonNotIn = getBouchonNotIn($ref);

                        for ($i = 0; $i < 3; $i++) {

                        ?>

                            <select name="precisionBouchon<?php echo $i ?>" id="precisionBouchon<?php echo $i ?>voie<?php echo $ref ?>" class="form-select" aria-label="Default select example" style="display:none">


                                <?php
                                $lesPrecisions = getPrecisionNiv1($ref);
                                if (!empty($lesPrecisions[$i]['idPrecision'])) {
                                    if ($lesPrecisions[$i]['idPrecision'] == 6) {
                                ?>
                                        <option selected hidden value="6">Ralentissement</option>
                                        <option value="none" disabled hidden>Choisir une précision</option>
                                        <option value="6">Ralentissement</option>
                                        <option value="7">Circulations en accordéons</option>
                                        <option value="8">Circulations à l'arrêt</option>
                                        <option value="supp">
                                            Supprimer
                                        </option>
                                        <?php
                                    } else {
                                        if ($lesPrecisions[$i]['idPrecision'] == 7) {
                                        ?>
                                            <option selected hidden value="7">Circulations en accordéons</option>
                                            <option value="none" disabled hidden>Choisir une précision</option>
                                            <option value="6">Ralentissement</option>
                                            <option value="7">Circulations en accordéons</option>
                                            <option value="8">Circulations à l'arrêt</option>
                                            <option value="supp">
                                                Supprimer
                                            </option>
                                            <?php

                                        } else {
                                            if ($lesPrecisions[$i]['idPrecision'] == 8) {
                                            ?>
                                                <option selected hidden value="8">Circulations à l'arrêt</option>
                                                <option value="none" disabled hidden>Choisir une précision</option>
                                                <option value="6">Ralentissement</option>
                                                <option value="7">Circulations en accordéons</option>
                                                <option value="8">Circulations à l'arrêt</option>
                                                <option value="supp">
                                                    Supprimer
                                                </option>

                                            <?php
                                            } else {
                                            ?>
                                                <option value="none" hidden>Choisir une précision</option>
                                                <option value="6">Ralentissement</option>
                                                <option value="7">Circulations en accordéons</option>
                                                <option value="8">Circulations à l'arrêt</option>
                                                <option value="supp">
                                                    Supprimer
                                                </option>
                                    <?php
                                            }
                                        }
                                    }
                                } else {
                                    ?>
                                    <option selected hidden value="none">Choisir une précision</option>
                                    <option value="7" hidden disabled>Circulations en accordéons</option>
                                    <?php
                                    foreach ($lesBouchonNotIn as $unBouchon) {
                                    ?>

                                        <option value="<?php echo $unBouchon['idPrecision']; ?>"><?php echo $unBouchon['libellePrecision']; ?></option>


                                <?php
                                    }
                                }

                                ?>
                            </select>
                        <?php

                        }

                        $lesIntempNotIn = getIntempNotIn($ref);

                        for ($i = 0; $i < 5; $i++) {

                        ?>

                            <select name="precisionIntemp<?php echo $i ?>" id="precisionIntemp<?php echo $i ?>voie<?php echo $ref ?>" class="form-select" aria-label="Default select example" style="display:none">
                                <?php
                                $lesPrecisions = getPrecisionNiv1($ref);
                                if (!empty($lesPrecisions[$i]['idPrecision'])) {
                                    if ($lesPrecisions[$i]['idPrecision'] == 9) {
                                ?>
                                        <option selected hidden value="9">Vent violent</option>
                                        <option value="none" disabled hidden>Choisir une précision</option>
                                        <option value="9">Vent violent</option>
                                        <option value="10">Pluie violente</option>
                                        <option value="11">Chutes de neiges violente</option>
                                        <option value="12">Inondation</option>
                                        <option value="13">Incendie</option>
                                        <option value="supp">
                                            Supprimer
                                        </option>
                                        <?php

                                    } else {
                                        if ($lesPrecisions[$i]['idPrecision'] == 10) {
                                        ?>
                                            <option selected hidden value="10">Pluie violente</option>
                                            <option value="none" disabled hidden>Choisir une précision</option>
                                            <option value="9">Vent violent</option>
                                            <option value="10">Pluie violente</option>
                                            <option value="11">Chutes de neiges violente</option>
                                            <option value="12">Inondation</option>
                                            <option value="13">Incendie</option>
                                            <option value="supp">
                                                Supprimer
                                            </option>
                                            <?php

                                        } else {
                                            if ($lesPrecisions[$i]['idPrecision'] == 11) {
                                            ?>
                                                <option selected hidden value="11">Chutes de neiges violente</option>
                                                <option value="none" disabled hidden>Choisir une précision</option>
                                                <option value="9">Vent violent</option>
                                                <option value="10">Pluie violente</option>
                                                <option value="11">Chutes de neiges violente</option>
                                                <option value="12">Inondation</option>
                                                <option value="13">Incendie</option>
                                                <option value="supp">
                                                    Supprimer
                                                </option>
                                                <?php

                                            } else {
                                                if ($lesPrecisions[$i]['idPrecision'] == 12) {
                                                ?>
                                                    <option selected hidden value="12">Inondation</option>
                                                    <option value="none" disabled hidden>Choisir une précision</option>
                                                    <option value="9">Vent violent</option>
                                                    <option value="10">Pluie violente</option>
                                                    <option value="11">Chutes de neiges violente</option>
                                                    <option value="12">Inondation</option>
                                                    <option value="13">Incendie</option>
                                                    <option value="supp">
                                                        Supprimer
                                                    </option>
                                                    <?php

                                                } else {
                                                    if ($lesPrecisions[$i]['idPrecision'] == 13) {
                                                    ?>
                                                        <option selected hidden value="13">Incendie</option>
                                                        <option value="none" disabled hidden>Choisir une précision</option>
                                                        <option value="9">Vent violent</option>
                                                        <option value="10">Pluie violente</option>
                                                        <option value="11">Chutes de neiges violente</option>
                                                        <option value="12">Inondation</option>
                                                        <option value="13">Incendie</option>
                                                        <option value="supp">
                                                            Supprimer
                                                        </option>
                                                    <?php


                                                    } else {
                                                    ?>
                                                        <option value="none" hidden>Choisir une précision</option>
                                                        <option value="9">Vent violent</option>
                                                        <option value="10">Pluie violente</option>
                                                        <option value="11">Chutes de neiges violente</option>
                                                        <option value="12">Inondation</option>
                                                        <option value="13">Incendie</option>
                                    <?php

                                                    }
                                                }
                                            }
                                        }
                                    }
                                } else {
                                    ?>
                                    <option selected hidden value="none">Choisir une précision</option>
                                    <option value="11" disabled hidden>Chutes de neiges violente</option>
                                    <?php
                                    foreach ($lesIntempNotIn as $unIntemp) {
                                    ?>

                                        <option value="<?php echo $unIntemp['idPrecision']; ?>"><?php echo $unIntemp['libellePrecision']; ?></option>


                                <?php
                                    }
                                }
                                ?>

                            </select>
                        <?php

                        }
                        $lesObstaclesNotIn = getObstacleNotIn($ref);
                        for ($i = 0; $i < 7; $i++) {

                        ?>

                            <select name="precisionObstacle<?php echo $i ?>" id="precisionObstacle<?php echo $i ?>voie<?php echo $ref ?>" class="form-select" aria-label="Default select example" style="display:none">
                                <?php
                                $lesPrecisions = getPrecisionNiv1($ref);
                                if (!empty($lesPrecisions[$i]['idPrecision'])) {
                                    if ($lesPrecisions[$i]['idPrecision'] == 14) {
                                ?>
                                        <option select hidden value="14">Chaussée glissante et produits sur la route</option>
                                        <option value="none" disabled hidden>Choisir une précision</option>
                                        <option value="14">Chaussée glissante et produits sur la route</option>
                                        <option value="15">Évènement inopinés</option>
                                        <option value="16">Obstacles</option>
                                        <option value="17">Piéton-Cycliste </option>
                                        <option value="18">Véhicule gênant</option>
                                        <option value="19">Véhicule à contresens</option>
                                        <option value="20">Véhicule arrêté</option>
                                        <option value="supp">
                                            Supprimer
                                        </option>
                                        <?php
                                    } else {
                                        if ($lesPrecisions[$i]['idPrecision'] == 15) {
                                        ?>
                                            <option select hidden value="15">Évènement inopinés</option>
                                            <option value="none" disabled hidden>Choisir une précision</option>
                                            <option value="14">Chaussée glissante et produits sur la route</option>
                                            <option value="15">Évènement inopinés</option>
                                            <option value="16">Obstacles</option>
                                            <option value="17">Piéton-Cycliste </option>
                                            <option value="18">Véhicule gênant</option>
                                            <option value="19">Véhicule à contresens</option>
                                            <option value="20">Véhicule arrêté</option>
                                            <option value="supp">
                                                Supprimer
                                            </option>
                                            <?php

                                        } else {
                                            if ($lesPrecisions[$i]['idPrecision'] == 16) {
                                            ?>
                                                <option select hidden value="16">Obstacles</option>
                                                <option value="none" disabled hidden>Choisir une précision</option>
                                                <option value="14">Chaussée glissante et produits sur la route</option>
                                                <option value="15">Évènement inopinés</option>
                                                <option value="16">Obstacles</option>
                                                <option value="17">Piéton-Cycliste </option>
                                                <option value="18">Véhicule gênant</option>
                                                <option value="19">Véhicule à contresens</option>
                                                <option value="20">Véhicule arrêté</option>
                                                <option value="supp">
                                                    Supprimer
                                                </option>
                                                <?php


                                            } else {
                                                if ($lesPrecisions[$i]['idPrecision'] == 17) {
                                                ?>
                                                    <option select hidden value="17">Piéton-Cycliste </option>
                                                    <option value="none" disabled hidden>Choisir une précision</option>
                                                    <option value="14">Chaussée glissante et produits sur la route</option>
                                                    <option value="15">Évènement inopinés</option>
                                                    <option value="16">Obstacles</option>
                                                    <option value="17">Piéton-Cycliste </option>
                                                    <option value="18">Véhicule gênant</option>
                                                    <option value="19">Véhicule à contresens</option>
                                                    <option value="20">Véhicule arrêté</option>
                                                    <option value="supp">
                                                        Supprimer
                                                    </option>
                                                    <?php

                                                } else {
                                                    if ($lesPrecisions[$i]['idPrecision'] == 18) {
                                                    ?>

                                                        <option select hidden value="18">Véhicule gênant</option>
                                                        <option value="none" disabled hidden>Choisir une précision</option>
                                                        <option value="14">Chaussée glissante et produits sur la route</option>
                                                        <option value="15">Évènement inopinés</option>
                                                        <option value="16">Obstacles</option>
                                                        <option value="17">Piéton-Cycliste </option>
                                                        <option value="18">Véhicule gênant</option>
                                                        <option value="19">Véhicule à contresens</option>
                                                        <option value="20">Véhicule arrêté</option>
                                                        <option value="supp">
                                                            Supprimer
                                                        </option>

                                                        <?php
                                                    } else {
                                                        if ($lesPrecisions[$i]['idPrecision'] == 19) {
                                                        ?>
                                                            <option select hidden value="19">Véhicule à contresens</option>
                                                            <option value="none" disabled hidden>Choisir une précision</option>
                                                            <option value="14">Chaussée glissante et produits sur la route</option>
                                                            <option value="15">Évènement inopinés</option>
                                                            <option value="16">Obstacles</option>
                                                            <option value="17">Piéton-Cycliste </option>
                                                            <option value="18">Véhicule gênant</option>
                                                            <option value="19">Véhicule à contresens</option>
                                                            <option value="20">Véhicule arrêté</option>
                                                            <option value="supp">
                                                                Supprimer
                                                            </option>
                                                            <?php

                                                        } else {
                                                            if ($lesPrecisions[$i]['idPrecision'] == 20) {
                                                            ?>

                                                                <option select hidden value="20">Véhicule arrêté</option>
                                                                <option value="none" disabled hidden>Choisir une précision</option>
                                                                <option value="14">Chaussée glissante et produits sur la route</option>
                                                                <option value="15">Évènement inopinés</option>
                                                                <option value="16">Obstacles</option>
                                                                <option value="17">Piéton-Cycliste </option>
                                                                <option value="18">Véhicule gênant</option>
                                                                <option value="19">Véhicule à contresens</option>
                                                                <option value="20">Véhicule arrêté</option>
                                                                <option value="supp">
                                                                    Supprimer
                                                                </option>

                                                            <?php
                                                            } else {
                                                            ?>
                                                                <option value="none" hidden>Choisir une précision</option>
                                                                <option value="14">Chaussée glissante et produits sur la route</option>
                                                                <option value="15">Évènement inopinés</option>
                                                                <option value="16">Obstacles</option>
                                                                <option value="17">Piéton-Cycliste </option>
                                                                <option value="18">Véhicule gênant</option>
                                                                <option value="19">Véhicule à contresens</option>
                                                                <option value="20">Véhicule arrêté</option>
                                    <?php
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                } else {
                                    ?>
                                    <option selected hidden value="none">Choisir une précision</option>
                                    <?php
                                    foreach ($lesObstaclesNotIn as $unObstacle) {
                                    ?>

                                        <option value="<?php echo $unObstacle['idPrecision']; ?>"><?php echo $unObstacle['libellePrecision']; ?></option>


                                <?php
                                    }
                                }
                                ?>
                            </select>
                        <?php

                        }
                        $lesBalisagesNotIn = getBalisageNotIn($ref);

                        for ($i = 0; $i < 3; $i++) {

                        ?>

                            <select name="precisionBalisage<?php echo $i ?>" id="precisionBalisage<?php echo $i ?>voie<?php echo $ref ?>" class="form-select w-auto" aria-label="Default select example" style="display:none">
                                <?php
                                $lesPrecisions = getPrecisionNiv1($ref);
                                if (!empty($lesPrecisions[$i]['idPrecision'])) {
                                    if ($lesPrecisions[$i]['idPrecision'] == 21) {
                                ?>
                                        <option selected hidden value="21">Introduction d’un véhicule dans le balisage </option>
                                        <option value="none" disabled hidden>Choisir une précision</option>
                                        <option value="21">Introduction d’un véhicule dans le balisage </option>
                                        <option value="22">Autres</option>
                                        <option value="supp">
                                            Supprimer
                                        </option>
                                        <?php
                                    } else {
                                        if ($lesPrecisions[$i]['idPrecision'] == 22) {
                                        ?>
                                            <option selected hidden value="22">Autres</option>
                                            <option value="none" disabled hidden>Choisir une précision</option>
                                            <option value="21">Introduction d’un véhicule dans le balisage </option>
                                            <option value="22">Autres</option>
                                            <option value="supp">
                                                Supprimer
                                            </option>
                                        <?php
                                        } else {
                                        ?>
                                            <option value="none" hidden>Choisir une précision</option>
                                            <option value="21">Introduction d’un véhicule dans le balisage </option>
                                            <option value="22">Autres</option>


                                    <?php
                                        }
                                    }
                                } else {
                                    ?>
                                    <option value="none" selected hidden>Choisir une précision</option>
                                    <?php
                                    foreach ($lesBalisagesNotIn as $unBalisage) {
                                    ?>
                                        <option value="<?php echo $unBalisage['idPrecision']; ?>"><?php echo $unBalisage['libellePrecision']; ?></option>
                                <?php


                                    }
                                }
                                ?>
                            </select>
                        <?php

                        }
                        $lesChausseeNotIn = getChausseeNotIn($ref);
                        for ($i = 0; $i < 3; $i++) {


                        ?>

                            <select name="precisionChaussée<?php echo $i ?>" id="precisionChaussée<?php echo $i ?>voie<?php echo $ref ?>" class="form-select w-auto" aria-label="Default select example" style="display:none">
                                <?php
                                $lesPrecisions = getPrecisionNiv1($ref);
                                if (!empty($lesPrecisions[$i]['idPrecision'])) {
                                    if ($lesPrecisions[$i]['idPrecision'] == 23) {
                                ?>
                                        <option selected hidden value="23">Rebouchage d’un nid de poule </option>
                                        <option value="none" disabled hidden>Choisir une précision</option>
                                        <option value="23">Rebouchage d’un nid de poule </option>
                                        <option value="24">Épandage d’absorbant sur la chaussée </option>
                                        <option value="22">Autres </option>
                                        <option value="supp">
                                            Supprimer
                                        </option>
                                        <?php

                                    } else {
                                        if ($lesPrecisions[$i]['idPrecision'] == 24) {
                                        ?>
                                            <option selected hidden value="24">Épandage d’absorbant sur la chaussée </option>
                                            <option value="none" disabled hidden>Choisir une précision</option>
                                            <option value="23">Rebouchage d’un nid de poule </option>
                                            <option value="24">Épandage d’absorbant sur la chaussée </option>
                                            <option value="22">Autres </option>
                                            <option value="supp">
                                                Supprimer
                                            </option>
                                            <?php


                                        } else {
                                            if ($lesPrecisions[$i]['idPrecision'] == 22) {
                                            ?>
                                                <option selected hidden value="22">Autres </option>
                                                <option value="none" disabled hidden>Choisir une précision</option>
                                                <option value="23">Rebouchage d’un nid de poule </option>
                                                <option value="24">Épandage d’absorbant sur la chaussée </option>
                                                <option value="22">Autres </option>
                                                <option value="supp">
                                                    Supprimer
                                                </option>
                                            <?php

                                            } else {
                                            ?>
                                                <option value="none" hidden>Choisir une précision</option>
                                                <option value="23">Rebouchage d’un nid de poule </option>
                                                <option value="24">Épandage d’absorbant sur la chaussée </option>
                                                <option value="22">Autres </option>
                                    <?php
                                            }
                                        }
                                    }
                                } else {
                                    ?>

                                    <option value="none" selected hidden>Choisir une précision</option>


                                    <?php
                                    foreach ($lesChausseeNotIn as $uneChaussee) {
                                    ?>
                                        <option value="<?php echo $uneChaussee['idPrecision']; ?>"><?php echo $uneChaussee['libellePrecision']; ?></option>
                                <?php



                                    }
                                }

                                ?>
                            </select>
                        <?php

                        }
                        ?>
                    </div>
                </td>
                <td>

                </td>
                <td>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="Submit">Sauvegarder</button>
                        <button type="button" class="btn btn-outline-primary">Editer</button>
                    </div>
                </td>


            </form>
        </tr>

    <?php
    }


    ?>
</table>

</div>

<script src="assets/js/js_fiche_intervention.js"></script>
<script src="assets/js/js_fiche_precision.js"></script>