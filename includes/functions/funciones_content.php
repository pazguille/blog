<?php
require_once('includes/configuracion.php');
require_once('funciones.php');	
//Resultados de posts limitado a 2 para paginar - DATE_FORMAT( post_up, '%b %d' ) AS 
function listadoPosts($ini, $cat){
	if($cat != ""){
		$postCateg = "AND post_categ = ".$cat;
	}else{
		$postCateg = "";
	};

	$query_string = "SELECT post_id, 
							post_categ,
							post_title,
							DATE_FORMAT(post_up, '%Y') AS post_ano,
							DATE_FORMAT(post_up, '%m') AS post_mes,								
							DATE_FORMAT(post_up, '%d') AS post_dia,
							DATE_FORMAT(post_up, '%H') AS post_hora,
							DATE_FORMAT(post_up, '%i') AS post_min,							
							DATE_FORMAT(post_up, '%s') AS post_seg,
							post_intro, 
							post_img
					FROM posts
					WHERE post_enabled = 1 ".$postCateg."
					ORDER BY post_up DESC
					LIMIT ".$ini.", 10";
		
	$cnx = conectar();
	$aResultado= consulta_res($query_string, $cnx);
	desconectar($cnx);
	
	return $aResultado;
};


//Cuento la cantidad total de posts para el paginador
function contarResTot($cat){
	if($cat != ""){
		$postCateg = "AND post_categ = ".$cat;
	}else{
		$postCateg = "";
	};

	$query_string = "SELECT COUNT(post_id) AS cant_tot FROM posts WHERE post_enabled = 1 ".$postCateg;		
	$cnx = conectar();
	$aResultado = consulta_res($query_string, $cnx);
	desconectar($cnx);
	return $aResultado[0]['cant_tot'];
};

//Levanto el post que tengo que mostrar
function obtenPost($postUrl){
	
	$query_string = "SELECT post_id,
							post_url,
							post_categ,
							post_title,
							DATE_FORMAT(post_up, '%d') AS post_dia,
							DATE_FORMAT(post_up, '%m') AS post_mes,
							DATE_FORMAT(post_up, '%Y') AS post_ano,
							DATE_FORMAT(post_up, '%H') AS post_hora,
							DATE_FORMAT(post_up, '%i') AS post_min,							
							DATE_FORMAT(post_up, '%s') AS post_seg,							
							post_intro,
							post_body,
							post_tag,
							post_visits
					FROM posts
					WHERE post_url = '".$postUrl."' AND post_enabled = 1";
		
	$cnx = conectar();
	$aResultado= consulta_res($query_string, $cnx);
	desconectar($cnx);
	
	return $aResultado;
};

//Levanto la categ del post que tengo que mostrar
function obtenPostCateg($categId){
	
	$query_string = "SELECT *
					FROM categories
					WHERE categ_id = ".$categId." AND categ_enabled = 1";
		
	$cnx = conectar();
	$aResultado= consulta_res($query_string, $cnx);
	desconectar($cnx);
	
	return $aResultado;
};


//Guardo los comentarios
function guardarComent($com_post, $com_user, $com_date, $com_body){
	$string_com = "INSERT INTO comments (com_post, com_user, com_date, com_body)
					VALUES (".$com_post.", '".$com_user."', '".$com_date."', '".$com_body."')";
	//echo('RESU --> '.$com_post.' - '.$com_post.' - '.$com_user.' - '.$com_fecha.' - '.$com_body.' - '.$com_ip.' <-- FIN RESU');
	$cnx = conectar();
	consulta_bd($string_com, $cnx);
	desconectar($cnx);
};

//obtengo los comentarios de un post
function obtenCom($postId){
	
	$query_string = "SELECT *
					FROM comments
					WHERE com_post = ".$postId." AND com_enabled = 1";
		
	$cnx = conectar();
	$aResultado= consulta_res($query_string, $cnx);
	desconectar($cnx);
	
	return $aResultado;
};


//Cuento la cantidad total de comentarios
function contarComentTot($postId){
	$query_string = "SELECT COUNT(com_id) AS cant_tot FROM comments WHERE com_post = ".$postId." AND com_enabled = 1";		
	$cnx = conectar();
	$aResultado = consulta_res($query_string, $cnx);
	desconectar($cnx);
	return $aResultado[0]['cant_tot'];
};


function twittear(){
	$message = generarTweet();
	$url = "http://twitter.com/statuses/update.xml?";
	$username = 'spaghettibg';
	$password = '123qwe';
	$params = "status=". rawurlencode($message);
	$result = file_get_contents($url.$params , false, stream_context_create(array("http" => array("method" => "POST","header" => "Authorization: Basic ". base64_encode($username. ":". $password)))));
};


function generarTweet(){
	// Ultimo post
	$query_string = "SELECT posts.post_categ, categorias.categ_name, posts.post_title, posts.post_id, posts.post_title FROM posts INNER JOIN categorias ON categorias.categ_id = posts.post_categ WHERE posts.post_enabled = 1 ORDER BY posts.post_id DESC LIMIT 1";
	$aEntry = Consultar($query_string);
	
	$url = 'http://www.spaghettiblog.com.ar/post.php?c='.$aEntry[0]['post_categ'].'&cref='.urlAmigable($aEntry[0]['categ_name']).'&pid='.$aEntry[0]['post_id'].'&ref='.urlAmigable($aEntry[0]['post_title']);
	// http://www.barneyblack.com/post.php?c=3&cref=videos&pid=6&ref=shii-la-nueva-consola-para-mujeres
	
	$tweet = $aEntry[0]['post_title'].' '.generarTinyUrl($url);
	return $tweet;
};


function generarTinyUrl($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL,'http://tinyurl.com/api-create.php?url='.$url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
};

//Publiar
function insertPost($post_categ, $post_url, $post_img, $post_title, $post_intro, $post_body, $post_up, $post_tag){
	
	$query_string = "INSERT INTO posts(post_categ, post_url, post_img, post_title, post_intro, post_body, post_up, post_tag)
					VALUES (
						".$post_categ.",
						'".$post_url."',
						'".$post_img."',
						'".$post_title."',
						'".$post_intro."',
						'".$post_body."',
						'".$post_up."',
						'".$post_tag."'
					)";

		
	$cnx = conectar();
	consulta_bd($query_string, $cnx);
	desconectar($cnx);
};

?>