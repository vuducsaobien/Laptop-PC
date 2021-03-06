<?php
class Helper
{

	public static function cmsSpecial($statusValue, $link, $id)
	{
		$strStatus = ($statusValue == 0) ? 'unpublish' : 'publish';

		$xhtml		= '<a class="jgrid" id="special-' . $id . '" href="javascript:changeSpecial(\'' . $link . '\');">
							<span class="state ' . $strStatus . '"></span>
						</a>';
		return $xhtml;
	}

	// Create Title sort
	public static function cmsLinkSort($name, $column, $columnPost, $orderPost)
	{
		// $icon	= '';
		$order	= ($orderPost == 'desc') ? 'asc' : 'desc';
		if ($column == $columnPost) {
			// CHANGE
			$img	= '<img style="width: 30px;" src="' . TEMPLATE_URL . 'admin/adminlte/images/sort-' . $orderPost . '.png">';
			// echo $orderPost;
			// if($orderPost=='desc'){
			// 	$classIcons = 'fal fa-sort-amount-down';
			// }else{
			// 	$classIcons = 'fal fa-sort-amount-up-alt';
			// }
			// echo $classIcons;
			// echo $icon = '<i class="'.$classIcons.'"></i>';

		}
		// $xhtml = '<a href="#" onclick="javascript:sortList(\''.$column.'\',\''.$order.'\')">'.$name.'<i class="'.$classIcons.'"></i></a>';
		$xhtml = '<a href="#" onclick="javascript:sortList(\'' . $column . '\',\'' . $order . '\')">' . $name . $img . '</a>';

		return $xhtml;
	}

	// Create Message
	public static function cmsMessage($message)
	{
		$xhtml = '';
		if (!empty($message)) {
			$xhtml = '<dl id="system-message">
							<dt class="' . $message['class'] . '">' . ucfirst($message['class']) . '</dt>
							<dd class="' . $message['class'] . ' message">
								<ul>
									<li>' . $message['content'] . '</li>
								</ul>
							</dd>
						</dl>';
		}
		return $xhtml;
	}

	// Create Selectbox

	public static function cmsSelectbox($arrValue, $keySelect = 'default', $style = null, $name, $class)
	{
		$xhtml = '<select id="' . $name . '" name="' . $name . '" class="' . $class . '" style="' . $style . '">';
		foreach ($arrValue as $key => $value) {
			if ($key == $keySelect && is_numeric($keySelect)) {
				$xhtml .= '<option selected="selected" value = "' . $key . '">' . $value . '</option>';
			} else {
				$xhtml .= '<option value = "' . $key . '">' . $value . '</option>';
			}
		}
		$xhtml .= '</select>';
		return $xhtml;
	}

	// Create Button
	public static function cmsButton($name, $id, $link, $type = 'new')
	{
		$xhtml = '';
		if ($type == 'new') {
			// $xhtml  .= '<button onclick="location.href='.$link.'" class="btn btn-sm btn-info" id="' . $id . '">';
		} else if ($type == 'submit') {
			$xhtml .=
			'<a href="" onclick="javascript:submitForm(\'' . $link . '\');">
				<button id="' . $id . '" class="btn btn-sm btn-info">' . $name . '
				</button>
			</a>';

			// <button id="bulk-apply" class="btn btn-sm btn-info">Apply <span class="badge badge-pill badge-danger navbar-badge" style="display: none"></span></button>
			// $xhtml .= '<a class="modal" href="#" onclick="javascript:submitForm(\'' . $link . '\');"><span class="' . $icon . '"></span>' . $name . '</a>';
			// $xhtml  .= '<button type="submit" onclick="javascript:submitForm(\'' . $link . '\');      class="btn btn-sm btn-info" id="' . $id . '"  >'.$name.'</button>';
		}

		return $xhtml;
	}

	// Create Input
	public static function cmsInput($type, $name, $id, $value, $class = null, $size = null)
	{
		$strSize	=	($size == null) ? '' : "size='$size'";
		$strClass	=	($class == null) ? '' : "class='$class'";

		$xhtml = "<input type='$type' name='$name' id='$id' value='$value' $strClass $strSize>";

		return $xhtml;
	}

	// Create Row - ADMIN
	public static function cmsRowForm($lblName, $input, $require = false)
	{
		$strRequired = '';
		if ($require == true) $strRequired = '<span class="star">&nbsp;*</span>';
		$xhtml = '<li><label>' . $lblName . $strRequired . '</label>' . $input . '</li>';

		return $xhtml;
	}

	// Create Row - PUBLIC
	public static function cmsRow($lblName, $input, $submit = false)
	{
		if ($submit == false) {
			$xhtml = '<div class="form_row"><label class="contact"><strong>' . $lblName . ':</strong></label>' . $input . '</div>';
		} else {
			$xhtml = '<div class="form_row">' . $input . '</div>';
		}
		return $xhtml;
	}

	// Formate Date
	public static function formatDate($format, $value)
	{
		$result = '';
		if (!empty($value) && $value != '0000-00-00') {
			$result = date($format, strtotime($value));
		}
		return $result;
	}

	// Create Image
	public static function createImage($folder, $prefix, $pictureName, $attribute = null)
	{

		$class	= !empty($attribute['class']) ? $attribute['class'] : '';
		$width	= !empty($attribute['width']) ? $attribute['width'] : '';
		$height	= !empty($attribute['height']) ? $attribute['height'] : '';
		$strAttribute	= "class='$class' width='$width' height='$height'";

		$picturePath	= UPLOAD_PATH . $folder . DS . $prefix . $pictureName;
		if (file_exists($picturePath) == true) {
			$picture		= '<img  ' . $strAttribute . ' src="' . UPLOAD_URL . $folder . DS . $prefix . $pictureName . '">';
		} else {
			$picture	= '<img ' . $strAttribute . ' src="' . UPLOAD_URL . $folder . DS . $prefix . 'default.jpg' . '">';
		}

		return $picture;
	}

	// Create Title - Default
	public static function createTitle($imageURL, $titleName)
	{
		$xhtml = '<div class="title">
						<span class="title_icon"><img src="' . $imageURL . '" alt="" title=""></span>' . $titleName . '
					</div>';
		return $xhtml;
	}

	/*  DUC  */
	// Count Status
	public static function countStatus($source, $element, $arrValue)
	{
		$count = 0;
		foreach ($source as $value) {
			if ($value["$element"] == $arrValue) $count++;
		}
		return $count;
	}

	// Create Icon Status Group ACP
	public static function cmsAjax($type, $value, $link, $id)
	{
		$classA 	= ($value == 1) ? 'success' : 'danger';
		$classI 	= ($value == 1) ? 'fas fa-check' : 'fas fa-minus';

		if ($type == 'status') {
			$linkJavascript = 'changeStatus';
		} else if ($type == 'group-acp') {
			$linkJavascript = 'changeGroupACP';
		}
		
		$linkNew	= $link . $type;
		$xhtml		= '
		<a class="my-btn-state rounded-circle btn btn-sm btn-' . $classA . '" id="' . $type . '-' . $id . '" href="javascript:' . $linkJavascript . '(\'' . $linkNew . '\');">
			<i class="' . $classI . '" ></i>
		</a>
		';
		return $xhtml;
	}

	// HighLight Search Value
	public static function highLight($value, $strValue)
	{
		$result = str_replace($value, "<mark>$value</mark>", $strValue);
		return $result;
	}

	// HighLight Search Value
	public static function linkStatus($link, $name, $value)
	{
		$xhtml = '<a href="' . $link . '" class="mr-1 btn btn-sm btn-secondary">' . $name . '
		<span class="badge badge-pill badge-light">' . $value . '</span></a>';
		return $xhtml;
	}
}
