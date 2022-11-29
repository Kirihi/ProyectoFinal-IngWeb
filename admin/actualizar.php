<?php 
    require "../conexion.php";

    session_start();

    $goles1 = $_POST['equipo_1'];
    $goles2 = $_POST['equipo_2'];
    $idPartido = $_POST['idPartido'];

    $actualizarPartido = "update partido set goles_equipo_2 = $goles2, goles_equipo_1 = '$goles1' where id = $idPartido";

    if(!mysqli_query($conn, $actualizarPartido)){
        echo "<h1>No se actualizo el resultado</h1>";
    }

    $queryPartido = "select equipo_1, equipo_2 from partido where id = $idPartido";
    $consPartido = mysqli_query($conn, $queryPartido);
    $partido = mysqli_fetch_array($consPartido);

    $equipos = array($partido['equipo_1'], $partido['equipo_2']);

    if($goles1 > $goles2){
        $ganador = $partido['equipo_1'];
    }
    else if($goles1 < $goles2){
        $ganador = $partido['equipo_2'];
    }
    else{$ganador = "empate";}

    foreach($equipos as $equipo){
        $queryEquipo = "select * from equipo where id = $equipo";
        $consEquipo = mysqli_query($conn, $queryEquipo);
        $arrayEquipo = mysqli_fetch_array($consEquipo);

        if(!isset($arrayEquipo['JJ'])){
            if($ganador == $arrayEquipo['id']){
                $puntos = 3;
                $jg = 1;
                $je = 0;
                $jp = 0;
            }
            else if($ganador == "empate"){
                $puntos = 1;
                $je = 1;
                $jg = 0;
                $jp = 0;
            }
            else{
                $puntos = 0;
                $jp = 1;
                $jg = 0;
                $je = 0;
            }

            if($equipo == $partido['equipo_1']){
                $gf = $goles1;
                $gc = $goles2;
                $dg = $goles1 - $goles2;
            }
            else{
                $gf = $goles2;
                $gc = $goles1;
                $dg = $goles2 - $goles1;
            }

            $queryUpdtEquipo = "update equipo
            set puntos = $puntos,
            JJ = 1,
            JG = $jg,
            JE = $je,
            JP = $jp,
            GF = $gf,
            GC = $gc,
            DG = $dg
            where id = $equipo
            ";

            if(!mysqli_query($conn, $queryUpdtEquipo)){
                echo "<h1>No se actualizo el resultado en equipos</h1>";
            }
        }
        else{
            $jj = $arrayEquipo['JJ'] + 1;
            if($ganador == $arrayEquipo['id']){
                $puntos = $arrayEquipo['puntos'] + 3;
                $jg = $arrayEquipo['JG'] + 1;
                $je = $arrayEquipo['JE'];
                $jp = $arrayEquipo['JP'];
            }
            else if($ganador == "empate"){
                $puntos = $arrayEquipo['puntos'] + 1;
                $je = $arrayEquipo['JE'] + 1;
                $jg = $arrayEquipo['JG'];
                $jp = $arrayEquipo['JP'];
            }
            else{
                $puntos = $arrayEquipo['puntos'];
                $jp = $arrayEquipo['JP'] + 1;
                $jg = $arrayEquipo['JG'];
                $je = $arrayEquipo['JE'];
            }

            if($equipo == $partido['equipo_1']){
                $gf = $arrayEquipo['GF'] + $goles1;
                $gc = $arrayEquipo['GC'] + $goles2;
                $dg = $arrayEquipo['DF'] + $goles1 - $goles2;
            }
            else{
                $gf = $arrayEquipo['GF'] + $goles2;
                $gc = $arrayEquipo['GC'] + $goles1;
                $dg = $arrayEquipo['DF'] + $goles2 - $goles1;
            }

            $queryUpdtEquipo = "update equipo
            set puntos = $puntos,
            JJ = $jj,
            JG = $jg,
            JE = $je,
            JP = $jp,
            GF = $gf,
            GC = $gc,
            DG = $dg
            where id = $equipo
            ";

            if(!mysqli_query($conn, $queryUpdtEquipo)){
                echo "<h1>No se actualizo el resultado en equipos</h1>";
            }
        }
    }

?>