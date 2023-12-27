<div class="container-fluid">

    <head>
        <title>Projet Stage</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/bootstrap.css">

    </head>

    <body>
        <div class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?uc=intervention&action=voirFicheIntervention">Fiche Intervention</a>
                    </li>
                    <!-- <li class="nav-item">
                    <a class="nav-link active" href="">Fiche Patrouille</a>
                </li>-->
                    <!--<li class="nav-item">
                    <a class="nav-link active" href="">Synthése</a>
                </li>-->
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?uc=connexion&action=deconnexion" onclick="return confirm('Voulez-vous vraiment vous déconnecter ?');">Deconnexion</a>
                    </li>
                </ul>
                <p>Vous êtes connecté en tant que : <?php echo $_SESSION['login'] ?><br>

                    Habilitation :
                    <?php
                    echo $_SESSION['habilitation'];
                    if ($_SESSION['habilitation'] == 'CEI') {
                        $res = getLibelleCei($_SESSION['idCEI']);
                        echo ' ' . $res['libelleCEI'];
                    } elseif ($_SESSION['habilitation'] == 'UER') {
                        $res = getLibelleUer($_SESSION['idUER']);
                        echo ' ' . $res['libelleUER'];
                    } elseif ($_SESSION['habilitation'] == 'AGER') {
                        $res = getLibelleAGER($_SESSION['idAGER']);
                        echo ' ' . $res['libelleAGER'];
                    }
                    ?>
                </p>
            </div>
        </div>
</div>