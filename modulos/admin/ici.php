<?php
include('../class.php');
$t = new Trabajo();
$t->insertarci($_REQUEST['h'],$_REQUEST['m'],$_REQUEST['f'],$_REQUEST['t'],$_REQUEST['o'],$_REQUEST['e']);
?>