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
<?php
include("../class.php");
?> 
<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../../css/cssc.css">
   <link rel="stylesheet" href="../../css/tabls.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <title>Inicio</title>
</head>
<body>
<div class='fondo'>
<div id='cssmenu'>
<ul>
   <li><a><span>Bienvenido <?=$_SESSION['user'];?></span></a></li>
   <li><a href='./contenido.php'><span>Inicio</span></a></li>
   <li><a href='./citas.php'><span>Citas</span></a></li>
   <li><a href='./medicos.php'><span>Medicos</span></a></li>
   <li class='last'><a href='#'><span>Contactenos</span></a></li>
   <li><a href='./salir.php'><span>Cerrar Sesion</span></a></li>
</ul>
</div>
</div>
<div id="main-container">

		<table>
			<thead>
				<tr>
					<th>Identificacion</th><th>Nombre</th><th>Especialidad</th>
				</tr>
			</thead>
         <?php
         $t = new Trabajo();
         $reg=$t->ver_medic();
         for ($i=0;$i<count($reg);$i++){
         echo " 
			<tr>
				<td>".$reg[$i]['id_m']."</td><td>".$reg[$i]['nombreM']."</td><td>".$reg[$i]['especialidad']."</td>
			</tr>";
         }
         ?> 
		</table>
	</div>
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