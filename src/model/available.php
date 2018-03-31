<?php
/**
 * Created by PhpStorm.
 * User: antoine Plagnol
 * Date: 22/03/2018
 * Time: 16:51
 */
 function setAvailable($post, $db){
    $startDate = $post['dateD'] . ' ' . $post['time'];
    $duree = $post['dateD'] . ' ' . $post['duree'];
    $user_id = getUser_idFromUser_key($_SESSION['user_key'], getDatabase());

    $request = $db->prepare("INSERT INTO `available`( `startdate`, `duration`, `user_id`) VALUES ('$startDate','$duree','$user_id')");
    $request->execute();
 }