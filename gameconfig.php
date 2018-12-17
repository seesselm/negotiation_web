<?php
/*
 * Employee drop down info
 */

/*
 * Generate Salary
 */

$step=11;
$min=35000; $max=45000; $minpt=0; $maxpt=500;
$sal_ee=array_fill(0,$step,$minpt);
$i=0;
$increment=($max-$min)/($step-1);
$incrementpt=($maxpt-$minpt)/($step-1);
$j=0;
for($i=($step-1);$i>=0;--$i)
{    
    $sal_ee[$j]=($min+($increment*$i)).'|'.($minpt+($incrementpt*$i));
    ++$j;
}
//$sal_ee=array('45000|500','42500|375','40000|250','37500|125','35000|0');
$vac_ee=array('4 weeks|160','3&#189 weeks|120','3 weeks|80','2&#189 weeks|40','2 weeks|0');
$ann_ee=array('5|320','4|240','3|160','2|80','1|0');
$sta_ee=array('May 1|220','Jun 1|165','Jul 1|110','Aug 1|55','Sep|0');
$med_ee=array('100|300','85|225','70|110','55|75','40|0');

?>