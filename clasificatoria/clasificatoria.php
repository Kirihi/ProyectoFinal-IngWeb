<?php
  require "../conexion.php";

  session_start();

  $grupos = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H');
  
  $clasificados = array('A' => [], 'B' => [], 'C' => [], 'D' => [], 'E' => [], 'F' => [], 'G' => [], 'H' => []);
  foreach($grupos as $grupo){
    $query = "select pais from equipo where grupo = '$grupo' order by puntos";
    $consulta = mysqli_query($conn, $query);

    while($array = mysqli_fetch_array($consulta)){
      array_push($clasificados[$grupo], $array['pais']);
    }
  }

  print_r($clasificados);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ronda de clasificatoria</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
@import "compass/css3";

html,
body {
  padding: 20px;
}

.knockout-scheme {
  height: 100%;
}

.round {
  display: table-cell;
  vertical-align: middle;
  width: 160px;
  margin: 0;
  padding: 0;
  list-style-type: none;
}

.round > li {
  margin: 0;
  padding: 0;
  height: 40px;
  width: 150px;

  text-align: center;
  line-height: 40px;

  &.match {
    background: #ddd;
  }

  + li {
    margin-top: 20px;
  }
}

</style>
</head>
<body>
    <!-- Navbar -->
<div class="w3-top">
    <div class="w3-bar w3-purple w3-card w3-left-align w3-large">
      <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-purple" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
      <a href="../index.php" class="w3-bar-item w3-button w3-padding-large w3-white">Inicio</a>
      <a href="equipos/equipos.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Equipos</a>
      <a href="#" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Juegos</a>
      <a href="grupos/elegirGrupo.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Posiciones</a>
      <a href="clasificatoria.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Clasificatorias</a>
      <a href="favorito/favorito.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Favorito</a>
      <div class="w3-right w3-hide-small">
          <?php
            if(isset($_SESSION['nombre'])){
  
          ?>
        <a href="x" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white"><?php echo $_SESSION['nombre']; ?></a>
        <a href="./sesion/logout.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Log out</a>
          <?php } 
            else{
          ?>
          <a href="../avisos/noRegistro.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Visitante<a>
          <a href="./sesion/login.html" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Login</a>
          <?php } 
          ?>
      </div>
    </div>
  
    <!-- Navbar on small screens -->
    <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
      <a href="equipos/Equipos.html" class="w3-bar-item w3-button w3-padding-large">Equipos</a>
      <a href="#" class="w3-bar-item w3-button w3-padding-large">Juegos</a>
      <a href="#" class="w3-bar-item w3-button w3-padding-large">Posiciones</a>
      <a href="#" class="w3-bar-item w3-button w3-padding-large">Clasificatorias</a>
      <a href="#" class="w3-bar-item w3-button w3-padding-large">Favoritos</a>
      <a href="inicio_sesion/login.php" class="w3-bar-item w3-button w3-padding-large">Login</a>
    </div>
  </div>
  <div class="knockout-scheme">
    <ul class="round">

      <li class="match">Match 1</li>
      <p><?php 
      if(isset($clasificados['A'][0])){echo $clasificados['A'][0];}
      else{echo '';}
        ?> vs <?php if(isset($clasificados['B'][1])){echo $clasificados['B'][1];}
        else{echo '';} ?></p> 

      <li class="match">Match 2</li>
      <p><?php if(isset($clasificados['B'][0])){echo $clasificados['B'][0];}
      else{echo '';}
       ?> vs <?php if(isset($clasificados['A'][1])){echo $clasificados['A'][1];}
       else{echo '';} ?></p> 

      <li class="match">Match 3</li>
      <p><?php if(isset($clasificados['C'][0])){echo $clasificados['C'][0];}
      else{echo '';} ?> vs <?php if(isset($clasificados['D'][1])){echo $clasificados['D'][1];}
      else{echo '';} ?></p> 

      <li class="match">Match 4</li>
      <p><?php if(isset($clasificados['D'][0])){echo $clasificados['D'][0];}
      else{echo '';} ?> vs <?php if(isset($clasificados['C'][1])){echo $clasificados['C'][1];}
      else{echo '';} ?></p> 

      <li class="match">Match 5</li>
      <p><?php if(isset($clasificados['E'][0])){echo $clasificados['E'][0];}
      else{echo '';} ?> vs <?php if(isset($clasificados['F'][1])){echo $clasificados['F'][1];}
      else{echo '';} ?></p> 

      <li class="match">Match 6</li>
      <p><?php if(isset($clasificados['F'][0])){echo $clasificados['F'][0];}
      else{echo '';} ?> vs <?php if(isset($clasificados['E'][1])){echo $clasificados['E'][1];}
      else{echo '';} ?></p> 

      <li class="match">Match 7</li>
      <p><?php if(isset($clasificados['G'][0])){echo $clasificados['G'][0];}
      else{echo '';} ?> vs <?php if(isset($clasificados['H'][1])){echo $clasificados['H'][1];}
      else{echo '';} ?></p> 

      <li class="match">Match 8</li>
      <p><?php if(isset($clasificados['H'][0])){echo $clasificados['H'][0];}
      else{echo '';} ?> vs <?php if(isset($clasificados['G'][1])){echo $clasificados['G'][1];}
      else{echo '';} ?></p> 
    </ul>
    
    <ul class="round">
      <li class="match">Match 9</li>
      <li>&nbsp;</li>
      <li class="match">Match 10</li>
      <li>&nbsp;</li>
      <li class="match">Match 11</li>
      <li>&nbsp;</li>
      <li class="match">Match 12</li>
    </ul>
    
    <ul class="round">
      <li class="match">Match 13</li>
      <li>&nbsp;</li>
      <li>&nbsp;</li>
      <li>&nbsp;</li>
      <li class="match">Match 14</li>
    </ul>
    
    <ul class="round">
      <li class="match">Match 15</li>
    </ul>
  </div>
    
</body>
</html>