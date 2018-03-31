<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<?php include("../views/head.html");?>
<body>
<?php
include ("../views/menu.php");
// include file for function getPlayersList
include ("../model/getTutorListFromName.php");
?>
<!--Display input to search-->
	<div id="blue">
	    <div class="container">
			<div class="row">
				<h3 class="mt-2">Tuteurs.</h3>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /blue -->

<!--Display input to search-->
	<div class="container">
		<form action="tutors.php" role="form" class="form-inline mb-4"
			method="POST">
			<div class="input-group" style="width:auto;display:flex;">
				<input name="name" type="text" class="form-control"
					placeholder="Entrer le nom du tuteur ..." autofocus>
				<button name="submitsearch" type="submit"
					class="btn btn-secondary input-group-button"
					style="border-radius: 0 0.25rem 0.25rem 0;">Go</button>
			</div>
		</form>
		<hr>

<?php
if (isset($_POST['submitsearch'])) {
    $UserQuery = $_POST['name'];
    $arrayTutorList = getTutorListFromName($UserQuery);
	if (! empty($arrayTutorList)) {
		// Display list of tutors
		require ("../views/pages/tutorslist.php");
	}
}
else {
	$arrayTutorList = getTutorListFromName(" ");
	if (! empty($arrayTutorList)) {
		// Display list of tutors
		require ("../views/pages/tutorslist.php");
	}
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