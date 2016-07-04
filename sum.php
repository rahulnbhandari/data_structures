<?php
function getSum($x,$y) {
	if(!(is_integer($x) && is_integer($y))) {
		throw Exception("Inavlid integers");
	}

	while($y) {
		$carry = $x & $y;
		$x = $x ^ $y;
		$y = $carry << 1;

	}

	return $x;
}


echo getSum(3,4)."\n";
echo getSum(-3,10000)."\n";
?>