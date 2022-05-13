<?php

include_once 'DBConnect.php';

/**
 * Description of Login
 *
 * @author balihb
 */
class Login extends DBConnect {

    public function __construct() {
        
    }

    

    public function getUser($email, $password) {

        $db = new DBConnect();

        
        $sql = "SELECT jelszo FROM felhasznalok WHERE email='" . $email . "' AND jelszo='" . $password . "';";
        $result = $db->connect()->query($sql);
        $getPassword = mysqli_fetch_assoc($result);
        
        if (!$getPassword == null && $password == $getPassword['jelszo']) {
            $sql = "SELECT * FROM felhasznalok WHERE email='" . $email . "' AND jelszo='" . $password . "';";
            $result = $db->connect()->query($sql);
            $user = mysqli_fetch_assoc($result);
            
            if($user){
                
           
            $_SESSION ['email'] = $user ["email"];
            $_SESSION ['name'] = $user ['nev'];
            $_SESSION ['valid'] = $user ['valid'];
            }
            $db->dbclose();
            
        }
        
        if(isset($_SESSION['name'])){
            return true;
            
        }else{
            return false;
            
        }
    }

}
