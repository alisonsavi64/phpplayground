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
use MVCArchitecture\App\Controllers\UserController;
use Redis;

$database = new Database();
$redis = new Redis();
$redis->connect('redis', 6379);

$migrationsPath = __DIR__ . '/../migrations';
$migrationsFiles = glob($migrationsPath . '/*.php');

foreach ($migrationsFiles as $file){
    $migration = require $file;
    $migration($database->connection);
}

$router = new Router(new Request(), $database, $redis);

$router->get('/register', [AuthController::class, 'showRegister']);
$router->post('/register', [AuthController::class, 'handleRegister']);
$router->get('/profile/picture/:id', [UserController::class, 'handleProfilePicture']);
$router->get('/profile/cache', [UserController::class, 'handleCacheTest']);

$router->resolve();