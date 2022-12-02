<?php
    require "../conexion.php";

    session_start();

    $query = "select * from partido where goles_equipo_1 is null or goles_equipo_2 is null";
    $consulta = mysqli_query($conn, $query);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Selección de partidos a actualizar</title>
</head>
<body>
    <center><h1>Seleccionar el partido a actualizar</h1></center>
    <form action="resultado.php" method="post" class="container">
        <div class="form-group">
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
            <div class="container">
                <h3><input type="radio" name="partido" id="partido" value="<?php echo $partido['id']; ?>">Partido No. <?php echo $cont; ?> </h3>
                <br>
                <h4><?php echo $pais1['pais']  ?> VS <?php echo $pais2['pais']; $cont++;  ?></h4>
                <br>
            </div>
        <?php } ?>
        <br>
        <br>
        <input type="submit" value="Enviar" class="btn btn-primary" role="button">
        <a href="inicioAdmin.php" class="btn btn-primary" role="button">Volver</a>
        </div>
    </form>
</body>
</html>