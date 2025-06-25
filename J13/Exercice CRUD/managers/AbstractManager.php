<?php

require_once __DIR__ . '/vendor/autoload.php';

abstract class AbstractManager {
    
    public PDO $db;
    
    public function __construct(){
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();


        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_PORT'];
        $dbname = $_ENV['DB_NAME'];
        $connexionString = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";

        $user = $_ENV['DB_USERNAME'];
        $password = $_ENV['DB_PASSWORD'];

        $this -> db = new PDO(
            $connexionString,
            $user,
            $password
        ); 
    }
}
?>