<?php 

return function(PDO $pdo){
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS users (
            id serial PRIMARY KEY,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        );
    ");
};