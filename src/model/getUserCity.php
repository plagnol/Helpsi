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
function getUserCity($id,$bdd){

    #This send the request to the database and returns a list
    $user_city = $bdd->prepare("SELECT city, U.school_id FROM user U, school S WHERE user_id = :puserID AND U.school_id = S.school_id");
    $user_city->bindParam(':puserID', $id);
    $user_city->execute();
    $arrayUser_city = $user_city->fetch(PDO::FETCH_OBJ);
    $user_city->closeCursor();
    return $arrayUser_city;


}
?>