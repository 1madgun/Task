<title>Task1</title>

<!-- 1 -->
<h4>1. Create a function to calculate the area of a square.</h4>
<?php
	$sisi1 = 2;
	$sisi2 = 2;
	echo "Sisi Persegi : ".$sisi1." dan ".$sisi2."<br>";
	function luasPersegi($sisi1,$sisi2){
		echo "Luas Persegi : ";
		$hasil = $sisi1 * $sisi2;
		return $hasil;
	}
	echo luasPersegi($sisi1,$sisi2); 
?>

<!-- 2 -->
<h4>2. write a php script to split the following string sample string 120831 expected output 12 08 31</h4>
<?php
	$tanggal = 120831;
	echo "Sebelum : ".$tanggal;
	$pisah = str_split($tanggal,2);
	echo "<br>Sesudah : ".implode(" ", $pisah);
?>

<!-- 3 -->
<h4>3. Write a function to display the middle character of a string.</h4>
<?php
	$teks_input = "The Haskells";
	echo $teks_input."<br>";
	middleChar(str_replace(" ", "", $teks_input));

	function middleChar($input){
		$teks_hitung = strlen($input);
		$jumlah = $teks_hitung%2;
		if ($jumlah == 0) {
			$angka = ($teks_hitung/2)-1;
			echo "The middle character in the string : ".substr($input, $angka, -$angka);
		}
		else{
			$angka = ($teks_hitung/2)-0.5;
			echo "The middle character in the string : ".substr($input, $angka, -$angka);
		}
	}
?>

<!-- 4 -->
<h4>4. Write a function to count all vowels in a string.</h4>
<?php
	$teks_masuk = "Ulah Adigung";
	echo $teks_masuk."<br>";
	function allVowels($teks){
		echo "Number of Vowels in the string : ".preg_match_all('/[aeiou]/i',$teks,$matches);
	}

	allVowels($teks_masuk);
?>

<!-- 5 -->
<h4>5. Write a function to count all words in a string.</h4>
<?php
	$kalimat = "Achmad Guntur Maulana";
	echo $kalimat."<br>";
	countWords($kalimat);
	function countWords($kalimat){
		$jumlah_kata = str_word_count($kalimat);
		echo "Number of words in the string : ".$jumlah_kata;
	}
?>

<!-- 6 -->
<h4>6. Write a function to compute the future investment value at a given interest rate for a specified number of years.</h4>
<?php
	$invest = 1000;
	$rate = 10;
	$years = 5;

	$newrate = $rate*0.01;

	function investAmount($investment,$rates,$year){
		$amount = number_format($investment * pow(1+$rates/12,$year*12),2,",","");
		echo $amount;
	}
?>
<table border="1">
	<thead>
		<th>Years</th>
		<th>FutureValue</th>
	</thead>
	<tbody>
		<?php
		for ($i=1; $i <= $years; $i++) { 
		?>
		<tr>
			<td><?= $i; ?></td>
			<td><?= investAmount($invest,$newrate,$i); ?></td>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>

<!-- 7 -->
<h4>7. Write a function to print characters between two characters (i.e. A to P ).</h4>
<?php
	printChar('(','z');
	
	function printChar($from, $to){		
		$count = 0;
		foreach (range($from, $to) as $char) {
	    $count++;
	    if ($count%20 == 0) {
	    	echo $char."\n<br>";
	    }
	    else{
	    	echo $char."\n";
	    }
		}
	}
?>