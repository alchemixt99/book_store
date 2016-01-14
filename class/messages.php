<?php
/*Control de mensajes de error en el sistema*/
class messages{
	function get_msg($e,$v=null){
		/* ====================== */
		$msg = [
			"e001" => "001 - Bienvenido al gestor de libros",
			"e002" => "002 - Incorrect username or password",
			"e003" => "003 - There are some issues saving the data, please try again.",
			"e003-1" => "003.1 - Error: ".$v.".",
			"e004" => "004 - The item was added correctly.",
			"e004-1" => "004.1 - Registrado con éxito.".$v,
			"e005" => "005 - There are issues displaying the items, please contact with support service.",
			"e006" => "006 - The item was removed correctly.",
			"e007" => "007 - There are issues removing the item, please contact with support service.",
			"e007" => "007 - There are issues requesting the item, please contact with support service."
		];
		/* ====================== */
		return $msg[$e];
	}
	function console_log ($str){
		$js = '
		<script type="text/javascript">console.log("'.$str.'");</script>
		';
		return $js;
	}
}


?>