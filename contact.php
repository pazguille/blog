<?php
require_once('includes/functions/funciones_content.php');

/*Comentar */
session_start();

if(isset($_POST['submit'])) {
	
	if(!empty($_POST['name']) && !empty($_POST['message']) && !empty($_POST['code'])) {
	
		if($_POST['code'] == $_SESSION['rand_code']) {
		
			//funcion con el insert
			
			//mensaje de ok
			$accept = "Thank you for contacting me.";

		
		} else {
			//mensaje de error		
			$error = "Please verify that you typed in the correct code.";
		
		}
		
	} else {
		//mensaje de error	
		$error = "Please fill out the entire form.";
	
	}

}


// Levanto el url friendly del post y ejecuto la query para tomar los datos
$aPost = obtenPost($_GET['postFriend']);
$categPost = obtenPostCateg($aPost[0]['post_categ']);
$categPostFriend = $_GET['categFriend'];

$categPath = '<small><a href="/">P&aacute;gina principal</a> > <a href="/categoria/'.$categPostFriend.'">'.$categPost[0]['categ_name'].'</a> > '.$aPost[0]['post_title'].'</small>';


?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <meta name="language" content="es-ES" />
        <meta name="copyright" content="2010 SpaghettiBlog.com.ar">
        <meta name="author" content="SpaghettiBlog.com.ar">
        <meta name="robots" content="all" />
        <meta name="Revisit-after" content="1 Day">      
        <meta name="description" content="<?php echo($aPost[0]['post_title']); ?>, en Spaghetti Blog. Spaghetti Blog, Noticias, Articulos, Trucos, Tips, Webmasters, css, html, diseño Web, diseño, desarrollo, Programacion, Tecnologia, Codigo, Juegos, Hacks, Navegadores, Browser, Tutoriales">
        <meta name="keywords" content="<?php
        	$keys = explode('-', $aPost[0]['post_url']);
			echo(strtolower(implode(', ', $keys)));
		?>, spaghetti blog, noticias, articulos, trucos, tips, webmasters, css, html, diseño Web, diseño, desarrollo, programacion, tecnologia, codigo, juegos, hacks, navegadores, browser, tutoriales">
		<base href="http://www.spaghettiblog.com.ar/" />
		<title><?php echo($aPost[0]['post_title']); ?> - Spaghetti Blog</title>
		<!-- <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />-->
		<link href="css/styles.css" rel="stylesheet" type="text/css" media="screen" />
    </head>
    
    <body>
    
		<?php include_once("includes/sections/header.php"); ?>
		
		
		<div id="contentWrap">
		        
			<div id="content">
								
				<div id="postsContent">		
					<p id="path"><?php echo($categPath)?></p>
					
					<div id="postView">
						<h1 class="titlePost">
							<a href="/<?php echo($categPostFriend) ?>/<?php echo(($aPost[0]['post_title']))?>"><?php echo($aPost[0]['post_title']) ?></a>
						</h1>
						<p class="fechaPost"><small><?php echo($aPost[0]['post_up']) ?></small></p>					
						<?php echo($aPost[0]['post_body']) ?>
					</div>
					
					<div id="comentariosVista">
						<h2 class="tituloSecciones">Comentarios (3)</h2>
						<ol id="comentariosLista">
							<li>
								<dl>
									<dt>Ward O <small class="comentarioFehca">(April 10th, 2010 4:31 am)</small></dt>
									<dd>Interesting thoughts in this article. Like the idea of web-enhanced devices, I like it, but the has to be functional only, otherwise it is only annoying. nteresting thoughts in this article. Like the idea of web enhanced devices, I like it, but the enhancement has to be functional only, otherwise it is.</dd>
								</dl>
							</li>
							
							<li>
								<dl>
									<dt>Ward O <small class="comentarioFehca">(April 10th, 2010 4:31 am)</small></dt>
									<dd>Interesting thoughts in this article. Like the idea of web-enhanced devices, I like it, but the has to be functional only, otherwise it is only annoying. nteresting thoughts in this article. Like the idea of web enhanced devices, I like it, but the enhancement has to be functional only, otherwise it is.</dd>
								</dl>
							</li>
							
							<li>
								<dl>
									<dt>Ward O <small class="comentarioFehca">(April 10th, 2010 4:31 am)</small></dt>
									<dd>Interesting thoughts in this article. Like the idea of web-enhanced devices, I like it, but the has to be functional only, otherwise it is only annoying. nteresting thoughts in this article. Like the idea of web enhanced devices, I like it, but the enhancement has to be functional only, otherwise it is.</dd>
								</dl>
							</li>
						</ol>
						
					</div>
					
					
					<div id="comentarForm">
						<h2 class="tituloSecciones">Deja tu comentario...</h2>
						<?php if(!empty($error)) echo '<div class="error">'.$error.'</div>'; ?>
						<?php if(!empty($accept)) echo '<div class="accept">'.$accept.'</div>'; ?>
						<form id="comentar" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
							
							<p><label for="name" class="labelText"><span class="obligatorio" >*</span> Nombre:</label><input id="name" type="text" name="name" class="inputText" /></p>
							
							<p><label for="message" class="labelText"><span class="obligatorio" >*</span> Mensaje:</label><textarea id="message" name="message" class="inputText" ></textarea></p>
							
							<div id="captcha">
								<p><label for="code" class="labelText"><span class="obligatorio">*</span> Ingresa el texto de la imagen:</label></p>
								<p><img src="/captcha.php"><input type="text" id="code" name="code" class="inputText"></p>
							</div>
						    
						    <p id="enviarComentBox"><input type="submit" name="submit" value="Enviar comentario" id="enviarComent" class="boton" /></p>
						    
						</form>
					</div>
										
				</div>
				
				<?php include_once("includes/sections/sidebar.php"); ?>
				<hr />		
			</div>
		</div>
							            
		
		<?php include_once("includes/sections/footer.php"); ?>
		
		<script type="text/javascript" src="http://www.google.com/cse/brand?form=cse-search-box&lang=es"></script>
		<script type="text/javascript">
			var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
			document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
			</script>
			<script type="text/javascript">
			try {
			var pageTracker = _gat._getTracker("UA-15753373-1");
			pageTracker._trackPageview();
			} catch(err) {}
		</script> 
 
    </body>
    
</html>



