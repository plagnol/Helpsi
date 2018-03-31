<?php
/**
 * Created by PhpStorm.
 * User: TEAMJBZZ
 * Date: 20/03/2018
 * Time: 13:55
 */

include('../../cache/database/database.php');
include ('../autoloader.php');
include('../model/getUser_idFromUser_key.php');

session_start();


$db=getDatabase();
$eventManager = new EventManager();
$eventUpdater = new EventUpdater($db);
$tutor_key = $_SESSION["user_key"];
$tutor_id = getUser_idFromUser_key($tutor_key, $db);
if (isset($_POST) && $eventUpdater->checkTutorID($tutor_id))
{
	$eventid = $_POST["eventdelete"];
	$eventUpdater->deleteEvent($eventid);
} else {
	echo '<p>Seuls les tuteurs ont l\'autorisation de supprimer leur cours</p>';
}

require("../views/pages/EventDelete.php");