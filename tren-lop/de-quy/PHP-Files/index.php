

<?php
function showAll($path, &$newString){
	$data   = scandir($path);

	$newString .= '<ul>';
	foreach ($data as $key => $value){
		
		if ($value != '.' && $value != '..'){
			$dir = "$path/$value";
			$level = 1;
			$doc = '';

			if (is_dir($dir)){ // Điều kiện dừng
				
				$a = explode('/',$dir);

				$level = (count ($a)-2);
				$icon = '<img style="max-width: 20px" src ="images/folder.jpg">';
				$newString .= "<li>$icon: $value-$level" ;

				showAll($dir, $newString);
				$newString .= '</li>';
			} else {
				$extension = pathinfo($value, PATHINFO_EXTENSION);
				$iconFile = 'recycle.jpg';
				if ($extension == 'ini' || $extension == 'txt'){
					$iconFile = 'doc.jpg';
				}
				
				if ($extension == 'mp4' || $extension == 'mp3'){
					$iconFile = 'audio.jpg';
				}
				$newString .= '<li><img style="width: 20px" src ="./images/'.$iconFile.'">'. $value .'</li>';
			}
			
		}

	}
	$newString .= '</ul>';
}

showAll('./data', $newString);
echo $newString;

