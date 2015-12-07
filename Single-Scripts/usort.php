<?php

$array = array(
1 => array (
'harga' => 500,
'title' => 'abc',
'nomor' => 15
),
2 => array (
'harga' => 420,
'title' => 'def',
'nomor' => 14
),
3 => array (
'harga' => 220,
'title' => 'ghi',
'nomor' => 13
),
4 => array (
'harga' => 100,
'title' => 'jkl',
'nomor' => 17
)
);

usort($array, function($a, $b) {
    return $a['harga'] - $b['harga'];
});

print_r($array);

