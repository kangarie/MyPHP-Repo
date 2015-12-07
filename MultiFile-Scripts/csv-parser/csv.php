<?php

$file = "data.csv";

if (($handle = fopen($file,"r")) !== FALSE){
	$row = 0;
	while (($data = fgetcsv($handle,1000,",","'")) !== FALSE){
		echo $row . " | " . $data[0] . " | " . $data[3] . "<br /> \n";
		$row++;
	}

	fclose($handle);
}
