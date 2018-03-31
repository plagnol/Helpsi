<?php 
//display select for skills
echo "<form id ='form' method ='post'>";
echo '<select id ="selectSkill" name="1">';
foreach ($arrayAllSkills as $result) {
    echo '<option value="'. $result['name'] . '">'. $result['name'] . '</option>';
}
echo '</select>';

//display select for mark
echo '<select name="1">';
for ($i=1; $i < 6; $i++) { 
    echo '<option value="'. $i . '">'. $i . '</option>';
}
?>
</select>

<!--become tutor check box-->

<input id="checkBox" type="checkbox" name ="isTutor">être tuteur</input>
</form>