
<?php
//Given the array of IDs, which contains many duplicate integers and one unique integer, find the unique integer.
//function returns array of non repeated numbers 
//assumption the number in the array cannot appear more than two times i.e first time when the delivery is sent out and the other time when the chimp comes back
 function findNonRepeatedNumber($array) {
 	$count = count($array);
 	if(!is_array($array) || !$count) {

 		return NULL; //or throw exception
 	}
 	
 	if($count == 1) {
 		return $array;
 	}

 	$map = array();

 	foreach($array as $number) {
 		if(isset($map[$number])) {
 			unset($map[$number]);
 		} else {
 			$map[$number] = true;
 		}
 		
 	}

 	if(count($map)) {
 		return array_keys($map); //array of non repetaed numbers
 	} else {
 		return $map; // empty array
 	}

 }

 //testing

 $array1 = array(1,2,3,2,1); //showuld return array with  "3"
 $array2 = array(1,3,4,5,6,8,10,3,4,2,2,8); // should return aray(1,5,6,10)
 $array3 = array(); //return NULL
 $array4 = array(1,2,3,1,3,2); //returns empty array

 print_r(findNonRepeatedNumber($array1));
 print_r(findNonRepeatedNumber($array2));
 print_r(findNonRepeatedNumber($array3));
 print_r(findNonRepeatedNumber($array4)); 
?>