<?php
/**
 * Created by PhpStorm.
 * User: antoine Plagnol
 * Date: 22/03/2018
 * Time: 16:49
 */

session_start();
require("../../cache/database/database.php");
include("../autoloader.php");
include("../model/available.php");
include("../model/getUser_idFromUser_key.php");

if(isset($_POST['submit'])){
    $db = getDatabase();
    setAvailable($_POST, $db);
    header("location:profile.php?id=".$_SESSION['user_key']);
}else{

}