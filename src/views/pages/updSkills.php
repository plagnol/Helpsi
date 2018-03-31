<?php
if (isset($_POST['submitchoose'])) {
    $skill_name = $_POST['skill_1'];
    echo "<form action='editSkills.php' method ='post'>";
    getFormSkillToUpdate($skill_name);
    echo "<button class='btn btn-theme' name ='submitudp'>Envoyer</button>";
    echo "</form>";
}
else {
    echo '<form action="editSkills.php?action=upd" method="post">';
    echo '<p>Veuillez choisir une compétence à modifier</p>';
    echo '<select class="form-control" name="skill_1">';
    foreach ($arraySkillName as $result) {
        echo '<option value="'. $result['name'] . '">'. $result['name'] . '</option>';
    }
    echo '</select>';
    echo "<button class='btn btn-theme' name ='submitchoose'>Choisir</button>";
    echo '</form>';
}

?>