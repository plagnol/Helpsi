<?php
/**
 * Created by PhpStorm.
 * User: TEAMJBZZ
 * Date: 20/03/2018
 * Time: 13:55
 */

/*include ('../autoloader.php');
include('../../cache/database/database.php');
include('../model/getUser_idFromUser_key.php');*/

/*session_start();*/
?>
<h3>Ajouter un cours</h3>
<?php
$db=getDatabase();
$eventManager = new EventManager();
$eventUpdater = new EventUpdater($db);
$startdate = "";
$starthour = "";
$endhour = "";
if (isset($_POST["startdate"]) && isset($_POST["starthour"]) && isset($_POST["endhour"])) {
    if (!empty($_SESSION)) {

        $startdate = htmlspecialchars($_POST["startdate"]);
        $starthour = htmlspecialchars($_POST["starthour"]);
        $endhour = htmlspecialchars($_POST["endhour"]);
        $idtype = htmlspecialchars($_POST["typec"]);
        $key_tutor = $_SESSION["user_key"];
        $id_tutor = getUser_idFromUser_key($key_tutor, $db);
        $event = $eventManager->getEventForm($startdate, $starthour, $endhour, $idtype, $id_tutor);
        $eventUpdater->addEvent($event);
    } else {
        echo '<p style="color:red">Vous ne pouvez pas ajouter un cours en étant déconnecté</p>';
    }
}

require('../views/pages/EventAdd.php');




