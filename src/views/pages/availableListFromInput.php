<?php
/**
 * Created by PhpStorm.
 * User: antoine Plagnol
 * Date: 21/03/2018
 * Time: 10:08
 */

echo '<div class="list-group list-group-flush">';
foreach ($array as $result) {
    $date = explode(' ',$result['startdate']);
    $dateD = $date[0];
    $heurD = $date[1];
    $date = explode(' ',$result['duration']);
    $heurF = $date[1];
    $userkey = $result['user_key'];
    echo '<div style="flex-flow:row wrap;">';
    echo '<a href="profile.php?id=' . $userkey . '" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" style="width:90%;float:left;display:flex;flex:1 0 0%;">';
    echo '<p class="mb-0">';
    echo '<span style="font-weight:bolder;">' . $result['lname'] . ' ' . $result['fname'] . '</span>';
    echo '<p class="mb-0"> Disponible le : ' . $dateD . ' de ' . $heurD . ' à '. $heurF . ' .';
    echo '</p></a>';
    echo '</div>';

}
echo '</div>';