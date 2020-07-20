<?php
	// $rssTxt	= file_get_contents('data/rss.txt', true);
	// $url 	= preg_replace('/\s+/', '', $rssTxt);
	// $urlArr = explode('https', $url);
	// $a 		= array_shift($urlArr);
	
	// foreach ($urlArr as &$b){
	// 	$b = 'https' . $b;
	// unset($b);
	// }

	// $y = 0;
	// foreach ($urlArr as $key => $value){
	// 	echo $value;
	// 	if($y == 2) break;
	// 	$xml   		= simplexml_load_file($value, 'SimpleXMLElement', LIBXML_NOCDATA);
	// 	$xmlJson 	= json_encode($xml);
	// 	// echo $xmlJson . '<hr>'. '<hr>'. '<hr>'. '<hr>';
	// 	$xmlArr 	= json_decode($xmlJson, 1);
	// 	echo '<pre>';
	// 	print_r($xmlArr);
	// 	echo '</pre>';
	// 	$y++;
	// } 

$y = 1;
foreach ($urlArr as $key => $value){
	if($i == 3) break;
	$y++;

	$i = 1;
	foreach ($urlArr as $key => $value){
		if($y == 3) break;
		$i++;

		
	} 
} 
