<?php
date_default_timezone_set("Asia/Jakarta");
$date = date("Y-m-d");
if($date < "2010-10-1")
        echo "lebih lama\n";

if($date > "2010-10-1")
        echo "lebih baru\n";
