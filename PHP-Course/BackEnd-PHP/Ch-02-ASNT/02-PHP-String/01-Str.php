<?php
$url 	= "http://210.245.126.171/Music/NhacTre/TinhYeu_LyMaiTrang/wma32/06_BienTham_TinhYeu_LyMaiTrang.wma";

function getInfo01($url) {
    $info   = explode('/', $url);
    $result = $info[count($info)-1];
    return $result;
}

echo  getInfo01($url);

?>