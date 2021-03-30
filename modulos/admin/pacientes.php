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
   <link rel="stylesheet" href="../../css/tab.css">
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
   <li><a href='./medicos.php'><span>Medicos</span></a></li>
   <li><a href='./usuarios.php'><span>Usuarios</span></a></li>
   <li class='last'><a href='#'><span>Contactenos</span></a></li>
   <li><a href='./salir.php'><span>Cerrar Sesion</span></a></li>
</ul>
</div>

<br><br>
<div>
<form name="form" action="./ipac.php" method="post">
		<table border="1" align="center">
			<tr>
				<th>Identificacion:</th>
				<td><input type="number" name="i" required/>
				</td>
			</tr>
            <tr>
				<th>Nombre:</th>
				<td><input type="text" name="n"  required/>
				</td>
			</tr>
			<tr>
				<th>Direccion:</th>
				<td><input type="text" name="d" required/>
				</td>
			</tr>
         <tr>
				<th>Telefono:</th>
				<td><input type="number" name="t" required/>
				</td>
			</tr>
			<tr>
				<td><input type="submit" value="Insertar" title="Registrar"></td>
					<td><input type="reset" value="Limpiar"></td>
				</tr>
			</table>
		</form>
		<br><br>
		<div>

			<section class="principal">

			<h1>BUSQUEDA DE HISTORIAL MEDICO</h1>

			<div class="formulario">
			<label for="caja_busqueda">Buscar por identificacion :</label>
			<input type="text" name="caja_busqueda" id="caja_busqueda"></input>

		
			</div>

		<div id="datos" align="center"></div>
	
	
		</section>



		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/mainp.js"></script>
		</div>

</body>
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
