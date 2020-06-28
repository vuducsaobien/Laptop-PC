<?php
	// Check file size
	function checkSize($size, $min, $max){
		$flag = false;
		if($size >= $min && $size <= $max) $flag = true;
		return $flag;
	}
	
	// Check file extensions
	function checkExtension($fileName, $arrExtension){
		echo $fileName;
		echo '<pre>';
print_r($arrExtension);
echo '</pre>';
	}
	
	// Random file name
	function randomString($fileName, $length = 5){
		
		$ext = pathinfo($fileName, PATHINFO_EXTENSION);
		
		$arrCharacter = array_merge(range('A','Z'), range('a','z'), range(0,9));
		$arrCharacter = implode($arrCharacter, '');
		$arrCharacter = str_shuffle($arrCharacter);
	
		$result		= substr($arrCharacter, 0, $length) . '.' . $ext;
		return $result;
	}
// echo '<pre>';
// print_r($data);
// echo '</pre>';