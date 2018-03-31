<?php
/**
 * Created by PhpStorm.
 * User: polor
 * Date: 19/03/2018
 * Time: 16:28
 * @param Query from input
 * @return  tutors list
 * Function that return list of tutors when you type their names
 */

include ('../../cache/database/database.php');
function getTutorListFromName($UserQuery){
    if (!isset($bdd)) {
        $bdd = getDatabase();
    }
    if (isset($bdd)) {

        #We cut the query in 2 parts
        $names = explode(" ",$UserQuery,2);
        $fname = $names[0];



        #if we have only one element it searches this element in first or last names in our view
        if (sizeof($names)==1){
            $sth = "SELECT * FROM TutorList WHERE fname LIKE '%" . $fname . "%' OR lname LIKE '%" . $fname . "%' ORDER BY fname desc";

        }

        #if we have two elements it searches for each elements if its a lastname or a firstname
        if (sizeof($names)==2){
            $lname = $names[1];
            $sth = "SELECT * FROM TutorList WHERE fname LIKE '%" . $fname . "%' OR lname LIKE '%" . $lname . "%' OR fname LIKE '%" . $lname . "%' OR lname LIKE '%" . $fname . "%' ORDER BY fname desc";
        }

        #This send the request to the database and returns a list
        $TutorList = $bdd->prepare($sth);
        $TutorList->execute();
        $arrayTutorList = $TutorList->fetchall();
        $results = $TutorList->rowCount();


        #this prints the results of the request in html and give the number of results
        if ($UserQuery == " ") {
            echo '<h4>Incroyable ! Il y a ' . $results . ' Tuteurs inscrits</h4>';
        } elseif ($results == 0) {
            echo '<h4>FeelsBadMan... 0 résultats pour "' . $UserQuery . '".</h4>';
        }elseif ($results >= 1) {
            echo '<h4>Incroyable ! ' . $results . ' résultats pour  "' . $UserQuery . '".</h4>';
        }
        return $results >= 1 ? $arrayTutorList : '';

    }

}
?>
