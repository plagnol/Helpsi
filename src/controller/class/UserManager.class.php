<?php

include($_SERVER['DOCUMENT_ROOT']."/cache/database/database.php");
include($_SERVER['DOCUMENT_ROOT']."/src/User.class.php");
include($_SERVER['DOCUMENT_ROOT']."/src/model/class/UserUpdater.class.php");

class UserManager
{
    private $db;
    private $user;

    /**
     * UserUpdater constructor.
     * @param $db : database
     *
     */
    public function __construct($db){
        $this->setDb($db);
    }

    /**
     * @return mixed
     *
     */
    public function getDb(){
        return $this->db;
    }


    /**
     * @param string $key
     */
    public function setUserFromKey($key){
        $this->user = getUserFromKey($key);
    }

    /**
     *
     * Set the database for this class
     */
    public function setDb(){
        $this->db = getDatabase();
    }

}