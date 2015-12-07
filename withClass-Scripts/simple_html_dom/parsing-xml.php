<?php

require "simple_html_dom.php";

$string = '<entry>
<id>
http://blogs.clicks.my.id/xxxx/2015/...ini_oleh_Semua
</id>
<author>
<name>id batam</name>
</author>
<title>
Rasa yang Selalu Diamini oleh Semua Anak 
</title>
<content type="html">
<![CDATA[ <img src="http://xxxx.com/one-hundred-nine-360x203.jpg" alt="sering dianggap eksklusif dan berkelas" /><br><blockquote><p>HI itu apa, sih?</p></blockquote> <p>Nggak banyak orang yang tahu singkatan sebenarnya dari jurusan Ada yang mengira 
<img src="http://xxxx.com/aaaax203.jpg" alt="sering dianggap eksklusif dan berkelas" />
]]>
</content>
</entry>';

$xml=simplexml_load_string($string);

echo "id :". trim($xml->id) . "\n";
echo "name :". trim($xml->author->name) . "\n";
echo "title :". trim($xml->title). "\n";

$content = $xml->content;

$html = str_get_html($content);

$outs = $html->find('img');

$img = array();

echo "Daftar IMG :\n";
foreach($outs as $out)
        $img[] = $out->src . "\n";

echo $img[0];
