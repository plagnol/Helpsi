<?php
/**
 * Created by PhpStorm.
 * User: antoine Plagnol
 * Date: 22/03/2018
 * Time: 15:32
 */
?>
<form action="../controller/cibleAddUserProjectForm.php" method="post">
    <p>Ajouter des personnes a votre projet</p>
    <div class="form-group">
        <label for="us1">Email 1 : </label>
        <input class="form-control" name="us1" id="us1" placeholder="Ajouter un utilisateur au projet avec son adresse mail..." autofocus>
    </div>
    <div class="form-group">
        <label for="us2">Email 2 : </label>
        <input class="form-control" name="us2" id="us2" placeholder="Ajouter un autre utilisateur au projet ...">
    </div>
    <div class="form-group">
        <label for="us3">Email 3 : </label>
        <input class="form-control" name="us3" id="us3" placeholder="Ajouter un autre utilisateur au projet ...">
    </div>
    <input type="hidden" value="<?php echo $_GET['id']; ?>" class="form-control" name="id">
    <input type="submit" value="Ajouter les utilisateurs au projet" class="form-control" name="submit">
</form>
