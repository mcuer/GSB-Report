<?php

namespace GSB\Domain;

class Visitor 
{
    
    private $id;

    private $sector;

    private $laboraty;

    private $visitor_last;

    private $visitor_first;

    private $visitor_addresse;

    private $visitor_zip_code;

    private $visitor_city;
    
    private $hiring_date;
    
    private $user_name;
    
    private $passeword;
    
    private $salt;
    
    private $role;
    
    private $visitor_type;

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getSector() {
        return $this->sector;
    }

    public function setSector($sector) {
        $this->sector = $sector;
    }

    public function getLaboraty() {
        return $this->laboraty;
    }

    public function setLaboraty($laboraty) {
        $this->laboraty = $laboraty;
    }

    public function getlast() {
        return $this->last;
    }

    public function setlast($first) {
        $this->last = $first;
    }
    public function getfirst() {
        return $this->first;
    }

    public function setfirst($first) {
        $this->first = $first;
    }
    
    public function getaddresse() {
        return $this->visitor_addresse;
    }

    public function getzip_code() {
        return $this->visitor_zip_code;
    }

    public function getcity() {
        return $this->visitor_city;
    }

    public function getHiring_date() {
        return $this->hiring_date;
    }

    public function getUser_name() {
        return $this->user_name;
    }

    public function getPasseword() {
        return $this->passeword;
    }

    public function getSalt() {
        return $this->salt;
    }

    public function getRole() {
        return $this->role;
    }

    public function getType() {
        return $this->type;
    }

    public function setaddresse($addresse) {
        $this->addresse = $addresse;
    }

    public function setzip_code($zip_code) {
        $this->zip_code = $zip_code;
    }

    public function setcity($city) {
        $this->city = $city;
    }

    public function setHiring_date($hiring_date) {
        $this->date = $hiring_date;
    }

    public function setUser_name($user_name) {
        $this->name = $user_name;
    }

    public function setPasseword($passeword) {
        $this->passeword = $passeword;
    }

    public function setSalt($salt) {
        $this->salt = $salt;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function setType($type) {
        $this->type = $type;
    }


}