<?php 
//require "twitter.lib.php";
include_once("includes/functions/twitter.lib.php");

$username = "spaghettibg";
$password = "123qwe";

$twitter = new Twitter($username, $password);

//$xml = $twitter->getUserTimeline();
//$xml = $twitter->getMentions();
$xml = $twitter->getReplies();

$twitter_status = new SimpleXMLElement($xml);

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Twitter</title>
</head>

<body>
<!-- <style type="text/css">
.woork{
	color:#444;
	font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
	width:600px;
	margin: 0 auto;
}
.twitter_container{
	color:#444;
	font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
	font-size:12px;
	width:600px;
	margin: 0 auto;
}
.twitter_container a{
	color:#0066CC;
	font-weight:bold;
}
.twitter_status{
	height:60px;
	padding:6PX;
	border-bottom:solid 1px #DEDEDE;
}
.twitter_image{
	float:left; 
	margin-right:14px;
	border:solid 2px #DEDEDE;
	width:50px;
	height:50px;
}
.twitter_posted_at{
 font-size:11px;
 padding-top:4px;
 color:#999;
}
</style>-->
	<div class="twitter_container">
		<ul>
		<?php foreach($twitter_status->status as $status){?>
			<li class="twitter_status">
				<?php foreach($status->user as $user){?>
					<img src="<?php echo($user->profile_image_url) ?>" class="twitter_image">
					<a href="http://www.twitter.com/<?php echo($user->name)?>"><?php echo($user->name); ?></a>
				<?php }?>
				<span>: <?php echo ($status->text); ?></span>
				<?php //echo '<div class="twitter_posted_at"><strong>Creado el:</strong> '.$status->created_at.'</div>'; ?>
			</li>
		<?php } ?>
		</ul>
	</div>
</body>
</html>