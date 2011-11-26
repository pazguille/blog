<?php

// CSS Min
require("cssmin.php");

// CSS Content Type
header("Content-type: text/css");

// GET Files to minimize
$q = $_GET["q"];

$files = explode(",", $q);

if (!$files) return;

foreach ($files as $file) {
	$css = file_get_contents($file.".css");
	$css = CssMin::minify($css);
	$cssout.=$css;
}

echo ($cssout);

?>