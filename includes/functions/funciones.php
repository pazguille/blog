<?php
function conectar(){
	$configbd = $GLOBALS['basedatos'];
	$cnx = mysql_connect($configbd['host'], $configbd['user'], $configbd['pass']);
	mysql_select_db($configbd['bd'], $cnx);
	mysql_query("SET NAMES 'utf8'");
	return $cnx;
};

function desconectar($c){
	mysql_close($c);
};

function consulta_bd($query_string, $cnx){
	/*if($GLOBALS['configbd']['debug']){
		echo($query_string);
	};*/
	return mysql_query($query_string, $cnx);
};

function consulta_res($query_string, $cnx){
	/*if($GLOBALS[$configbd['debug']]){
		echo($query_string);
	};*/
	$respuesta = consulta_bd($query_string, $cnx);
	$aResultados = array();
	while($res = mysql_fetch_assoc($respuesta)){
		$aResultados[] = $res;
	};
	mysql_free_result($respuesta);
	return $aResultados;
};

/*function seteado($valor){
	if(isset($valor)){
		return $valor;
	};
};*/

function printJSON($aDatos){
	$jDatos = array();
	for($i=0; $i<count($aDatos); $i++){
		$jDatos[$i] = $aDatos[$i];
	};
	return json_encode($jDatos);
};

function noGet(){
	if(!isset($_GET)){
		//header("Location: index.php");
		header("Location: buscar.php?q=memorable");
	};
};


//Tranformo en un array comun lo queme da la base de datos
function aray($aDatos){
    for($i=0; $i<count($aDatos); $i++){
		foreach ($aDatos[$i] as $llave => $fila) {
	       $str[$i] = $aDatos[$i][$llave];
	    };
	};
	return $str;
};

//header('Content-Type: text/xml; charset=ISO-8859-1');

function printOptions($table,$valor){
	$aPrint = QuerySelect($table);
	for($i=0; $i < count($aPrint); $i++){
		$strPrint = $strPrint."<option id='".$i."'value='".($i+1)."'>".$aPrint[$i][$valor]."</option>";
		
	};
	return ($strPrint);
};

function QuerySelect($tabla){
	$cnx = conectar();
	$string_select = "SELECT *
					FROM ".$tabla;
	$aSelect = consulta_res($string_select, $cnx);
	desconectar($cnx);
	return ($aSelect);
};

function utf8($aDatos){
	for($i=0; $i<count($aDatos); $i++){
		foreach ($aDatos[$i] as $llave => $fila) {
	      $aDatos[$i][$llave] = utf8_decode($aDatos[$i][$llave]);
	    };
	};
	return $aDatos;
};

function Denu($id){
	$cnx = conectar();
	$string_QDenu = "SELECT denu_valor AS denu FROM denuncias
					WHERE denu_id IN (
					SELECT postdenu_denu FROM rel_postdenu WHERE postdenu_ficha = ".$id.")";
	$aDenu = consulta_res($string_QDenu, $cnx);
	desconectar($cnx);
	
	return $aDenu;
};

function wasaDecoder($campo){
	$campo = str_replace('[b]', '<b>', $campo);
	$campo = str_replace('[/b]', '</b>', $campo);
	$campo = str_replace('[i]', '<i>', $campo);
	$campo = str_replace('[/i]', '</i>', $campo);
	$campo = str_replace('[t]', '<span class="titBody">', $campo);
	$campo = str_replace('[/t]', '</span>', $campo);
	$campo = str_replace('[[Imagen:', '<img src="', $campo);
	$campo = str_replace('||', '" /><span class="pieFoto">', $campo);
	$campo = str_replace(']]', '</span>', $campo);
	$campo = str_replace('{{Link:', '<a href="', $campo);
	$campo = str_replace('|', '" class="miniLink">', $campo);
	$campo = str_replace('}}', '</a>', $campo);
	return nl2br($campo);
};

/*function wasaDecoder($campo){
	$aWasatexto = array('[b]', '[/b]', '[i]', '[/i]', '[t]', '[/t]', '[[Imagen:', '||', ']]', '{{Link:', '|', '}}');
	$aHTML = array('<b>', '</b>', '<i>', '</i>', '<span class="titBody">', '</span>', '<img src="', '" /><span class="pieFoto">', '</span>', '<a href="', '">', '</a>');
	
	for($i=0; $i<count(aWasatexto); $i++){
		$campo = str_replace($aWasatexto[$i], $aHTML[$i], $campo);
	};
	
	echo(nl2br($campo));
};*/

function Abreviar($campo, $maximo){
	if(strlen($campo)>$maximo){
		return substr($campo, 0, $maximo).'...';
	}else{
		return $campo;
	};
};

function noImagen($campo){
	if($campo){
		echo($campo);
	}else{
		echo('images/item140x105.gif');
	};
};


function urlFriendly($url){

	// Tranformamos todo a minusculas
	
	$url = strtolower($url);
	
	//Rememplazamos caracteres especiales latinos
	
	$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
	
	$repl = array('a', 'e', 'i', 'o', 'u', 'n');
	
	$url = str_replace ($find, $repl, $url);
	
	// Añadimos los guiones
	
	$find = array(' ', '&', '\r\n', '\n', '+'); 
	$url = str_replace ($find, '-', $url);
	
	// Eliminamos y Reemplazamos demás caracteres especiales
	
	$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
	
	$repl = array('', '-', '');
	
	$url = preg_replace ($find, $repl, $url);
	
	return $url;
}

//Levanto las categorias por Url Friendly
function obtenCateg($categUrl){
	
	$query_string = "SELECT *
					FROM categories
					WHERE categ_url = '".$categUrl."' AND categ_enabled = 1";
		
	$cnx = conectar();
	$aResultado= consulta_res($query_string, $cnx);
	desconectar($cnx);
	
	return $aResultado;
};


function obtenerFechaHora(){
	return date("Y")."-".date("m")."-".date("d")." ".date("H").":".date("i").":".date("s"); // 2009-05-30 12:32:57
};

function obtenerMesByNum($num_mes){
	$aMeses = array('Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic');
	return $aMeses[$num_mes-1];
};

?>
