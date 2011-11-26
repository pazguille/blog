<?php
require_once('includes/functions/funciones_content.php');
header('Content-type: text/html; charset=utf-8');

if(isset($_POST['post_categ'])){
	$post_categ = $_POST['post_categ'];
	$post_url = urlFriendly($_POST['post_title']);
	$post_img = "http://www.spaghettiblog.com.ar/img/post/".$_POST['post_img'];
	$post_title = $_POST['post_title'];
	$post_intro = $_POST['post_intro'];
	$post_body = $_POST['post_body'];
	$post_up = obtenerFechaHora();
	$post_tag = $_POST['post_tag'];
	
	insertPost($post_categ, $post_url, $post_img, $post_title, $post_intro, $post_body, $post_up, $post_tag);
}
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="es-ES" />
        <base href="http://www.spaghettiblog.com.ar/" />        
        <title>Publicar - Spaghetti Blog</title>
		<!-- <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />-->
        <link href="css/css.php?q=reset,styles" rel="stylesheet" type="text/css" media="screen" />
    </head>

    <body>
    	
		<?php include_once("includes/sections/header.php"); ?>
		
		<div id="contentWrap">
		        
			<div id="content">		
				<form method="post" action="publish.php">
					<h4><label for="post_categ">Categor&iacute;a:</label></h4>
				    <select name="post_categ">
				    	<option value="-1">Seleccionar...</option>
				        <option value="1">Artículos</option>
				        <option value="2">Noticias</option>
				    </select>
				    				    
				    <h4><label for="post_title">T&iacute;tulo:</label></h4>
				    <input type="text" id="p_title" name="post_title" size="100" />
				    
				    <h4><label for="post_intro">Introducci&oacute;n:</label></h4>
				    <noscript>
				    	<p>Para aplicar formato al texto se requiere tener Javascript activado en el navegador.</p>
				    </noscript>
					<textarea id="post_intro" name="post_intro"></textarea>
				    
				    <h4><label for="post_img">Imagen(url por ahora):</label></h4>
				    <input type="text" id="post_img" name="post_img" size="100"  />
				    
				    <h4><label for="post_body">Cuerpo:</label></h4>					
					<textarea id="post_body" name="post_body"></textarea>
					
					<h4><label for="post_tag">Tags:</label></h4>					
					<input type="text" id="post_tag" name="post_tag"/>			    
				    <p>
				        <input type="submit" name="btn_accion" value="Publicar" class="btn_submit" />
				    </p>
				</form>
			</div>					            
		</div>

		<?php include_once("includes/sections/footer.php"); ?>
        </body>
    
</html>
