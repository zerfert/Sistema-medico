<?php
session_start();
$inactivo=300;
if(isset($_SESSION['timeout'])){
 $session_life=time() - $_SESSION['timeout'];
  if($session_life>$inactivo){
  	session_destroy();
  	header("location:../../index.php");
  }
}
$_SESSION['timeout']=time();
if($_SESSION['user']){
?>
<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../../css/cssc.css">
   <link rel="stylesheet" href="../../css/cal.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <title>Inicio</title>
</head>
<body>
<div class='fondo'>
<div id='cssmenu'>
<ul>
   <li><a><span>Bienvenido <?=$_SESSION['user'];?></span></a></li>
   <li><a href='./contenido.php'><span>inicio</span></a></li>
   <li><a href='./citas.php'><span>Citas</span></a></li>
   <li><a href='./pacientes.php'><span>Pacientes</span></a></li>
   <li><a href='./medicos.php'><span>medicos</span></a></li>
   <li><a href='./usuarios.php'><span>Usuarios</span></a></li>
   <li class='last'><a href='#'><span>Contactenos</span></a></li>
   <li><a href='./salir.php'><span>Cerrar Sesion</span></a></li>
</ul>
</div>

<br><br>
<div class="calendar">
    <div class="calendar__info">
        <div class="calendar__prev" id="prev-month">&#9664;</div>
        <div class="calendar__month" id="month"></div>
        <div class="calendar__year" id="year"></div>
        <div class="calendar__next" id="next-month">&#9654;</div>
    </div>
    <div class="calendar__week">
        <div class="calendar__day calendar__item">Lunes</div>
        <div class="calendar__day calendar__item">Martes</div>
        <div class="calendar__day calendar__item">Miercoles</div>
        <div class="calendar__day calendar__item">Jueves</div>
        <div class="calendar__day calendar__item">Viernes</div>
        <div class="calendar__day calendar__item">Sabado</div>
        <div class="calendar__day calendar__item">Domingo</div>
    </div>

    <div class="calendar__dates" id="dates"></div>
</div>

<script src="../../js/scripts.js"></script>
</body>
<html>
<?php
}else{

	echo "<script type='text/javascript'>
     alert('ERROR!! al iniciar sesion');
     window.location='../../index.php';
     </script>";
}
?> 
