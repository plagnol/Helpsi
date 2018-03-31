<?php
/**
 * Created by PhpStorm.
 * User: antoine Plagnol
 * Date: 19/03/2018
 * Time: 16:01
 */
include($_SERVER['DOCUMENT_ROOT']."/src/User.class.php");

class UserUpdater
{
    private $db;

    /**
     * UserUpdater constructor.
     * @param $db : database
     *
     */
    public function __construct($db){
        $this->setDb($db);
    }

    /**
     * set the database
     * @param PDO $db database
     */

    public function setDb(PDO $bdd){
        $this->db = $bdd;
    }

    /**
     * @param $post, get data from a form
     * @return User class
     */
    public function getUserForm($post)
    {
        $user = new User();

        $user->setFname(htmlspecialchars($post["fname"]));
        $user->setLname(htmlspecialchars($post["lname"]));
        $user->setMail(htmlspecialchars($post["mail"]));
        $user->setPassword(htmlspecialchars($post["pw"]));
        $user->setPasswordCheck(htmlspecialchars($post["pw2"]));

        $user->setAvatar($post["avatar"]);
        $user->setWebsite("");
        $user->setBio(htmlspecialchars($post["bio"]));

        $user->setPhone($post["phone"]);
        $user->setDiscord("");
        $user->setFacebook("");
        $user->setLinkedin("");
        $user->setSkype("");
        $user->setGit("");
        $user->setGradeID($post["grade"]);
        $user->setCity($post["city"]);
        $user->setUserKey();

        return $user;
    }

    /**
     * @param $user
     * Add an user to the database
     */
    public function signIn(User $user)
    {
        // We check if the email isn't already used
        $error = '';
        $number =-1;
        $sth = $this->db->prepare("SELECT * FROM user WHERE mail = :mail");
        $sth->execute(array(
            'mail' => $user->getMail()
        ));
		$reg1 = "#^[a-z](\.?[a-z]){2,}@(montpellier-)?epsi\.fr$#";
        $mailcheck = $sth->rowCount();

        if ($mailcheck == 0 && preg_match($reg1, $user->getMail())) {
            // We check the passwords

            $pw = $user->getPassword();
            $pw2 = $user->getPasswordCheck();

            if ($pw == $pw2) {

                $fname = $user->getFname();
                $lname = $user->getLname();
                $mail = $user->getMail();
                $pw = sha1($pw);

                $avatar = $user->getAvatar();
                $web = "";
                $bio = $user->getBio();

                $phone = $user->getPhone();
                $discord = "";
                $facebook = "";
                $linkedin = "";
                $skype = "";
                $git = "";
                $grade = $user->getGradeId();
                $city = $user->getCity();
                $userKey = $user->getUserKey();
                $number = 0;

                // We insert the values in the db
                $insertuser = $this->db->query("INSERT INTO `user`(`lname`, `fname`, `phone`, `mail`, `password`, `bio`, `avatar`, `website`, `discord`, `facebook`, `linkedin`, `skype`, `git`, `auth`, `grade_id`, `school_id`, `user_key`) 
                VALUES ('$lname','$fname','$phone','$mail','$pw','$bio','$avatar','$web','$discord','$facebook','$linkedin','$skype','$git',1,'$grade', '$city','$userKey')");
                echo '<script>alert("You successfully registered !\nPlease log in.");</script>';
                echo '
                    <a href="login.php"><button type="submit" class="mt-4 btn btn-success"><i class="fa fa-sign-in"></i> Login</button></a>';
                header("location:../controller/login.php");
            } else {
            	$number = 1;
            }
        } else {
        	$number = 2;
        }
        return $number;
    }

    /**
     * Login Function
     */

    public function loginUser()
    {
        // Log in the user
        $emaillogin = htmlspecialchars($_POST['maillogin']);
        $pwlogin = sha1($_POST['pwlogin']);
        $requserco = $this->db->prepare("SELECT * FROM user WHERE mail = ? AND password = ?");
        $requserco->execute(array(
            $emaillogin,
            $pwlogin
        ));
        $number = -1;

        $userexist = $requserco->rowCount();
        $error = '';
        // If everything is ok
        if ($userexist == 1) {
            $userinfo = $requserco->fetch(PDO::FETCH_ASSOC);
            // All the user data is in the $_SESSION[]
            $_SESSION = $userinfo;
            $number = 0;
            echo '<script>alert("You are now logged in !");</script>';
        } else {
        	$number =1;
        }
        return $number;
    }

    /**
     *
     * Logout function
     */

    public function logoutUser()
    {
        session_unset();
        session_destroy();
        header("location:login.php");
    }

    /**
     * @param $key
     * @return $userinfo(array) or null
     */
    public function getUserFromKey($key){
        $request = $this->db->prepare("SELECT * FROM user WHERE user_key = ?");
        $request->execute(array(
            $key
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

    public function getUserTotalMarkFromKey($key){
        $sth="SELECT TotalMarkByTutor.mark from TotalMarkByTutor , user WHERE user.user_key= '" . $key . "' AND user.user_id=TotalMarkByTutor.user_id";
        $request = $this->db->prepare($sth);
        $request->execute();

        $userexist = $request->rowCount();


        if ($userexist == 1) {
            $userinfo = $request->fetch(PDO::FETCH_ASSOC);
        } else {
            $userinfo = -1;
        }
        return $userinfo;
    }



    /**
     * @param $web
     * @param $discord
     * @param $facebook
     * @param $linkedin
     * @param $skype
     * @param $git
     * @param $id
     */
    public function updateLink($web, $discord, $facebook, $linkedin, $skype, $git, $id){
        $request = $this->db->prepare("UPDATE `user` SET `website`='$web',`discord`='$discord',`facebook`='$facebook',`linkedin`='$linkedin',`skype`= '$skype',`git`= '$git' 
WHERE user_id = '$id'");
        $request->execute();
    }

    /**
     * @param $phone
     * @param $pw
     * @param $bio
     * @param $avatar
     * @param $grad
     * @param $school
     * @param $id
     */
    public function updateProfil($phone, $pw, $bio, $avatar, $grad, $school, $id){
        $request = $this->db->prepare("UPDATE `user` SET `phone`='$phone',`password`='$pw',`bio`='$bio',`avatar`='$avatar', `grade_id`='$grad',`school_id`='$school' WHERE user_id = '$id'");
        $request->execute();
    }

    /**
     * @param $id
     * @return null
     */
    public function getUserFromId($id){
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

    public function getProjectUser($id){
        $request = $this->db->prepare("SELECT * FROM allProjetOk WHERE user_id = ?");
        $request->execute(array(
            $id
        ));

        $projectList = $request->fetchall(PDO::FETCH_ASSOC);
        return $projectList;
    }

    public function getTenLastUser()
    {
        $request = $this->db->prepare("SELECT fname, lname, avatar, city, user_key FROM user U, school S WHERE U.school_id = S.school_id LIMIT 10 ");
        $request->execute();
        $fetch = $request->fetchAll(PDO::FETCH_OBJ);
        return $fetch;
    }
}