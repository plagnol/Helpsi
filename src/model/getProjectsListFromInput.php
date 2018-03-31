<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 21/03/2018
 * Time: 18:18
 * @param Query from Projects list
 * @return  Project list
 * Function that return list of projects when you type their names
 */

function getProjectsListFromInput($UserQuery){

    $sth = "SELECT * FROM ProjectSkills WHERE name LIKE '%" . $UserQuery . "%' ORDER BY name";




    #This send the request to the database and returns a list
    $ProjectsList = $bdd->prepare($sth);
    $ProjectsList->execute();
    $arrayProjectsList = $ProjectsList->fetchall();
    $results = $ProjectsList->rowCount();


    #this prints the results of the request in html and give the number of results
    if ($results >= 1) {
        echo '<h4>Incroyable ! ' . $results . ' résultats pour "' . $UserQuery . '".</h4>';
    } elseif ($results == 0) {
        echo '<h4>Dommage... 0 résultats pour "' . $UserQuery . '".</h4>';
    }   

    return $results >= 1 ? $arraySkillsList : '';
}
?>