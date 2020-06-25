<?php
$str = "NguyenVanAn";
function format($str){
$result = $str[0];
for ($i=1; $i<strlen($str);$i++){
    if(ctype_upper($str[$i])==true){
        $result .= " " . $str[$i];
    } else {
        $result .= $str[$i];
            }
    return $result;
    }
}
echo format($str[$i]);
echo $result . "<br>";
echo $t;