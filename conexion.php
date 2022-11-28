<?php
$serverName = "localhost";
$UID = "practica";
$PWD = "12345";
$Database = "mundial_app";

    $connectionInfo = array($UID, $PWD, $Database);
    $conn = mysqli_connect($serverName, $connectionInfo);

    if(!$conn){
        echo "error de conexion ".mysqli_connect_error($conn);
    }
?>