<?php
/*
Length of the longest substring without repeating characters
*/

function longestSubstring($string) {

	$longestSubstring = '';
	$visited = array();
	$tempLongestSubstring = '';
	$length = strlen($string);
	$prev_index = 0;

	for($i=0;$i<$length;$i++) {
		if(isset($visited[$string[$i]])) {
			if(strlen($longestSubstring) < strlen($tempLongestSubstring)) {
				$longestSubstring = $tempLongestSubstring;
			}
			$tempLongestSubstring = substr($tempLongestSubstring,$visited[$i]-$prev_index);
			$prev_index = $visited[$i]+1;
		} else {
			$tempLongestSubstring .= $string[$i];
		}
		$visited[$string[$i]] = $i;
	}

	if(strlen($longestSubstring) < strlen($tempLongestSubstring)) {
				$longestSubstring = $tempLongestSubstring;
	}

	return $longestSubstring;
}

echo longestSubstring("ABDEFGABEF");

?>