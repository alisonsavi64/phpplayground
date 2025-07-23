<?php  

namespace MVCArchitecture\Core;

use PDO;
use PDOException;

class Database{
    public $connection;

    public function __construct(){
        try{
            $this->connection = new PDO("pgsql:host=postgresdb;dbname=mvcteste;", 'root', 'password');            
        } catch (PDOException $e){
              var_dump("Connection failed: " . $e->getMessage());
        }        
    }
}