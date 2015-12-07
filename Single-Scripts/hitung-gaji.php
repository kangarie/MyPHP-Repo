<?php
$kerja = "56";
$perjam = "2000";
$lembur ="3000";
$gaji1 = ($kerja - 48)*$lembur;
$gaji2 = $perjam * 48;
$total = $gaji1 + $gaji2;
if ($kerja > 48 )
{
echo "Lembur";
}
else
{
echo"Total Gaji" .$total;
}
?>
