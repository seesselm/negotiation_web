<?php 
/*
$step=11;
$min=35000; $max=45000; $minpt=0; $maxpt=500;
$sal_ee=array_fill(0,$step,$minpt);
$i=0;
$increment=($max-$min)/($step-1);
$incrementpt=($maxpt-$minpt)/($step-1);
for($i=0;$i<=($step-1);++$i)
{
    echo ($min+($increment*$i)).'|'.($minpt+($incrementpt*$i))."<br>";
}*/

$time = array(
    'May 1',
    'May 15',
    'Jun 1',
    'Jun 15',
    'Jul 1',
    'Jul 15',
    'Aug 1',
    'Aug 15',
    'Sep 1',
    'Sep 15'
);
$step = count($time);
$minpt = 0;
$maxpt = 180;
$sta_er = array_fill(0, $step, $minpt);
$incrementpt = ($maxpt - $minpt) / ($step - 1);
$j = 0;
for ($i = ($step - 1); $i >= 0; -- $i) {
    $sta_er[$j] = $time[$j] . '|' . ($minpt + ($incrementpt * $j));
    ++ $j;
}
for($k=0;$k<count($sta_er);++$k)
{
    echo $sta_er[$k];
    echo "<br>";
}
?>