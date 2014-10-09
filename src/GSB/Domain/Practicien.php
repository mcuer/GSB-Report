<?php

namespace GSB\Domain;

class Practicien 
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
    private $first_name;
    /**
     * Name.
     *
     * @var string
     */ 
    private $address;
    /**
     * Name.
     *
     * @var string
     */
    private $zip_code;
    /**
     * Name.
     *
     * @var string
     */
    private $city;
    /**
     * Name.
     *
     * @var string
     */
    private $notoriety_coefficient;
    /**
     * Name.
     *
     * @var string
     */
    private $type;
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
    
    public function getFirst_name() {
        return $this->first_name;
    }

    public function setFirst_name($first_name) {
        $this->first_name = $first_name;
    }
    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }
    public function getZip_code() {
        return $this->zip_code;
    }

    public function setZip_code($zip_code) {
        $this->zip_code = $zip_code;
    }
    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
    }
    public function getNotoriety_coefficient() {
        return $this->notoriety_coefficient;
    }

    public function setNotoriety_coefficient($notoriety_coefficient) {
        $this->notoriety_coefficient = $notoriety_coefficient;
    }
    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }
}
