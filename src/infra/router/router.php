<?php 

$uri = $_SERVER['REQUEST_URI'];

if($uri === '/'){
    require __DIR__ . '/../presentation/pages/home.php';
    return;
}

if($uri === '/teste'){
    require __DIR__ . '/../presentation/pages/teste.php';
    return;
}

require __DIR__ . '/../presentation/pages/home.php';