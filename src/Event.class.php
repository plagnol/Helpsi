<?php
/**
 * Created by PhpStorm.
 * User: TEAMJBZZ
 * Date: 19/03/2018
 * Time: 15:53
 */

class Event{

	private $_startDate;
	private $_startHour;
	private $_endHour;
	private $_tutorID;
	private $_typeID;
	private $_skillID;

	//Getter

	public function getStartDate()
	{
		return $this->_startDate;
	}

	public function getStartHour()
	{
		return $this->_startHour;
	}

	public function getEndHour()
	{
		return $this->_endHour;
	}

	public function getTutorID()
	{
		return $this->_tutorID;
	}

	public function getTypeID()
	{
		return $this->_typeID;
	}

	public function getSkillID()
	{
		return $this->_skillID;
	}
	//Setter

	/**
	 * @param $startDate
	 * @note Définit la date du cours et vérifie sa validité.
	 */
	public function setStartDate($startDate)
	{
		$format ="Y-m-d";
		$date = null;
		try {
			$date = new DateTime($startDate);
			$startDate = $date->format($format);
			$this->_startDate = $startDate;
		} catch(Exception $e) {
			trigger_error("Le format de la date est invalide", E_USER_WARNING); /*Re-erreur*/
			return;
		}
	}

	/**
	 * @param $startHour
	 * @note Définit l'heure de début et vérifie sa validité
	 */
	public function setStartHour($startHour)
	{
		$format ="H:i:s";
		$hour = null;
		try{
			$date = new DateTime($startHour);
			$hour = $date->format($format);
			$this->_startHour = $hour;
		}catch(Exception $e){
			trigger_error("Le format de l'heure est invalide", E_USER_WARNING); /*Re-erreur*/
			return;
		}
	}

	public function setEndHour($endHour)
	{
		$format ="H:i:s";
		$hour = null;
		try{
			$date = new DateTime($endHour);
			$hour = $date->format($format);
			$this->_endHour = $hour;
		}catch(Exception $e){
			trigger_error("Le format de l'heure est invalide", E_USER_WARNING); /*Re-erreur*/
			return;
		}
	}

	public function setTypeID($id)
	{
		$this->_typeID = $id;
	}

	public function setTutorID($id)
	{
		$this->_tutorID = $id;
	}

	public function setSkillID($id)
	{
		$this->_skillID = $id;
	}
}