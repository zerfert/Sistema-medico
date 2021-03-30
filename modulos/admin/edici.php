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

	$tra->edit_cita($_REQUEST['h'],$_REQUEST['m'],$_REQUEST['f'],$_REQUEST['o'],$_REQUEST['e'],$_REQUEST['t']);
	exit();
	}
	$reg=$tra->get_cita_id($_GET['u']);
	?>
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Editar Cita</title>
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
	<form name="form" action="./ici.php" method="post">
		<table border="1" align="center">
				<th>Historial medico del paciente:</th>
				<td><select name="h">
				<?php
				$t = new Trabajo();
				$reg=$t->ver_pac();
				for ($i=0;$i<count($reg);$i++){?> 

					<option value=<?php echo $reg[$i]['nhistorial'];?>><?php echo $reg[$i]['nombre'];?></option>
				<?php
				}
				?> 
				
				</select>
				</td>
			</tr>
			<tr>
			<th>Especialidad:</th>
				<td><select name="m">
				<?php
				$t = new Trabajo();
				$reg=$t->ver_medic();
				for ($i=0;$i<count($reg);$i++){?> 

					<option value=<?php echo $reg[$i]['id_m'];?>><?php echo $reg[$i]['especialidad'];?></option>
				<?php
				}
				?> 
				</select>
				</td>
			</tr>
         <tr>
				<th>fecha:</th>
				<td><input type="date" name="f" required/>
				</td>
			</tr>
			<tr>
				<th>Hora:</th>
				<td><input type="time" name="t" required/>
				</td>
			</tr>
			<tr>
				<th>Observaciones:</th>
				<td><input type="text" name="o" required/>
				</td>
			</tr>
			<tr>
				<th>Estado de la Cita:</th>
				<td><select name="e">

					<option value="Pendiente">Pendiente</option>

					<option value="Cancelada">Cancelada</option>

				</select>
				</td>
			</tr>
			<tr>
				<td><input type="button" value="Volver" title="Volver"
					onclick="window.location='./citas.php'"></td>
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