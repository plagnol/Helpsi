<?php
/**
 * Created by PhpStorm.
 * User: antoine Plagnol
 * Date: 22/03/2018
 * Time: 22:28
 */

?>

<form action="../controller/ciblePrintEvent.php" method="post">
    <hr>
    <?php
    $isMarked = false;

    foreach($listEvent as $key => $result){

        $date = explode(' ', $result['startdate']);
        $dateD = $date[0];

        if(isset($result['user_tutor_id'])){
            $user = $userUpdater->getUserFromId($result['user_tutor_id']);
        }
        if(!($result['user_tutor_id'] == $result['user_id'])){
            echo '<div class="form-group">';

            $note = $eventUpdater->getMarkFromEventId($result['event_id']);
            if(empty($note['mark'])){

                echo '<label for="'.$user['user_id'].'"> Noter '. $user['fname'] .' '. $user['lname']. ' sur 5 </label>';
                echo '<p> Cours du ' . $dateD . ' </p>';
                echo '<select class="form-control" name="note" id="note">';
                echo '<option value="1">1 / 5</option>';
                echo '<option value="2">2 / 5</option>';
                echo '<option value="3">3 / 5</option>';
                echo '<option value="4">4 / 5</option>';
                echo '<option value="5">5 / 5</option>';
                echo '</select>';
            }else{
                echo '<label for="'.$user['user_id'].'"> '. $user['fname'] .' '. $user['lname']. ' </label>';
                echo '<p> Vous avez attribué ' . $note['mark'] . ' à ' . $user['fname'] . '</p>';
                echo '<p> Cours du ' . $dateD . ' </p>';
                $isMarked = true;
            }

            echo '<input type="hidden" value="'. $result['event_id'].'" name="event_id">';
            echo '<input type="hidden" value="'. $user['user_id'].'" name="user_id">';
            echo '</div>';
            if (!$isMarked){
                echo '<input type="submit" id="submit" name="submit">';
            }

        }else{
            echo '<div class="form-group">';
            echo '<label for="'.$result['event_id'].'"> Vous avez été tuteur </label>';
            echo '<p> Cours du ' . $dateD . ' </p>';
            echo '</div>';

        }
        echo '<hr>';

    }
    ?>

</form>
