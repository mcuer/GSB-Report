<?php

namespace GSB\Domain;

class PracticienType
{
    private $id;
    /**
     * Name.
     *
     * @var string
     */
    
    private $name;
    /**
     * Name.
     *
     * @var string
     */
    private $place;
    /**
     * Name.
     *
     * @var string
     */ 
    
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
    
    public function getPlace() {
        return $this->place;
    }

    public function setPlace($place) {
        $this->place = $place;
    }
    
}

