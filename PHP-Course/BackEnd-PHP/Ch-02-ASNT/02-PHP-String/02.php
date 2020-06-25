<?php
$url 	= "http://210.245.126.171/Music/NhacTre/TinhYeu_LyMaiTrang/wma32/06_BienTham_TinhYeu_LyMaiTrang.wma";
function getInfo03($url) {
    $index   = strripos($url, "/");
    $result = substr($url, $index+1);
    return $result;
}

$info           = getInfo03($url);
echo "<pre>";
print_r($result);
echo "</pre>";

$result         = array();

$arrayInfo      = explode('_', $info);

//ID
$result["id"]   = $arrayInfo[0];

//TYPE
$arrType        = explode(".", $arrayInfo[3]);
$result['type'] = $arrType[1];

//NAME, AUDIO, SiNGER
$arrayInfo[3]   = $arrType[0];

function format($str){
    // str = LyMaiTrang => result = Ly Mai Trang

    $result = $str[0];
    for ($i=1; $i<strlen($str);$i++){
        if(ctype_upper($str[$i])==true){
            $result .= " " . $str[$i];
        } else {
            $result .= $str[$i];
        }
    }
return $result;
}

$result["singer"]   = format($arrayInfo[3]);
$result["name"]     = format($arrayInfo[1]);
$result["album"]    = format($arrayInfo[2]);

echo "<pre>";
print_r($result);
echo "</pre>";
