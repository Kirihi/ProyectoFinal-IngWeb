<?php
    require "conexion.php";
    session_start();

    $query = "select pais"

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista de equipos</h1>
    <h3>Escoja un equipo</h3>
    <form action="equipo.php" method="post">
        <input type="radio" name="equipo" id="equipo" value="España">
        <label for="españa">España</label>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>