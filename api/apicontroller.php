<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../conexion.php";
include_once 'api.php';


$database = new Conexion();
$db = $database->getConnection();

$resultados = new api($db);
$stmt = $resultados->return();


    if($stmt->num_rows > 0){
       
        $resultados_array=array();
        $resultados_array["records"]=array();


        
        while ($row = $stmt->fetch_assoc()){
        
            extract($row);


            $resultados_item=array(
                "id" => $id,
                "equipo1" => $equipo1,
                "equipo2" => $equipo2,
                "estado" => $estado
            );


            array_push($resultados_array["records"], $resultados_item);
        }


        http_response_code(200);


        echo json_encode($resultados_array);
    }
    else{


        http_response_code(404);


        echo json_encode(
            array("message" => "No se encontró Registro.")
        );
    }     


?>