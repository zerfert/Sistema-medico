<?php
include("../class.php");
print_r($_GET);
$tra = new Trabajo();
$tra->edi_user($_GET["u"]);

?>