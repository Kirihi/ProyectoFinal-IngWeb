<?php
$equipo1 = $_POST['equipo1'];
$equipo2 = $_POST['equipo2'];
$fecha_partido = $_POST['fecha_partido'];
$estadios = $_POST['estadios'];
$hora_partido = $_POST['hora_partido'];

require ("../conexion.php");

session_start();

$query = "insert into partido (equipo_1, equipo_2, fecha, lugar, hora) values ('$equipo1', '$equipo2', '$fecha_partido, '$estadios', '$hora_partido')";
$stmt = mysqli_query($conn, $query);

if($stmt){
    echo "<p>Partido creado exitosamente.</p>";
    echo "<br>";
    echo "<a href=crear_partido.html>Crear nuevo partido</a>";
}
else{
    echo "<p>No se ha creado el partido. Intente nuevamente.</p>";
    echo "<br>";
    echo "<a href=crear_partido.html>Crear nuevo partido</a>";
}
?>