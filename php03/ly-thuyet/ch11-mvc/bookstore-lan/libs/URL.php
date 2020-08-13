<?php
class URL{
	
	public static function createLink($module, $controller, $action, $params = null){
		if(!empty($params)){
			foreach ($params as $key => $value){
				$linkParams .= "&$key=$value";
			}
		}

		$url = 'index.php?module='.$module.'&controller='.$controller.'&action='.$action . $linkParams;
		return $url;
	} 
	
	public static function redirect($link){
		header('location: ' . $link);
		exit();
	}
}