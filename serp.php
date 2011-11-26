<?php header('Content-type: text/html; charset=utf-8'); ?>
<!DOCTYPE html>
<html lang="es">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="es-ES" />
        <meta name="copyright" content="2010 SpaghettiBlog.com.ar" />
        <meta name="author" content="SpaghettiBlog.com.ar" />
        <meta name="robots" content="all" />
        <meta name="Revisit-after" content="1 Day" />
		<meta name="description" content="SpaghettiBlog, Noticias, Artículos, Trucos, Tips, Webmasters, css, html, diseño Web, diseño, desarrollo, Programacion, Tecnología, Codigo, Juegos, Hacks, Navegadores, Browser, Tutoriales" />
        <meta name="keywords" content="spaghettiBlog, noticias, artículos, trucos, tips, webmasters, css, html, diseño, web, programacion, tecnologia, codigo, juegos, hacks, navegadores, browser" />        
        <base href="http://www.spaghettiblog.com.ar/" />
		<!-- <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />-->
        <link href="css/css.php?q=reset,styles" rel="stylesheet" type="text/css" media="screen" />
		
		<link rel="alternate" title="SpaghettiBlog RSS" href="http://www.spaghettiblog.com.ar/rss" type="application/rss+xml" />
        <title>Spaghetti Blog</title>   
    </head>
    
    <body>
    
		<?php include_once("includes/sections/header.php"); ?>
		
		<div class="main layout">
			<?php echo($categPath); ?>
			<section class="main">	
				<div id="resultados">	
					<div id="cse-search-results"></div>
				</div>
			</section>
			<?php include_once("includes/sections/sidebar.php"); ?>
			<hr />					            
		</div>

		<?php include_once("includes/sections/footer.php"); ?>
    	

		<script type="text/javascript">
		  var googleSearchIframeName = "cse-search-results";
		  var googleSearchFormName = "cse-search-box";
		  var googleSearchFrameWidth = 715;
		  var googleSearchDomain = "www.google.com";
		  var googleSearchPath = "/cse";
		</script>
		<script type="text/javascript" src="http://www.google.com/afsonline/show_afs_search.js"></script>

		
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