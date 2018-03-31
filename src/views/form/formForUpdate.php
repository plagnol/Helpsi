<?php
/**
 * Created by PhpStorm.
 * User: antoine Plagnol
 * Date: 22/03/2018
 * Time: 16:32
 */

?>

<form action="../controller/editDisponibility.php" method="post">
    <h3>Ajouter une disponibilité</h3>
    <div class="form-group">
        <label for="dateD">Date : </label>
        <input type="date" value="<?= $array[0]?>" class="form-control" name="dateD" id="dateD" placeholder="Le jour ou vous êtes disponible..." autofocus required>
    </div>
    <div class="form-group">
        <label for="time">Heure du début: </label>
        <input type="time" value="<?= $array[1]?>" class="form-control" name="time" id="time" placeholder="Heure du début ..." required>
    </div>
    <div class="form-group">
        <label for="duree">Heure de fin : </label>
        <input type="time" value="<?= $array[2]?>" class="form-control" name="duree" id="duree" placeholder="La durée ..." required>
    </div>
    <input value="<?= $array[3]?>" type="hidden" name="available_id">
    <input class="btn btn-default btn-theme" type="submit" value="Modifier" class="form-control" name="submitUpdate">
</form>
