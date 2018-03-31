<?php
echo "<form action='editSkills.php' method ='post'>";
foreach ($arraySkillName as $result) {
    echo '<div class="form-check">';
    getFormSkillToDelete($result['name'], $result['mark'], $result['open'], $result['skill_id']);
    echo '</div><br>';
}
echo "<input type='hidden' name='number' value='$number'></input>";
echo "<button type='submit' class='btn btn-theme' name ='submitdel'>Supprimer</button>";
echo "</form>";
?>