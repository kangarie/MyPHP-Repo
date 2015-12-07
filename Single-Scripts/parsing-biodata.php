<?php
$identitas = array('Name : ','Gender : ','Birth : ','Blood :','IPK : ','Skill : ');
$mahasiswa = array("Ririn Dwi Arta","Lakilaki","24/01/1987","B","3.41","Bot Technology");

$i=0;
foreach($identitas as $id)
	echo $id." ".$mahasiswa[$i++] . "\n";

