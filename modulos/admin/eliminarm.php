<?php
include("../class.php");
print_r($_GET);
$tra = new Trabajo();
$tra->eli_medic($_GET["i"]);

?>