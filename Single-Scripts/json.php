<?php
$str='{"nama":"gahaja","umur":"21","no":"12"}';
$array = json_decode($str,1);

print_r($array);
