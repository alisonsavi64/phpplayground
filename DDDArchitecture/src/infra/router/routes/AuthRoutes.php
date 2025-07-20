<?php 

namespace Src\Infra\Router\Routes;

use Src\Infra\Controller\AuthController;

class AuthRoutes {

    private $authController;

    public function __construct(){
        $this->authController = new AuthController();
    }

    public function getRoutes($uri){
        if($uri === '/auth/login'){            
            return $this->authController->LoginUser();
        }
    }
}

