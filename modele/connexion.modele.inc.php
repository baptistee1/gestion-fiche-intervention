<?php

include_once 'bd.inc.php';


/**
 * Fonction qui vérifie si un utilisateur est connecté
 * @param $username
 * @param $mdp
 * @return $res
 * 
 */

function checkConnexion($username, $mdp)
{

    try {
        $getInfo = connexionPDO();
        $req = $getInfo->prepare('SELECT  u.UTIL_LOGIN, u.UTIL_ID, h.HAB_LIB, u.idCEI, u.idUER, u.idAGER FROM utilisateur u 
        INNER JOIN habilitation h ON u.HAB_ID=h.HAB_ID
        WHERE u.UTIL_LOGIN = :identifiant AND u.UTIL_MOTDEPASSE =:mdp ');
        $req->bindValue(':identifiant', $username, PDO::PARAM_STR);
        $req->bindValue(':mdp', $mdp, PDO::PARAM_STR);
        $req->execute();
        $res = $req->fetch(PDO::FETCH_ASSOC);

        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui renvoie le libelle d'un cei a partir de son id
 * @param $id
 * @return $res
 * 
 */
function getLibelleCei($id)
{

    try {
        $getInfo = connexionPDO();
        $req = $getInfo->prepare('SELECT libelleCEI FROM cei
        WHERE  idCEI = :identifiant');
        $req->bindValue(':identifiant', $id, PDO::PARAM_INT);
        $req->execute();
        $res = $req->fetch(PDO::FETCH_ASSOC);

        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui renvoie le libelle d'un uer a partir de son id
 * @param $id
 * @return $res
 * 
 */
function getLibelleUer($id)
{

    try {
        $getInfo = connexionPDO();
        $req = $getInfo->prepare('SELECT libelleUER FROM uer
        WHERE  idUER = :identifiant');
        $req->bindValue(':identifiant', $id, PDO::PARAM_INT);
        $req->execute();
        $res = $req->fetch(PDO::FETCH_ASSOC);

        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui renvoie le libelle d'un ager a partir de son id
 * @param $id
 * @return $res
 * 
 */
function getLibelleAGER($id)
{

    try {
        $getInfo = connexionPDO();
        $req = $getInfo->prepare('SELECT libelleAGER FROM ager
        WHERE  idAGER = :identifiant');
        $req->bindValue(':identifiant', $id, PDO::PARAM_INT);
        $req->execute();
        $res = $req->fetch(PDO::FETCH_ASSOC);

        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
