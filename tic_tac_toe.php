<?php

function hasWon($matrix) {

	$dimension = count($matrix[0]);

	for($i=0;$i<$dimension;$i++) {
		
		if($matrix[$i][0] == NULL) {
			continue;
		}
		for($j=1;$j<$dimension;$j++) {
			if($matrix[$i][$j] === NULL || $matrix[$i][$j] != $matrix[$i][$j-1]) {
				break;
			} elseif($j == $dimension-1) {
				return $matrix[$i][$j] ;
			}

		}
	}

	for($i=0;$i<$dimension;$i++) {
		
		if($matrix[$i][0] == NULL) {
			continue;
		}
		for($j=1;$j<$dimension;$j++) {
			if($matrix[$j][$i] === NULL || $matrix[$j][$i] != $matrix[$j][$i-1]) {
				break;
			} elseif($j == $dimension-1) {
				return $matrix[$i][$j] ;
			}

		}
	}

	for($i=0;$i<$dimension-1;$i++) {
		
		if($matrix[$i][$i] == NULL) {
			break;
		}
		if($matrix[$i][$i] == $matrix[$i+1][$i+1]) {
			continue;
		}
	}

	if($i == $dimension-1) {
		return $matrix[$i][$i];
	}

	for($i=$dimension-1;$i>=0;$i--) {
		
		if($matrix[$i][$i] == NULL) {
			break;
		}
		if($matrix[$i][$i] == $matrix[$i+1][$i+1]) {
			continue;
		}
	}

	if(!$i) {
		return $matrix[$i][$i];
	}

   return NULL;

}


function BuildMatrix($array,$dimension) {
	for($i=0;$i<$dimension;$i++) {
		for($j=0;$j<$dimension;$j++) {
			if(count($array)) {
				$matrix[$i][$j] = array_shift($array);
			} else {
				$matrix[$i][$j] = NULL;
			}
			
		}
	}

	return $matrix;
}
///3x3 matrix

$matrix = array(1,0,0,1,1,0,1,0,1);
$matrix = BuildMatrix($matrix,3);
print_r($matrix);
echo hasWon($matrix)."\n";



?>