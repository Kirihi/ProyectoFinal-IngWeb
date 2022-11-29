<?php
    require "../conexion.php";

    session_start();

    $query = "select * from partido";
    $consulta = mysqli_query($conn, $query);
    
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
    <h1>Seleccionar el partido a actualizar</h1>
        <?php
        $cont = 1;
        while($partido = mysqli_fetch_array($consulta)){

            $idEquipo1 = $partido['equipo_1'];
            $idEquipo2 = $partido['equipo_2'];
            $queryNombreEq1 = "select pais from equipo where id = $idEquipo1";
            $queryNombreEq2 = "select pais from equipo where id = $idEquipo2";
            $consEquipo1 = mysqli_query($conn, $queryNombreEq1);
            $consEquipo2 = mysqli_query($conn, $queryNombreEq2);
            $pais1 = mysqli_fetch_array($consEquipo1);
            $pais2 = mysqli_fetch_array($consEquipo2);
        ?>
            <div>
                <h2>Partido # <?php echo $cont; ?> </h2>
                <table>
                    <h3>Fecha: <?php echo $partido['fecha']  ?></h3>
                    <h3>Lugar: <?php echo $partido['lugar']  ?></h3>
                    <h3>Hora: <?php echo $partido['hora']  ?></h3>
                    <tr>
                        <th>    <?php echo $pais1['pais']  ?>   </th>
                        <th>    <?php echo $partido['goles_equipo_1']  ?>   </th>
                        <th>    VS  </th>
                        <th>    <?php echo $pais2['pais']  ?>   </th>
                        <th>    <?php echo $partido['goles_equipo_2']  ?>   </th>
                    </tr>
                    
                </table>

            </div>
        <?php } ?>
</body>
</html>