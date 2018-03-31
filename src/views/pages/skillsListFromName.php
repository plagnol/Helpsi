<?php
/**
 * Created by PhpStorm.
 * User: antoine Plagnol
 * Date: 21/03/2018
 * Time: 10:08
 */

echo '<div class="list-group list-group-flush">';
foreach ($arraySkillsList as $result) {
    $idSkill = $result['skill_id'];
    $idCategory = $result['category_id'];
    echo '<div>';
    echo '  <a href="skills.php?id=' . $idSkill . '" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">';
    echo '      <p class="mb-0">';
    echo '          <span style="font-weight:bolder;">' . $result['skillname'] . '</span><span> (' . $result['category'] . ')</span>';
    echo '      </p>';
    echo '  </a>';
    echo '</div>';

}
echo '</div>';