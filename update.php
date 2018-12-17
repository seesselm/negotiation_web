<?php
define("IN_CODE", 1);
include ("dbconfig.php");
$cookie_name = "kean_negotiation";
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

function updateRow($form,$i,$select,$id,$table)
{
    include ("dbconfig.php");
    $con = mysqli_connect($server, $serverlogin, $pswd, $dbname) or die("Connection fail");
    $table_id=$table."_id";
    if($form==1)
    {
        $col="salary";
        $col_pts="sal_pts";
        $col_order="sal_order";
    }
    elseif($form==2)
    {
        $col="vacation";
        $col_pts="vac_pts";
        $col_order="vac_order";
    }
    elseif($form==3)
    {
        $col="annual_raise";
        $col_pts="ann_pts";
        $col_order="ann_order";
    }
    elseif($form==4)
    {
        $col="start_date";
        $col_pts="sta_pts";
        $col_order="sta_order";
    }
    elseif($form==5)
    {
        $col="medical";
        $col_pts="med_pts";
        $col_order="med_order";
    }
    $val=explode("|",$select);
    $query="Update $dbname.$table set $col='$val[0]',$col_pts='$val[1]',$col_order=$i where $table_id=$id";
    mysqli_query($con,$query) or die ("Error in query: $query");
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
            $form=$_POST['field'];
            $i=$_POST['i'];
            $select=$_POST['select'];
            //echo $form."<br>";
            //echo $i."<br>";
            //echo $select."<br>";
            updateRow($form,$i,$select,$cookie[0],$cookie[1]);
            header("Location: game.php");
        }
        
}

?>