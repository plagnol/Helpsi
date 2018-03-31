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
function getUser_idFromUser_key($Query,$bdd){

    $sth="SELECT user_id FROM user WHERE user_key='" . $Query . "'";
    #This send the request to the database and returns a list
    $user_id = $bdd->prepare($sth);

    $user_id->execute();

    $arrayUser_id = $user_id->fetchall();
    return $arrayUser_id[0]["user_id"] ;


}
?>