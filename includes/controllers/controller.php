<?php
function callApi($url){

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$data = curl_exec($ch);
		$dataJSON = json_decode($data);		
		curl_close($ch);
		
		//$cache_filename = "data.json";
		//file_put_contents($cache_filename, $data);
		
		//$dataJSON = json_decode(file_get_contents($cache_filename));
		//echo( filectime($cache_filename) );
		return $dataJSON;				
};

?>