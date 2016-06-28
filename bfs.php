<?
//implement BFS in php
class Node {
	public $data,$left=NULL,$right=NULL;

	public function __construct($data) {
		
		$this->data = $data;
		
	}


}


class BST  {

	private $root = NULL;
	private $size = 0;

	public function Insert($data) {
		if(!$this->root) {
			$this->root = new Node($data);
		} else {
			$this->InsertNode($data,$this->root);
		}
		$size++;
		return;
	}

	 public function BFS($number) {
	 	if($this->root) {
	 		$queue = new SplQueue();
	 		$visited = array();
	 		$queue->enqueue($this->root);
	 		$visited[] = $this->root->data;

	 		while($queue->count()>0) {
	 			$node = $queue->dequeue();

	 			if($node->data == $number) {
	 				
	 				return true;
	 			}
	 			if($node->left) {
	 				if(!in_array($node->left->data,$visited)) {
	 					$visited[] = $node->left->data; 
	 					$queue->enqueue($node->left);
	 				}
	 			}
	 			if($node->right) {
	 				if(!in_array($node->right->data,$visited)) {
	 					$visited[] = $node->right->data; 
	 					$queue->enqueue($node->right);
	 				}
	 			}


	 		}
	 		
	 	}

	 	return false;

	 }


	protected function InsertNode($data,&$subtree) {
		if($data>$subtree->data) {
			
			if($subtree->right) {
				return $this->InsertNode($data,$subtree->right);
			} else {
				
				$subtree->right = new Node($data);
				return true;
			}
		} else {
			if($subtree->left) {
				return $this->InsertNode($data,$subtree->left);
			} else {
				
				$subtree->left = new Node($data);
				return true;
			}
		}
	}

	public function printTree($order) {
		switch ($order) {
			case "IN":
				return $this->InOrderTraversal($this->root);
				break;
			case "PRE":
			default :
				return $this->PreOrderTraversal($this->root);
				echo "\n";
				break;
		}
	}

	public function getTreeHeight() {
		if(!$this->root) {
			return 0;
		}
		return $this->getHeight($this->root);
	}

	protected function getHeight($subtree) {
		if($subtree) {
			$ldepth = $this->getHeight($subtree->left);
			$rdepth = $this->getHeight($subtree->right);
			return $ldepth>$rdepth?$ldepth+1:$rdepth+1;
		} else {
			return 0;
		}
	}

	protected  function PreOrderTraversal($root) {
		if($root) {
			$this->PreOrderTraversal($root->left);
			print $root->data." ";
			$this->PreOrderTraversal($root->right);

		}

		return;
	}

	protected  function InOrderTraversal($root) {
		if($root) {
			print $root->data." ";
			$this->PreOrderTraversal($root->left);
			$this->PreOrderTraversal($root->right);

		}

		return;
	}

	protected function GetBalancedHeight($node) {
		if($node == NULL) {
			return 0;
		}
		$ldepth = $this->GetBalancedHeight($node->left);
		if($ldepth == -1) {
			return -1;
		}

		$rdepth = $this->GetBalancedHeight($node->right);
		if($rdepth == -1) {
			return -1;
		}

		if(abs($ldepth-$rdepth)>1) {
			return -1;
		}

		return ($ldepth>$rdepth?$ldepth:$rdepth)+1;



	} 

	public function isBalanced() {
		if($this->GetBalancedHeight($this->root)>=0) {
			return true;
		}
		return false;

	}


}

$array1 = [9,88,11,22,33,44,6,7,8,9];
$array2 = [9,6,99,7,8];

$bst = new BST;
foreach($array1 as $num) {
	$bst->Insert($num);
}

if($bst->isBalanced()) {
	echo "balanced\n";\
} else {
	echo "not balanced \n";
}

$bst->printTree("PRE"); echo "\n";
$bst->printTree("IN"); echo "\n";
echo $bst->getTreeHeight();echo "\n";
echo $bst->BFS(8);
//($bst->root);

?>