<?php
    require "../conexion.php";
    session_start();

    if(!isset($_SESSION['nombre'])){
        header("location: ../avisos/noFavorito.html");
    }

    $nombre = $_SESSION['nombre'];

    $query = "select favorito as fav from usuario where nombre = '$nombre'";
    $consulta = mysqli_query($conn, $query);
    $arr = mysqli_fetch_array($consulta);

    $idFav = $arr['fav'];

    $queryEquipo = "select * from equipo where id = $idFav";
    $consEquipo = mysqli_query($conn, $queryEquipo);
    $arrEquipo = mysqli_fetch_array($consEquipo);
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
    <h1>Equipo favorito: <?php echo $arrEquipo['pais']; ?></h1>
    <div>
        <table>
            <tr>
                <th>Puntos</th>
                <th>JJ</th>
                <th>JG</th>
                <th>JE</th>
                <th>JP</th>
                <th>GF</th>
                <th>GC</th>
                <th>DG</th>
            </tr>
            <tr>
                <td><?php echo $arrEquipo['puntos']; ?></td>
                <td><?php echo $arrEquipo['JJ']; ?></td>
                <td><?php echo $arrEquipo['JG']; ?></td>
                <td><?php echo $arrEquipo['JE']; ?></td>
                <td><?php echo $arrEquipo['JP']; ?></td>
                <td><?php echo $arrEquipo['GF']; ?></td>
                <td><?php echo $arrEquipo['GC']; ?></td>
                <td><?php echo $arrEquipo['DG']; ?></td>
            </tr>
        </table>
    </div>
    <h2>Partidos</h2>
    <?php 
        $idPart = $arrEquipo['id'];

        $queryPart = "select * from partido where equipo_1 = $idPart or equipo_2 = $idPart";
        $consPart = mysqli_query($conn, $queryPart);
        
        while($partido = mysqli_fetch_array($consPart)){

    ?>
    <div>
        <h3>Partido</h3>
        <?php 
            $idEquipo1 = $partido['equipo_1'];
            $idEquipo2 = $partido['equipo_2'];
            $queryNombreEq1 = "select pais from equipo where equipo_1 = $idEquipo1";
            $queryNombreEq2 = "select pais from equipo where equipo_1 = $idEquipo2";
            $consEquipo1 = mysqli_query($conn, $queryNombreEq1);
            $consEquipo1 = mysqli_query($conn, $queryNombreEq2);
            $pais1 = mysqli_fetch_array($consEquipo1);
            $pais2 = mysqli_fetch_array($consEquipo2);
        ?>
        <div>
            <table>
                <tr>
                    <th><?php echo $pais1['pais']; ?></th>
                    <th><?php echo $partido['goles_equipo_1']; ?></th>
                    <th>VS</th>
                    <th><?php echo $partido['goles_equipo_2']; ?></th>
                    <th><?php echo $pais2['pais']; ?></th>
                </tr>
            </table>
        </div>
    </div>
    <?php } ?>
</body>
</html>