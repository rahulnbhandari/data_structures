<?php

 function FindLongestCommonPrefix($strings) {
	if(is_array($strings) && count($strings)>1) {
		$count = strlen($strings[0]);
		$prefix = "";
		$lastMatch = NULL;
		for($i=0;$i<$count;$i++) {
		
			foreach($strings as $string) {
				if(isset($string[$i])) {
					if($lastMatch !== NULL) {
						if($lastMatch != $string[$i]) {
							return $prefix;
						}
					} else {
						$lastMatch = $string[$i];
					}
					
				} else {
					return $prefix;
				}
			}
			$prefix = $prefix.$lastMatch;
			$lastMatch = NULL;

		}
			
		
		
	} else {
		throw Exception("Invalid input");
	}

	return $prefix;

}

//echo FindLongestCommonPrefix(array("geeksforgeeks","geeksandgeeks",'geeksy'))."\n";

?>