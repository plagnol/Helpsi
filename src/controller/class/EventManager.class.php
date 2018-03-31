<?php
/**
 * Created by PhpStorm.
 * User: Pierre
 * Date: 19/03/2018
 * Time: 16:51
 */
include_once('../Event.class.php');
class EventManager
{
	//Création du cours


	public function getEventForm($datestart, $hourstart, $hourend, $type,$tutor)
	{
		$event = new event();

		// Attribution des données
		$event->setStartDate($datestart);
		$event->setStartHour($hourstart);
		$event->setEndHour($hourend);
		$event->setTypeID($type);
		$event->setTutorID($tutor);

		// Renvoi de l'objet
		return $event;

	}
}