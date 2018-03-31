<?php
/**
 * Created by PhpStorm.
 * User: antoine Plagnol
 * Date: 21/03/2018
 * Time: 11:16
 */


echo '<div class="list-group list-group-flush mb-4">';
foreach ($arrayTutorBySkills as $result) {
    $nameSkill = $result['skillname'];
    $userId = $result['user_id'];
    $lname = $result['lname'];
    $fname = $result['fname'];
    $mark = $result['mark'];
    $user_key = $result['user_key'];
    $city = $result['city'];
    $grade = $result['gradename'];
    echo '<div>';
    echo '<a href="profile.php?id=' . $user_key . '" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">';
    echo '<p class="mb-0">';
    echo '<b>' . $fname . ' ' . $lname . '</b><span> ( Note : ' . $mark . ' / 5 )</span> - ';
    echo '<span class="text-secondary">' . $city . '</span>';
    echo '<span class="text-secondary"> : ' . $grade . '</span>';
    echo '</p></a>';

    echo '</div>';
}
echo '</div>';