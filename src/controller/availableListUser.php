<!DOCTYPE html>
<html>
<?php
session_start();
// include file
require ("../views/head.html");
include_once("../../cache/database/database.php");
include("../autoloader.php");
include("../model/class/availableUpdater.class.php");
?>
<body>
<?php require("../views/menu.php");
$db = getDatabase();
?>
<!--Display input to search-->
<div id="blue">
    <div class="container">
        <div class="row">
            <h3 class="mt-2">Disponibilitées.</h3>
        </div><!-- /row -->
    </div> <!-- /container -->
</div><!-- /blue -->
<div class="container">
    <form action="availableListUser.php" role="form" class="form-inline mb-4"
          method="POST">
        <div class="input-group" style="width:auto;display:flex;">
            <input name="name" type="text" class="form-control"
                   placeholder="Entrer le nom d'un utilisateur ..." style="float:left;" autofocus>
            <button name="submitsearch" type="submit"
                    class="btn btn-secondary input-group-button"
                    style="border-radius: 0 0.25rem 0.25rem 0;"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <hr>

    <?php
    echo ' ';
    // If we search
    $dispoUpdater = new availableUpdater($db);
    if (isset($_POST['submitsearch'])) {
        $UserQuery = $_POST['name'];
        // get projects with query
        $array = $dispoUpdater->getAvailableListFromInput($UserQuery);
        if (! empty($array)) {
            // Display list of projects by name
            require ("../views/pages/availableListFromInput.php");
        }
    } //we click on a USER to see his profile
    else if (! empty($_GET['id'])) {
        $id = $_GET['id'];
        // Display list of tutor by skill
        $path_to_file = "../views/pages/profile?id".$id;
        require ($path_to_file);
    }
    else {
        $arrayNextTenAvailable = $dispoUpdater->getNextTenAvailable();
        if (!empty($arrayNextTenAvailable)) {
            //Display home page project
            require ("../views/pages/availableHomePage.php");
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
<br><br>
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