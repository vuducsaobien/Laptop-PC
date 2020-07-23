<?php
/*
$array1 = array(
    "1" => "A",
    "2" => "B",
	"3" => "C",
	"4" => "D"

);

$array2 = array(
    "1" => "E",
	"2" => "F",
	"3" => "G",
	"4" => "H",
	"5" => "I"
);

foreach($array1 as $arr1) {
    // print_r($arr1);
    // echo "<br>";
	$i = 0;
    foreach($array2 as $arr2) {
		if($i == 3) break;
        print_r($arr2);
		echo "<br>";
		$i++;

	}

}
die;


foreach ($array as $item) {
	echo "$item\n";
	$array[] = $item;
  }
  print_r($array);
die;
*/

	$rssTxt	= file_get_contents('data/rss.txt', true);
	$url 	= preg_replace('/\s+/', '', $rssTxt);
	$urlArr = explode('https', $url);
	$a 		= array_shift($urlArr);
	foreach ($urlArr as &$b){
		$b = 'https' . $b;
	}
	foreach ($urlArr as $value){
		echo $value . '<hr>';
		$xml   		= simplexml_load_file($value, 'SimpleXMLElement', LIBXML_NOCDATA);
		$xmlArr 	= json_decode(json_encode($xml), 1);
		$channel 	= $xmlArr['channel'];
		$item 		= $channel['item'];
		echo '<pre>';
		print_r($item);
		echo '</pre>';
		$xhtml 		= '';
		if(strpos($url, 'tuoitre') !== false) {
				$danhMuc 	= substr($channel['title'],0,-11);
		} else { $danhMuc 	= substr($channel['title'],0,-3); }

		$i 			= 0;
		foreach ($item as $description){
			if($i == 2) { break 1;}
			$title = $description['title'];
			$link  = $description['link'];
			$day   = $description['pubDate'];

			if(strpos($url, 'tuoitre') !== false) {
				$pregMatch = '#.*<img src="(.*)" /></a>(.*)<end>#imSU';
			} else { $pregMatch = '#.*<img src="(.*)" ></a></br>(.*)<end>#imSU'; }
		
			preg_match_all($pregMatch, $description['description'] . '<end>', $matches);
			$srcImage    = implode($matches[1]);
			$description = implode($matches[2]);
			$xhtml 		.= 	
			'<div class="row pt-md-4">
				<div class="col-md-12">
					<div class="blog-entry ftco-animate d-md-flex">
						<a href= '.$link.' class="img img-2" style="background-image: url( '.$srcImage.')"></a>
						<div class="text text-2 pl-md-4">
							<h3 class="mb-2"><a href='.$link.'>'.$title.'</a></h3>
								<div class="meta-wrap">
									<p class="meta">
										<span><i class="icon-calendar mr-2"></i>'.$day.'</span>
										<span><a href="single.html"><i class="icon-folder-o mr-2"></i>'.$danhMuc.'</a></span>
									</p>
								</div>
							<p class="mb-4">'.$description.'</p>
							<p><a href='.$link.' class="btn-custom">Đọc Thêm <span class="ion-ios-arrow-forward"></span></a></p>
						</div>
					</div>
				</div>
			</div>';
			$i++;
		}
	}
?>

