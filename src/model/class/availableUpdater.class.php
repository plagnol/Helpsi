<?php
/**
 * Created by PhpStorm.
 * User: antoi
 * Date: 22/03/2018
 * Time: 21:12
 */

class availableUpdater
{
    private $db;

    /**
     * UserUpdater constructor.
     * @param $db : database
     *
     */
    public function __construct(PDO $db){
        $this->setDb($db);
    }

    /**
     * @param mixed $db
     */
    public function setDb($db)
    {
        $this->db = $db;
    }

    /**
     * @return mixed
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param $UserQuery
     * @return string
     */
    function getAvailableListFromInput($UserQuery){

        $names = explode(" ",$UserQuery,2);
        $fname = $names[0];

        if (sizeof($names)==1) {
            $sth = "SELECT * FROM nextAvailable GROUP BY user_id HAVING fname LIKE '%" . $fname . "%' OR lname LIKE '%" . $fname . "%' OR fname LIKE '%" . $fname . "%' ";
        }

        if (sizeof($names)==2){
            $lname = $names[1];
            $sth = "SELECT * FROM nextAvailable GROUP BY user_id HAVING fname LIKE '%" . $fname . "%' OR lname LIKE '%" . $lname . "%' OR fname LIKE '%" . $lname . "%' OR lname LIKE '%" . $fname . "%' ";
        }
        #This send the request to the database and returns a list
        $ProjectsList = $this->db->prepare($sth);
        $ProjectsList->execute();
        $arrayAvailable = $ProjectsList->fetchall(PDO::FETCH_ASSOC);
        $results = $ProjectsList->rowCount();

        #this prints the results of the request in html and give the number of results
        if ($results >= 1) {
            echo '<h4>Incroyable ! ' . $results . ' résultats pour "' . $UserQuery . '".</h4>';
        } elseif ($results == 0) {
            echo '<h4>Dommage... 0 résultats pour "' . $UserQuery . '".</h4>';
        }

        return $results >= 1 ? $arrayAvailable : '';
    }

    /**
     * @return mixed
     * return last ten project in the bd
     */
    function getNextTenAvailable(){

        $sth = "SELECT * FROM nextAvailable ORDER BY startdate ASC LIMIT 10";

        #This send the request to the database and returns a list
        $userList = $this->db->prepare($sth);
        $userList->execute();
        $arrayUser = $userList->fetchall(PDO::FETCH_ASSOC);

        return $arrayUser;
    }


}