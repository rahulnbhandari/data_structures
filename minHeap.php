<?php

class MinHeap {

	public $heap = array();

	public function Insert($data) {
		$count = count($this->heap);
		if(!$count) {
			$this->heap[1] = $data;
		} else {
			$this->heap[$count+1] = $data;
			$this->bubbleUp();
		}
		
	}

	private function bubbleUp() {
		$position = count($this->heap);
		$newpos = round($position/2);
		while($position>1 ) {
			if($this->heap[floor($position/2)]>$this->heap[$position]) {
				$this->swap(floor($position/2),$position);
			}
			$position = floor($position/2);
			
		}
	}

	public function ExtractMin() {
		$min = $this->heap[1];
		$count = count($this->heap);
		if($count>1) {
			$this->swap(1,$count);
			unset($this->heap[$count]);
			$count--;
			$this->sinkDown(1);
		} else {
			unset($this->heap[$count]);
		}
		
		
		return $min;
	}

	private function swap($pos1,$pos2) {

			if(isset($this->heap[$pos1]) && isset($this->heap[$pos2])) {
				$temp = $this->heap[$pos1];
				$this->heap[$pos1] = $this->heap[$pos2];
				$this->heap[$pos2] = $temp;
			} else {
				throw new Exception ("Invalid index");
			}
			
			
	}

	private function sinkDown($position) {
		$count = count($this->heap);
		
		$smallest = $position;
		if($count>1) {


			if(2*$position<=$count && $this->heap[$smallest]>$this->heap[2*$position] ) {
				
				$smallest = 2*$position;
			}

			if(2*$position+1<=$count && $this->heap[$smallest]>$this->heap[2*$position+1] ) {

				$smallest = 2*$position+1;
				
			}

			if($smallest!=$position) {
				$this->swap($smallest,$position);
				return $this->sinkDown($smallest);
			}
		}
		return;

	}




}

$minHeap = new MinHeap;
$array = [3,2,1,7,8,4,10,16,12];
foreach($array as $number) {
	$minHeap->Insert($number);

}

print_r($minHeap->heap);

foreach($minHeap->heap as $number) {
	$result[] = $minHeap->ExtractMin();
	//print_r($minHeap->heap);
}

print_r($result);
    

?>