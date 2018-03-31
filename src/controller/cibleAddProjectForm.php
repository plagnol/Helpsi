<?php
/**
 * Created by PhpStorm.
 * User: antoine Plagnol
 * Date: 22/03/2018
 * Time: 09:17
 */


require("../../cache/database/database.php");
include_once("../autoloader.php");

session_start();
if (isset($_POST["submit"])) {
    if (!empty($_SESSION))
    {
        $db = getDatabase();
        $projectUpdater = new ProjectUpdater($db);
        $projet = $projectUpdater->hydrate1($_POST["name"], $_POST['description'], $_POST['github'], $_POST['slack'], $_POST['img']);
        $projectUpdater->addProject1($projet);
        $projectUpdater->projectTutor();
        header("location: createProject2.php");
    } else {
        header("location:createProject.php");
        }

}else{
    echo ("Champs non remplis");
}