<div id="wrapper">
    	<div class="title"><?php echo $titlePage;?></div>
        <div id="form">   
        	<?php echo $error . $success; ?>
			<form action="<?php echo $linkForm;?>" method="post" name="add-form">
				<div class="row">
					<p>Name</p>
					<input type="text" name="name" value="<?php echo $outValidate['name'];?>">
				</div>
				
				<div class="row">
					<p>Status</p>
					<?php echo $status;?>
				</div>
				
				<div class="row">
					<p>Ordering</p>
					<input type="text" name="ordering" value="<?php echo $outValidate['ordering'];?>">
				</div>
				
				<div class="row">
					<input type="submit" value="Save" name="submit">
					<input type="button" value="Cancel" name="cancel" id="cancel-button">
					<input type="hidden" value="<?php echo time();?>" name="token" />
				</div>
												
			</form>    
        </div>
        
    </div>
