<?php

namespace GSB\Domain;
use Symfony\Component\Security\Core\User\UserInterface;

class Visitor implements UserInterface
{
    
    private $id;

    private $sector;

    private $laboraty;

    private $visitorLast;

    private $visitorFirst;

    private $visitorAddresse;

    private $visitorZipCode;

    private $visitorCity;
    
    private $hiringDate;
    
    private $userName;
    
    private $passeword;
    
    private $salt;
    
    private $role;
    
    private $type;

    public function getId() {
        return $this->id;
    }

    public function getSector() {
        return $this->sector;
    }

    public function getLaboraty() {
        return $this->laboraty;
    }

    public function getVisitorLast() {
        return $this->visitorLast;
    }

    public function getVisitorFirst() {
        return $this->visitorFirst;
    }

    public function getVisitorAddresse() {
        return $this->visitorAddresse;
    }

    public function getVisitorZipCode() {
        return $this->visitorZipCode;
    }

    public function getVisitorCity() {
        return $this->visitorCity;
    }

    public function getHiringDate() {
        return $this->hiringDate;
    }

    public function getUserName() {
        return $this->userName;
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

    public function setId($id) {
        $this->id = $id;
    }

    public function setSector($sector) {
        $this->sector = $sector;
    }

    public function setLaboraty($laboraty) {
        $this->laboraty = $laboraty;
    }

    public function setVisitorLast($visitorLast) {
        $this->visitorLast = $visitorLast;
    }

    public function setVisitorFirst($visitorFirst) {
        $this->visitorFirst = $visitorFirst;
    }

    public function setVisitorAddresse($visitorAddresse) {
        $this->visitorAddresse = $visitorAddresse;
    }

    public function setVisitorZipCode($visitorZipCode) {
        $this->visitorZipCode = $visitorZipCode;
    }

    public function setVisitorCity($visitorCity) {
        $this->visitorCity = $visitorCity;
    }

    public function setHiringDate($hiringDate) {
        $this->hiringDate = $hiringDate;
    }

    public function setUserName($userName) {
        $this->userName = $userName;
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
     /**
     * @inheritDoc
     */
    public function getRoles()
    {
        return array($this->getRole());
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials() {
        // Nothing to do here
    }

}