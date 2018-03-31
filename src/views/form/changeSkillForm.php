<?php 
function getFormSkill($array,$number) {
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    //display select for skills
    echo '<select name="skill_'.$number.'">';
    foreach ($array as $result) {
        echo '<option value="'. $result['name'] . '">'. $result['name'] . '</option>';
    }
    echo '</select>';

    //display select for mark
    echo '<select name="mark_'.$number.'">';
    for ($i=1; $i < 6; $i++) { 
        echo '<option value="'. $i . '">'. $i . '</option>';
    }
    echo '</select>';

    //become tutor check box

    echo '<input id="checkBox" type="checkbox" name ="isTutor_'.$number.'">être tuteur</input>';
}
?>
