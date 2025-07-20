<?php 

require_once __DIR__ . '/../core/Router.php';
require_once __DIR__ . '/../core/Request.php';
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../app/Controllers/AuthController.php';
require_once __DIR__ . '/../app/Controllers/UserController.php';
require_once __DIR__ . '/../app/Models/User.php';

use MVCArchitecture\Core\Router;
use MVCArchitecture\Core\Request;
use MVCArchitecture\Core\Database;

$database = new Database();

$migrationsPath = __DIR__ . '/../migrations';
$migrationsFiles = glob($migrationsPath . '/*.php');

foreach ($migrationsFiles as $file){
    $migration = require $file;
    $migration($database->connection);
}

$router = new Router(new Request(), $database);

$router->get('/register', [AuthController::class, 'showRegister']);
$router->post('/register', [AuthController::class, 'handleRegister']);
$router->get('/profile/picture/:id', [UserController::class, 'handleProfilePicture']);

$router->resolve();