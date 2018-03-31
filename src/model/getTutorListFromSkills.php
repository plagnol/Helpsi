<?php
/**
 * Created by PhpStorm.
 * User: polor
 * Date: 19/03/2018
 * Time: 16:28
 * @param Query from Skills list
 * @return  tutors list
 * Function that return list of tutors when you type their names
 */

if (!isset($bdd)) {
    $bdd = getDatabase();
}
include_once('../../cache/database/database.php');
function getTutorListFromSkills($UserQuery,$bdd){

        $sth = "SELECT * FROM TutorsBySkills WHERE skill_id = " . $UserQuery . " ORDER BY mark Desc";
        $Skillrq = "SELECT name FROM skill WHERE skill_id =  " . $UserQuery ;



        #This send the request to the database and returns a list
        $TutorList = $bdd->prepare($sth);
        $TutorList->execute();
        $Skill = $bdd->prepare($Skillrq);
        $Skill->execute();
        $arraySkill = $Skill->fetchall(PDO::FETCH_ASSOC);
        $arrayTutorList = $TutorList->fetchall();
        $results = $TutorList->rowCount();


        #this prints the results of the request in html and give the number of results
        if ($results == 1) {
            echo '<h4>Super ! ' . $results . ' Tuteur pour "' . $arraySkill[0]['name'] . '".</h4>';
        }else if ($results >= 1) {
            echo '<h4>Super ! ' . $results . ' Tuteurs pour "' . $arraySkill[0]['name'] . '".</h4>';
        } elseif ($results == 0) {
            echo '<h4">Dommage... 0 Tuteurs pour "' . $arraySkill[0]['name'] . '".</h4>';
        }
        return $results >= 1 ? $arrayTutorList : '';



}
?>