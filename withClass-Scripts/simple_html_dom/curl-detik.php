<?php

include "simple_html_dom.php";

$html = file_get_html('http://news.detik.com/indeks');

$i = 0;

$output = array();

foreach($html->find('article') as $row) {
        foreach($row->find('h2') as $judul)
                $output[$i]['judul'] = trim($judul->innertext);

        foreach($row->find('a') as $link)
                $output[$i]['link'] = "http:".trim($link->href);

        $i++;
};

$i=0;
foreach($output as $news) {
        $html = file_get_html($news['link']);

        foreach($html->find('div.detail_text') as $isi)
                $output[$i]['isi'] = trim($isi->plaintext);

        if($i==10) break;

        $i++;
}

//print_r($output);
echo json_encode($output);
