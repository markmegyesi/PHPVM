<?php


class DBConnect {
   
    public $conn;

    public function __construct() {
       return $this->connect();
    }
    
public function connect() {


    
        
        require_once (__DIR__.'./conf.php');
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "eszternail";  
// Create connection
        if (!isset($this->conn)) {
            $this->conn = new mysqli($servername, $username, $password, $dbname);
            // $this->conn->set_charset('utf8mb4');
           
        }
       
// Check connection
        if (!$this->conn) {
           
            die("Connection failed: " . $this->conn->connect_error());
        } else {
            
            return $this->conn;
        }
         
    }
    
    public function dbclose() {
        mysqli_close($this->conn);
        
    }
    

}
