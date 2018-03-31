<?php
/**
 * Created by PhpStorm.
 * User: antoine Plagnol
 * Date: 20/03/2018
 * Time: 12:00
 */
require("../../cache/database/database.php");
include("../autoloader.php");

if (isset($_POST["submit"])) {
    $db = getDatabase();
    $updaterUser = new UserUpdater($db);
    $user = $updaterUser->getUserForm($_POST);
    $number = $updaterUser->signIn($user);
    if ($number == 1){
		echo '<script>alert("Passwords don\'t match !\nPlease retry.");</script>';
		require ("signin.php");
	}
	else if ($number == 2) {
		echo '<script>alert("Mail already used or not valid !\nPlease retry.");</script>';
		require ("signin.php");
	}
	else {
		echo '<script>alert("You successfully registered !\nPlease log in.");</script>';
	}
}else{
    echo ("Erreur lors de votre inscription");
}
