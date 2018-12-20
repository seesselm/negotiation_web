<?php
include ("game_file.php");

function generateCookie($id,$table)
{
    $cookie_name = "kean_negotiation";
    $cookie_value = $id.",".$table;
    setcookie($cookie_name, $cookie_value, time() + (86400),  '/');
}


define("IN_CODE", 1);
include ("dbconfig.php");

$con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");

$kid = mysqli_real_escape_string($con, $_POST["KID"]);
$employment=$_POST["employment"];
if($employment==1)
    $table=$employee;
elseif($employment==2)
    $table=$employer;
createRow($kid,$table);
$emp_id=getRow($kid,$table,$employment);
if($emp_id!=0)
{
    generateCookie($emp_id,$employment);
    header("Location: initialize2.php");
}
