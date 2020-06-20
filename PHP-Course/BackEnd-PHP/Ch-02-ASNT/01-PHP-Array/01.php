	<?php
        $course   = array("PHP" , "Zend FrameWork" , "Joomla" );

        echo "<pre>";
        print_r ($course);
        echo "</pre>";

        if (!empty ($course)) {
                foreach ($course as $key => $value) {
                        echo $value . "<br/>";
                }
        }
	?>
