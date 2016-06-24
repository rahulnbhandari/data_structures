<?php

class Node {
	public $data;
	public $next = NULL;

	public function __construct ($data) {
		$this->data = $data;
	}

	public function getData() {
		return $this->data;
	}

	public function getNext() {
		return $this->next;
	}
}

class LinkedList {

	private $head = NULL;
	private $count = 0;
	public function InsertAtFirst($data) {
		$head = new Node($data);
		if($this->head === NULL ) {
			$this->head = new Node($data);
		} else {
			$head->next = $this->head;
			$this->head = $head;
		}
		$this->count++;
		return;
	}	

	public function InsertAtLast($data) {

		if($this->head == NULL) {
			return $this->InsertAtFirst($data); 
		}

		$tail = $this->head;
		while($tail->next) {
			$tail = $tail->next;
		}

		$tail->next = new Node($data);
		$this->count++;



	}

	public function push($data) {
		return $this->InsertAtLast($data);
	}

	public function pop() {

		if($this->count && $this->head) {
			$tail = $this->head; 
			if($tail->next) {
				while($tail->next->next) {
					$tail = $tail->next;
				}
				$result = $tail->next->data;
				$tail->next = NULL;
			} else {
				$result = $tail->data;
				$this->head = NULL;
			}
			$this->count--;
			return $result;
		}

		throw Exception("List is empty");

	}

	

}
/*
$list = new LinkedList();
$list->push(1);
$list->push(2);
$list->push(3);
echo $list->pop()."\n";
echo $list->pop()."\n";
echo $list->pop()."\n";
$list->InsertAtFirst(23);
$list->push(8);
$list->push(11);
echo $list->pop()."\n";

$list->push(1);
echo $list->pop()."\n";
echo $list->pop()."\n";
echo $list->pop()."\n";

*/
?>

