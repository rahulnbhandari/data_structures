<?php

Class TrieNode {
	public $children,$end;

	public function __construct() {
		$this->children = array();
		$this->end = false;
	}
	

}

Class Trie {
	private $root;

	public function __construct() {
		$this->root = new TrieNode;
	}

	public function Insert($string) {

		$length = strlen($string);

		if(!$length) {
			throw Exception("Invalid String");
		}

		$tempNode = $this->root;
		

		for($i=0;$i<$length;$i++) {
			if(isset($tempNode->children[$string[$i]])) {
				$tempNode = $tempNode->children[$string[$i]];
			} else {
				$tempNode->children[$string[$i]] = new TrieNode();
				$tempNode = $tempNode->children[$string[$i]];
			} 
		}

		$tempNode->end = true;

		return true;

	}

	public function Search($string) {

		

		$tempNode = $this->searchNode($string);
		if(!$tempNode) {
			return false;
		}
		

		if($tempNode->end) {
			return true;
		}

		return false;

	}

	public function isPrefix($string) {
		$tempNode = $this->searchNode($string);
		if($tempNode) {
			return true;
		} else {
			return false;
		} 


	}

	private function searchNode($string) {

		$length = strlen($string);

		if(!$length) {
			throw Exception("Invalid String");
		}

		$tempNode = $this->root;

		for($i=0;$i<$length;$i++) {
			if(isset($tempNode->children[$string[$i]])) {
				$tempNode = $tempNode->children[$string[$i]];
			} else {
				return NULL;
			}
		}



		return $tempNode;
	}

	public function FindLargestPrefix($string) {

		$length = strlen($string);

		if(!$length) {
			throw Exception("Invalid String");
		}

		$tempNode = $this->root;

		for($i=0;$i<$length;$i++) {
			if(isset($tempNode->children[$string[$i]])) {
				$tempNode = $tempNode->children[$string[$i]];
			} else {
				if($i) {
					return substr($string,0,$i);
				} else {
					return NULL;
				}
				
			}
		}

		return $string;


	}



	
}

$trie = new Trie;

$trie->Insert("geeks");
$search = 'geek';

if($trie->isPrefix($search)) {
	echo "$search is a prefix\n";
} else {
	echo "$search is not a prefix\n";
}

echo $trie->FindLargestPrefix($search)."\n";

?>