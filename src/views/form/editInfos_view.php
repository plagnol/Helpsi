<?php
/**
 * Created by PhpStorm.
 * User: antoine Plagnol
 * Date: 22/03/2018
 * Time: 19:09
 */
?>
<br>
<br>
<br>
<br>
<div class="container">
    <div class="spacing"></div>
    <h3>Informations de contact</h3>
    <div class="hline"></div>
<br>
    <form action="../controller/cibleEditInfos.php" method="post">
        <div class="form-group">
            <label for="phone">Téléphone : </label>
            <input class="form-control" name="phone" id="phone" value="<?php if(empty($userinfo['phone'])){echo 'Votre numéro de téléphone..';
            }else{echo $userinfo['phone'];}?>" autofocus>
        </div>
        <hr>
        <div class="form-group">
            <label for="bio">Votre biographie : </label>
            <input class="form-control" name="bio" id="bio" value="<?php if(empty($userinfo['bio'])){ echo 'Votre bio..';
            }else{ echo $userinfo['bio'];}?>">
        </div>
        <div class="form-group">
            <label for="avatar">Votre avatar : : </label>
            <input class="form-control" name="avatar" id="avatar" value="<?php if(empty($userinfo['avatar'])){ echo 'Votre avatar..';
            }else{ echo $userinfo['avatar'];}?>">
        </div>
        <div class="row">
	        <div class="col-md-6">
                <label for="grade">Votre année a l'école : </label>
                <select class="form-control" id="grade" name="grade">
                    <option value="1">B1</option>
                    <option value="2">B2</option>
                    <option value="3">B3</option>
                    <option value="4">I4</option>
                    <option value="5">I5</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="city">Votre campus : </label>
                <select class="form-control" id="city" name="city">
                    <option value="1">Arras</option>
                    <option value="2">Bordeaux</option>
                    <option value="3">Brest</option>
                    <option value="4">Grenoble</option>
                    <option value="5">Lille</option>
                    <option value="6">Lyon</option>
                    <option value="7">Montpellier</option>
                    <option value="8">Nantes</option>
                    <option value="9">Paris</option>
                </select>
            </div>
        </div>
        <hr>
        <div class="form-group">
            <label for="pw">Changer de mot de passe : </label>
            <input type="password" name="pw" class="form-control" id="pw" placeholder="Mot de passe">
        </div>
        <div class="form-group">
            <label for="pw2">Confirmer votre nouveau mot de passe : </label>
            <input type="password" name="pw2" class="form-control" id="pw2" placeholder="Confirmer votre nouveau mot de passe">
        </div>
        <input type="submit" value="Modifier" class="btn btn-theme btn-block" name="submit">
    </form>
</div>