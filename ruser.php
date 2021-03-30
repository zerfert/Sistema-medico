<?php
include('./Classlogueo.php');
$t = new Trabajo();
$t->insertar($_REQUEST['u'],$_REQUEST['p'],$_REQUEST['c']);
?>