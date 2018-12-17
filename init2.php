<?php
define("IN_CODE", 1);
include ("dbconfig.php");
$cookie_name = "kean_negotiation";

function createRow($partner,$id,$table)
{
    include ("dbconfig.php");
    $con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");
    if($table=="employee")
        $query="update $dbname.$table set employer_id=$partner where employee_id=$id";
    elseif($table=="employer")
        $query="update $dbname.$table set employee_id=$partner where employer_id=$id";
    mysqli_query($con,$query) or die ("Error in query: $query"); //Change error message
    //echo "Done create";
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

$partner=$_POST["employment"];
//echo $partner;
$info=checkCookie($cookie_name);
if($info==0)
    echo "No information saved";
else
{
    $cookie=explode(",",$info);
    $status=checkStatus($cookie[0],$cookie[1]);
    if($status==FALSE)
    {
        createRow($partner,$cookie[0],$cookie[1]);
        header("Location: game.php");
    }
    elseif($status==TRUE)
    {
        header("Location: game.php");
    }
    
}


?>