<?php

function fib($n) {
	if($n == 0) {
		return 0;
	}


	$a = 0;
	$b = 1;

	for($i=2;$i<=$n;$i++) {
		$c = $a+$b;
		$a = $b;
		$b = $c;
		
	}

	return $b;




}

echo fib(1)."\n";
echo fib(16)."\n"
?>