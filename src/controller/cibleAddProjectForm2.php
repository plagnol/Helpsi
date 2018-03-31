<?php
/**
 * Created by PhpStorm.
 * User: antoine Plagnol
 * Date: 22/03/2018
 * Time: 09:17
 */

session_start();
require("../../cache/database/database.php");
include("../autoloader.php");


if (isset($_POST["submit"])) {
    $db = getDatabase();
    $projectUpdater = new ProjectUpdater($db);
    $array = array();
    foreach($_POST as $result){
        if($_POST['submit'] != $result){
            $array[] = $result;
        }
    }
    $projectUpdater->addProject2($array);
    header("location: createProject3.php");
}else{
    echo ("Champ non rempli");
}