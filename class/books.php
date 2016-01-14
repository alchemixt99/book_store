<?php
include_once("funciones.php");

class books{
	//función encargada de guardar libros
	function add($title,$isbn,$autor,$genre,$release){
		$fun = new funciones();
		$fields = "tb_isbn, tb_title, tb_autor, tb_gender, tb_released, tb_estate";
		$values = "'".$isbn."', '".$title."', '".$autor."', '".$genre."', '".$release."', 1";
		return $fun->crear("books",$fields,$values);
	}
	//función encargada de modificar un registro de un libro
	function edit_item($title,$isbn,$autor,$genre,$release,$id){
		$fun = new funciones();
		$tbl = 'books';
		$cambios = "tb_isbn='".$isbn."', tb_title='".$title."', tb_autor='".$autor."', tb_gender='".$genre."', tb_released='".$release."'";
		$where = 'tb_id = '.$id;

		return $fun->actualizar($tbl,$cambios,$where);
	}

	//función encargada de listar libros
	function display_list(){
		$fun = new funciones();
		$qry = 'SELECT * FROM tbl_books WHERE tb_estate = 1';
		$dataset = $fun->get_array($qry);
		$html = '';

		for ($i=0; $i < sizeof($dataset); $i++) { 
			$btn_edit = 'edit_book('.$dataset[$i]["tb_id"].', this)';
			$btn_supr = 'delete_book('.$dataset[$i]["tb_id"].', this)';
			$html .= '
			<tr>
				<td>'.$dataset[$i]["tb_isbn"].'</td>
                <td>'.$dataset[$i]["tb_title"].'</td>
                <td>'.$dataset[$i]["tb_autor"].'</td>
                <td>'.$dataset[$i]["tb_gender"].'</td>
                <td>'.$dataset[$i]["tb_released"].'</td>
                <td>
                    <a class="btn btn-primary" onClick="'.$btn_edit.'"><i class="fa fa-pencil-square-o"></i></a>
                    <a class="btn btn-danger" onClick="'.$btn_supr.'"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
			';
		}

		return $html;
	}
	//función encargada de traer los datos de un solo registro
	function get_item($id){
		$fun = new funciones();
		$qry = 'SELECT * FROM tbl_books WHERE tb_id = '.$id.' AND tb_estate = 1';
		return $fun->get_array($qry);
	}

	//funcion encargada de eliminar el item seleccionado
	function del_item($id){
		$fun = new funciones();
		$tbl='books';
		$field = 'tb_id';
		$var = $id;

		return $fun->borrar($tbl,$field,$var); 
	}

}
?>