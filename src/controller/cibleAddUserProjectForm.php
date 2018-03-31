<?php
/**
 * Created by PhpStorm.
 * User: antoine Plagnol
 * Date: 22/03/2018
 * Time: 15:36
 */
require("../../cache/database/database.php");
include("../autoloader.php");
if (isset($_POST["submit"])) {
    $db = getDatabase();
    $projectUpdater = new ProjectUpdater($db);
    $array = array();
    foreach($_POST as $result){
        if($_POST['submit'] != $result && isset($result)){

            $array[] = $result;
        }
    }
    $projectUpdater->addUsersProject($array, $_POST['id']);
    $last = $projectUpdater->getLastProject();
    $lastId = $last['project_id'];

    header("location: projectProfile.php?id=".$_POST['id']);
}else{
    echo ("Champ non rempli");
}