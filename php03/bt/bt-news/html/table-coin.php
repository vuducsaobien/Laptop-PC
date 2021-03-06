<div class="sidebar-box ftco-animate">
	<h3 class="sidebar-heading">Giá COIN mới nhất VĂN ĐỨC</h3>
	<table>
		<tr>
			<th>Coin Name</th>
			<th>Current Price</th>
			<th>Change 24h (%)</th>
			<th>Total Volume</th>
		</tr>
		
		<?php // Lấy giá COIN Online API (VNEXPRESS RSS)
			$urlCoin  = 'https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=10&page=1&sparkline=false';
			$dataCoin = file_get_contents($urlCoin);
			$jsonCoin = json_decode($dataCoin, TRUE);

			foreach($jsonCoin as $keyCoin => $valueCoin){

				$coin 		= $valueCoin['name'] . ' (';
				$coinSymblo = strtoupper($valueCoin['symbol']) . ')';
				$coinName   = $coin . $coinSymblo;

				$coinPrice = '$' . number_format($valueCoin['current_price'], 2, ',', '.');

				$a 				= round($valueCoin['price_change_percentage_24h'], 2, PHP_ROUND_HALF_UP );
				$coinPercentage = number_format($a, 2, ',', '.') . ' %';
				
				$c 			= $valueCoin['total_volume']/1000000000;
				$coinVolume = '$' . number_format($c, 2, ',', '.') . ' B';

				$row  = '<tr>';
				$row .= '<td>' .$coinName .'</td>';
				$row .= '<td>' .$coinPrice .'</td>';
				$row .= '<td>' .$coinPercentage .'</td>';
				$row .= '<td>' .$coinVolume .'</td>';
				$row .= '</tr>';
				echo $row;
			}
		?>
	</table>
</div>
