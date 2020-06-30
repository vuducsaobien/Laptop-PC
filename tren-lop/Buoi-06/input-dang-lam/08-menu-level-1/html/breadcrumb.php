<?php include_once ('html/data.php'); 
foreach ($arrMenu as $keyMenuLV1 => $menuLV1){
        $span = sprintf('<span>%s</span>' , $menuLV1['name'] );
    }
    ?>

<div class="breadcrumb">
         <a href="index.php">Home</a>
         <span>></span>
         <?php echo $span ?>
      </div>
