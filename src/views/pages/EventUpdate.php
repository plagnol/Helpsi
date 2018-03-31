<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier votre cours</title>
</head>
<body>
<h1 style="font-size: large">
    Modifier votre séance !
</h1>
<form action="listEvent.php" method="POST">
    <?php
    $data = $eventUpdater->getEventData($eventid);
    ?>
    <input type="hidden" name="eventid" value="<?php $data->event_id?>">
    <label for="startdate">Date du cours :</label>
    <input type="date" name="newstartdate">
    <label for ="starthour">Heure du cours :</label>
    <input type="time" name ="newstarthour">
    <label for="endhour">Heure de fin :</label>
    <input type="time" name="newendhour">
    <label for="type">Type de cours :</label>
    <select name="newtypec">
		<?php
		$types = $eventUpdater->getUniqueType();
		foreach ($types as $type)
		{
			echo "<option value='$type->type_id' id='$type->type_id'" . ($name==$type->name ? "selected" : "") . ">$type->name</option>";
		}
		?>
    </select>
    <br>
    <br>
    <input type="submit" value="Valider">
</form>
</body>
</html>