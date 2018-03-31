<?php
/**
 * Created by PhpStorm.
 * User: antoine Plagnol
 * Date: 22/03/2018
 * Time: 19:09
 */
?>
<div class="col-lg-10">
    <div class="spacing"></div>
    <h4>Informations de contact</h4>
    <div class="hline"></div>
    <p><i class="fas fa-at" style="margin-right:10px;"></i><?= $userinfo['mail'];?></p>
    <p><i class="fas fa-phone" style="margin-right:10px;"></i><?= $userinfo['phone']?></p>
    <?= !empty($userinfo['facebook']) ? '<p><i class="fab fa-facebook-messenger" style="margin-right:10px;"></i>  ' . $userinfo['facebook'] . '</p>' : '';?>
    <?= !empty($userinfo['discord']) ? '<p><i class="fab fa-discord" style="margin-right:10px;"></i>  ' . $userinfo['discord'] . '</p>' : '';?>
    <?= !empty($userinfo['linkedin']) ? '<p><i class="fab fa-linkedin-in" style="margin-right:10px;"></i>  ' . $userinfo['linkedin'] . '</p>' : '';?>
    <?= !empty($userinfo['skype']) ? '<p><i class="fab fa-skype" style="margin-right:10px;"></i>  ' . $userinfo['skype'] . '</p>' : '';?>
</div>