<?php
class Helper{
	
	public static function showIconStatus($status){
        $xhtml = '';
        if($status==0){
            $class = 'fas fa-minus-square';
            $color = 'red';
        } else {
            $class = 'fas fa-check';
            $color = 'green';
        }
        $icon = '<i class="'.$class.'" style="color:'.$color.'";></i>';
        $xhtml = $icon;

        return $xhtml;
    }


    public static function countStatus($status){
        $xhtml = '';
        $countActive = 0; 
        $countInactive = 0; 
        $countALL = 0; 
        foreach($status as $value){
            ($value['status']==1) ? $countActive++ : $countInactive++;
        }
        $countALL = $countActive + $countInactive;
        $xhtml = '
            <div>
                <span>Active: '.$countActive.' Group</span></br>
                <span>Inactive: '.$countInactive.' Group</span></br>
                <span>ALL: '.$countALL.' Group</span></br>
            </div>
            ';
            return $xhtml;
        }

    // public static function searchPost($postElement){
    //     foreach($postElement as $value){
    //         $aa = $_POST["$value"];

    //         if($_POST['clear']!=null){
    //             $aa = '';
    //         }
    //     }

    //     return $aa;
    // }

    public static function searchPost($postElement){
            // echo '<br>';
            $aa = $_POST["$postElement"];

            if($_POST['clear']!=null){
                $aa = '';
            }
            
            return $aa;
        }

}