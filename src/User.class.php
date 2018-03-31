<?php

include($_SERVER['DOCUMENT_ROOT']."/src/generateRandomString.php");

class User
{
    //authority
    private $auth = 1;
    
    //Main user info
    protected $id;
    protected $fname;
    protected $lname;
    protected $mail;
    protected $password;
    protected $passwordCheck;
    
    protected $avatar;
    protected $website;
    protected $bio;
    
    //Contact info
    protected $phone;
    protected $discord;
    protected $facebook;
    protected $linkedin;
    protected $skype;
    protected $git;
    protected $grade_id;
    protected $city;
    protected $userKey;

    /**
     * @return number
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return number
     */
    public function getAuth()
    {
        return $this->auth;
    }

    /**
     * @return mixed
     */
    public function getFname()
    {
        return $this->fname;
    }

    /**
     * @return mixed
     */
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getPasswordCheck()
    {
        return $this->passwordCheck;
    }
    
    /**
     * @return mixed
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @return mixed
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @return mixed
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return mixed
     */
    public function getDiscord()
    {
        return $this->discord;
    }

    /**
     * @return mixed
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @return mixed
     */
    public function getLinkedin()
    {
        return $this->linkedin;
    }

    /**
     * @return mixed
     */
    public function getSkype()
    {
        return $this->skype;
    }

    /**
     * @return mixed
     */
    public function getGit()
    {
        return $this->git;
    }

    /**
     * @return mixed
     */
    public function getGradeId()
    {
        return $this->grade_id;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return mixed
     */
    public function getUserKey()
    {
        return $this->userKey;
    }

    /**
     * @param mixed $newId
     */
    public function setId($newId)
    {
        $this->id = $newId;
    }
    /**
     * @param mixed $fname
     */
    public function setFname($fname)
    {
        $this->fname = $fname;
    }

    /**
     * @param mixed $lname
     */
    public function setLname($lname)
    {
        $this->lname = $lname;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @param mixed $passwordCheck
     */
    public function setPasswordCheck($passwordCheck)
    {
        $this->passwordCheck = $passwordCheck;
    }
    
    /**
     * @param mixed $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    /**
     * @param mixed $website
     */
    public function setWebsite($website)
    {
        $this->website = $website;
    }

    /**
     * @param mixed $bio
     */
    public function setBio($bio)
    {
        $this->bio = $bio;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @param mixed $discord
     */
    public function setDiscord($discord)
    {
        $this->discord = $discord;
    }

    /**
     * @param mixed $facebook
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }

    /**
     * @param mixed $linkedin
     */
    public function setLinkedin($linkedin)
    {
        $this->linkedin = $linkedin;
    }

    /**
     * @param mixed $skype
     */
    public function setSkype($skype)
    {
        $this->skype = $skype;
    }

    /**
     * @param mixed $git
     */
    public function setGit($git)
    {
        $this->git = $git;
    }

    /**
     * @param mixed $grade
     */
    public function setGradeID($grade)
    {
        $this->grade_id = $grade;
    }


    /**
     * @param mixed $cuidad
     */
    public function setCity($cuidad)
    {
        $this->city = $cuidad;
    }

    /**
     * Set user key of 25 carac
     *
     */
    public function setUserKey()
    {
        $this->userKey = generateRandomString(25);
    }
}