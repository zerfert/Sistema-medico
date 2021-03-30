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
   <script type="text/javascript" language="javascript" src="./eli.js"></script>
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
<form name="form" action="./imedic.php" method="post">
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
				<th>Especialidad:</th>
				<td><input type="text" name="e" required/>
				</td>
			</tr>
			<tr>
				<td><input type="submit" value="Insertar" title="Registrar"></td>
					<td><input type="reset" value="Limpiar"></td>
				</tr>
			</table>
		</form>

</body>
</html>
<?php
$t = new Trabajo();
$reg=$t->ver_medic();
echo  " <table border='1' align='center'>
			<tr align='center'>
				<th>Identificacion</th>
				<th>Nombre</th>
				<th>Especialidad</th>
				<th>Eliminar</th>
			</tr><br><br><br>";
	for ($i=0;$i<count($reg);$i++){
		echo "<tr><td>".$reg[$i]['id_m']."</td>";
		echo "<td>".$reg[$i]['nombreM']."</td>";
		echo "<td>".$reg[$i]['especialidad']."</td>";
		?>
		<td align="center"><a href="javascript:void(0);" onClick="eliminar('eliminarm.php?i=<?php echo $reg[$i]['id_m'];?>');" title="Eliminar Registros"><img src="../../img/elim.png" width="25" height="25">
		</a></td>
		</tr>
		<?php 
	}
	echo "</table>";
?>
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
