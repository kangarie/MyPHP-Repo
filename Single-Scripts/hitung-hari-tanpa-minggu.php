<?php
date_default_timezone_set("Asia/Jakarta");

$date1 = '2015-07-01';
$date2 = '2015-08-01';

$days=1;
for ($i = 0; $i < ((strtotime($date2) - strtotime($date1)) / 86400); $i++)
	if(date('w',strtotime($date1) + ($i * 86400)) > 0)
		$days++;

echo $days;
