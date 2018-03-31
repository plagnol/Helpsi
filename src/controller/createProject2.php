<!DOCTYPE html>
<?php
session_start();
include("../views/head.html");
?>
<html>
<?php
/**
 * Created by PhpStorm.
 * User: antoine Plagnol
 * Date: 22/03/2018
 * Time: 09:03
 */


include("../autoloader.php");
require("../../cache/database/database.php");
include("../model/getAllSkills.php");
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
    require("../views/form/addProjectForm2.php");
    ?>
</div>
</body>
