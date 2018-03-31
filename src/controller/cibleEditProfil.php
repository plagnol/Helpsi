<?php
/**
 * Created by PhpStorm.
 * User: antoine Plagnol
 * Date: 22/03/2018
 * Time: 19:32
 */

session_start();
require("../../cache/database/database.php");
include("../autoloader.php");
require("../model/getUser_idFromUser_key.php");

if (isset($_POST["submit"])) {
    if(empty($_POST['website'])){
        $web = $_SESSION['website'];
    }else{
        $web = $_POST["submit"];
    }

    if(empty($_POST['discord']))
    {
        $disc = $_SESSION['discord'];
    }else{
        $disc = $_POST['discord'];
    }
    if(empty($_POST['facebook']))
    {
        $face = $_SESSION['facebook'];
    }else{
        $face = $_POST['facebook'];
    }
    if(empty($_POST['linkedin']))
    {
        $link = $_SESSION['linkedin'];
    }else{
        $link = $_POST['linkedin'];
    }
    if(empty($_POST['skype']))
    {
        $skype = $_SESSION['skype'];
    }else{
        $skype = $_POST['skype'];
    }
    if(empty($_POST['git']))
    {
        $git = $_SESSION['git'];
    }else{
        $git = $_POST['git'];
    }
    $db = getDatabase();
    $updaterUser = new UserUpdater($db);
    $id = getUser_idFromUser_key($_SESSION['user_key'], $db);
    $updaterUser->updateLink($web, $disc, $face, $link, $skype, $git, $id);
    header("location:profile.php?id=" .$_SESSION['user_key'] );
}else{
    echo ("Erreur lors de votre inscription");
}
