<?php 
require_once('includes/functions/funciones_content.php');
require_once('includes/controllers/controller.php');

header('Content-type: text/xml; charset=utf-8');
$listado = callApi('http://api.spaghettiblog.com.ar/posts');
?>
<?php echo('<?xml version="1.0" encoding="UTF-8"?>')?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
	<url>
	  <loc>http://www.spaghettiblog.com.ar/</loc>
	  <changefreq>always</changefreq>
	</url>
	<url>
	  <loc>http://www.spaghettiblog.com.ar/categoria/articulos</loc>
	  <changefreq>always</changefreq>
	</url>
	<url>
	  <loc>http://www.spaghettiblog.com.ar/categoria/noticias</loc>
	  <changefreq>always</changefreq>
	</url>
	<?php for($i=0; $i<count($listado->posts); $i++){?>
	<url>
	  <loc><?php echo($listado->posts[$i]->url) ?></loc>
	  <changefreq>always</changefreq>
	</url>
	<?php };?>
</urlset>