<?php
    require 'conexion.php';

    $nombre = $_POST['nombre'];
    $username = $_POST['username'];
    $password = $_POST['pass'];

    $query = "insert into usuario(nombre, username, password) values('$nombre', '$username', '$password')";
    $consulta = mysqli_query($conn, $query);

    header("location: ./login.html");

    mysqli_close($conn);
?>