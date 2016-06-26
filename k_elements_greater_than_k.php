<?php

//Maximum value K such that array has at-least K elements that are >= K

function findMaxNum ($array) {
	$count = count($array);
	$map = array();
	if($count ) {
		foreach($array as $num) {
			if($num>0) {
				$num = $num>$count?$count:$num;
				isset($map[$num])?$map[$num]++:($map[$num]=1);
			}
			
		}
		if(count($map)) {
			while($count) {
				if(isset($count)) {
					$sum+=$map[$count];
					if($sum>=$count) {
						return $count;
					}
				}
				
				$count--;
			}

		}
	} 

	return 0;
	

}

$array1 = array(4, 7, 2, 3, 8);
echo findMaxNum($array1)."\n"; // answer 4


?>