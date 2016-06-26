<?php

//counting inversion solutions

function merge_sort($array,&$inversions) {
	$count = count($array);
	if ($count<=1) {
		return $array;
	}
	$left = array_slice($array,0,$count/2);
	$right = array_slice($array,$count/2);
	
	$left = merge_sort($left,$inversions);
	$right = merge_sort($right,$inversions);
	
	return merge($left,$right,$inversions);

}

function merge($left,$right,&$inversions) {
	$result = array();
	$i = 0;
	$j = 0;
	while(count($left) > 0 && count($right) > 0) {
		//echo $i;
		if($left[$i]<=$right[$j]) {
			$result[] = $left[$i];
			unset($left[$i]);
			$i++;
		} else {
			$result[] = $right[$j];
			unset($right[$j]);
			$j++;
			$inversions++;
		}
		
	}
	if(count($left)) {
		$result = array_merge($result,$left);
	} elseif(count($right)) {
		$result = array_merge($result,$right);
	}
	return $result;
}

$inversions = 0;
$array = [3,2,1,-1];
$array = merge_sort($array,$inversions);
print_r($array);
echo $inversions;


?>
