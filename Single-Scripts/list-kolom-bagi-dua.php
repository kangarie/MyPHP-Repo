<?php

$data= 50;

$tengah = ceil($data/2);

for($i=1; $i <= $tengah; $i++) {
	$j = $i+$tengah;
	if($j <= $data)
		echo "Baris $i | Baris $j <br> \n";
	else
		echo "Baris $i<br> \n";
}
