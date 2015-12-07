<?php
$url = "http://www.mywapblog.com/id/login.php?action=login";
$username = "kangarie";
$password = "????";


// login WHM
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'username='.$username.'&password='.$password.'&login=Masuk');
curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$out = curl_exec($ch);


echo $out;
