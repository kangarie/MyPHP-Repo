<?php

/*

Skrip untuk mengambil link youtube terbaru dari acara TonightShow

Output bisa dilempar ke youtube-dl utk automatis download

*/


require "simple_html_dom.php";

$link = array();
for($i=1;$i<=1;$i++) {
        $out = file_get_contents("https://zulu.id/program/episode/load-more/17/$i");
        $out = json_decode($out);
        $out = $out->view;

        $html = str_get_html($out);

        foreach($html->find('div.thumb div.thumbnail img') as $row) {
                $url = $row->src;
                $url = explode("/",$url);
                $url = $url[7];
                $link[] = "https://www.youtube.com/watch?v=" . $url;
        }
}

file_put_contents("tns.link", implode("\n",$link));
print_r($link);
