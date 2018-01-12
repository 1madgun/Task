<title>OOP PHP</title>
<?php
	include 'classes.php';

	$pet = new Pet();
	$habitat = new Fourfooted();
	$cat = new Cat();
	$dog = new Dog();

	$pet->setName("Tom");
	echo $pet->getName();
	echo $habitat->Greet();
	echo $cat->Greet();
	echo $cat->Goes("meaw");
	echo "<br>";
	
	if ($dog instanceof Dog) {		
		$pet->setName("Bull");
		echo $pet->getName();
		echo $habitat->Greet();
		echo $dog->Greet();
		echo $dog->Goes("woof!");
	}
?>