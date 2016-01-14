<?php
session_start();
require("funciones.php");
require("messages.php");	

function login(){
	$msg = new messages();

	$fun = new funciones();
	if(!$fun->isAjax()){header ("Location: login.php");}

	$con = new con();
	$con->connect();

	$response = new StdClass;

	$usu = $_POST['usr'];
	$pass = $_POST['psw'];
	$pass = sha1(md5($pass));

	/*Consulta a la Bd*/
	$selectSQL ="SELECT * FROM `tbl_users` WHERE `us_usuario` = '$usu' AND `us_clave` = '$pass' AND us_estado = 1";
	$row_cons = mysql_query($selectSQL);
	$existe = mysql_fetch_assoc($row_cons);
	/*Termina Consulta*/

	/*Existe*/
	//$existe = 1;
	if($existe){
		$res = true;
		$mes = "panel.html";
		
		$_SESSION["ses_id"] = $existe['us_id'];
		
		//$menu = 1;
	}else{
		$res = false;
		$mes = $msg->get_msg("e002");
	}

	$response->res = $res;
	$response->mes = $mes;
	echo json_encode($response);

	$con->disconnect();
}


switch ($_POST["opt"]) {
	case 'login':
		login();		
	break;
}
