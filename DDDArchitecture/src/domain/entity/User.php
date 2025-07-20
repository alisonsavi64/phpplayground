<?php 

class User{
    private $name;
    private $email;
    private $password;
    public function __construct($name, $email, $password) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        if(strlen($password) < 0) throw new Exception("Password needs to be at least 6 chars long!");
    }
}