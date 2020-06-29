<?php include_once ('data.php');
$xhtmlMenu = '<ul class="dropDownMenu">';
foreach ($arrMenu as $keyMenuLV1 => $menuLV1){
    
    if (isset($menuLV1['child'])) {
        $arrMenuLV2 = $menuLV1['child'];
        $xhtmlMenu .= sprintf('<li><a href="%s">%s</a><ul>', $menuLV1['link'] , $menuLV1['name']);
        foreach ($arrMenuLV2 as $keyMenuLV2 => $menuLV2){
            $xhtmlMenu .= sprintf ('<li><a href="%s">%s</a></li>', $menuLV2['link'] , $menuLV2['name'] );
        }
        $xhtmlMenu .= '</ul></li>';
    } else {
        $xhtmlMenu .= sprintf ('<li><a href="%s">%s</a></li>', $menuLV1['link'] , $menuLV1['name'] );
    }
}
$xhtmlMenu .= '</ul>';
    
?>
<div class="menuBackground">
    <div class="center">
        <?php echo $xhtmlMenu; ?>
    </div>
</div>

