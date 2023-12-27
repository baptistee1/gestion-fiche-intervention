<div id ="fiches">
<h1>Modification</h1>
    <?php
            $ref=$laLigne['ref'];
            $date=$laLigne['date'];
            $heureAppel=$laLigne['heure appel'];
            $origineAppel=$laLigne['origine appel'];
            $axe=$laLigne['axe'];
            $sens=$laLigne['sens'];
            $localisation=$laLigne['localisation'];
            $heureDebut=$laLigne['heure debut'];
            $heureFin=$laLigne['heure fin'];
            $typeIntervention=$laLigne['type intervention'];
            ?>
            <table class="table table-white">
                <tr>
                    <th scope="col">Référence</th>
                    <th scope="col">Date</th>
                    <th scope="col">Heure d'appel</th>
                    <th scope="col">Origine de l'appel</th>
                    <th scope="col">Axe</th>
                    <th scope="col">Sens</th>
                    <th scope="col">Localisation</th>
                    <th scope="col">Voies</th>
                    <th scope="col">Heure de début</th>
                    <th scope="col">Heure de fin</th>
                    <th scope="col">Type intervention</th>
                    <th scope="col">Précision de type 1</th>
                    <th scope="col"></th>
                </tr>
                <tr>
                    <form action="index.php?uc=intervention&action=modificationFiche" method="post">
                    <th scope="col"><input type="text" class="form-control-plaintext" id="reference" name="reference" value="<?php echo $ref ?>"></th>
                    <td><input type="date" class="form-control" id="date" name="date" value="<?php echo $date ?>"></td>
                    <td><input type="time" class="form-control" id="heureAppel" name="heureAppel" value="<?php echo $heureAppel ?>"></td>
                    <td>
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
                    </td>
                    <td><input type="text" class="form-control" id="axe" name="axe" value="<?php echo $axe ?>"></td>
                    <td> 
                        <select name="sens" id="sens" class="form-select" aria-label="Default select example">
                            <option value="<?php echo $sens ?>" selected hidden><?php echo $sens ?></option>
                            <option value="W">W</option>
                            <option value="Y">Y</option>
                            <option value="INT">INT</option>
                            <option value="EXT">EXT</option>
                        </select>
                    </td>
                    <td><input type="text" class="form-control" id="localisation" name="localisation" value="<?php echo $localisation ?>"></td>
                    <td>
                    <?php
                            $lesVoies=getVoies($ref);
                            foreach($lesVoies as $uneVoie){
                                $voie=$uneVoie['voie'];

                        ?>
                            <select name="voie" id="voie" class="form-select w-auto" aria-label="Default select example">
                                <option value="<?php echo $voie ?>" selected hidden><?php echo $voie ?></option>
                                <option value="BAU">BAU</option>
                                <option value="Voie lente">Voie lente</option>
                                <option value="Voie médiane">Voie médiane</option>
                                <option value="Voie rapide">Voie rapide</option>
                                <option value="TPC">TPC</option>
                                <option value="Accotement">Accotement</option>
                            </select>
                        <?php
                            }
                        ?>
                    </td>
                    <td><input type="time" class="form-control" id="heureDebut" name="heureDebut" value="<?php echo $heureDebut ?>"></td>
                    <td><input type="time" class="form-control" id="heureFin" name="heureFin" value="<?php echo $heureFin ?>"></td>
                    <td>
                        <select name="type" id="type" class="form-select w-auto" aria-label="Default select example">
                            <option value="<?php echo $typeIntervention ?>" selected hidden><?php echo $typeIntervention ?></option>
                            <option value="Accident">Accident</option>
                            <option value="Animaux">Animaux</option>
                            <option value="Bouchon">Bouchon</option>
                            <option value="Intempéries">Intempéries</option>
                            <option value="Obstacle mobile ou fixe">Obstacle mobile ou fixe</option>
                            <option value="Véhicule en panne">Véhicule en panne</option>
                            <option value="Balisage">Balisage</option>
                            <option value="Chaussée">Chaussée</option>
                            <option value="Autre">Autre</option>
                    </td>
                    <td>
                        <?php
                            $lesPrecisions=getPrecisionNiv1($ref);
                            foreach($lesPrecisions as $unePrecision){
                                $precision1=$unePrecision['precision1'];
                        ?>
                            <input type="text" class="form-control" id="precision1" name="precision1" value="<?php echo $precision1 ?>">
                        <?php
                            }
                        ?>
                    </td>
                    <td><button type="submit" class="btn btn-primary">Editer</button></td>

                    </form>

                </tr>

            </table>

</div>