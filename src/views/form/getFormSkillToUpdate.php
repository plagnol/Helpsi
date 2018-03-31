<?php 
function getFormSkillToUpdate($name) {

    echo '<b>Compétence : ' . $name . '</b>';

    //display select for mark
    echo '<div class="row"><div class="col-3"><select class="form-control" name="mark">';
    echo "<option value='0'>Gardez l'ancienne valeur</option>";
    for ($i=1; $i < 6; $i++) { 
        echo '<option value="'. $i . '">'. $i . '</option>';
    }
    echo '</select></div></div>';

    //become tutor check box
    echo '<input type="hidden" name="skill_name" value="'.$name.'">';
    echo '<input id="checkBox" type="checkbox" name ="isTutor"> devenir tuteur</input><br><br>';

}
?>
