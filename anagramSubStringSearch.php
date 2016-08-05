<?

//anangramsubstring search

function findAnagramSubstringSearch($string,$substring) {

	if(!(is_string($string) && is_string($substring))) {
		throw new Exception("Invalid string");
	}

	$countSubString = strlen($substring);
	$countString = strlen($string);

	if(($countSubString > $countString) && ($countSubString && $countString)) {
		throw new Exception("Invalid string");
	} 

	

	$mapSubString = array();

	for($i=0;$i<$countSubString;$i++) {
		$mapSubString[$substring[$i]]++;
	}

	$tempMap = $mapSubString;
	$tempCount = $countSubString;

	for($i = 0; $i < $countString; $i++) {
		if(isset($tempMap[$string[$i]]) && $tempMap[$string[$i]]) {
			$tempMap[$string[$i]]--;
			$tempCount--; 
			if($tempCount) {
				continue;
			}
		} elseif($tempCount == $countSubString) {
			continue;
		} 

		

		if(!$tempCount) {
				$result[] = $i+1-$countSubString;
				$tempMap[$string[$i+1-$countSubString]]++;
				$tempCount = 1;
		} else {
			$tempMap = $mapSubString;
			$tempCount = $countSubString;
			
		}

		
		
		
	}

	return $result;





}
$string = "BACDGABCDA"; $substring = "ABCD";
$result = findAnagramSubstringSearch($string,$substring);
print_r($result);

