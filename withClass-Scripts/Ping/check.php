<?php

date_default_timezone_set("Asia/Jakarta");

include "Ping.php";

use \JJG\Ping as Ping;

$hosts[] = "192.168.200.3";
$hosts[] = "192.168.200.4";
$hosts[] = "192.168.200.2";

$host = false;

foreach($hosts as $item) {
	$ping = new Ping($item);
	$latency = $ping->ping();

	if($latency !== false) {
		$host = $item;
		break;
	}
}

$route = `route -n`;
$cekRoute = strpos($route, $host);
$pos = strpos($route, "8.8.8.8");

if($cekRoute === false && $pos !== false)
	delRoute();

$route = `route -n`;
$pos = strpos($route, "8.8.8.8");

if ($host !== false) {
	if ($pos === false) {
		addRoute($host);
		echo date("d-M-Y H:i:s") . " route added $host\n";
	}
	else
		echo date("d-M-Y H:i:s") . " nothing to do\n";
}
else {
	if ($pos !== false) {
		delRoute();
		echo date("d-M-Y H:i:s") . " route deleted\n";
	}
	else
		echo date("d-M-Y H:i:s") . " nothing to do\n";
}

function addRoute($host) {
	exec("route add -net 8.8.8.8 netmask 255.255.255.255 gw $host");
	exec("route add -net 8.8.4.4 netmask 255.255.255.255 gw $host");
	exec("route add -net 208.67.222.222 netmask 255.255.255.255 gw $host");
	exec("route add -net 208.67.220.220 netmask 255.255.255.255 gw $host");

	return true;
}

function delRoute() {
	exec("route del -net 8.8.8.8 netmask 255.255.255.255");
	exec("route del -net 8.8.4.4 netmask 255.255.255.255");
	exec("route del -net 208.67.222.222 netmask 255.255.255.255");
	exec("route del -net 208.67.220.220 netmask 255.255.255.255");

	return true;
}
