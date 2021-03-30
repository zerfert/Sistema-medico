<?php
include("../class.php");
print_r($_GET);
$tra = new Trabajo();
$tra->eli_ci($_GET["u"]);

?>