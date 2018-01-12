<?php
include 'interface.php';

class Pet{
	private $name;

    public function getName(){
        return "My name is ".$this->name.", ";
    }

    public function setName($name){
		$this->name = $name;
    }
}

class Fourfooted extends Pet{

	public function Greet(){
		return "I'm a ".__CLASS__." animal, ";
	}
}

class Cat extends Fourfooted implements Sound{

	public function Greet(){
		return "I'm a ".__CLASS__.", ";
	}

	public function Goes($speak){
		$speak = $speak;
		echo "and I'm goes $speak";
	}
}

class Dog extends Fourfooted implements Sound{
	
	public function Greet(){
		return "I'm a ".__CLASS__.", ";
	}

	public function Goes($speak){
		$speak = $speak;
		echo "and I'm goes $speak";
	}
}
?>