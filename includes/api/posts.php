<?php
require_once('../configuracion.php');
require_once('../functions/funciones.php');

/*//get the last-modified-date of this very file
$lastModified=filemtime('posts.php');

//get the HTTP_IF_MODIFIED_SINCE header if set
$ifModifiedSince = (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) ? $_SERVER['HTTP_IF_MODIFIED_SINCE'] : false);

//check if page has changed. If not, send 304 and exit
if (@strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE'])==$lastModified){
	header("HTTP/1.1 304 Not Modified");
    exit;
}else{
	//set last-modified header
	header("Last-Modified: ".gmdate("D, d M Y H:i:s", $lastModified)." GMT");
	header('Cache-Control: public');
}	*/
	if(isset($_GET['callback'])){ 
		header('Content-type:application/javascript; charset=utf-8' );
	}else{
		header('Content-type:application/json; charset=utf-8');
	};
	
	function posts($categ){
		if($categ != ""){
			$postCateg = "AND post_categ = ".$categ;
		}else{
			$postCateg = "";
		};
		
		$query_string = "SELECT post_id AS id,
								post_url AS url, 
								post_categ AS category,
								post_title AS title,
								DATE_FORMAT(post_up, '%d/%m/%Y %H:%i:%s') AS dateCreated,
								post_intro AS intro, 
								post_img AS img,
								post_body AS body
						FROM posts
						WHERE post_enabled = 1 ".$postCateg."
						ORDER BY post_up DESC";
			
		$cnx = conectar();
		$aResultado= consulta_res($query_string, $cnx);
		desconectar($cnx);	
		return $aResultado;
	};
	
	function obtenPostCateg($categId){
		
		$query_string = "SELECT *
						FROM categories
						WHERE categ_id = ".$categId." AND categ_enabled = 1";
			
		$cnx = conectar();
		$aResultado= consulta_res($query_string, $cnx);
		desconectar($cnx);
	
		return $aResultado;
	};
	
	$categ = $_GET['categ'];
	$postsList = posts($categ);
	
	for($i=0; $i<count($postsList); $i++){
		$categ = obtenPostCateg($postsList[$i]['category']); 
		$postsList[$i]['category'] = $categ[0]['categ_name'];
		$postsList[$i]['url'] = 'http://www.spaghettiblog.com.ar/'.strtolower($categ[0]['categ_url']).'/'.$postsList[$i]['url'];
	};
	
	
	$posts = array(    
		"lastModifiend" => date("d.m.Y H:i:s",time()),
	    "posts" => $postsList
	);
	
	if(isset($_GET['callback'])){ 
		echo($_GET['callback'].'('.json_encode($posts).')');
	}else{
		echo(json_encode($posts));	
	};
?>