<?php
/**
 * Created by PhpStorm.
 * User: polor
 * Date: 21/03/2018
 * Time: 09:22
 */

include_once('../../cache/database/database.php');
if (!isset($bdd)) {
    $bdd = getDatabase();
}
function getCategory($bdd){



    $sth = "SELECT name FROM category";
    #This send the request to the database and returns a list
    $CategoriesList = $bdd->prepare($sth);
    $CategoriesList->execute();
    $arrayCategoriesList = $CategoriesList->fetchall();
    return $arrayCategoriesList;


}
?>