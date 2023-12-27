
<?php
if (!isset($_REQUEST['action']) || empty($_REQUEST['action'])) {
	$action = "connexion";
} else {
	$action = $_REQUEST['action'];
}
include("vues/v_header.php");

switch ($action) {


	case 'voirFicheIntervention': {

			if ($_SESSION['habilitation'] == 'CEI') {
				$lesLignes = getFicheInterventionByCEI($_SESSION['idCEI']);
			} elseif ($_SESSION['habilitation'] == 'UER') {
				$lesLignes = getFicheInterventionByUER($_SESSION['idUER']);
			} elseif ($_SESSION['habilitation'] == 'AGER') {
				$lesLignes = getFicheInterventionByAGER($_SESSION['idAGER']);
			}

			//include("vues/v_formInterventionTab.php");
			include("vues/v_formTest.php");
			//include("vues/v_menuTrier.php");
			//include("vues/v_ficheInterventionTab.php");
			include("vues/v_ficheTest.php");
			break;
		}

	case 'modifierFicheIntervention': {

			$ref = $_POST['reference'];
			$date = htmlspecialchars($_POST['date']);
			$heureAppel = htmlspecialchars($_POST['heureAppel']);
			$origineAppel = htmlspecialchars($_POST['origineAppel']);
			$axe = htmlspecialchars($_POST['axe']);
			$sens = htmlspecialchars($_POST['sens']);
			$localisation = htmlspecialchars($_POST['localisation']);
			$heureDebut = htmlspecialchars($_POST['heureDebut']);
			$heureFin = htmlspecialchars($_POST['heureFin']);
			//$typeIntervention = htmlspecialchars($_POST['type']);
			$observation = htmlspecialchars($_POST['observation']);
			if (isset($_POST['presenceChef'])) {
				$presenceTiers = htmlspecialchars($_POST['presenceChef']);
				updatePresenceTiers($ref, $presenceTiers);
			}

			/** 
			$res = selectVoie($ref);
			$lesVoies = getVoies($ref);

			var_dump($lesVoies);
			var_dump($ref);
			foreach ($lesVoies as $uneVoie) {

				$tabVoies[] = $uneVoie['idVoie'];
			}
			var_dump($tabVoies);


			for ($i = sizeof($tabVoies); $i < 6; $i++) {
				$tabVoies[$i] = '0';
			}


			for ($i = 0; $i < 6; $i++) {


				if ($_POST['voie' . $i] == 'none') {
					deleteVoie($ref, $tabVoies[$i]);
				}



				if ($_POST['voie' . $i] !== 'none') {

					if ($_POST['voie' . $i] !== $tabVoies[$i]) {
						if (!empty($tabVoies[$i])) {
							if (existeVoie($ref, $_POST['voie' . $i])) {
								deleteVoie($ref, $tabVoies[$i]);
							} else {
								updateVoie($ref, $tabVoies[$i], $_POST['voie' . $i]);
							}
						} else {
							insertVoie($ref, $_POST['voie' . $i]);
						}
					}
				}
			}

			if ($typeIntervention == "Accident") {
				$lesPrecisions = getPrecisionNiv1($ref);

				foreach ($lesPrecisions as $unePrecision) {

					$tabPrecisions[] = $unePrecision['idPrecision'];
				}

				if (empty($tabPrecisions)) {
					$tabPrecisions[0] = '0';
				}

				for ($i = sizeof($tabPrecisions); $i < 3; $i++) {
					$tabPrecisions[$i] = '0';
				}

				for ($i = 0; $i < 3; $i++) {


					if ($_POST['precisionAccident' . $i] == 'supp') {
						deletePrecision($ref, $tabPrecisions[$i]);
					}


					if ($_POST['precisionAccident' . $i] !== 'none') {
						if (!empty($tabPrecisions[$i])) {
							if (existePrecision($ref, $_POST['precisionAccident' . $i])) {
							} else {
								updatePrecision($ref, $tabPrecisions[$i], $_POST['precisionAccident' . $i]);
							}
						} else {
							insertPrecision($ref, $_POST['precisionAccident' . $i]);
						}
					}
				}
			} else {
				if ($typeIntervention == "Animaux") {
					$lesPrecisions = getPrecisionNiv1($ref);

					foreach ($lesPrecisions as $unePrecision) {

						$tabPrecisions[] = $unePrecision['idPrecision'];
					}

					if (empty($tabPrecisions)) {
						$tabPrecisions[0] = '0';
					}

					for ($i = sizeof($tabPrecisions); $i < 2; $i++) {
						$tabPrecisions[$i] = '0';
					}

					for ($i = 0; $i < 2; $i++) {


						if ($_POST['precisionAnimaux' . $i] == 'supp') {
							deletePrecision($ref, $tabPrecisions[$i]);
						}


						if ($_POST['precisionAnimaux' . $i] !== 'none') {
							if (!empty($tabPrecisions[$i])) {
								if (existePrecision($ref, $_POST['precisionAnimaux' . $i])) {
								} else {
									updatePrecision($ref, $tabPrecisions[$i], $_POST['precisionAnimaux' . $i]);
								}
							} else {

								insertPrecision($ref, $_POST['precisionAnimaux' . $i]);
							}
						}
					}
				} else {
					if ($typeIntervention == "Bouchon") {
						$lesPrecisions = getPrecisionNiv1($ref);

						foreach ($lesPrecisions as $unePrecision) {

							$tabPrecisions[] = $unePrecision['idPrecision'];
						}

						if (empty($tabPrecisions)) {
							$tabPrecisions[0] = '0';
						}

						for ($i = sizeof($tabPrecisions); $i < 3; $i++) {
							$tabPrecisions[$i] = '0';
						}

						for ($i = 0; $i < 3; $i++) {


							if ($_POST['precisionBouchon' . $i] == 'supp') {
								deletePrecision($ref, $tabPrecisions[$i]);
							}


							if ($_POST['precisionBouchon' . $i] !== 'none') {
								if (!empty($tabPrecisions[$i])) {
									if (existePrecision($ref, $_POST['precisionBouchon' . $i])) {
									} else {
										updatePrecision($ref, $tabPrecisions[$i], $_POST['precisionBouchon' . $i]);
									}
								} else {

									insertPrecision($ref, $_POST['precisionBouchon' . $i]);
								}
							}
						}
					} else {
						if ($typeIntervention == "Intempéries") {
							$lesPrecisions = getPrecisionNiv1($ref);

							foreach ($lesPrecisions as $unePrecision) {

								$tabPrecisions[] = $unePrecision['idPrecision'];
							}

							if (empty($tabPrecisions)) {
								$tabPrecisions[0] = '0';
							}

							for ($i = sizeof($tabPrecisions); $i < 3; $i++) {
								$tabPrecisions[$i] = '0';
							}

							for ($i = 0; $i < 5; $i++) {


								if ($_POST['precisionIntemp' . $i] == 'supp') {
									deletePrecision($ref, $tabPrecisions[$i]);
								}


								if ($_POST['precisionIntemp' . $i] !== 'none') {
									if (!empty($tabPrecisions[$i])) {
										if (existePrecision($ref, $_POST['precisionIntemp' . $i])) {
										} else {
											updatePrecision($ref, $tabPrecisions[$i], $_POST['precisionIntemp' . $i]);
										}
									} else {

										insertPrecision($ref, $_POST['precisionIntemp' . $i]);
									}
								}
							}
						} else {
							if ($typeIntervention == "Obstacles mobiles ou fixes") {
								$lesPrecisions = getPrecisionNiv1($ref);

								foreach ($lesPrecisions as $unePrecision) {

									$tabPrecisions[] = $unePrecision['idPrecision'];
								}

								if (empty($tabPrecisions)) {
									$tabPrecisions[0] = '0';
								}

								for ($i = sizeof($tabPrecisions); $i < 3; $i++) {
									$tabPrecisions[$i] = '0';
								}

								for ($i = 0; $i < 7; $i++) {


									if ($_POST['precisionObstacle' . $i] == 'supp') {
										deletePrecision($ref, $tabPrecisions[$i]);
									}


									if ($_POST['precisionObstacle' . $i] !== 'none') {
										if (!empty($tabPrecisions[$i])) {
											if (existePrecision($ref, $_POST['precisionObstacle' . $i])) {
											} else {
												updatePrecision($ref, $tabPrecisions[$i], $_POST['precisionObstacle' . $i]);
											}
										} else {

											insertPrecision($ref, $_POST['precisionObstacle' . $i]);
										}
									}
								}
							} else {
								if ($typeIntervention == "Balisage") {
									$lesPrecisions = getPrecisionNiv1($ref);

									foreach ($lesPrecisions as $unePrecision) {

										$tabPrecisions[] = $unePrecision['idPrecision'];
									}

									if (empty($tabPrecisions)) {
										$tabPrecisions[0] = '0';
									}

									for ($i = sizeof($tabPrecisions); $i < 3; $i++) {
										$tabPrecisions[$i] = '0';
									}

									for ($i = 0; $i < 2; $i++) {


										if ($_POST['precisionBalisage' . $i] == 'supp') {
											deletePrecision($ref, $tabPrecisions[$i]);
										}


										if ($_POST['precisionBalisage' . $i] !== 'none') {
											if (!empty($tabPrecisions[$i])) {
												if (existePrecision($ref, $_POST['precisionBalisage' . $i])) {
												} else {
													updatePrecision($ref, $tabPrecisions[$i], $_POST['precisionBalisage' . $i]);
												}
											} else {

												insertPrecision($ref, $_POST['precisionBalisage' . $i]);
											}
										}
									}
								} else {
									if ($typeIntervention == "Chaussée") {
										$lesPrecisions = getPrecisionNiv1($ref);

										foreach ($lesPrecisions as $unePrecision) {

											$tabPrecisions[] = $unePrecision['idPrecision'];
										}

										if (empty($tabPrecisions)) {
											$tabPrecisions[0] = '0';
										}

										for ($i = sizeof($tabPrecisions); $i < 3; $i++) {
											$tabPrecisions[$i] = '0';
										}

										for ($i = 0; $i < 2; $i++) {


											if ($_POST['precisionChaussée' . $i] == 'supp') {
												deletePrecision($ref, $tabPrecisions[$i]);
											}


											if ($_POST['precisionChaussée' . $i] !== 'none') {
												if (!empty($tabPrecisions[$i])) {
													if (existePrecision($ref, $_POST['precisionChaussée' . $i])) {
													} else {
														updatePrecision($ref, $tabPrecisions[$i], $_POST['precisionChaussée' . $i]);
													}
												} else {

													insertPrecision($ref, $_POST['precisionChaussée' . $i]);
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
			 */

			updateDate($ref, $date);
			updateHeureAppel($ref, $heureAppel);
			updateOrigineAppel($ref, $origineAppel);
			updateAxe($ref, $axe);
			updateSens($ref, $sens);
			updateLocalisation($ref, $localisation);
			updateHeureDebut($ref, $heureDebut);
			updateHeureFin($ref, $heureFin);
			updateType($ref, $typeIntervention);
			updateObservation($ref, $observation);


			header('location: index.php?uc=intervention&action=voirFicheIntervention');

			break;
		}

	case 'insererFicheIntervention': {

			$date = htmlspecialchars($_POST['date']);
			$heureAppel = htmlspecialchars($_POST['heureAppel']);
			$origineAppel = htmlspecialchars($_POST['origineAppel']);
			$axe = htmlspecialchars($_POST['axe']);
			$sens = htmlspecialchars($_POST['sens']);
			$localisation = htmlspecialchars($_POST['localisation']);
			$heureDebut = htmlspecialchars($_POST['heureDebut']);
			$heureFin = htmlspecialchars($_POST['heureFin']);
			$typeIntervention = htmlspecialchars($_POST['type']);
			$observation = htmlspecialchars($_POST['observation']);
			if ($_SESSION['habilitation'] == 'CEI') {
				$CEI = $_SESSION['idCEI'];
			} else {
				$CEI = $_POST['choixCEI'];
			}
			$presenceChef = $_POST['presenceChef'];

			insertFicheIntervention($date, $heureAppel, $origineAppel, $axe, $sens, $localisation, $heureDebut, $heureFin, $typeIntervention, $presenceChef, $CEI, $observation);

			$idFiche = getMaxId();

			if (isset($_POST['DDP'])) {
				insertDDP();
				updateFicheDDP($idFiche);
			}

			insertCreer($_SESSION['idUtil'], $idFiche);

			for ($i = 0; $i < 5; $i++) {
				if ($_POST['voie' . $i] !== 'none') {
					insertVoie($idFiche, $_POST['voie' . $i]);
				}
			}

			if ($typeIntervention == "Accident") {
				for ($i = 0; $i < 3; $i++) {
					if ($_POST['precisionAccident' . $i] !== 'none') {
						insertPrecision($idFiche, $_POST['precisionAccident' . $i]);
					}
				}
			} else {
				if ($typeIntervention == "Animaux") {
					for ($i = 0; $i < 2; $i++) {
						if ($_POST['precisionAnimaux' . $i] !== 'none') {
							insertPrecision($idFiche, $_POST['precisionAnimaux' . $i]);
						}
					}
				}
			}



			header('location: index.php?uc=intervention&action=voirFicheIntervention');

			break;
		}

	default: {

			header('location: index.php?uc=accueil');
			break;
		}
}
