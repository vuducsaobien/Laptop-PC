<?php
	$xhtml = '';
	if(!empty($this->Items)){
		foreach($this->Items as $key => $value){
			$name	= $value['name'];
	
			$bookID			= $value['id'];
			$catID			= $value['category_id'];
			$bookNameURL	= URL::filterURL($name);
			$catNameURL		= URL::filterURL( $this->categoryName);
				
			$link	= URL::createLink('default', 'book', 'detail', array('category_id' => $value['category_id'],'book_id' => $value['id']), "$catNameURL/$bookNameURL-$catID-$bookID.html");
			
			$description	= substr($value['description'], 0, 200);
			
			$picture 		= Helper::createImage('book', '98x150-', $value['picture']);		
			$xhtml 	.= '<div class="feat_prod_box">
							<div class="prod_img"><a href="'.$link.'">'.$picture.'</a></div>
					
							<div class="prod_det_box">
								<div class="box_top"></div>
								<div class="box_center">
									<div class="prod_title">'.$name.'</div>
									<p class="details">'.$description.'</p>
									<a href="'.$link.'" class="more">- more details -</a>
									<div class="clear"></div>
								</div>
								<div class="box_bottom"></div>
							</div>
							<div class="clear"></div>
						</div>';
		}
	}else{
		$xhtml 	= '<div class="feat_prod_box">Nội dung đang cập nhật!</div>';
	}
?>

<!-- TITLE -->
<?php echo Helper::createTitle("$imageURL/bullet1.gif", $this->categoryName);?>

<!-- LIST CATEGORIES -->
<?php echo $xhtml;?>
