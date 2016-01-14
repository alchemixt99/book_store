<?php
session_start();

include("../class/funciones.php");

$fun = new funciones();
$fun->check_session();
?>