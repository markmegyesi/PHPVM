<?php

require_once(__DIR__ . './DBConnect.php');

class Crud_class extends DBConnect {

    public function __construct() {
        return parent::__construct();
    }

    public function add($price, $service) {
        $db = new DBConnect();
        $sql = "INSERT INTO arlista (szolgaltatas,ar)VALUES('" . $service. "',"
                . "'" . $price . "')";
        $result = $db->connect()->query($sql);
        $db->dbclose();
    }

    public function read() {
        $db = new DBConnect();
        $sql = "SELECT szolgaltatas , ar FROM arlista;";
        $result = $db->connect()->query($sql);
        $returnArray = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $returnArray[] = $row;
                
            }
            return $returnArray;
        }
        $db->dbclose();
    }

    public function delete($service) {
        $db = new DBConnect();
        $sql = "DELETE FROM arlista where szolgaltatas=" . $service . ";";
        $db->connect()->query($sql);
        $db->dbclose();
    }

    public function update($price, $service, $newprice, $newservice) {
        $db = new DBConnect();
        $sql = " UPDATE arlista SET szolgaltatas = '" . $newservice . "', ar = '" . $newprice . "' "
                . "WHERE ar='" . $price . "' AND szolgaltatas='" . $service . "'; ";
        $db->connect()->query($sql);
        $db->dbclose();
    }

    
    }


