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
function getListAvailableById($key, $db){
    $request = $db->prepare("SELECT * FROM `nextAvailable` WHERE user_key = '". $key ."'");
    $request->execute();

    $array = $request->fetch();
    $available_id = $array[0];
    $completedatestart = $array[1];
    $completedateend = $array[2];
    $exploded = explode(" ",$completedatestart,2);
    $exploded2 = explode(" ",$completedateend,2);
    $date = $exploded[0];
    $starthour = $exploded[1];
    $endhour = $exploded2[1];
    $arraydate[0] = $date;
    $arraydate[1] = $starthour;
    $arraydate[2] = $endhour;
    $arraydate[3] = $available_id;

    return $arraydate;
}