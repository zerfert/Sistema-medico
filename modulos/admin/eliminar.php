<?php
include("../class.php");
print_r($_GET);
$tra = new Trabajo();
$tra->eli_user($_GET["u"]);

?>