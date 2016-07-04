<?php

function swap(&$a,&$b) {
	$a = $a ^ $b;
	$b = $a ^ $b;
	$a = $a ^ $b;
}

$a = 3; $b= 4;
echo "original ($a,$b) \n";
swap($a,$b);
echo "after swap ($a,$b) \n";
?>