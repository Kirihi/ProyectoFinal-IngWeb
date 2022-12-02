<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Panel de administracion</title>
</head>
<body>
    <nav id="navegador">
        <a href="partidos.php">Actualizar resultados de partido</a>
        <a href="crear_equipo.html">Crear equipos</a>
        <a href="crear_partido.html">Crear partido</a>
    </nav>
    <div id="enlaces">
        <a href="close_session.php" role="button">Cerrar sesión</a>
    </div>
    <br>
    <br>
    <center><h1>Bienvenido Administrador <?php echo $_SESSION['nombre'];; ?></h1></center>
</body>
</html>