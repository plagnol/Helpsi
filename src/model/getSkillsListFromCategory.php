<?php
/**
 * Created by PhpStorm.
 * User: polor
 * Date: 20/03/2018
 * Time: 14:14
 */

include_once('../../cache/database/database.php');
if (!isset($bdd)) {
    $bdd = getDatabase();
}
function getSkillsListFromCategory($Query,$bdd){

    $sth="SELECT skillname, skill_id FROM SkillByCategory WHERE category='" . $Query[0] . "'";
    #This send the request to the database and returns a list
    $SkillsList = $bdd->prepare($sth);

    $SkillsList->execute();

    $arraySkillsList = $SkillsList->fetchall();
    return $arraySkillsList ;
}
?>