<?php

class Project
{
    
    //Name of project
    private $name;
    private $askingHelp;
    private $description;
    private $github;
    private $slack;
    private $img;
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return boolean
     */
    public function getAskingHelp()
    {
        return $this->askingHelp;
    }


    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getSlack()
    {
        return $this->slack;
    }

    /**
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }
    /**
     * @return string
     */
    public function getGithub()
    {
        return $this->github;
    }
    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param boolean $help
     */
    public function setAskingHelp($help){
        $this->askingHelp = $help;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param mixed $github
     */
    public function setGithub($github)
    {
        $this->github = $github;
    }

    /**
     * @param mixed $img
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    /**
     * @param mixed $slack
     */
    public function setSlack($slack)
    {
        $this->slack = $slack;
    }


}
?>