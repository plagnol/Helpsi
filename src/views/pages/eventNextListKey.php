<?php
/**
 * Created by PhpStorm.
 * User: antoine Plagnol
 * Date: 22/03/2018
 * Time: 22:28
 */

?>

    <hr>
    <?php
    foreach($listEvent as $key => $result){

        $date = explode(' ', $result['startdate']);
        $dateD = $date[0];
        $heurD = $date[1];


        echo '<label for=""> Prochain cours le : ' . $dateD . ' à '. $heurD . '</label>';

         echo '<hr>';

    }

    ?>

