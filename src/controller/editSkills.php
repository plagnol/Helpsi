<!DOCTYPE html>
<html>
<?php
session_start();
// include file
require ("../views/head.html");
include_once ("../../cache/database/database.php");
include ("../autoloader.php");
include ("../model/getAllSkills.php");
include ("../model/getSkillIdFromSkillName.php");
include ("../model/getSkillsByUserId.php");
include ("../views/form/getFormSkillToDelete.php");
include ("../model/addSkills.php");
include ("../model/delSkill.php");
include ("../views/form/changeSkillForm.php"); // For getFormSkill
include ("../views/form/getFormSkillToUpdate.php");
include ("../model/updateWithMark.php");
include ("../model/updateWithOutMark.php");
?>
<body id="body">

<?php require("../views/menu.php");?>
<!--Display input to search-->
	<div id="blue">
		<div class="container">
			<div class="row">
				<h3 class="mt-2">Compétences.</h3>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /blue -->
	<div class="container">
<?php
$userUpdater = new UserUpdater(getDatabase());

if (isset($_POST['submitnumber'])) {
    $number = $_POST['number'];
    $arrayAllSkills = getAllSkills($bdd);
    // Display form to change skills value
    echo "<form action='editSkills.php' method ='post'>";
    for ($i = 1; $i < $number + 1; $i ++) {
        getFormSkill($arrayAllSkills, $i);
    }
    echo "<input type='hidden' name='number' value='$number'></input>";
    echo "<button name ='submitadd'>Envoyer</button>";
    echo "</form>";
} 
else if (isset($_POST['submitadd'])) {
    $number = $_POST['number'];
    for ($i = 1; $i < $number + 1; $i ++) {
        $skillname = $_POST['skill_' . $i];
        $skillmark = $_POST['mark_' . $i];
        if (isset($_POST['isTutor_' . $i])) {
            $skillopen = 1;
        } else {
            $skillopen = 0;
        }
        $user_key = $_SESSION['user_key'];
        $arrayUserInfo = $userUpdater->getUserFromKey($user_key);
        $arraySkillId = getSkillIdFromSkillName($skillname, $bdd);
        $result = addSkills($arrayUserInfo['user_id'], $arraySkillId['skill_id'], $skillmark, $skillopen, $bdd);
        if ($result == 0 )
        {
            header('Location: http://helpsi.freeboxos.fr/src/controller/profile.php?id=' . $user_key);
        } else {
            
            header('Location: http://helpsi.freeboxos.fr/src/controller/profile.php?id=' . $user_key);

        }

    }
} 
else if (isset($_POST['submitudp'])) {
    $skill_name = $_POST['skill_name'];
    if (isset($_POST['isTutor'])) {
        $open = 1;
    } else {
        $open = 0;
    }
    $user_key = $_SESSION['user_key'];
    $arrayUserInfo = $userUpdater->getUserFromKey($user_key);
    $user_id = $arrayUserInfo['user_id'];
    $arraySkillId = getSkillIdFromSkillName($skill_name,$bdd);
    $skill_id = $arraySkillId['skill_id'];
    $mark = $_POST['mark'];
    if ($mark == "0") {
        updateWithOutMark($user_id,$skill_id,$open,$bdd);
    }
    else {
        updateWithMark($user_id,$skill_id,$open,$mark,$bdd);
    }
    header('Location: http://helpsi.freeboxos.fr/src/controller/profile.php?id=' . $user_key);
} 
else if (isset($_POST['submitdel'])) {
    $number = $_POST['number'];
    $user_key = $_SESSION['user_key'];
    $arrayUserInfo = $userUpdater->getUserFromKey($user_key);
    $user_id = $arrayUserInfo['user_id'];
    $array = getSkillsByUserId($user_id, $bdd);
    var_dump($array);
    for ($i=0; $i < $number; $i++) { 
        foreach($array[$i] as $result) {         
            if (isset($_POST['del' . $result])) {
                $skill_id = $result;
                delSkill($skill_id, $user_id,$bdd);
            }
        }
    }
    header('Location: http://helpsi.freeboxos.fr/src/controller/profile.php?id='.$user_key);
} 
else if ($_GET['action'] == "add") {
    require ("../views/pages/addSkill.php");
} 
else if ($_GET['action'] == "del") {
    $user_key = $_SESSION['user_key'];
    $arrayUserInfo = $userUpdater->getUserFromKey($user_key);
    $user_id = $arrayUserInfo['user_id'];
    $arraySkillName = getSkillsByUserId($user_id, $bdd);
    if (! empty($arraySkillName)) {
        $number = sizeof($arraySkillName);
        require ("../views/pages/delSkills.php");
    }
} 
else if ($_GET['action'] == "upd") {
    $user_key = $_SESSION['user_key'];
    $arrayUserInfo = $userUpdater->getUserFromKey($user_key);
    $user_id = $arrayUserInfo['user_id'];
    $arraySkillName = getSkillsByUserId($user_id, $bdd);
    if (! empty($arraySkillName)) {
        require ("../views/pages/updSkills.php");
    }
} else {
    require ("../views/pages/choiceSkill.html");
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