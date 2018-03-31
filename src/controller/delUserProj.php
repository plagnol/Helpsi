<?php
/**
 * Created by PhpStorm.
 * User: antoine Plagnol
 * Date: 22/03/2018
 * Time: 14:42
 */

session_start();
require '../autoloader.php';
require '../../cache/database/database.php';
require '../model/getUser_idFromUser_key.php';
?>
<!DOCTYPE html>
<html lang="en">
    <?php require '../views/head.html';?>
    <body>

        <?php require '../views/menu.php'; ?>

        <?php
        $projectUpdater = new ProjectUpdater(getDatabase());
        $userUpdater = new UserUpdater(getDatabase());
        if(isset($_GET)){
            $user = $userUpdater->getUserFromKey($_GET["key"]);
            $idProj = $_GET['id'];
            $idUser = getUser_idFromUser_key($_GET['key'], getDatabase());
            $projectUpdater->delUserOfProject($idProj, $idUser);
            echo "L'utilisateur " . $user['name'] . " a été retiré du projet.";
            echo '<a href="projects.php"> Retourner aux projets </a>';
        }else{
            echo "Erreur d'url";
        }

        ?>
    </body>
</html>

