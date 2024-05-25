<?php
class Technician {
    private $techID, $firstName, $lastName, $email, $phone, $password;
    
    //constructor
    public function __construct($techID, $firstName, $lastName, $email, $phone, $password) {
        $this->techID = $techID;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
    }
    
    //techID getter, no setter, auto increment
    public function getTechID() {
        return $this->techID;
    }
    
    //fname getter and setter
    public function getFirstName() {
        return $this->firstName;
    }
    
    public function setFirstName($value) {
        $this->firstName = $value;
    }
    
    //lname getter and setter
    public function getLastName() {
        return $this->lastName;
    }
    
    public function setLastName($value) {
        $this->lastName = $value;
    }
    
    //full name getter
    public function getFullName() {
        $fullName = $this->firstName . ' ' . $this->lastName;
        return $fullName;
    }
    //email getter and setter
    public function getEmail() {
        return $this->email;
    }
    
    public function setEmail($value) {
        $this->email = $value;
    }
    
    //phone number getter and setter
    public function getPhone() {
        return $this->phone;
    }
    
    public function setPhone($value) {
        $this->phone = $value;
    }
    
    //password getter and setter
    public function getPassword() {
        return $this->password;
    }
    
    public function setPassword($value) {
        $this->password = $value;
    }
}
?>