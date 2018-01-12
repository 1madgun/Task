<title>Task 2</title>
<!-- 1 -->
<h4>1. Write a script which will display the following string.</h4>
<?php
	$color = array('white', 'green', 'red', 'blue', 'black');
	echo "\"The memory of that scene for me is like a frame of film forever frozen at that moment:
	<br>the <u>$color[2]</u> carpet, the <u>$color[1]</u> lawn, the <u>$color[0]</u> house, the leaden sky. The new president and
	<br>his first lady. - Richard M. Nixon&quot;\"";
?>

<!-- 2 -->
<h4>2. Write a PHP script which will display the colors in the following way.</h4>
<?php
	$color = array('white','green','red');
	
	//=====Kepingggi=====//

	foreach ($color as $col) {
		echo $col.", ";
	}

	//=====Kebawah=====//

	sort($color);
	echo "<ul>";
	foreach ($color as $lor) {
		sort($color);
		echo "<li>".$lor."</li>";
	}
	echo "</ul>";
?>

<!-- 3 -->
<h4>3. Create a PHP script which displays the capital and country name from the above array.</h4>
<?php
	$ceu = array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels", "Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" => "Paris", "Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", "Germany" => "Berlin", "Greece" => "Athens", "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon", "Spain"=>"Madrid", "Sweden"=>"Stockholm", "United Kingdom"=>"London", "Cyprus"=>"Nicosia", "Lithuania"=>"Vilnius", "Czech Republic"=>"Prague", "Estonia"=>"Tallin", "Hungary"=>"Budapest", "Latvia"=>"Riga", "Malta"=>"Valetta", "Austria" => "Vienna", "Poland"=>"Warsaw");
	
	asort($ceu);
	foreach ($ceu as $negara => $ibunya) {
		echo "The capital of $negara is $ibunya<br>";
	}
?>

<!-- 5 -->
<h4>5. Write a PHP script to get the first element of the above array.</h4>
<?php
	$color = array(4=>"white", 6=>"green", 11=>"red");
	echo reset($color);
?>

<!-- 7 -->
<h4>7. Write a PHP script that inserts a new item in an array in any position</h4>
<?php
	$angka = array('1', '2', '3', '4', '5');
	echo "Original array :<br>";

	foreach ($angka as $ori) {
		echo $ori." ";
	}

	$masukan = '$';
	array_splice($angka,3,0, $masukan);
	echo "<br>After inserting '$masukan' the array is :<br>";
	foreach ($angka as $aft) {
		echo $aft." ";
	}
?>

<!-- 8 -->
<h4>8. Write a PHP script to sort the following associative array</h4>
<?php
	$nama = array("Sophia"=>"31","Jacob"=>"41","William"=>"39","Ramesh"=>"40");
	
	//=====Ascending Value=====//

	asort($nama);
	echo "ascending order sort by value :<br>";
	foreach ($nama as $name => $age) {
		echo "<li>$name $age</li>";
	}

	//=====Ascending Key=====//

	ksort($nama);
	echo "<br>ascending order sort by key :<br>";
	foreach ($nama as $name => $age) {
		echo "<li>$name $age</li>";
	}

	//=====Descending Value=====//

	arsort($nama);
	echo "<br>descending order sort by value :<br>";
	foreach ($nama as $name => $age) {
		echo "<li>$name $age</li>";
	}

	//=====Descending Key=====//

	krsort($nama);
	echo "<br>descending order sort by key :<br>";
	foreach ($nama as $name => $age) {
		echo "<li>$name $age</li>";
	}
?>

<!-- 9 -->

<h4>9. Write a PHP script to calculate and display average temperature, five lowest and highest temperatures.</h4>
<?php
	$temp = array(78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65, 74, 62, 62, 65, 64, 68, 73, 75, 79, 73);
	
	$totar = count($temp);
	$tottemp = array_sum($temp)."<br>";

	//=====Rata-rata=====//

	$rata = $tottemp/$totar;
	echo "Average temperature is : ".number_format($rata,1)."<br>";

	//=====Terendah=====//

	sort($temp);
	echo "List of five lowest temperature : ";
	for ($i=0; $i < 5 ; $i++) { 
		echo "$temp[$i], ";
	}

	//=====Tertinggi=====//

	echo "<br>List of five highest temperature : ";
	for ($i=($totar-5); $i < $totar; $i++) { 
		echo "$temp[$i], ";
	}
?>

<!-- 12 -->
<h4>12. Write a PHP function to change the following array all values to upper or lower case.</h4>
<?php
	$color = array('A' => 'Blue', 'B' => 'Green', 'c' => 'Red');

	//=====Lower Case=====//

	echo "Values are in lower case.<br>";
	print_r(array_map('strtolower', $color));

	echo "<br><br>";
	//=====Upper Case=====//

	echo "Values are in upper case.<br>";
	print_r(array_map('strtoupper', $color));
?>

<!-- 13 -->
<h4>13. Write a PHP script which displays all the numbers between 200 and 250 that are divisible by 4.</h4>
<?php
	echo implode(',', range(200, 250, 4));
?>

<!-- 14 -->
<h4>14. Write a PHP script to get the shortest/longest string length from an array.</h4>
<?php
	$data = array("abcd", "abc", "de", "hjjj", "g", "wer");
	$jumlah = array_map('strlen', $data);

	//=====Shortest=====//

	echo "The shortest array length is ".min($jumlah)."<br>";

	//=====Longest=====//

	echo "The longest array length is ".max($jumlah)."<br>";
?>

<!-- 15 -->
<h4>15. Write a PHP script to generate unique random numbers within a range.</h4>
<?php
	$jarak = range(11, 20);
	shuffle($jarak);
	foreach ($jarak as $val) {
		echo "$val ";
	}
?>

<!-- 16 -->
<h4>16. Write a PHP script to get the largest key in an array.</h4>
<p>
	$ex = array("A", "B", "C", "D");<br>
	echo "The largest key is : ".max(array_keys($ex));
</p>
<?php
	$ex = array("A", "B", "C", "D");
	echo "The largest key is : ".max(array_keys($ex));
?>

<!-- 17 -->
<h4>17. Write a PHP function that returns the lowest integer that is not 0.</h4>
<p>
	function returnValue(Array $value){<br>
		&nbsp&nbspreturn min(array_diff(array_map('intval', $value), array(0)));<br>
	}<br>
	print_r(returnValue(array(70,1,0,3,120))."\n");
</p>
<?php
	function returnValue(Array $value){
		return min(array_diff(array_map('intval', $value), array(0)));
	}
	print_r(returnValue(array(70,1,0,3,120))."\n");
?>

<!-- 36 -->
<h4>36. Write a PHP script to lower-case and upper-case, all elements in an array.</h4>

<!-- =====Upper===== -->
<p>
	<b>LowerCase</b><br>
	$arrlow = array("a", "b", "c");<br>
	print_r(array_map('strtoupper', $arrlow));
</p>
<?php
	$arrlow = array("a", "b", "c");
	print_r(array_map('strtoupper', $arrlow));
?>

<!-- =====Lower===== -->
<p>
	<b>UpperCase</b><br>
	$arrup = array("A", "B", "C");<br>
	print_r(array_map('strtolower', $arrup));
</p>
<?php
	$arrup = array("A", "B", "C");
	print_r(array_map('strtolower', $arrup));
?>

<!-- 37 -->
<h4>37. Write a PHP script to count the total number of times a specific value appears in an array.</h4>
<p>
	$arr = array("A","Cat","Dog","Dog","Dog");<br>
	$cnt = array_count_values($arr);<br>
	echo $cnt["Dog"];
</p>
<?php
	$arr = array("A","Cat","Dog","Dog","Dog");
	$cnt = array_count_values($arr);
	echo $cnt["Dog"];
?>