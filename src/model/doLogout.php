<?php
/**
 * Created by PhpStorm.
 * User: antoine Plagnol
 * Date: 20/03/2018
 * Time: 09:17
 */

    //Require Database
    require("../../cache/database/database.php");
    //Require UserUpdater class
    include("class/UserUpdater.class.php");
    //Session start
    session_start();

    $db = getDatabase();
    $manager = new UserUpdater($db);

    //Logout
    $manager->logoutUser();

?>


