
<form action="" method="POST">
	<div class="row">
		<div class="col-md-4">
			<label for="startdate">Date du cours :</label> <input
				class="form-control" type="date" name="startdate">
		</div>
		<div class="col-md-4">
			<label for="starthour">Heure du cours :</label> <input
				class="form-control" type="time" name="starthour" step="1800">
		</div>
		<div class="col-md-4">
			<label for="endhour">Heure de fin :</label> <input
				class="form-control" type="time" name="endhour" step="1800">
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-6">
		<label for="type">Type de cours :</label> <select class="form-control" name="typec">
            <?php
            $types = $eventUpdater->getUniqueType();
            foreach ($types as $type) {
                echo "<option value='$type->type_id' id='$type->type_id'" . ($name == $type->name ? "selected" : "") . ">$type->name</option>";
            }
            ?>
        </select>
	</div>
	<div class="col-md-6">
		<!--
        <label name="skillc">Compétence enseignée: </label>
        <select name="skill">
			<?php
/*
 * $skills = $eventUpdater->getUniqueSkill();
 * foreach ($skills as $skill)
 * {
 * echo "<option value='$skill->skill_id' id='$skill->skill_id'" . ($name==$skill->name ? "selected" : "") . ">$skill->name</option>";
 * }
 */
?>
        </select>
        -->
	</div>
	</div>
	<br>
	<input class="btn btn-theme btn-block" type="submit" value="Valider">
</form>
