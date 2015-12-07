<?php

include "simple_html_dom.php";

$ch = curl_init();
$url = "http://www.seagm.com/id/dragons-prophet-us/dragons-prophet-gold?server_id=12263&item_id=539";
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.115 Safari/537.36");
$out = curl_exec($ch);

$html = new simple_html_dom();
$html->load($out);
$total = $html->find('span.price',1)->plaintext;

print_r($total);
