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
        $user->setWebsite($post["web"]);
        $user->setBio(htmlspecialchars($post["bio"]));

        $user->setPhone($post["phone"]);
        $user->setDiscord($post["discord"]);
        $user->setFacebook($post["facebook"]);
        $user->setLinkedin($post["linkedin"]);
        $user->setSkype($post["skype"]);
        $user->setGit($post["git"]);
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
        $sth = $this->db->prepare("SELECT * FROM user WHERE mail = :mail");
        $sth->execute(array(
            'mail' => $user->getMail()
        ));

        $mailcheck = $sth->rowCount();

        if ($mailcheck == 0) {
            // We check the passwords

            $pw = $user->getPassword();
            $pw2 = $user->getPasswordCheck();

            if ($pw == $pw2) {

                $fname = $user->getFname();
                $lname = $user->getLname();
                $mail = $user->getMail();
                $pw = sha1($pw);

                $avatar = $user->getAvatar();
                $web = $user->getWebsite();
                $bio = $user->getBio();

                $phone = $user->getPhone();
                $discord = $user->getDiscord();
                $facebook = $user->getFacebook();
                $linkedin = $user->getLinkedin();
                $skype = $user->getSkype();
                $git = $user->getGit();
                $grade = $user->getGradeId();
                $city = $user->getCity();
                $userKey = $user->getUserKey();

                // We insert the values in the db
                $insertuser = $this->db->query("INSERT INTO `user`(`lname`, `fname`, `phone`, `mail`, `password`, `bio`, `avatar`, `website`, `discord`, `facebook`, `linkedin`, `skype`, `git`, `auth`, `grade_id`, `school_id`, `user_key`) 
                VALUES ('$lname','$fname','$phone','$mail','$pw','$bio','$avatar','$web','$discord','$facebook','$linkedin','$skype','$git',1,'$grade', '$city','$userKey')");
                echo '<script>alert("You successfully registered !\nPlease log in.");</script>';
                echo '
                    <a href="login.php"><button type="submit" class="mt-4 btn btn-success"><i class="fa fa-sign-in"></i> Login</button></a>';
            } else {
                $error = 'Passwords don\'t match !';
            }
        } else {
            $error = 'This email is arleady used !';
        }
        echo $error;
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

        $userexist = $requserco->rowCount();
        $error = '';
        // If everything is ok
        if ($userexist == 1) {
            $userinfo = $requserco->fetch(PDO::FETCH_ASSOC);
            // All the user data is in the $_SESSION[]
            $_SESSION = $userinfo;
            echo '<script>alert("You are now logged in !");</script>';
        } else {
            $error = 'Incorrect password or email !';
        }
        echo '<p class="my-4">' . $error . '</p>';
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

    public function updateLink($web, $discord, $facebook, $linkedin, $skype, $git, $id){
        $request = $this->db->prepare("INSERT INTO `user`(`website`, `discord`, `facebook`, `linkedin`, `skype`, `git`,) 
                                       VALUES ('$web','$discord','$facebook','$linkedin','$skype', '$git')")
    }
}