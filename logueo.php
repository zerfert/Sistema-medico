<?php
session_start();
include("./conexion.inc.php");
$link=conectar();
$u=$_REQUEST['u'];
$p=$_REQUEST['p'];
$sql1="select permissions from users where user='$u' and pass='$p'";
$re=mysqli_query($link,$sql1);
//comprobar si los datos son correctos
$sql="select * from users where user='$u' and pass='$p'";
$res=mysqli_query($link,$sql);
if($row=mysqli_fetch_array($res)){
    //creamos la sesion
    $_SESSION["user"]=$u;
    $up=mysqli_fetch_array($re);
     if( $up[0] == 'admin'){
        echo "<script type='text/javascript'>
        alert('Bienvenido(a) ".$_SESSION['user']." al sistema');
        window.location='./modulos/admin/contenido.php';
        </script>";
     }else{
        echo "<script type='text/javascript'>
        alert('Bienvenido(a) ".$_SESSION['user']." al sistema');
        window.location='./modulos/invitado/contenido.php';
        </script>";
     }

} 
 else{
     echo "<script type='text/javascript'>
     alert('El usuario o la contraseña no coinciden');
     window.location='Index.php';
     </script>";

}
?>