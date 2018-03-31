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
function getSkillsListFromInput($UserQuery,$bdd){



        #
    $sth = "SELECT * FROM SkillByCategory WHERE skillname LIKE '%" . $UserQuery . "%' ORDER BY skillname";




        #This send the request to the database and returns a list
    $SkillsList = $bdd->prepare($sth);
    $SkillsList->execute();
    $arraySkillsList = $SkillsList->fetchall();
    $results = $SkillsList->rowCount();


    #this prints the results of the request in html and give the number of results
    if ($results >= 1) {
        echo '<h4>Incroyable ! ' . $results . ' résultats pour "' . $UserQuery . '".</h4>';
    } elseif ($results == 0) {
        echo '<h4>Dommage... 0 résultats pour "' . $UserQuery . '".</h4>';
    }

    return $results >= 1 ? $arraySkillsList : '';



}
?>