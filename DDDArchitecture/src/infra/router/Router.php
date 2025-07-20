<?php 
namespace Src\Infra\Router;

use \Src\Infra\Router\Routes\AuthRoutes;

class Router{
    private $authRoutes;

    public function __construct() {
        $this->authRoutes = new AuthRoutes();
    }

    public function init($uri){
        $this->authRoutes->getRoutes($uri);
    }
}