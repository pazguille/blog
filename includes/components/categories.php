<?php 
	require_once('includes/functions_categ.php');
	$aCategs = getCateg();
	
	
	
	$mi = array( 
		0 => array( 
			'categ_id' => '1',
			'categ_name' =>  'Drogas',
			'categ_parent' => '0'
		),
		
		1 => array( 
			'categ_id' => '2',
			'categ_name' =>  'Mariajuana',
			'categ_parent' => '0'
		),
		
		2 => array( 
			'categ_id' => '3',
			'categ_name' =>  'Parientes',
			'categ_parent' => '0'
		),

		3 => array( 
			'categ_id' => '4',
			'categ_name' =>  'Cocaina',
			'categ_parent' => '0'
		),
		
		4 => array( 
			'categ_id' => '5',
			'categ_name' =>  'Madre',
			'categ_parent' => '0'
		),

		5 => array( 
			'categ_id' => '6',
			'categ_name' =>  'Casa',
			'categ_parent' => '0'
		),
		
		6 => array( 
			'categ_id' => '7',
			'categ_name' =>  'Jardin',
			'categ_parent' => '0'
		),

		7 => array( 
			'categ_id' => '8',
			'categ_name' =>  'Flor',
			'categ_parent' => '0'
		),
	);
	
	
	$mi2 = array( 	
		0 => array( 
			'categ_id' => '2',
			'categ_name' =>  'Mariajuana',
			'categ_parent' => '1'
		),
	);

	
	/*function getChilds($nodesPosta, $FatherNode){
		$i = 0;
        foreach ($nodesPosta as $nodeChild){
	        if($FatherNode == $nodeChild['categ_parent']){
		        $childNodes[$i] = $nodeChild;
		        $i++;
	        }; 
        };

        return $childNodes;
        
	};*/
	
	
	
	

	function printed($id){
		$aPrinted[] =  $id;
		return $aPrinted;
	}
	
	function create_html_list($nodes, $nodes2){
	    echo('<ul>');			
	    foreach ($nodes as $node){    
	    	$FatherNode = $node['categ_id'];
	    	$aPrinted[] = $node['categ_name'];	    	
			$childNodes = getChilds($nodes2, $FatherNode);			
			/*for($s = 0; $s<count($aPrinted); $s++){
				echo($aPrinted[$s].'<br>');
			};*/	
				if($childNodes == NULL){
					
					echo "<li>", $node['categ_name'], "</li>";			
				}else{
					echo "<li>", $node['categ_name'],	
						create_html_list($childNodes, $nodes2);

					echo "</li>";
					
				}

	    };
		echo ('</ul>');
		var_dump($aPrinted);
	};
	
	

	function getChilds($aCategs, $Father){
		$childNodes = array();
		for($j = 0; $j<count($aCategs); $j++){
			if($Father == $aCategs[$j]['categ_parent']){
				$childNodes[] = $aCategs[$j];		
			};
		};
        return $childNodes;
        
	};
	
	function prints($aCategs, $father, $name, $i){
		$childs = getChilds($aCategs, $father);
		if($childs == NULL){					
			echo('<li>'.$name.'</li>');
			unset($aCategs[$i]['categ_id']);
			unset($aCategs[$i]['categ_name']);
			unset($aCategs[$i]['categ_parent']);				
		}/*else{
			echo ('<li>'.$name.'<ul>');
				for($j = 0; $j<count($childs); $j++){
					prints($aCategs, $childs[$j]['categ_id'] ,$childs[$j]['categ_name'],  $aCategs[$j]['categ_id']);	
				};
			echo('</ul></li>');
		};*/
	};

	
	function lala($aCategs){   
		echo('<ul>');			
		for($i = 0; $i<count($aCategs); $i++){
			if(array_search($aCategs[$i]['categ_name'], $aCategs) != ''){
				$here = false;
			}else{
				$here = true;
			};
						
			if($here){
				prints($aCategs, $aCategs[$i]['categ_id'], $aCategs[$i]['categ_name'], ($aCategs[$i]['categ_id'] - 1));			
			};
		//var_dump($aPrinted);			
		};
		echo ('</ul> <pre>');
		print_r($aCategs);	
	};
	
?>
	
<div id="categories">   
    <h5 class="title-component">Categorias</h5>    
	<?php
		//create_html_list($aCategs, $aCategs);
		lala($mi);
	?>
</div>