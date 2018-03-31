<?php
echo '<div class="list-group list-group-flush mb-4">';
foreach ($arrayTutorList as $result) {
    $id = $result['user_key'];
    if (!isset($result['mark'])){
        $result['mark']='Pas encore de cours dispensés';
    }
    echo '<a href="profile.php?id=' . $id . '" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">';
    echo '<p class="mb-0" style="display:inline-block">';
    echo '<img src="' . $result['avatar'] . '" width="30px" style="margin-right:10px;height:30px;border-radius:15px;">';
    echo '<b>' . $result['fname'] . ' ' . $result['lname'] . '</b><span class="text-secondary"> (' . $result['grade_name'] . ')</span> - ';
    echo '<span class="text-secondary">' . $result['city'] . '</span>';
    echo '</p>';
    echo '<span style="background:#00b3fe;margin-top:17px;" class="badge badge-primary badge-pill">Tuteur</span>';
    echo '</a>';
}
echo '</div>';