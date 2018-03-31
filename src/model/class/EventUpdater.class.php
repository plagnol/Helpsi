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
			echo '<p style="color:red">La date choisie ne peut être avant l\'actuelle</p>';
			return;
		}
		$date = new DateTime();
		$now = $date->format("Y-m-d H:i:s");
		if ($starttime < $now)
		{
			echo '<p style="color:red">La date choisie ne peut être avant l\'actuelle</p>';
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
			echo '<p style="color:green">Le cours a bien été défini</p>';

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

	public function getUniqueSkill(PDO $bdd = null)
	{
		if ($bdd == null)
		{
			$bdd = getDataBase();
		}
		if ($bdd)
		{
			$query = "SELECT DISTINCT(name), skill_id FROM skill ORDER BY name";
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

    /**
     * @return mixed
     */
	public function getEventList()
	{
		$sth = $this->_db->prepare("SELECT event_id, startdate, enddate, T.name, U.lname, U.fname, city, name, roaster FROM WeeksEvents W, user U, type T, school S WHERE W.user_tutor_id=U.user_id AND T.type_id = W.type_id AND U.school_id = S.school_id and (W.enddate < (select (now() + interval 14 day))) order by startdate asc");
		$sth->execute();
		$listeevent = $sth->fetchAll(PDO::FETCH_OBJ);
		return $listeevent;
	}

    /**
     * @param $UserQuery
     * @return string
     */
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
        $arrayTutorList = $TutorList->fetchAll(PDO::FETCH_OBJ);
        $results = $TutorList->rowCount();

        return $results >= 1 ? $arrayTutorList : '';
    }

    /**
     * @param $eventid
     */
	public function addToRoaster($eventid)
	{
		$roasterquery = $this->_db->prepare("SELECT roaster FROM event WHERE event_id = :peventID ");
		$roasterquery->bindParam(':peventID', $eventid);
		$roasterquery->execute();
		$roasterarray = $roasterquery->fetchAll();

		$roaster = $roasterarray[0][0];

		$roaster+=1;
		$addtoroasterquery = $this->_db->prepare("UPDATE event SET roaster = " . $roaster ." WHERE event_id = " . $eventid . " ");
		$addtoroasterquery->execute();

	}

    /**
     * @param $registered_id
     * @param $event_id
     */
	public function validateRegister($registered_id, $event_id)
	{
		$query = "INSERT INTO l_event_skill_user(`event_id`,`skill_id`,`user_id`,`mark`) VALUES (:peventID, 5, :puserID, NULL )";
		$sth = $this->_db->prepare($query);
		$sth->bindParam(':peventID',$event_id);
		$sth->bindParam(':puserID',$registered_id);
		$sth->execute();
	}

    /**
     * @param $registered_id
     * @param $event_id
     * @return bool
     */
	public function confirmRegistration($registered_id, $event_id)
	{

		$query="SELECT user_id, event_id FROM l_event_skill_user WHERE user_id = :puserID AND event_id = :peventID";

		$sth = $this->_db->prepare($query);
		$sth->bindParam(':puserID',$registered_id);
		$sth->bindParam(':peventID',$event_id);
		$sth->execute();
		$nbOfLine = $sth->rowCount();
		if ($nbOfLine== 1)
		{
			echo'<p style="color:red">Vous vous êtes déjà inscrit pour ce cours</p>';
			return false;
		}

		return true;

	}

    /**
     * @param $id
     * @return null
     */
    public function getEventFromId($id){
        $request = $this->db->prepare("SELECT * FROM user WHERE user_id = ?");
        $request->execute(array(
            $id
        ));

        $userexist = $request->rowCount();

        if ($userexist == 1) {
            $userinfo = $request->fetch(PDO::FETCH_ASSOC);
        } else {
            $userinfo = null;
            echo( 'Mauvaise Id');
        }
        return $userinfo;

    }

    /**
     * @param $id
     * @return mixed
     */
    public function getEventListFromKey($id){
        $query= $this->_db->prepare("SELECT * FROM eventPastList WHERE user_id = '$id'");
        $query->execute();

        $eventInfo = $query->fetchall(PDO::FETCH_ASSOC);
        return $eventInfo;

    }

    /**
     * @param $id
     * @return mixed
     */
    public function getNextEventListFromKey($id){
        $query= $this->_db->prepare("SELECT * FROM eventNextList WHERE user_id = '$id'");
        $query->execute();

        $eventInfo = $query->fetchall(PDO::FETCH_ASSOC);
        return $eventInfo;

    }

    /**
     * @param $eventId
     * @param $user
     * @param $note
     */
    public function addMark($eventId, $user, $note){
        $request = $this->_db->prepare("UPDATE `l_event_skill_user` 
    SET `mark`='$note' WHERE `event_id` = '$eventId' AND `user_id`='$user'");

        $request->execute();
    }

    /**
     * @param $eventId
     * @return mixed
     */
    public function getMarkFromEventId($eventId){
        $request = $this->_db->prepare("SELECT * FROM `l_event_skill_user` WHERE `event_id` = '$eventId'");
        $request->execute();

        $mark = $request->fetch(PDO::FETCH_ASSOC);

        return $mark;
    }
}