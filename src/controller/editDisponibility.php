<!DOCTYPE html>
<html>
<?php
session_start();
// include file
require ("../views/head.html");
include_once ("../../cache/database/database.php");
include ("../autoloader.php");
include ("../model/getListAvailableById.php");
include ("../model/getAvailableListFromKey.php");
include ("../model/updateAvailable.php");
?>
<body id="body">

<?php require("../views/menu.php");?>
<!--Display input to search-->
	<div id="blue">
		<div class="container">
			<div class="row">
				<h3 class="mt-2">Disponibilités.</h3>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /blue -->
	<div class="container">
<?php
$bdd = getDatabase();
$userUpdater = new UserUpdater(getDatabase());
if (isset($_POST["submit"])) {
    $available_id = $_POST['available_id'];
    $user_key = $_SESSION['user_key'];
    $userinfo = $userUpdater->getUserFromKey($user_key);
    $array = getListAvailableById($user_key, $bdd);
    require ("../views/form/formForUpdate.php");
}
else if (isset($_POST["submitUpdate"])) {
    $DateD = $_POST['dateD'];
    $time = $_POST['time'];
    $duree = $_POST['duree'];

    $datestart = $DateD." ".$time;
    $dateend = $DateD." ".$duree;

    $available_id = $_POST['available_id'];
    $user_key = $_SESSION['user_key'];
    $userinfo = $userUpdater->getUserFromKey($user_key);
    $user_id = $userinfo['user_id'];
    updateAvailable($available_id,$datestart,$dateend,$user_id,$bdd);
    header('Location: http://helpsi.freeboxos.fr/src/controller/profile.php?id='.$user_key);
}
else {
    $user_key = $_SESSION['user_key'];
    $userinfo = $userUpdater->getUserFromKey($user_key);
    $array = getListAvailableByKey($user_key, $bdd);
    require ("../views/pages/myDisponibility_update.php");
}

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
  	<br><br><br><br><br><br><br><br>
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