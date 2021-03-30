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
	include("../class.php");
	$tra = new Trabajo();
	if(isset($_POST["grabar"])&&$_POST["grabar"]=="si"){

	$tra->edit_paciente($_REQUEST['n'],$_REQUEST['d'],$_REQUEST['t'],$_REQUEST['i']);
	exit();
	}
	$reg=$tra->get_paciente_id($_GET['i']);
	?>
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Editar Paciente</title>
	<script type="text/javascript" language="javascript" src="./eli.js"></script>
	<link rel="stylesheet" href="../../css/cssc.css">
   <link rel="stylesheet" href="../../css/tab.css">
	</head>
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
	<br><br><br>
	<form name="form" action="editarp.php" method="post">
		<table border="1" align="center">
			<tr>
				<td>Identificacion:</td>
				<input type="hidden" name="grabar" value="si">
				<td><input type="number" name="i" value="<?php echo $_GET['i'];?>" readonly>
				</td>
			</tr>
            <tr>
				<td>Nombre:</td>
				<td><input type="text" name="n" value="<?php echo $reg[0]['nombre']?>" required/>
				</td>
			</tr>
			<tr>
				<td>Direccion:</td>
				<td><input type="text" name="d" value="<?php echo $reg[0]['direccion']?>" required/>
				</td>
			</tr>
			<tr>
				<td>Telefono:</td>
				<td><input type="number" name="t" value="<?php echo $reg[0]['tel']?>" required/>
				</td>
			</tr>
			<tr>
				<td><input type="button" value="Volver" title="Volver"
					onclick="window.location='./pacientes.php'"></td>
					<td><input type="submit" value="Editar" title="Editar">
					</td>
				</tr>
			</table>
		</form>
		<?php
}else{

	echo "<script type='text/javascript'>
     alert('ERROR!! al iniciar sesion');
     window.location='../../index.php';
     </script>";
}
?> 

</body>
</html>