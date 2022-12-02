<?php
$country = $_POST['country'];
$grupo = $_POST['grupo'];
$campeonatos = $_POST['campeonatos'];
$ano_fundacion = $_POST['ano_fundacion'];
$dt = $_POST['dt'];
$info_equipo = $_POST['dt'];

require ("../conexion.php");

$query = "insert into equipo (pais, grupo, campeonatos, fundacion, DT, info) values ('$country', '$grupo', '$campeonatos', '$ano_fundacion', '$dt', '$info_equipo')";
$stmt = mysqli_query($conn, $query);

if($stmt){
    echo "<p>Equipo creado correctamente.</p>";
    echo "<br>";
    echo "<a href=crear_equipo.html>Crear nuevo equipo</a>";
}
else{
    echo "<p>No se ha creado el equipo. Intente nuevamente.</p>";
    echo "<br>";
    echo "<a href=crear_equipo.html>Crear nuevo equipo</a>";
}
?>