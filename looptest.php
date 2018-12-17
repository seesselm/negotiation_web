<?php 
$step=11;
$min=35000; $max=45000; $minpt=0; $maxpt=500;
$sal_ee=array_fill(0,$step,$minpt);
$i=0;
$increment=($max-$min)/($step-1);
$incrementpt=($maxpt-$minpt)/($step-1);
for($i=($step-1);$i>=0;--$i)
{
    echo ($min+($increment*$i)).'|'.($minpt+($incrementpt*$i))."<br>";
}

?>