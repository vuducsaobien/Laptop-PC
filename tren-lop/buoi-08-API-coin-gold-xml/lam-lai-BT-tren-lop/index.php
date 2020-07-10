<!DOCTYPE html>
<html lang="en">
  <head>
	  <?php
	  require_once 'define.php';
	  require_once DIR_HTML .'head.php'; 
	  ?>
  </head>
  <body>

	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight">
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li class="colorlib-active"><a href="index.html">Home</a></li>
					<li><a href="fashion.html">Fashion</a></li>
					<li><a href="travel.html">Travel</a></li>
					<li><a href="about.html">About</a></li>
					<li><a href="contact.html">Contact</a></li>
				</ul>
			</nav>

			<div class="colorlib-footer">
				<h1 id="colorlib-logo" class="mb-4"><a href="index.html" style="background-image: url(images/bg_1.jpg);">Andrea <span>Moore</span></a></h1>
				<div class="mb-4">
					<h3>Subscribe for newsletter</h3>
					<form action="#" class="colorlib-subscribe-form">
            <div class="form-group d-flex">
            	<div class="icon"><span class="icon-paper-plane"></span></div>
              <input type="text" class="form-control" placeholder="Enter Email Address">
            </div>
          </form>
				</div>
				<p class="pfooter"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
	  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
	  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
			</div>
		</aside> <!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">
			<section class="ftco-section ftco-no-pt ftco-no-pb">
	    	<div class="container">
	    		<div class="row d-flex">
	    			<div class="col-xl-8 py-5 px-md-5">
	    				<div class="row pt-md-4">

			    			<div class="col-md-12">
									<div class="blog-entry ftco-animate d-md-flex">
										<a href="single.html" class="img img-2" style="background-image: url(images/image_1.jpg);"></a>
										<div class="text text-2 pl-md-4">
				              <h3 class="mb-2"><a href="single.html">A Loving Heart is the Truest Wisdom</a></h3>
				              <div class="meta-wrap">
												<p class="meta">
				              		<span><i class="icon-calendar mr-2"></i>June 28, 2019</span>
				              		<span><a href="single.html"><i class="icon-folder-o mr-2"></i>Travel</a></span>
				              		<span><i class="icon-comment2 mr-2"></i>5 Comment</span>
				              	</p>
			              	</div>
				              <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
				              <p><a href="#" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p>
				            </div>
									</div>
								</div>

			    		</div><!-- END-->
				<?php /////////////
				$urlGold = 'http://www.sjc.com.vn/xml/tygiavang.xml';
				$dataGold = simplexml_load_file($urlGold);
				echo $dataGold -> ratelist -> attributes;
				
				echo '<pre>';
				print_r($dataGold -> ratelist -> attributes);
				echo '</pre>';

				$array = (array) $dataGold;
				$arrayRatelist = (array) ($array -> ratelist);


				echo '<pre>';
				print_r($array);
				echo '</pre>';
				
				// echo count($jsonCoin);
				// foreach($jsonCoin as $keyCoin => $valueCoin){
				// 	echo $valueCoin['name'] . ' (';
				// 	echo strtoupper($valueCoin['symbol']) . ')<br>';
				// 	echo $valueCoin['current_price'] . ' $<br>';
				// 	echo round($valueCoin['price_change_percentage_24h'], 2, PHP_ROUND_HALF_UP ) . '%<br>';
				// 	$a = $valueCoin['total_volume']/1000000000 ;
				// 	echo $b = '$ ' . number_format($a,2,'.','.') . ' billion<hr>';
				// }




				?>
			    		<div class="row">
			          <div class="col">
			            <div class="block-27">
			              <ul>
			                <li><a href="#">&lt;</a></li>
			                <li class="active"><span>1</span></li>
			                <li><a href="#">2</a></li>
			                <li><a href="#">3</a></li>
			                <li><a href="#">4</a></li>
			                <li><a href="#">5</a></li>
			                <li><a href="#">&gt;</a></li>
			              </ul>
			            </div>
			          </div>
			        </div>
			    	</div>
	    			<div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
				
				<?php require_once DIR_HTML . 'table-coin.php'; ?>

				<div class="sidebar-box ftco-animate">
					<h3 class="sidebar-heading">Giá VÀNG mới nhất</h3>
					<table>
					<tr>
						<th>Gold Name</th>
						<th>Current Price</th>
						<th>Change 24h (%)</th>
						<th>Total Volume</th>
					</tr>

					<?php // Lấy giá GOLD Online
					// $urlGold = 'http://www.sjc.com.vn/xml/tygiavang.xml';
					// echo $dataGold = simplexml_load_file($urlGold);
					// $jsonGold = json_decode($data, TRUE);

					// 	foreach($jsonGold as $keyGold => $valueGold){
					// 		$Gold = $valueGold['name'] . ' (';
					// 		$GoldSymblo = strtoupper($valueGold['symbol']) . ')';
					// 		$GoldName = $Gold . $GoldSymblo;
					// 		$GoldPrice = '$ ' . $valueGold['current_price'];
					// 		$GoldPercentage = round($valueGold['price_change_percentage_24h'], 2, PHP_ROUND_HALF_UP ) . ' %';
					// 		$a = $valueGold['total_volume']/1000000000 ;
					// 		$GoldVolume = '$ ' . number_format($a,2,'.','.') . ' B<br>';

					// 		$row = '<tr>';
					// 		$row .= '<td>' .$GoldName .'</td>';
					// 		$row .= '<td>' .$GoldPrice .'</td>';
					// 		$row .= '<td>' .$GoldPercentage .'</td>';
					// 		$row .= '<td>' .$GoldVolume .'</td>';
					// 		$row .= '</tr>';
					// 		echo $row;
					// 	}
					?>

					</table>
				</div>

				<?php /////////////?>


	              </form>
	            </div>
	          </div><!-- END COL -->
	    		</div>
	    	</div>
	    </section>
		</div><!-- END COLORLIB-MAIN -->
	</div><!-- END COLORLIB-PAGE -->

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<?php
require_once DIR_HTML .'script.php'; 
?>
    
  </body>
</html>