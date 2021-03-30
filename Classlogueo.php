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
 private $users;
 public function __construct(){

 	$this->users=array();
 }

public function ver_users(){

	$sql="select * from users";
	$res=mysqli_query(Conectar::con(),$sql);
	while($row=mysqli_fetch_assoc($res)){
		$this->users[]=$row;
	}
	return $this->users;
 }

 public function insertar($u,$p,$c){

	$sql="select * from users where user='$u'";
	$res=mysqli_query(Conectar::con(),$sql);
	if($row=mysqli_fetch_array($res)){
		echo "<script type='text/javascript'>
         alert('El empleado con $u ya existe');
         window.location='Create.php'
         </script>";
        }
    else{ 
        $sql="insert into users values ('$u','$c','$p','Invitado','user.png')";
	    $res=mysqli_query(Conectar::con(),$sql);
		echo "<script type='text/javascript'>
         alert('El Usuario se inserto correctamente');
         window.location='index.php'
         </script>";
     	}
	}

	public function CambiarPass($p,$c){
		$sql="select * from users where correo='$c'";
		$res=mysqli_query(Conectar::con(),$sql);
		if($row=mysqli_fetch_array($res)){
			$sql="Update users Set pass = '$p' Where correo='$c'";
			$res=mysqli_query(Conectar::con(),$sql);
			echo "<script type='text/javascript'>
        	alert('Su contraseña se ha cambiado correctamente');
        	window.location='index.php'
			 </script>";
			}
		else{
			 echo "<script type='text/javascript'>
			 alert('se ha producido un error o datos incorrectos vuelva a intentarlo');
			 window.location='recuperar.php'
			 </script>";
		}
	}

}

?>