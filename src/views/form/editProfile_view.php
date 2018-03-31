<div class="container">
    <div class="spacing"></div>
    <h4>Informations de contact</h4>
    <div class="hline"></div>
	<br>
    <form action="../controller/cibleEditProfil.php" method="post">
        <div class="form-group">
            <label for="website">Site internet : </label>
            <input class="form-control" name="website" id="website" placeholder="<?php if(empty($userinfo['website'])){echo 'Votre site internet..';
                }else{echo $userinfo['website'];}?>" autofocus>
        </div>
        <div class="form-group">
            <label for="discord">Pseudo discord : : </label>
            <input class="form-control" name="discord" id="discord" placeholder="<?php if(empty($userinfo['discord'])){ echo 'Votre pseudo discord..';
            }else{ echo $userinfo['discord'];}?>">
        </div>
        <div class="form-group">
            <label for="facebook">Profil facebook : </label>
            <input class="form-control" name="facebook" id="facebook" placeholder="<?php if(empty($userinfo['facebook'])){ echo 'Votre lien facebook..';
            }else{ echo $userinfo['facebook'];}?>">
        </div>
        <div class="form-group">
            <label for="linkedin">Profil linkedin : </label>
            <input class="form-control" name="linkedin" id="linkedin" placeholder="<?php if(empty($userinfo['linkedin'])){ echo 'Votre profil linkedin..';
            }else{ echo $userinfo['linkedin'];}?>">
        </div>
        <div class="form-group">
            <label for="skype">Compte skype : </label>
            <input  name="skype" class="form-control" id="skype" placeholder="<?php if(empty($userinfo['skype'])){ echo 'Votre profil linkedin..';
            }else{ echo $userinfo['skype'];}?>">
        </div>
        <div class="form-group">
            <label for="git">Votre git : </label>
            <input name="git" class="form-control" id="git" placeholder="<?php if(empty($userinfo['git'])){ echo 'Votre profil linkedin..';
            }else{ echo $userinfo['git'];}?>">
        </div>
        <input type="hidden" value="<?= $userinfo['user_key'] ?>" class="btn btn-theme btn-block" name="submit">
        <input type="submit" value="Modifier" class="btn btn-theme btn-block" name="submit">
    </form>
</div>
<br><br>