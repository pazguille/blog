<?php 
//Busco las categorias para listarlas (no voy a considerar a Inicio como una categor�a)
$aCategs = obtenCategs();

// Si selecion� una categoria la marco
if(isset($_GET['categFriend'])){
	$categAct = $_GET['categFriend'];
};
header('Content-type: text/html; charset=utf-8');
?>

<nav class="menu">
	<ul class="layout">
		<li>		
		<?php if(!isset($categAct)){?>		
			<strong>Inicio</strong>
		<?php }else{ ?>
			<a href="/">Inicio</a>		
		<?php }; ?>
		</li>
		<?php for($i=0; $i<count($aCategs); $i++){ ?> 
		<li>	
			<?php if($categAct != $aCategs[$i]['categ_url']){?>
				<a href="/categoria/<?php echo(urlFriendly($aCategs[$i]['categ_name']))?>"><?php echo($aCategs[$i]['categ_name']) ?></a>
			<?php }else{ ?>
				<strong><?php echo($aCategs[$i]['categ_name']) ?></strong>
			<?php }?>
		</li>
		<?php }?>
	</ul>
</nav>