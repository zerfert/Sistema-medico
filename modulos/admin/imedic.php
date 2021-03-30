<?php
include('../class.php');
$t = new Trabajo();
$t->insertarm($_REQUEST['i'],$_REQUEST['n'],$_REQUEST['e']);
?>