<?php
/*
 * Please choose values that will keep points as integers.
 * Formula is (Max-min)mod([Number of options "Steps"]-1)=0
 * i while j increases to display the array in order of max->min with j being the index.
 */

/*
 * Generate Salary
 */
$step = 11;
$min = 35000;
$max = 45000;
$minpt = 0;
$maxpt = 500;
$sal_ee = array_fill(0, $step, $minpt);
$increment = ($max - $min) / ($step - 1);
$incrementpt = ($maxpt - $minpt) / ($step - 1);
$j = 0;
for ($i = ($step - 1); $i >= 0; -- $i) {
    $sal_ee[$j] = ($min + ($increment * $i)) . '|' . ($minpt + ($incrementpt * $i));
    ++ $j;
}

/*
 * Generate Vacation Time
 */

$time = array(
    '4 weeks',
    '3&#189 weeks',
    '3 weeks',
    '2&#189 weeks',
    '2 weeks'
);
$step = count($time);
$minpt = 0;
$maxpt = 160;
$vac_ee = array_fill(0, $step, $minpt);
$incrementpt = ($maxpt - $minpt) / ($step - 1);
$j = 0;
for ($i = ($step - 1); $i >= 0; -- $i) {
    $vac_ee[$j] = $time[$j] . '|' . ($minpt + ($incrementpt * $i));
    ++ $j;
}

/*
 * Generate Annual Increase
 */
$step = 9;
$min = 1;
$max = 5;
$minpt = 0;
$maxpt = 320;
$ann_ee = array_fill(0, $step, $minpt);
$increment = ($max - $min) / ($step - 1);
$incrementpt = ($maxpt - $minpt) / ($step - 1);
$j = 0;
for ($i = ($step - 1); $i >= 0; -- $i) {
    $ann_ee[$j] = ($min + ($increment * $i)) . '|' . ($minpt + ($incrementpt * $i));
    ++ $j;
}
/*
 * Generate Start Date
 */
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
$sta_ee = array_fill(0, $step, $minpt);
$incrementpt = ($maxpt - $minpt) / ($step - 1);
$j = 0;
for ($i = ($step - 1); $i >= 0; -- $i) {
    $sta_ee[$j] = $time[$j] . '|' . ($minpt + ($incrementpt * $i));
    ++ $j;
}
/*
 * Generate Medical
 */
$step = 7;
$min = 40;
$max = 100;
$minpt = 0;
$maxpt = 300;
$med_ee = array_fill(0, $step, $minpt);
$increment = ($max - $min) / ($step - 1);
$incrementpt = ($maxpt - $minpt) / ($step - 1);
$j = 0;
for ($i = ($step - 1); $i >= 0; -- $i) {
    $med_ee[$j] = ($min + ($increment * $i)) . '|' . ($minpt + ($incrementpt * $i));
    ++ $j;
}

// $sal_ee=array('45000|500','42500|375','40000|250','37500|125','35000|0');
// $vac_ee=array('4 weeks|160','3&#189 weeks|120','3 weeks|80','2&#189 weeks|40','2 weeks|0');
// $ann_ee=array('5|320','4|240','3|160','2|80','1|0');
// $sta_ee=array('May 1|220','Jun 1|165','Jul 1|110','Aug 1|55','Sep|0');
// $med_ee=array('100|300','85|225','70|110','55|75','40|0');

?>