<?php 
function getFormSkillToDelete($name,$mark,$tutor,$id) {
    echo '<input class="form-check-input" id="checkBox" type="checkbox" name ="del'.$id.'">';

    echo " <b>".$name."</b>  ";

    echo $mark . " / 5 - ";

    if ($tutor == 1) {
        echo "<span class='text-muted'>Tuteur</span>";
    }
    else {
        echo "<span class='text-muted'>Pas tuteur</span>";
    }
}
?>
