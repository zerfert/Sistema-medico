<?php
function conectar(){
$host="localhost";
$user="root";
$pass="";
$dbname="clinica";

$link=mysqli_connect($host,$user,$pass) or die ("ERROR al establecer la conexion".mysqli_error());

mysqli_select_db($link,$dbname) or die ("ERROR al seleccionar la BD".mysqli_error());
return $link;
}
?>