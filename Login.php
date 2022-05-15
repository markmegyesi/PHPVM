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
        $getPassword=[];
        
//        $sql = "SELECT jelszo FROM felhasznalok WHERE email='" . trim($email) . "' AND jelszo='" . trim($password) . "';";
//        $result = $db->connect()->query($sql);
//        $getPassword = mysqli_fetch_assoc($result);
//        
//        if (!$getPassword == null && $password == $getPassword['jelszo']) {
//            $sql = "SELECT * FROM felhasznalok WHERE email='" . trim($email) . "' AND jelszo='" . trim($password) . "';";
//            $result = $db->connect()->query($sql);
//            $user = mysqli_fetch_assoc($result);
        $stmt = $db->connect()->prepare("SELECT jelszo FROM felhasznalok WHERE email=? AND jelszo=?;");
$stmt->bind_param('ss', $email,$password); 
$stmt->execute();

$result = $stmt->get_result();

 while ($row = $result->fetch_assoc()) {
    $getPassword[]=$row;
       
 
  var_dump($getPassword[0]['jelszo']);

 if (!$getPassword == null && $password == $getPassword[0]['jelszo']) {
     $user=[];
      $stmt = $db->connect()->prepare("SELECT * FROM felhasznalok WHERE email=? AND jelszo=?;");
$stmt->bind_param('ss', $email,$password);
$stmt->execute();

$result = $stmt->get_result(); 
while ($row = $result->fetch_assoc()) {
    $user[]=$row;
    

        var_dump($user);
            if($user){
                
           
            $_SESSION ['email'] = $user [0]["email"];
            $_SESSION ['name'] = $user [0]['nev'];
            $_SESSION ['valid'] = $user [0]['valid'];
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
    }

}
