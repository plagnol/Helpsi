<?php
/**
 * Created by PhpStorm.
 * User: antoine Plagnol
 * Date: 20/03/2018
 * Time: 14:17
 */
session_start();
require("../../cache/database/database.php");
include_once("../autoloader.php");


if (isset($_POST["submit"])) {

    $db = getDatabase();
    $updaterUser = new UserUpdater($db);

    $number = $updaterUser->loginUser();
    if ($number == 1) {
		echo '<script>alert("Email ou mot de passe incorrect");</script>';
		require ("login.php");
	} else {
        header("location:http://helpsi.freeboxos.fr/src/controller/profile.php?id=".$_SESSION['user_key']);
    }

}else{
    echo ("Champ non rempli");
}
