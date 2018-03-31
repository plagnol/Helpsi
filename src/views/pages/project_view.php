<?php
/**
 * Created by PhpStorm.
 * User: antoine Plagnol
 * Date: 22/03/2018
 * Time: 12:06
 */
?>
<!-- *****************************************************************************************************************
 BLUE WRAP
 ***************************************************************************************************************** -->
<div id="blue">
    <div class="container">
        <div class="row">
            <h3 class="mt-2"><img src="<?= $projetInfo['img'];?>" style="width:50px;height:50px;border-radius:25px;margin-right:10px;" class="mr-2"><span><?= $projetInfo['name'];?>.</span></h3>
        </div><!-- /row -->
    </div> <!-- /container -->
</div><!-- /blue -->
<div class="container mt">
    <div class="col-lg-6">
        <h4>Description</h4>
        <div class="hline"></div>
        <p>
            <?php
            echo $projetInfo['description'];
            ?>
        </p>
    </div>
    <div class="col-lg-6">
        <h4>Liens</h4>
        <div class="hline"></div>
        <ul class="list-group">
            <li class="list-group-item"><a href="<?php echo $projetInfo['github']; ?>" > Github </a></li>
            <li class="list-group-item"><a href="<?php echo $projetInfo['slack']; ?>" > Slack </a></li>
        </ul>
    </div>

</div>

<div class="container mt">
    <div class="row">
        <div class="col-lg-6">
            <h4>Membres du projet</h4>
            <div class="hline"></div>
            <ul class="list-group">
                <?php
                $array = $projectUpdater->getUsersOfProject($_GET['id']);
                foreach($array as $result){
                    echo '<a href="profile.php?id=' . $result['user_key'] . '"><li class="list-group-item">' . $result['fname'] . ' ' . $result['lname'] . ' </li></a> ';
                    if($isTheTutor){
                        echo '<a href="delUserProj.php?key='. $result['user_key'] .'&id=' . $_GET['id'] .  '"><i class="fas fa-minus"></i> Retirer du projet</a>';
                    }
                }
                ?>
            </ul>
            <?php
            if($isTheTutor){
                echo '<a href="addUserProject.php?id='. $_GET['id'] . '"> Ajouter un utilisateur </a><br>';
            }
            if($isInProject && !$projetInfo['askingHelp']){
                echo '<a href="askHelp.php?id='. $_GET['id'] . '"> Demander de l\'aide </a>';
            }else if($isInProject && $projetInfo['askingHelp']){
                echo '<a href="stopHelp.php?id='. $_GET['id'] . '"> Arreter la demande d\'aide </a>';
            }
            ?>
        </div>

        <div class="col-lg-6">
            <h4>Compétences du projet</h4>
            <div class="hline"></div>
            <?php
            $array = $projectUpdater->getSkillsOfProject($_GET['id']);
            foreach($array as $result){
                echo '<a href="skills.php?id=' . $result['skill_id'] . '"><li class="list-group-item">' . $result['Skillname'] .' </li></a>';
            }
            ?>

        </div>
    </div><!--/row -->
</div><!--/container -->
