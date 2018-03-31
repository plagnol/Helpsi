<?php 

include_once('../../cache/database/database.php');
if (!isset($bdd)) {
    $bdd = getDatabase();
}
/**
 * @param $bdd
 * @return mixed
 */
function getAllSkills($bdd){

    $sth="SELECT name FROM skill";
    
    //This send the request to the database and returns a list
    $SkillsList = $bdd->prepare($sth);

    $SkillsList->execute();

    $arraySkillsList = $SkillsList->fetchall();
    return $arraySkillsList ;


}

/**
 * @param $bdd
 * @return mixed
 */
function getAllSkillsInfo($bdd){

    $sth="SELECT * FROM skill";

    //This send the request to the database and returns a list
    $SkillsList = $bdd->prepare($sth);

    $SkillsList->execute();

    $arraySkillsList = $SkillsList->fetchall();
    return $arraySkillsList ;
}

?>