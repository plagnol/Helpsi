<?php
echo '<div class="list-group list-group-flush mt-4">';
foreach ($arrayLastTenProjects as $result) {
    $id = $result['project_id'];
    $number = $projetUpdater->getNumberOfUserForAProject($id);
    echo '<a href="projectProfile.php?id=' . $id . '" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">';
    echo '<p class="mb-0">';
    echo '<img src="' . $result['img'] . '" width="30px" style="height:30px;border-radius:15px;margin-right:10px;">';
    if ($result['askingHelp']==1) {
        echo '<b>  ' . $result['name'] . ' <i class="fas fa-flag"></i></b>';
    }
    else {
        echo '<b>  ' . $result['name'] . ' <i class="far fa-flag"></i></b>';
    }
    echo '<p>' . $result['description'] . '</p>';
    echo '<p class="text-muted">' . $number . ' participants</p>';
    echo '</p>';
    echo '</a>';
}
echo '</div>';