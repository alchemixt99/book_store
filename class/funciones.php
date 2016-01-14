<?php
include_once("../bd/db.php");

class funciones{
	/* Función para Enviar Email*/
	function enviar_email($para, $titulo, $mensaje) {
		$cabeceras = 'Content-type: text/html; charset=UTF-8'. "\r\n" .
		'From: $correo' . "\r\n" .
		'Reply-To: $correo' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();
		return mail($para, $titulo, $mensaje, $cabeceras);
	}

	function isAjax()
	{
	    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
	    {return true;}
	    else
	    {return false;}
	}	

	function existe($tbl,$field,$var, $and=""){
		$con = new con();
		$con->connect();
		//preguntamos si existe la finca en la matriz entregada
		$selectSQL ="SELECT * FROM tbl_".$tbl." WHERE `$field` = '$var' ".$and.";";		
		//echo $selectSQL;
		$row_cons = mysql_query($selectSQL);
		if(mysql_num_rows($row_cons)>0){$respuesta=true;}else{$respuesta=false;}
		
		/*Termina Consulta*/
		return $respuesta;
	}
	function get_id($id,$tbl,$field,$var, $and=""){
		$con = new con();
		$con->connect();
		//traemos id
		$selectSQL ="SELECT ".$id." FROM tbl_".$tbl." WHERE `$field` = '$var' ".$and.";";
		//echo $selectSQL;
		$res_cons = mysql_query($selectSQL);
		while($row_cons = mysql_fetch_array($res_cons)){
			if($res_cons){
				$respuesta=$row_cons[0];
			}else{
				$respuesta=false;
			}
		}
		
		/*Termina Consulta*/
		return $respuesta;
	}
	function get_custom($qry, $and=""){
		$con = new con();
		$con->connect();
		//traemos consulta
		$selectSQL =$qry;
		//echo $selectSQL;
		$res_cons = mysql_query($selectSQL);
		while($row_cons = mysql_fetch_array($res_cons)){
			if($res_cons){
				$respuesta=$row_cons[0];
			}else{
				$respuesta=false;
			}
		}
		
		/*Termina Consulta*/
		return $respuesta;
	}
	function get_array($qry, $and=""){
		$con = new con();
		$con->connect();
		$respuesta = array();
		//traemos consulta
		$selectSQL =$qry;
		//echo $selectSQL;
		$res_cons = mysql_query($selectSQL);
		if($res_cons){
			while($row_cons = mysql_fetch_assoc($res_cons)){
				array_push($respuesta, $row_cons);
			}
		}else{
			$respuesta=false;
		}
		
		
		/*Termina Consulta*/
		return $respuesta;
	}
	function actualizar($tbl,$cambios,$where="1"){
		$con = new con();
		$con->connect();
		//preguntamos si existe la finca en la matriz entregada
		$selectSQL ="UPDATE tbl_".$tbl." SET ".$cambios." WHERE ".$where.";";
		//echo $selectSQL;
		$res_upd = mysql_query($selectSQL);
		if($res_upd){$respuesta=true;}else{$respuesta=false;}
		
		/*Termina Consulta*/
		return $respuesta;
	}
	function borrar($tbl,$field,$var,$and=""){
		$campos="";
		switch ($tbl) {
			case 'books': $campos= "tb_estate=99"; break;
		}
		$con = new con();
		$con->connect();
		//preguntamos si existe la finca en la matriz entregada
		$selectSQL ="UPDATE tbl_".$tbl." SET ".$campos." WHERE ".$field." = '".$var."' ".$and.";";
		//echo $selectSQL;
		$res_del = mysql_query($selectSQL);
		if($res_del){$respuesta=true;}else{$respuesta=false;}
		
		/*Termina Consulta*/
		return $respuesta;
	}
	function activar($tbl,$field,$var,$and=""){
		$campos="";
		switch ($tbl) {
			case 'books': $campos= "tb_estate=1"; break;
		}
		$con = new con();
		$con->connect();
		//preguntamos si existe la finca en la matriz entregada
		$selectSQL ="UPDATE tbl_".$tbl." SET ".$campos." WHERE ".$field." = '".$var."' ".$and.";";		
		$res_cons = mysql_query($selectSQL);
		if($res_cons){$respuesta=true;}else{$respuesta=false;}
		
		/*Termina Consulta*/
		return $respuesta;
	}
	function crear($tbl,$fields,$values){
		$con = new con();
		$con->connect();
		//preguntamos si existe la finca en la matriz entregada
		$selectSQL ="INSERT INTO tbl_".$tbl." (".$fields.") VALUES (".$values.");";
		//echo $selectSQL;
		$res_cons = mysql_query($selectSQL);
		if($res_cons){$respuesta=true;}else{$respuesta=false;}
		
		/*Termina Consulta*/
		return $respuesta;
	}
	function print_array($a){
		echo "<pre>";
		print_r($a);
		echo "<pre>";
	}

	function create_file($content, $filename){
		$ruta = "../informes/";
		$file=fopen($ruta.$filename,"a") or die("Problemas");
		fputs($file,$content);
		fclose($file);
	}

	/*====== Rutas ===========*/
	function path($e){
		$rt = [
			"login"=>"../pages/login.html",
			"panel"=>"../pages/panel.html"
		];
		return $rt[$e];
	}
	/*====== Redireccionar ===========*/
	function routing($p){
		header('location: '.$p);
	}

	function check_session(){
		if(isset($_SESSION["ses_id"]))
		{
			$s_id=$_SESSION["ses_id"];
			$this->routing($this->path("panel"));
		}
		else{
			$this->routing($this->path("login"));
		}
	}
}
?>