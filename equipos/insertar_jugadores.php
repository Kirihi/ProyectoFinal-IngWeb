<?php
$connect = mysqli_connect("localhost", "practica", "12345", "mundial_app"); 
              
$query = '';
$table_data = '';

// json file name
$filename = "jugadores.json";

// Read the JSON file in PHP
$data = file_get_contents($filename); 

// Convert the JSON String into PHP Array
$array = json_decode($data, true); 

// Extracting row by row
foreach($array as $row) {

    // Database query to insert data 
    // into database Make Multiple 
    // Insert Query 
    $query .= 
    "INSERT INTO jugador VALUES 
    ('".$row["nombre"]."', '".$row["posicion"]."', 
    '".$row["numero"]."', '".$row["equipo"]."'); "; 
   
    $table_data .= '
    <tr>
        <td>'.$row["nombre"].'</td>
        <td>'.$row["posicion"].'</td>
        <td>'.$row["numero"].'</td>
        <td>'.$row["equipo"].'</td>
    </tr>
    '; // Data for display on Web page
}
?>