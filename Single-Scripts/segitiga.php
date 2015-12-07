<center>
<pre><?php

//$n = isset($_GET['n']) ? $_GET['n'] : 5;

$n = 5;

for($i=1;$i<=$n;$i++) {
	for($j=1;$j<=$i;$j++) 
		echo "*";
	echo "\n";
}
