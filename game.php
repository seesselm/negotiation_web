<?php
define("IN_CODE", 1);
include ("dbconfig.php");
$cookie_name = "kean_negotiation";

function checkStatus($id,$table)
{
    include ("dbconfig.php");
    $con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");
    if($table=="employee")
    {
        $query="Select employer_id as partner from $dbname.$table where employee_id=$id";
    }
    elseif($table=="employer")
    {
        $query="Select employee_id as partner from $dbname.$table where employer_id=$id";
    }
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result))
    {
        $status=$row['partner'];
    }
    if($status==NULL)
        return FALSE;
        //elseif($staus!=NULL)
        else
            return TRUE;
}

function checkCookie($cookie_name)
{
    if (! isset($_COOKIE[$cookie_name]))
    {
        $info=0;
    }
    else
    {
        $info=$_COOKIE[$cookie_name];
    }
    return $info;
}

function getInfo($id,$table)
{
    include ("dbconfig.php");
    $table_id=$table."_id";
    if($table=="employee")
        $partner="employer_id";
    elseif($table=="employer")
        $partner="employee_id";
    $con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");
    $query="SELECT salary,sal_pts,sal_order,vacation,vac_pts,vac_order,annual_raise,ann_pts,ann_order,start_date,sta_pts,
         sta_order,medical,med_pts,med_order,$partner as partner FROM $dbname.$table where $table_id=$id";
    //echo $query;
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result))
    {
        $return=$row['salary']."|".$row['sal_pts']."|".$row['sal_order']."|".$row['vacation']."|".$row['vac_pts']."|".$row['vac_order']."|".$row['annual_raise']
        ."|".$row['ann_pts']."|".$row['ann_order']."|".$row['start_date']."|".$row['sta_pts']."|".$row['sta_order']."|".$row['medical']."|".$row['med_pts']
        ."|".$row['med_order']."|".$row['partner'];
    }
    return $return;

}

function getI($sal,$vac,$ann,$sta,$med)
{
        $i=0;
        if($sal!=NULL and $sal>$i)
            $i=$sal;
        if($vac!=NULL and $vac>$i)
            $i=$vac;
        if($ann!=NULL and $ann>$i)
            $i=$ann;
        if($sta!=NULL and $sta>$i)
            $i=$sta;
        if($med!=NULL and $med>$i)
            $i=$med;
    ++$i;
    //echo "Value of i:".$i;
    return $i;
}

function printSalary($current,$pts,$in)
{
    include ("gameconfig.php");
    //echo "i is:".$i;
    if($current==NULL)
    {
        $salary=$sal_ee;
        echo "<form name='update' method='post' action='update.php'>\n";
            echo "<input type='hidden' name='field' value='1'/>";
            echo "<input type='hidden' name='i' value='$in' />";
            echo "<select name='select'>";
                foreach($salary as $value)
                {
                    //echo $value.'<br>';
                    $val=explode("|",$value);
                    //echo $val[0].'<br>';
                    //echo $val[1].'<br>';
                    
                    echo "<option value='$value'>$val[0]($val[1])</option>";
                }
            echo "<input type='submit' value='submit'/>";
            echo "</form>";
    }
    else
    {
        echo "Selected: ".$current." Points: ".$pts;
    }
}

function printVacation($current,$pts,$in)
{
    include ("gameconfig.php");
    //echo "i is:".$i;
    if($current==NULL)
    {
        $vacation=$vac_ee;
        echo "<form name='update' method='post' action='update.php'>\n";
        echo "<input type='hidden' name='field' value='2'/>";
        echo "<input type='hidden' name='i' value='$in' />";
        echo "<select name='select'>";
        foreach($vacation as $value)
        {
            //echo $value.'<br>';
            $val=explode("|",$value);
            //echo $val[0].'<br>';
            //echo $val[1].'<br>';
            
            echo "<option value='$value'>$val[0]($val[1])</option>";
        }
        echo "<input type='submit' value='submit'/>";
        echo "</form>";
    }
    else
    {
        echo "Selected: ".$current." Points: ".$pts;
    }
}

function printAnnual($current,$pts,$in)
{
    include ("gameconfig.php");
    //echo "i is:".$i;
    if($current==NULL)
    {
        $annual=$ann_ee;
        echo "<form name='update' method='post' action='update.php'>\n";
        echo "<input type='hidden' name='field' value='3'/>";
        echo "<input type='hidden' name='i' value='$in' />";
        echo "<select name='select'>";
        foreach($annual as $value)
        {
            //echo $value.'<br>';
            $val=explode("|",$value);
            //echo $val[0].'<br>';
            //echo $val[1].'<br>';
            
            echo "<option value='$value'>$val[0]%($val[1])</option>";
        }
        echo "<input type='submit' value='submit'/>";
        echo "</form>";
    }
    else
    {
        echo "Selected: ".$current."% Points: ".$pts;
    }
}

function printStart($current,$pts,$in)
{
    
    include ("gameconfig.php");
    //echo "i is:".$i;
    if($current==NULL)
    {
        $start=$sta_ee;
        echo "<form name='update' method='post' action='update.php'>\n";
        echo "<input type='hidden' name='field' value='4'/>";
        echo "<input type='hidden' name='i' value='$in' />";
        echo "<select name='select'>";
        foreach($start as $value)
        {
            //echo $value.'<br>';
            $val=explode("|",$value);
            //echo $val[0].'<br>';
            //echo $val[1].'<br>';
            
            echo "<option value='$value'>$val[0]($val[1])</option>";
        }
        echo "<input type='submit' value='submit'/>";
        echo "</form>";
    }
    else
    {
        echo "Selected: ".$current." Points: ".$pts;
    }
}

function printMedical($current,$pts,$in)
{
    include ("gameconfig.php");
    //echo "i is:".$i;
    if($current==NULL)
    {
        $med=$med_ee;
        echo "<form name='update' method='post' action='update.php'>\n";
        echo "<input type='hidden' name='field' value='5'/>";
        echo "<input type='hidden' name='i' value='$in' />";
        echo "<select name='select'>";
        foreach($med as $value)
        {
            //echo $value.'<br>';
            $val=explode("|",$value);
            //echo $val[0].'<br>';
            //echo $val[1].'<br>';
            
            echo "<option value='$value'>$val[0]%($val[1])</option>";
        }
        echo "<input type='submit' value='submit'/>";
        echo "</form>";
    }
    else
    {
        echo "Selected: ".$current."% Points: ".$pts;
    }
}

$info=checkCookie($cookie_name);
if($info==0)
    echo "No information saved";
else
{
        $cookie=explode(",",$info);
        $status=checkStatus($cookie[0],$cookie[1]);
        if($status==FALSE)
        {
            echo "You cannot access this directly";
        }
        elseif($status==TRUE)
        {
            $results=getInfo($cookie[0],$cookie[1]);
            $game=explode("|",$results);
            $i=getI($game[2],$game[5],$game[8],$game[11],$game[14]);
            //echo "val of i:".$i;
            
            ?>
<html>
<head>
<title>Negotiation Game</title>
</head>
<body>
<?php 
if($i<6)
{ //echo $i;
?>
<br>
	<b>Salary</b>
	<br>
	<?php printSalary($game[0],$game[1],$i);?>
	<br>
	<b>Vacation</b>
	<br>
	<?php printVacation($game[3],$game[4],$i);?>
	<br>
	<b>Annual Raise</b>
	<br>
	<?php printAnnual($game[6],$game[7],$i)?>
	<br>
	<b>Starting Date</b>
	<br>
	<?php printStart($game[9],$game[10],$i)?>
	<br>
	<b>Medical</b>
	<br>
	<?php printMedical($game[12],$game[13],$i)?>
	<br>
<?php 
}
elseif($i>=6)
{ 
?>
<b>Final results for <?php echo $cookie[0];?></b>
<br>
Role: <?php echo $cookie[1];?>
<br>
Partner id:<?php echo $game[15]?>
<style>
table, th, td 
{
    border: 1px solid black;
}
</style>
<table>
<tr>
    <th>Category</th>
    <th>Selection</th> 
    <th>Points</th>
    <th>Selected Order</th>
</tr>
<tr>
    <td><b>Salary</b></td>
    <td>$<?php echo $game[0]?></td>
    <td><?php echo $game[1]?></td>
    <td><?php echo $game[2]?></td>
</tr>
<tr>
    <td><b>Vacation</b></td>
    <td><?php echo $game[3]?></td>
    <td><?php echo $game[4]?></td>
    <td><?php echo $game[5]?></td>
</tr>
<tr>
    <td><b>Annual raise</b></td>
    <td><?php echo $game[6]?>%</td>
    <td><?php echo $game[7]?></td>
    <td><?php echo $game[8]?></td>
</tr>
<tr>
    <td><b>Start Date</b></td>
    <td><?php echo $game[9]?></td>
    <td><?php echo $game[10]?></td>
    <td><?php echo $game[11]?></td>
</tr>
<tr>
    <td><b>Medical</b></td>
    <td><?php echo $game[12]?>%</td>
    <td><?php echo $game[13]?></td>
    <td><?php echo $game[14]?></td>
</tr>
</table>
<?php }?>
</body>
</html>
<?php
        }
        
}

?>

