<?php
/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 20/03/2018
 * Time: 09:04
 */

class EventUpdater
{
	private $_db;

	public function __construct($db)
	{
		$this->_db = $db;
	}
	public function addEvent($event)
	{
		$error = '';
		$startdate = $event->getStartDate();
		$starthour = $event->getStartHour();
		$endhour = $event->getEndHour();
		$typeid = $event->getTypeID();
		$typeid = intval($typeid);
		$tutorid = $event->getTutorID();
		$tutorid = intval($tutorid);
		if ($this->checkHour($starthour, $endhour))
		{
			$starttime = $startdate." ".$starthour;
			$enddate = $startdate." ".$endhour;
		} else {
			echo '<p style="color:red">La date de fin ne peut être avant celle de début</p>';
			return;
		}
		$date = new DateTime();
		$now =$date->format("Y-m-d H:i:s");
		if ($starttime < $now)
		{
			echo '<p style="color:red">la date choisie ne peut être avant aujourd\'hui héhé</p>';
			return;
		}
		$sth = $this->_db->prepare("SELECT * FROM event WHERE :pDateDebut BETWEEN startdate AND enddate OR :pDateFin BETWEEN startdate AND enddate");
		$sth->bindParam(':pDateDebut', $starttime);
		$sth->bindParam(':pDateFin', $enddate);
		$sth->execute();
		$sth->fetch(PDO::FETCH_OBJ);
		$hourcheck = $sth->rowCount();
		// Si le créneau  n'a pas été choisie
		if ($hourcheck == 0)
		{
			$insertevent = $this->_db->prepare("INSERT INTO `event` (`startdate`, `enddate`, `type_id`,`user_tutor_id`,`roaster`) VALUES (:pDateDebut, :pDateFin, :ptypeID, :ptutorID, 0)");
			$insertevent->bindParam(':pDateDebut', $starttime);
			$insertevent->bindParam(':pDateFin', $enddate);
			$insertevent->bindParam(':ptypeID', $typeid);
			$insertevent->bindParam(':ptutorID', $tutorid);
			$insertevent->execute();
			echo '<p style="color:red">Le cours a bien été défini</p>';

		} else {
			$error = '<p style="color:red">Le créneau souhaité est déjà pris</p>';
		}
		echo $error;
	}


	public function checkHour($startHour, $endHour)
	{
		if ($startHour>$endHour)
		{
			return false;
		} else {
			return true;
		}
	}


	public function deleteEvent($id)
	{
		$sth = $this->_db->prepare ("DELETE FROM event WHERE event_id = :pID");
		$sth->bindParam(':pID', $id);
		$sth->execute();
	}


	public function updateEvent($startdate, $starthour, $endhour, $typeid, $eventid)
	{
		$error = '';
		$sth = $this->_db->prepare("UPDATE event SET startdate = :pDateDebut, enddate = :pDateFin WHERE event_id = :ptypeID");
		$checkdatequery = $this->db->prepare("SELECT * FROM event WHERE :pDateDebut BETWEEN startdate AND enddate OR :pDateFin BETWEEN startdate AND enddate");
		if ($this->checkHour($starthour, $endhour))
		{
			$starttime = $startdate.' '.$starthour;
			$enddate = $startdate.' '.$endhour;

		} else {
			echo '<p style="color:red">La date de fin ne peut être avant celle de début</p>';
			return;
		}
		$date = new DateTime();
		$now = $date->format("Y-m-d H:i:s");
		if ($starttime < $now)
		{
			echo '<p style="color:red">la date choisie ne peut être avant aujourd\'hui héhé</p>';
			return;
		}
		$checkdatequery->bindParam(':pDateDebut', $starttime);
		$checkdatequery->bindParam(':pDateFin', $enddate);
		$checkdatequery->execute();
		$checkdatequery->fetch(PDO::FETCH_OBJ);
		if ($checkdatequery->rowCount() == 0)
		{
			$sth->bindParam(':pDateDebut', $starttime);
			$sth->bindParam(':pDateFin', $enddate);
			$sth->bindParam(':ptypeID', $typeid);
			$sth->bindParam(':peventID', $eventid);
			$sth->execute();
			echo '<p style="color:red>Le créneau a été modifé.</p>';
		} else {
			$error = '<p style="color:red>Le créneau souhaité est déjà pris</p>';
		}
		echo $error;

	}


	public function getUniqueType(PDO $bdd = null)
	{
		if ($bdd == null)
		{
			$bdd = getDataBase();
		}
		if ($bdd)
		{
			$query = "SELECT DISTINCT(name), type_id FROM type ORDER BY name";
			$resultset = $bdd->query($query);
			$liste = $resultset->fetchAll(PDO::FETCH_OBJ);
			$resultset->closeCursor();

			return $liste;
		}

		return null;
	}


	public function checkTutorID($tutorid,$eventid){
		$sth = $this->_db->prepare("SELECT * FROM event WHERE user_tutor_id = :ptutorID AND event_id = :peventID");
		$sth->bindParam(':ptutorID', $tutorid);
		$sth->bindParam(':peventID', $eventid);
		$sth->execute();
		/*$liste = $sth->fetchAll(PDO::FETCH_OBJ);*/
		$checkid = $sth->rowCount();
		if ($checkid == 1)
		{
			return true;
		} else {
			return false;
		}
	}


	public function getEventData($eventid)
	{

		$sth = $this->_db->prepare("SELECT * FROM event WHERE event_id = :peventID");
		$sth->bindparam(':peventID', $eventid);
		$sth->execute();
		$eventdata = $sth->fetchAll(PDO::FETCH_OBJ);
		return $eventdata;
	}

	public function getHoursFromDate($eventdata){
		$datestring = $eventdata->startdate;
		$datestring2 = $eventdata->enddate;
		$arraystart = explode(" ", $datestring,2);
		$date = $arraystart[0];
		$arraydate = explode('-',$date,3);
		$date = $arraydate[2]."/".$arraydate[1]."/".$arraydate[0];
		$starthour = $arraystart[1];
		$arrayend = explode(" ", $datestring2, 2);
		$endhour = $arrayend[1];
		$array = array($date, $starthour, $endhour);
		return $array;
	}

	public function getEventList()
	{
		$sth = $this->_db->prepare("SELECT event_id, startdate, enddate, T.name, U.lname, U.fname, city, name, roaster FROM WeeksEvents W, user U, type T, school S WHERE W.user_tutor_id=U.user_id AND T.type_id = W.type_id AND U.school_id = S.school_id and (W.enddate < (select (now() + interval 14 day)))");
		$sth->execute();
		$listeevent = $sth->fetchAll(PDO::FETCH_OBJ);
		return $listeevent;
	}

	public function getEventListFromInput($UserQuery)
    {
        $names = explode(" ",$UserQuery,2);
        $fname = $names[0];



        #if we have only one element it searches this element in first or last names in our view
        if (sizeof($names)==1){
            $sth = "SELECT event_id, startdate, enddate, T.name, U.lname, U.fname, city, name, roaster FROM WeeksEvents W, user U, type T, school S WHERE W.user_tutor_id=U.user_id AND T.type_id = W.type_id AND U.school_id = S.school_id and (U.fname LIKE '%" . $fname . "%' OR U.lname LIKE '%" . $fname . "%' )ORDER BY fname desc";

        }

        #if we have two elements it searches for each elements if its a lastname or a firstname
        if (sizeof($names)==2){
            $lname = $names[1];
            $sth = "SELECT event_id, startdate, enddate, T.name, U.lname, U.fname, city, name, roaster FROM WeeksEvents W, user U, type T, school S WHERE W.user_tutor_id=U.user_id AND T.type_id = W.type_id AND U.school_id = S.school_id and (U.fname LIKE '%" . $fname . "%' OR U.lname LIKE '%" . $lname . "%' OR fname LIKE '%" . $lname . "%' OR lname LIKE '%" . $fname . "%' )ORDER BY fname desc";
        }

        #This send the request to the database and returns a list
        $TutorList = $this->_db->prepare($sth);
        $TutorList->execute();
        $arrayTutorList = $TutorList->fetchall(PDO::FETCH_OBJ);
        $results = $TutorList->rowCount();

        return $results >= 1 ? $arrayTutorList : '';
    }

	public function addToRoaster($eventid)
	{
		$roasterquery = $this->_db->prepare("SELECT roaster FROM event WHERE event_id = " . $eventid . " ");
		$roasterquery->execute();
		$roasterarray = $roasterquery->fetchall();
		$roaster = $roasterarray[0][0];
		$roaster+=1;
		$addtoroasterquery = $this->_db->prepare("UPDATE event SET roaster = " . $roaster ." WHERE event_id = " . $eventid . " ");
		$addtoroasterquery->execute();

	}

	public function validateRegister($registered_id)
	{
		$query = "INSERT INTO l_event_skill_user(`event_id`,`skill_id`,`user_id`,`mark`) VALUES (:peventID)";

	}

}