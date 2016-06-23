<?php
 define(MAX_QUEUE_SIZE,100);
 class Queue {

 	private $queue_size = MAX_QUEUE_SIZE;
 	private $front = 0;
 	private $size = 0;
 	private $queue_array = array();

 	public function __construct($queue_size) {
 		if($queue_size <= MAX_QUEUE_SIZE) {
 			$this->queue_size = $queue_size;
 		} 
 	}

 	

 	public function Enqueue($data) {
 		if($this->size == $this->queue_size) {
 			throw new Exception("Queue is full");
 		}
 		$this->queue_array[($this->front+$this->size)%$this->queue_size] = $data;
 		$this->size++;
 	}


 	public function Dequeue() {
 		if($this->size) {
 			$data = $this->queue_array[$this->front];
 			$this->queue_array[$this->front] = NULL;
 			$this->size--;
			$this->front = ($this->front+1) % $this->queue_size; 
			return $data;
 		} else {
 			throw new Exception("Queue is empty");
 		}
 		
 	}

 	public function GetSize() {
 		return $this->size;
 	}

 	public function IsFull() {
 		return $this->size == $this->queue_size;
 	}

 	public function IsEmpty() {
 		return !$this->size;
 	}



 }

 

?>