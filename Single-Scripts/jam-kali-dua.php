<?php

$asal = strtotime("00:02:00") - strtotime("today");
echo gmdate("H:i:s", $asal* 2);

