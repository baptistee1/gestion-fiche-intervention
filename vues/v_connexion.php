<?php


if (isset($_POST['connexion'])) {
    if (empty($_POST['username'])) {
        $userEmpty = "Veuillez saisir votre identifiant !";
    } elseif (empty($_POST['password'])) {
        $userEmpty = "Veuillez saisir votre mot de passe !";
    } else {
        $arr = checkConnexion($_POST['username'], $_POST['password']);
        if (empty($arr)) {
            $userEmpty = "Informations incorrectes !";
        } else {
            $_SESSION['login'] = $arr['UTIL_LOGIN'];
            $_SESSION['idUtil'] = $arr['UTIL_ID'];
            $_SESSION['habilitation'] = $arr['HAB_LIB'];
            $_SESSION['cei'] = $arr['libelleCEI'];
            $_SESSION['idCEI'] = $arr['idCEI'];
            $_SESSION['idUER'] = $arr['idUER'];
            $_SESSION['idAGER'] = $arr['idAGER'];
            $_SESSION['erreur'] = false;
            header('Location: index.php?uc=intervention&action=voirFicheIntervention');
        }
    }
}

?>

<div class="container-fluid">
    <div class="structure-hero pt-lg-5 pt-4">
        <h1 class="titre text-center">Connexion</h1>
    </div>
    <div class="row align-items-center justify-content-center">
        <div class="test col-12 col-sm-8 col-lg-6 col-xl-5 col-xxl-4 py-lg-5 py-3">
            <?php if (isset($userEmpty)) {
                echo '<p class="alert alert-danger text-center w-100">' . $userEmpty . '</p>';
            } ?>
            <form class="form-signin formulaire m-auto" action="index.php?uc=connexion&action=connexion" method="post">
                <div class="m-2 mb-3">
                    <h2 class="form-signin-heading">Se connecter</h2>
                </div>
                <div class="m-2">
                    <div class="mb-2">
                        <input type="text" class="form-control" name="username" placeholder="Identifiant" autofocus="" />
                    </div>


                    <input type="password" class="form-control" name="password" placeholder="Mot de passe" />
                </div>
                <div class="m-2">
                    <input class="btn btn-lg btn-primary" type="submit" name="connexion" value="Connexion">
                </div>
            </form>
        </div>
    </div>
</div>