<?php
class Admin extends User
{
    private $auth = 2;
    
    /**
     * @return number $auth
     */
    public function getAuth()
    {
        return $this->auth;
    }

    /**
     * @param number $auth
     */
    public function setAuth($auth)
    {
        $this->auth = $auth;
    }
}