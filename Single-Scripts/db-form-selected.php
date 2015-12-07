<?php

$id="1-13-14-17";
echo "id : $id<br/>";

$id = explode("-",$id);

$tam1=mysql_query("SELECT * FROM pegawai");

while ($k=mysql_fetch_array($tam1)) {
	$selected = "";
	if(in_array($k[id_pegawai],$id)
		$selected = "selected='selected'";

	echo "<input type='checkbox' name='id_pegawai[]' value='$k[id_pegawai]' $selected>$k[id_pegawai]<br/>";
}

