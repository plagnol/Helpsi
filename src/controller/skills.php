<?php session_start();?>
<!DOCTYPE html>
<html>
<?php
// include file for all functions
require ("../views/head.html");
include ("../model/getSkillsListFromCategory.php");
include ("../model/getCategory.php");
include ("../model/getSkillsListFromInput.php");
include ("../model/getTutorListFromSkills.php");
?>
<body>
<?php require("../views/menu.php");?>
<!--Display input to search-->
	<div id="blue">
	    <div class="container">
			<div class="row">
				<h3 class="mt-2">Compétences.</h3>
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /blue -->
	<div class="container">
		<form action="skills.php" role="form" class="form-inline mb-4"
			method="POST">
			<div class="input-group" style="width:auto;display:flex;">
				<input name="name" type="text" class="form-control"
					placeholder="Entrer le nom d'une compétence ..." style="float:left;" data-provide="typeahead" autocomplete="off" autofocus>
				<button name="submitsearch" type="submit"
					class="btn btn-secondary input-group-button"
					style="border-radius: 0 0.25rem 0.25rem 0;"><i class="fas fa-search"></i></button>
				<div class="hidden"></div>
			</div>
		</form>
		<hr>

<?php
// If we search
if (isset($_POST['submitsearch'])) {
    $UserQuery = $_POST['name'];
    // get skills with query
    $arraySkillsList = getSkillsListFromInput($UserQuery, $bdd);
    if (! empty($arraySkillsList)) {
        // Display list of skills by name
        require ("../views/pages/skillsListFromName.php");
    }
} // If we click on a skill to search tutor
else if (! empty($_GET['id'])) {
    $id = $_GET['id'];
    // get tutor for a skill
    $arrayTutorBySkills = getTutorListFromSkills($id, $bdd);
    if (! empty($arrayTutorBySkills)) {
        // Display list of tutor by skill
        require("../views/pages/tutorsListFromSkill.php");
    }
} else {
    // Get all categories
    $arrayCategory = getCategory($bdd);
    if (! empty($arrayCategory)) {
        echo '<div class="list-group list-group-flush" style="border-radius:0.25rem;">';
        // Display list of skill by category
        foreach ($arrayCategory as $category) { // Foreach category we display him in a <ul> and we display all skills for this category
            echo "<h4>" . $category[0] . "</h4>";
            // Get skill for a category
            $arraySkillsByCategory = getSkillsListFromCategory($category, $bdd);
            if (! empty($arraySkillsByCategory)) {
                foreach ($arraySkillsByCategory as $skill) { // Display skills for a category
                    echo '<a href="skills.php?id=' . $skill ['skill_id'] . '" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">' . $skill['skillname'] . '</a>';
                }
            }
            echo '<hr width="30%" style="margin-right:auto;margin-left:auto;">';
        }
        echo '</div>';
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