<?php
include ("game_sql.php");

function printSalary($current, $pts, $in, $table)
{
    include ("employee_config.php");
    include ("employer_config.php");
    // echo "i is:".$i;
    if ($current == NULL) {
        if ($table == "employee")
            $salary = $sal_ee;
        elseif ($table == "employer")
            $salary = $sal_er;
        echo "<form name='update' method='post' action='update.php'>\n";
        echo "<input type='hidden' name='field' value='1'/>";
        echo "<input type='hidden' name='i' value='$in' />";
        echo "<select name='select'>";
        foreach ($salary as $value) {
            // echo $value.'<br>';
            $val = explode("|", $value);
            // echo $val[0].'<br>';
            // echo $val[1].'<br>';

            echo "<option value='$value'>$val[0]($val[1])</option>";
        }
        echo "<input type='submit' value='submit'/>";
        echo "</form>";
    } else {
        echo "Selected: " . $current . " Points: " . $pts;
    }
}

function printVacation($current, $pts, $in, $table)
{
    include ("employee_config.php");
    include ("employer_config.php");
    // echo "i is:".$i;
    if ($current == NULL) {
        if ($table == "employee")
            $vacation = $vac_ee;
        elseif ($table == "employer")
            $vacation = $vac_er;
        echo "<form name='update' method='post' action='update.php'>\n";
        echo "<input type='hidden' name='field' value='2'/>";
        echo "<input type='hidden' name='i' value='$in' />";
        echo "<select name='select'>";
        foreach ($vacation as $value) {
            // echo $value.'<br>';
            $val = explode("|", $value);
            // echo $val[0].'<br>';
            // echo $val[1].'<br>';

            echo "<option value='$value'>$val[0]($val[1])</option>";
        }
        echo "<input type='submit' value='submit'/>";
        echo "</form>";
    } else {
        echo "Selected: " . $current . " Points: " . $pts;
    }
}

function printAnnual($current, $pts, $in, $table)
{
    include ("employee_config.php");
    include ("employer_config.php");
    // echo "i is:".$i;
    if ($current == NULL) {
        if ($table == "employee")
            $annual = $ann_ee;
        elseif ($table == "employer")
            $annual = $ann_er;
        echo "<form name='update' method='post' action='update.php'>\n";
        echo "<input type='hidden' name='field' value='3'/>";
        echo "<input type='hidden' name='i' value='$in' />";
        echo "<select name='select'>";
        foreach ($annual as $value) {
            // echo $value.'<br>';
            $val = explode("|", $value);
            // echo $val[0].'<br>';
            // echo $val[1].'<br>';

            echo "<option value='$value'>$val[0]%($val[1])</option>";
        }
        echo "<input type='submit' value='submit'/>";
        echo "</form>";
    } else {
        echo "Selected: " . $current . "% Points: " . $pts;
    }
}

function printStart($current, $pts, $in, $table)
{
    include ("employee_config.php");
    include ("employer_config.php");
    // echo "i is:".$i;
    if ($current == NULL) {
        if ($table == "employee")
            $start = $sta_ee;
        elseif ($table == "employer")
            $start = $sta_er;
        echo "<form name='update' method='post' action='update.php'>\n";
        echo "<input type='hidden' name='field' value='4'/>";
        echo "<input type='hidden' name='i' value='$in' />";
        echo "<select name='select'>";
        foreach ($start as $value) {
            // echo $value.'<br>';
            $val = explode("|", $value);
            // echo $val[0].'<br>';
            // echo $val[1].'<br>';

            echo "<option value='$value'>$val[0]($val[1])</option>";
        }
        echo "<input type='submit' value='submit'/>";
        echo "</form>";
    } else {
        echo "Selected: " . $current . " Points: " . $pts;
    }
}

function printMedical($current, $pts, $in,$table)
{
    include ("employee_config.php");
    include ("employer_config.php");
    // echo "i is:".$i;
    if ($current == NULL) {
        if ($table == "employee")
            $medical = $med_ee;
        elseif ($table == "employer")
            $medical = $med_er;
        echo "<form name='update' method='post' action='update.php'>\n";
        echo "<input type='hidden' name='field' value='5'/>";
        echo "<input type='hidden' name='i' value='$in' />";
        echo "<select name='select'>";
        foreach ($medical as $value) {
            // echo $value.'<br>';
            $val = explode("|", $value);
            // echo $val[0].'<br>';
            // echo $val[1].'<br>';

            echo "<option value='$value'>$val[0]%($val[1])</option>";
        }
        echo "<input type='submit' value='submit'/>";
        echo "</form>";
    } else {
        echo "Selected: " . $current . "% Points: " . $pts;
    }
}

function getI($sal, $vac, $ann, $sta, $med)
{
    $i = 0;
    if ($sal != NULL and $sal > $i)
        $i = $sal;
    if ($vac != NULL and $vac > $i)
        $i = $vac;
    if ($ann != NULL and $ann > $i)
        $i = $ann;
    if ($sta != NULL and $sta > $i)
        $i = $sta;
    if ($med != NULL and $med > $i)
        $i = $med;
    ++ $i;
    // echo "Value of i:".$i;
    return $i;
}
?>