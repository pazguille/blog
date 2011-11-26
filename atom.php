<?php 
require_once('includes/functions/funciones_content.php');
require_once('includes/controllers/controller.php');

header('Content-type: application/atom+xml; charset=utf-8');
$listado = callApi('http://api.spaghettiblog.com.ar/posts');
?>
<?php echo('<?xml version="1.0" encoding="UTF-8"?>')?>
<feed xmlns="http://www.w3.org/2005/Atom" xmlns:thr="http://purl.org/syndication/thread/1.0" xml:lang="es" xml:base="http://www.spaghettiblog.com.ar/atom.php" >
	<title type="text">SpaghettiBlog</title> 
    <link rel="alternate" type="text/html" href="http://www.spaghettiblog.com.ar"/>
    <id>http://www.spaghettiblog.com.ar/atom</id>
    <link rel="self" type="application/atom+xml" href="http://www.spaghettiblog.com.ar/atom" />
    <xhtml:meta xmlns:xhtml="http://www.w3.org/1999/xhtml" name="robots" content="noindex" />    
	<author>
		<name>Guillermo Paz</name>
		<email>guille87paz@gmail.com</email>
	</author>
	<?php for($i=0; $i<count($listado->posts); $i++){?>
	<entry>
		<title type="html"><![CDATA[<?php echo($listado->posts[$i]->title) ?>]]></title>		
		<link rel="alternate" type="text/html" href="<?php echo($posts[$i]->url) ?>"/>
		<published><?php echo($listado->posts[$i]->date) ?></published>
		<category scheme="http://www.spaghettiblog.com.ar" term="<?php echo($listado->posts[$i]->categ) ?>" />
		<summary type="html"><![CDATA[<?php echo($listado->posts[$i]->intro) ?>]]></summary>
		<content type="html" xml:base="<?php echo($listado->posts[$i]->url) ?>"><![CDATA[<?php echo($listado->posts[$i]->body) ?>]]></content>
	</entry>
	<?php };?>
</feed>
