<?php
require_once('includes/configuracion.php');
require_once('includes/functions/funciones.php');	

//Menu
function obtenCategs(){
	
	$query_string = "SELECT *
					FROM categories
					WHERE categ_enabled = 1";
		
	$cnx = conectar();
	$aResultado= consulta_res($query_string, $cnx);
	desconectar($cnx);
	
	return $aResultado;
};

//Search
?>