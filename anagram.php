<?php


function isAnagram($string1,$string2)  {

	if(strlen($string1) != strlen($string2) ) {

		return false;
	}
	$count = strlen($string1);
	$map1 = array();
	$map2 = array();

	for($i=0;$i<$count;$i++) {

		if(isset($map1[$string1[$i]])) {
			$map1[$string1[$i]]++;
		} else {
			$map1[$string1[$i]] = 1;
		}

		if(isset($map2[$string2[$i]])) {
			$map2[$string2[$i]]++;
		} else {
			$map2[$string2[$i]] = 1;
		}

		if(isset($map2[$string1[$i]])) {
			if($map1[$string1[$i]] == $map2[$string1[$i]]) {
				unset($map2[$string1[$i]]);
				unset($map1[$string1[$i]]);
			}
		}
		if(isset($map1[$string2[$i]])) {
			if($map1[$string2[$i]] == $map2[$string2[$i]]) {
				unset($map2[$string2[$i]]);
				unset($map1[$string2[$i]]);
			}

		}
		
	}

	
	if(count($map1) || count($map2)){
		return false;
	}

	return true;

}

$string1 = "abcfg";
$string2 = "cfgah";

if(isAnagram($string1,$string2)) {
	echo "$string1 $string2 are anagram\n";
} else {
	echo "$string1 $string2 are not anagram\n";
}
?>