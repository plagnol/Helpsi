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
function getSkillsByUserId($user_id,$bdd){

    $sth = "SELECT skill.skill_id, name, mark, open FROM skill,l_user_skill,user WHERE skill.skill_id=l_user_skill.skill_id AND user.user_id=l_user_skill.user_id AND user.user_id =".$user_id;

    #This send the request to the database and returns a list
    $SkillName = $bdd->prepare($sth);
    $SkillName->execute();
    $arraySkillName = $SkillName->fetchall(PDO::FETCH_ASSOC);

    return $arraySkillName;
}
?>