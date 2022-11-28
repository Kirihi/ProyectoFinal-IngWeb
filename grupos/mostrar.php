<?php 
    require "../conexion.php";
    session_start();

    $grupo = $_POST['grupo'];

    $query = "select pais, puntos, JJ, JG, JE, JP, GF, GC, DG from equipo where grupo = '$grupo' order by puntos desc";
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
    <h1>Tabla de posiciones del grupo <?php echo $grupo; ?></h1>
    <table>
        <tr>
            <th>Pais</th>
            <th>Puntos</th>
            <th>JJ</th>
            <th>JG</th>
            <th>JE</th>
            <th>JP</th>
            <th>GF</th>
            <th>GC</th>
            <th>DG</th>
        </tr>
    <?php while($equipo = mysqli_fetch_array($consulta)){ ?>
        <tr>
            <td><?php echo $equipo['pais']; ?></td>
            <td><?php echo $equipo['puntos']; ?></td>
            <td><?php echo $equipo['JJ']; ?></td>
            <td><?php echo $equipo['JG']; ?></td>
            <td><?php echo $equipo['JE']; ?></td>
            <td><?php echo $equipo['JP']; ?></td>
            <td><?php echo $equipo['GF']; ?></td>
            <td><?php echo $equipo['GC']; ?></td>
            <td><?php echo $equipo['DG']; ?></td>
        </tr>
        </table>
    <?php } ?>
</body>
</html>