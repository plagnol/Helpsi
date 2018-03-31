<?php
class Skill
{
    
    //Name of skill
    private $name;
    //Grade of skill
    private $grade_id;
    
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getGradeId()
    {
        return $this->grade_id;
    }

    /** 
     * @param mixed $name
     */
    public function setName($name)
    {
        //Test if new name is a string 
        if (is_string($name)) {
            //Test lenght of new name 
            if (strlen($name) <= 30) {
                //Change value
                $this->name = $name;
            }
            else {
                echo ("Le nouveau nom est trop long");
            }
        }
        else {
            echo ("Le nouveau nom n'est pas valide");
        }
    }   

    /**
     * @param mixed $grade_id 
     */
    public function setGrade($grade_id)
    {
        //Test if new grade_id is a int 
        if (is_int($grade_id)) {
            //Test if new grade_id is valid 
            if (1 >= $grade_id && $grade_id <= 5) {
                //Change value
                $this->grade_id = $grade_id;
            }
            else {
                echo ("Le nouveau niveau n'existe pas");
            }
        }
        else {
            echo ("Le nouveau niveau n'est pas valide");
        }
    }  
}
?>