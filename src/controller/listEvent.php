<?php
include ('../../cache/database/database.php');
include ('../autoloader.php');
include ('../model/getUser_idFromUser_key.php');
?>
<!DOCTYPE html>
<html>
<?php
// include file for all functions
require ("../views/head.html");
session_start();
?>
<body>
<?php require '../views/menu.php';?>
<!--Display input to search-->
	<div id="blue">
		<div class="container">
			<div class="row">
				<h3 class="mt-2">Cours.</h3>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /blue -->

	<div class="container">
<?php
require("addEvent.php");
$db = getDatabase();
$eventManager = new EventManager();
$eventUpdater = new EventUpdater($db);
if (isset ($_POST["ajoutevent"]))
{
	if (!empty($_SESSION))
	{
        $user_key = $_SESSION["user_key"];
        $user_id = getUser_idFromUser_key($user_key, $db);
		$event_id = $_POST["ajoutevent"];
		if ($eventUpdater->confirmRegistration($user_id, $event_id))
		{
			$eventUpdater->validateRegister($user_id, $event_id);
			$eventUpdater->addToRoaster($event_id);
			echo'<p style="color:green">Vous avez bien été enregistré dans le cours !</p>';
		}

	} else {
        echo '<p style="color:red">Vous n\'êtes pas connecté pour agir</p>';
    }

}
if (isset ($_POST["eventdelete"]))
{
    if (!empty($_SESSION))
    {
        $user_key = $_SESSION["user_key"];
        $user_id = getUser_idFromUser_key($user_key, $db);
        $event_id = $_POST["eventdelete"];
        if($eventUpdater->checkTutorID($user_id, $event_id))
        {
            $eventUpdater->deleteEvent($event_id);
            echo '<p style="color: green">Le cours a bien été supprimé</p>';
        } else {
            echo'<p style="color: red">Vous n\'avez pas le droit de supprimer un cours qui ne vous appartient pas</p>';
        }
    } else {
        echo '<p style="color:red">Vous n\'êtes pas connecté pour agir</p>';
    }

}




require ("../views/pages/EventList.php");
?>
</div>
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="../../../assets/js/bootstrap.min.js"></script>
	<script src="../../../assets/js/retina-1.1.0.js"></script>
	<script src="../../../assets/js/jquery.hoverdir.js"></script>
	<script src="../../../assets/js/jquery.hoverex.min.js"></script>
	<script src="../../../assets/js/jquery.prettyPhoto.js"></script>
	<script src="../../../assets/js/jquery.isotope.min.js"></script>
	<script src="../../../assets/js/custom.js"></script>

<!-- *****************************************************************************************************************
FOOTER
***************************************************************************************************************** -->
<div id="footerwrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h4>A propos</h4>
                <div class="hline-w"></div>
                <p>
                    Helpsi a été conçu lors du second workshop B1 EPSI par l'équipe
                    homonyme de Montpellier composée de : <br> - Anthony Perrin<br> -
                    Pierre Noble<br> - Antoine Plagnol<br> - Tom Saunier<br> - Pol
                    Rubeillon
                </p>
            </div>
            <div class="col-lg-6">
                <h4>EPSI Montpellier</h4>
                <div class="hline-w"></div>
                <p>
                    437 Avenue des Apothicaires,<br /> 34000, Montpellier<br />
                    France.<br />
                </p>
            </div>

        </div>
        <! --/row -->
    </div>
    <! --/container -->
</div>
</body>
</html>