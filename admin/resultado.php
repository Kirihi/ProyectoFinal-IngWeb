<?php
    require "../conexion.php";

    session_start();

    $idPartido = $_POST['partido'];

    $query = "select * from partido where id = $idPartido";
    $cons = mysqli_query($conn, $query);


    
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
    <h1>Indique el resultado del partido</h1>
    <?php
        $partido = mysqli_fetch_array($cons);

        $idEquipo1 = $partido['equipo_1'];
        $idEquipo2 = $partido['equipo_2'];
        $queryNombreEq1 = "select pais from equipo where id = $idEquipo1";
        $queryNombreEq2 = "select pais from equipo where id = $idEquipo2";
        $consEquipo1 = mysqli_query($conn, $queryNombreEq1);
        $consEquipo2 = mysqli_query($conn, $queryNombreEq2);
        $pais1 = mysqli_fetch_array($consEquipo1);
        $pais2 = mysqli_fetch_array($consEquipo2);
    ?>
    <form action="actualizar.php" method="post">
        <h2> <?php echo $pais1['pais']; ?> </h2>
        <input type="number" name="equipo_1" id="equipo_1">
        <h2> VS </h2>
        <input type="number" name="equipo_2" id="equipo_2">
        <h2> <?php echo $pais2['pais']; ?> </h2>
        <input type="hidden" name="idPartido" value="<?php echo $idPartido; ?>">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>