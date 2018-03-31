<!DOCTYPE html>
<?php include("../views/head.html");?>
<html>
<?php
/**
 * Created by PhpStorm.
 * User: antoine Plagnol
 * Date: 22/03/2018
 * Time: 09:03
 */


include_once("../autoloader.php");
include_once("../../cache/database/database.php");
?>
<body>
<?php

require("../views/menu.php");
?>
<!--Display input to search-->
<div id="blue">
    <div class="container">
        <div class="row">
            <h3 class="mt-2">Créer un projet.</h3>
        </div><!-- /row -->
    </div> <!-- /container -->
</div><!-- /blue -->
<?php

echo '';
//Create ProjectUpdater
$projetUpdater = new ProjectUpdater(getDatabase());

?>
<body>

<div class="container py-5">
    <?php
    require("../views/form/addProjectForm.html");
    if($_SERVER['HTTP_REFERER'] == "http://helpsi.freeboxos.fr/src/controller/createProject.php" && empty($_SESSION))
    {
        echo'<p style="color:red">Une connection est nécessaire pour l\'ajout d\'un projet</p>';
    }
    ?>
</div>
</body>
