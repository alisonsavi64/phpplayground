<?php 

namespace Src\Infra\Controller;

use LoginUser;

class AuthController{

    private $loginUserUseCase;
    public function __construct(){
        $this->loginUserUseCase = new LoginUser();
    }

    public function LoginUser($input){
        $this->loginUserUseCase->execute($input);
    }
}