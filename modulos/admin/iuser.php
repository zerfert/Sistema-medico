<?php
include('../class.php');
$t = new Trabajo();
$t->insertar($_REQUEST['u'],$_REQUEST['p'],$_REQUEST['c'],$_REQUEST['Tipo']);
?>