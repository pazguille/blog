<?php
require_once('includes/functions/funciones_content.php');
require_once('recaptchalib.php');
header('Content-type: text/html; charset=utf-8');
/*Comentar */
session_start();

// Levanto el url friendly del post y ejecuto la query para tomar los datos
$aPost = obtenPost($_GET['postFriend']);
$categPost = obtenPostCateg($aPost[0]['post_categ']);
$categPostFriend = $_GET['categFriend'];
$publickey = "6LfBNskSAAAAAGmvpKJDT_wr8o4B_kBj22MBmc6L"; // you got this from the signup page
$privatekey = "6LfBNskSAAAAAKsDuUQ0_OCIkSy3U_Ff3s6HI_Mw";
# the response from reCAPTCHA
$resp = null;
# the error code from reCAPTCHA, if any
$error = null;
$categPath = '<p class="path"><small><a href="/">Inicio</a> > <a href="/categoria/'.$categPostFriend.'">'.$categPost[0]['categ_name'].'</a> > '.$aPost[0]['post_title'].'</small></p>';

if(isset($_POST['submit'])) {
	
	if(!empty($_POST['name']) && !empty($_POST['message']) && !empty($_POST['recaptcha_response_field'])) {
	
		if ($_POST["recaptcha_response_field"]) {
        	$resp = recaptcha_check_answer ($privatekey,
                                        $_SERVER["REMOTE_ADDR"],
                                        $_POST["recaptcha_challenge_field"],
                                        $_POST["recaptcha_response_field"]);

	        if ($resp->is_valid) {
				//funcion con el insert
				guardarComent($aPost[0]['post_id'], $_POST['name'], obtenerFechaHora(), $_POST['message']);
	        } else {
	            //mensaje de error
				//$error = "No hemos podido interpretar el c�digo que has ingresado. Por favor, ingresa uno nuevo.";
	             $error = $resp->error;
	        }
		}
		
	} else {
		//mensaje de error	
		$error = "Por favor, completa todos los datos para recibir tu comentario.";
	
	}

}

$aResCom = obtenCom($aPost[0]['post_id']);


?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="es-ES" />
        <meta name="copyright" content="2010 SpaghettiBlog.com.ar" />
        <meta name="author" content="SpaghettiBlog.com.ar" />
        <meta name="robots" content="all" />
        <meta name="Revisit-after" content="1 Day" />      
        <meta name="description" content="<?php echo($aPost[0]['post_title']); ?>, en Spaghetti Blog. Spaghetti Blog, Noticias, Articulos, Trucos, Tips, Webmasters, css, html, diseño Web, diseño, desarrollo, Programacion, Tecnologia, Codigo, Juegos, Hacks, Navegadores, Browser, Tutoriales" />
        <meta name="keywords" content="<?php
        	$keys = explode('-', $aPost[0]['post_url']);
			echo(strtolower(implode(', ', $keys)));
		?>, spaghetti blog, noticias, articulos, trucos, tips, webmasters, css, html, diseño Web, diseño, desarrollo, programacion, tecnologia, codigo, juegos, hacks, navegadores, browser, tutoriales" />
		<base href="http://www.spaghettiblog.com.ar/" />
		<link rel="alternate" title="SpaghettiBlog RSS" href="http://www.spaghettiblog.com.ar/rss" type="application/rss+xml" />
		<title><?php echo($aPost[0]['post_title']); ?> - Spaghetti Blog</title>
		<!-- <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />-->
		<link href="css/css.php?q=reset,styles" rel="stylesheet" type="text/css" media="screen" />       
    </head>
    
    <body>
    
		<?php include_once("includes/sections/header.php"); ?>
				        
		<div class="main layout">
			<?php echo($categPath)?>
			<?php if(!empty($error)) echo '<div class="error">'.$error.'</div>'; ?>
			<section class="main">
				<article id="postView">
					<div class="header">
						<h2 class="titlePost">
							<a href="/<?php echo($categPostFriend) ?>/<?php echo(urlFriendly($aPost[0]['post_title']))?>"><?php echo($aPost[0]['post_title']) ?></a>
						</h2>
						<p class="fechaPost"><small><?php echo(obtenerMesByNum($aPost[0]['post_mes']).' '.$aPost[0]['post_dia']); ?></small></p>
						<p class="cantComentPost" title="<?php echo(contarComentTot($aPost[0]['post_id'])) ?> comentarios" ><small><?php echo(contarComentTot($aPost[0]['post_id'])) ?> <span class="hide">comentarios</span></small></p>				
					</div>
					<div class="section">
						<?php echo($aPost[0]['post_body']) ?>
					</div>
				</article>
				
				<div id="comentariosVista">
					<h2 class="tituloSecciones">Comentarios (<?php echo(count($aResCom)) ?>)</h2>
					
					<ol id="comentariosLista">
						<?php for($i=0; $i<count($aResCom); $i++){ ?>
						<li>
							<dl>
								<dt><?php echo($aResCom[$i]['com_user']) ?> <small class="comentarioFecha">(<?php echo($aResCom[$i]['com_date']) ?>)</small></dt>
								<dd><?php echo($aResCom[$i]['com_body']) ?></dd>
							</dl>
						</li>
						<?php }?>
					</ol>
						
				</div>
				
				
				<div id="comentarForm">
					<h2 class="tituloSecciones">Deja tu comentario...</h2>
					<form id="comentar" action="/<?php echo($categPostFriend) ?>/<?php echo(urlFriendly($aPost[0]['post_title']))?>" method="post" enctype="multipart/form-data">
						
						<p><label for="name" class="labelText"><span class="obligatorio" >*</span> Nombre:</label><input id="name" type="text" name="name" class="inputText" /></p>
						
						<p><label for="message" class="labelText"><span class="obligatorio" >*</span> Mensaje:</label><textarea id="message" name="message" class="inputText" ></textarea></p>
						
						<div id="captcha">
							<p><label for="code" class="labelText"><span class="obligatorio">*</span> Ingresa el texto de la imagen:</label></p>								
							<p><?php echo recaptcha_get_html($publickey); ?></p>
						</div>
					    
					    <p id="enviarComentBox"><input type="submit" name="submit" value="Enviar comentario" id="enviarComent" class="btn" /></p>
					    
					</form>
				</div>
									
			</section>
			
			<?php include_once("includes/sections/sidebar.php"); ?>
			<hr />
		</div>						            
		
		<?php include_once("includes/sections/footer.php"); ?>
		
		<script type="text/javascript" src="http://www.google.com/cse/brand?form=cse-search-box&amp;lang=es"></script>
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
		<script type="text/javascript" src="js/snippets.js"></script>	
 
    </body>
    
</html>