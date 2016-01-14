<?php
session_start();
session_unset(); //borro todas las variables de session 
session_destroy();//destruyo la sesion 

include("funciones.php");
$fn = new funciones;

$response = new StdClass;
$response->res = true;
$response->mes = $fn->path("login");
echo json_encode($response);
?> 