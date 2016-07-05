<?php
	//print_r(range(0,51));
	function shuffleCards(&$cards) {
		$cardsLength = count($cards);
		for($i=0;$i<$cardsLength;$i++) {
			$index = mt_rand(0,$cardsLength-1-$i)+$i;
			$temp = $cards[$index];
			$cards[$index] = $cards[$i];
			$cards[$i] = $temp;
		}
		return $cards;
	}
	$cards = range(0,51);
	shuffleCards($cards);
	print_r($cards);
?>