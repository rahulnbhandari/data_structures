<?php

function findHighestProductFromThreeIntegers($array) {
	$count = count($array);	
	if(!is_array($array) || $count<3) {
		return NULL; //or throw exceptioN
	}
	if($count == 3) {
		return $array[0]*$array[1]*$array[2];
	}

if(sort($array)) {

	$maxThreeIntegerProduct = $array[$count-1]*$array[$count-2]*$array[$count-3];
	if($array[0]<0 && $array[$count-1]>0) {
		$tempProduct =  $array[0]*$array[1]*$array[$count-1];
		return ($maxThreeIntegerProduct>$tempProduct?$maxThreeIntegerProduct:$tempProduct);
	} else {
		return $array[$count-1]*$array[$count-2]*$array[$count-3];
	}
}
}





 $array1 = array(-1,-5,-8,-10,0,8,6,10); //result => 10,-10,-8 = 800
 $array2 = array(250,9,100,78,90,200); //result => 250*200*100 = 50000000
 $array3 = array(-1,-30,-9,-17,-70); // result =>-1,-9,-17 = -153
 $array4 = array(-1,-7,-199,-76,-901,0,-877,-7777); //result => 0
 $array5 = array(1,100,20); // result 2000
 $array6 = array(10,11,20,-20,-30); // result -20,-30,20 = 12000
 
 print(findHighestProductFromThreeIntegers($array1)."\n");
 print(findHighestProductFromThreeIntegers($array2)."\n");
 print(findHighestProductFromThreeIntegers($array3)."\n");
 print(findHighestProductFromThreeIntegers($array4)."\n");
 print(findHighestProductFromThreeIntegers($array5)."\n");
 print(findHighestProductFromThreeIntegers($array6)."\n");


?>