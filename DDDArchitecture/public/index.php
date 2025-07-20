<?php
require_once __DIR__ . "/../vendor/autoload.php";

use \Src\Infra\Router\Router;
use \Src\Infra\Router\Request;


$request = new Request(
    $_SERVER['REQUEST_URI'],
 $_SERVER['REQUEST_METHOD'],
   json_decode(file_get_contents("php://input"), true),
  $_GET
);

$router = new Router();

$response = $router->init($uri);

header('Content-Type: application/json');
echo json_encode($response);