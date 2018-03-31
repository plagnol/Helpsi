<?php
/**
 * Created by PhpStorm.
 * User: antoine Plagnol
 * Date: 22/03/2018
 * Time: 16:32
 */

?>

<form action="../controller/cibleAddDisponibility.php" method="post">
    <h3>Ajouter une disponibilité</h3>
    <div class="form-group">
        <label for="dateD">Date : </label>
        <input type="date" class="form-control" name="dateD" id="dateD" placeholder="Le jour ou vous êtes disponible..." autofocus required>
    </div>
    <div class="form-group">
        <label for="time">Heure du début: </label>
        <input type="time" class="form-control" name="time" id="time" placeholder="Heure du début ..." required>
    </div>
    <div class="form-group">
        <label for="duree">Heure de fin : </label>
        <input type="time" class="form-control" name="duree" id="duree" placeholder="La durée ..." required>
    </div>
    <input class="btn btn-default btn-theme" type="submit" value="Ajouter" class="form-control" name="submit">
</form>
