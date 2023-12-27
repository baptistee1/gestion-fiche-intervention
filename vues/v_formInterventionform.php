<?php
$idsFiches = getCreer($_SESSION['idCEI']);
//var_dump($lesInfos);
//var_dump($lesVoies);
$axe = $lesInfos['axeInter'];
$circonstance = $lesInfos['circonstanceInter'];
$commentaire = $lesInfos['commentaireInter'];
$date = $lesInfos['dateInter'];
$chaussee = $lesInfos['etatChausseeInter'];
$heureArriver = $lesInfos['heureArriveeInter'];
$heureDebut = $lesInfos['heureDebutInter'];
$heureDepart = $lesInfos['heureDepartInter'];
$heureFin = $lesInfos['heureFinInter'];
$heure = $lesInfos['heureInter'];
$id = $lesInfos['idInter'];
$localisation = $lesInfos['localisationInter'];
$origine = $lesInfos['origineInter'];
$presenceTiers = $lesInfos['presenceTiers'];
$sens = $lesInfos['sensIntervention'];
$type = $lesInfos['typeInter'];
$cei = $lesInfos['idCEI'];
$DDP = $lesInfos['idDDP'];
$commune = $lesInfos['communeInter'];
foreach ($lesVoies as $uneVoie) {
    $tab[] = $uneVoie['libelleVoie'];
}
//var_dump($tab);
//var_dump($lesMoyensMat);
foreach ($lesMoyens as $unMoyen) {
    $tabMoyen[] = $unMoyen['idMoyensHumains'];
}
//var_dump($tabMoyen);

foreach ($lesMoyensMat as $unMoyenMat) {
    $tabMoyenMat[] = $unMoyenMat['idMoyensMateriels'];
}
//var_dump($tabMoyenMat);

?>


<?php ?>
<div class="container-fluid">
    <form action="index.php?uc=formIntervention&action=enregistrerFormulaireIntervention&fiche=<?php echo $_GET['fiche'] ?>" method="post">

        <div class="card">
            <div class="card-body">
                <h2>Origine de l'appel</h2>

                <label for="dateInter">Date:</label>
                <div class="col-1">
                    <input class="form-control" type="date" id="dateInter" name="dateInter" value="<?php echo $date ?>">
                </div>


                <label for="heureInter">Heure de l'appel :</label>
                <div class="col-1">
                    <input class="form-control" type="time" id="heureInter" name="heureInter" value="<?php echo $heure ?>">
                </div>
                <fieldset>
                    <legend>Origine de l'appel :</legend>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="OrigneOption" id="OST" value="OST" <?php if ($origine == "OST") {
                                                                                                                    echo 'checked';
                                                                                                                } ?>>
                        <label class="form-check-label" for="OST">OST</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="OrigneOption" id="Police" value="Police" <?php if ($origine == "Police") {
                                                                                                                        echo 'checked';
                                                                                                                    } ?>>
                        <label class="form-check-label" for="Police">Police</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="OrigneOption" id="Gendarmerie" value="Gendarmerie" <?php if ($origine == "Gendarmerie") {
                                                                                                                                    echo 'checked';
                                                                                                                                } ?>>
                        <label class="form-check-label" for="Gendarmerie">Gendarmerie</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="OrigneOption" id="Pompiers" value="Pompiers" <?php if ($origine == "Pompiers") {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>>
                        <label class="form-check-label" for="Pompiers">Pompiers</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="OrigneOption" id="Dépanneurs" value="Dépanneurs" <?php if ($origine == "Dépanneurs") {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                        <label class="form-check-label" for="Dépanneurs">Dépanneurs</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="OrigneOption" id="GestionnairesRéseau" value="GestionnairesRéseau" <?php if ($origine == "Autres gestionnaires de réseau") {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                        <label class="form-check-label" for="GestionnairesRéseau">Autres gestionnaires de réseau</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="OrigneOption" id="Usagers" value="Usagers" <?php if ($origine == "Usagers") {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>>
                        <label class="form-check-label" for="Usagers">Usagers</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="OrigneOption" id="RI" value="RI" <?php if ($origine == "RI") {
                                                                                                                echo 'checked';
                                                                                                            } ?>>
                        <label class="form-check-label" for="RI">RI</label>
                    </div>

                </fieldset>

                <label for="commentaire">Commentaire:</label>
                <div class="col-5">
                    <input class="form-control" type="text" id="Commentaire" name="Commentaire" value="<?php echo $commentaire ?>">
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h2>Lieu d'intervention</h2>
                <label for="axe">Axe:</label>
                <div class="col-5">
                    <input class="form-control" type="text" id="Axe" name="Axe" value="<?php echo $axe ?>">
                </div>
                <fieldset>
                    <legend>Voie :</legend>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="BAU" id="BAU" value="BAU" <?php $res = verifVoie($tab, 'BAU');
                                                                                                        echo $res
                                                                                                        ?>>
                        <label class="form-check-label" for="BAU">BAU</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="VoieLente" id="VoieLente" value="VoieLente" <?php $res = verifVoie($tab, 'Voie lente');
                                                                                                                        echo $res
                                                                                                                        ?>>
                        <label class="form-check-label" for="VoieLente">Voie lente</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="VoieMédiane" id="VoieMédiane" value="VoieMédiane" <?php $res = verifVoie($tab, 'Voie médiane');
                                                                                                                                echo $res
                                                                                                                                ?>>
                        <label class="form-check-label" for="VoieMédiane">Voie médiane</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="VoieRapide" id="VoieRapide" value="VoieRapide" <?php $res = verifVoie($tab, 'Voie rapide');
                                                                                                                            echo $res
                                                                                                                            ?>>
                        <label class="form-check-label" for="VoieRapide">Voie rapide</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="TPC" id="TPC" value="TPC" <?php $res = verifVoie($tab, 'TPC');
                                                                                                        echo $res
                                                                                                        ?>>
                        <label class="form-check-label" for="TPC">TPC</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Accotement" id="Accotement" value="Accotement" <?php $res = verifVoie($tab, 'Accotement');
                                                                                                                            echo $res
                                                                                                                            ?>>
                        <label class="form-check-label" for="Accotement">Accotement</label>
                    </div>

                </fieldset>

                <fieldset>
                    <legend>Sens :</legend>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="SensOption" id="W" value="W" <?php if ($sens == "W") {
                                                                                                            echo 'checked';
                                                                                                        } ?>>
                        <label class="form-check-label" for="W">W</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="SensOption" id="Y" value="Y" <?php if ($sens == "Y") {
                                                                                                            echo 'checked';
                                                                                                        } ?>>
                        <label class="form-check-label" for="Y">Y</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="SensOption" id="INT" value="INT" <?php if ($sens == "INT") {
                                                                                                                echo 'checked';
                                                                                                            } ?>>
                        <label class="form-check-label" for="INT">INT</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="SensOption" id="EXT" value="EXT" <?php if ($sens == "EXT") {
                                                                                                                echo 'checked';
                                                                                                            } ?>>
                        <label class="form-check-label" for="EXT">EXT</label>
                    </div>

                </fieldset>

                <label for="Localisation">Localisation :</label>
                <div class="col-5">
                    <input class="form-control" type="text" id="localisation" name="localisation" value="<?php echo $localisation ?>">
                </div>
                <label for="Commune">Commune :</label>
                <div class="col-5">
                    <input class="form-control" type="text" id="Commune" name="Commune" value="<?php echo $commune ?>">
                </div>
                <label for="heureArrivee">Horraire d'arrivée sur site :</label>
                <div class="col-1">
                    <input class="form-control" type="time" id="heureArrivee" name="heureArrivee" value="<?php echo $heureArriver ?>" required>
                </div>
                <label for="heureDepart">Horraire de départ sur site :</label>
                <div class="col-1">
                    <input class="form-control" type="time" id="heureDepart" name="heureDepart" value="<?php echo $heureDepart ?>" required>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h2>Moyens utilisés pour l'intervention</h2>
                    <fieldset>
                        <legend>Moyens humains :</legend>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ChefEquipe" id="ChefEquipe" value="1" <?php if (!empty($tabMoyen)) {
                                                                                                                            $res = verifMoyen($tabMoyen, 1);
                                                                                                                            echo $res;
                                                                                                                        }
                                                                                                                        ?>>
                            <label class="form-check-label" for="ChefEquipe">Chef d'equipe</label>
                        </div>

                        <div class="col-1">
                            <input class="form-control" type="number" id="nbChefEquipe" name="nbChefEquipe" min=1 value="<?php foreach ($lesMoyens as $unMoyen) {
                                                                                                                                if ($unMoyen['idMoyensHumains'] == 1) {
                                                                                                                                    echo $unMoyen['nbMoyens'];
                                                                                                                                }
                                                                                                                            } ?>">
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="AgentExploit" id="AgentExploit" value="2" <?php if (!empty($tabMoyen)) {
                                                                                                                                $res = verifMoyen($tabMoyen, 2);
                                                                                                                                echo $res;
                                                                                                                            }
                                                                                                                            ?>>
                            <label class="form-check-label" for="AgentExploit">Agent d'exploitation</label>
                        </div>

                        <div class="col-1">
                            <input class="form-control" type="number" id="nbAgentExploit" name="nbAgentExploit" min=1 value="<?php foreach ($lesMoyens as $unMoyen) {
                                                                                                                                    if ($unMoyen['idMoyensHumains'] == 2) {
                                                                                                                                        echo $unMoyen['nbMoyens'];
                                                                                                                                    }
                                                                                                                                } ?>">
                        </div>

                    </fieldset>

                    <fieldset>
                        <legend>Moyens matériels :</legend>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="VL" id="VL" value="1" <?php if (!empty($tabMoyenMat)) {
                                                                                                            $res = verifMoyenMat($tabMoyenMat, 1);
                                                                                                            echo $res;
                                                                                                        }
                                                                                                        ?>>
                            <label class="form-check-label" for="VL">VL</label>
                        </div>

                        <div class="col-1">
                            <input class="form-control" type="number" id="nbVL" name="nbVL55" min=1 value="<?php foreach ($lesMoyensMat as $unMoyenMat) {
                                                                                                                if ($unMoyenMat['idMoyensMateriels'] == 1) {
                                                                                                                    echo $unMoyenMat['nbMoyensMatériels'];
                                                                                                                }
                                                                                                            } ?>">
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="VUL" id="VUL" value="2" <?php if (!empty($tabMoyenMat)) {
                                                                                                            $res = verifMoyenMat($tabMoyenMat, 2);
                                                                                                            echo $res;
                                                                                                        }
                                                                                                        ?>>
                            <label class="form-check-label" for="VUL">VUL</label>
                        </div>

                        <div class="col-1">
                            <input class="form-control" type="number" id="nbVUL" name="nbVUL55" min=1 value="<?php foreach ($lesMoyensMat as $unMoyenMat) {
                                                                                                                    if ($unMoyenMat['idMoyensMateriels'] == 2) {
                                                                                                                        echo $unMoyenMat['nbMoyensMatériels'];
                                                                                                                    }
                                                                                                                } ?>">
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Trafic/Partner" id="Trafic/Partner" value="3" <?php if (!empty($tabMoyenMat)) {
                                                                                                                                    $res = verifMoyenMat($tabMoyenMat, 3);
                                                                                                                                    echo $res;
                                                                                                                                }
                                                                                                                                ?>>
                            <label class="form-check-label" for="VUL">Trafic/Partner</label>
                        </div>

                        <div class="col-1">
                            <input class="form-control" type="number" id="nbTrafic/Partner" name="nbTrafic/Partner" min=1 value="<?php foreach ($lesMoyensMat as $unMoyenMat) {
                                                                                                                                        if ($unMoyenMat['idMoyensMateriels'] == 3) {
                                                                                                                                            echo $unMoyenMat['nbMoyensMatériels'];
                                                                                                                                        }
                                                                                                                                    } ?>">
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="FLR" id="FLR" value="4" <?php if (!empty($tabMoyenMat)) {
                                                                                                            $res = verifMoyenMat($tabMoyenMat, 4);
                                                                                                            echo $res;
                                                                                                        }
                                                                                                        ?>>
                            <label class="form-check-label" for="FLR">FLR</label>
                        </div>

                        <div class="col-1">
                            <input class="form-control" type="number" id="nbFLR" name="nbFLR" min=1 value="<?php foreach ($lesMoyensMat as $unMoyenMat) {
                                                                                                                if ($unMoyenMat['idMoyensMateriels'] == 4) {
                                                                                                                    echo $unMoyenMat['nbMoyensMatériels'];
                                                                                                                }
                                                                                                            } ?>">

                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="SacSeau" id="SacSeau" value="5" <?php if (!empty($tabMoyenMat)) {
                                                                                                                    $res = verifMoyenMat($tabMoyenMat, 5);
                                                                                                                    echo $res;
                                                                                                                }
                                                                                                                ?>>
                            <label class="form-check-label" for="SacSeau">Sac ou seau d’absorbant</label>
                        </div>
                        <div>

                            <div class="col-1">
                                <input class="form-control" type="number" id="nbSacSeau" name="nbSacSeau" min=1 value="<?php foreach ($lesMoyensMat as $unMoyenMat) {
                                                                                                                            if ($unMoyenMat['idMoyensMateriels'] == 5) {
                                                                                                                                echo $unMoyenMat['nbMoyensMatériels'];
                                                                                                                            }
                                                                                                                        } ?>">
                            </div>

                        </div>

                    </fieldset>

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h2>Environnement</h2>
                    <fieldset>
                        <legend>Etat de la chaussee :</legend>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ChausseeOption" id="ChausseeSeche" value="Chaussée sèche" <?php if ($chaussee == "Chaussée sèche") {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                            <label class="form-check-label" for="ChausseeSeche">Chaussée sèche</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ChausseeOption" id="ChausseeMouillee" value="Chaussée mouillée" <?php if ($chaussee == "Chaussée mouillée") {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                            <label class="form-check-label" for="ChausseeMouillee">Chaussée mouillée</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ChausseeOption" id="ChausseeHumide" value="Chaussée humide" <?php if ($chaussee == "Chaussée humide") {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                            <label class="form-check-label" for="ChausseeHumide">Chaussée humide</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ChausseeOption" id="ChausseeRuisselante" value="Chaussée ruisselante" <?php if ($chaussee == "Chaussée ruisselante") {
                                                                                                                                                            echo 'checked';
                                                                                                                                                        } ?>>
                            <label class="form-check-label" for="ChausseeRuisselante">Chaussée ruisselante</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ChausseeOption" id="ChausseeVerglacee" value="Chaussée verglacée" <?php if ($chaussee == "Chaussée verglacée") {
                                                                                                                                                        echo 'checked';
                                                                                                                                                    } ?>>
                            <label class="form-check-label" for="ChausseeVerglacee">Chaussée verglacée</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ChausseeOption" id="ChausseeEnneigée" value="Chaussée enneigée" <?php if ($chaussee == "Chaussée enneigée") {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                            <label class="form-check-label" for="ChausseeEnneigée">Chaussée enneigée</label>
                        </div>

                    </fieldset>

                    <fieldset>
                        <legend>Conditions météorologiques :</legend>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="RAS" id="RAS" value="1">
                            <label class="formcheck-label" for="RAS">RAS</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Pluie" id="Pluie" value="2">
                            <label class="form-check-label" for="Pluie">Pluie</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Neige" id="Neige" value="3">
                            <label class="form-check-label" for="Neige">Neige</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Brouillard" id="Brouillard" value="4">
                            <label class="form-check-label" for="Brouillard">Brouillard</label>
                        </div>
                    </fieldset>

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h2>Intervention</h2>
                    <label for="heureDebutInter">heureDebutInter</label>
                    <div class="col-1">
                        <input class="form-control" type="time" id="heureDebutInter" name="heureDebutInter" value="<?php echo $heureDebut ?>">
                    </div>


                    <label for="heureFinInter">heureFinInter</label>
                    <div class="col-1">
                        <input class="form-control" type="time" id="heureFinInter" name="heureFinInter" value="<?php echo $heureFin ?>">
                    </div>


                    <fieldset>
                        <legend>Type Intervention :</legend>

                        <div>
                            <input type="checkbox" id="Accident" name="Accident" value="Accident" onclick="showPrecisionAccident()" <?php if ($type == "Accident") {
                                                                                                                                        echo 'checked';
                                                                                                                                    } ?>>
                            <label for="Accident">Accident</label>
                        </div>

                        <div>
                            <input type="checkbox" id="Animal" name="Animal" value="Animal" onclick="showPrecisionAnimal()" <?php if ($type == "Animal") {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                            <label for="Animal">Animal</label>
                        </div>

                        <div>
                            <input type="checkbox" id="Bouchon" name="Bouchon" value=" Bouchon" onclick="showPrecisionBouchon()" <?php if ($type == "Bouchon") {
                                                                                                                                        echo 'checked';
                                                                                                                                    } ?>>
                            <label for="Bouchon">Bouchon</label>
                        </div>

                        <div>
                            <input type="checkbox" id="Intempéries" name="Intempéries" value="Intempéries" onclick="showPrecisionIntemp()" <?php if ($type == "Intempéries") {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                            <label for="Intempéries">Intempéries</label>
                        </div>

                        <div>
                            <input type="checkbox" id="Obstacles" name="Obstacles" value="Obstacles mobiles ou fixes" onclick="showPrecisionObstacles()" <?php if ($type == "Obstacles mobiles ou fixes") {
                                                                                                                                                                echo 'checked';
                                                                                                                                                            } ?>>
                            <label for="Obstacles">Obstacles mobiles ou fixes</label>
                        </div>

                        <div>
                            <input type="checkbox" id="VéhiculePanne" name="VéhiculePanne" value=" Véhicule en panne" <?php if ($type == "Véhicule en panne") {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>>
                            <label for="VéhiculePanne">Véhicule en panne</label>
                        </div>

                        <div>
                            <input type="checkbox" id="Balisage" name="Balisage" value="Balisage" onclick="showPrecisionBalisages()" <?php if ($type == "Balisage") {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                            <label for="Balisage">Balisage</label>
                        </div>

                        <div>
                            <input type="checkbox" id="Chaussée" name="Chaussée" value="Chaussée" onclick="showPrecisionChaussee()" <?php if ($type == "Chaussée") {
                                                                                                                                        echo 'checked';
                                                                                                                                    } ?>>
                            <label for="Chaussée">Chaussée</label>
                        </div>
                    </fieldset>

                    <div id="precisionAccident" style="display:none">
                        <fieldset>
                            <legend>Précision de niveau 1 :</legend>

                            <div>
                                <input type="checkbox" id="Matériel" name="Matériel">
                                <label for="Matériel">Matériel</label>
                            </div>

                            <div>
                                <input type="checkbox" id="Corporel" name="Corporel">
                                <label for="Corporel">Corporel</label>
                            </div>

                            <div>
                                <input type="checkbox" id="Mortel" name="Mortel">
                                <label for="Mortel">Mortel</label>
                            </div>

                        </fieldset>
                    </div>

                    <div id="precisionAnimal" style="display:none">
                        <fieldset>
                            <legend>Précision de niveau 1 :</legend>

                            <div>
                                <input type="checkbox" id="AnimalErrant" name="AnimalErrant" onclick="showPrecisionAnimalErrant()">
                                <label for="AnimalErrant">AnimalErrant</label>
                            </div>

                            <div>
                                <input type="checkbox" id="AnimalMort" name="AnimalMort" onclick="showPrecisionAnimalMort()">
                                <label for="AnimalMort">AnimalMort</label>
                            </div>
                        </fieldset>
                    </div>

                    <div id="precisionBouchon" style="display:none">
                        <fieldset>
                            <legend>Précision de niveau 1 :</legend>

                            <div>
                                <input type="checkbox" id="Ralentissement" name="Ralentissement">
                                <label for="Ralentissement">Ralentissement</label>
                            </div>

                            <div>
                                <input type="checkbox" id="CirculationsAccordéons" name="CirculationsAccordéons">
                                <label for="CirculationsAccordéons">CirculationsAccordéons</label>
                            </div>

                            <div>
                                <input type="checkbox" id="CirculationsArrêt" name="CirculationsArrêt">
                                <label for="CirculationsArrêt">CirculationsArrêt</label>
                            </div>
                        </fieldset>
                    </div>


                    <div id="precisionIntemp" style="display:none">
                        <fieldset>
                            <legend>Précision de niveau 1 :</legend>

                            <div>
                                <input type="checkbox" id="VentViolent" name="VentViolent">
                                <label for="VentViolent">Vent Violent</label>
                            </div>

                            <div>
                                <input type="checkbox" id="PluieViolente" name="PluieViolente">
                                <label for="PluieViolente">Pluie violente</label>
                            </div>

                            <div>
                                <input type="checkbox" id="ChuteNeige" name="ChuteNeige">
                                <label for="ChuteNeige">Chutes de neige violente </label>
                            </div>

                            <div>
                                <input type="checkbox" id="Inondation" name="Inondation">
                                <label for="Inondation">Inondation</label>
                            </div>

                            <div>
                                <input type="checkbox" id="Incendie" name="Incendie">
                                <label for="Incendie">Incendie</label>
                            </div>

                        </fieldset>
                    </div>

                    <div id="precisionObstacles" style="display:none">
                        <fieldset>
                            <legend>Précision de niveau 1 :</legend>

                            <div>
                                <input type="checkbox" id="ChausseeGlissante" name="ChausseeGlissante" onclick="showPrecisionChausseeGlissante()">
                                <label for="ChausseeGlissante">Chaussée glissante et produits sur la route</label>
                            </div>

                            <div>
                                <input type="checkbox" id="EvenementInopines" name="EvenementInopines" onclick="showPrecisionEvenementInopines()">
                                <label for="EvenementInopines">Événements inopinés</label>
                            </div>

                            <div>
                                <input type="checkbox" id="Obstacles" name="Obstacles" onclick="showPrecision2Obstacles()">
                                <label for="Obstacles">Obstacles</label>
                            </div>

                            <div>
                                <input type="checkbox" id="PietonCycliste" name="PietonCycliste" onclick="showPrecisionPietonCycliste()">
                                <label for="PietonCycliste">Piéton-Cycliste</label>
                            </div>

                            <div>
                                <input type="checkbox" id="VéhiculeGenant" name="VéhiculeGenant" onclick="showPrecisionVéhiculeGenant()">
                                <label for="VéhiculeGenant">Véhicule gênant </label>
                            </div>

                            <div>
                                <input type="checkbox" id="VehiculeContresens" name="VehiculeContresens" onclick="showPrecisionVehiculeContresens()">
                                <label for="VehiculeContresens">Véhicule à contresens</label>
                            </div>

                            <div>
                                <input type="checkbox" id="VehiculeArrete" name="VehiculeArrete">
                                <label for="VehiculeArrete">Véhicule arrêté</label>
                            </div>

                        </fieldset>



                    </div>

                    <div id="precisionBalisage" style="display:none">
                        <fieldset>
                            <legend>Précision de niveau 1 :</legend>

                            <div>
                                <input type="checkbox" id="VéhiculeBalisage" name="VéhiculeBalisage">
                                <label for="VéhiculeBalisage">Introduction d’un véhicule dans le balisage</label>
                            </div>

                            <div>1
                                <input type="checkbox" id="Autres" name="Autres3">
                                <label for="Autres">Autres</label>
                            </div>

                        </fieldset>
                    </div>

                    <div id="precisionChaussee" style="display:none">
                        <fieldset>
                            <legend>Précision de niveau 1 :</legend>

                            <div>
                                <input type="checkbox" id="RebouchageNDP" name="RebouchageNDP">
                                <label for="RebouchageNDP">Rebouchage d’un nid de poule </label>
                            </div>

                            <div>
                                <input type="checkbox" id="EpandageAbsorbant" name="EpandageAbsorbant">
                                <label for="EpandageAbsorbant">Épandage d’absorbant sur la chaussée </label>
                            </div>

                            <div>
                                <input type="checkbox" id="Autres" name="Autres4">
                                <label for="Autres">Autres</label>
                            </div>

                        </fieldset>
                    </div>

                    <div id="precisionAnimalErrant" style="display:none">
                        <fieldset>
                            <legend>Précision de niveau 2 :</legend>

                            <div>
                                <input type="checkbox" id="Sauvage" name="Sauvage1">
                                <label for="Sauvage">Sauvage</label>
                            </div>

                            <div>
                                <input type="checkbox" id="Domestique" name="Domestique1">
                                <label for="Domestique">Domestique</label>
                            </div>

                            <div>
                                <input type="checkbox" id="Élevage" name="Élevage1">
                                <label for="Élevage">Élevage</label>
                            </div>

                        </fieldset>
                    </div>

                    <div id="precisionAnimalMort" style="display:none">
                        <fieldset>
                            <legend>Précision de niveau 2 :</legend>

                            <div>
                                <input type="checkbox" id="Sauvage" name="Sauvage2">
                                <label for="Sauvage">Sauvage</label>
                            </div>

                            <div>
                                <input type="checkbox" id="Domestique" name="Domestique2">
                                <label for="Domestique">Domestique</label>
                            </div>

                            <div>
                                <input type="checkbox" id="Élevage" name="Élevage2">
                                <label for="Élevage">Élevage</label>
                            </div>

                        </fieldset>
                    </div>

                    <div id="precisionChausseeGlissante" style="display:none">
                        <fieldset>
                            <legend>Précision de niveau 2 :</legend>

                            <div>
                                <input type="checkbox" id="Eau" name="Eau">
                                <label for="Eau">Eau</label>
                            </div>

                            <div>
                                <input type="checkbox" id="Hydrocarbures" name="Hydrocarbures">
                                <label for="Hydrocarbures">Hydrocarbures</label>
                            </div>

                            <div>
                                <input type="checkbox" id="ProduitsChimiques" name="ProduitsChimiques">
                                <label for="ProduitsChimiques">Produits chimiques/toxiques</label>
                            </div>

                            <div>
                                <input type="checkbox" id="Graviers" name="Graviers">
                                <label for="Graviers">Graviers etc.</label>
                            </div>

                            <div>
                                <input type="checkbox" id="Boue" name="Boue">
                                <label for="Boue">Boue</label>
                            </div>

                        </fieldset>
                    </div>


                    <div id="precisionEvenementInopines" style="display:none">
                        <fieldset>
                            <legend>Précision de niveau 2 :</legend>

                            <div>
                                <input type="checkbox" id="Inondation" name="Inondation">
                                <label for="Inondation">Inondation</label>
                            </div>

                            <div>
                                <input type="checkbox" id="Éboulement" name="Éboulement">
                                <label for="Éboulement">Éboulement</label>
                            </div>

                            <div>
                                <input type="checkbox" id="Manifestation" name="Manifestation">
                                <label for="Manifestation">Manifestation</label>
                            </div>

                            <div>
                                <input type="checkbox" id="Autres" name="Autres5">
                                <label for="Autres">Autres</label>
                            </div>
                        </fieldset>
                    </div>


                    <div id="precisionObstacles" style="display:none">
                        <fieldset>
                            <legend>Précision de niveau 2 :</legend>

                            <div>
                                <input type="checkbox" id="Objets" name="Objets">
                                <label for="Objets">Objets</label>
                            </div>

                            <div>
                                <input type="checkbox" id="Cônes" name="Cônes">
                                <label for="Cônes">Cônes</label>
                            </div>

                            <div>
                                <input type="checkbox" id="Autres" name="Autres6">
                                <label for="Autres">Autres</label>
                            </div>

                        </fieldset>
                    </div>


                    <div id="precisionVéhiculeGenant" style="display:none">
                        <fieldset>
                            <legend>Précision de niveau 2 :</legend>

                            <div>
                                <input type="checkbox" id="VehiculeDifficulté" name="VehiculeDifficulté">
                                <label for="VehiculeDifficulté">Véhicule en difficulté</label>
                            </div>

                            <div>
                                <input type="checkbox" id="VéhiculeNonAutor" name="VéhiculeNonAutor">
                                <label for="VéhiculeNonAutor">Véhicule non autorisé</label>
                            </div>

                            <div>
                                <input type="checkbox" id="Autres" name="Autres7">
                                <label for="Autres">Autres</label>
                            </div>

                        </fieldset>
                    </div>

                    <div id="precisionPietonCycliste" style="display:none">
                        <fieldset>
                            <legend>Précision de niveau 2 :</legend>

                            <div>
                                <input type="checkbox" id="Piéton" name="Piéton">
                                <label for="Piéton">Piéton</label>
                            </div>

                            <div>
                                <input type="checkbox" id="Cycliste" name="Cycliste">
                                <label for="Cycliste">Cycliste</label>
                            </div>

                            <div>
                                <input type="checkbox" id="Trottinette" name="Trottinette">
                                <label for="Trottinette">Trottinette</label>
                            </div>

                            <div>
                                <input type="checkbox" id="Autre" name="Autre6">
                                <label for="Autre">Autre</label>
                            </div>

                        </fieldset>
                    </div>

                    <div id="precisionVehiculeContresens" style="display:none">
                        <fieldset>
                            <legend>Précision de niveau 2 :</legend>

                            <div>
                                <input type="checkbox" id="VéhiculeArrete" name="VéhiculeArrete">
                                <label for="VéhiculeArrete">Véhicule arrêté</label>
                            </div>

                            <div>
                                <input type="checkbox" id="VéhiculeAbandonne" name="VéhiculeAbandonne">
                                <label for="VéhiculeAbandonne">Véhicule abandonné</label>
                            </div>

                            <div>
                                <input type="checkbox" id="VéhiculeFeu" name="VéhiculeFeu">
                                <label for="VéhiculeFeu">Véhicule en feu</label>
                            </div>

                            <div>
                                <input type="checkbox" id="Autre" name="Autre7">
                                <label for="Autre">Autre</label>
                            </div>

                        </fieldset>
                    </div>

                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h2>Dégâts au domaine public</h2>
                    <fieldset>
                        <legend>DDP :</legend>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="DDPOption" id="Oui">
                            <label class="form-check-label" for="Oui">Oui</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="DDPOption" id="Non">
                            <label class="form-check-label" for="Non">Non</label>
                        </div>

                    </fieldset>

                    <fieldset>
                        <legend>Présence du tiers à l'origine des DDP sur les lieux :</legend>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PresenceTiersOption" id="Oui">
                            <label class="form-check-label" for="Oui">Oui</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="PresenceTiersOption" id="Non">
                            <label class="form-check-label" for="Non">Non</label>
                        </div>

                    </fieldset>
                </div>
            </div>
            <?php if ($_SESSION['habilitation'] == 'CEI') {
                foreach ($idsFiches as $idFiche) {
                    if ($idFiche['UTIL_id'] == $_SESSION['idUtil']) {
                        if ($idFiche['idInter'] == $_GET['fiche']) {
            ?>
                            <button type="submit" class="btn btn-primary mt-2">Sauvegarder</button>
                <?php
                        }
                    }
                }
            } else {
                ?>
                <buttn type="submit" class="btn btn-primary mt-2">Sauvegarder</button>
                <?php

            }
                ?>

    </form>
</div>


<script src="assets/js/js_formInterventionForm.js"></script>