<?php
/**
 * Created by PhpStorm.
 * User: antoine Plagnol
 * Date: 22/03/2018
 * Time: 18:20
 */

include('../autoloader.php');
include('../../cache/database/database.php');

if(isset($_GET['id'])){
    $projetUpdater = new ProjectUpdater(getDatabase());
    $projetUpdater->stopHelp($_GET['id']);
    header("location:projectProfile.php?id=" . $_GET['id']);
}else{
    echo 'Mauvaise Id';
}