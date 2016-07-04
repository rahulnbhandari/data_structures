<?php
	function findGreatestSum($array) {
		$greatest_sum = 0;
		$sum = 0;
		$set = array();
		$greatest_set = array();
		foreach($array as $value) {

			$sum += $value;
			$set[] = $value;

			if($greatest_sum<$sum) {
				$greatest_sum = $sum;
				$greatest_set = $set;			
			} elseif($sum<0) {
				$sum = 0;
				$set = array();
			}
		}

		return array("sum"=>$greatest_sum,"list"=>$greatest_set);
	}

	$array = [5,-9,6,-2,3];
	print_r(findGreatestSum($array));

	/*
		Array
			(
			    [sum] => 7
			    [list] => Array
			        (
			            [0] => 6
			            [1] => -2
			            [2] => 3
			        )

			)
	*/



?>