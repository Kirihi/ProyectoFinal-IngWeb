<?php
    $conn = mysqli_connect("localhost", "practica", "12345", "mundial_app");

    if(!$conn){
        echo "error de conexion ".mysqli_connect_error($conn);
    }
?>