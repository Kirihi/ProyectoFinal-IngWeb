<?php
    require "conexion.php";

    session_start();

    if(validarLogin()){
        header("location: ./login.php");
    }

    $equipo = $_POST['equipo'];

    $queryId = "select id as idEquipo from equipo where pais = '$equipo'";
    $consId = mysqli_query($conn, $queryId);
    $arrId = mysqli_fetch_array($consId);

    $idEquipo = $arrId['idEquipo'];

    $queryUpdate = "update usuario set favorito = $idEquipo";
    
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