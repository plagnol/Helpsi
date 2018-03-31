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
function updateAvailable($available_id,$datestart,$dateend,$user_id,$bdd){

    $sth = "update available set startdate = :pnewStartDate, duration = :pDuration where user_id = :puserID and available_id = :pavailableid";

    #This send the request to the database
    $Update = $bdd->prepare($sth);
    $Update->bindParam(':pDuration',$dateend);
    $Update->bindParam(':pnewStartDate', $datestart);
    $Update->bindParam(':puserID', $user_id);
    $Update->bindParam(':pavailableid', $available_id);
    $Update->execute();
}
?>