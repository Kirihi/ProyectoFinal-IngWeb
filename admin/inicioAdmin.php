<?php
    session_start();
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
    <h1>Bienvenido Administrador <?php echo $_SESSION['nombre'];; ?></h1>
    <a href="partidos.php">
        <div>
            <h3>Actualizar resultado de partido</h3>
        </div>
    </a>
</body>
</html>