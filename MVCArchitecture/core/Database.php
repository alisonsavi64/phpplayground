<?php  

namespace MVCArchitecture\Core;

use PDO;
use PDOException;

class Database{
    public $connection;

    public function __construct(){
        try{
            $this->connection = new PDO("pgsql:host=localhost;dbname=mvcteste;", 'root', 'password');
        } catch (PDOException $e){
              echo "Connection failed: " . $e->getMessage();
        }        
    }
}