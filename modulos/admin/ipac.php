<?php
include('../class.php');
$t = new Trabajo();
$t->insertarpac($_REQUEST['i'],$_REQUEST['n'],$_REQUEST['d'],$_REQUEST['t']);
?>