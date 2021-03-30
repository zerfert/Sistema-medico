<?php
class Conectar{

 public static function con(){

 	$link=mysqli_connect('localhost','root','');
 	mysqli_query($link,"SET NAMES 'utf8'");
 	mysqli_select_db($link,'clinica');
 	return $link;
 }

}

class Trabajo{
 private $medic;
 public function __construct(){

 	$this->medic=array();
 }

public function ver_medic(){

	$sql="select * from medico";
	$res=mysqli_query(Conectar::con(),$sql);
	while($row=mysqli_fetch_assoc($res)){
		$this->medic[]=$row;
	}
	return $this->medic;
 }
 public function ver_citas(){

	$sql="SELECT paciente.id_p,paciente.nombre,medico.especialidad,paciente.tel,medico.nombreM,ingreso.fecha,ingreso.hora,ingreso.obser,ingreso.estado FROM ingreso INNER JOIN paciente on paciente.nhistorial=ingreso.nhistorial INNER JOIN medico ON ingreso.id_m=medico.id_m";
	$res=mysqli_query(Conectar::con(),$sql);
	while($row=mysqli_fetch_assoc($res)){
		$this->medic[]=$row;
	}
	return $this->medic;
 }
 public function ver_user(){

	$sql="SELECT user, correo, permissions FROM users ORDER BY user ASC;";
	$res=mysqli_query(Conectar::con(),$sql);
	while($row=mysqli_fetch_assoc($res)){
		$this->medic[]=$row;
	}
	return $this->medic;
 }
 public function ver_pac(){

	$sql="SELECT * From paciente;";
	$res=mysqli_query(Conectar::con(),$sql);
	while($row=mysqli_fetch_assoc($res)){
		$this->medic[]=$row;
	}
	return $this->medic;
 }
 public function ver_h(){

	$sql="SELECT * From ingreso;";
	$res=mysqli_query(Conectar::con(),$sql);
	while($row=mysqli_fetch_assoc($res)){
		$this->medic[]=$row;
	}
	return $this->medic;
 }

 public function insertar($u,$p,$c,$Tipo){

	$sql="select * from users where user='$u'";
	$res=mysqli_query(Conectar::con(),$sql);
	if($row=mysqli_fetch_array($res)){
		echo "<script type='text/javascript'>
         alert('El Usuario con $u ya existe');
         window.location='./usuarios.php'
         </script>";
        }
    else{ 
        $sql="insert into users values ('$u','$c','$p','$Tipo','user.png')";
	    $res=mysqli_query(Conectar::con(),$sql);
		echo "<script type='text/javascript'>
         alert('El Usuario se inserto correctamente');
         window.location='./usuarios.php'
         </script>";
     	}
	}

    public function eli_user($u){

    	$sql="delete from users where user='$u'";
    	$res=mysqli_query(Conectar::con(),$sql);
    	echo "<script type='text/javascript'>
         alert('El Usuario se elimino correctamente');
         window.location='./usuarios.php'
         </script>";
	}
	public function eli_ci($u){

    	$sql="delete from ingreso where id_i='$u'";
    	$res=mysqli_query(Conectar::con(),$sql);
    	echo "<script type='text/javascript'>
         alert('La Cita se elimino correctamente');
         window.location='./citas.php'
         </script>";
	}
	public function eli_medic($i){

    	$sql="delete from medico where id_m='$i'";
    	$res=mysqli_query(Conectar::con(),$sql);
    	echo "<script type='text/javascript'>
         alert('El Medico se elimino correctamente');
         window.location='./medicos.php'
         </script>";
    }

    public function edi_user($u){
		$sql1="select permissions from users where user='$u'";
		$r=mysqli_query($link,$sql1);
		$up=mysqli_fetch_array($r);
		if ($up[0] == 'admin'){
			$sql="update users set permissions ='admin' where user='$u'";
    		$res=mysqli_query(Conectar::con(),$sql);
    		echo "<script type='text/javascript'>
         	alert('El usuario ".$u." se Actualizo correctamente');
         	window.location='./usuarios.php'
         	</script>";
		}
		else{
			$sql="update users set permissions ='Invitado' where user='$u'";
    		$res=mysqli_query(Conectar::con(),$sql);
    		echo "<script type='text/javascript'>
        	alert('El usuario ".$u." se Actualizo correctamente');
         	window.location='./usuarios.php'
         	</script>";
		}
	}
	public function edit_paciente($n,$d,$t,$i){
			$sql="update paciente set nombre ='$n',direccion='$d',tel=$t where id_p='$i'";
    		$res=mysqli_query(Conectar::con(),$sql);
    		echo "<script type='text/javascript'>
        	alert('El paciente se Actualizo correctamente');
         	window.location='./pacientes.php'
         	</script>";
		}



		public function edit_cita($h,$m,$f,$t,$o,$e,$u){
				//yyyy-mm-dd
				//dd-mm-yyyy
				$y= explode('-',$f);
				$fe=$y[0]."-".$y[1]."-".$y[2];
				$ti=$t.":00";
				$sql="select * from ingreso where hora='$ti'and fecha='$fe'";
				$res=mysqli_query(Conectar::con(),$sql);
				$s="SELECT COUNT(*) FROM ingreso WHERE id_m=$m";
				$r=mysqli_query(Conectar::con(),$s);
				$me=mysqli_fetch_array($r);
				if($me[0]<10){
					if($row=mysqli_fetch_array($res)){
						echo "<script type='text/javascript'>
						alert('Ya hay u una cita asignada el mismo dia y hora');
						window.location='./citas.php'
						</script>";
						}
					else{
						$sq="SELECT (ELT(WEEKDAY('$fe') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo')) AS DIA_SEMANA";
						$re=mysqli_query(Conectar::con(),$sq);
						$u=mysqli_fetch_array($re);
						if($u[0]=='Sabado'|| $u[0]=='Domingo'){
							echo "<script type='text/javascript'>
							alert('No se puede agendar cita el ".$u[0]."');
							window.location='./citas.php'
							</script>";
						
						} else{
							$sql="update ingreso set nhistorial=$h,id_m=$m,fecha='$fe',obser='$o',estado='$e',hora='$ti' where id_i=$u";
							$res=mysqli_query(Conectar::con(),$sql);
							echo "<script type='text/javascript'>
							alert('Se Modifico la cita correctamente');
							window.location='./citas.php'
							</script>";
						}
						
						}
				}
			}



    public function insertarm($i,$n,$e){

		$sql="select * from medico where id_m=$i";
		$res=mysqli_query(Conectar::con(),$sql);
		$s="SELECT COUNT(*) FROM medico";
		$r=mysqli_query(Conectar::con(),$s);
		$me=mysqli_fetch_array($r);
		if($me[0]<10){
			if($row=mysqli_fetch_array($res)){
				echo "<script type='text/javascript'>
			 	alert('El Medico con $u ya existe');
			 	window.location='./medicos.php'
			 	</script>";
				}
			else{ 
				$sql="insert into medico values ($i,'$n','$e')";
				$res=mysqli_query(Conectar::con(),$sql);
				echo "<script type='text/javascript'>
				alert('El Medico se inserto correctamente');
				window.location='./medicos.php'
			 	</script>";
			}
		}else{
				echo "<script type='text/javascript'>
			 	alert('No se puede registrar nuevos medicos');
			 	window.location='./medicos.php'
			 	</script>";
			}
	}

		public function insertarpac($i,$n,$d,$t){

			$sql="select * from paciente where id_p=$i";
			$res=mysqli_query(Conectar::con(),$sql);
			if($row=mysqli_fetch_array($res)){
				echo "<script type='text/javascript'>
				 alert('El Paciente $n ya existe');
				 window.location='./pacientes.php'
				 </script>";
				}
			else{ 
				$sql="insert into paciente values ($i,'$n','$d',$t,'null')";
				$res=mysqli_query(Conectar::con(),$sql);
				echo "<script type='text/javascript'>
				 alert('El Paciente se inserto correctamente');
				 window.location='./pacientes.php'
				 </script>";
				 }
			}
			public function insertarci($h,$m,$f,$t,$o,$e){
				//yyyy-mm-dd
				//dd-mm-yyyy
				$y= explode('-',$f);
				$fe=$y[0]."-".$y[1]."-".$y[2];
				$ti=$t.":00";
				$sql="select * from ingreso where hora='$ti'and fecha='$fe'";
				$res=mysqli_query(Conectar::con(),$sql);
				$s="SELECT COUNT(*) FROM ingreso WHERE id_m=$m";
				$r=mysqli_query(Conectar::con(),$s);
				$me=mysqli_fetch_array($r);
				if($me[0]<10){
					if($row=mysqli_fetch_array($res)){
						echo "<script type='text/javascript'>
						alert('Ya hay u una cita asignada el mismo dia y hora');
						window.location='./citas.php'
						</script>";
						}
					else{
						$sq="SELECT (ELT(WEEKDAY('$fe') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo')) AS DIA_SEMANA";
						$re=mysqli_query(Conectar::con(),$sq);
						$u=mysqli_fetch_array($re);
						if($u[0]=='Sabado'|| $u[0]=='Domingo'){
							echo "<script type='text/javascript'>
							alert('No se puede agendar cita el ".$u[0]."');
							window.location='./citas.php'
							</script>";
						
						} else{
							$sql="insert into ingreso values (NULL,$h,$m,'$fe','$o','$e','$ti')";
							$res=mysqli_query(Conectar::con(),$sql);
							echo "<script type='text/javascript'>
							alert('Se asigno Cita correctamente');
							window.location='./citas.php'
							</script>";
						}
						
						}
				}else{
					echo "<script type='text/javascript'>
						alert('El medico con identificacion $m ya tiene mas de 10 citas asignadas en el sistema');
						window.location='./citas.php'
						</script>";
				}

				}

				public function get_paciente_id($i){

					$sql="select * from paciente where id_p=$i";
					$res=mysqli_query(Conectar::con(),$sql);
					while($reg=mysqli_fetch_assoc($res)){
					$this->cursos[]=$reg;
				   }
					return $this->cursos;
				}
				public function get_cita_id($u){

					$sql="select * from ingreso where id_i=$u";
					$res=mysqli_query(Conectar::con(),$sql);
					while($reg=mysqli_fetch_assoc($res)){
					$this->cursos[]=$reg;
				   }
					return $this->cursos;
				}

				public function get_cita_p($i){
					$sql="SELECT paciente.id_p,paciente.nombre,medico.especialidad,paciente.tel,medico.nombreM,ingreso.fecha,ingreso.id_i,ingreso.hora,ingreso.obser,ingreso.estado FROM ingreso INNER JOIN paciente on paciente.nhistorial=ingreso.nhistorial INNER JOIN medico ON ingreso.id_m=medico.id_m where paciente.id_p=$i";
					$res=mysqli_query(Conectar::con(),$sql);
					while($reg=mysqli_fetch_assoc($res)){
					$this->cursos[]=$reg;
				   }
					return $this->cursos;
				}

}

?>