<?php
    require "../conexion.php";
    session_start();

    $query = "select pais from equipo";
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
    <h1>Lista de equipos</h1>
    <h3>Escoja un equipo</h3>
    <form action="equipo.php" method="post">
        <?php while($equipo = mysqli_fetch_array($consulta)){

        ?>
        <div>
            <input type="radio" name="equipo" id="equipo" value="<?php echo $equipo['pais']; ?>">
            <label for="equipo"><?php echo $equipo['pais']; ?></label>
        </div>
        <?php } ?>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>