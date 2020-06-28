<?php 
$configs	= parse_ini_file('configs.ini');
$arrExtension = explode('|', $configs['extension']);

function checkExtension($fileName, $arrExtension){
    echo $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $flag = false;
    if(in_array(strtolower($ext), $arrExtension)==true) $flag = true;
    return $flag;
}
$fileName = 'abc.jpg';
echo $b =  checkExtension($fileName, $arrExtension);