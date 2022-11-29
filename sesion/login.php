<?php
    require "../conexion.php";

    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $query = "select nombre as nombre, COUNT(*) AS contar from usuario WHERE username ='$username' AND password = '$password'";
    $consulta = mysqli_query($conn, $query);
    $fetchArr = mysqli_fetch_array($consulta);

    mysqli_close($conn);

    if($fetchArr['contar']>0){
        $_SESSION['nombre'] = $fetchArr['nombre'];
        if($username == "admin"){
            header("location: ../admin/inicioAdmin.php");
        }
        else{
            header("location: ../inicio.php");
        }
       
    }
    else{
        echo "Wrong username or password";
    }

?>