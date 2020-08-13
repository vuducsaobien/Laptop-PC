<?php
	// New
	$linkNew	= URL::createLink('admin', 'group', 'form');
	$btnNew		= Helper::cmsButton('New', 'toolbar-popup-new', $linkNew, 'icon-32-new'); 
	
	// Publish
	$linkPublish= URL::createLink('admin', 'group', 'status', array('type' => 1));
	$btnPublish	= Helper::cmsButton('Publish', 'toolbar-publish', $linkPublish, 'icon-32-publish', 'submit');
	
	// Unpublish
	$linkUnPublish	= URL::createLink('admin', 'group', 'status', array('type' => 0));
	$btnUnPublish	= Helper::cmsButton('Unpublish', 'toolbar-unpublish', $linkUnPublish, 'icon-32-unpublish', 'submit');
	
	// Ordering
	$linkOrdering	= URL::createLink('admin', 'group', 'ordering');
	$btnOrdering	= Helper::cmsButton('Ordering', 'toolbar-checkin', $linkOrdering, 'icon-32-checkin', 'submit');
	
	// Trash
	$linkTrash	= URL::createLink('admin', 'group', 'trash');
	$btnTrash	= Helper::cmsButton('Trash', 'toolbar-trash', $linkTrash, 'icon-32-trash', 'submit');
	
	// Save
	$linkSave	= URL::createLink('admin', 'group', 'form', array('type' => 'save'));
	$btnSave	= Helper::cmsButton('Save', 'toolbar-apply', $linkSave, 'icon-32-apply', 'submit');
	
	// Save & Close
	$linkSaveClose	= URL::createLink('admin', 'group', 'form', array('type' => 'save-close'));
	$btnSaveClose	= Helper::cmsButton('Save & Close', 'toolbar-save', $linkSaveClose, 'icon-32-save', 'submit');
	
	// Save & New
	$linkSaveNew	= URL::createLink('admin', 'group', 'form', array('type' => 'save-new'));
	$btnSaveNew		= Helper::cmsButton('Save & New', 'toolbar-save-new', $linkSaveNew, 'icon-32-save-new', 'submit');
	
	// Cancel
	$linkCancel		= URL::createLink('admin', 'group', 'index');
	$btnCancel		= Helper::cmsButton('Cancel', 'toolbar-cancel', $linkCancel, 'icon-32-cancel');
	
	switch ($this->arrParam['action']) {
		case 'index':
			$strButton	= $btnNew . $btnPublish . $btnUnPublish . $btnOrdering . $btnTrash ;
			break;
		case 'form':
			$strButton	= $btnSave . $btnSaveClose . $btnSaveNew . $btnCancel;
			break;
	}
?>
<div id="toolbar-box">
			<div class="m">
            	<!-- TOOLBAR -->
				<div class="toolbar-list" id="toolbar">
                    <ul>
                    	<?php echo $strButton;?>
                    </ul>
                    
					<div class="clr"></div>
				</div>
				<!-- TITLE -->
                <div class="pagetitle icon-48-groups"><h2><?php echo $this->_title;?></h2></div>
			</div>
		</div>