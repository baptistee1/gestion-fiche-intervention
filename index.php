<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
</head>
<?php
session_start();

require_once('modele/ficheIntervention.modele.inc.php');
require_once('modele/precisionType1.modele.inc.php');
require_once('modele/connexion.modele.inc.php');

if (!isset($_REQUEST['uc']) || empty($_REQUEST['uc']))
    $uc = 'accueil';
else {
    $uc = $_REQUEST['uc'];
}
?>

<?php

switch ($uc) {

    case 'connexion': {
            include("controleur/c_connexion.php");
            break;
        }

    case 'intervention': {
            if (!empty($_SESSION['login'])) {
                include("controleur/c_ficheIntervention.php");
            }
            break;
        }

    case 'formIntervention': {
            if (!empty($_SESSION['login'])) {
                include("controleur/c_formFicheIntervention.php");
            }
            break;
        }




    default: {
            include("vues/v_connexion.php");
            break;
        }
}
?>

<?php include("vues/v_footer.php"); ?>
</body>
<html>