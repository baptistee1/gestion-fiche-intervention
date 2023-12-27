<?php
if (!isset($_REQUEST['action']) || empty($_REQUEST['action'])) {
    $action = "connexion";
} else {
    $action = $_REQUEST['action'];
}

include("vues/v_headerConnexion.php");

switch ($action) {
    case 'connexion': {

            if (isset($_SESSION['login'])) {
                header('Location: index.php?uc=intervention&action=voirFicheIntervention');
            } else {
                include("vues/v_connexion.php");
            }
            break;
        }

    case 'deconnexion': {

            session_destroy();
            header('location: index.php?uc=connexion&action=connexion');
            break;

            break;
        }

    default: {

            header('location: index.php?uc=accueil');
            break;
        }
}
