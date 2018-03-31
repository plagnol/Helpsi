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
function addSkills($user_id,$skill_id,$mark,$open,$bdd){
    $skill_id = intval($skill_id);
    $user_id = intval($user_id);
    $checkvalid = $bdd->prepare("SELECT * FROM l_user_skill WHERE skill_id = :pskillID AND user_id = :puserID");
    $checkvalid->bindParam(':pskillID', $skill_id);
    $checkvalid->bindParam(':puserID', $user_id);
    $checkvalid->execute();
    $checkvalid->fetch(PDO::FETCH_OBJ);
    $result = 0;
    if ($checkvalid->rowCount() == 0)
    {
        $sth = "INSERT INTO l_user_skill(mark, open, skill_id, user_id) VALUES ($mark,$open,$skill_id,$user_id)";

        #This send the request to the database and returns a list
        $NewSkill = $bdd->prepare($sth);
        $NewSkill->execute();
    } else {
        $result = 1;
    }
return $result;

}
?>