<?php

require "simple_html_dom.php";

$html = file_get_html('http://www.fiskal.depkeu.go.id/dw-kurs-db.asp');

$i = 0;

foreach($html->find('table') as $table) {
	foreach($table->find('tr') as $row) {
		$output[$i] = array();
		foreach($row->find('td') as $field) {
			$output[$i][] = $field->plaintext;
		}
		$i++;
	}
};

echo json_encode($output);
