<?php

require "simple_html_dom.php";

$string = '<a href="model.php?id=34534">34534</a>
<a href="model.php?id=7899">7899</a>
<a href="model.php?id=12543">12543</a>';

$html = str_get_html($string);

$outs = $html->find('a');

foreach($outs as $out)
        echo $out->href . "\n";

