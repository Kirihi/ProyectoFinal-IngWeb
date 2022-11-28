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
    <title>Document</title>
</head>
<body>
    <h1>Elegir grupo</h1>
    <form action="mostrar.php" method="post">
        <?php foreach($grupos as $grupo){?>
        <div>
            <h3>Grupo <?php echo $grupo; ?></h3>
            <input type="radio" name="grupo" id="grupo" value="<?php echo $grupo ?>">
            <?php 
                $query = "select pais from equipo where grupo = '$grupo'";
                $consulta = mysqli_query($conn, $query);
            ?>
            <table>

                <tr><th>Paises</th></tr>
                    <?php
                        while($pais = mysqli_fetch_array($consulta)){
                    ?>
                    <tr>
                        <td><?php echo $pais['pais']; ?></td>
                    </tr>
                        <?php } ?>
            </table>
            <?php } ?>
        </div>
        
        <div>
            <input type="submit" value="Enviar">
        </div>

    </form>
</body>
</html>