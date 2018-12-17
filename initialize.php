<?php
function generateCookie($id,$table)
{
    $cookie_name = "kean_negotiation";
    $cookie_value = $id.",".$table;
    setcookie($cookie_name, $cookie_value, time() + (86400),  '/');
}

function createRow($kid,$table)
{
    include ("dbconfig.php");
    $con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");
    $query="Insert into $dbname.$table (KID) values ($kid)";
    mysqli_query($con,$query) or die ("Error in query: $query");
    //echo "Done create";
}

function getRow($kid,$table,$employment)
{
    include ("dbconfig.php");
    //echo "in get<br>";
    $con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");
    if($employment==1)
        $query= "Select MAX(employee_id) as id from $dbname.$table where KID=$kid";
    elseif($employment==2)
        $query= "Select MAX(employer_id) as id from $dbname.$table where KID=$kid";
    //echo $query;
        $result=mysqli_query($con,$query);
        $emp_id=0;
        while($row=mysqli_fetch_assoc($result))
        {
            $emp_id=$row['id'];
        }
        //echo $emp_id;
        return $emp_id;
   
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
    generateCookie($emp_id,$table);
    header("Location: initialize2.php");
}
