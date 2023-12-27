<?php

include_once 'bd.inc.php';

/**
 * Fonction qui renvoie toutes les informations d'une fiche avec en paramètre son id
 * @param $id
 * @return $res les informations d'une fiche intervention
 */

function getAllInfosById($id)
{
    try {
        $monPdo = connexionPDO();
        $req = $monPdo->prepare("SELECT axeInter, circonstanceInter, communeInter, commentaireInter, dateInter, etatChausseeInter,heureArriveeInter,heureDebutInter,heureDepartInter,heureFinInter,heureInter,
        idInter,localisationInter,origineInter,presenceTiers,sensIntervention,typeInter,idDDP,idCEI FROM fiche_intervention
        WHERE idInter=:id;");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $res = $req->fetch(PDO::FETCH_ASSOC);
        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui renvoie toutes les fiches d'interventions
 * @return $res la liste des fiches d'interventions
 */

function getAllFicheInterventionTableur()
{
    try {
        $monPdo = connexionPDO();
        $req = $monPdo->prepare("SELECT idInter as 'ref', dateInter as 'date', heureInter as 'heure appel' , origineInter as 'origine appel', axeinter as 'axe' , 
            sensIntervention as 'sens', localisationInter as 'localisation', heureDebutInter as 'heure debut' , heureFinInter as 'heure fin', typeInter as 'type intervention' 
            FROM fiche_intervention ORDER BY idInter");
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
/**
 * Fonction qui renvoie une fiche d'intervention par son id
 * @param $id id de la fiche intervention
 * @return $res la fiche d'intervention
 */
function getFicheInterventionById($id)
{
    try {
        $monPdo = connexionPDO();
        $req = $monPdo->prepare("SELECT idInter as 'ref', dateInter as 'date', heureInter as 'heure appel' , origineInter as 'origine appel', axeinter as 'axe' , 
        sensIntervention as 'sens', localisationInter as 'localisation', heureDebutInter as 'heure debut' , heureFinInter as 'heure fin', typeInter as 'type intervention' 
        FROM fiche_intervention WHERE idInter=:id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $res = $req->fetch(PDO::FETCH_ASSOC);

        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


/**
 * Fonction qui renvoie les fiches d'intervention par cei
 * @param $cei
 * @return $res
 * 
 */
function getFicheInterventionByCEI($cei)
{
    try {
        $monPdo = connexionPDO();
        $req = $monPdo->prepare("SELECT idInter as 'ref', dateInter as 'date', heureInter as 'heure appel' , origineInter as 'origine appel', axeinter as 'axe' , 
        sensIntervention as 'sens', localisationInter as 'localisation', heureDebutInter as 'heure debut' , heureFinInter as 'heure fin', typeInter as 'type intervention', idCEI,commentaireInter,presenceTiers
        FROM fiche_intervention WHERE idCEI=:cei");
        $req->bindValue(':cei', $cei, PDO::PARAM_INT);
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui renvoie les fiches d'intervention par uer
 * @param $uer
 * @return $res
 */

function getFicheInterventionByUER($uer)
{

    try {
        $monPdo = connexionPDO();
        $req = $monPdo->prepare("SELECT idInter as 'ref', dateInter as 'date', heureInter as 'heure appel' , origineInter as 'origine appel', axeinter as 'axe' , 
        sensIntervention as 'sens', localisationInter as 'localisation', heureDebutInter as 'heure debut' , heureFinInter as 'heure fin', typeInter as 'type intervention',idCEI,commentaireInter,presenceTiers
        FROM fiche_intervention WHERE idCEI in (SELECT idCEI FROM cei WHERE idUER = :uer)");
        $req->bindValue(':uer', $uer, PDO::PARAM_INT);
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui renvoie les fiches d'insertion par ager
 * @param $ager
 * @return $res
 */
function getFicheInterventionByAGER($ager)
{

    try {
        $monPdo = connexionPDO();
        $req = $monPdo->prepare("SELECT idInter as 'ref', dateInter as 'date', heureInter as 'heure appel' , origineInter as 'origine appel', axeinter as 'axe' , 
        sensIntervention as 'sens', localisationInter as 'localisation', heureDebutInter as 'heure debut' , heureFinInter as 'heure fin', typeInter as 'type intervention',idCEI,commentaireInter,presenceTiers
        FROM fiche_intervention WHERE idCEI in (SELECT idCEI FROM cei c
        INNER JOIN uer u
        ON c.idUER = u.idUER
        WHERE u.idAGER=:ager)");
        $req->bindValue(':ager', $ager, PDO::PARAM_INT);
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


/**
 * Fonction qui renvoie les précisions de de niveau 1 des fiches d'interventions
 * @param $id
 * @return $res les précisions de niveau 1
 */

function getPrecisionNiv1($id)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("SELECT libellePrecision as 'precision1' ,aup.idPrecision FROM precisionintervention pi
            INNER JOIN a_une_precision aup
            ON pi.idPrecision=aup.idPrecision
            INNER JOIN fiche_intervention fi
            ON aup.idInter=fi.idInter
            WHERE fi.idInter=:id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui renvoie les voies des fiches d'interventions
 * @param $id
 * @return $res les voies
 */

function getVoies($id)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("SELECT libelleVoie,c.idVoie,c.idInter FROM voie v
            INNER JOIN contenir c
            ON v.idVoie=c.idVoie
            RIGHT JOIN fiche_intervention fi 
            ON c.idInter=fi.idInter
            WHERE fi.idInter=:id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui retourne les id des voies de la table voie
 * @param $id
 * @return $res les ids des voies
 */
function getIdVoies($id)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("SELECT c.idVoie FROM voie v
            INNER JOIN contenir c
            ON v.idVoie=c.idVoie
            RIGHT JOIN fiche_intervention fi 
            ON c.idInter=fi.idInter
            WHERE fi.idInter=:id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui retourne les fiches interventions creer par l'utilisateur
 * @param $idUtil
 * @return $res les ids des fiches
 */

function getCreer($idCEI)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("SELECT c.UTIL_id,idInter FROM creer c inner join utilisateur u
        on c.UTIL_id=u.UTIL_ID
        WHERE u.idCEI=:idCEI");
        $req->bindValue(':idCEI', $idCEI, PDO::PARAM_INT);
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}



/** Fonction qui renvoie les libelles des voies
 * @return $res la liste des libelles des voies
 */

function getLibellesVoies()
{
    try {
        $monPDO = $monPDO = connexionPDO();
        $req = $monPDO->prepare("SELECT libelleVoie FROM voie");
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}



/**
 * Fonction qui renvoie tous les ids des fiches d'interventions
 * @return $result les ids des fiches d'interventions
 */

function getIds()
{
    try {
        $monPDO = connexionPDO();
        $req = "SELECT idInter FROM fiche_intervention ORDER BY idInter";
        $res = $monPDO->query($req);
        $result = $res->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui renvoie l'id max de la table fiche_intervention
 * @return $maxi l'id max de la table fiche_intervention
 */

function getMaxId()
{
    try {
        $monPDO = connexionPDO();
        $req = 'select max(idInter) as maxi from fiche_intervention';
        $res = $monPDO->query($req);
        $laLigne = $res->fetch(PDO::FETCH_ASSOC);
        $maxi = $laLigne['maxi'];

        return $maxi;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


/**
 * Fonction qui renvoie le nombre ids des fiches d'interventions
 * @return $result le nombre d'ids de la table fiches d'interventions
 */

function getCountIds()
{
    try {
        $monPDO = connexionPDO();
        $req = "SELECT COUNT(idInter) as 'nb' FROM fiche_intervention";
        $res = $monPDO->query($req);
        $result = $res->fetch(PDO::FETCH_ASSOC);

        return $result;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


/**
 * Fonction qui retourne les CEI d'un UER
 * @param $idUER
 * @return $res tous les CEI
 */
function getCEIByUER($idUER)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("SELECT idCEI,libelleCEI FROM cei 
        WHERE idUER=:idUER");
        $req->bindValue(':idUER', $idUER, PDO::PARAM_INT);
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui retourne les CEI d'un AGER
 * @param $idAGER
 * @return $res tous les CEI
 */

function getCEIByAGER($idAGER)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("SELECT idCEI,libelleCEI FROM cei c
        INNER JOIN uer u
        on c.idUER=u.idUER
        WHERE idAGER=:idAGER");
        $req->bindValue(':idAGER', $idAGER, PDO::PARAM_INT);
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui retourne tous les moyens humains a partir d'une ref
 * @param $ref
 * @return $res
 */

function getAllMoyens($ref)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("SELECT idInter,idMoyensHumains,nbMoyens FROM employer
        WHERE idInter=:ref");
        $req->bindValue(':ref', $ref, PDO::PARAM_INT);
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui retourne tous les moyens humains a partir d'une ref
 * @param $ref
 * @return $res
 */

function getAllMoyensMat($ref)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("SELECT idInter,idMoyensMateriels,nbMoyensMatériels FROM posseder
         WHERE idInter=:ref");
        $req->bindValue(':ref', $ref, PDO::PARAM_INT);
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}



/**
 * Fonction qui insert dans la base de donnée une fiche d'insertion
 * @param $date 
 * @param $origineAppel
 * @param $axe
 * @param $sens
 * @param $localisation
 * @param $heureDebut
 * @param $heureFin
 * @param $typeInter
 * @param $presenceTiers
 * @param $DDP
 * @param $CEI
 */

function insertFicheIntervention($date, $heureAppel, $origineAppel, $axe, $sens, $localisation, $heureDebut, $heureFin, $typeInter, $presenceTiers, $CEI, $observation)
{
    try {
        $monPDO = connexionPDO();
        $req = 'select max(idInter) as maxi from fiche_intervention';
        $res = $monPDO->query($req);
        $laLigne = $res->fetch();
        $maxi = $laLigne['maxi'];
        $idFiche = $maxi + 1;
        $req = $monPDO->prepare("INSERT INTO fiche_intervention (idInter,dateInter,heureInter,origineInter,axeInter,sensIntervention,localisationInter,heureDebutInter,heureFinInter,typeInter,presenceTiers,idCEI,commentaireInter) 
        VALUES (:idInter,:date,:heureInter,:origineAppel,:axe,:sens,:localisation,:heureDebut,:heureFin,:typeInter,:presenceTiers,:CEI,:observation)");

        $req->bindValue(':idInter', $idFiche, PDO::PARAM_INT);
        $req->bindValue(':date', $date, PDO::PARAM_STR);
        $req->bindValue(':heureInter', $heureAppel, PDO::PARAM_STR);
        $req->bindValue(':origineAppel', $origineAppel, PDO::PARAM_STR);
        $req->bindValue(':axe', $axe, PDO::PARAM_STR);
        $req->bindValue(':sens', $sens, PDO::PARAM_STR);
        $req->bindValue(':localisation', $localisation, PDO::PARAM_STR);
        $req->bindValue(':heureDebut', $heureDebut, PDO::PARAM_STR);
        $req->bindValue(':heureFin', $heureFin, PDO::PARAM_STR);
        $req->bindValue(':heureFin', $heureFin, PDO::PARAM_STR);
        $req->bindValue(':typeInter', $typeInter, PDO::PARAM_STR);
        $req->bindValue(':presenceTiers', $presenceTiers, PDO::PARAM_STR);
        $req->bindValue(':CEI', $CEI, PDO::PARAM_INT);
        $req->bindValue(':observation', $observation, PDO::PARAM_STR);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


/**
 * Fonction qui insert dans la table creer
 * @param $idUtil
 * @param $idFiche
 */


function insertCreer($idUtil, $idFiche)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("INSERT INTO creer (UTIL_id,idInter) VALUES (:idUtil,:idInter)");
        $req->bindValue(':idUtil', $idUtil, PDO::PARAM_INT);
        $req->bindValue(':idInter', $idFiche, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui insert dans la base de donnée une voie d'une fiche d'intervention
 * @param $ref
 * @param $refVoie
 * 
 */
function insertVoie($ref, $refVoie)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("INSERT INTO contenir (idInter,idVoie) VALUES (:idInter,:idVoie)");
        $req->bindValue(':idInter', $ref, PDO::PARAM_INT);
        $req->bindValue(':idVoie', $refVoie, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui insert dans la base de donnée DDP
 * @param $ref
 */

function insertDDP()
{
    try {

        $monPDO = connexionPDO();

        $req = 'select max(idDDP) as maxi from ddp';
        $res = $monPDO->query($req);
        $laLigne = $res->fetch();
        $maxi = $laLigne['maxi'];
        $ddp = $maxi + 1;

        $req = $monPDO->prepare("INSERT INTO `ddp` (`idDDP`) VALUES (:ddp)");
        $req->bindValue(':ddp', $ddp, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


/**
 * Fonction qui insert dans la base de donnée un moyen humains avec un nb
 * @param $ref
 * @param $moyensHumains
 * @param $nbMoyens
 */
function insertMoyenHumain($ref, $moyensHumains, $nbMoyens)
{

    try {

        $monPDO = connexionPDO();
        $req = $monPDO->prepare("INSERT INTO employer (idInter,idMoyensHumains,nbMoyens) 
        VALUES (:idInter, :idMoyensHumains, :nbMoyens)");
        $req->bindValue(':idInter', $ref, PDO::PARAM_INT);
        $req->bindValue(':idMoyensHumains', $moyensHumains, PDO::PARAM_INT);
        $req->bindValue(':nbMoyens', $nbMoyens, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui insert dans la base de donnée un moyen matériel avec un nb
 * @param $ref
 * @param $moyensHumains
 * @param $nbMoyens
 */
function insertMoyenMat($ref, $moyensMateriels, $nbMoyensMateriels)
{

    try {

        $monPDO = connexionPDO();
        $req = $monPDO->prepare("INSERT INTO posseder (idInter,idMoyensMateriels,nbMoyensMatériels) 
        VALUES (:idInter, :idMoyensMat, :nbMoyensMat)");
        $req->bindValue(':idInter', $ref, PDO::PARAM_INT);
        $req->bindValue(':idMoyensMat', $moyensMateriels, PDO::PARAM_INT);
        $req->bindValue(':nbMoyensMat', $nbMoyensMateriels, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


/**
 * Fonction qui modifie la fiche intervention pour ajouter un DDP
 * @param $ref
 */

function updateFicheDDP($ref)
{
    try {
        $monPDO = connexionPDO();

        $req = 'select max(idDDP) as maxi from ddp';
        $res = $monPDO->query($req);
        $laLigne = $res->fetch();
        $maxi = $laLigne['maxi'];
        $ddp = $maxi;

        $req = $monPDO->prepare("UPDATE `fiche_intervention` 
            SET `idDDP` = :ddp
            WHERE `fiche_intervention`.`idInter` =:id");
        $req->bindValue(':id', $ref, PDO::PARAM_STR);
        $req->bindValue(':ddp', $ddp, PDO::PARAM_STR);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}



/**
 * Fonction qui modifie dans la base de donnée la date de la fiche d'intervention
 * @param $id
 * @param $date
 */

function updateDate($id, $date)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("UPDATE `fiche_intervention` 
            SET `dateInter` = :date
            WHERE `fiche_intervention`.`idInter` =:id");
        $req->bindValue(':date', $date, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui modifie dans la base de donnée l'heure d'appel de la fiche d'intervention
 * @param $id
 * @param $heureAppel
 */

function updateHeureAppel($id, $heureAppel)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("UPDATE `fiche_intervention` 
            SET `heureInter` = :heureAppel
            WHERE `fiche_intervention`.`idInter` =:id");
        $req->bindValue(':heureAppel', $heureAppel, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui modifie dans la base de donnée l'origine de l'appel de la fiche d'intervention
 * @param $id
 * @param $origineAppel
 */

function updateOrigineAppel($id, $origineAppel)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("UPDATE `fiche_intervention` 
            SET `origineInter` = :origineAppel
            WHERE `fiche_intervention`.`idInter` =:id");
        $req->bindValue(':origineAppel', $origineAppel, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui modifie dans la base de donnée l'axe de la fiche d'intervention
 * @param $id
 * @param $axe
 */

function updateAxe($id, $axe)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("UPDATE `fiche_intervention` 
            SET `axeInter` = :axe
            WHERE `fiche_intervention`.`idInter` =:id");
        $req->bindValue(':axe', $axe, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui modifie dans la base de donnée le sens de la fiche d'intervention
 * @param $id
 * @param $sens
 */

function updateSens($id, $sens)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("UPDATE `fiche_intervention` 
            SET `sensIntervention` = :sens
            WHERE `fiche_intervention`.`idInter` =:id");
        $req->bindValue(':sens', $sens, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


/**
 * Fonction qui modifie dans la base de donnée la localisation de la fiche d'intervention
 * @param $id
 * @param $localisation
 */

function updateLocalisation($id, $localisation)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("UPDATE `fiche_intervention` 
            SET `localisationInter` = :localisation
            WHERE `fiche_intervention`.`idInter` =:id");
        $req->bindValue(':localisation', $localisation, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


/**
 * Fonction qui modifie dans la base de donnée l'heure de début de la fiche d'intervention
 * @param $id
 * @param $heureDebut
 */

function updateHeureDebut($id, $heureDebut)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("UPDATE `fiche_intervention` 
            SET `heureDebutInter` = :heureDebut
            WHERE `fiche_intervention`.`idInter` =:id");
        $req->bindValue(':heureDebut', $heureDebut, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/** 
 * Fonction qui modifie dans la base de donnée l'heure de fin de la fiche d'intervention
 * @param $id
 * @param $heureFin
 */

function updateHeureFin($id, $heureFin)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("UPDATE `fiche_intervention` 
            SET `heureFinInter` = :heureFin
            WHERE `fiche_intervention`.`idInter` =:id");
        $req->bindValue(':heureFin', $heureFin, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui modifie dans la base de donnée le type d'intervention de la fiche d'intervention
 * @param $id
 * @param $type
 */

function updateType($id, $type)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("UPDATE `fiche_intervention` 
            SET `typeInter` = :type
            WHERE `fiche_intervention`.`idInter` =:id");
        $req->bindValue(':type', $type, PDO::PARAM_STR);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui modifie dans la base de donnée la voie d'une fiche d'intervention
 * @param $ref
 * @param $voie
 */

function updateVoie($ref, $refVoie, $voie)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("UPDATE `contenir` 
            SET `idVoie` = :voie
            WHERE `contenir`.`idInter` =:id AND contenir.idVoie=:refVoie");

        $req->bindValue(':refVoie', $refVoie, PDO::PARAM_INT);
        $req->bindValue(':voie', $voie, PDO::PARAM_INT);
        $req->bindValue(':id', $ref, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
/**
 * Fonction qui modifie dans la base de donnée la précision d'une fiche d'intervention
 * @param $ref
 * @param $refPrecision
 * @param $precision
 */



function updatePrecision($ref, $refPrecision, $Precision)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("UPDATE `a_une_precision` 
            SET `idPrecision` = :precision
            WHERE `a_une_precision`.`idInter` =:id AND a_une_precision.idPrecision=:refPrecision");

        $req->bindValue(':refPrecision', $refPrecision, PDO::PARAM_INT);
        $req->bindValue(':precision', $Precision, PDO::PARAM_INT);
        $req->bindValue(':id', $ref, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui modifie dans la base de donnée le commentaire d'une fiche d'intervention
 * @param $ref
 * @param $observation
 */

function updateObservation($ref, $observation)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("UPDATE `fiche_intervention` 
            SET `commentaireInter` = :observation
            WHERE `fiche_intervention`.`idInter` =:id");

        $req->bindValue(':observation', $observation, PDO::PARAM_STR);
        $req->bindValue(':id', $ref, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui modifie dans la base de donnée le presenceTiers
 * @param $ref
 * @param $presencetiers
 */
function updatePresenceTiers($ref, $presenceTiers)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("UPDATE `fiche_intervention` 
            SET `presenceTiers` = :presenceTiers
            WHERE `fiche_intervention`.`idInter` =:id");

        $req->bindValue(':presenceTiers', $presenceTiers, PDO::PARAM_STR);
        $req->bindValue(':id', $ref, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui modifie dans la base de donnée la commune
 * @param $ref
 * @param $commune
 */
function updateCommune($ref, $commune)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("UPDATE `fiche_intervention` 
            SET `communeInter` = :communeInter
            WHERE `fiche_intervention`.`idInter` =:id");

        $req->bindValue('communeInter', $commune, PDO::PARAM_STR);
        $req->bindValue(':id', $ref, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui modifie dans la base de donnée l'heure d'arriver
 * @param $ref
 * @param $commune
 */
function updateHeureArriver($ref, $heureArriver)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("UPDATE `fiche_intervention` 
            SET `heureArriveeInter` = :heureArriver
            WHERE `fiche_intervention`.`idInter` =:id");
        $req->bindValue(':heureArriver', $heureArriver, PDO::PARAM_STR);
        $req->bindValue(':id', $ref, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


/**
 * Fonction qui modifie dans la base de donnée l'heure de départ
 * @param $ref
 * @param $commune
 */
function updateHeureDepart($ref, $heureDepart)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("UPDATE `fiche_intervention` 
            SET `heureDepartInter` = :heureDepart
            WHERE `fiche_intervention`.`idInter` =:id");
        $req->bindValue(':heureDepart', $heureDepart, PDO::PARAM_STR);
        $req->bindValue(':id', $ref, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui modifie dans la base de donnée les moyens humains
 * @param $ref
 * @param $moyensHumains
 * @param $nbMoyens
 */

function updateMoyenHumain($ref, $moyensHumains, $nbMoyens)
{
    try {

        $monPDO = connexionPDO();
        $req = $monPDO->prepare("UPDATE `employer` 
        SET `nbMoyens` = :nbMoyens
        WHERE `employer`.`idInter` =:idInter AND idMoyensHumains=:idMoyensHumains");
        $req->bindValue(':idInter', $ref, PDO::PARAM_INT);
        $req->bindValue(':idMoyensHumains', $moyensHumains, PDO::PARAM_INT);
        $req->bindValue(':nbMoyens', $nbMoyens, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


/**
 * Fonction qui modifie dans la base de donnée les moyens materiels
 * @param $ref
 * @param $moyensHumains
 * @param $nbMoyens
 */

function updateMoyenMateriel($ref, $moyensMateriels, $nbMoyensMateriels)
{
    try {

        $monPDO = connexionPDO();
        $req = $monPDO->prepare("UPDATE posseder 
         SET nbMoyensMatériels = :nbMoyensMateriels
         WHERE idInter =:idInter AND idMoyensMateriels=:idMoyensMateriels");
        $req->bindValue(':idInter', $ref, PDO::PARAM_INT);
        $req->bindValue(':idMoyensMateriels', $moyensMateriels, PDO::PARAM_INT);
        $req->bindValue(':nbMoyensMateriels', $nbMoyensMateriels, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function updateChaussee($ref, $chaussee)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("UPDATE `fiche_intervention` 
            SET `etatChausseeInter` = :chaussee
            WHERE `fiche_intervention`.`idInter` =:id");
        $req->bindValue(':chaussee', $chaussee, PDO::PARAM_STR);
        $req->bindValue(':id', $ref, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}



/**
 *Fonction qui supprime dans la base de donnée une voie
 * @param $ref
 * @param $refVoie
 */

function deleteVoie($ref, $refVoie)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("DELETE FROM `contenir` WHERE `contenir`.`idInter` = :ref AND `contenir`.`idVoie` = :refVoie");
        $req->bindValue(':ref', $ref, PDO::PARAM_INT);
        $req->bindValue(':refVoie', $refVoie, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 *Fonction qui supprime dans la base de donnée un moyen
 * @param $ref
 * @param $refVoie
 */

function deleteMoyen($ref, $moyen)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("DELETE FROM `employer` WHERE `employer`.`idInter` = :ref AND `employer`.`idMoyensHumains` = :moyen");
        $req->bindValue(':ref', $ref, PDO::PARAM_INT);
        $req->bindValue(':moyen', $moyen, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 *Fonction qui supprime dans la base de donnée un moyen
 * @param $ref
 * @param $refVoie
 */

function deleteMoyenMat($ref, $moyen)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("DELETE FROM `posseder` WHERE `posseder`.`idInter` = :ref AND `posseder`.`idMoyensMateriels` = :moyen");
        $req->bindValue(':ref', $ref, PDO::PARAM_INT);
        $req->bindValue(':moyen', $moyen, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


/**
 * Fonction qui supprime dans la base de donnée une précision
 * @param $ref
 * @param $refPrecision
 */
function deletePrecision($ref, $refPrecision)

{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("DELETE FROM `a_une_precision` WHERE `a_une_precision`.`idInter` = :ref AND `a_une_precision`.`idPrecision` = :refAccident");
        $req->bindValue(':ref', $ref, PDO::PARAM_INT);
        $req->bindValue(':refAccident', $refPrecision, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui retourn les ids des moyens mat de table 
 * @param $ref
 */

function selectMoyensMat($ref)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("SELECT idMoyensMateriels FROM posseder
            WHERE idInter=:ref");
        $req->bindValue(':ref', $ref, PDO::PARAM_INT);
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function existeMoyensMat($ref, $valeur)
{
    $result = false;
    $res = selectMoyensMat($ref);
    foreach ($res as $unRes) {
        if ($unRes['idMoyensMateriels'] == $valeur) {
            $result = true;
        }
    }

    return $result;
}



/**
 * Fonction qui retourne les ids des moyens humains de table employer à partir d'une reference
 * @param $ref
 */
function selectMoyens($ref)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("SELECT idMoyensHumains FROM employer
            WHERE idInter=:ref");
        $req->bindValue(':ref', $ref, PDO::PARAM_INT);
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function existeMoyens($ref, $valeur)
{
    $result = false;
    $res = selectMoyens($ref);
    foreach ($res as $unRes) {
        if ($unRes['idMoyensHumains'] == $valeur) {
            $result = true;
        }
    }

    return $result;
}



/**
 * Fonction qui retourne les ids des voies de la table contenir à partir d"une reference
 * @param $ref
 * @param $res
 */

function selectVoie($ref)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("SELECT c.idVoie FROM contenir c
            WHERE c.idInter=:ref");
        $req->bindValue(':ref', $ref, PDO::PARAM_INT);
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui retourne true ou false si une voie existe dans la base
 * @param $ref
 * @param $valeur
 * @param $result
 */


function existeVoie($ref, $valeur)
{
    $result = false;
    $res = selectVoie($ref);
    foreach ($res as $unRes) {
        if ($unRes['idVoie'] == $valeur) {
            $result = true;
        }
    }

    return $result;
}

/**
 * Fonction qui retourne les precisions à partir d'une réference
 * @param $ref
 * @return $res
 */

function selectPrecision($ref)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("SELECT a.idPrecision FROM a_une_precision a
            WHERE a.idInter=:ref");
        $req->bindValue(':ref', $ref, PDO::PARAM_INT);
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui retourne true ou false si une precision existe
 * @param $ref
 * @param $valeur
 * @return $result
 */

function existePrecision($ref, $valeur)
{
    $result = false;
    $res = selectPrecision($ref);
    foreach ($res as $unRes) {
        if ($unRes['idPrecision'] == $valeur) {
            $result = true;
        }
    }

    return $result;
}

/**
 * Fonction qui retourne les voies qui ne sont pas dans la fiche d'intervention
 * @param $ref
 * @return $res
 * 
 */



function getVoiesNotIn($ref)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("SELECT idVoie,libelleVoie as laVoie From voie
            WHERE libelleVoie NOT IN (SELECT libelleVoie FROM voie v
            INNER JOIN contenir c
            ON v.idVoie=c.idVoie
            WHERE c.idInter = :ref)");
        $req->bindValue(':ref', $ref, PDO::PARAM_INT);
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


/**
 * Fonction qui vérifie si il y a une voie dans le tableau
 * @param $tab
 * @param $voie
 
 */

function verifVoie($tab, $voie)
{
    try {
        $i = 0;
        $verif = false;
        while ($verif == false && $i < count($tab)) {
            if ($tab[$i] == $voie) {
                $verif = true;
            } else {
                $i = $i + 1;
            }
        }
        if ($verif == true) {
            return 'checked';
        } else {
            return '';
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

/**
 * Fonction qui vérifie si il y a un moyen dans le tableau
 * @param $tab
 * @param $moyen
 
 */

function verifMoyen($tab, $moyen)
{
    try {
        $i = 0;
        $verif = false;
        while ($verif == false && $i < count($tab)) {
            if ($tab[$i] == $moyen) {
                $verif = true;
            } else {
                $i = $i + 1;
            }
        }
        if ($verif == true) {
            return 'checked';
        } else {
            return '';
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function verifMoyenMat($tab, $moyen)
{
    try {
        $i = 0;
        $verif = false;
        while ($verif == false && $i < count($tab)) {
            if ($tab[$i] == $moyen) {
                $verif = true;
            } else {
                $i = $i + 1;
            }
        }
        if ($verif == true) {
            return 'checked';
        } else {
            return '';
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
