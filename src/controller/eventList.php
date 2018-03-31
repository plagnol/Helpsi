<?php
/**
 * Created by PhpStorm.
 * User: antoine Plagnol
 * Date: 22/03/2018
 * Time: 22:18
 */
session_start();
// include file
require ("../views/head.html");
include_once("../../cache/database/database.php");
require("../model/getUser_idFromUser_key.php");
include("../autoloader.php");
?>
<!--Display input to search-->
<div id="blue">
    <div class="container">
        <div class="row">
            <h3 class="mt-2">Liste des cours passé.</h3>
        </div><!-- /row -->
    </div> <!-- /container -->
</div><!-- /blue -->
<body>
<?php
$db = getDatabase();
require("../views/menu.php");
if(isset($_GET['id'])){
    $eventUpdater = new EventUpdater($db);
    $userUpdater = new UserUpdater($db);

    $id = getUser_idFromUser_key($_GET['id'], $db);
    $listEvent = $eventUpdater->getEventListFromKey($id);
    require("../views/pages/eventListKey.php");
}else{
    echo 'Erreur de l\id de l\'utilisateur';
}
?>
</body>
