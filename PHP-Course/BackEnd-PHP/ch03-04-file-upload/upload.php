<?php
	require_once 'functions.php'

$fileUpload = $_FILES['file-upload'];
echo '<pre>';
print_r($fileUpload);
echo '</pre>';
if ($fileUpload['name'] != null){
	$fileName	= $fileUpload['tmp_name'];
	$random		= randomString(6);
	$destination = './files/'. $random .$fileUpload['name'];
	move_uploaded_file($fileName, $destination);
}

	$flagSize 		= checkSize($fileUpload['size'], 1024, 1000000);
echo $flagExtension = checkExtension($fileUpload['name'], array('jpg', 'png'));
if($flagSize == true && $flagExtension==true){
	move_uploaded_file($fileUpload['tmp_name'], './files/'. $random .$fileUpload['name']);
}