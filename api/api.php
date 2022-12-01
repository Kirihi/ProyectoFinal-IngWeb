<?php
//requiere resultado en db
include_once "data.json";
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Origin: *');

class Api{
 
    private $conn;
    public function __construct($db){
        $this->conn = $db;
    }

    public function return(){
        $stmt = $this->conn->prepare("SELECT * FROM resultado");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }
}
?>