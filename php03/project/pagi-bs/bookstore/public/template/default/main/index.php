<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->_metaHTTP;?>
	<?php echo $this->_metaName;?>
    <title><?php echo $this->_title;?></title>
    <?php echo $this->_cssFiles;?>
    <?php echo $this->_jsFiles;?>
</head>
<body>
	<div id="wrap">
		<?php include_once 'html/header.php';?>
		
		<div class="center_content">
       		<div class="left_content">
				<?php 
					require_once MODULE_PATH. $this->_moduleName . DS . 'views' . DS . $this->_fileView . '.php';
				?>
        	</div>
	        <div class="right_content">
	        	<?php //include_once BLOCK_PATH . 'language.php';?>
				<?php include_once BLOCK_PATH . 'cart.php';?>
				<?php include_once BLOCK_PATH . 'category.php';?>
				<?php include_once BLOCK_PATH . 'promotion.php';?>
				<?php include_once BLOCK_PATH . 'special.php';?>
			</div>
       		<div class="clear"></div>
       	</div>
		<?php include_once 'html/footer.php';?>
	</div>
</body>
</html>