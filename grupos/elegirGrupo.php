<?php
    require "../conexion.php";
    session_start();
    $grupos = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Elección de grupos mundialistas</title>
</head>
<body>
    <center><h1>Elegir grupo</h1></center>
    <br>
    <form action="mostrar.php" method="post">
        <?php foreach($grupos as $grupo){?>
        <div>
            <h3><input type="radio" name="grupo" id="grupo" value="<?= $grupo ?>">Grupo <?= $grupo; ?></h3>
            <?php 
                $query = "select pais from equipo where grupo = '$grupo'";
                $consulta = mysqli_query($conn, $query);
            ?>
            <table class="table-bordered">
                <tr>
                    <th>Paises</th>
                    <?php
                        while($pais = mysqli_fetch_array($consulta)){
                    ?>
                    <tr>
                        <td><?= $pais['pais']; ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tr>
            </table>
            <?php
            }
            ?>
        </div>
        <br>
        <div>
            <input type="submit" value="Enviar" class="btn btn-primary" role="button">
        </div>

    </form>
</body>
</html>