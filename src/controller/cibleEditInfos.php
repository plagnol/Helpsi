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

print_r($_POST);
if (isset($_POST["submit"])) {
    if(!empty($_POST['pw'])){
        if($_POST['pw'] == $_POST['pw2']){
            if(empty($_POST['phone'])){
                $tel = $_SESSION['phone'];
            }else{
                $tel = $_POST["phone"];
            }
            if(empty($_POST['avatar'])){
                $avatar = $_SESSION['avatar'];
            }else{
                $avatar = $_POST["avatar"];
            }

            if(empty($_POST['bio']))
            {
                $bio = $_SESSION['bio'];
            }else{
                $bio = htmlspecialchars($_POST['bio']);
            }
            if(empty($_POST['grade']))
            {
                $grad = $_SESSION['grade'];
            }else {
                $grad = $_POST['grade'];
            }
            if(empty($_POST['city']))
            {
                $vil = $_SESSION['city'];
            }else{
                $vil = $_POST['city'];
            }
            $pw =$_POST['password'];
            $db = getDatabase();
            $updaterUser = new UserUpdater($db);
            $id = getUser_idFromUser_key($_SESSION['user_key'], $db);
            $updaterUser->updateProfil($tel, $pw, $bio, $avatar, $grad, $vil, $id);
            //header("location:profile.php");
        }else {
            echo "Erreur lors de la confirmation du mdp";
        }
    }else{
        if (empty($_POST['phone'])) {
            $tel = $_SESSION['phone'];
        } else {
            $tel = $_POST["phone"];
        }
        if (empty($_POST['avatar'])) {
            $avatar = $_SESSION['avatar'];
        } else {
            $avatar = $_POST["avatar"];
        }

        if (empty($_POST['bio'])) {
            $bio = $_SESSION['bio'];
        } else {
            $bio = $_POST['bio'];
        }
        if (empty($_POST['grade'])) {
            $grad = $_SESSION['grade'];
        } else {
            $grad = $_POST['grade'];
        }
        if (empty($_POST['city'])) {
            $vil = $_SESSION['city'];
        } else {
            $vil = $_POST['city'];
        }
        $pw = $_SESSION['password'];
        $db = getDatabase();
        $updaterUser = new UserUpdater($db);
        $id = getUser_idFromUser_key($_SESSION['user_key'], $db);
        $updaterUser->updateProfil($tel, $pw, $bio, $avatar, $grad, $vil, $id);
        header("location:profile.php?id=" .$_SESSION['user_key']);

    }


}else{
    echo ("Erreur lors de la modification de vos données");
}
