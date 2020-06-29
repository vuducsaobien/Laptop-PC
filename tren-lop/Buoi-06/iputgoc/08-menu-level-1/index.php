<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
      <title>Index Menu Level 2</title>
      <link rel="stylesheet" href="./css/styles.css" />
   </head>
   <body>
      <div class="menuBackground">
         <div class="center">
                  <ul class="dropDownMenu">
                                             <li ><a href="index.php">Home </a></li>
                                             <li class="active">
                                                <a href="data/about.php">About</a>
                                             </li>
                                             <li ><a href="data/contact.php">Contact </a></li>
                  </ul>
         </div>
      </div>
      <div class="breadcrumb">
         <a href="index.php">Home</a>
         <span>></span>
         <span>About</span>
      </div>

      <h3>About</h3>
   </body>
</html>

         $xhtmlMenuLV1 = '<ul class="dropDownMenu">';
                  foreach ($arrMenu as $keyMenuLV1 => $menuLV1){

                     $xhtmlMenuLV1 .= sprintf ( '<li ><a href="%s">%s</a></li>' , $menuLV1['link'] , $menuLV1['name'] );
                     if ( isset() ){

                     }
                  }
         $xhtmlMenuLV1 .= '</ul>';
