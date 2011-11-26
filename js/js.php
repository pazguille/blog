<?php

// JS Min
require("jsmin.php");

// JS Content Type
header("Content-type: text/javascript");

// GET Files to minimize
$q = $_GET["q"];

$files = explode(",", $q);

if (!$files) return;

foreach ($files as $file) {
	$js = file_get_contents($file.".js");
	$js = JSMin::minify($js);
	$jsout.=$js;
}

echo ($jsout);

?>