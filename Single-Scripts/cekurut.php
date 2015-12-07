<?php

$a1 = array(1,2,3,4,5,6,7,8,9,10);
$a2 = array(2,4,2,5,2,5,4,2);
$a3 = $a1;
$a3 = rsort($a3);

function cekUrut(array $a) {
	$tmp = $a;
	$tmp = rsort($tmp,SORT_NUMERIC );
	if ($a == $tmp)
		return true;
	else
		return false;
}

print_r($a1);

/*
if(cekUrut($a2))
	echo "ok";

print_r($a1);
print_r($a2);
print_r($a3);
*/
