<?php
/**
 * Created by PhpStorm.
 * User: antoine Plagnol
 * Date: 22/03/2018
 * Time: 17:40
 */

/**
 * @param $key
 * @param $db
 * @return mixed
 */
function getListAvailableByKey($key, $db){
    $request = $db->prepare("SELECT * FROM `nextAvailable` WHERE user_key = '". $key ."'");
    $request->execute();

    $array = $request->fetchall();
    return $array;
}