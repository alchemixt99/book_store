<?php
include_once("books.php");
include_once("messages.php");
include_once("funciones.php");

session_start();

if(isset($_POST["opt"])){
	$bk = new books();
	$response = new StdClass;
	$mes = new messages();
	$fun = new funciones();


	switch ($_POST["opt"]) {
		case 'add':
			$title=$_POST["title"];
			$isbn=$_POST["isbn"];
			$autor=$_POST["autor"];
			$genre=$_POST["genre"];
			$release=$_POST["release"];
			$res = $bk->add($title,$isbn,$autor,$genre,$release);
			if($res){
				$response->res = true;
				$response->mes = $mes->get_msg("e004");
			}else{
				$response->res = false;
				$response->mes = $mes->get_msg("e003");
			}
		break;
		case 'list':
			$res = $bk->display_list();
			if($res){
				$response->res = true;
				$response->mes = $res;
			}else{
				$response->res = false;
				$response->mes = $mes->get_msg("e005");
			}
		break;
		case 'delete':
			$id = $_POST['id'];
			$res = $bk->del_item($id);
			if($res){
				$response->res = true;
				$response->mes = $mes->get_msg("e006");
			}else{
				$response->res = false;
				$response->mes = $mes->get_msg("e007");
			}
		break;
		case 'get_bookdata':
			$id = $_POST['id'];
			$res = $bk->get_item($id);
			if($res){
				$response->res = true;
				$response->id_book = $res[0]["tb_id"];
				$response->t = $res[0]["tb_title"];
				$response->i = $res[0]["tb_isbn"];
				$response->a = $res[0]["tb_autor"];
				$response->g = $res[0]["tb_gender"];
				$response->r = $res[0]["tb_released"];
				$response->mes = null;
			}else{
				$response->res = false;
				$response->mes = $mes->get_msg("e008");
			}
		break;
		case 'edit':
			$title=$_POST["title"];
			$isbn=$_POST["isbn"];
			$autor=$_POST["autor"];
			$genre=$_POST["genre"];
			$release=$_POST["release"];
			$id = $_POST["id_book"];

			$res = $bk->edit_item($title,$isbn,$autor,$genre,$release,$id);
			
			if($res){
				$response->res = true;
				$response->mes = $mes->get_msg("e004");
			}else{
				$response->res = false;
				$response->mes = $mes->get_msg("e003");
			}
		break;
	}
	echo json_encode($response);
}
else{

}
?>