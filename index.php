<?php

require_once('includes/functions/funciones_content.php');
// Paginador
if(isset($_GET['pagina'])){
	$pagina = $_GET['pagina'];
	$inicio = ($pagina - 1) * 10;
}else{
    $inicio = 0;
    $pagina = 1;
};

$categ = '';
$categId = '';
$categPath = '';

// Si filtra por Categorias
if(isset($_GET['categFriend'])){
	$categ = obtenCateg($_GET['categFriend']);
	$categId = $categ[0]['categ_id'];
	
	$categPath = '<nav class="path"><p><small><a href="/">Inicio</a> > <strong>'.$categ[0]['categ_name'].'</strong></small></p></nav>';
}

$aResPosts = listadoPosts($inicio, $categId);


// Paginador again
$total_res = contarResTot($categId);
$total_paginas = ceil($total_res / 10); // Para testear descomentar esto --> $total_paginas = 20;


//echo(urlFriendly("Adobe CS5: Novedades de Dreamweaver"));
header('Content-type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="es-ES" />
        <meta name="copyright" content="2011 spaghettiBlog.com.ar" />
        <meta name="author" content="SpaghettiBlog.com.ar" />
        <meta name="robots" content="all" />
        <meta name="Revisit-after" content="1 Day" />
		<meta name="description" content="SpaghettiBlog, Noticias, Artículos, Trucos, Tips, Webmasters, css, html, diseño Web, dise�o, desarrollo, Programacion, Tecnología, Codigo, Juegos, Hacks, Navegadores, Browser, Tutoriales" />
        <meta name="keywords" content="spaghettiBlog, noticias, artículos, trucos, tips, webmasters, css, html, diseño, web, programacion, tecnología, codigo, juegos, hacks, navegadores, browser" />        
        <!--base href="http://www.spaghettiblog.com.ar/" /-->
        <link rel="alternate" title="SpaghettiBlog Feed" href="http://www.spaghettiblog.com.ar/atom" type="application/atom+xml" />
        <title>Spaghetti Blog <?php if(isset($_GET['categFriend'])){
        								echo(' - '.$categ[0]['categ_name']);
        							}?></title>
		<!-- <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />-->
        <link href="css/css.php?q=reset,styles" rel="stylesheet" type="text/css" media="screen" />        
    </head>

    <body>
    
		<?php include_once("includes/sections/header.php"); ?>
		
		<div class="main layout">
			<?php echo($categPath); ?>
			<section class="main">
				<ol>
				<?php for($i=0; $i<count($aResPosts); $i++){ 
						$categPost = obtenPostCateg($aResPosts[$i]['post_categ']); ?>
					<li>
						<article id="post_<?php echo($aResPosts[$i]['post_id']) ?>" class="postPreview">									
							<h2 class="titlePost">
								<a href="/<?php echo($categPost[0]['categ_url']) ?>/<?php echo(urlFriendly($aResPosts[$i]['post_title']))?>"><?php echo($aResPosts[$i]['post_title']) ?></a>
							</h2>
							<p class="fechaPost"><small><?php echo(obtenerMesByNum($aResPosts[$i]['post_mes']).' '.$aResPosts[$i]['post_dia']); ?></small></p>
							<p class="cantComentPost" title="<?php echo(contarComentTot($aResPosts[$i]['post_id'])) ?> comentarios" ><small><?php echo(contarComentTot($aResPosts[$i]['post_id'])) ?> <span class="hide">comentarios</span></small></p>
							<p class="introPost"><?php echo($aResPosts[$i]['post_intro']) ?></p>
							<p class="imgPost">
								<a class="media" href="/<?php echo($categPost[0]['categ_url']) ?>/<?php echo(urlFriendly($aResPosts[$i]['post_title']))?>">
									<img alt="Imagen del post" src="<?php echo($aResPosts[$i]['post_img']) ?>" />
								</a>
							</p>
							<p class="leerMas"><a href="/<?php echo($categPost[0]['categ_url']) ?>/<?php echo(urlFriendly($aResPosts[$i]['post_title']))?>">Seguir leyendo...</a></p>				
						</article>
					</li>
					<?php }?>
				</ol>
				
				<?php 
					// *** Paginador ***
					if($total_paginas > 1){
						echo('<p style="text-align:center; margin:10px 0 5px 0;">');
						
						// Para testear descomentar esto --> $pagina = 1;
						
						if(($pagina - 2) >= 1 && ($pagina + 2) < ($total_paginas)){ // Rango centro
							$posicion = $pagina - 2;
						}elseif(($pagina - 2) < 1){ // (1, 2)
							$posicion = 1;
						}elseif(($pagina + 2) >= ($total_paginas)){ // (ultimo y anteultimo)
							$posicion = $total_paginas - 4;
						}
						
						// Link Anterior
						if($pagina > 1){
							echo('<a href="?pagina='.($pagina - 1).'" class="miniLink">Anterior</a>&nbsp;|&nbsp;');
						}
						
						// Numeros
						if($total_paginas<5){
							$mostrar = $total_paginas; 
						}else{
							$mostrar = 5;
						}
						for($i =0; $i<$mostrar; $i++){
							if(($posicion + $i) == $pagina){
								echo('<span class="hard" style="font-weight:bold; cursor:default; text-decoration:none;">'.$pagina.'</span>&nbsp;|&nbsp;');
							}else{
								echo('<a href="?pagina='.($posicion + $i).'" class="miniLink">'.($posicion + $i).'</a>&nbsp;|&nbsp;');
							}
						}
						
						// Link Siguiente
						if($pagina < $total_paginas){
							echo('<a href="?pagina='.($pagina + 1).'" class="miniLink">Siguiente</a>');
						}
						
						echo('</p>');
					}
					// *** Fin Paginador *** ?>
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
    </body>
    
</html>