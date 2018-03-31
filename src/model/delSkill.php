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
function delSkill($skill_id,$user_id,$bdd){

    $sth = "DELETE FROM l_user_skill WHERE skill_id=".$skill_id." AND user_id=".$user_id;
    echo $sth;

    #This send the request to the database
    $SkillName = $bdd->prepare($sth);
    $SkillName->execute();

}
?>