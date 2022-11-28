<?php
    require 'conexion.php';

    $equipo = $_POST['equipo'];

    $query = "select * from equipo where pais = '$equipo'";
    $consulta = mysqli_query($conn, $query);
    $arrayEquipo = mysqli_fetch_array($consulta);

    $idEquipo = $arrayEquipo['id'];
    $queryJugadores = "select * from jugador where equipo = $idEquipo";
    $consJugadores = mysqli_query($conn, $queryJugadores);
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
    <h1>Seleccion de <?php echo $arrayEquipo['pais']; ?></h1>
    <div>
        <h3>Campeonatos <?php echo $arrayEquipo['campeonatos'] ?></h3>
        <h3>Fundacion <?php echo $arrayEquipo['fundacion'] ?></h3>
        <h3>info</h3>
        <p><?php echo $arrayEquipo['info'] ?></p>
        <h3>Director tecnico <?php echo $arrayEquipo['DT'] ?></h3>
        <h2>Jugadores</h2>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Club</th>
                <th>Numero</th>
                <th>Posicion</th>   
            </tr>
        <?php while($jugador = mysqli_fetch_array($consJugadores)){

        ?>
            <tr>
                <td>
                    <?php echo $jugador['nombre'] ?>
                </td>
                <td>
                    <?php echo $jugador['club'] ?>
                </td>
                <td>
                    <?php echo $jugador['numero'] ?>
                </td>
                <td>
                    <?php echo $jugador['posicion'] ?>
                </td>
            </tr>


            <?php } ?>

        </table>
    </div>
    <div>
        <form action="favorito.php" method="post">
            <input type="checkbox" name="fav" id="fav" value="<?php $arrayEquipo['id']; ?>">
            <label for="favorito">Escoger como favorito</label>
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>