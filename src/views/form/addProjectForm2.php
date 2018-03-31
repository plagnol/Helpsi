<form action="../controller/cibleAddProjectForm2.php" method="post">
    <?php
        include_once("../../cache/database/database.php");
        $arraySkills = getAllSkillsInfo(getDatabase());
        foreach($arraySkills as $key=> $v1){
            echo '<input type="checkbox" name="'.$key.'" value="'.$v1["skill_id"].'" /> '. $v1['name'].'<br>';
        }
    ?>
    <input type="submit" value="Ajouter les compétences au projet" class="form-control" name="submit">
</form>