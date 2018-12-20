<?php
/*
 * Please choose values that will keep points as integers.
 * Formula is (Max-min)mod([Number of options "Steps"]-1)=0
 */

/*
 * Generate Salary
 */
$step = 11;
$min = 35000;
$max = 45000;
$minpt = 0;
$maxpt = 500;
$sal_er = array_fill(0, $step, $minpt);
$increment = ($max - $min) / ($step - 1);
$incrementpt = ($maxpt - $minpt) / ($step - 1);
$j = 0;
for ($i = ($step - 1); $i >= 0; -- $i) {
    $sal_er[$j] = ($min + ($increment * $i)) . '|' . ($minpt + ($incrementpt * $j));
    ++ $j;
}

/*
 * Generate vacation time
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
$vac_er = array_fill(0, $step, $minpt);
$incrementpt = ($maxpt - $minpt) / ($step - 1);
$j = 0;
for ($i = ($step - 1); $i >= 0; -- $i) {
    $vac_er[$j] = $time[$j] . '|' . ($minpt + ($incrementpt * $j));
    ++ $j;
}

/*
 * annual increase
 */
$step = 9;
$min = 1;
$max = 5;
$minpt = 0;
$maxpt = 320;
$ann_er = array_fill(0, $step, $minpt);
$increment = ($max - $min) / ($step - 1);
$incrementpt = ($maxpt - $minpt) / ($step - 1);
$j = 0;
for ($i = ($step - 1); $i >= 0; -- $i) {
    $ann_er[$j] = ($min + ($increment * $i)) . '|' . ($minpt + ($incrementpt * $j));
    ++ $j;
}
/*
 * Start date
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
$sta_er = array_fill(0, $step, $minpt);
$incrementpt = ($maxpt - $minpt) / ($step - 1);
$j = 0;
for ($i = ($step - 1); $i >= 0; -- $i) {
    $sta_er[$j] = $time[$j] . '|' . ($minpt + ($incrementpt * $j));
    ++ $j;
}
/*
 * Medical
 */
$step = 7;
$min = 40;
$max = 100;
$minpt = 0;
$maxpt = 300;
$med_er = array_fill(0, $step, $minpt);
$increment = ($max - $min) / ($step - 1);
$incrementpt = ($maxpt - $minpt) / ($step - 1);
$j = 0;
for ($i = ($step - 1); $i >= 0; -- $i) {
    $med_er[$j] = ($min + ($increment * $i)) . '|' . ($minpt + ($incrementpt * $j));
    ++ $j;
}

// $sal_er=array('45000|0','42500|125','40000|250','37500|375','35000|500');
// $vac_er=array('4 weeks|0','3&#189 weeks|40','3 weeks|80','2&#189 weeks|120','2 weeks|160');
// $ann_er=array('5|0','4|80','3|160','2|240','1|320');
// $sta_er=array('May 1|0','Jun 1|55','Jul 1|110','Aug 1|160','Sep|220');
// $med_er=array('100|0','85|75','70|110','55|225','40|300');
?>