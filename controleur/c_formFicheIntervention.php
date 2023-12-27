
<?php
if (!isset($_REQUEST['action']) || empty($_REQUEST['action'])) {
    $action = "connexion";
} else {
    $action = $_REQUEST['action'];
}
include("vues/v_header.php");

switch ($action) {

    case 'voirFormulaireIntervention': {

            //var_dump($_GET['fiche']);
            $lesInfos = getAllInfosById($_GET['fiche']);
            $lesVoies = getVoies($_GET['fiche']);
            $lesMoyens = getAllMoyens($_GET['fiche']);
            $lesMoyensMat = getAllMoyensMat($_GET['fiche']);

            include("vues/v_formInterventionform.php");

            break;
        }

    case 'enregistrerFormulaireIntervention': {

            // Origine de l'appel
            if (isset($_POST['dateInter'])) {
                updateDate($_GET['fiche'], $_POST['dateInter']);
            }
            if (isset($_POST['heureInter'])) {
                updateHeureAppel($_GET['fiche'], $_POST['heureInter']);
            }

            // Origine de l'appel
            if (isset($_POST['OST'])) {
                updateOrigineAppel($_GET['fiche'], $_POST['OST']);
            }
            if (isset($_POST['Police'])) {
                updateOrigineAppel($_GET['fiche'], $_POST['Police']);
            }

            if (isset($_POST['Gendarmerie'])) {
                updateOrigineAppel($_GET['fiche'], $_POST['Gendarmerie']);
            }

            if (isset($_POST['Pompiers'])) {
                updateOrigineAppel($_GET['fiche'], $_POST['Pompiers']);
            }

            if (isset($_POST['Dépanneurs'])) {
                updateOrigineAppel($_GET['fiche'], $_POST['Dépanneurs']);
            }

            if (isset($_POST['GestionnairesRéseau'])) {
                updateOrigineAppel($_GET['fiche'], $_POST['GestionnairesRéseau']);
            }

            if (isset($_POST['Usagers'])) {
                updateOrigineAppel($_GET['fiche'], $_POST['Usagers']);
            }

            if (isset($_POST['RI'])) {
                updateOrigineAppel($_GET['fiche'], $_POST['RI']);
            }

            if (isset($_POST['Autres'])) {
                updateOrigineAppel($_GET['fiche'], $_POST['Autres']);
            }

            //commentaire
            if (isset($_POST['Commentaire'])) {
                updateObservation($_GET['fiche'], $_POST['Commentaire']);
            }

            //Lieu d'intervention
            //axe
            if (isset($_POST['Axe'])) {
                updateAxe($_GET['fiche'], $_POST['Axe']);
            }

            //voie
            if (isset($_POST['BAU'])) {
                if (!existeVoie($_GET['fiche'], 1)) {
                    insertVoie($_GET['fiche'], 1);
                }
            } else {
                deleteVoie($_GET['fiche'], 1);
            }

            if (isset($_POST['VoieLente'])) {
                if (!existeVoie($_GET['fiche'], 2)) {
                    insertVoie($_GET['fiche'], 2);
                }
            } else {
                deleteVoie($_GET['fiche'], 2);
            }

            if (isset($_POST['VoieMédiane'])) {
                if (!existeVoie($_GET['fiche'], 3)) {
                    insertVoie($_GET['fiche'], 3);
                }
            } else {
                deleteVoie($_GET['fiche'], 3);
            }

            if (isset($_POST['VoieRapide'])) {
                if (!existeVoie($_GET['fiche'], 4)) {
                    insertVoie($_GET['fiche'], 4);
                }
            } else {
                deleteVoie($_GET['fiche'], 4);
            }

            if (isset($_POST['Accotement'])) {
                if (!existeVoie($_GET['fiche'], 6)) {
                    insertVoie($_GET['fiche'], 6);
                }
            } else {
                deleteVoie($_GET['fiche'], 6);
            }

            if (isset($_POST['TPC'])) {
                if (!existeVoie($_GET['fiche'], 5)) {
                    insertVoie($_GET['fiche'], 5);
                }
            } else {
                deleteVoie($_GET['fiche'], 5);
            }

            //sens
            if (isset($_POST['W'])) {
                updateSens($_GET['fiche'], 'W');
            }

            if (isset($_POST['Y'])) {
                updateSens($_GET['fiche'], 'Y');
            }

            if (isset($_POST['INT'])) {
                updateSens($_GET['fiche'], 'INT');
            }

            if (isset($_POST['EXT'])) {
                updateSens($_GET['fiche'], 'EXT');
            }
            //Localisation
            if (isset($_POST['localisation'])) {
                updateLocalisation($_GET['fiche'], $_POST['localisation']);
            }

            if (isset($_POST['Commune'])) {
                updateCommune($_GET['fiche'], $_POST['Commune']);
            }

            if (isset($_POST['heureArrivee'])) {
                updateHeureArriver($_GET['fiche'], $_POST['heureArrivee']);
            }

            if (isset($_POST['heureDepart'])) {
                updateHeureDepart($_GET['fiche'], $_POST['heureDepart']);
            }

            //moyens humains

            if (isset($_POST['ChefEquipe'])) {
                if (!existeMoyens($_GET['fiche'], $_POST['ChefEquipe'])) {
                    insertMoyenHumain($_GET['fiche'], $_POST['ChefEquipe'], $_POST['nbChefEquipe']);
                } else {
                    updateMoyenHumain($_GET['fiche'], $_POST['ChefEquipe'], $_POST['nbChefEquipe']);
                }
            } else {
                deleteMoyen($_GET['fiche'], 1);
            }

            if (isset($_POST['AgentExploit'])) {
                if (!existeMoyens($_GET['fiche'], $_POST['AgentExploit'])) {
                    insertMoyenHumain($_GET['fiche'], $_POST['AgentExploit'], $_POST['nbAgentExploit']);
                } else {
                    updateMoyenHumain($_GET['fiche'], $_POST['AgentExploit'], $_POST['nbAgentExploit']);
                }
            } else {
                deleteMoyen($_GET['fiche'], 2);
            }

            // moyens matériels
            if (isset($_POST['VL'])) {
                if (!existeMoyensMat($_GET['fiche'], $_POST['VL'])) {

                    insertMoyenMat($_GET['fiche'], $_POST['VL'], $_POST['nbVL55']);
                } else {
                    updateMoyenMateriel($_GET['fiche'], $_POST['VL'], $_POST['nbVL55']);
                }
            } else {
                deleteMoyenMat($_GET['fiche'], 1);
            }

            if (isset($_POST['VUL'])) {
                if (!existeMoyensMat($_GET['fiche'], $_POST['VUL'])) {
                    insertMoyenMat($_GET['fiche'], $_POST['VUL'], $_POST['nbVUL55']);
                } else {
                    updateMoyenMateriel($_GET['fiche'], $_POST['VUL'], $_POST['nbVUL55']);
                }
            } else {
                deleteMoyenMat($_GET['fiche'], 2);
            }

            if (isset($_POST['Trafic/Partner'])) {
                if (!existeMoyensMat($_GET['fiche'], $_POST['Trafic/Partner'])) {
                    insertMoyenMat($_GET['fiche'], $_POST['Trafic/Partner'], $_POST['nbTrafic/Partner']);
                } else {
                    updateMoyenMateriel($_GET['fiche'], $_POST['Trafic/Partner'], $_POST['nbTrafic/Partner']);
                }
            } else {
                deleteMoyenMat($_GET['fiche'], 3);
            }

            if (isset($_POST['FLR'])) {
                if (!existeMoyensMat($_GET['fiche'], $_POST['FLR'])) {
                    insertMoyenMat($_GET['fiche'], $_POST['FLR'], $_POST['nbFLR']);
                } else {
                    updateMoyenMateriel($_GET['fiche'], $_POST['FLR'], $_POST['nbFLR']);
                }
            } else {
                deleteMoyenMat($_GET['fiche'], 4);
            }

            if (isset($_POST['SacSeau'])) {
                if (!existeMoyensMat($_GET['fiche'], $_POST['SacSeau'])) {
                    insertMoyenMat($_GET['fiche'], $_POST['SacSeau'], $_POST['nbSacSeau']);
                } else {
                    updateMoyenMateriel($_GET['fiche'], $_POST['SacSeau'], $_POST['nbSacSeau']);
                }
            } else {
                deleteMoyenMat($_GET['fiche'], 5);
            }

            // Environnement

            if (isset($_POST['ChausseeSeche'])) {
                updateChaussee($_GET['fiche'], $_POST['ChausseeSeche']);
            }

            if (isset($_POST['ChausseeMouillee'])) {
                updateChaussee($_GET['fiche'], $_POST['ChausseeMouillee']);
            }

            if (isset($_POST['ChausseeHumide'])) {
                updateChaussee($_GET['fiche'], $_POST['ChausseeHumide']);
            }

            if (isset($_POST['ChausseeRuisselante'])) {
                updateChaussee($_GET['fiche'], $_POST['ChausseeRuisselante']);
            }

            if (isset($_POST['ChausseeVerglacee'])) {
                updateChaussee($_GET['fiche'], $_POST['ChausseeVerglacee']);
            }

            if (isset($_POST['ChausseeEnneigée'])) {
                updateChaussee($_GET['fiche'], $_POST['ChausseeVerglacee']);
            }

            //conditions météorologique

            if (isset($_POST['RAS'])) {
                var_dump($_POST['RAS']);
            }

            if (isset($_POST['Pluie'])) {
                var_dump($_POST['Pluie']);
            }

            if (isset($_POST['Neige'])) {
                var_dump($_POST['Neige']);
            }

            if (isset($_POST['Brouillard'])) {
                var_dump($_POST['Brouillard']);
            }

            //Intervention

            if (isset($_POST['heureDebutInter'])) {
                var_dump($_POST['heureDebutInter']);
            }

            if (isset($_POST['heureFinInter'])) {
                var_dump($_POST['heureFinInter']);
            }

            if (isset($_POST['Animal'])) {
                var_dump($_POST['Animal']);
            }

            if (isset($_POST['Bouchon'])) {
                var_dump($_POST['Bouchon']);
            }

            if (isset($_POST['Intempéries'])) {
                var_dump($_POST['Intempéries']);
            }

            if (isset($_POST['Obstacles'])) {
                var_dump($_POST['Obstacles']);
            }

            if (isset($_POST['VéhiculePanne'])) {
                var_dump($_POST['VéhiculePanne']);
            }

            if (isset($_POST['Balisage'])) {
                var_dump($_POST['Balisage']);
            }

            if (isset($_POST['Chaussée'])) {
                var_dump($_POST['Chaussée']);
            }

            // précision de niveau 1

            if (isset($_POST['Matériel'])) {
                var_dump($_POST['Matériel']);
            }

            if (isset($_POST['Corporel'])) {
                var_dump($_POST['Corporel']);
            }

            if (isset($_POST['Mortel'])) {
                var_dump($_POST['Mortel']);
            }

            if (isset($_POST['AnimalErrant'])) {
                var_dump($_POST['AnimalErrant']);
            }

            if (isset($_POST['AnimalMort'])) {
                var_dump($_POST['AnimalMort']);
            }

            if (isset($_POST['Ralentissement'])) {
                var_dump($_POST['Ralentissement']);
            }

            if (isset($_POST['CirculationsAccordéons'])) {
                var_dump($_POST['CirculationsAccordéons']);
            }

            if (isset($_POST['CirculationsArrêt'])) {
                var_dump($_POST['CirculationsArrêt']);
            }

            if (isset($_POST['VentViolent'])) {
                var_dump($_POST['VentViolent']);
            }

            if (isset($_POST['PluieViolente'])) {
                var_dump($_POST['PluieViolente']);
            }

            if (isset($_POST['ChuteNeige'])) {
                var_dump($_POST['ChuteNeige']);
            }

            if (isset($_POST['Incendie'])) {
                var_dump($_POST['Incendie']);
            }

            if (isset($_POST['ChausseeGlissante'])) {
                var_dump($_POST['ChausseeGlissante']);
            }

            if (isset($_POST['EvenementInopines'])) {
                var_dump($_POST['EvenementInopines']);
            }


            if (isset($_POST['Obstacles'])) {
                var_dump($_POST['Obstacles']);
            }

            if (isset($_POST['PietonCycliste'])) {
                var_dump($_POST['PietonCycliste']);
            }

            if (isset($_POST['VéhiculeGenant'])) {
                var_dump($_POST['VéhiculeGenant']);
            }

            if (isset($_POST['VehiculeContresens'])) {
                var_dump($_POST['VehiculeContresens']);
            }

            if (isset($_POST['VehiculeArrete'])) {
                var_dump($_POST['VehiculeArrete']);
            }

            if (isset($_POST['VéhiculeBalisage'])) {
                var_dump($_POST['VéhiculeBalisage']);
            }

            if (isset($_POST['Autres'])) {
                var_dump($_POST['Autres']);
            }

            if (isset($_POST['RebouchageNDP'])) {
                var_dump($_POST['RebouchageNDP']);
            }

            if (isset($_POST['EpandageAbsorbant'])) {
                var_dump($_POST['EpandageAbsorbant']);
            }


            if (isset($_POST['Autres2'])) {
                var_dump($_POST['Autres2']);
            }

            if (isset($_POST['Sauvage1'])) {
                var_dump($_POST['Sauvage1']);
            }

            if (isset($_POST['Domestique1'])) {
                var_dump($_POST['Domestique1']);
            }

            if (isset($_POST['Élevage1'])) {
                var_dump($_POST['Élevage1']);
            }

            if (isset($_POST['Sauvage2'])) {
                var_dump($_POST['Sauvage2']);
            }

            if (isset($_POST['Domestique2'])) {
                var_dump($_POST['Domestique2']);
            }

            if (isset($_POST['Élevage2'])) {
                var_dump($_POST['Élevage2']);
            }

            if (isset($_POST['Eau'])) {
                var_dump($_POST['Eau']);
            }

            if (isset($_POST['Hydrocarbures'])) {
                var_dump($_POST['Hydrocarbures']);
            }

            if (isset($_POST['ProduitsChimiques'])) {
                var_dump($_POST['ProduitsChimiques']);
            }

            if (isset($_POST['Graviers'])) {
                var_dump($_POST['Graviers']);
            }

            if (isset($_POST['Boue'])) {
                var_dump($_POST['Boue']);
            }

            if (isset($_POST['Inondation'])) {
                var_dump($_POST['Inondation']);
            }

            if (isset($_POST['Éboulement'])) {
                var_dump($_POST['Éboulement']);
            }

            if (isset($_POST['Manifestation'])) {
                var_dump($_POST['Manifestation']);
            }

            if (isset($_POST['Autres3'])) {
                var_dump($_POST['Autres3']);
            }

            if (isset($_POST['Objets'])) {
                var_dump($_POST['Objets']);
            }

            if (isset($_POST['Cônes'])) {
                var_dump($_POST['Cônes']);
            }


            if (isset($_POST['Autres4'])) {
                var_dump($_POST['Autres4']);
            }


            if (isset($_POST['VehiculeDifficulté'])) {
                var_dump($_POST['VehiculeDifficulté']);
            }


            if (isset($_POST['VéhiculeNonAutor'])) {
                var_dump($_POST['VéhiculeNonAutor']);
            }


            if (isset($_POST['Autres5'])) {
                var_dump($_POST['Autres5']);
            }

            if (isset($_POST['Autres6'])) {
                var_dump($_POST['Autres6']);
            }

            if (isset($_POST['Autres7'])) {
                var_dump($_POST['Autres7']);
            }

            if (isset($_POST['Piéton'])) {
                var_dump($_POST['Piéton']);
            }


            if (isset($_POST['Cycliste'])) {
                var_dump($_POST['Cycliste']);
            }


            if (isset($_POST['Trottinette'])) {
                var_dump($_POST['Trottinette']);
            }

            if (isset($_POST['Autre6'])) {
                var_dump($_POST['Autre6']);
            }


            if (isset($_POST['VéhiculeArrete'])) {
                var_dump($_POST['VéhiculeArrete']);
            }

            if (isset($_POST['VéhiculeAbandonne'])) {
                var_dump($_POST['VéhiculeAbandonne']);
            }

            if (isset($_POST['VéhiculeFeu'])) {
                var_dump($_POST['VéhiculeFeu']);
            }

            if (isset($_POST['Autre7'])) {
                var_dump($_POST['Autre7']);
            }

            if (isset($_POST['VL2'])) {
                var_dump($_POST['VL2']);
            }

            if (isset($_POST['nbVL2'])) {
                var_dump($_POST['nbVL2']);
            }

            if (isset($_POST['Moto/Scooter'])) {
                var_dump($_POST['Moto/Scooter']);
            }

            if (isset($_POST['nbMoto/Scooter'])) {
                var_dump($_POST['nbMoto/Scooter']);
            }

            if (isset($_POST['Vélo'])) {
                var_dump($_POST['Vélo']);
            }

            if (isset($_POST['nbVelo'])) {
                var_dump($_POST['nbVelo']);
            }

            if (isset($_POST['Trottinette2'])) {
                var_dump($_POST['Trottinette2']);
            }

            if (isset($_POST['nbTrottinette'])) {
                var_dump($_POST['nbTrottinette']);
            }

            if (isset($_POST['Police2'])) {
                var_dump($_POST['Police2']);
            }

            if (isset($_POST['Gendarmerie2'])) {
                var_dump($_POST['Gendarmerie2']);
            }

            if (isset($_POST['Pompiers2'])) {
                var_dump($_POST['Pompiers2']);
            }

            if (isset($_POST['Dépanneurs2'])) {
                var_dump($_POST['Dépanneurs2']);
            }

            if (isset($_POST['SAMU/SMUR'])) {
                var_dump($_POST['SAMU/SMUR']);
            }

            if (isset($_POST['Autres8'])) {
                var_dump($_POST['Autres8']);
            }

            if (isset($_POST['Circonstances'])) {
                var_dump($_POST['Circonstances']);
            }

            if (isset($_POST['VL3'])) {
                var_dump($_POST['VL3']);
            }

            if (isset($_POST['PL'])) {
                var_dump($_POST['PL']);
            }

            if (isset($_POST['Moto/Scooter'])) {
                var_dump($_POST['Moto/Scooter']);
            }

            if (isset($_POST['Vélo'])) {
                var_dump($_POST['Vélo']);
            }

            if (isset($_POST['Trottinette2'])) {
                var_dump($_POST['Trottinette2']);
            }

            if (isset($_POST['Trottinette3'])) {
                var_dump($_POST['Trottinette3']);
            }

            if (isset($_POST['Balisage'])) {
                var_dump($_POST['Balisage']);
            }

            if (isset($_POST['NeutralisationVoieLente'])) {
                var_dump($_POST['NeutralisationVoieLente']);
            }

            if (isset($_POST['NeutralisationVoieMédiane'])) {
                var_dump($_POST['NeutralisationVoieMédiane']);
            }

            if (isset($_POST['NeutralisationVoieRapide'])) {
                var_dump($_POST['NeutralisationVoieRapide']);
            }

            if (isset($_POST['FermetureAxe'])) {
                var_dump($_POST['FermetureAxe']);
            }

            if (isset($_POST['Déviation'])) {
                var_dump($_POST['Déviation']);
            }

            if (isset($_POST['Autre9'])) {
                var_dump($_POST['Autre9']);
            }

            if (isset($_POST['Oui1'])) {
                var_dump($_POST['Oui1']);
            }

            if (isset($_POST['Non1'])) {
                var_dump($_POST['Non1']);
            }

            if (isset($_POST['Oui2'])) {
                var_dump($_POST['Oui2']);
            }

            if (isset($_POST['Non2'])) {
                var_dump($_POST['Non2']);
            }
            header('location: index.php?uc=formIntervention&action=voirFormulaireIntervention&fiche=' . $_GET['fiche']);
            break;
        }

    default: {

            header('location: index.php?uc=accueil');
            break;
        }
}
