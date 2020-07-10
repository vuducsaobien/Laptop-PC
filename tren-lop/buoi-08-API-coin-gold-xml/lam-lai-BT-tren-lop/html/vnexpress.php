<div class="row pt-md-4">
	<div class="col-md-12">
			<div class="blog-entry ftco-animate d-md-flex">

			<?php

$urlVnexpress = 'https://vnexpress.net/rss/giai-tri.rss';
$dataVnexpress = simplexml_load_file($urlVnexpress);
$item = $dataVnexpress->channel->item[0];
$title = $item->title;
$day = $item->pubDate;
$link = $item->link;

$danhMuc = substr($dataVnexpress->channel->title,0,23);
$description = $dataVnexpress->channel->item[0]->description;
// $image = $description->

echo '<pre>';
print_r($description);
echo '</pre>';

?>
				<a href="single.html" class="img img-2" style="background-image: url(images/image_1.jpg);"></a>
				<div class="text text-2 pl-md-4">
		<h3 class="mb-2"><a href="<?php echo $link?>"><?php echo $title?></a></h3>
		<div class="meta-wrap">
						<p class="meta">
			<span><i class="icon-calendar mr-2"></i><?php echo $day?></span>
			<span><a href="single.html"><i class="icon-folder-o mr-2"></i><?php echo $danhMuc?></a></span>
		</p>
	</div>
		<p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
		<p><a href="#" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p>
	</div>
			</div>
		</div>

</div><!-- END-->
