<?php

namespace AppBundle\Entity;

/**
 * Description of Spacemen
 *
 * @author Pavel
 */
class Spaceman {
    
    private $id;
    private $firstName;
    private $lastName;
    private $birthdate;
    private $superPower;
    
    public function getId() {
        return $this->id;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getBirthdate() {
        return $this->birthdate;
    }

    public function getSuperPower() {
        return $this->superPower;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
        return $this;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
        return $this;
    }

    public function setBirthdate($birthdate) {
        $this->birthdate = $birthdate;
        return $this;
    }

    public function setSuperPower($superPower) {
        $this->superPower = $superPower;
        return $this;
    }
}
