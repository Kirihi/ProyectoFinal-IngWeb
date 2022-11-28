<?php
    require "conexion.php";

    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];


    
    $query = "select nombre as nombre, COUNT(*) AS contar from users WHERE username ='$username' AND password = '$password'";
    $consulta = mysqli_query($conn, $query);
    $fetchArr = mysqli_fetch_array($consulta);

    mysqli_close($conn);

    if($fetchArr['contar']>0){
        $_SESSION['username'] = $fetchArr['nombre'];
        header("location: ./principal.php");
    }
    else{
        echo "Wrong username or password";
    }

?>