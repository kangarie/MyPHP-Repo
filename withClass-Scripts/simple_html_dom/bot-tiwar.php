<?php
date_default_timezone_set("Asia/Jakarta");
require "simple_html_dom.php";

$username = "";
$password = "";
$debug    = false;
$baseURL  = "http://tiwar-id.net";

halaman_utama:
echo "Clear cookie\n";
@unlink("$username.txt");

echo "Buka halaman awal\n";
$out = getUrl($baseURL);

$html = str_get_html($out);
foreach($html->find('a.btn') as $row) {
	$sessionID = str_replace("/startpage/?","",$row->href);
	break;
}

halaman_login:
echo "Buka halaman login\n";
$url = $baseURL."?sign_in=1&".$sessionID;
getUrl($url);

proses_login:
echo "Proses login\n";
postUrl($baseURL,"login=$username&pass=$password",$baseURL."/?sign_in=1&$sessionID");

halaman_duel:
echo "username : $username\n";
echo "Buka halaman duel\n";
$out = getUrl($baseURL . "/duel");
if($debug) echo $out;

$html = str_get_html($out);
foreach($html->find('b') as $row)
        $num = intval($row->plaintext);

echo "sisa petarungan : $num\n";

if($num == 0) goto end_duel;

$tmp = array();
$html = str_get_html($out);
foreach($html->find('div.block_zero') as $row)
        $tmp[] = $row->plaintext;

$my = explode("\n",$tmp[2]);
$my = trim(preg_replace('!\s+!', ' ', $my[1]));
$my = explode(" ",$my);

$foe = explode("\n",$tmp[1]);
$foe = trim(preg_replace('!\s+!', ' ', $foe[3]));
$foe = explode(" ",$foe);

echo "stat anda  : " . implode(",",$my) . "\n";
echo "stat musuh : " . implode(",",$foe) . "\n";

$a = $my[0]-$foe[0]-100;
$b = $my[1]-$foe[1]-100;
$c = $my[2]-$foe[2]-100;
$d = $my[3]-$foe[3]-100;

if($a > 0 && $b > 0 && $c > 0 && $d >0) {
	echo "attack\n";
	foreach($html->find('a.btn') as $row) {
		$url = $row->href;
		if(strpos($url,"duel/fight")) break;
	}

	$url = $baseURL . $url;
	echo $url . "\n";
	$out = getUrl($url,$baseURL . "/duel");

	goto halaman_duel;
}
else {
	echo "lawan kuat, cari yang lain\n";
	echo "cek sisa\n";

	$sisa = explode("\n",$tmp[3]);
	$sisa = filter_var($sisa[1], FILTER_SANITIZE_NUMBER_INT);

	if($sisa >0 && $sisa <=5) {
		echo "sisa : $sisa\n";
		foreach($html->find('a.btn') as $row)
				$url = $row->href;

		$url = $baseURL . $url;
		echo $url . "\n";
		$out = getUrl($url,$baseURL . "/duel");

		goto halaman_duel;
	}
	else
		echo "sudah tidak ada sisa\n";
}
end_duel:

halaman_cave:
echo "Buka halaman cave\n";
$out = getUrl($baseURL. "/cave/");

if($debug) echo $out;

$html = str_get_html($out);
foreach($html->find('a.btn') as $row) {
        $url = $row->href;
        if(strpos($url,"cave/runaway")) break;
}

if(strpos($url,"cave/runaway")) { 
	echo "Ada monster, kabur\n";
	$url = $baseURL . $url;
	echo $url . "\n";
	$out = getUrl($url,$baseURL . "/cave");

	goto halaman_cave;
}

$html = str_get_html($out);
foreach($html->find('a.btn') as $row) {
        $url = $row->href;
        if(strpos($url,"cave/down")) break;
}

if(strpos($url,"cave/down")) { 
	echo "Proses cave down\n";
	$url = $baseURL . $url;
	echo $url . "\n";
	$out = getUrl($url,$baseURL . "/cave");
}

$html = str_get_html($out);
foreach($html->find('a.btn') as $row) {
        $url = $row->href;
        if(strpos($url,"cave/gather")) break;
}

if(strpos($url,"cave/gather")) { 
	echo "Proses cave gather\n";
	$url = $baseURL . $url;
	echo $url . "\n";
	$out = getUrl($url,$baseURL . "/cave");
}

halaman_quest:
echo "Buka halaman quest\n";
getUrl($baseURL . "/sage/");
$out = getUrl($baseURL . "/quest/",$baseURL."/sage/");
if($debug) echo $out;

$html = str_get_html($out);
foreach($html->find('a.btn') as $row) {
	$url = $row->href;
	if(strpos($url,"quest/end")) break;
}

if(strpos($url,"quest/end")) {
	echo "Ada quest\n";
	$url = "http://tiwar-id.net$url";
	echo $url . "\n";
	$out = getUrl($url,$baseURL . "/quest");

	goto halaman_quest;
}
else
	echo "Tidak ada quest\n";

halaman_gold:
echo "Buka halaman trade\n";
$out = getUrl($baseURL . "/trade/");
if($debug) echo $out;

$html = str_get_html($out);
foreach($html->find('a') as $row) {
        $url = $row->href;
        if(strpos($url,"trade/exchange")) break;
}

if(strpos($url,"trade/exchange")) { 
	echo "Buka halaman exchange\n";
	$url = $baseURL . $url;
	$temp = $url;
	echo $url . "\n";
	$out = getUrl($url,$baseURL . "/trade");

	$gold = array();
	$html = str_get_html($out);
	foreach($html->find('a') as $row) {
			$url = $row->href;
			if(strpos($url,"trade/exchange/silver")) break;
	}

	if(strpos($url,"trade/exchange/silver/")) {
		$url = $baseURL . $url;
		echo $url . "\n";
		$out = getUrl($url,$temp);

		goto halaman_gold;
	}
}

halaman_arena:
echo "Buka halaman arena\n";
$out = getUrl($baseURL . "/arena/");
if($debug) echo $out;

$html = str_get_html($out);
foreach($html->find('title') as $row) {
	$url = $row->plintext;
	if(strpos($url,"404")) exit;
}

$html = str_get_html($out);
foreach($html->find('a.btn') as $row) {
	$url = $row->href;
	if(strpos($url,"arena/attack")) break;
}

if(strpos($url,"arena/attack")) {
	$url = $baseURL . $url;
	echo $url . "\n";
	$out = getUrl($url,$baseURL . "/arena");

	unset($status);
	$html = str_get_html($out);
	foreach($html->find('h2') as $row) {
		$status = trim($row->plaintext);
		echo "Attack status : $status\n";
		break;
	}
	if(strlen($status) == 0) {
		$html = str_get_html($out);
		foreach($html->find('div.foot') as $row)
			echo "stat : ".$row->plaintext . "\n";	

		echo date("H:i:s") . " Istirahat\n";
		sleep(900);
		goto halaman_duel;
	}
}

goto halaman_arena;

function getUrl($url, $ref="http://tiwar-id.net") {
	sleep(2);
	global $username;
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_PROXY, "192.168.200.4:1080");
	curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36");
	curl_setopt($ch, CURLOPT_COOKIEFILE, "$username.txt");
	curl_setopt($ch, CURLOPT_COOKIEJAR, "$username.txt");
	if(strlen($ref) > 0) curl_setopt($ch, CURLOPT_REFERER, $ref);
	return curl_exec($ch);
}

function postUrl($url,$post, $ref) {
	sleep(2);
	global $username;
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_PROXY, "192.168.200.4:1080");
	curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36");
	curl_setopt($ch, CURLOPT_COOKIEFILE, "$username.txt");
	curl_setopt($ch, CURLOPT_COOKIEJAR, "$username.txt");
	curl_setopt($ch, CURLOPT_REFERER, $ref);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	return curl_exec($ch);
}
