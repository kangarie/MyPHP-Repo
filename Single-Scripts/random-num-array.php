<pre>
<?php

$target = 100;

while(1) {
	$a = array();
	$a[] = rand(0,100);
	$a[] = rand(0,100);
	$a[] = rand(0,100);
	$a[] = rand(0,100);

	if(array_sum($a) < 100)
		break;
}

$a[] = $target - array_sum($a);

echo "Bilangan : ". implode (", ",$a) . "\n";
echo "Total : " . array_sum($a) . "\n";
