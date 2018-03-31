<?php
/**
 * Created by PhpStorm.
 * User: antoi
 * Date: 22/03/2018
 * Time: 23:21
 */
session_start();
require("../../cache/database/database.php");
include("../autoloader.php");

if (isset($_POST["submit"])) {
    $db = getDatabase();
    $eventUpdater = new EventUpdater($db);
    $eventUpdater->addMark($_POST['event_id'],$_SESSION['user_id'], $_POST['note']);
    header("location: eventList.php?id=".$_SESSION['user_key']);
}else{
    echo ("Champ non rempli");
}