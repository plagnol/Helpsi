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
$eventid = $_POST["eventid"];
$eventManager = new EventManager();
$eventUpdater = new EventUpdater($db);
$key_tutor = $_SESSION["user_key"];
$id_tutor = getUser_idFromUser_key($key_tutor, $db);
require("../views/pages/EventUpdate.php");
if (isset($_POST["newstartdate"]) && isset($_POST["newstarthour"]) && isset($_POST["newendhour"]) && $eventUpdater->checkTutorID($id_tutor))
{
	$event_id = $_POST["ajoutevent"];
	$startdate = htmlspecialchars($_POST["newstartdate"]);
	$starthour = htmlspecialchars($_POST["newstarthour"]);
	$endhour = htmlspecialchars($_POST["newendhour"]);
	$idtype = htmlspecialchars($_POST["newtypec"]);

	$event = $eventManager->getEventForm($startdate, $starthour, $endhour, $idtype, $id_tutor);
	$eventUpdater->updateEvent($startdate, $starthour, $endhour, $typeid, $event_id);
} else{
	echo '<p>Seuls les tuteurs peuvent modifier leur cours</p>';
}

header('listEvent.php');
