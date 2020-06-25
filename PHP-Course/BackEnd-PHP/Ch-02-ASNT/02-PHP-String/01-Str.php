<?php
$url 	= "http://210.245.126.171/Music/NhacTre/TinhYeu_LyMaiTrang/wma32/06_BienTham_TinhYeu_LyMaiTrang.wma";
            //Cach 01//
//     function getInfo01($url) {
        $info   = explode('/', $url);
//         $result = $info[count($info)-1];
//         return $result;
//     }
echo $info;
//     echo getInfo03($url);

            //Cach 02//
    // echo  getInfo01($url);
// function getInfo02($url) {
//     $arrayURL = parse_url($url);
//     $info     = explode("/", $arrayURL['path']);
//     return $result = $info[count($info)-1];
//     }
//     echo getInfo02($url);

//         //Cach 03: Nằm sau / cuối cùng; Tìm ký tự / cuối cùng trong chuỗi
// function getInfo03($url) {
//     $index = strripos($url, "/");
//     $result = substr($url, $index+1);
//     return $result;
// }
// echo getInfo03($url);