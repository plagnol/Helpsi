<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Supprimer un cours</title>
</head>
<body>
    <form>
        <?php $eventid = $_POST["eventdelete"];
        $dataevent = $eventUpdater->getEventData($eventid); ?>
        <input type="text" name="datestart" value="<?php $dataevent->startdate ?>"disabled>
        <input type="text" name="dateend" value="<?php $dataevent->enddate ?>" disabled>
        <input type="hidden" name="idevent" value="<?php $dataevent->event_id ?>">
        <input type="submit" value="Confirmer">
    </form>
</body>
</html>