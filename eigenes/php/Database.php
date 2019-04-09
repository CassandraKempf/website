<?php

class Database
{
    
    private $conn;
    
    public function __construct()
    {
        
    }
    
    public function connect($host, $database, $user, $pass)
    {
        try {
            $this->$conn = new PDO("mysql:host=" . $host . ";dbname=" . $database, $user, $pass);

            // set the PDO error mode to exception
            $this->$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            echo "Connected successfully\n"; 
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage() . "\n";
        }
    }
    
    public function showUsers()
    {
        
    }
}


$host = '127.0.0.1';
$database = 'monse_online';
$user = 'dev';
$pass = 'devpw18';

$db = new Database();
$db->connect($host, $database, $user, $pass);
