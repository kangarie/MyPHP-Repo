<?php

require "simple_html_dom.php";

$string = '<h2>HALLO MASTER</h2>
<p>UJICOBA PENGAMBILAN DATA <a class="maintain-context" href="http://Webujicoba.com/?status=okesj">Ambil sebagian data</a></p>';

$html = str_get_html($string);

$outs = $html->find('a.maintain-context');

foreach($outs as $out) {
	echo $out->href;
}
