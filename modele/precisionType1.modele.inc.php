<?php

include_once 'bd.inc.php';
/**
 * Fonction qui retourne les précision de type 1 accidents qui ne sont pas dans la fiche intervention
 * @param $ref
 * @return $res
 */

function getAccidentNotIn($ref)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("SELECT idPrecision,libellePrecision FROM vue_accident
         WHERE libellePrecision NOT IN (SELECT libellePrecision FROM precisionIntervention p
                     INNER JOIN a_une_precision a
                     ON p.idPrecision=a.idPrecision
                     WHERE a.idInter = :ref)");
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
 * Fonction qui retourne les précision de type 1 animaux qui ne sont pas dans la fiche intervention
 * @param $ref
 * @return $res
 */


function getAnimauxNotIn($ref)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("SELECT idPrecision,libellePrecision FROM vue_animaux
         WHERE libellePrecision NOT IN (SELECT libellePrecision FROM precisionIntervention p
                     INNER JOIN a_une_precision a
                     ON p.idPrecision=a.idPrecision
                     WHERE a.idInter = :ref)");
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
 * Fonction qui retourne les précision de type 1 bouchons qui ne sont pas dans la fiche intervention
 * @param $ref
 * @return $res
 */

function getBouchonNotIn($ref)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("SELECT idPrecision,libellePrecision FROM vue_bouchon
         WHERE libellePrecision NOT IN (SELECT libellePrecision FROM precisionIntervention p
                     INNER JOIN a_une_precision a
                     ON p.idPrecision=a.idPrecision
                     WHERE a.idInter = :ref)");
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
 * Fonction qui retourne les précision de type 1 intempéries qui ne sont pas dans la fiche intervention
 * @param $ref
 * @return $res
 */

function getIntempNotIn($ref)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("SELECT idPrecision,libellePrecision FROM vue_intemp
         WHERE libellePrecision NOT IN (SELECT libellePrecision FROM precisionIntervention p
                     INNER JOIN a_une_precision a
                     ON p.idPrecision=a.idPrecision
                     WHERE a.idInter = :ref)");
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
 * Fonction qui retourne les précision de type 1 obstacle qui ne sont pas dans la fiche intervention
 * @param $ref
 * @return $res
 */


function getObstacleNotIn($ref)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("SELECT idPrecision,libellePrecision FROM vue_obstacle
         WHERE libellePrecision NOT IN (SELECT libellePrecision FROM precisionIntervention p
                     INNER JOIN a_une_precision a
                     ON p.idPrecision=a.idPrecision
                     WHERE a.idInter = :ref)");
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
 * Fonction qui retourne les précision de type 1 Balisage qui ne sont pas dans la fiche intervention
 * @param $ref
 * @return $res
 */

function getBalisageNotIn($ref)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("SELECT idPrecision,libellePrecision FROM vue_Balisage
         WHERE libellePrecision NOT IN (SELECT libellePrecision FROM precisionIntervention p
                     INNER JOIN a_une_precision a
                     ON p.idPrecision=a.idPrecision
                     WHERE a.idInter = :ref)");
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
 * Fonction qui retourne les précision de type 1 Chaussee qui ne sont pas dans la fiche intervention
 * @param $ref
 * @return $res
 */

function getChausseeNotIn($ref)
{
    try {
        $monPDO = connexionPDO();
        $req = $monPDO->prepare("SELECT idPrecision,libellePrecision FROM vue_chaussee
         WHERE libellePrecision NOT IN (SELECT libellePrecision FROM precisionIntervention p
                     INNER JOIN a_une_precision a
                     ON p.idPrecision=a.idPrecision
                     WHERE a.idInter = :ref)");
        $req->bindValue(':ref', $ref, PDO::PARAM_INT);
        $req->execute();
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
