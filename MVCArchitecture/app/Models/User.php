<?php 
namespace MVCArchitecture\App\Models;

class User{

    public $email;
    public $password;
    public $id;

    public function __construct($email, $password, $id = null){
        $this->email = $email;
        $this->password = $password;
        $this->id = $id;
    }
}