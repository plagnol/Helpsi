<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 20/03/2018
 * Time: 14:14
 */

include_once('../../cache/database/database.php');
if (!isset($bdd)) {
    $bdd = getDatabase();
}
function getSkillIdFromSkillName($UserQuery,$bdd){

    $sth = "SELECT skill_id FROM SkillByCategory WHERE skillname LIKE '%" . $UserQuery . "%'";

        #This send the request to the database and returns a list
    $SkillId = $bdd->prepare($sth);
    $SkillId->execute();
    $arrayWithSkillid = $SkillId->fetch();
    $results = $SkillId->rowCount();

    return $arrayWithSkillid;
}
?>