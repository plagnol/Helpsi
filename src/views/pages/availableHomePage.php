<?php
echo '<div class="list-group list-group-flush mt-4">';
foreach ($arrayNextTenAvailable as $result) {
    $date = explode(' ', $result['startdate']);
    $dateD = $date[0];
    $heurD = $date[1];
    $date = explode(' ', $result['duration']);
    $heurF = $date[1];
    $user_key = $result['user_key'];
    echo '<a href="profile.php?id=' . $user_key . '" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">';
    echo '<p class="mb-0">';
    echo '<p>' . $result['fname'] . ' ' . $result['lname'] . '</p>';
    echo '<p class="text-muted"> Commence le ' . $dateD  . ' de ' . $heurD . ' à ' . $heurF . ' </p>';
    echo '</p>';
    echo '</a>';
}
echo '</div>';