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
function updateWithMark($user_id,$skill_id,$open,$mark,$bdd){

    $sth = "update l_user_skill set open = :pnewOpen, mark = :pmark where user_id = :puserID and skill_id = :pskillid";

    #This send the request to the database
    $Update = $bdd->prepare($sth);
    $Update->bindParam(':pmark',$mark);
    $Update->bindParam(':pnewOpen', $open);
    $Update->bindParam(':puserID', $user_id);
    $Update->bindParam(':pskillid', $skill_id);
    $Update->execute();
}
?>