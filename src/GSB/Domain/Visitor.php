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

    public function getVisitor_last() {
        return $this->visitor_last;
    }

    public function setVisitor_last($visitor_first) {
        $this->visitor_last = $visitor_first;
    }
    public function getVisitor_first() {
        return $this->visitor_first;
    }

    public function setVisitor_first($visitor_first) {
        $this->visitor_first = $visitor_first;
    }
    
    public function getVisitor_addresse() {
        return $this->visitor_addresse;
    }

    public function getVisitor_zip_code() {
        return $this->visitor_zip_code;
    }

    public function getVisitor_city() {
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

    public function getVisitor_type() {
        return $this->visitor_type;
    }

    public function setVisitor_addresse($visitor_addresse) {
        $this->visitor_addresse = $visitor_addresse;
    }

    public function setVisitor_zip_code($visitor_zip_code) {
        $this->visitor_zip_code = $visitor_zip_code;
    }

    public function setVisitor_city($visitor_city) {
        $this->visitor_city = $visitor_city;
    }

    public function setHiring_date($hiring_date) {
        $this->hiring_date = $hiring_date;
    }

    public function setUser_name($user_name) {
        $this->user_name = $user_name;
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

    public function setVisitor_type($visitor_type) {
        $this->visitor_type = $visitor_type;
    }


}