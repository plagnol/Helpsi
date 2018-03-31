<?php
/**
 * Created by PhpStorm.
 * User: antoi
 * Date: 21/03/2018
 * Time: 13:55
 */

include($_SERVER['DOCUMENT_ROOT']."/src/Project.class.php");

class ProjectUpdater
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
     * set the database
     * @param PDO $bdd database
     */

    public function setDb(PDO $bdd){
        $this->db = $bdd;
    }


    public function getProjectFromId($id){

        $requserco = $this->db->prepare("SELECT * FROM project WHERE project_id = ?");
        $requserco->execute(array(
            $id
        ));

        $projEx = $requserco->rowCount();
        // If everything is ok
        if ($projEx == 1) {
            $proj = $requserco->fetch(PDO::FETCH_ASSOC);

        } else {
            $error = 'Id de projet incorrect';
        }


        return $proj;
    }
    /**
     * @return mixed
     * return last ten project in the bd
     */
    function getLastTenProjects(){

        $sth = "SELECT * FROM projetOk ORDER BY project_id DESC LIMIT 10";

        #This send the request to the database and returns a list
        $ProjectList = $this->db->prepare($sth);
        $ProjectList->execute();
        $arrayProjectList = $ProjectList->fetchall(PDO::FETCH_ASSOC);

        return $arrayProjectList;
    }

    /**
     * @param $name
     * @param $descri
     * @param $git
     * @param $slack
     * @param $img
     * @return Project
     */
    function hydrate1($name, $descri, $git, $slack, $img){

        $project = new Project();

        $project->setName(htmlspecialchars($name));
        $project->setAskingHelp(false);
        $project->setDescription($descri);
        $project->setGithub($git);
        $project->setSlack($slack);
        $project->setImg($img);

        return $project;
    }
    /**
     * @param $UserQuery
     * @return string
     */
    function getProjectsListFromInput($UserQuery){

        $names = explode(" ",$UserQuery,2);
        $fname = $names[0];

        if (sizeof($names)==1) {
            $sth = "SELECT * FROM projectOkName GROUP BY name HAVING name LIKE '%" . $fname . "%' OR lname LIKE '%" . $fname . "%' OR fname LIKE '%" . $fname . "%' ";
        }

        if (sizeof($names)==2){
            $lname = $names[1];
            $sth = "SELECT * FROM projectOkName GROUP BY name HAVING fname LIKE '%" . $fname . "%' OR lname LIKE '%" . $lname . "%' OR fname LIKE '%" . $lname . "%' OR lname LIKE '%" . $fname . "%' ";
        }
        #This send the request to the database and returns a list
        $ProjectsList = $this->db->prepare($sth);
        $ProjectsList->execute();
        $arrayProjectsList = $ProjectsList->fetchall(PDO::FETCH_ASSOC);
        $results = $ProjectsList->rowCount();
    
        #this prints the results of the request in html and give the number of results
        if ($results >= 1) {
            echo '<h4>Incroyable ! ' . $results . ' résultats pour "' . $UserQuery . '".</h4>';
        } elseif ($results == 0) {
            echo '<h4>Dommage... 0 résultats pour "' . $UserQuery . '".</h4>';
        }   
    
        return $results >= 1 ? $arrayProjectsList : '';
    }

    /**
     * @param $project_id
     * @return mixed
     */
    function getNumberOfUserForAProject($project_id){

        $sth = "SELECT COUNT(*) as 'number' FROM `l_project_user` WHERE project_id = '" . $project_id . "'";

        #This send the request to the database and return the number
        $Number = $this->db->prepare($sth);
        $Number->execute();
        $arrayNumber = $Number->fetchall(PDO::FETCH_ASSOC);
        
        return $arrayNumber[0]['number'];
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getSkillsOfProject($id){
        $request = $this->db->prepare("SELECT DISTINCT `skill_id`,`Skillname` FROM `ProjectSkills` WHERE project_id = '" . $id . "'");
        $request->execute();
        $array = $request->fetchall(PDO::FETCH_ASSOC);

        return $array;
    }
    /**
     * @param $array
     */
    function addProject2($array){

        $proj = $this->getLastProject();
        $lastId = $proj['project_id'];

        foreach($array as $result){
            $text = $result;
            $request = $this->db->prepare("INSERT INTO `l_skill_project`(`project_id`, `skill_id`) 
            VALUES ('$lastId','$text')");

            $request->execute();
        }
    }

    /**
     * @param Project $project
     * first section of project insert
     */
    function addProject1(Project $project){
        $name = htmlspecialchars($project->getName());
        $askingHelp = htmlspecialchars($project->getAskingHelp());
        $descri = htmlspecialchars($project->getDescription());
        $git = htmlspecialchars($project->getGithub());
        $slack = htmlspecialchars($project->getSlack());
        $img = $project->getImg();




        $request = $this->db->prepare("INSERT INTO `project`(`name`, `askingHelp`, `description`, `github`, `slack`, `img`) 
        VALUES ('$name','$askingHelp','$descri','$git','$slack','$img')");
        $request->execute();

    }

    /**
     * @param $array
     */
    function addProject3($array){
        foreach($array as $result){
            $request1 = $this->db->prepare("SELECT * FROM user WHERE mail = :mail");
            $request1->execute(array(
                'mail' => $result
            ));

            $mailcheck = $request1->rowCount();

            $last = $this->getLastProject();
            $lastId = $last['project_id'];

            if ($mailcheck == 1){
                $userinfo = $request1->fetch(PDO::FETCH_ASSOC);
                $user_id = $userinfo['user_id'];
                $request2 = $this->db->prepare("INSERT INTO `l_project_user`(`user_id`, `project_id`, `istutor`) 
                VALUES ('$user_id','$lastId',0)");
                $request2->execute();
            }
        }
    }

    function addUsersProject($array, $id){
        foreach($array as $result){
            $request1 = $this->db->prepare("SELECT * FROM user WHERE mail = :mail");
            $request1->execute(array(
                'mail' => $result
            ));

            $mailcheck = $request1->rowCount();


            $lastId = $id;

            if ($mailcheck == 1){
                $userinfo = $request1->fetch(PDO::FETCH_ASSOC);
                $user_id = $userinfo['user_id'];
                $test = $this->db->prepare("SELECT * FROM `l_project_user` WHERE user_id = :id AND project_id = :projId");
                $test->execute(array(
                    'id' => $user_id,
                    'projId' => $lastId
                ));
                $testCheck = $test->rowCount();
                if($testCheck == 1){
                    echo '<p style="color:red;"> Erreur, cet utilisateur est déja dans le projet </p>';
                }else{
                    $request2 = $this->db->prepare("INSERT INTO `l_project_user`(`user_id`, `project_id`, `istutor`) 
                VALUES ('$user_id','$lastId',0)");
                    $request2->execute();
                }


            }
        }
    }
    /**
     * @return mixed
     */
    function getLastProject(){

        $sth = "SELECT * FROM project ORDER BY project_id DESC LIMIT 1";

        #This send the request to the database and returns a list
        $ProjectList = $this->db->prepare($sth);
        $ProjectList->execute();
        $arrayProjectList = $ProjectList->fetch(PDO::FETCH_ASSOC);

        return $arrayProjectList;
    }

    /**
     * set the project tutor
     */
    function projectTutor(){

            $user_id = $_SESSION['user_id'];
            $last = $this->getLastProject();
            $lastId = $last['project_id'];
            $request2 = $this->db->prepare("INSERT INTO `l_project_user`(`user_id`, `project_id`, `istutor` ) 
                    VALUES ('$user_id','$lastId', 1)");
            $request2->execute();



    }

    /**
     * @param $id
     * @return mixed
     */
    public function getUserProject($id){

        $request = $this->db->prepare("SELECT * FROM UserProject WHERE project_id = '". $id."'");
        $request->execute();

        $users = $request->fetchall(PDO::FETCH_ASSOC);
        return $users;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getUsersOfProject($id){

        $request = $this->db->prepare("SELECT DISTINCT fname, lname, user_key FROM ProjectList WHERE project_id = '". $id."'");
        $request->execute();

        $users = $request->fetchall(PDO::FETCH_ASSOC);
        return $users;
    }

    /**
     * @param $idPro
     * @param $idUs
     */
    public function delUserOfProject($idPro, $idUs){
        $request = $this->db->prepare("DELETE FROM `l_project_user` WHERE project_id = '". $idPro ."' AND user_id = '" . $idUs . "'");
        $request->execute();
    }

    /**
     * @param $id
     */
    public function askHelp($id){
        $request = $this->db->prepare("UPDATE `project` SET `askingHelp`= 1 WHERE `project_id`= '". $id."'");
        $request->execute();

    }

    /**
     * @param $id
     */
    public function stopHelp($id){
        $request = $this->db->prepare("UPDATE `project` SET `askingHelp`= 0 WHERE `project_id`= '". $id."'");
        $request->execute();

    }
}