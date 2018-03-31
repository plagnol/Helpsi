<!DOCTYPE html>
<html>
    <?php
    require ("../views/head.html");
    require ("../views/menu.php");
    include_once ("../autoloader.php");
    ?>

    <body>
	<!--Display input to search-->
	<div id="blue">
		<div class="container">
			<div class="row">
				<h3 class="mt-2">Se connecter.</h3>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /blue -->
	<div class="container py-5">
            <?php
            require ("../views/form/loginForm.html");
            ?>
        </div><br><br>
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
        
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="../../../assets/js/bootstrap.min.js"></script>
	<script src="../../../assets/js/retina-1.1.0.js"></script>
	<script src="../../../assets/js/jquery.hoverdir.js"></script>
	<script src="../../../assets/js/jquery.hoverex.min.js"></script>
	<script src="../../../assets/js/jquery.prettyPhoto.js"></script>
	<script src="../../../assets/js/jquery.isotope.min.js"></script>
	<script src="../../../assets/js/custom.js"></script>
</body>
</html>

