<?php
class Helper
{

    public static function showIconStatus($status)
    {
        $xhtml = '';
        if ($status == 0) {
            $class = 'fas fa-minus-square';
            $color = 'red';
        } else {
            $class = 'fas fa-check';
            $color = 'green';
        }
        $icon = '<i class="' . $class . '" style="color:' . $color . '";></i>';
        $xhtml = $icon;

        return $xhtml;
    }

    // public static function countValue($source, $element, $arrValue){
    //     $xhtml = '';
    //     $count = 0; 

    //     foreach($source as $value){
    //             if($value["$element"]==$arrValue) $count++;
    //     }
    //     return $count;
    // }

    public static function countValue($source, $element)
    {
        $xhtml      = '';
        $active     = 0;
        $inactive   = 0;
        $all = 0;

        foreach ($source as $value){
            ($value["$element"] == 1) ? $active++ : $inactive++;
            $all++;
        }

        $xhtml = 
        '<div class="list">
            <span>
                <p>Active: '.$active.' </p>
                <p>Inactive: '.$inactive.'</p>
                 <p>All: '. $all .'</p>
            </span>
        </div>';
        return $xhtml;
    }


    public static function searchPost($namePost)
    {
        $result = (!empty($_POST["$namePost"])) ? $_POST["$namePost"] : '';
        return $result;
    }


}
