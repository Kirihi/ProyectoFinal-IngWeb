<?php
    require "../conexion.php";

    session_start();

    $validar = validarLogin();

    if(!$validar){
        header("location: ../sesion/login.html");
    }

    $idFav = $_POST['fav'];

    $queryUpdate = "update usuario set favorito = $idFav";
    
    if(mysqli_query($conn, $queryUpdate)){
        echo "<h1>Favorito registrado correctamente</h1>";

    }
    else{
        echo "Favorito no registrado";
    }
    
    function validarLogin(){
        if(isset($_SESSION['username'])){
            return true;
        }
        return false;
    }
?>